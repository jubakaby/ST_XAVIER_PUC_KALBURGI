<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

require APPPATH . '/libraries/BaseControllerFaculty.php';

class SMS extends BaseController {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('SMS_model','sms');
        $this->load->model('students_model','student');
        // $this->load->model('billing_model','bill');
              $this->load->model('timetable_model','timetable');
              $this->load->model('push_notification_model');
        $this->isLoggedIn();
    }

    public function viewSMSPortal(){
        if ($this->isAdmin() == true ) {
            $this->loadThis();
        } else {
            $this->global['pageTitle'] = ''.TAB_TITLE.' : SMS Portal';
            $data['sms_balance'] =  $this->checkSMSBalance();
            $this->loadViews("sms/send_bulk_sms.php", $this->global, $data, null);
        }
    }
    public function openSMSSentReport(){
        if ($this->isAdmin() == true ) {
            $this->loadThis();
        } else {
            $this->global['pageTitle'] = ''.TAB_TITLE.' : SMS Report';
            $data['sms_balance'] =  $this->checkSMSBalance();
            $data['sms_count'] =  $this->sms->totalSMSSentCount();
            $term_name = $this->security->xss_clean($this->input->post('term_name'));
            $date = $this->security->xss_clean($this->input->post('date_search'));
            if(empty($date)){
                $data['date_search'] = date('d-m-Y');
            }else{
                $data['date_search'] = $date;
            }
            if(empty($term_name)){
                $data['term_name'] = 'ALL';
            }else{
                $data['term_name'] = $term_name;
            }
            $data['mobile'] = $this->security->xss_clean($this->input->post('mobile'));
            $this->loadViews("sms/sms_sent_report", $this->global, $data, null);
        }
    }

    
    public function get_sms_report(){
        if($this->isAdmin() == TRUE || $this->isSuperAdmin() != TRUE )
        {
            $this->loadThis();
        } else {
            $draw = intval($this->input->post("draw"));
            $start = intval($this->input->post("start"));
            $length = intval($this->input->post("length"));
            $term_name = $this->security->xss_clean($this->input->post('term_name'));
            $date_search = $this->security->xss_clean($this->input->post('date_search'));
            $mobile = $this->security->xss_clean($this->input->post('mobile'));
            $filter = array();
           
            $filter['term_name'] = $term_name;
            $filter['date_search'] = $date_search;
            $filter['mobile'] = $mobile;
            $data_array_new = [];
            $accountDetails = $this->sms->getSMSSentReport($filter);
            foreach($accountDetails as $account) {
    

                $data_array_new[] = array(
                    date('d-m-Y',strtotime($account->sent_date)),
                    $account->student_id,
                    $account->term_name,
                    $account->stream_name,
                    $account->message,
                    $account->mobile,
                    $account->sms_count,
                    $account->status,
                );
            }
            $count = count($accountDetails);
            $result = array(
                "draw" => $draw,
                    "recordsTotal" => $count,
                    "recordsFiltered" => $count,
                    "data" => $data_array_new
            );
            echo json_encode($result);
            exit();
        }
    }

    //call from ajax /vuejs Method
    public function checkSMSBalanceVueCall(){
        if ($this->isAdmin() == true ) {
            $this->loadThis();
        } else {
           // $this->global['pageTitle'] = ''.TAB_TITLE.' : SMS Portal';
            $sms_balance =  $this->checkTextSMSBalance();
            //$this->loadViews("sms/send_bulk_sms.php", $this->global, $data, null);
            header('Content-type: text/plain'); 
                // set json non IE
            header('Content-type: application/json'); 
            echo json_encode($sms_balance);
            exit(0); 
        }
    }

    public function sendSMSToStaff(){
        if ($this->isAdmin() == true ) {
            $this->loadThis();
        } else {
            $this->global['pageTitle'] = ''.TAB_TITLE.' : Staffs Details';
            $this->load->library('form_validation');
            $this->form_validation->set_rules('message','Message','trim|required');
            if($this->form_validation->run() == FALSE)
            {
                $this->session->set_flashdata('error', 'Sending Staff SMS Failed!');
                $this->loadViews("staffs/staffs", $this->global, NULL , NULL);
            }
            else
            {
                $number = '';
                $message = $this->security->xss_clean($this->input->post('message'));
                $staffInfo = $this->sms->getAllStaffInfoForSMS();
                $sms_cost = $this->countSmsCost(strlen($message));
                foreach($staffInfo as $staff){
                    if(strlen($staff->mobile_one) == 10){
                        $number .= $staff->mobile_one.',';
                        $smsLog = array(
                            'sent_date' => date('Y-m-d'),	
                            'sent_time' => date('H:m:s'),
                            'application_no' => 'STF-'.$staff->staff_id,
                            'message' => $message,
                            'status' => 'success',
                            'sent_by' => $this->staff_id,
                            'sms_count' => $sms_cost,
                            'mobile_number' => $staff->mobile_one
                        );
                        $this->sms->saveSMSLog($smsLog); 
                    }
                }
               // $smsStatus['status'] = 'success';
                $smsStatus = $this->sendSMS($number,$message);
                if($smsStatus['status'] == 'success'){
                    $this->session->set_flashdata('success', 'SMS Sent Successfully');
                }else{
                    $this->session->set_flashdata('error', 'Something Went wrong please contact us');
                }
                $this->loadViews("staffs/staffs", $this->global, NULL , NULL);
            }
        }
    }
    public function sendBulkSMS(){
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }else{
            $this->load->library('form_validation');
            $this->form_validation->set_rules('message','Message','trim|required');
            $this->form_validation->set_rules('term_name','Term Name','trim|required');
            $this->form_validation->set_rules('stream_name','Stream Name','trim|required');
            $this->form_validation->set_rules('section_name','Section Name','trim|required');
            if($this->form_validation->run() == FALSE)
            {
                $this->viewSMSPortal();
            }
            else
            {
                $number = "";
                $term_name = $this->security->xss_clean($this->input->post('term_name'));
                $stream_name = $this->security->xss_clean($this->input->post('stream_name'));
                
                $parentsMobile = $this->security->xss_clean($this->input->post('parentsMobile'));
                $onlyStudents = $this->security->xss_clean($this->input->post('onlyStudent'));
                $onlyGuardian = $this->security->xss_clean($this->input->post('onlyGuardian'));
                $sms_cost = $this->security->xss_clean($this->input->post('sms_cost'));
                $message = $this->security->xss_clean($this->input->post('message'));
               // log_message('debug','sms_cost==='.$sms_cost);
               if(empty($parentsMobile) && empty($onlyStudents) && empty($onlyGuardian)){
                $this->session->set_flashdata('error', 'Please Choose any option to send SMS');
                $this->viewSMSPortal();
               }else{
                $studentInfo = $this->sms->getStudentInfoForSMS($term_name,$stream_name,$section_name);
                foreach($studentInfo as $std){
                    $number = "";
                    $parentsNumber = $this->sms->getStudentParentsNumberByAppNo($std->application_no);
                    log_message('debug','student_id==='.$std->student_id);
                    if(!empty($onlyStudents)){
                     if(strlen($std->mobile_one) == 10){
                         $number .= $std->mobile_one.',';
                         $smsLog = array(
                             'sent_date' => date('Y-m-d'),	
                             'sent_time' => date('H:m:s'),
                             'application_no' => $std->application_no,
                             'message' => $message,
                             'status' => 'success',
                             'sent_by' => $this->staff_id,
                             'sms_count' => $sms_cost,
                             'mobile_number' => $std->mobile_one
                         );
                    // $this->sms->saveSMSLog($smsLog); 
                    // log_message('debug','student_mobile==='.$std->mobile_one);
                   
                     }
                    }
                    if(!empty($parentsMobile)){
                        foreach($parentsNumber as $parent){
                            if(strlen($parent->mobile_one) == 10 && $parent->relation_type != "GUARDIAN"){
                            $number .= $parent->mobile_one.',';
                            $smsLog = array(
                                'sent_date' => date('Y-m-d'),	
                                'sent_time' => date('H:m:s'),
                                'application_no' => $std->application_no,
                                'message' => $message,
                                'status' => 'success',
                                'sent_by' => $this->staff_id,
                                'sms_count' => $sms_cost,
                                'mobile_number' => $parent->mobile_one
                            );
                            // log_message('debug','student_mobile==='.$parent->mobile_one);
                             // $this->sms->saveSMSLog($smsLog); 
                        }
                        if(!empty($onlyGuardian)){
                            if(strlen($parent->mobile_one) == 10 && $parent->relation_type == "GUARDIAN"){
                                $number .= $parent->mobile_one.',';
                                $smsLog = array(
                                    'sent_date' => date('Y-m-d'),	
                                    'sent_time' => date('H:m:s'),
                                    'application_no' => $std->application_no,
                                    'message' => $message,
                                    'status' => 'success',
                                    'sent_by' => $this->staff_id,
                                    'sms_count' => $sms_cost,
                                    'mobile_number' => $parent->mobile_one
                                );
                                // log_message('debug','gurdiean==='.$parent->mobile_one);
                                 // $this->sms->saveSMSLog($smsLog); 
                            }
                        }
                      
                        }
                    }
                    // log_message('debug','total_number==='.$number);
                    $smsStatus = 'success ';//$this->sendSMS($number,$message);

                }

                $response_array = explode(" ",$smsStatus);
                if($response_array[0] == 'success'){
                    $this->session->set_flashdata('success', 'SMS Sent Successfully');
                }else{
                    $this->session->set_flashdata('warning', 'Something Went wrong please contact us');
                }
                redirect('viewSMSPortal');
               }
               
            }
           
        }
        
    }

//send sms to single number
    public function sendSMS_to_SingleNumber(){
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }else{
            $number = "";
            $mobile_no = $this->security->xss_clean($this->input->post('mobile'));
            $message = $this->security->xss_clean($this->input->post('msg'));
            $mobile = explode(',', $mobile_no);
            $sms_count = $this->countSmsCost(strlen($message));
            for($i=0;$i<count($mobile); $i++){
                //$number .= $mobile[$i].',';
                $response = $this->sendSMS($mobile[$i],$message);
                $response_array = explode(" ",$response);
              //  log_message('error', 'JSON_reponse'.);
              if($response_array[0] == 'success'){
                $smsLog = array(
                    'sent_date' => date('Y-m-d'),	
                    'sent_time' => date('h:m:s'),
                    'application_no' => "CUSTOM",
                    'message' => $message,
                    'status' => 'success',
                    'sent_by' => $this->staff_id,
                    'sms_count' => $sms_count,
                    'mobile_number' => $mobile[$i]
                );
              }else{
                $smsLog = array(
                    'sent_date' => date('Y-m-d'),	
                    'sent_time' => date('h:m:s'),
                    'application_no' => "CUSTOM",
                    'message' => $message,
                    'status' => 'failed',
                    'sent_by' => $this->staff_id,
                    'sms_count' => 0,
                    'mobile_number' => $mobile[$i]
                );
               
              }
              $this->sms->saveSMSLog($smsLog);
                }
              
                if($response_array[0] == 'success'){
                    $status =  "success";
                }else{
                    $status = "error";
                }
                
                header('Content-type: text/plain'); 
                // set json non IE
                header('Content-type: application/json'); 
                echo json_encode($status);
                exit(0); 
            }
            
    }
    
    public function sendSingleSMS(){
        if($this->isAdmin() == TRUE){
            $this->loadThis();
        }else{
            $filter = array();
            $to = $this->input->post('to_msg');
            $students = json_decode(stripslashes($this->input->post('student_id')));
            // $onlyParents = $this->input->post('onlyParents');
            // $onlyStudent = $this->input->post('onlyStudent');
            $message = $this->input->post('message');
            // $term = $this->input->post('term');
            $message = "$to %n $message -Principal, AGNES";
            foreach($students as $student_id){  
                $mobile = "";         
                $filter['student_id'] = $student_id;
                $stdInfo = $this->student->getStudentInfoByStudentId($filter);
                $data_students = $this->sms->getStudentMobileNumberById($stdInfo->application_no,$stdInfo->primary_mobile);
                $mobile_no = $data_students->mobile_no;

                
                if($mobile_no != ""){
                    $status = $this->sendSingleNumberSMS($mobile_no,$message);
                    $smsLog = array(
                        'date_time' => date('Y-m-d H:i:s'),
                        'student_id' => $student_id,
                        'message' => $message,
                        'status' => $status,
                        'sent_by' => $this->staff_id,
                        'sms_count' => 1,
                        'mobile_number' => $mobile_no
                    );
                    $return_id = $this->sms->addNewSMS_Log($smsLog);
                }
            }
        echo "success";
        exit;
        }
    }


    public function sendSMSAbsentedStudents(){
        if($this->isAdmin() == TRUE){
            $this->loadThis();
        }else{
            $term_name = $this->security->xss_clean($this->input->post('term_name'));
            $students = $this->sms->getNumbersByTerms($term_name);

            foreach ($students as $student) {
                $absentedStudentInfo = $this->timetable->getStudentAbsentDetails(date("Y-m-d"),$student->student_id,$term_name);
                $count = 0;
                
                foreach($absentedStudentInfo as $infoAb){
                    if($count == 0){
                    // if($infoAb->father_mobile != ""){
                    // $mobile = $infoAb->father_mobile;
                    // }else{
                    // $mobile = $infoAb->father_mobile.','.$infoAb->mother_mobile;
                    // }
                    
                    $mobile = $infoAb->father_mobile.','.$infoAb->mother_mobile;
                    $student_name = strtoupper($infoAb->student_name);
                    // $student_name = explode(" ", $student_name);
                    // $student_name = $student_name[0].' '.$student_name[1];
                    $absent_date = date("d-m-Y");
                    $subject_name = strtoupper(substr($infoAb->sub_name, 0, 5));
                    } else {

                        if(!(preg_match("/{$infoAb->sub_name}/i", $subject_name))) {
                            $subject_name .= ', '.strtoupper(substr($infoAb->sub_name, 0, 5));
                        }
                    }
                    $count++;
                }
                if($absentedStudentInfo != NULL){
                    // $finalMessage = 'Your ward '.$student_name.' is absent for the subject '.$subject_name.' on '.$absent_date.'.Kindly contact the office to confirm.-Principal, SJPUC';
                    // $finalMessage = 'Your ward '.$student_name.' is absent for the subject '.$subject_name.' on '.$absent_date.'.Kindly contact the office to confirm.-Principal, SJPUC';
                    

                     $finalMessage = 'Dear Parent, your ward '.$student_name.' is absent for the subject '.$subject_name.' on '.$absent_date.' Kindly contact the office to confirm - Principal, SJPUC.';

                    $smsStatus = $this->sendAbsentSMS($mobile, $finalMessage);
                if($smsStatus == 'success'){
                        $attendanceUpdateInfo = array(
                            'sms_sent_status' => 1,
                            'updated_date_time' => date('Y-m-d H:i:s')
                        );

                        $smsLog = array(
                            'date_time' => date('Y-m-d H:i:s'),
                            'student_id' => $student->student_id,
                            'message' => $finalMessage,
                            'status' => $smsStatus,
                            'sent_by' => $this->vendorId,
                            'sms_count' => 1,
                            'mobile_number' => $mobile
                        );

                        $this->sms->addNewSMS_Log($smsLog);
                        $this->timetable->updateAttendanceSMSStatus($student->student_id,date("Y-m-d"),$attendanceUpdateInfo);

                    }
                    //FCM////////////
                    $all_users_token = $this->push_notification_model->getSingleStudentsToken($student->student_id);
                    $tokenBatch = array_chunk($all_users_token,500);
                    for($itr = 0; $itr < count($tokenBatch); $itr++){
                        $this->push_notification_model->sendMessage('Absent For Class',$finalMessage,$tokenBatch[$itr],"student");
                    }
                    //FCM///////////
                }
            }
            echo "success";
            exit;
        }
    }

    public function checkTextSMSBalance(){
            $apiKey = urlencode(API_KEY);
            // Prepare data for POST request
            $data = array('apikey' => $apiKey);
            // Send the POST request with cURL
            $ch = curl_init('https://api.textlocal.in/balance/');
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $response = curl_exec($ch);
            curl_close($ch);
            $json = json_decode($response, true);
            // Process your response here
           // $data['balance']= $json['balance']['sms'];
            return $json;
    }

    // single sms
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
        // log_message('error', 'JSON='.print_r($json));
        curl_close($ch);
        return $status;

    }



    function sendSMS($mobile, $message){
        // $message = rawurlencode($message);  
        // $data = "username=".USERNAME_TEXTLOCAL."&hash=".HASH_TEXTLOCAL."&message=".$message."&sender=".SENDERID_TEXTLOCAL."&numbers=".$mobile;
        // $ch = curl_init('http://api.textlocal.in/send/?');
        // curl_setopt($ch, CURLOPT_POST, true);
        // curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        // $result_sms = curl_exec($ch); // This is the result from the API
        // $response = json_decode($result_sms, true);
        // //log_message('error', 'JSON=' );
     
        // curl_close($ch);
        // return $response;
        $request =""; //initialise the request variable
        $param['method']= "sendMessage";
        $param['send_to'] = $mobile;
        $param['msg'] = $message;
        $param['userid'] = "2000115198";
        $param['password'] = "adminjnpuc";
        $param['v'] = "1.1";
        $param['msg_type'] = "TEXT"; //Can be "FLASH”/"UNICODE_TEXT"/”BINARY”
        $param['auth_scheme'] = "PLAIN";
        //Have to URL encode the values
        foreach($param as $key=>$val) {
        $request.= $key."=".urlencode($val);
        //we have to urlencode the values
        $request.= "&";
        //append the ampersand (&) sign after each parameter/value pair
        }
        $request = substr($request, 0, strlen($request)-1);
        //remove final (&) sign from the request
        $url = "http://enterprise.smsgupshup.com/GatewayAPI/rest?".$request;
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        // curl_close($ch);
        // echo $curl_scraped_page;
       // $response = json_decode($result_sms, true);
        //log_message('debug', 'JSON='.print_r($result_sms,true));
     
        curl_close($ch);
        return $response;
    }

          public function sendAbsentSMS($mobile,$msg){
       
        $message = rawurlencode($msg);  
        $data = "username=".USERNAME_TEXTLOCAL."&hash=".HASH_TEXTLOCAL."&message=".$message."&sender=".SENDERID_TEXTLOCAL."&numbers=".$mobile;
        $ch = curl_init('https://api.textlocal.in/send/?');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result_sms = curl_exec($ch); // This is the result from the API
        
        $json = json_decode($result_sms, true);
        log_message('error', 'JSON='.print_r($json,true) );
        $status= $json['status'];
       
        log_message('error', 'RESULT API'.$message);
           log_message('error', 'status'.$status);
        curl_close($ch);
        return $status;
    }



    function sendSMSBulkNumber($mobile, $message){

        $request =""; //initialise the request variable
        $param['method']= "sendMessage";
        $param['send_to'] = $mobile;
        $param['msg'] = $message;
        $param['userid'] = "2000115198";
        $param['password'] = "adminjnpuc";
        $param['v'] = "1.0";
        $param['msg_type'] = "TEXT"; //Can be "FLASH”/"UNICODE_TEXT"/”BINARY”
        $param['auth_scheme'] = "PLAIN";
        //Have to URL encode the values
        foreach($param as $key=>$val) {
        $request.= $key."=".urlencode($val);
        //we have to urlencode the values
        $request.= "&";
        //append the ampersand (&) sign after each parameter/value pair
        }
        $request = substr($request, 0, strlen($request)-1);
        //remove final (&) sign from the request
        $url = "http://enterprise.smsgupshup.com/GatewayAPI/rest?".$request;
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        // curl_close($ch);
        // echo $curl_scraped_page;
       // $response = json_decode($result_sms, true);
        log_message('debug', 'JSON='.print_r($response,true));
     
        curl_close($ch);
        return $response;
    }
    function countSmsCost($len) {

       if($len <= 160){
           return 1;
       }else if($len >= 161 && $len <= 306){
           return 2;
       }else if($len >= 306 && $len <= 459){
        return 3;
    }else if($len >= 459 && $len <= 612){
        return 4;
    }else if($len >= 612 && $len <= 765){
        return 5;
    }else if($len >= 765 && $len <= 918){
        return 6;
    }else if($len >= 918 && $len <= 1071){
        return 7;
    }else if($len >= 1071 && $len <= 1224){
        return 8;
    }else if($len >= 1224 && $len <= 1377){
        return 9;
    }else if($len >= 1377 && $len <= 1530){
        return 10;
    }else{
        return 11;
    }
     
    }

   
}