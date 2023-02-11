<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

require APPPATH . '/libraries/BaseControllerFaculty.php';

class Attendance extends BaseController {
    public function __construct()
    {
        parent::__construct();
        $this->load->library('excel');
        $this->load->model('staff_model','staff');
        $this->load->model('leave_model','leave');
        $this->isLoggedIn();
    }

    public function getMyAttendanceInfoPage(){
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }else {
            $data_array_new = [];
            $date = date('Y-m-d',strtotime($this->input->post('date')));
            $dateInfo = $this->staff->getPunchDateByStaffId($this->staff_id);
            $late_count = 0;
            $punch_out_nill = 0;
          
            
            foreach($dateInfo as $staff) {
                $staff_data = $this->staff->getAllStaffAttendanceFromModel($this->staff_id,$staff->punch_date);
                if(!empty($staff_data->staff_id)){
                    $check_in_compare = new DateTime(date("h:i:s",strtotime($staff_data->in_time)));
                    $check_out_compare = new DateTime(date("h:i:s",strtotime($staff_data->out_time)));
                    $interval = $check_in_compare->diff($check_out_compare);
                    if($staff_data->shift_code != 'OS' ){
                        if(!empty($staff_data->in_time)){
                            $actual_in_time = new DateTime($staff_data->start_time);
                            $time_diff = $check_in_compare->diff($actual_in_time);
                            if($time_diff->format('%R%i') < 0){
                              $late_count++;
                            }
                        }else{
                            
                        }
                    }
        
                    if($interval->format('%h') <= 2) {
                        $punch_out_nill++;
                    }else{
                        $check_out = $staff_data->out_time;
                    }
                 
                }
           }
            $data['total_late'] = $late_count;
            $data['punch_out_nill'] = $punch_out_nill;
            $this->global['pageTitle'] = 'SJBHS: My Attendance Details ';
            $this->loadViews("staffs/viewMyAttendance", $this->global, $data, NULL);
        }
    }

    public function get_my_attendance_info(){
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }else {
            $draw = intval($this->input->post("draw"));
            $start = intval($this->input->post("start"));
            $length = intval($this->input->post("length"));
              $data_array_new = [];
              $date = date('Y-m-d',strtotime($this->input->post('date')));
              $dateInfo = $this->staff->getPunchDateByStaffId($this->staff_id);
              $late_count = 0;
              $punch_out_nill = 0;
            
              
              foreach($dateInfo as $staff) {
                  $staff_data = $this->staff->getAllStaffAttendanceFromModel($this->staff_id,$staff->punch_date);
                  if(!empty($staff_data->staff_id)){
                      $check_in_compare = new DateTime(date("H:i:s",strtotime($staff_data->in_time)));
                      $check_out_compare = new DateTime(date("H:i:s",strtotime($staff_data->out_time)));
                      $interval = $check_in_compare->diff($check_out_compare);
                      if($staff_data->shift_code != 'OS' ){
                          if(!empty($staff_data->in_time)){
                              $actual_in_time = new DateTime($staff_data->start_time);
                              $time_diff = $check_in_compare->diff($actual_in_time);
                              if($time_diff->format('%R%i') < 0){
                                $late_count++;
                                $in_time =  '<span style="color:red">'. $staff_data->in_time.'</span>';
                              }else{
                                  $in_time =  '<span style="color:green">'. $staff_data->in_time.'</span>';
                              }
                          }else{
                              $in_time =  '<span style="color:red">AB</span>';
                          }
                      }else{
                          if(!empty($staff_data->in_time)){
                              $in_time =  '<span style="color:green">'. $staff_data->in_time.'</span>';
                          }else{
                              $in_time =  '<span style="color:red">AB</span>';
                          }
                         
                      }
          
                      if($interval->format('%h') <= 2) {
                          $check_out = '--';
                          $punch_out_nill++;
                      }else{
                          $check_out = $staff_data->out_time;
                      }
                    
                      $data_array_new[] = array(
                         date('d-m-Y',strtotime($staff->punch_date)),
                         $in_time,
                         $check_out,
                         $interval->format('%h').':'.$interval->format('%s')
                    );
                  }else{
                      $data_array_new[] = array(
                          date('d-m-Y',strtotime($staff->punch_date)),
                          '<span style="color:red">AB</span>',
                          '<span style="color:red">AB</span>',
                          '<span style="color:red">--</span>',
                     );
                  }
             }
            
            
             $count = count($dateInfo);
              $result = array(
                   "draw" => $draw,
                    "recordsTotal" => $count,
                    "recordsFiltered" => $count,
                    "data" => $data_array_new,
               );
          echo json_encode($result);
          exit();
        } 
    }

public function downloadStaffAttendanceReport(){
    if($this->isAdmin() == TRUE)
    {
        $this->loadThis();
    } else {
        $date_from = $this->security->xss_clean($this->input->post('date_from'));
        $date_to = $this->security->xss_clean($this->input->post('date_to'));
        $department = $this->security->xss_clean($this->input->post('department'));
        $report_type = $this->security->xss_clean($this->input->post('report_type'));
        $sheet = 0;
        if($department == "ALL"){
            $department_list = $this->staff->getStaffDepartment();
        }else{
           
            $department_list = $this->staff->getStaffDepartmentById($department);
        }	
        foreach($department_list as $dept){
        $this->excel->setActiveSheetIndex($sheet);
        //name the worksheet
        $this->excel->getActiveSheet()->setTitle($dept->name);
        $this->excel->getActiveSheet()->getPageSetup()->setPrintArea('A1:G500');
        //set Title content with some text
        $this->excel->getActiveSheet()->setCellValue('A1', TITLE);
        $this->excel->getActiveSheet()->setCellValue('A2', "STAFF ATTENDANCE INFORMATION 2021-22");
        $this->excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(18);
        $this->excel->getActiveSheet()->getStyle('A2')->getFont()->setSize(14);
        $this->excel->getActiveSheet()->mergeCells('A1:H1');
        $this->excel->getActiveSheet()->mergeCells('A2:H2');
        $this->excel->getActiveSheet()->getStyle('A1:A4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $this->excel->getActiveSheet()->getStyle('A1:H1')->getFont()->setBold(true);
  
        $this->excel->getActiveSheet()->getColumnDimension('A')->setWidth(8);
        $this->excel->getActiveSheet()->getColumnDimension('B')->setWidth(18);
        $this->excel->getActiveSheet()->getColumnDimension('C')->setWidth(18);
        $this->excel->getActiveSheet()->getColumnDimension('D')->setWidth(28);
        $this->excel->getActiveSheet()->getColumnDimension('E')->setWidth(14);
        $this->excel->getActiveSheet()->getColumnDimension('F')->setWidth(20);
        $this->excel->getActiveSheet()->getColumnDimension('G')->setWidth(18);
        $this->excel->getActiveSheet()->getColumnDimension('H')->setWidth(18);

        $this->excel->getActiveSheet()->setCellValue('A3', "Date From: ".$date_from." Date To: ".$date_to);
        $this->excel->getActiveSheet()->mergeCells('A3:D3');
        $this->excel->getActiveSheet()->setCellValue('E3', "Report Type: ".$report_type);
        $this->excel->getActiveSheet()->mergeCells('E3:H3');
        $this->excel->getActiveSheet()->getStyle('E3:H3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $this->excel->getActiveSheet()->getStyle('A3:H3')->getFont()->setBold(true);


        $this->excel->setActiveSheetIndex($sheet)->setCellValue('A4', 'SL. NO.');
        $this->excel->setActiveSheetIndex($sheet)->setCellValue('B4', 'Date');
        $this->excel->setActiveSheetIndex($sheet)->setCellValue('C4', 'Staff ID');
        $this->excel->setActiveSheetIndex($sheet)->setCellValue('D4', 'Name');
        $this->excel->setActiveSheetIndex($sheet)->setCellValue('E4', 'Department');
        $this->excel->setActiveSheetIndex($sheet)->setCellValue('F4', 'Role');
        $this->excel->setActiveSheetIndex($sheet)->setCellValue('G4', 'In-Time');
        $this->excel->setActiveSheetIndex($sheet)->setCellValue('H4', 'Out-Time');
       
        
        $this->excel->getActiveSheet()->getStyle('A4:H4')->getAlignment()->setWrapText(true); 
        $this->excel->getActiveSheet()->getStyle('A4:H4')->getFont()->setBold(true); 
        $this->excel->getActiveSheet()->getStyle('A4:H4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $styleBorderArray = array('borders' => array('allborders' => array('style' => PHPExcel_Style_Border::BORDER_THIN)));
        $this->excel->getActiveSheet()->getStyle('A1:H4')->applyFromArray($styleBorderArray);

        $staffInfo = $this->staff->getAllStaffInfoByDeptId($dept->dept_id);
        $start_date = strtotime(date('Y-m-d',strtotime($date_from))); 
        $end_date = strtotime(date('Y-m-d',strtotime($date_to))); 
        $j=1;
        $excel_row = 5;
        foreach($staffInfo as $staff){
           
            for ($currentDate = $start_date; $currentDate <= $end_date; $currentDate += (86400)) { 
              
                $date_attendance = date('Y-m-d', $currentDate);
                $staff_data = $this->staff->getSingleStaffAttendanceInfo($staff->staff_id,$date_attendance);

                if(!empty($staff_data)){
                    $weekName = date('l', strtotime($date_attendance));
                    // if($weekName == 'Saturday' && $staff->roleId == ROLE_TEACHING_STAFF){
                    //  continue;       
                    // }
                    $write_excel_status = false;
                    if($weekName == 'Sunday'){
                        continue;
                    }
                    // $deleteButton = "";
                    // $updateButton = "";
                    // $editButton = "";
                    $check_in = date("h:i:s A",strtotime($staff_data->in_time.' +7 hour'));
        
                    $check_out = date("h:i:s A",strtotime($staff_data->out_time.' +7 hour')); 
        
                    $check_in_compare = new DateTime(date("h:i:s",strtotime($staff_data->in_time)));
        
                    $check_out_compare = new DateTime(date("h:i:s",strtotime($staff_data->out_time)));
        
                    $interval = $check_in_compare->diff($check_out_compare);
                    $check_in_rule = new DateTime(date("h:i:s",strtotime($staff_data->punch_time)));
                  
                    if(strtoupper($staff_data->department) == 'HOUSE KEEPING'){
                        $in_time_rule = new DateTime('07:00:00');
                    }else if(strtoupper($staff_data->department) == 'SUPPORT STAFF'){
                        $in_time_rule = new DateTime('08:00:00');
                    }else{
                        $in_time_rule = new DateTime('08:20:00');
                    }
                    
                    // $in_time_rule = new DateTime('08:30:00');
        
                    $time_diff = $check_in_rule->diff($in_time_rule);
        
                  
                    $in_time =  $check_in;
                    if($time_diff->format('%R%i') < 0){
                       
                        if($report_type == 'latecomer'){
                            $write_excel_status = true;
                        }else{
                            $write_excel_status = false;   
                        }
                    }
                     
                      
                    if($interval->format('%h') <= 0) {
                        if($report_type == 'no_punch_out'){
                            $write_excel_status = true;
                        }else{
                            $write_excel_status = false;
                        }
                        $check_out = '--';
                    }else{
                        $check_out = $check_out;
                    }
                   
                    // if($this->role == ROLE_ADMIN){
                    //     $deleteButton = '<a class="btn btn-xs btn-danger deleteStaffAttendance" href="#"
                    //     data-row_id="'.$staff_data->row_id.'" title="Delete Attendance"><i
                    //         class="fa fa-trash"></i></a>';
                    //     $editButton = '<button onclick="editStaffAttendance('.$staff_data->staff_id.')" class="btn btn-xs btn-info"
                    //     title="Edit Attendance"><i
                    //         class="fa fa-pencil"></i></button>';
                    // }
        
                  
                }else{
                    if($report_type == 'absent_staff'){
                            $write_excel_status = true;
                           
                        }else{
                            $write_excel_status = false;
                        }
                    
                }
                if($write_excel_status == true){
                    $this->excel->setActiveSheetIndex($sheet)->setCellValue('A'.$excel_row,$j++);
                    $this->excel->setActiveSheetIndex($sheet)->setCellValue('B'.$excel_row,date('d-m-Y',strtotime($date_attendance)));
                    $this->excel->setActiveSheetIndex($sheet)->setCellValue('C'.$excel_row,$staff->staff_id);
                    $this->excel->setActiveSheetIndex($sheet)->setCellValue('D'.$excel_row,$staff->name);
                  
                    $this->excel->setActiveSheetIndex($sheet)->setCellValue('E'.$excel_row,$staff_data->department);
                    $this->excel->setActiveSheetIndex($sheet)->setCellValue('F'.$excel_row,$staff->role);
                    if($report_type == 'absent_staff'){
                        $this->excel->setActiveSheetIndex($sheet)->setCellValue('G'.$excel_row,"AB");
                        $this->excel->setActiveSheetIndex($sheet)->setCellValue('H'.$excel_row,"AB");
                    }else{
                        $this->excel->setActiveSheetIndex($sheet)->setCellValue('G'.$excel_row,$in_time);
                        if($check_out == '--'){
                            $this->excel->setActiveSheetIndex($sheet)->setCellValue('H'.$excel_row,"--");
                        }else{
                            $this->excel->setActiveSheetIndex($sheet)->setCellValue('H'.$excel_row,$check_out);
                        }
                       
                    }
                    $this->excel->getActiveSheet()->getStyle('A'.$excel_row.':H'.$excel_row)->applyFromArray($styleBorderArray);
                    $this->excel->getActiveSheet()->getStyle('A'.$excel_row.':H'.$excel_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                    //$this->excel->getActiveSheet()->getStyle('D'.$excel_row.':F'.$excel_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                    $excel_row++;
                }
            
                    
                    
                }
            }
            $this->excel->createSheet();
            $sheet++;
        }
       
        }
        $filename='just_some_random_name.xls'; //save our workbook as this file name
        header('Content-Type: application/vnd.ms-excel'); //mime type
        header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
        header('Cache-Control: max-age=0'); //no cache
        $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');  
        ob_start();
        $objWriter->save("php://output");
        $xlsData = ob_get_contents();
        ob_end_clean();

        $response =  array(
            'op' => 'ok',
            'file' => "data:application/vnd.ms-excel;base64,".base64_encode($xlsData)
        );
        die(json_encode($response));
    }




public function deleteStaffAttendance(){
    if ($this->isAdmin() == true) {
        echo (json_encode(array('status' => 'access')));
    } else {
        $row_id = $this->input->post('row_id');
        $attData = $this->staff->getStaffAttendanceByRowId($row_id);
        $updateInfo = array('is_deleted' => 1, 'updated_by' => $this->staff_id, 'updated_date_time' => date('Y-m-d H:i:s'));
        $result = $this->staff->deleteStaffAttendanceInfo($attData->staff_id, $attData->punch_date, $updateInfo);
        if ($result > 0) {echo (json_encode(array('status' => true)));} else {echo (json_encode(array('status' => false)));}
    }
}
}