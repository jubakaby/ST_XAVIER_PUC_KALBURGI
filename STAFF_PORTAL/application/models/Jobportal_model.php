<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
class Jobportal_model extends CI_Model{
    function applicantListing($filters=array()){
        $this->db->select('applicant.row_id, applicant.subject, applicant.fullname, applicant.mobile_number, applicant.resume');
        $this->db->select('applicant.qualification, applicant.work_experience, applicant.bed_percent');
        $this->db->from('tbl_job_application_manager as applicant');
        $this->db->where('applicant.is_deleted',0);

        if(!empty($filters['subject'])){
            $this->db->like('applicant.subject', $filters['subject']);
        }
        if(!empty($filters['applicant_name'])){
            $this->db->like('applicant.fullname', $filters['applicant_name']);
        }
        if(!empty($filters['mobile_number'])){
            $this->db->like('applicant.mobile_number', $filters['mobile_number'], 'after');
        }
        if(!empty($filters['qualification'])){
            $this->db->like('applicant.qualification', $filters['qualification']);
        }
        if(!empty($filters['work_experience'])){
            $this->db->like('applicant.work_experience', $filters['work_experience']);
        }
        if(!empty($filters['bed_percent'])){
            $this->db->like('applicant.bed_percent', $filters['bed_percent'], 'after'); 
        }
        $this->db->order_by('row_id',"DESC");
        return $this->db->get()->result_object();
    }
    function getApplicantInfoByID($apcnt_id){
        $this->db->from('tbl_job_application_manager as applicant');
        $this->db->where('applicant.row_id',$apcnt_id);
        $this->db->where('applicant.is_deleted',0);
        return $this->db->get()->row();
    }
    function deleteApplicant($rowID,$details){
        $this->db->where('applicant.row_id', $rowID);
        $this->db->update("tbl_job_application_manager as applicant", $details);
        return $this->db->affected_rows();
    }
}