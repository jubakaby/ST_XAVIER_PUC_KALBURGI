<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

require APPPATH . '/libraries/BaseControllerFaculty.php';

class Holiday extends BaseController {
    public function __construct()
    {
        parent::__construct();
        //$this->load->library('excel');
        $this->load->model('staff_model','staff');
        $this->load->model('leave_model','leave');
        $this->load->model('holiday_model','holiday');
        $this->isLoggedIn();
    }
    function viewHolidayList()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {        
            $filter = array();
            $reason = $this->input->post('reason'); 
            $by_date =$this->security->xss_clean($this->input->post('by_date')); 

            $data['reason'] = $reason;
            $data['by_date'] = $by_date;

            $filter['reason'] = $reason;
            $filter['by_date'] = $by_date;
          
            $this->load->library('pagination');
            $count = $this->holiday->getHolidayCount($filter);
			$returns = $this->paginationCompress ( "viewHolidayList/", $count, 100);
            $data['count_holiday'] = $count;
            $data['holidayRecords'] = $this->holiday->getHolidayListing($filter, $returns["page"], $returns["segment"]);
            $this->global['pageTitle'] = ''.TAB_TITLE.' : Holiday Details';
            $this->loadViews("holiday/viewHoliday", $this->global, $data , NULL);
        }
    }

            public function addNewHoliday(){
                if ($this->isAdmin() == true || $this->isSuperAdmin() != TRUE) {
                    $this->loadThis();
                } else {
                    $this->load->library('form_validation');
                    $this->form_validation->set_rules('fromDateFrom','Holiday Date','trim|required');
                    $this->form_validation->set_rules('reason','Reason','trim|required');
                    if($this->form_validation->run() == FALSE) {
                        $this->viewHolidayList();
                    } else {
                        $date_from = $this->security->xss_clean($this->input->post('fromDateFrom'));
                        $date_to = $this->security->xss_clean($this->input->post('fromDateTo'));
                        $reason = $this->security->xss_clean($this->input->post('reason'));
                        $all = $this->input->post('all');
                        $teaching = $this->input->post('teaching');
                        $non_teaching = $this->input->post('non_teaching');
                        $support_staff = $this->input->post('support_staff');
                        $students = $this->input->post('only_students');
                        if($all == '1'){
                            $teaching = 1;
                            $non_teaching = 1;
                            $support_staff = 1;
                            $students = 1;
                        }
                        $holidayInfo = array(
                            'holiday_date' => date('Y-m-d',strtotime($date_from)),
                            'holiday_date_to' => date('Y-m-d',strtotime($date_to)),
                            'reason' => $reason,
                            'support_staff_status' => $support_staff,
                            'teaching_staff_status' =>$teaching,
                            'students_status' => $students,
                            'non_teaching_staff_status' => $non_teaching,
                            'created_by' => $this->staff_id,
                            'created_date_time' =>date('Y-m-d H:i:s')
                        );
                        $return_id = $this->holiday->addNewHoliday($holidayInfo);
                        if($return_id > 0){
                            $this->session->set_flashdata('success', 'New Holiday Added Successfully');
                        }else{
                            $this->session->set_flashdata('error', 'New Holiday Add failed');
                        }
                        redirect('viewHolidayList');
                    }
                }
            }

            public function editHoliday($row_id = null)
            {
                if ($this->isAdmin() == true || $this->isSuperAdmin() != TRUE) {
                    $this->loadThis();
                } else {
                    if ($row_id == null) {
                        redirect('viewHolidayList');
                    }
                    $data['holidayInfo'] = $this->holiday->getHolidayInfoById($row_id);
                 
                    $this->global['pageTitle'] = ''.TAB_TITLE.' : Edit Holiday Info';
                    $this->loadViews("holiday/editHolidayInfo", $this->global, $data, null);
                }
            }
//update holiday info
            public function updateHoliday(){
                if ($this->isAdmin() == true || $this->isSuperAdmin() != TRUE) {
                    $this->loadThis();
                } else {
                    $row_id = $this->input->post('row_id');
                    $this->load->library('form_validation');
                    $this->form_validation->set_rules('fromDateFrom','Holiday Date','trim|required');
                    $this->form_validation->set_rules('reason','Reason','trim|required');
                    if($this->form_validation->run() == FALSE) {
                        redirect('editHoliday/'.$row_id);
                    } else {
                        $date_from = $this->security->xss_clean($this->input->post('fromDateFrom'));
                        $date_to = $this->security->xss_clean($this->input->post('fromDateTo'));
                        $reason = $this->security->xss_clean($this->input->post('reason'));
                        $all = $this->input->post('all');
                        $teaching = $this->input->post('teaching');
                        $non_teaching = $this->input->post('non_teaching');
                        $support_staff = $this->input->post('support_staff');
                        $students = $this->input->post('only_student');
                        if($all == '1'){
                            $teaching = 1;
                            $non_teaching = 1;
                            $support_staff = 1;
                            $students = 1;
                        }
                        $holidayInfo = array(
                            'holiday_date' => date('Y-m-d',strtotime($date_from)),
                            'holiday_date_to' => date('Y-m-d',strtotime($date_to)),
                            'reason' => $reason,
                            'support_staff_status' => $support_staff,
                            'teaching_staff_status' =>$teaching,
                            'non_teaching_staff_status' => $non_teaching,
                            'students_status' => $students,
                            'updated_by' => $this->staff_id,
                            'updated_date_time' =>date('Y-m-d H:i:s')
                        );
                        $return_id = $this->holiday->updateHoliday($holidayInfo,$row_id);
                        if($return_id){
                            $this->session->set_flashdata('success', 'Holiday Updated Successfully');
                        }else{
                            $this->session->set_flashdata('error', 'Holiday Update failed');
                        }
                        redirect('editHoliday/'.$row_id);
                    }
                }
            }
    public function deleteHoliday(){
        if($this->isAdmin() == TRUE || $this->isSuperAdmin() != TRUE){
            $this->loadThis();
        } else {   
            $row_id = $this->input->post('row_id');
            $holidayInfo = array('is_deleted' => 1,
            'updated_date_time' => date('Y-m-d H:i:s'),
            'updated_by' => $this->staff_id
            );
            $result = $this->holiday->updateHoliday($holidayInfo, $row_id);
            if ($result == true) {echo (json_encode(array('status' => true)));} else {echo (json_encode(array('status' => false)));}
        } 
    }


}
