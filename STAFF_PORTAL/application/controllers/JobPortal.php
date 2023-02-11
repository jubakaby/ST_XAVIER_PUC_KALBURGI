<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

require APPPATH . '/libraries/BaseControllerFaculty.php';

class JobPortal extends BaseController{
    function __construct(){
        parent::__construct();        
        $this->isLoggedIn();
        $this->load->model('jobportal_model',"jobportal");
        $this->load->library('pagination');
        $this->load->helper('date');
    }
    function index(){
        if($this->isAdmin() == TRUE) {
            $this->loadThis();
        } else {        
            $data['subject'] = $this->input->post('subject');
            $data['applicant_name'] = $this->input->post('applicant_name');
            $data['mobile_number'] = $this->input->post('mobile_number');
            $data['qualification'] = $this->input->post('qualification');
            $data['work_experience'] = $this->input->post('work_experience');
            $data['bed_percent'] = $this->input->post('bed_percent');
            $data['applicants'] = $this->jobportal->applicantListing($data);
            $data['totalApplicants'] = count($data['applicants']);
            $this->loadViews('job_portal/listing', $this->global, $data, null);
        }
    }
    function viewApplicant($apcnt_id=""){
        if($this->isAdmin() == TRUE) {
            $this->loadThis();
        } else {        
            $data['info'] = $this->jobportal->getApplicantInfoByID($apcnt_id);
            if(empty($data['info'])){
                redirect('jobPortal');
            }else{
                $this->loadViews('job_portal/view_applicant', $this->global, $data, null);
            }
        }
    }
    function deleteApplicant(){
        if($this->isAdmin() == TRUE) {
            $this->loadThis();
        } else {        
            if($this->input->server('REQUEST_METHOD') === 'POST'){
                if(!empty($this->input->post('row_id'))){
                    $details = array(
                        'is_deleted' => 1,
                        'updated_by' => $this->session->userdata('staff_id'),
                        'updated_date_time' =>  mdate("%Y-%m-%d %h:%i:%s")
                    );
                    echo $this->jobportal->deleteApplicant($this->input->post('row_id'),$details);
                }else{
                    echo 0;
                }
            }
        }
    }
}