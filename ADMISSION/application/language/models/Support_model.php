<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Support_model extends CI_Model
{
    public function addStudentContactInfo($messageInfo){
        $this->db->trans_start();
        $this->db->insert('tbl_admission_contact_us', $messageInfo);
        $insert_id = $this->db->insert_id(); 
        $this->db->trans_complete();
        return $insert_id; 
    }
}