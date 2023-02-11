<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

class Timetable extends BaseController
{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('timetable_model');
        $this->isLoggedIn();   
    }

    public function viewTimeTable(){
        $class = $this->timetable_model->getClassById($this->section_name,$this->term_name);
        $data['classTimings'] = $this->timetable_model->getClassTimings();
        $data['timetableInfo'] = $this->timetable_model->getTimeTableInfoByClassID($class->row_id);
        $this->global['pageTitle'] = ''.TAB_TITLE.' : Time Table' ;
        $this->loadViews("student/timeTable", $this->global, $data, null);
    }


}

?>