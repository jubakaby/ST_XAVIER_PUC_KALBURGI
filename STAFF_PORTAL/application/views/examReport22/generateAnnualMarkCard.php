<?php require APPPATH . 'views/includes/db.php'; ?>
<style>
    .break {
        page-break-before: always;
    }

    .break_after {
        page-break-before: none;
    }

    .row {
        padding: 2px !important;
        margin: 5px !important;
        text-align: center;
    }

    /* .row > div {
    margin: 0px !important;
    padding: 0px !important;
    text-align: center;
}  */

    .col-12 {
        -webkit-box-flex: 0;
        -ms-flex: 0 0 100%;
        flex: 0 0 100%;
        max-width: 100% !important;
    }

    .text-center {
        text-align: center !important;
    }

    .title {
        font-size: 26px;
        margin-left: -25px;
    }

    .title_2 {
        font-size: 18px;
        margin-left: -25px;
    }

    .stm_work {
        font-size: 24px;
        font-weight: bold;
    }

    .heading {
        font-size: 11px;
        /* font-weight: bold;*/
    }

    table {
        width: 100% !important;
    }

    .table_bordered {
        border-collapse: collapse;
        width: 100% !important;
        margin: 8px 20px 1px 20px;
        ;
        align: center;
        font-size: 13px;
    }

    .table_bordered tr th,
    .table_bordered tr td {
        border: 1px solid black;
        padding: 4px !important;
        border-spacing: 0;
    }

    .stdtable_bordered {
        border-collapse: collapse;
        width: 100% !important;
        margin: 8px 20px 1px 20px;
        ;
        align: center;
        font-size: 12px;
    }

    .stdtable_bordered tr th,
    .stdtable_bordered tr td {
        border: 1px solid black;
        padding: 2px !important;
        border-spacing: 0;
    }

    .table_borderedNone {
        border-collapse: collapse;
        width: 100% !important;
        margin: 8px 0px 1px 20px;
        ;
        align: center;
        font-size: 14px;
    }

    .table_borderedNone tr th,
    .table_borderedNone tr td {
        border: none;
        padding: 0px !important;
        border-spacing: 0;
    }

    .table_college_header {
        border-collapse: collapse;
        width: 100% !important;
        margin: 8px 20px 1px 20px;
        ;
        align: center;
        font-size: 11px;
    }

    .table_college_header tr th,
    .table_college_header tr td {
        border: 1px solid black;
        padding: 2px !important;
        border-spacing: 0;
    }

    .border_full {
        border: 7px solid black !important;
        border-style: double !important;
        
    }

    .container {
        color: black !important;
    }

    .hrstyle {
        border: 1px solid black !important;
    }

    hr {
        display: block;
        border-style: inset;
        border-width: 1px solid black;
    }

    .dotted {
        border: 1px dotted black !important;
    }
</style>
<?php
$totalStudentCount = count($studentsRecords);
foreach ($studentsRecords as $record) {

    $totalStudentCount--;
?>
    <div class="border_full" style="" >
        <div class="container">
            <div class="row ">
                <div class="col-12">
                    <div class="text-center "><img src="<?php echo base_url(); ?>assets/dist/img/gov_logo.png" height="65" alt=" Logo" class="sjpuch_logo" /></div>

                    <div class="text-center heading">ಕರ್ನಾಟಕ ಸರ್ಕಾರ</div>
                    <div class="text-center heading">GOVERNMENT OF KARNATAKA</div>
                    <div class="text-center heading">ಪದವಿ ಪೂರ್ವ ಶಿಕ್ಷಣ ಇಲಾಖೆ</div>
                    <div class="text-center heading">DEPARTMENT OF PRE-UNIVERSITY EDUCATION</div>
                </div>
                <?php
                $student_id = $record->student_id;
                $std_id = substr($record->student_id, 0, 2);
                // $profile_image_url = base_url().'assets/images/PHOTOS_20_21_ALL/'.strtoupper($student_id).'.jpg';
                if ($std_id == '20') {
                    $profile_image_url = base_url() . 'assets/images/PHOTOS_20_21_ALL/' . strtoupper($record->student_id) . '.jpg';
                }
                if ($std_id == '21') {

                    $profile_image_url = base_url() . 'assets/images/PHOTOS_21_22_ALL/' . strtoupper($record->student_id) . '.jpg';
                    // }else{
                    //     $profile_image_url = base_url().'assets/dist/img/user.png';
                }
                $check_file_exist = file_exists_case($profile_image_url);
                ?>
                <div class="col-12">
                    <div class="text-right stm_work" style="margin-top:-135px;margin-right: -580px"><img src="<?php echo $profile_image_url; ?>" width="90" height="100" alt="PHOTO" class="sjpuch_logo" /></div>
                </div>
            </div>
            <br>

            <div class="row ">
                <div class="col-12">
                    <table class="table table_college_header" style="">>
                        <tr>
                            <th width="25" class="text-center" style="border-right: 1px solid white !important;">
                                <img src="<?php echo base_url(); ?>assets/images/logo_sjpuch_v2.png" width="70" height="70" alt="PHOTO" class="sjpuch_logo" />
                            </th>
                            <td width="500" style="text-align: center;border-left: 1px solid white !important;"><b class="title_2" style="font-size:19px">ST. XAVIER'S PRE–UNIVERSITY COLLEGE, KALABURAGI</b><br>
                                <p style="margin-top:-45px;">College Addres</p>
                                <b style="font-size: 10px" class="">COLLEGE CODE : CODE <br></b>
                                <b style="font-size: 14px" class="">STATEMENT OF MARKS<br> I PUC ANNUAL EXAMINATION MARCH/APRIL - 2022</b>
                        </tr>
                    </table>
                </div>
                <div class="col-12 text-left">
                    <p style="font-size: 13px;text-align: justify-all;margin-left: 18px;" class="">ಈ ಕೆಳಗೆ ನಮೂದಿಸಿದ ಅಭ್ಯರ್ಥಿಯು ಪದವಿ ಪೂರ್ವ ಶಿಕ್ಷಣದ ಪ್ರಥಮ ಪಿಯುಸಿ ಪರೀಕ್ಷೆಯಲ್ಲಿ ಕೆಳಗಿನ ವಿವರಗಳೊಂದಿಗೆ ತೇರ್ಗಡೆಯಾಗಿರುತ್ತಾರೆಂದು ಪ್ರಮಾಣೀಕರಿಸಲಾಗಿದೆ.<br>This is to certify that the candidate mentioned below has passed the First Year Pre-University Examination with the following details.
                    </p>
                    <table class="table stdtable_bordered" style="">
                        <tr>
                            <td width="180">
                                <p> ಅಭ್ಯರ್ಥಿಯ ಹೆಸರು </p>Candidate's Name
                            </td>
                            <td width="265"><b>&nbsp;<?php echo strtoupper($record->student_name); ?></b></td>
                            <td width="180">
                                <p> ಸ್ಯಾಟ್ಸ್ ನಂ. </p>SATS No &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><?php echo strtoupper($record->sat_number); ?></b>
                            </td>
                        </tr>
                        <tr>
                            <td width="180">
                                <p> ತಾಯಿಯ ಹೆಸರು </p>Mother's Name
                            </td>
                            <td><b>&nbsp;<?php echo strtoupper($record->mother_name); ?></b></td>
                            <td width="180">
                                <p> ನೋಂದನಿ ಸಂಖ್ಯೆ </p>Register No. : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><?php echo strtoupper($record->student_id); ?></b>
                            </td>
                        </tr>
                        <tr>
                            <td width="180">
                                <p> ತಂದೆಯ ಹೆಸರು </p>Father's Name
                            </td>
                            <td><b>&nbsp;<?php echo strtoupper($record->father_name); ?></b></td>
                            <td width="180">
                                <p> ತಿಂಗಳು/ ವರ್ಷ </p>Month /Year : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>April/ 2022</b>
                            </td>
                        </tr>
                    </table>
                </div>

                <?php
                $exam_status = false;
                $overall_total = 0;
                $max_mark = 600;
                $subjects_code = array();
                $elective_sub = strtoupper($record->elective_sub);
                if ($elective_sub == "KANNADA") {
                    array_push($subjects_code, '01');
                } else if ($elective_sub == 'HINDI') {
                    array_push($subjects_code, '03');
                } else if ($elective_sub == 'FRENCH') {
                    array_push($subjects_code, '12');
                } else {
                    $exam_status = true;
                }
                array_push($subjects_code, '02');
                $subjects = getSubjectCodes($record->stream_name);
                $subjects_code = array_merge($subjects_code, $subjects);
                ?>
                <table class="table table_bordered">
                    <tr class="text-center">
                        <td width="160" rowspan="2" class="text-center">ವಿಷಯಗಳು<br>SUBJECT</td>
                        <td width="50" rowspan="2" class="text-center">ಗರಿಷ್ಟಾಂಕ<br>MAX. MARKS</td>
                        <td width="285" colspan="2" class="text-center">ಪಡೆದ ಅಂಕ<br>MARKS OBTAINED</td>
                    </tr>
                    <tr class="text-center">
                        <td width="80" class="text-center">ಅಂಕಿಗಳಲ್ಲಿ<br>IN FIGURES</td>
                        <td width="260" class="text-center">ಅಕ್ಷರಗಳಲ್ಲಿ<br>IN WORDS</td>
                    </tr>
                    <tr>
                        <td class="text-center" colspan="4">ಭಾಗ - 1 ಭಾಷೆಗಳು<br>PART-I Languages</td>
                    </tr>
                    <?php
                    $fail_flag = false;
                    $lang_total = 0;
                    foreach ($subjects_code as $subject) {
                        $subjectInfo = getSubjectInfo($con, $subject);
                        if ($subject == 12) {
                            $labStatus = 'true';
                        } else {
                            $labStatus = 'false';
                        }
                        $first_lang_mark = 0;
                        $exam_type = array('ANNUAL_EXAMINATION');
                        if ($exam_status == false) {
                            if ($subject == '01' || $subject == '03' || $subject == '12') {
                                $total_mark = 0;
                                foreach ($exam_type as $exam) {
                                    $stdMarkInfo = getStudentFinalMarks($con, $record->student_id, $subject, $exam);
                                    $sub_marks = 0;
                                    $mark_obt = 0;
                                    if ($stdMarkInfo['obt_theory_mark'] == 'AB' || $stdMarkInfo['obt_theory_mark'] == 'EXEM' || $stdMarkInfo['obt_theory_mark'] == 'MP') {
                                        $mark_obt = $stdMarkInfo['obt_theory_mark'];
                                    } else {
                                        $mark_obt = $stdMarkInfo['obt_theory_mark'] + $stdMarkInfo['obt_lab_mark'];
                                    }
                                    $total_mark += $mark_obt;
                                    $lang_total += $mark_obt;
                                    $first_lang_mark = $mark_obt;
                                }
                                if ($labStatus == 'true') {
                                    if ($stdMarkInfo['obt_theory_mark'] < 24) {
                                        $fail_flag = true;
                                    }
                                }
                                if ($mark_obt < 35) {
                                    $fail_flag = true;
                                }
                    ?>
                                <tr>
                                    <td style="padding:7px"> <?php echo $subjectInfo["name"]; ?></td>
                                    <td class="text-center">100</td>
                                    <td class="text-center"><?php echo $mark_obt; ?></td>
                                    <td><?php echo convert_number($mark_obt) . ' Only'; ?></td>
                                </tr>
                            <?php
                                $overall_total += $mark_obt;
                            }
                        } else {
                            $max_mark = 500;
                        }
                        if ($subject == '02') {
                            $total_mark = 0;
                            foreach ($exam_type as $exam) {
                                $stdMarkInfo = getStudentFinalMarks($con, $record->student_id, $subject, $exam);
                                $sub_marks = 0;
                                $mark_obt = 0;
                                if ($stdMarkInfo['obt_theory_mark'] == 'AB' || $stdMarkInfo['obt_theory_mark'] == 'EXEM' || $stdMarkInfo['obt_theory_mark'] == 'MP' || $stdMarkInfo['obt_theory_mark'] ==  'ASGN') {
                                    $mark_obt = $stdMarkInfo['obt_theory_mark'];
                                } else {
                                    $mark_obt = $stdMarkInfo['obt_theory_mark'];
                                }
                                $second_lang_mark = $mark_obt;
                                $total_mark += $mark_obt;
                                $lang_total += $mark_obt;
                            }
                            if ($mark_obt < 35) {
                                $fail_flag = true;
                            }
                            ?>
                            <tr>
                                <td style="padding:7px"><?php echo $subjectInfo["name"]; ?></td>
                                <td class="text-center">100</td>
                                <td class="text-center"><?php echo $mark_obt; ?></td>
                                <td><?php echo convert_number($mark_obt) . ' Only'; ?></td>
                            </tr>
                    <?php
                            $overall_total += $mark_obt;
                        }
                    } ?>
                    <tr>
                        <td class="text-center" colspan="4">ಭಾಗ - 2 ಐಚ್ಚಿಕ ವಿಷಯಗಳು<br>PART-II Optionals</td>
                    </tr>
                    <?php
                    $subject_total = array();
                    $i = 0;
                    $total_mark = 0;
                    foreach ($subjects as $sub_code) {
                        $subjectInfo = getSubjectInfo($con, $sub_code);
                        $exam_type = array('ANNUAL_EXAMINATION');
                        $labStatus = $subjectInfo['lab_status'];
                        $mark_display = "";
                        foreach ($exam_type as $exam) {
                            $stdMarkInfo = getStudentFinalMarks($con, $record->student_id, $sub_code, $exam);
                            $mark_obt_lab = 0;
                            $sub_marks = 0;
                            $mark_obt = 0;
                            if ($stdMarkInfo['obt_theory_mark'] == 'AB' || $stdMarkInfo['obt_theory_mark'] == 'EXEM' || $stdMarkInfo['obt_theory_mark'] == 'MP' || $stdMarkInfo['obt_theory_mark'] ==  'ASGN') {
                                $mark_obt = $stdMarkInfo['obt_theory_mark'];
                                $mark_display =  $stdMarkInfo['obt_theory_mark'];
                            } else {
                                $mark_obt = $stdMarkInfo['obt_theory_mark'];
                            }
                            if ($mark_obt < 21) {
                                $fail_flag = true;
                            }
                            if ($stdMarkInfo['obt_lab_mark'] == 'AB' || $stdMarkInfo['obt_lab_mark'] == 'EXEM' || $stdMarkInfo['obt_lab_mark'] == 'MP' || $stdMarkInfo['obt_lab_mark'] ==  'ASGN') {
                                $mark_obt_lab = 0;
                            } else {
                                $mark_obt_lab = $stdMarkInfo['obt_lab_mark'];
                            }
                            $total_mark_sub = $mark_obt_lab + $mark_obt;
                            if ($total_mark_sub < 35) {
                                $fail_flag = true;
                            }
                            $total_mark += $mark_obt_lab + $mark_obt;
                            $subject_total[$i] = $total_mark_sub;
                            $i++;
                        }
                    ?>
                        <tr>
                            <td style="padding:7px"><?php echo $subjectInfo["name"]; ?></td>
                            <td class="text-center">100</td>
                            <td class="text-center"><?php
                                                    if ($mark_display == 'AB') {
                                                        echo $mark_display;
                                                    } else {
                                                        echo $total_mark_sub;
                                                    }
                                                    ?></td>
                            <td><?php
                                if ($mark_display == 'AB') {
                                    echo 'AB';
                                } else {
                                    echo convert_number($total_mark_sub) . ' Only';
                                }
                                ?></td>
                                
                        </tr>
                    <?php
                    }
                    $overall_total += $total_mark;
                    if ($fail_flag == true) {
                        if ($total_mark >= 140) {
                            if ($subject_total[0] >= 30 && $subject_total[1] >= 30 && $subject_total[2] >= 30 && $subject_total[3] >= 30) {
                                $final_result =  calculateResult($overall_total, $max_mark);
                                if ($lang_total >= 70) {
                                    if ($first_lang_mark >= 30 && $second_lang_mark >= 30) {
                                        $final_result =  calculateResult($overall_total, $max_mark);
                                    }
                                }
                            } else {
                                $final_result = "FAILED";
                            }
                        }
                    } else {
                        $final_result =  calculateResult($overall_total, $max_mark);
                    }
                    $total_marks_words = convert_number($overall_total); ?>
                    <tr>
                        <th>GRAND TOTAL</th>
                        <th class="text-center"><?php echo $max_mark; ?></th>
                        <th class="text-center"><?php echo $overall_total; ?></th>
                        <td><?php echo $total_marks_words . ' Only'; ?></td>
                    </tr>
                    <tr class="text-left" style="font-size: 16px;">
                        <td colspan="3" style="padding:7px !important;text-align: left!important;" class="text-left">&nbsp;ಒಟ್ಟು ಅಂಕಗಳು ಅಕ್ಷರಗಳಲ್ಲಿ<br>&nbsp;Total Marks in words:<b><?php echo $total_marks_words . ' Only'; ?> </b></td>
                        <td style="">ಫಲಿತಾಂಶ<br>Result: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b class="text-center"><?php echo strtoupper($final_result); ?></b></td>
                        <!-- <td></td> -->
                    </tr>
                </table>

                <table class="table table_borderedNone" style="margin-bottom: 5px;">>
                    <tr>
                        <td width="300">PUE STUDENT NO:&nbsp;<b><?php echo strtoupper($record->pu_board_number); ?></b></td>
                    </tr>
                    <tr>
                        <td width="300">STUDENT TYPE&nbsp;&nbsp;&nbsp;&nbsp;: &nbsp;<b>FRESHER</b></td>
                    </tr>
                    <tr>
                        <td width="300">MEDIUM&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: &nbsp;<b>ENGLISH</b></td>
                    </tr>
                    <tr>
                        <td width="300">DATE OF RESULT : <b>30-04-2022</b></td>
                    </tr>
                </table>

            </div>
            <?php $issue_date = 'Date: ' . date("d/m/Y") . '';  ?>

        </div>
        <table style="">
            <tr class="m-0">
                <td>
                    <div class="m-0">
                        <hr style="width:80%;">
                    </div>
                </td>
                <td>
                    <div class="m-0">
                        <hr style="width:65%;">
                    </div>
                </td>
                <td>
                    <div class="m-0">
                        <hr style="width:80%;">
                    </div>
                </td>
            </tr>
            <tr>
                <td width="210" style="">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ಅಭ್ಯರ್ಥಿಯ ಸಹಿ</td>
                <td class="text-center" width="280" style="">ಕಾಲೇಜು ಮೊಹರು</td>
                <td width="210" style="text-align: center;" style="">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ಪ್ರಾಚಾರ್ಯರ ಸಹಿ</td>
            </tr>
            <tr>
                <td width="210">&nbsp;&nbsp;&nbsp;&nbsp;Signature of Candidate</td>
                <td class="text-center" width="280">College Seal</t>
                <td width="210" style="text-align: center;">&nbsp;&nbsp;Signature of the Principal </td>
            </tr>
        </table>
    </div>
<?php
    if ($totalStudentCount != 0) {
        echo '<div class="break"></div>';
    } else {
        echo '<div class="break_after"></div>';
    }
} ?>


<?php



// function getSubjectCodes($stream_name) {

//     //science
//     $PCMB = array("33", "34", "35", '36');
//     $PCMC = array("33", "34", "35", '41');
//     $PCME = array("33", "34", "35", '40');
//     $PCMS = array("33", "34", "35", '31');
//     //commarce
//     $PEBA = array("29", "22", "27", '30');
//     $MEBA = array("75", "22", "27", '30');
//     $MSBA = array("75", "31", "27", '30');
//     $CSBA = array("41", "31", "27", '30');
//     $SEBA = array("31", "22", "27", '30');
//     $CEBA = array("41", "22", "27", '30');

//     //art
//     $HEPS = array("21", "22", "29", '28');

//     switch ($stream_name) {
//         case "PCMB":
//             return  $PCMB;
//             break;
//         case "PCMC":
//             return $PCMC;
//             break;
//         case "PEBA":
//             return $PEBA;
//             break;
//         case "PCME":
//             return $PCME;
//             break;
//         case "PCMS":
//                 return $PCMS;
//                 break;
//         case "MEBA":
//             return $MEBA;
//             break;
//         case "MSBA":
//             return $MSBA;
//             break;
//         case "CSBA":
//             return $CSBA;
//             break;
//         case "SEBA":
//             return $SEBA;
//             break;
//         case "CEBA":
//             return $CEBA;
//             break;
//         case "HEPS":
//             return $HEPS;
//             break;
//     }

// }
function getSubjectCodes($stream_name)
{
         //science
         $PCMB = array("33", "34", "35", '36');
         $PCMC = array("33", "34", "35", '41');
         $PCME = array("33", "34", "35", '40');
         $PCMS = array("33", "34", "35", '31');
         //commarce
         $BEBA = array("75", "22", "27", '30');
         $BSBA = array("75", "31", "27", '30');
         $CSBA = array("41", "31", "27", '30');
         $SEBA = array("31", "22", "27", '30');
         $CEBA = array("41", "22", "27", '30');
         $PEBA = array("29", "22", "27", '30');
         //art
         $HEPP = array("21", "22", "32", '29');
         $MEBA = array("75", "22", "27", '30');
         $MSBA = array("75", "31", "27", '30');
         $HEPS = array("21", "22", "29", '28');
 
         switch ($stream_name) {
             case "PCMB":
                 return  $PCMB;
                 break;
             case "PCMC":
                 return $PCMC;
                 break;
             case "PCME":
                 return $PCME;
                 break;
             case "PCMS":
                 return $PCMS;
                 break;
             case "PEBA":
                 return $PEBA;
                 break;
             case "BEBA":
                 return $BEBA;
                 break;
             case "BSBA":
                 return $BSBA;
                 break;
             case "CSBA":
                 return $CSBA;
                 break;
             case "SEBA":
                 return $SEBA;
                 break;
             case "CEBA":
                 return $CEBA;
                 break;
             case "HEPP":
                 return $HEPP;
                 break;
             case "HEPS":
                 return $HEPS;
                 break;
             case "MEBA":
                 return $MEBA;
                 break;
             case "MSBA":
                 return $MSBA;
                 break;
    }
}
function calculateResultSubjectOne($percentage)
{
    if ($percentage >= 85) {
        return "Distinction";
    } else if ($percentage >= 60 && $percentage <= 84) {
        return "I Class";
    } else if ($percentage >= 50 && $percentage <= 59) {
        return "II Class";
    } else if ($percentage >= 35 && $percentage <= 49) {
        return "III Class";
    } else {
        return "Detained";
    }
}

function calculateResult($total_marks, $max_mak)
{
    $percentage = floor(($total_marks / $max_mak) * 100);
    if ($percentage >= 85) {
        return "Distinction";
    } else if ($percentage >= 60 && $percentage <= 84) {
        return "I Class";
    } else if ($percentage >= 50 && $percentage <= 59) {
        return "II Class";
    } else if ($percentage >= 35 && $percentage <= 49) {
        return "III Class";
    } else {
        return "PROMOTED";
    }
}

function getAssignmentExamTheoryTotalMark($student_id, $subject_code, $lab_status)
{

    if ($subject_code == 12) {
        $labStatus = 'true';
    } else {
        $labStatus = $lab_status;
    }
    if ($labStatus == 'true') {
        if ($subject_code == 12) {
            $pass_mark_theory = 25;
            $pass_mark_lab = 10;
            $lab_assessment = 10;
        } else {
            $pass_mark_theory = 21;
            $pass_mark_lab = 14;
            $lab_assessment = 16;
        }
    } else {
        $pass_mark_theory = 35;
        $pass_mark_lab = 0;
        $lab_assessment = 0;
    }

    if ($student_id == '20P5965' || $student_id == '20P4140' || $student_id == '20P1754') {
        $internal_assessment = 1;
    } else {
        $internal_assessment = 5;
    }
    $exam_type = array('ANNUAL_EXAMINATION');
    $total_mark = 0;
    if ($sub_code == 12) {
        $labStatus = 'true';
    } else {
        $labStatus = $subjectInfo['lab_status'];
    }
    // ,'INTERNAL_ASSESSMENT','LAB_ASSESSMENT'$total_mark + 



    $totalMark = $pass_mark_theory + $internal_assessment + $pass_mark_lab + $lab_assessment;
    return $totalMark;
}



function getAssessmentMark($totalMark, $exam_type, $labStatus, $subject_code)
{
    if (is_numeric($totalMark) && !empty($totalMark)) {
        if ($labStatus == 'false') {
            if ($exam_type == 'ASSIGNMENT_I' || $exam_type == 'ASSIGNMENT_II') {
                if ($totalMark >= 81 && $totalMark <= 100) {
                    return '30';
                } else if ($totalMark >= 71 && $totalMark <= 80) {
                    return '25';
                } else if ($totalMark >= 61 && $totalMark <= 70) {
                    return '20';
                } else if ($totalMark >= 51 && $totalMark <= 60) {
                    return '15';
                } else if ($totalMark >= 41 && $totalMark <= 50) {
                    return '10';
                } else {
                    return '5';
                }
            }
        } else {
            if ($exam_type == 'ASSIGNMENT_I' && $subject_code == '12' || $exam_type == 'ASSIGNMENT_II' && $subject_code == '12') {
                if ($totalMark >= 26 && $totalMark <= 35) {
                    return '4';
                } else if ($totalMark >= 36 && $totalMark <= 45) {
                    return '8';
                } else if ($totalMark >= 46 && $totalMark <= 55) {
                    return '12';
                } else if ($totalMark >= 56 && $totalMark <= 65) {
                    return '16';
                } else if ($totalMark >= 66 && $totalMark <= 75) {
                    return '20';
                } else {
                    return '25';
                }
            } else if ($exam_type == 'ASSIGNMENT_I' || $exam_type == 'ASSIGNMENT_II') {
                if ($totalMark >= 1 && $totalMark <= 28) {
                    return '4';
                } else if ($totalMark >= 29 && $totalMark <= 35) {
                    return '8';
                } else if ($totalMark >= 36 && $totalMark <= 42) {
                    return '12';
                } else if ($totalMark >= 43 && $totalMark <= 49) {
                    return '16';
                } else if ($totalMark >= 50 && $totalMark <= 56) {
                    return '19';
                } else {
                    return '22';
                }
            }
        }
    } else {
        return '';
    }
}

function getStudentFinalMarks($con, $student_id, $subjects_code, $exam_type)
{
    $query = "SELECT * FROM tbl_college_internal_exam_marks as exam
    WHERE exam.student_id = '$student_id' AND exam.subject_code = '$subjects_code' 
    AND exam.exam_type = '$exam_type' AND exam.is_deleted = 0";
    $pdo_statement = $con->prepare($query);
    $pdo_statement->execute();
    return $pdo_statement->fetch();
}

function getSubjectInfo($con, $subject_code)
{
    $query = "SELECT * FROM tbl_subjects as sub
    WHERE sub.subject_code = '$subject_code'";
    $pdo_statement = $con->prepare($query);
    $pdo_statement->execute();
    return $pdo_statement->fetch();
}

function getSubjectTotal($result, $subjects)
{

    $subject_total = 0;

    foreach ($result as $row) {

        for ($i = 0; $i < 4; $i++) {

            if ($row["subject_code"] == $subjects[$i]) {

                $subject_total += (int)$row["obt_theory_mark"] + (int)$row["obt_lab_mark"];
            }
        }
    }

    return $subject_total;
}





function calculatePercentage($percentage)
{

    return floor(($percentage / 600) * 100);
}






function convert_number($number)
{

    if (($number < 0) || ($number > 999999999)) {

        throw new Exception("Number is out of range");
    }

    $Gn = floor($number / 1000000);

    /* Millions (giga) */

    $number -= $Gn * 1000000;

    $kn = floor($number / 1000);

    /* Thousands (kilo) */

    $number -= $kn * 1000;

    $Hn = floor($number / 100);

    /* Hundreds (hecto) */

    $number -= $Hn * 100;

    $Dn = floor($number / 10);

    /* Tens (deca) */

    $n = $number % 10;

    /* Ones */

    $res = "";

    if ($Gn) {

        $res .= $this->convert_number($Gn) .  "Million";
    }

    if ($kn) {

        $res .= (empty($res) ? "" : " ") . convert_number($kn) . " Thousand";
    }

    if ($Hn) {

        $res .= (empty($res) ? "" : " ") . convert_number($Hn) . " Hundred";
    }

    $ones = array("", "One", "Two", "Three", "Four", "Five", "Six", "Seven", "Eight", "Nine", "Ten", "Eleven", "Twelve", "Thirteen", "Fourteen", "Fifteen", "Sixteen", "Seventeen", "Eightteen", "Nineteen");

    $tens = array("", "", "Twenty", "Thirty", "Forty", "Fifty", "Sixty", "Seventy", "Eighty", "Ninety");

    if ($Dn || $n) {

        if (!empty($res)) {

            $res .= " ";
        }

        if ($Dn < 2) {

            $res .= $ones[$Dn * 10 + $n];
        } else {

            $res .= $tens[$Dn];

            if ($n) {

                $res .= "-" . $ones[$n];
            }
        }
    }

    if (empty($res)) {

        $res = "zero";
    }

    return $res;
}





function file_exists_case($strUrl)

{

    $realPath = str_replace('\\', '/', realpath($strUrl));



    if (file_exists($strUrl) && $realPath == $strUrl) {

        return 1;    //File exists, with correct case

    } elseif (file_exists($realPath)) {

        return 2;    //File exists, but wrong case

    } else {

        return 0;    //File does not exist

    }
}
?>