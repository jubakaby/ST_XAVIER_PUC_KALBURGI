<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
    class SMS_model extends CI_Model
    {

        public function getSMSSentReport($filter) {
            $this->db->select('acdmic.term_name, 
                acdmic.stream_name, 
                acdmic.student_id,
                log.application_no,
                log.mobile_number as mobile,
                log.sms_count,
                log.sent_date, 
                log.message, 
                log.status');
            $this->db->from('tbl_student_bulk_sms_log as log');
          //  $this->db->join('tbl_students_info as std', 'std.application_no = log.application_no','left');
            $this->db->join('tbl_student_academic_info as acdmic', 'acdmic.application_no = log.application_no','left');
            if($filter['term_name'] != 'ALL'){
                $this->db->where('acdmic.term_name', $filter['term_name']);
            }
            if(!empty($filter['date_search'])){
                $this->db->where('log.sent_date', date('Y-m-d',strtotime($filter['date_search'])));
            }
            if(!empty($filter['mobile'])){
                $this->db->where('log.mobile_number', $filter['mobile']);
            }
            $this->db->where('acdmic.is_deleted', 0);
            $this->db->order_by('log.sent_date','ASC');
            $query = $this->db->get();
            return $query->result();
        }
        public function getMobileNumberForSendBulkSMS($term_name,$stream_name,$mobile_type){
            if($mobile_type == 'onlyStudent'){
                $this->db->select('std.mobile_one as mobile, std.application_no');
                $this->db->from('tbl_students_info as std');
                $this->db->join('tbl_student_academic_info as acdmic', 'acdmic.application_no = std.application_no','left');
             
                if($term_name == 'I PUC'){
                    $this->db->where('acdmic.term_name', 'I PUC');
                    $this->db->where('std.intake_year_id', 2020);
                }else{
                    $this->db->where('acdmic.term_name', 'II PUC');
                    $this->db->where('std.intake_year_id', 2019);
                }
                if($stream_name != 'ALL'){
                    $this->db->where('acdmic.stream_name', $stream_name);
                }
               // $this->db->where('std.mobile_one is NOT NULL', NULL, FALSE);
               
                $this->db->where('std.is_deleted', 0);
                $this->db->group_by('std.mobile_one');
                $query = $this->db->get();
                return $query->result();
            }else{
                $this->db->select('family.mobile_no as mobile, acdmic.application_no');
                $this->db->from('tbl_student_family_info as family');
                $this->db->join('tbl_students_info as std', 'std.application_no = family.application_no','left');
                $this->db->join('tbl_student_academic_info as acdmic', 'acdmic.application_no = family.application_no','left');
                // if($mobile_type == "onlyGuardian"){
                //     $this->db->where('family.relation_type', "GUARDIAN"); 
                // }
                if($term_name == 'I PUC'){
                    $this->db->where('acdmic.term_name', 'I PUC');
                    $this->db->where('std.intake_year_id', 2020);
                }else{
                    $this->db->where('acdmic.term_name', 'II PUC');
                    $this->db->where('std.intake_year_id', 2019);
                }
                if($stream_name != 'ALL'){
                    $this->db->where('acdmic.stream_name', $stream_name);
                }
                //$this->db->where('family.mobile_no!=',"");
                //$this->db->where(array("family.mobile_no!=" => "", "family.mobile_no IS NOT NULL" => null));
               // $this->db->where('std.intake_year_id', 2019);
              
                $this->db->where('acdmic.is_deleted', 0);
               // $this->db->where('std.is_current', 1);
                //$this->db->where('family.mobile_no!=','NULL');
                $this->db->group_by('family.mobile_no');
                $query = $this->db->get();
                
                return $query->result();
            }
        


        }

        function saveSMSLog($msg){
            $this->db->trans_start();
            $this->db->insert('tbl_student_bulk_sms_log', $msg);
            $insert_id = $this->db->insert_id();
            $this->db->trans_complete();
            return $insert_id;
        }

        public function totalSMSSentCount() {
            $this->db->select('SUM(sms_count) as total_sent_sms');
            $this->db->from('tbl_student_bulk_sms_log as log');
            $query = $this->db->get();
            return $query->row();
        }
    
        //staff info for sms
        public function getAllStaffInfoForSMS()
        {
            $this->db->select('staff.user_name, 
                staff.type, 
                staff.row_id,
                staff.staff_id,
              staff.mobile_one');
            $this->db->from('tbl_staff as staff'); 
           
            $this->db->where('staff.staff_id !=', '123456');
            $this->db->where('staff.is_deleted', 0);
            $query = $this->db->get();
            return $query->result();
        }


        public function getNewAdmittedStudentMobileNumber($term_name,$stream_name,$mobile_type){
            $this->db->select('personal.application_number,personal.father_mobile,
            personal.mother_mobile,personal.student_mobile');
            $this->db->from('tbl_student_personal_details as personal');
            $this->db->join('tbl_admission_students_status as application', 'application.application_number = personal.application_number','left');
            $this->db->where('application.application_number !=', "");
            $this->db->where('application.admission_status', 1);
            $this->db->where('application.fee_payment_status', 1);
            $this->db->where('application.is_deleted', 0);
            $this->db->group_by('application.application_number');
            $query = $this->db->get();
            return $query->result();
        }



        public function getStudentInfoForSMS($term_name,$stream_name,$section_name){
          
                $this->db->select('acdmic.application_no, acdmic.student_id, std.mobile_one');
                $this->db->from('tbl_students_info as std');
                $this->db->join('tbl_student_academic_info as acdmic', 'acdmic.application_no = std.application_no','left');
             
                if($term_name == 'I'){
                    $this->db->where('acdmic.term_name', 'I PUC');
                    $this->db->where('std.intake_year_id', 2020);
                }else{
                    $this->db->where('acdmic.term_name', 'II PUC');
                    $this->db->where('std.intake_year_id', 2019);
                }
                if($stream_name != 'ALL'){
                    $this->db->where('acdmic.stream_name', $stream_name);
                }
                
                if($section_name != 'ALL'){
                    $this->db->where('acdmic.section_name', $section_name);
                }
               // $this->db->where('std.mobile_one is NOT NULL', NULL, FALSE);
               
                $this->db->where('std.is_deleted', 0);
                $query = $this->db->get();
                return $query->result();
            
    }


    public function getStudentParentsNumberByAppNo($app_no){
      
            $this->db->from('tbl_student_family_info as family');
     
            $this->db->where('family.application_no', $app_no);
           
            $this->db->where('acdmic.is_deleted', 0);
           // $this->db->where('std.is_current', 1);
            //$this->db->where('family.mobile_no!=','NULL');
            $this->db->group_by('family.mobile_no');
            $query = $this->db->get();
            
            return $query->result();
    }


    //get primary contact number
    function getStudentMobileNumberById($application_no,$primary_mobile){
        $this->db->from('tbl_student_family_info as family');
        $this->db->where('family.application_no', $application_no);
        $this->db->where('family.relation_type', $primary_mobile);
        $this->db->where('family.is_deleted', 0);
        $query = $this->db->get();
        return $query->row();
    
    }
    
    // save single message log
    function addNewSMS_Log($smsLog){
        $this->db->trans_start();
        $this->db->insert('tbl_student_bulk_sms_log', $smsLog);
        $insert_id = $this->db->insert_id();
        $this->db->trans_complete();
        return $insert_id;
    }


    function getNumbersByTerm($term){
    $this->db->from('tbl_students_info as std');
    $this->db->where('std.term_name', $term);
    $this->db->where('std.is_active', 1);
    $this->db->where('std.is_deleted', 0);
    $query = $this->db->get();
    return $query->result();  
    // if($term == 'II PUC'){
    //    // $this->db->select('std.student_id, std.father_mobile,std.mother_mobile,std.mobile');
    //     $this->db->from('tbl_second_puc_students_info as std');
    //     $this->db->where('std.is_deleted', 0);
    //     $this->db->where('std.term_name', $term);
    //     $query = $this->db->get();
    //     return $query->result();
    // }else if($term == 'I PUC'){
    //     //$this->db->select('std.student_id, std.father_mobile,std.mother_mobile,std.mobile');
    //     $this->db->from('tbl_first_puc_students_info as std');
    //     $this->db->where('std.is_deleted', 0);
    //     $this->db->where('std.term_name', $term);
    //     $query = $this->db->get();
    //     return $query->result();  
    // }   
}

   function getNumbersByTerms($term_name){
        $this->db->from('tbl_students_info as std');
        $this->db->where('std.term_name', $term_name);
        $this->db->where('std.is_active', 1);
        $this->db->where('std.is_deleted', 0);
        $query = $this->db->get();
        return $query->result();  
        // if($term == 'II PUC'){
        //    // $this->db->select('std.student_id, std.father_mobile,std.mother_mobile,std.mobile');
        //     $this->db->from('tbl_second_puc_students_info as std');
        //     $this->db->where('std.is_deleted', 0);
        //     $this->db->where('std.term_name', $term);
        //     $query = $this->db->get();
        //     return $query->result();
        // }else if($term == 'I PUC'){
        //     //$this->db->select('std.student_id, std.father_mobile,std.mother_mobile,std.mobile');
        //     $this->db->from('tbl_first_puc_students_info as std');
        //     $this->db->where('std.is_deleted', 0);
        //     $this->db->where('std.term_name', $term);
        //     $query = $this->db->get();
        //     return $query->result();  
        // }   
    }


}
?>