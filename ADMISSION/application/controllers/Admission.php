<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';
//require APPPATH . '/third_party/Kit/AWLMEAPI.php';

require APPPATH . '/third_party/encdec_paytm.php';
date_default_timezone_set('Asia/Kolkata');
class Admission extends BaseController
{
    /* This is default constructor of the class */
    public function __construct() {
        parent::__construct();
        $this->load->model('admission_model');
        $this->load->model('student_model');
        $this->isLoggedIn();   
    }

    /* This function used to load the first screen of the user */
    public function index() {
        $this->isLoggedIn();
    }
    
    public function viewAdmission(){
        $studentInfo = $this->student_model->getStudentStudentInfo($this->student_row_id);
        $paymentLog =  $this->admission_model->getAllFeePaymentLogByApplicationNo($studentInfo->application_number);
        $return = false;
        if(!empty($paymentLog)){
            foreach($paymentLog as $pay){
             $ORDER_ID = $pay->order_id;
             $requestParamList = array("MID" => PAYTM_MERCHANT_MID , "ORDERID" => $ORDER_ID);  
     
             $StatusCheckSum = getChecksumFromArray($requestParamList,PAYTM_MERCHANT_KEY);
             
             $requestParamList['CHECKSUMHASH'] = $StatusCheckSum;
     
             // Call the PG's getTxnStatusNew() function for verifying the transaction status.
             $responseParamList = getTxnStatusNew($requestParamList);
            
                if($responseParamList['STATUS'] == 'TXN_SUCCESS'){
                   
                 $return = $this->reProcessPaytmPayment($responseParamList);
                }
             
            }
        } 
        if($return == false){
            $fee_amount = 0;
            $langFeeInfo = array();
            $filter = array();
            $filter['stream_name'] = $studentInfo->stream_name;
            $filter['term_name'] = 'I PUC';
            if(strtoupper($studentInfo->elective_sub) == 'FRENCH'){
                $filter['lang_fee_status'] = true;
            }else{
                $filter['lang_fee_status'] = false;
            }
           // $catInfo = $this->admission_model->getStudentCategoryByApplicationNum($studentInfo->application_number);
            $filter['category'] = strtoupper($studentInfo->student_category);
           
            $installmentAmt = $this->admission_model->getInstalmentByApplicationNo($studentInfo->application_number);
            //for display installment button
           // $data['installmentAmtExist'] = $this->admission_model->checkInstallmentAlreadyExist($studentInfo->student_id);;
           $boardInfo = $this->student_model->getStudentRegisteredInfo($this->student_row_id);
           $data['board_id'] = $boardInfo->sslc_board_name_id;
           if($boardInfo->sslc_board_name_id == 1){
            $filter['board_name'] = "SSLC";
           }else{
            $filter['board_name'] = "OTHER";
           }
           if(!empty($installmentAmt)){
                $total_fee_amount = $installmentAmt->instalment_amt;  
            }else{
                $total_fee_obj = $this->admission_model->getTotalFeeAmount($filter);
                $total_fee_amount = $total_fee_obj->total_fee;
                //log_message('debug','response=='. $studentInfo->category);
                $paidFee = $this->admission_model->getStudentTotalPaidAmount($studentInfo->application_number);
                if(!empty($paidFee)){
                    $total_fee_amount -= $paidFee->paid_amount;
                }
            }
          
           
            $data['studentInfo'] = $studentInfo;
            $data['fee_amount'] = $total_fee_amount;
    
            if($total_fee_amount == 0){
                $this->session->set_flashdata('success','Your fees is already paid!');
                $data['feeInfo'] = $this->admission_model->getFeePaidInfo($studentInfo->application_number);
                $this->global['pageTitle'] = ''.TAB_TITLE.' : View Fees Payment Details';
                $this->loadViews("fee_management/feePaidInfo", $this->global, $data, null);
            }else{
                $data['installment_amt'] = $total_fee_amount/2;
                $this->global['pageTitle'] = ''.TAB_TITLE.' : Admission to I PUC' ;
                $this->loadViews("admission/fee_payment", $this->global, $data, NULL);
            }
        }else{
            $this->session->set_flashdata('success','Your fees is already paid!');
            $data['feeInfo'] = $this->admission_model->getFeePaidInfo($studentInfo->application_number);
            $this->global['pageTitle'] = ''.TAB_TITLE.' : View Fees Payment Details';
            $this->loadViews("fee_management/feePaidInfo", $this->global, $data, null);  
        }
        
    }

    public function admissionFeeProcess(){
        header("Pragma: no-cache");
        header("Cache-Control: no-cache");
        header("Expires: 0");
        $checkSum = "";
        $paramList = array();
        $remarks = 'SJPUC I PUC Fee Payment for Admission 2022-23';
        $fee_amount = $this->security->xss_clean($this->input->post('amount'));
        $studentInfo = $this->student_model->getStudentStudentInfo($this->student_row_id);

        $paymentLog = array(
            'mid'=>PAYTM_MERCHANT_MID,
            'student_id' =>$studentInfo->application_number,
            'remarks' =>$remarks,
            'fee_amount' => $fee_amount,
            'payment_status' =>'PENDING',
            'payment_date' => date('Y-m-d'),
            'payment_time' => date('h:i:s'),
            'created_by' => $studentInfo->application_number,
            'created_date_time' => date('Y-m-d H:i:s')
        );
        $response = $this->admission_model->addFeePaymentLog($paymentLog);

        $CUST_ID = $studentInfo->application_number;
        $INDUSTRY_TYPE_ID = "Retail";
        $CHANNEL_ID = "WEB";
        $TXN_AMOUNT = $fee_amount;
        if($response > 0){
            $ORDER_ID = '22IPU'.$response;
            $payInfo = array('order_id' =>$ORDER_ID);
            $this->admission_model->updatePaymentLog($payInfo, $response);
            $_SESSION['order_id'] = $ORDER_ID;
        }

        // Create an array having all required parameters for creating checksum.
        $paramList["MID"] = PAYTM_MERCHANT_MID;
        $paramList["ORDER_ID"] = $ORDER_ID;
        $paramList["CUST_ID"] = $CUST_ID;
        $paramList["INDUSTRY_TYPE_ID"] = $INDUSTRY_TYPE_ID;
        $paramList["CHANNEL_ID"] = $CHANNEL_ID;
        $paramList["TXN_AMOUNT"] = $TXN_AMOUNT;
        $paramList["WEBSITE"] = PAYTM_MERCHANT_WEBSITE;


        $paramList["CALLBACK_URL"] = base_url()."payTmfeePaymentResponse";
        /*$paramList["MSISDN"] = $MSISDN; //Mobile number of customer
        $paramList["EMAIL"] = $EMAIL; //Email ID of customer
        $paramList["VERIFIED_BY"] = "EMAIL"; //
        $paramList["IS_USER_VERIFIED"] = "YES"; //
        */

        //Here checksum string will return by getChecksumFromArray() function.
        $checkSum = getChecksumFromArray($paramList,PAYTM_MERCHANT_KEY);
        $data['checkSum'] = $checkSum;
        $data['paramList'] = $paramList;
        $this->global['pageTitle'] = ''.TAB_TITLE.' : PayTm Payment';
        $this->loadViews("admission/paytm_payment_process", $this->global , $data ,NULL);
    }
    
    public function payTmfeePaymentResponse(){
        header("Pragma: no-cache");
        header("Cache-Control: no-cache");
        header("Expires: 0");

        $paytmChecksum = "";
        $paramList = array();
        $isValidChecksum = "FALSE";
        //log_message('debug','test');
        $paramList = $_POST;
        $studentInfo = $this->student_model->getStudentStudentInfo($this->student_row_id);
       
        $paytmChecksum = isset($_POST["CHECKSUMHASH"]) ? $_POST["CHECKSUMHASH"] : ""; //Sent by Paytm pg
        $data['application_applied_status'] = false;
        //Verify all parameters received from Paytm pg to your application. Like MID received from paytm pg is same as your application�s MID, TXN_AMOUNT and ORDER_ID are same as what was sent by you to Paytm PG for initiating transaction etc.
        $isValidChecksum = verifychecksum_e($paramList, PAYTM_MERCHANT_KEY, $paytmChecksum); //will return TRUE or FALSE string.
       
        $data['PAYTM'] = $_POST;
     
       // $data['response'] = $response;
        $filter = array();
        $filter['stream_name'] = $studentInfo->stream_name;
        $filter['term_name'] = 'I PUC';
        if(strtoupper($studentInfo->elective_sub) == 'FRENCH'){
            $filter['lang_fee_status'] = true;
        }else{
            $filter['lang_fee_status'] = false;
        }
       // $catInfo = $this->admission_model->getStudentCategoryByApplicationNum($studentInfo->application_number);
        $filter['category'] = strtoupper($studentInfo->student_category);
       
       
        //for display installment button
       // $data['installmentAmtExist'] = $this->admission_model->checkInstallmentAlreadyExist($studentInfo->student_id);;
       $boardInfo = $this->student_model->getStudentRegisteredInfo($this->student_row_id);
       if($boardInfo->sslc_board_name_id == 1){
        $filter['board_name'] = "SSLC";
       }else{
        $filter['board_name'] = "OTHER";
       }
        $totalFeeObj = $this->admission_model->getTotalFeeAmount($filter);
        $feeStructureInfo = $this->admission_model->getAllFeeStructureInfo($filter);
        
        $total_fee_pending_to_pay = $totalFeeObj->total_fee;
        //get overall fee paid info 
        $feePaidInfo = $this->admission_model->getFeePaidInfo($studentInfo->application_number);
        $fee_excess_amount = 0;
        $fee_pending_status = 1;
        $pending_fee_balance = 0;
        $receipt_number = 0;
        $feePaidInfo = $this->admission_model->getFeePaidInfo($studentInfo->application_number);
        $isOrderIDExist =  $this->admission_model->isOrderIDExist($_POST["ORDERID"]);
        $paid_fee_amount = $_POST["TXNAMOUNT"];
       if(empty($isOrderIDExist) && $isValidChecksum == true){
        if($_POST['STATUS'] == 'TXN_SUCCESS'){
            if(!empty($feePaidInfo)){
                foreach($feePaidInfo as $paid){
                    $total_fee_pending_to_pay -= $paid->paid_amount;
                }
            }
            
           

            $pending_fee_balance = $total_fee_pending_to_pay - $paid_fee_amount;
            if($pending_fee_balance <= 0){
                $fee_excess_amount = abs($pending_fee_balance);
                $fee_pending_status = 0;
            }else if($pending_fee_balance > 0){
                $fee_excess_amount = 0;
                $fee_pending_status = 1;
            }
            $feePaymentInfo = $this->admission_model->getReadmission_FeePaidDetailsByApplicationNo($studentInfo->application_number);
            if(empty($feePaymentInfo)){ 
                $paid_count = 1;
            }else{
                $paid_count = $feePaymentInfo->payment_count+1;
            }

            $receipt_number = $this->admission_model->getLastReceiptNoFromOverall();
            if(empty($receipt_number)){
                $receipt_number = 0;
            }
            $receipt_number += 1;
            $receipt_number = sprintf('%04d', $receipt_number);

            $overallFee = array(
                'receipt_number'=> $receipt_number,
                'application_no' => $studentInfo->application_number,
                'payment_type' => 'ONLINE',
                'payment_date' => date('Y-m-d',strtotime($_POST['TXNDATE'])),
                'total_amount' => $total_fee_pending_to_pay,
                'paid_amount' => $paid_fee_amount,
                'excess_amount' => $fee_excess_amount,
                'fee_concession' => 0,
                'payment_count' => $paid_count,
                'pending_balance' => $pending_fee_balance,
                'fee_pending_status' => $fee_pending_status,
                'order_id' => $_POST["ORDERID"],
                'payment_year' => ADMISSION_YEAR,
                'term_name' => 'I PUC',
                'collected_staff_name' => 'parrophins',
                'created_by' => 'schoolphins',
                'created_date_time' => date('Y-m-d H:i:s'));

            $overall_row_id = $this->admission_model->addFeeDetailsInfo($overallFee);
            
          
            //update installment exist only
            $installmentAmt = $this->admission_model->getInstalmentByApplicationNo($studentInfo->application_number);
            if(!empty($installmentAmt)){
                $instllInfo = array(
                    'payment_status'=>1,
                    'invoice_no' => $overall_row_id,
                    'updated_by'=>'schoolphins',
                    'updated_date_time'=>date('Y-m-d H:i:s'));
                $this->admission_model->updateNewAdmInstalment($instllInfo, $studentInfo->application_number);
            }
            $fee_amount_balance_pending = $paid_fee_amount;
            $remaining_fee_amt = $paid_fee_amount;
            foreach($feeStructureInfo as $fee){
                $db_save_status = false;
                $fee_structure_amt = $fee->fee_amount_state_board;
                $isAlreadyPaid = $this->admission_model->checkFeeTypeIsAlreadyPaid($studentInfo->application_number,$fee->row_id);
                if($remaining_fee_amt >= 0){
                    if(!empty($isAlreadyPaid)){
                        if($isAlreadyPaid->pending_status == 1){
                            $remaining_fee_amt -= $isAlreadyPaid->pending_amt;
                            if($remaining_fee_amt >= 0){
                                //$pending_amount = 0;
                                $paid_amt = $isAlreadyPaid->pending_amt;
                                $pending_amt = 0;
                                $fee_pending_status = 0;
                            } else {
                                //$dd_amount = 0; 
                                $paid_amt = $isAlreadyPaid->pending_amt - abs($remaining_fee_amt);
                                $pending_amt = $isAlreadyPaid->pending_amt - $paid_amt;
                                $fee_pending_status = 1;
                            } 
                            $db_save_status = true;
                        }
                    }else{
                        $remaining_fee_amt -= $fee_structure_amt;
                        if($remaining_fee_amt >= 0){
                            //$pending_amount = 0;
                            $paid_amt = $fee_structure_amt;
                            $pending_amt = 0;
                            $fee_pending_status = 0;
                        } else {
                            //$dd_amount = 0; 
                            $paid_amt = $fee_structure_amt - abs($remaining_fee_amt);
                            $pending_amt = $fee_structure_amt - $paid_amt;
                            $fee_pending_status = 1;
                        } 
                        $db_save_status = true;
                    }
                }else{
                    if(empty($isAlreadyPaid)){
                    $pending_amt = $fee_structure_amt;
                    $paid_amt = 0;
                    $fee_pending_status = 1;
                    $db_save_status = true;
                    }
                }
                if($db_save_status){
                    $feeReceiptPayment = array(
                        'application_no' => $studentInfo->application_number,
                        'receipt_number' => $overall_row_id,
                        'payment_date' => date('Y-m-d',strtotime($_POST['TXNDATE'])), 
                        'fee_type_id' => $fee->row_id,
                        'paid_amount' => $paid_amt,
                        'pending_amt' => $pending_amt,
                        'pending_status' => $fee_pending_status,
                        'school_account_id' => $fee->account_row_id,
                        'created_by' => 'schoolphins',
                        'fee_amount' => $fee_structure_amt,
                        'created_date_time' => date('Y-m-d H:i:s'));
                        
                    $receipt_return_feeType = $this->admission_model->addReceiptFeeType2021($feeReceiptPayment);
                }
            
            }
             
             $paymentLogUpdate = array(
                'payment_mode' => $_POST['PAYMENTMODE'],
                'reference_number'=>$_POST['TXNID'],
                'payment_status' =>'SUCCESS',
                'receipt_number' =>$overall_row_id,
                'amount_pending' =>$pending_fee_balance,
                'fee_amount' => $_POST['TXNAMOUNT'],
                'updated_by' => $studentInfo->application_number,
                'updated_date_time' => date('Y-m-d H:i:s')
            );
            $applicationStatus = array(
                'joined_status' => 1,
                'admission_status'=> 1,
                'updated_date_time' => date('Y-m-d H:i:s'));
           $this->student_model->updateStudentApplicationStatus($this->student_row_id,$applicationStatus);
            $mobile = $studentInfo->father_mobile.','.$studentInfo->mother_mobile;
            $msg = 'Dear Student, %n Thank you, %n Received Rs.'.$paid_fee_amount.' towards annual fees, Your receipt number: '.$receipt_number.' %n Principal - SJPUCB';
            $res = $this->sendSingleNumberSMS($mobile,$msg);
        }else{
            $paymentLogUpdate = array(
                'payment_status' =>'FAILED',
                'fee_amount' => $_POST['TXNAMOUNT'],
                'updated_by' => $studentInfo->application_number,
                'updated_date_time' => date('Y-m-d H:i:s')
            );
        }
        $data['receipt_number'] = $overall_row_id;
        $data['pending_fee_balance'] = $pending_fee_balance;
        $this->admission_model->updatePaymentLogByOrderId($paymentLogUpdate, $_POST["ORDERID"]);
       
        // $stdInfo = array(
        //     'term_name' => 'II PUC',
        //     'updated_date_time' =>date('Y-m-d H:i:s'),
        //     'fee_pending_status' => $fee_pending_status,
        // );
       // $this->admission_model->promoteStudent($stdInfo, $studentInfo->application_no);
       }else{
        $data['receipt_number'] = $isOrderIDExist->receipt_number;
        $data['pending_fee_balance'] = $isOrderIDExist->pending_balance;
       }

       // log_message('debug','mode=='. );
        $this->global['pageTitle'] = ''.TAB_TITLE.' : Fee Payment Response' ;
        $this->loadViews("admission/feePaymentResponse", $this->global, $data, NULL);
    }


    public function reProcessPaytmPayment($POST){
        $_POST = $POST;
        $paytmChecksum = "";
        $paramList = array();
        $isValidChecksum = "FALSE";
        //log_message('debug','test');
        $paramList = $_POST;
        $studentInfo = $this->student_model->getStudentStudentInfo($this->student_row_id);
       
        $paytmChecksum = isset($_POST["CHECKSUMHASH"]) ? $_POST["CHECKSUMHASH"] : ""; //Sent by Paytm pg
        $data['application_applied_status'] = false;
        //Verify all parameters received from Paytm pg to your application. Like MID received from paytm pg is same as your application�s MID, TXN_AMOUNT and ORDER_ID are same as what was sent by you to Paytm PG for initiating transaction etc.
        $isValidChecksum = verifychecksum_e($paramList, PAYTM_MERCHANT_KEY, $paytmChecksum); //will return TRUE or FALSE string.
       
        $data['PAYTM'] = $_POST;
     
       // $data['response'] = $response;
        $filter = array();
        $filter['stream_name'] = $studentInfo->stream_name;
        $filter['term_name'] = 'I PUC';
        if(strtoupper($studentInfo->elective_sub) == 'FRENCH'){
            $filter['lang_fee_status'] = true;
        }else{
            $filter['lang_fee_status'] = false;
        }
       // $catInfo = $this->admission_model->getStudentCategoryByApplicationNum($studentInfo->application_number);
        $filter['category'] = strtoupper($studentInfo->student_category);
       
       
        //for display installment button
       // $data['installmentAmtExist'] = $this->admission_model->checkInstallmentAlreadyExist($studentInfo->student_id);;
       $boardInfo = $this->student_model->getStudentRegisteredInfo($this->student_row_id);
       if($boardInfo->sslc_board_name_id == 1){
        $filter['board_name'] = "SSLC";
       }else{
        $filter['board_name'] = "OTHER";
       }
        $totalFeeObj = $this->admission_model->getTotalFeeAmount($filter);
        $feeStructureInfo = $this->admission_model->getAllFeeStructureInfo($filter);
        
        $total_fee_pending_to_pay = $totalFeeObj->total_fee;
        //get overall fee paid info 
        $feePaidInfo = $this->admission_model->getFeePaidInfo($studentInfo->application_number);
        $fee_excess_amount = 0;
        $fee_pending_status = 1;
        $pending_fee_balance = 0;
        $receipt_number = 0;
        $feePaidInfo = $this->admission_model->getFeePaidInfo($studentInfo->application_number);
        $isOrderIDExist =  $this->admission_model->isOrderIDExist($_POST["ORDERID"]);
        $paid_fee_amount = $_POST["TXNAMOUNT"];
       if(empty($isOrderIDExist) && $isValidChecksum == true){
        if($_POST['STATUS'] == 'TXN_SUCCESS'){
            if(!empty($feePaidInfo)){
                foreach($feePaidInfo as $paid){
                    $total_fee_pending_to_pay -= $paid->paid_amount;
                }
            }
            
           

            $pending_fee_balance = $total_fee_pending_to_pay - $paid_fee_amount;
            if($pending_fee_balance <= 0){
                $fee_excess_amount = abs($pending_fee_balance);
                $fee_pending_status = 0;
            }else if($pending_fee_balance > 0){
                $fee_excess_amount = 0;
                $fee_pending_status = 1;
            }
            $feePaymentInfo = $this->admission_model->getReadmission_FeePaidDetailsByApplicationNo($studentInfo->application_number);
            if(empty($feePaymentInfo)){ 
                $paid_count = 1;
            }else{
                $paid_count = $feePaymentInfo->payment_count+1;
            }

            $receipt_number = $this->admission_model->getLastReceiptNoFromOverall();
            if(empty($receipt_number)){
                $receipt_number = 0;
            }
            $receipt_number += 1;
            $receipt_number = sprintf('%04d', $receipt_number);

            $overallFee = array(
                'receipt_number'=> $receipt_number,
                'application_no' => $studentInfo->application_number,
                'payment_type' => 'ONLINE',
                'payment_date' => date('Y-m-d',strtotime($_POST['TXNDATE'])),
                'total_amount' => $total_fee_pending_to_pay,
                'paid_amount' => $paid_fee_amount,
                'excess_amount' => $fee_excess_amount,
                'fee_concession' => 0,
                'payment_count' => $paid_count,
                'pending_balance' => $pending_fee_balance,
                'fee_pending_status' => $fee_pending_status,
                'order_id' => $_POST["ORDERID"],
                'payment_year' => ADMISSION_YEAR,
                'term_name' => 'I PUC',
                'collected_staff_name' => 'parrophins',
                'created_by' => 'schoolphins',
                'created_date_time' => date('Y-m-d H:i:s'));

            $overall_row_id = $this->admission_model->addFeeDetailsInfo($overallFee);
            
            //$receipt_number = 'S'.sprintf('%04d', $row_id);
          
            //update installment exist only
            $installmentAmt = $this->admission_model->getInstalmentByApplicationNo($studentInfo->application_number);
            if(!empty($installmentAmt)){
                $instllInfo = array(
                    'payment_status'=>1,
                    'invoice_no' => $overall_row_id,
                    'updated_by'=>'schoolphins',
                    'updated_date_time'=>date('Y-m-d H:i:s'));
                $this->admission_model->updateNewAdmInstalment($instllInfo, $studentInfo->application_number);
            }
            $fee_amount_balance_pending = $paid_fee_amount;
            $remaining_fee_amt = $paid_fee_amount;
            foreach($feeStructureInfo as $fee){
                $db_save_status = false;
                $fee_structure_amt = $fee->fee_amount_state_board;
                $isAlreadyPaid = $this->admission_model->checkFeeTypeIsAlreadyPaid($studentInfo->application_number,$fee->row_id);
                if($remaining_fee_amt >= 0){
                    if(!empty($isAlreadyPaid)){
                        if($isAlreadyPaid->pending_status == 1){
                            $remaining_fee_amt -= $isAlreadyPaid->pending_amt;
                            if($remaining_fee_amt >= 0){
                                //$pending_amount = 0;
                                $paid_amt = $isAlreadyPaid->pending_amt;
                                $pending_amt = 0;
                                $fee_pending_status = 0;
                            } else {
                                //$dd_amount = 0; 
                                $paid_amt = $isAlreadyPaid->pending_amt - abs($remaining_fee_amt);
                                $pending_amt = $isAlreadyPaid->pending_amt - $paid_amt;
                                $fee_pending_status = 1;
                            } 
                            $db_save_status = true;
                        }
                    }else{
                        $remaining_fee_amt -= $fee_structure_amt;
                        if($remaining_fee_amt >= 0){
                            //$pending_amount = 0;
                            $paid_amt = $fee_structure_amt;
                            $pending_amt = 0;
                            $fee_pending_status = 0;
                        } else {
                            //$dd_amount = 0; 
                            $paid_amt = $fee_structure_amt - abs($remaining_fee_amt);
                            $pending_amt = $fee_structure_amt - $paid_amt;
                            $fee_pending_status = 1;
                        } 
                        $db_save_status = true;
                    }
                }else{
                    if(empty($isAlreadyPaid)){
                    $pending_amt = $fee_structure_amt;
                    $paid_amt = 0;
                    $fee_pending_status = 1;
                    $db_save_status = true;
                    }
                }
                if($db_save_status){
                    $feeReceiptPayment = array(
                        'application_no' => $studentInfo->application_number,
                        'receipt_number' => $overall_row_id,
                        'payment_date' => date('Y-m-d',strtotime($_POST['TXNDATE'])), 
                        'fee_type_id' => $fee->row_id,
                        'paid_amount' => $paid_amt,
                        'pending_amt' => $pending_amt,
                        'pending_status' => $fee_pending_status,
                        'school_account_id' => $fee->account_row_id,
                        'created_by' => 'schoolphins',
                        'fee_amount' => $fee_structure_amt,
                        'created_date_time' => date('Y-m-d H:i:s'));
                        
                    $receipt_return_feeType = $this->admission_model->addReceiptFeeType2021($feeReceiptPayment);
                }
            
            }
             
             $paymentLogUpdate = array(
                'payment_mode' => $_POST['PAYMENTMODE'],
                'reference_number'=>$_POST['TXNID'],
                'payment_status' =>'SUCCESS',
                'receipt_number' =>$overall_row_id,
                'amount_pending' =>$pending_fee_balance,
                'fee_amount' => $_POST['TXNAMOUNT'],
                'updated_by' => $studentInfo->application_number,
                'updated_date_time' => date('Y-m-d H:i:s')
            );
            $applicationStatus = array(
                'joined_status' => 1,
                'admission_status'=> 1,
                'updated_date_time' => date('Y-m-d H:i:s'));
           $this->student_model->updateStudentApplicationStatus($this->student_row_id,$applicationStatus);
            $mobile = $studentInfo->father_mobile.','.$studentInfo->mother_mobile;
            $msg = 'Dear Student, %n Thank you, %n Received Rs.'.$paid_fee_amount.' towards annual fees, Your receipt number: '.$receipt_number.' %n Principal - SJPUCB';
            $res = $this->sendSingleNumberSMS($mobile,$msg);
        }else{
            $paymentLogUpdate = array(
                'payment_status' =>'FAILED',
                'fee_amount' => $_POST['TXNAMOUNT'],
                'updated_by' => $studentInfo->application_number,
                'updated_date_time' => date('Y-m-d H:i:s')
            );
        }
        $data['receipt_number'] = $receipt_number;
        $data['pending_fee_balance'] = $pending_fee_balance;
        $this->admission_model->updatePaymentLogByOrderId($paymentLogUpdate, $_POST["ORDERID"]);
       
        // $stdInfo = array(
        //     'term_name' => 'II PUC',
        //     'updated_date_time' =>date('Y-m-d H:i:s'),
        //     'fee_pending_status' => $fee_pending_status,
        // );
       // $this->admission_model->promoteStudent($stdInfo, $studentInfo->application_no);
       }

     
     return true;
    }


    public function getFeePaymentInfo()
    {
        $data['studentInfo'] =  $this->student_model->getStudentStudentInfo($this->student_row_id);
        $data['feeInfo'] = $this->admission_model->getFeePaidInfo($data['studentInfo']->application_number);
        $paymentLog =  $this->admission_model->getAllFeePaymentLogByApplicationNo($data['studentInfo']->application_number);
     
        $return = false;
        if(!empty($paymentLog)){
            foreach($paymentLog as $pay){
             $ORDER_ID = $pay->order_id;
             $requestParamList = array("MID" => PAYTM_MERCHANT_MID , "ORDERID" => $ORDER_ID);  
     
             $StatusCheckSum = getChecksumFromArray($requestParamList,PAYTM_MERCHANT_KEY);
             
             $requestParamList['CHECKSUMHASH'] = $StatusCheckSum;
     
             // Call the PG's getTxnStatusNew() function for verifying the transaction status.
             $responseParamList = getTxnStatusNew($requestParamList);
            
                if($responseParamList['STATUS'] == 'TXN_SUCCESS'){
                   
                 $return = $this->reProcessPaytmPayment($responseParamList);
                }
             
            }
        } 
        $this->global['pageTitle'] = ''.TAB_TITLE.' : View Fee Payment Details';
        $this->loadViews("fee_management/feePaidInfo", $this->global, $data, null);
    }
    











    public function requestToInstallment(){
        $installment_amt = $this->security->xss_clean($this->input->post('installment_amt'));
        
        $feeInfo = array(
            'student_id'=>$this->student_id,
            'instalment_amt'=>$installment_amt,
            'approved_status'=>0,
            'created_by'=>'schoolphins',
            'created_date_time'=>date('Y-m-d H:i:s'));
        $result = $this->admission_model->addInstalmentRequest($feeInfo);
        if($result > 0){
            $this->session->set_flashdata('success', 'Installment Requested Successfully.');
        } else{
            $this->session->set_flashdata('error', 'Failed to Request Instalment');
        }
    redirect('dashboard');
        
    }

//send sms payment received
    function sendSingleNumberSMS($mobile,$msg){
        $message = $msg;
        $message = rawurlencode($message);  
        $data = "username=".USERNAME_TEXTLOCAL."&hash=".HASH_TEXTLOCAL."&message=".$message."&sender=".SENDERID_TEXTLOCAL."&numbers=".$mobile;
        $ch = curl_init('http://api.textlocal.in/send/?');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result_sms = curl_exec($ch); // This is the result from the API
        $json = json_decode($result_sms, true);
        //log_message('error', 'JSON=' );
        $status= $json['status'];
        //log_message('error', 'JSON='.print_r($json));
        curl_close($ch);
        return $status;
    }



    public function supplementaryFeeInfo(){
        $filter = array();
        $filter['student_id'] = $this->student_id;
      //  $filter['term_name'] = 'II PUC';
        $data['studentInfo'] = $this->student_model->supplyStudentInfo($filter);
        if(empty($data['studentInfo'])){
            $_SESSION['supply_fee'] = 0;
            $this->session->set_flashdata('success','Your fee is already paid!');
            //$data['feeInfo'] = $this->admission_model->getFeePaidInfo($studentInfo->application_number);
           
            $data['supplyPayment'] = $this->student_model->getSupplyStudentInfoByStatus($filter);
            $this->global['pageTitle'] = ''.TAB_TITLE.' : View Fee Payment Details';
            $this->loadViews("fee_management/feePaidInfo", $this->global, $data, null);
        }else{
           // $data['installment_amt'] = $total_fee_amount/2;
           $_SESSION['supply_fee'] = $data['studentInfo']->supply_fee;
            $this->global['pageTitle'] = ''.TAB_TITLE.' : Fee Payment-2020' ;
            $this->loadViews("supplementary/paySupplementaryFee", $this->global, $data, NULL);
        }
       
    }

    public function paySupplementaryFee(){
        $obj = new AWLMEAPI();
        $reqMsgDTO = new ReqMsgDTO();
        $remarks = 'SJPUC Supplementary Exam Fee - 2020';
        //$this->security->xss_clean($this->input->post('mid'));
        $reqMsgDTO->setMid(M_ID);
        // Merchant Unique order id
        //$OrderId = $this->student_id.'23312';
        //$this->security->xss_clean($this->input->post('OrderId'));
       
        //Transaction amount in paisa format
        
        $fee_amount = $_SESSION['supply_fee'];
        $amount = $fee_amount * 100;
      //  log_message('debug','response=='.  $fee_amount);
        $reqMsgDTO->setTrnAmt($amount);
        //Transaction remarks
        $reqMsgDTO->setTrnRemarks($remarks);
        // Merchant transaction type (S/P/R)
        $meTransReqType = "S"; 
        //$this->security->xss_clean($this->input->post('meTransReqType'));
        $reqMsgDTO->setMeTransReqType($meTransReqType);
        // Merchant encryption key
        // $enckey = "";
        //$this->security->xss_clean($this->input->post('enckey'));
        $reqMsgDTO->setEnckey(ENC_KEY);
        // Merchant transaction currency
        //$currencyName = 'INR';
        //$this->security->xss_clean($this->input->post('currencyName'));
        $reqMsgDTO->setTrnCurrency(CUR_TYPE_INR);
        // Recurring period, if merchant transaction type is R
        $recurPeriod = "";
        //$this->security->xss_clean($this->input->post('recurPeriod'));
        $reqMsgDTO->setRecurrPeriod($recurPeriod);
        // Recurring day, if merchant transaction type is R
        $recurDay = "";
        //$this->security->xss_clean($this->input->post('recurDay'));
        $reqMsgDTO->setRecurrDay($recurDay);
        // No of recurring, if merchant transaction type is R
        $numberRecurring = "";
        //$this->security->xss_clean($this->input->post('numberRecurring'));
        $reqMsgDTO->setNoOfRecurring($numberRecurring);
        // Merchant response URl
        $responseUrl = base_url()."supplyPaymentResponse";
        //$this->security->xss_clean($this->input->post('responseUrl'));
        $reqMsgDTO->setResponseUrl($responseUrl);
        // Optional additional fields for merchant
         $reqMsgDTO->setAddField1(date('Y-m-d'));
         $reqMsgDTO->setAddField2(date('H:i:s'));
         $reqMsgDTO->setAddField3($this->student_id);
        // $reqMsgDTO->setAddField4('Schoolphins online Payment');
       //  $reqMsgDTO->setAddField5('Schoolphins online Payment');
        // $reqMsgDTO->setAddField6($_REQUEST['addField6']);
        // $reqMsgDTO->setAddField7($_REQUEST['addField7']);
        // $reqMsgDTO->setAddField8($_REQUEST['addField8']);
        
        /* 
         * After Making Request Message Send It To Generate Request 
         * The variable `$urlParameter` contains encrypted request message
         */
         //Generate transaction request message
        $paymentLog = array(
            'mid'=>M_ID,
            'student_id' =>$this->student_id,
            'remarks' =>$remarks,
            'request_type' => $meTransReqType,
            'fee_amount' => $fee_amount,
            'payment_status' =>'PENDING',
            'payment_date' => date('Y-m-d'),
            'payment_time' => date('h:i:s'),
            'created_by' => $this->student_id,
            'created_date_time' => date('Y-m-d H:i:s')
        );
        $row_id = $this->admission_model->addFeePaymentLog($paymentLog);
        $OrderId = 'SJPUCSUP'.$row_id;
        $reqMsgDTO->setOrderId($OrderId);
        $paymentLogUpdate = array(
            'order_id' => $OrderId,
        );
        $this->admission_model->updatePaymentLog($paymentLogUpdate, $row_id);
        $merchantRequest = "";
        
        $reqMsgDTO = $obj->generateTrnReqMsg($reqMsgDTO);
      
        if ($reqMsgDTO->getStatusDesc() == "Success"){
            //log_message('debug','dd=='.print_r($reqMsgDTO,true));
            $merchantRequest = $reqMsgDTO->getReqMsg();
        }
        $data['merchantRequest'] = $merchantRequest;
        $data['reqMsgDTO'] = $reqMsgDTO;
    
        $this->global['pageTitle'] = ''.TAB_TITLE.' : Supply Exam Fee I PUC' ;
        $this->loadViews("admission/feePaymentProcess", $this->global, $data, NULL);
    }




    public function supplyPaymentResponse(){
        $obj = new AWLMEAPI();
        $resMsgDTO = new ResMsgDTO();
        $reqMsgDTO = new ReqMsgDTO();
       
        $responseMerchant = $_REQUEST['merchantResponse'];
        
        $response = $obj->parseTrnResMsg( $responseMerchant , ENC_KEY );
        $data['response'] = $response;
        $filter = array();
        $filter['student_id'] = $this->student_id;
        $studentInfo =  $this->student_model->supplyStudentInfo($filter);
    
        //log_message('debug','response=='.print_r($response,true));
        $paid_fee_amount = $response->getTrnAmt()/100;
      
       $responseStatus =  $this->admission_model->getWorldlinePaymentLogByOrderID($response->getOrderId());
        
       if(!empty($studentInfo)){
        $receipt_number = $studentInfo->row_id;
        if($response->getStatusCode() == "S"){

             $paymentLogUpdate = array(
                'payment_mode' => $response->getAddField9(),
                'reference_number'=>$response->getPgMeTrnRefNo(),
                'payment_status' =>'SUCCESS',
                'receipt_number' =>$receipt_number,
                'amount_pending' =>0,
                'fee_amount' => $response->getTrnAmt()/100,
                'updated_by' => $this->student_id,
                'updated_date_time' => date('Y-m-d H:i:s')
            );
            $suuplyInfo = array(
                'payment_status' => 1,
            );
            $this->student_model->updateStudentSupplyInfo($studentInfo->row_id, $suuplyInfo);
            $mobile = $studentInfo->father_mobile.','.$studentInfo->mother_mobile;
            $msg = 'Dear Student, %n Thank you, %n Received Rs.'.$paid_fee_amount.' towards Supplementary Exam fees, Your receipt number:'.$receipt_number.' %n Principal - SJPUCB';
            $res = $this->sendSingleNumberSMS($mobile,$msg);
        }else{
            $paymentLogUpdate = array(
                'payment_status' =>'FAILED',
                'fee_amount' => $response->getTrnAmt()/100,
                'updated_by' => $this->student_id,
                'updated_date_time' => date('Y-m-d H:i:s')
            );
        }
        $data['receipt_number'] = $receipt_number;
       // $data['pending_fee_balance'] = $pending_fee_balance;
        $this->admission_model->updatePaymentLogByOrderId($paymentLogUpdate, $response->getOrderId());
       
      
       }else{
        $data['receipt_number'] = $responseStatus->receipt_number;
       // $data['pending_fee_balance'] = $responseStatus->amount_pending;
       }

       // log_message('debug','mode=='. );
        $this->global['pageTitle'] = ''.TAB_TITLE.' : Supplementary Fee Payment Response' ;
        $this->loadViews("supplementary/supplyFeeResponse", $this->global, $data, NULL);
    }

}

?>


