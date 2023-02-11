<?php if(!defined('BASEPATH')) exit('No direct script access allowed');


class Timetable_model extends CI_Model
{
    public function getClassTimings(){
        $this->db->from('tbl_class_timings_info as time');
        $this->db->order_by('time.row_id', 'ASC');
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }

    public function getTimeTableInfoByClassID($class_id){
        $this->db->select('
        time.time_row_id,
        time.week_name,
        tstaff.subject_type,
        sub.sub_type as sub_type,
        sub.name as sub_name,
        staff.name as staff_name');
        $this->db->from('tbl_time_table_info as time');
        $this->db->join('tbl_staff_teaching_subjects as tstaff', 'tstaff.row_id = time.staff_subjects_row_id','left');
        $this->db->join('tbl_staff as staff', 'staff.staff_id = tstaff.staff_id','left');
        $this->db->join('tbl_subjects as sub', 'sub.subject_code = tstaff.subject_id','left');
        $this->db->where('time.class_section_row_id', $class_id);
        $this->db->where('time.is_deleted', 0);
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }
    
    public function getClassById($section_name,$term_name){
        $this->db->from('tbl_class_section_info_new as class');
        $this->db->where('class.term_name', $term_name);
        $this->db->where('class.section_name', $section_name);
        $this->db->where('class.is_deleted', 0);
        $query = $this->db->get();
        return $query->row();
    }
}