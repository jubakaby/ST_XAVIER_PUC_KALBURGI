<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

require APPPATH . '/libraries/BaseControllerFaculty.php';

class Settings extends BaseController {
    public function __construct()
    {
        parent::__construct();
        $this->load->library('excel');
        $this->load->model('staff_model','staff');
        $this->load->model('settings_model','settings');
        $this->load->model('students_model','student');
        $this->load->model('timetable_model','timetable');
        $this->load->model('admission_model','admission');
        $this->isLoggedIn();
    }
    public function viewSettings(){
        if($this->isAdmin() == TRUE || $this->isSuperAdmin() != TRUE){
            $this->loadThis();
        } else {
            

            $data['shiftInfo'] = $this->settings->getAllShiftInfo();
            $data['departmentInfo'] = $this->settings->getAllDepartmentInfo();
            $data['religionInfo'] = $this->settings->getAllReligionInfo();
            $data['nationalityInfo'] = $this->settings->getAllNationalityInfo();
            $data['casteInfo'] = $this->settings->getAllCasteInfo();
            $data['categoryInfo'] = $this->settings->getAllCategoryInfo();
            $data['streamInfo'] = $this->settings->getStreamInfo();
            $data['weekName'] = $this->timetable->getAllWeekName();
            // $data['sectionInfo'] = $this->settings->getSectionInfo($filter);
            $data['classTimingsInfo'] = $this->settings->getAllClassTimingsInfo();
            $data['timetableShiftInfo'] = $this->settings->getAllTimetableDayShiftingInfo();
            $data['feeNameInfo'] ="";// $this->settings->getAllFeeNameInfo();
            $data['postInfo'] = "";// $this->settings->getAllPostInfo();
            $data['feeTypeInfo'] = "";//$this->settings->getAllFeeTypeInfo();
            $this->global['pageTitle'] = ''.TAB_TITLE.' : Settings';
            $this->loadViews("settings/settingsDashboard", $this->global, $data, null);  
        }
    }

    function addDepartment()
    {
        if($this->isAdmin() == TRUE || $this->isSuperAdmin() != TRUE)
        {
            $this->loadThis();
        }  else {
            $dept_id =$this->security->xss_clean($this->input->post('dept_id'));
            $dept_name =$this->security->xss_clean($this->input->post('dept_name'));
            $isExist = $this->settings->checkDeptIdExists($dept_id);
            if($isExist > 0){
                $this->session->set_flashdata('warning', 'Department ID already exists!');
                redirect('viewSettings');
            }else{
                $departmentInfo = array('dept_id'=>$dept_id,'name'=>$dept_name);
                $result = $this->settings->addDepartment($departmentInfo);
                if($result > 0){
                    $this->session->set_flashdata('success', 'New Department created successfully');
                } else{
                    $this->session->set_flashdata('error', 'Department creation failed');
                }
                redirect('viewSettings');

            }
        }
    }

    /**
     * This function is used to add Religion Details
     */
    function addReligion()
    {
        if($this->isAdmin() == TRUE || $this->isSuperAdmin() != TRUE)
        {
            $this->loadThis();
        }  else {
            $religion =$this->security->xss_clean($this->input->post('religion'));
                $religionInfo = array('religion_name'=>$religion,'created_by'=>$this->staff_id,'created_date_time'=>date('Y-m-d H:i:s'));
                $result = $this->settings->addReligion($religionInfo);
            if($result > 0){
                $this->session->set_flashdata('success', 'New Religion created successfully');
            } else{
                $this->session->set_flashdata('error', 'Religion creation failed');
            }
            redirect('viewSettings');
        }
        
    }

      /**
     * This function is used to add Cast Details
     */
    function addCaste()
    {
        if($this->isAdmin() == TRUE || $this->isSuperAdmin() != TRUE)
        {
            $this->loadThis();
        }  else {
            $caste =$this->security->xss_clean($this->input->post('caste'));
            $isExist = $this->settings->checkCasteExists($caste);
            if($isExist > 0){
                $this->session->set_flashdata('warning', 'Caste already exists!');
            }else{
                $castInfo = array('caste_name'=>$caste,
                    'created_by'=>$this->staff_id,
                    'created_date_time'=>date('Y-m-d H:i:s'));
                $result = $this->settings->addCaste($castInfo);
                if($result > 0){
                    $this->session->set_flashdata('success', 'New Caste created successfully');
                } else{
                    $this->session->set_flashdata('error', 'Caste creation failed');
                }
            }
            redirect('viewSettings');
        }
    }
    /**
     * This function is used to add Nationality Details
     */
    function addNationality()
    {
        if($this->isAdmin() == TRUE || $this->isSuperAdmin() != TRUE)
        {
            $this->loadThis();
        }  else {
                $nationality =$this->security->xss_clean($this->input->post('nationality'));
            $nationalityInfo = array('nationality_name'=>$nationality,'created_by'=>$this->staff_id,'created_date_time'=>date('Y-m-d H:i:s'));
            $result = $this->settings->addNationality($nationalityInfo);
            if($result > 0){
                $this->session->set_flashdata('success', 'New Nationality created successfully');
            } else{
                $this->session->set_flashdata('error', 'Nationality creation failed');
            }
            redirect('viewSettings');
        }
    }

     /**
     * This function is used to add Category Details
     */
    function addCategory()
    {
        if($this->isAdmin() == TRUE || $this->isSuperAdmin() != TRUE)
        {
            $this->loadThis();
        }  else {
            $category =$this->security->xss_clean($this->input->post('category'));
            $categoryInfo = array('category_name'=>$category,'created_by'=>$this->staff_id,'created_date_time'=>date('Y-m-d H:i:s'));
            $result = $this->settings->addCategory($categoryInfo);
            if($result > 0){
                $this->session->set_flashdata('success', 'New Category created successfully');
            } else{
                $this->session->set_flashdata('error', 'Category creation failed');
            }
            redirect('viewSettings');
        }
    }
    
    public function deleteNationality(){
        if($this->isAdmin() == TRUE || $this->isSuperAdmin() != TRUE){
            $this->loadThis();
        } else {   
            $row_id = $this->input->post('row_id');
            $nationalityInfo = array('is_deleted' => 1,
            'updated_date_time' => date('Y-m-d H:i:s'),
            'updated_by' => $this->staff_id
            );
            $result = $this->settings->updateNationality($nationalityInfo, $row_id);
            if ($result == true) {echo (json_encode(array('status' => true)));} else {echo (json_encode(array('status' => false)));}
        } 
    }

    public function deleteReligion(){
        if($this->isAdmin() == TRUE || $this->isSuperAdmin() != TRUE){
            $this->loadThis();
        } else {   
            $row_id = $this->input->post('row_id');
            $religionInfo = array('is_deleted' => 1,
            'updated_date_time' => date('Y-m-d H:i:s'),
            'updated_by' => $this->staff_id
            );
            $result = $this->settings->updateReligion($religionInfo, $row_id);
            if ($result == true) {echo (json_encode(array('status' => true)));} else {echo (json_encode(array('status' => false)));}
        } 
    }

    public function deleteCaste(){
        if($this->isAdmin() == TRUE || $this->isSuperAdmin() != TRUE){
            $this->loadThis();
        } else {   
            $row_id = $this->input->post('row_id');
            $casteInfo = array('is_deleted' => 1,
            'updated_date_time' => date('Y-m-d H:i:s'),
            'updated_by' => $this->staff_id
            );
            $result = $this->settings->updateCaste($casteInfo, $row_id);
            if ($result == true) {echo (json_encode(array('status' => true)));} else {echo (json_encode(array('status' => false)));}
        } 
    }

    public function deleteCategory(){
        if($this->isAdmin() == TRUE || $this->isSuperAdmin() != TRUE){
            $this->loadThis();
        } else {   
            $row_id = $this->input->post('row_id');
            $categoryInfo = array('is_deleted' => 1,
            'updated_date_time' => date('Y-m-d H:i:s'),
            'updated_by' => $this->staff_id
            );
            $result = $this->settings->updateCategory($categoryInfo, $row_id);
            if ($result == true) {echo (json_encode(array('status' => true)));} else {echo (json_encode(array('status' => false)));}
        } 
    }

    public function deleteDepartment(){
        if($this->isAdmin() == TRUE || $this->isSuperAdmin() != TRUE){
            $this->loadThis();
        } else {   
            $row_id = $this->input->post('row_id');
            $deptInfo = array('is_deleted' => 1,
            'updated_date_time' => date('Y-m-d H:i:s'),
            'updated_by' => $this->staff_id
            );
            $result = $this->settings->updateDepartment($deptInfo, $row_id);
            if ($result == true) {echo (json_encode(array('status' => true)));} else {echo (json_encode(array('status' => false)));}
        } 
    }

    
    public function addClassTimings(){
        if($this->isAdmin() == TRUE || $this->isSuperAdmin() != TRUE){
            $this->loadThis();
        } else {
            $start_time_hh =$this->security->xss_clean($this->input->post('start_time_hh'));
            $start_time_mm =$this->security->xss_clean($this->input->post('start_time_mm'));
            $end_time_hh =$this->security->xss_clean($this->input->post('end_time_hh'));
            $end_time_mm =$this->security->xss_clean($this->input->post('end_time_mm'));
            $week_id =$this->security->xss_clean($this->input->post('week_id'));
            $start_time = $start_time_hh.':'.$start_time_mm;
            $end_time = $end_time_hh.':'.$end_time_mm;

            $isExist = $this->settings->checkClassTimingsExists($start_time,$end_time,$week_id);
            if($isExist > 0){
                $this->session->set_flashdata('warning', 'Class Timings already exists!');
            }else{
                $classInfo = array(
                    'start_time'=>$start_time,
                    'end_time'=>$end_time,
                    'week_row_id'=>$week_id,
                    'created_by'=>$this->staff_id,
                    'created_date_time'=>date('Y-m-d H:i:s'));

                $result = $this->settings->addTimings($classInfo);
                        
                if($result > 0){
                    $this->session->set_flashdata('success', 'Class Timings Added successfully');
                } else{
                    $this->session->set_flashdata('error', 'Class Timings creation failed');
                }
            }
            redirect('viewSettings');
        }
    }

    public function deleteClassTimings(){
        if($this->isAdmin() == TRUE || $this->isSuperAdmin() != TRUE){
            $this->loadThis();
        } else {   
            $row_id = $this->input->post('row_id');
            $classInfo = array('is_deleted' => 1,
            'updated_date_time' => date('Y-m-d H:i:s'),
            'updated_by' => $this->staff_id
            );
            $result = $this->settings->updateClassTimings($classInfo, $row_id);
            if ($result == true) {echo (json_encode(array('status' => true)));} else {echo (json_encode(array('status' => false)));}
        } 
    }

    
    // add day shifting info
    public function addTimetableDayShifting() {
        if($this->isAdmin() == TRUE) {
            $this->loadThis();
        }  else {
            $week_id = $this->security->xss_clean($this->input->post('week_id'));
            $date = $this->security->xss_clean($this->input->post('date'));
            $shift_date = date('Y-m-d',strtotime($date));

            $isExist = $this->settings->checkTimetableShiftingExists($week_id,$shift_date);
            if($isExist > 0){
                $this->session->set_flashdata('warning', 'Time table day shift already exists!');
                redirect('viewSettings');
            }else{
                $shiftingInfo = array(
                    'week_id'=>$week_id,
                    'date'=> $shift_date,
                    'created_by'=>$this->staff_id,
                    'created_date_time'=>date('Y-m-d H:i:s'));
                $result = $this->settings->addDayShiftingInfo($shiftingInfo);
            }
            if($result > 0){
                $this->session->set_flashdata('success', 'Shifting Info added successfully');
            } else{
                $this->session->set_flashdata('error', 'Shifting Info creation failed');
            }
            redirect('viewSettings');
        }
    }
    public function deleteDayShifting(){
        if($this->isAdmin() == TRUE){
            $this->loadThis();
        } else {   
            $row_id = $this->input->post('row_id');
            $shiftInfo = array('is_deleted' => 1,
            'updated_date_time' => date('Y-m-d H:i:s'),
            'updated_by' => $this->staff_id
            );
            $result = $this->settings->updateTimetableDayShift($shiftInfo, $row_id);
            if ($result == true) {echo (json_encode(array('status' => true)));} else {echo (json_encode(array('status' => false)));}
        } 
    }

    
    public function addFeesName(){
        if($this->isAdmin() == TRUE || $this->isSuperAdmin() != TRUE){
            $this->loadThis();
        } else {
            $fee_name =ucwords($this->security->xss_clean($this->input->post('fee_name')));

            $isExist = $this->settings->checkFeeNameExists($fee_name);
            if($isExist > 0){
                $this->session->set_flashdata('warning', 'Fee Name already exists!');
            }else{
                $feeInfo = array(
                    'fee_name'=>$fee_name,
                    'created_by'=>$this->staff_id,
                    'created_date_time'=>date('Y-m-d H:i:s'));

                $result = $this->settings->addFeesName($feeInfo);
                        
                if($result > 0){
                    $this->session->set_flashdata('success', 'Fee Name Added successfully');
                } else{
                    $this->session->set_flashdata('error', 'Fee Name creation failed');
                }
            }
            redirect('viewSettings');
        }
    }

    public function deleteFeeName(){
        if($this->isAdmin() == TRUE || $this->isSuperAdmin() != TRUE){
            $this->loadThis();
        } else {   
            $row_id = $this->input->post('row_id');
            $feeInfo = array('is_deleted' => 1,
            'updated_date_time' => date('Y-m-d H:i:s'),
            'updated_by' => $this->staff_id
            );
            $result = $this->settings->updateFeeNameInfo($feeInfo, $row_id);
            if ($result == true) {echo (json_encode(array('status' => true)));} else {echo (json_encode(array('status' => false)));}
        } 
    }

    // election
    function addPost(){
        if($this->isAdmin() == TRUE || $this->isSuperAdmin() != TRUE)
        {
            $this->loadThis();
        }  else {
            $post_name =$this->security->xss_clean($this->input->post('post_name'));
            $postInfo = array('post_name'=>$post_name,'created_by'=>$this->staff_id,'created_date_time'=>date('Y-m-d H:i:s'));
            $result = $this->settings->addPost($postInfo);
            if($result > 0){
                $this->session->set_flashdata('success', 'New Post created successfully');
            } else{
                $this->session->set_flashdata('error', 'Post creation failed');
            }
            redirect('viewSettings');
        }
    }



    public function deletePost(){
        if($this->isAdmin() == TRUE || $this->isSuperAdmin() != TRUE){
            $this->loadThis();
        } else {   
            $post_id = $this->input->post('post_id');
            $postInfo = array('is_deleted' => 1,
            'updated_date_time' => date('Y-m-d H:i:s'),
            'updated_by' => $this->staff_id
            );
            $result = $this->settings->updatePost($postInfo, $post_id);
            // log_message('debug','post'.print_r($postInfo));
            if ($result == true) {echo (json_encode(array('status' => true)));} else {echo (json_encode(array('status' => false)));}
        } 
    }

    
    // fee type
    function addFeeType(){
        if($this->isAdmin() == TRUE || $this->isSuperAdmin() != TRUE) {
            $this->loadThis();
        }  else {
            $feeType =$this->security->xss_clean($this->input->post('feeType'));
            $feeInfo = array('feeType'=>$feeType,'created_by'=>$this->staff_id,'created_date_time'=>date('Y-m-d H:i:s'));
            $result = $this->settings->addFeeType($feeInfo);
            if($result > 0){
                $this->session->set_flashdata('success', 'New Fee Type created successfully');
            } else{
                $this->session->set_flashdata('error', 'Fee Type creation failed');
            }
            redirect('viewSettings');
        }
    }



    public function deleteFeeType(){
        if($this->isAdmin() == TRUE || $this->isSuperAdmin() != TRUE){
            $this->loadThis();
        } else {   
            $row_id = $this->input->post('row_id');
            $feeInfo = array('is_deleted' => 1,
            'updated_date_time' => date('Y-m-d H:i:s'),
            'updated_by' => $this->staff_id
            );
            $result = $this->settings->updateFeeType($feeInfo, $row_id);
            // log_message('debug','post'.print_r($postInfo));
            if ($result == true) {echo (json_encode(array('status' => true)));} else {echo (json_encode(array('status' => false)));}
        } 
    }
    
    public function getNewAdmittedStudentsImport(){
        $config=['upload_path' => './upload/',
        'allowed_types' => 'xlsx|csv|xls','max_size' => '102400','overwrite' => TRUE,
        ];
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('excelFile')) {
            $error = array('error' => $this->upload->display_errors());
        } else { 
            $data = array('upload_data' => $this->upload->data());
        }
       if (!empty($data['upload_data']['file_name'])) {
            $import_xls_file = $data['upload_data']['file_name'];
        } else {
            $import_xls_file = 0;
        }
        $inputFileName = 'upload/'. $import_xls_file;
       
        try {
            $inputFileType = PHPExcel_IOFactory::identify($inputFileName);
            $objReader = PHPExcel_IOFactory::createReader($inputFileType);
            $objPHPExcel = $objReader->load($inputFileName);
        } catch (Exception $e) {
            die('Error loading file "' . pathinfo($inputFileName, PATHINFO_BASENAME)
                    . '": ' . $e->getMessage());
        }
       
        $excelValues = array();
        $excelValues2 = array();
        $sheetCount = $objPHPExcel->getSheetCount();
        $sheetNames = $objPHPExcel->getSheet();
        $objWorksheet = $objPHPExcel->getActiveSheet($sheetCount);
        $row_index = $objWorksheet->getHighestRow(); 
        $col_name = $objWorksheet->getHighestColumn();
        $headings = array();
        $cell_config = array(); 
        $row_count = 1;
        $total_records = 0;
        $highestRow = $objWorksheet->getHighestDataRow(); 
        $highestColumn = $objWorksheet->getHighestDataColumn();
        $total_fields = 2;
        $student_count = 0;
        $studentNotExistCount = 0;
        $student_update_count = 0;
        $app_no = array();
        // $highestRow

        for($i=4;$i<=$highestRow;$i++){
            $student_id = $objWorksheet->getCellByColumnAndRow(2,$i)->getFormattedValue();
            $application_number = $objWorksheet->getCellByColumnAndRow(3,$i)->getFormattedValue();
            $name = $objWorksheet->getCellByColumnAndRow(4,$i)->getFormattedValue();
            // $elective_sub = $objWorksheet->getCellByColumnAndRow(4,$i)->getFormattedValue();
            $section = $objWorksheet->getCellByColumnAndRow(6,$i)->getFormattedValue();
            // $application_number = '211022';
            $studentInfo = $this->admission->getNewAdmittedStudentInfo($application_number);
            
            $permanent_add = $studentInfo->permanent_address_line_1.' '.$studentInfo->permanent_address_line_2.' '.$studentInfo->permanent_address_district.','.$studentInfo->permanent_address_state.','.$studentInfo->permanent_address_pincode;
            $present_add = $studentInfo->residential_address_line_1.' '.$studentInfo->residential_address_line_2.' '.$studentInfo->residential_address_district.','.$studentInfo->residential_address_state.','.$studentInfo->residential_address_pincode;

            
          

            // log_message('debug','Info = '.print_r($studentInfo,true));
            if(!empty($studentInfo)){
               
                $isExists = $this->student->getStudentByStudentId($student_id);
                // log_message('debug','isExists  = '.print_r($studentInfo,true));
                if(empty($isExists)){
                    $student_info = array(
                    'student_name'=>$studentInfo->name,
                    'blood_group' =>$studentInfo->blood_group,
                    'student_no'=>$studentInfo->student_no,
                    'application_no'=>$studentInfo->application_number,
                    'student_id' => strtoupper($student_id),
                    'mobile' => $studentInfo->student_mobile,
                    'email' => $studentInfo->email,
                    // 'date_of_admission'=>$studentInfo->date_of_admission,
                    'roll_number' => $studentInfo->roll_number,
                    'gender' => $studentInfo->gender,
                    // 'student_status'=> 'ACTIVE',
                    'tc_taken_status' => 0,
                    'residential_address' => $permanent_add,
                    // 'pu_board_number'=>$studentInfo->pu_board_number, 
                    'category' => $studentInfo->student_category,
                    'last_board_name' => $studentInfo->board_name,
                    'last_percentage' => $studentInfo->sslc_percentage,
                    'last_register_number' => $studentInfo->register_number,
                    'is_physically_challenged' => $studentInfo->physically_challenged,
                    'is_dyslexic' => $studentInfo->dyslexia_challenged,
                    'present_address' => $present_add,
                    'mother_tongue'=>$studentInfo->mother_tongue,
                    'nationality'=>$studentInfo->nationality,  
                    'religion'=>$studentInfo->religion, 
                    'caste'=>$studentInfo->caste, 
                    'sub_caste' => $studentInfo->sub_caste,
                    'father_name'=>$studentInfo->father_name, 
                    'father_email' => $studentInfo->father_email,
                    'father_mobile' => $studentInfo->father_mobile,
                    'father_educational_qualification' => $studentInfo->father_qualification,
                    'father_age' => $studentInfo->father_age,
                    'father_profession'=>$studentInfo->father_profession,
                    'mother_name'=>$studentInfo->mother_name,
                    'mother_email' => $studentInfo->mother_email,
                    'mother_mobile' => $studentInfo->mother_mobile,
                    'mother_educational_qualification' => $studentInfo->mother_qualification,
                    'mother_age' => $studentInfo->mother_age,
                    'mother_profession' => $studentInfo->mother_profession,
                    'father_annual_income'=>$studentInfo->father_annual_income,
                    'mother_annual_income'=>$studentInfo->mother_annual_income,
                    'guardian_name' => $studentInfo->guardian_name,
                    'guardian_mobile' => $studentInfo->guardian_mobile,
                    'guardian_address' => $studentInfo->guardian_address,
                    'native_place' => $studentInfo->native_place,
                    'aadhar_no' => $studentInfo->aadhar_no,
                    'program_name' => $studentInfo->program_name,
                    'stream_name'=>$studentInfo->stream_name,
                    'intake_year' => '2022-2023',
                    'intake_year_id' => '2022',
                    'term_name' => 'I PUC',
                    'section_name' => $section,
                    // 'hall_ticket_no'=>$studentInfo->hall_ticket_no,
                    'dob' => $studentInfo->dob,
                    'elective_sub' => $studentInfo->second_language,
                    'is_active' => 1,
                    'created_by'=>$this->staff_id,
                    'created_date_time'=>date('Y-m-d H:i:s'));
                      log_message('debug','student_id = '.$student_id);
            log_message('debug','application_number = '.$application_number);
            log_message('debug','name = '.$name);
            log_message('debug','section = '.$section);
                    // log_message('debug','student_info  = '.print_r($studentInfo,true));
                    log_message('debug','addddd = '.$student_id);
                    $student_count++;
                    $return = $this->student->addstudentData($student_info);
                    log_message('debug','addddd'.print_r($student_info,true));
                // }else{


                //     $studentInfosup = array(
                //         'student_id' => strtoupper($student_id),
                //         // 'blood_group' =>$studentInfo->blood_group,
                //         // 'student_no'=>$studentInfo->student_no,
                //         // 'application_no'=>$studentInfo->application_number,
                //         // 'mobile' => $studentInfo->student_mobile,
                //         // 'email' => $studentInfo->email,
                //         // // 'date_of_admission'=>$studentInfo->date_of_admission,
                //         // 'roll_number' => $studentInfo->roll_number,
                //         // 'gender' => $studentInfo->gender,
                //         // // 'student_status'=> 'ACTIVE',
                //         // 'tc_taken_status' => 0,
                //         // 'residential_address' => $permanent_add,
                //         // // 'pu_board_number'=>$studentInfo->pu_board_number, 
                //         // 'category' => $studentInfo->student_category,
                //         // 'last_board_name' => $studentInfo->board_name,
                //         // 'last_percentage' => $studentInfo->sslc_percentage,
                //         // 'last_register_number' => $studentInfo->register_number,
                //         // 'is_physically_challenged' => $studentInfo->physically_challenged,
                //         // 'is_dyslexic' => $studentInfo->dyslexia_challenged,
                //         // 'present_address' => $present_add,
                //         // 'mother_tongue'=>$studentInfo->mother_tongue,
                //         // 'nationality'=>$studentInfo->nationality,  
                //         // 'religion'=>$studentInfo->religion, 
                //         // 'caste'=>$studentInfo->caste, 
                //         // 'sub_caste' => $studentInfo->sub_caste,
                //         // 'father_name'=>$studentInfo->father_name, 
                //         // 'father_email' => $studentInfo->father_email,
                //         // 'father_mobile' => $studentInfo->father_mobile,
                //         // 'father_educational_qualification' => $studentInfo->father_qualification,
                //         // 'father_age' => $studentInfo->father_age,
                //         // 'father_profession'=>$studentInfo->father_profession,
                //         // 'mother_name'=>$studentInfo->mother_name,
                //         // 'mother_email' => $studentInfo->mother_email,
                //         // 'mother_mobile' => $studentInfo->mother_mobile,
                //         // 'mother_educational_qualification' => $studentInfo->mother_qualification,
                //         // 'mother_age' => $studentInfo->mother_age,
                //         // 'mother_profession' => $studentInfo->mother_profession,
                //         // 'father_annual_income'=>$studentInfo->father_annual_income,
                //         // 'mother_annual_income'=>$studentInfo->mother_annual_income,
                //         // 'guardian_name' => $studentInfo->guardian_name,
                //         // 'guardian_mobile' => $studentInfo->guardian_mobile,
                //         // 'guardian_address' => $studentInfo->guardian_address,
                //         // 'native_place' => $studentInfo->native_place,
                //         // 'aadhar_no' => $studentInfo->aadhar_no,
                //         // 'program_name' => $studentInfo->program_name,
                //         // 'stream_name'=>$studentInfo->stream_name,
                //         // 'intake_year' => '2021-2022',
                //         // 'term_name' => 'I PUC',
                //         'section_name' => $section,
                //         // // 'hall_ticket_no'=>$studentInfo->hall_ticket_no,
                //         // 'dob' => $studentInfo->dob,
                //         // 'elective_sub' => $elective_sub,
                //         // 'is_active' => 1,
                //         'updated_by'=>$this->staff_id,
                //         'updated_date_time'=>date('Y-m-d H:i:s'));

                //     $student_update_count++;
                //     $result = $this->student->updateStudentInfoBStdId($studentInfosup,$student_id);
                //      log_message('debug','studentInfosup'.print_r($studentInfosup,true));
                //     log_message('debug','isExists  = '.$result);
                // }
            }else{
                $studentNotExistCount++;
                // array_push($app_no,$application_number);
            }
        }
    }
        log_message('debug','Student NOT Count= '.$studentNotExistCount.'x'.$student_id);
        // log_message('debug','Application No = '.print_r($app_no,true));
        log_message('debug','Total Count= '.$student_count);
        log_message('debug','Update Count= '.$student_update_count);
        redirect('viewSettings');
    }




    
    // // update missing fields
    // public function addStudentMissingData(){
    //     $config=['upload_path' => './upload/',
    //     'allowed_types' => 'xlsx|csv|xls','max_size' => '102400','overwrite' => TRUE,
    //     ];
    //     $this->load->library('upload', $config);
    //     if (!$this->upload->do_upload('excelFile')) {
    //         $error = array('error' => $this->upload->display_errors());
    //     } else { 
    //         $data = array('upload_data' => $this->upload->data());
    //     }
    //    if (!empty($data['upload_data']['file_name'])) {
    //         $import_xls_file = $data['upload_data']['file_name'];
    //     } else {
    //         $import_xls_file = 0;
    //     }
    //     $inputFileName = 'upload/'. $import_xls_file;
       
    //     try {
    //         $inputFileType = PHPExcel_IOFactory::identify($inputFileName);
    //         $objReader = PHPExcel_IOFactory::createReader($inputFileType);
    //         $objPHPExcel = $objReader->load($inputFileName);
    //     } catch (Exception $e) {
    //         die('Error loading file "' . pathinfo($inputFileName, PATHINFO_BASENAME)
    //                 . '": ' . $e->getMessage());
    //     }
       
    //     $excelValues = array();
    //     $excelValues2 = array();
    //     $sheetCount = $objPHPExcel->getSheetCount();
    //     $sheetNames = $objPHPExcel->getSheet();
    //     $objWorksheet = $objPHPExcel->getActiveSheet($sheetCount);
    //     $row_index = $objWorksheet->getHighestRow(); 
    //     $col_name = $objWorksheet->getHighestColumn();
    //     $headings = array();
    //     $cell_config = array(); 
    //     $row_count = 1;
    //     $total_records = 0;
    //     $highestRow = $objWorksheet->getHighestDataRow(); 
    //     $highestColumn = $objWorksheet->getHighestDataColumn();
    //     $total_fields = 2;
    //     $student_count = 0;
    //     $studentNotExistCount = 0;
    //     $student_update_count = 0;
    //     $app_no = array();

    //     for($i=2;$i<=$highestRow;$i++){
    //         $name = $objWorksheet->getCellByColumnAndRow(2,$i)->getFormattedValue();
    //         $fname = $objWorksheet->getCellByColumnAndRow(3,$i)->getFormattedValue();
    //         $mname = $objWorksheet->getCellByColumnAndRow(4,$i)->getFormattedValue();
    //         $student_id = $objWorksheet->getCellByColumnAndRow(1,$i)->getFormattedValue();
    //         // $sat_no = $objWorksheet->getCellByColumnAndRow(1,$i)->getFormattedValue();
    //         // $application_no = $objWorksheet->getCellByColumnAndRow(0,$i)->getFormattedValue();
    //         // $date_of_admission = $objWorksheet->getCellByColumnAndRow(1,$i)->getFormattedValue();

    //         $date_of_admission = date('d-m-Y',strtotime($date_of_admission));
    //         // log_message('debug','Info = '.print_r($studentInfo,true));
    //         if(!empty($student_id)){
    //             $student_info = array(
    //                 'student_name'=>$name,
    //                 'father_name'=>$fname,
    //                 'mother_name'=>$mname,
    //             // 'date_of_admission'=>$date_of_admission,
    //             // 'sat_number' => $sat_no,
    //             // 'updated_by'=>$this->staff_id,
    //             // 'updated_date_time'=>date('Y-m-d H:i:s')
    //         );
    //                 // log_message('debug','Info std = '.print_r($student_info,true));
    //                 // log_message('debug','student_id std = '.$student_id);
    //                 $result = $this->student->updateStudentInfoBStdId($student_info,$student_id);
    //                 // $result = $this->student->updateStudentInfoApp($student_info,$application_no);
    //                 $student_count++;
    //         }else{
    //             $studentNotExistCount++;
    //             // array_push($app_no,$application_number);
    //         }
    //     }
    //     log_message('debug','Student NOT Count= '.$studentNotExistCount);
    //     log_message('debug','Total Count= '.$student_count);
    //     redirect('viewSettings');
    // }

    
    // // update missing fields
    public function addStudentMissingData(){
        $config=['upload_path' => './upload/',
        'allowed_types' => 'xlsx|csv|xls','max_size' => '102400','overwrite' => TRUE,
        ];
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('excelFile')) {
            $error = array('error' => $this->upload->display_errors());
        } else { 
            $data = array('upload_data' => $this->upload->data());
        }
       if (!empty($data['upload_data']['file_name'])) {
            $import_xls_file = $data['upload_data']['file_name'];
        } else {
            $import_xls_file = 0;
        }
        $inputFileName = 'upload/'. $import_xls_file;
       
        try {
            $inputFileType = PHPExcel_IOFactory::identify($inputFileName);
            $objReader = PHPExcel_IOFactory::createReader($inputFileType);
            $objPHPExcel = $objReader->load($inputFileName);
        } catch (Exception $e) {
            die('Error loading file "' . pathinfo($inputFileName, PATHINFO_BASENAME)
                    . '": ' . $e->getMessage());
        }
       
        $excelValues = array();
        $excelValues2 = array();
        $sheetCount = $objPHPExcel->getSheetCount();
        $sheetNames = $objPHPExcel->getSheet();
        $objWorksheet = $objPHPExcel->getActiveSheet($sheetCount);
        $row_index = $objWorksheet->getHighestRow(); 
        $col_name = $objWorksheet->getHighestColumn();
        $headings = array();
        $cell_config = array(); 
        $row_count = 1;
        $total_records = 0;
        $highestRow = $objWorksheet->getHighestDataRow(); 
        $highestColumn = $objWorksheet->getHighestDataColumn();
        $total_fields = 2;
        $student_count = 0;
        $studentNotExistCount = 0;
        $student_update_count = 0;
        $app_no = array();

        for($i=2;$i<=$highestRow;$i++){
          
           
            $student_id = $objWorksheet->getCellByColumnAndRow(1,$i)->getFormattedValue();
            $name = $objWorksheet->getCellByColumnAndRow(2,$i)->getFormattedValue();
            $fname = $objWorksheet->getCellByColumnAndRow(3,$i)->getFormattedValue();
            $mname = $objWorksheet->getCellByColumnAndRow(4,$i)->getFormattedValue();
            // $application_no = $objWorksheet->getCellByColumnAndRow(2,$i)->getFormattedValue();
            // $section = $objWorksheet->getCellByColumnAndRow(5,$i)->getFormattedValue();
            // $sat_no = $objWorksheet->getCellByColumnAndRow(3,$i)->getFormattedValue();
            // $application_no = $objWorksheet->getCellByColumnAndRow(0,$i)->getFormattedValue();
            // $date_of_admission = $objWorksheet->getCellByColumnAndRow(1,$i)->getFormattedValue();

            // $date_of_admission = date('d-m-Y',strtotime($date_of_admission));
            // log_message('debug','Info = '.print_r($studentInfo,true));
            if(!empty($student_id)){
                $student_info = array(
                    'student_name'=>$name,
                    'father_name'=>$fname,
                    'mother_name'=>$mname,
                    // 'student_id'=>$student_id,
                    //  'section_name' => $section,
                    // 'student_no'=>$student_no,
                    // 'pu_board_number'=>$student_no,
                    // 'sat_number'=>$sat_no,
                // 'date_of_admission'=>$date_of_admission,
                // 'sat_number' => $sat_no,
                'updated_by'=>$this->staff_id,
                'updated_date_time'=>date('Y-m-d H:i:s')
            );
                    log_message('debug','Info std = '.print_r($student_info,true));
                    // log_message('debug','student_id std = '.$student_id);
                    // $result = $this->student->updateStudentInfoAdmissionNo($student_info,$application_no);
                    $result = $this->student->updateStudentInfoBStdId($student_info,$student_id);
                    $student_count++;
            }else{
                $studentNotExistCount++;
              log_message('debug','student_id NotExist'.$student_id);
                // array_push($app_no,$application_number);
            }
        }
         log_message('debug','notUpdated '.$studentNotExistCount);
        log_message('debug','Student NOT Count= '.$studentNotExistCount);
        log_message('debug','Total Count= '.$student_count);
        redirect('viewSettings');
    }





          public function addAllApprovedStudent(){
         
            $studentInfo = $this->admission->getAllAdmittedStudentInfo();
            
            foreach($studentInfo as $std){  

            $permanent_add = $std->permanent_address_line_1.' '.$std->permanent_address_line_2.' '.$std->permanent_address_district.','.$std->permanent_address_state.','.$std->permanent_address_pincode;
            $present_add = $std->residential_address_line_1.' '.$std->residential_address_line_2.' '.$std->residential_address_district.','.$std->residential_address_state.','.$std->residential_address_pincode;

                           
                $isExists = $this->student->getStudentByApplication_no($std->application_number);
                if(!empty($isExists)){
                    $student_info = array(
                    'student_name'=>$std->name,
                    'blood_group' =>$std->blood_group,
                    'mobile' => $std->student_mobile,
                    'email' => $std->email,
                    'gender' => $std->gender,
                    'residential_address' => $permanent_add,
                    'category' => $std->student_category,
                    'last_board_name' => $std->board_name,
                    'last_percentage' => $std->sslc_percentage,
                    'last_register_number' => $std->register_number,
                    'is_physically_challenged' => $std->physically_challenged,
                    'is_dyslexic' => $std->dyslexia_challenged,
                    'present_address' => $present_add,
                    'mother_tongue'=>$std->mother_tongue,
                    'nationality'=>$std->nationality,  
                    'religion'=>$std->religion, 
                    'caste'=>$std->caste, 
                    'sub_caste' => $std->sub_caste,
                    'father_name'=>$std->father_name, 
                    'father_email' => $std->father_email,
                    'father_mobile' => $std->father_mobile,
                    'father_educational_qualification' => $std->father_qualification,
                    'father_age' => $std->father_age,
                    'father_profession'=>$std->father_profession,
                    'mother_name'=>$std->mother_name,
                    'mother_email' => $std->mother_email,
                    'mother_mobile' => $std->mother_mobile,
                    'mother_educational_qualification' => $std->mother_qualification,
                    'mother_age' => $std->mother_age,
                    'mother_profession' => $std->mother_profession,
                    'father_annual_income'=>$std->father_annual_income,
                    'mother_annual_income'=>$std->mother_annual_income,
                    'guardian_name' => $std->guardian_name,
                    'guardian_mobile' => $std->guardian_mobile,
                    'guardian_address' => $std->guardian_address,
                    'native_place' => $std->native_place,
                    'aadhar_no' => $std->aadhar_no,
                    'dob' => $std->dob,
                    'updated_by'=>$this->staff_id,
                    'updated_date_time'=>date('Y-m-d H:i:s'));

                    $return = $this->student->updateStudentInfoByAppNo($student_info,$std->application_number);
                
            }
        }
        $this->session->set_flashdata('success', 'Updated successfully');
        redirect('viewSettings');
    

}


}