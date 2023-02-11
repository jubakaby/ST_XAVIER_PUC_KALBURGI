<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

DEBUG - 2023-02-04 15:27:32 --> UTF-8 Support Enabled
DEBUG - 2023-02-04 15:27:32 --> No URI present. Default controller set.
DEBUG - 2023-02-04 15:27:32 --> Global POST, GET and COOKIE data sanitized
ERROR - 2023-02-04 15:27:32 --> Query error: Table 'sjboys.ci_session_student_sjpuc' doesn't exist in engine - Invalid query: SELECT `data`
FROM `ci_session_student_sjpuc`
WHERE `id` = 'tff6u6funkq7dub9bvb15tsvloslra0b'
DEBUG - 2023-02-04 15:27:33 --> Total execution time: 0.6904
ERROR - 2023-02-04 15:27:33 --> Query error: Table 'sjboys.ci_session_student_sjpuc' doesn't exist in engine - Invalid query: INSERT INTO `ci_session_student_sjpuc` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('tff6u6funkq7dub9bvb15tsvloslra0b', '::1', 1675504653, '__ci_last_regenerate|i:1675504652;')
ERROR - 2023-02-04 15:27:33 --> Severity: Warning --> ini_set(): A session is active. You cannot change the session module's ini settings at this time C:\xampp\htdocs\PARROPHINS\ST_JOSEPHS_PUC_HASSAN\STUDENT_PORTAL\system\libraries\Session\Session_driver.php 188
ERROR - 2023-02-04 15:27:33 --> Severity: Warning --> session_write_close(): Failed to write session data using user defined save handler. (session.save_path: C:\xampp\tmp) Unknown 0
DEBUG - 2023-02-04 15:35:00 --> UTF-8 Support Enabled
DEBUG - 2023-02-04 15:35:00 --> Global POST, GET and COOKIE data sanitized
ERROR - 2023-02-04 15:35:00 --> Query error: Table 'sjboys.ci_session_student_sjpuc' doesn't exist in engine - Invalid query: SELECT `data`
FROM `ci_session_student_sjpuc`
WHERE `id` = 'tff6u6funkq7dub9bvb15tsvloslra0b'
ERROR - 2023-02-04 15:35:00 --> Query error: Table 'sjboys.tbl_student_app_registration' doesn't exist in engine - Invalid query: SELECT `std`.`row_id`, `register`.`student_id`, `register`.`password`, `register`.`dob`, `std`.`student_id`, `std`.`student_name`, `std`.`term_name`, `std`.`section_name`, `std`.`stream_name`
FROM `tbl_student_app_registration` as `register`
JOIN `tbl_students_info` as `std` ON `std`.`student_id` = `register`.`student_id`
WHERE `register`.`student_id` = '20p6312'
AND `std`.`is_active` = 1
AND `register`.`is_deleted` =0
ERROR - 2023-02-04 15:35:00 --> Severity: error --> Exception: Call to a member function row() on bool C:\xampp\htdocs\PARROPHINS\ST_JOSEPHS_PUC_HASSAN\STUDENT_PORTAL\application\models\Login_model.php 20
ERROR - 2023-02-04 15:35:00 --> Query error: Table 'sjboys.ci_session_student_sjpuc' doesn't exist in engine - Invalid query: INSERT INTO `ci_session_student_sjpuc` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('tff6u6funkq7dub9bvb15tsvloslra0b', '::1', 1675505100, '__ci_last_regenerate|i:1675505100;')
ERROR - 2023-02-04 15:35:00 --> Severity: Warning --> ini_set(): A session is active. You cannot change the session module's ini settings at this time C:\xampp\htdocs\PARROPHINS\ST_JOSEPHS_PUC_HASSAN\STUDENT_PORTAL\system\libraries\Session\Session_driver.php 188
ERROR - 2023-02-04 15:35:00 --> Severity: Warning --> session_write_close(): Failed to write session data using user defined save handler. (session.save_path: C:\xampp\tmp) Unknown 0
DEBUG - 2023-02-04 15:36:18 --> UTF-8 Support Enabled
DEBUG - 2023-02-04 15:36:18 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2023-02-04 15:36:19 --> Total execution time: 1.0748
DEBUG - 2023-02-04 15:36:34 --> UTF-8 Support Enabled
DEBUG - 2023-02-04 15:36:34 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2023-02-04 15:36:35 --> UTF-8 Support Enabled
DEBUG - 2023-02-04 15:36:35 --> Global POST, GET and COOKIE data sanitized
ERROR - 2023-02-04 15:36:41 --> Severity: error --> Exception: SQLSTATE[42S02]: Base table or view not found: 1932 Table 'sjboys.tbl_subjects' doesn't exist in engine C:\xampp\htdocs\PARROPHINS\ST_JOSEPHS_PUC_HASSAN\STUDENT_PORTAL\application\views\dashboard.php 2027
DEBUG - 2023-02-04 15:42:46 --> UTF-8 Support Enabled
DEBUG - 2023-02-04 15:42:46 --> Global POST, GET and COOKIE data sanitized
ERROR - 2023-02-04 15:42:48 --> Severity: error --> Exception: SQLSTATE[42S02]: Base table or view not found: 1932 Table 'sjboys.tbl_subjects' doesn't exist in engine C:\xampp\htdocs\PARROPHINS\ST_JOSEPHS_PUC_HASSAN\STUDENT_PORTAL\application\views\dashboard.php 2027
DEBUG - 2023-02-04 15:44:39 --> UTF-8 Support Enabled
DEBUG - 2023-02-04 15:44:39 --> Global POST, GET and COOKIE data sanitized
ERROR - 2023-02-04 15:44:41 --> Severity: error --> Exception: SQLSTATE[42S02]: Base table or view not found: 1932 Table 'sjboys.tbl_subjects' doesn't exist in engine C:\xampp\htdocs\PARROPHINS\ST_JOSEPHS_PUC_HASSAN\STUDENT_PORTAL\application\views\dashboard.php 2027
DEBUG - 2023-02-04 15:47:01 --> UTF-8 Support Enabled
DEBUG - 2023-02-04 15:47:01 --> Global POST, GET and COOKIE data sanitized
ERROR - 2023-02-04 15:47:03 --> Severity: error --> Exception: SQLSTATE[42S02]: Base table or view not found: 1932 Table 'sjboys.tbl_subjects' doesn't exist in engine C:\xampp\htdocs\PARROPHINS\ST_JOSEPHS_PUC_HASSAN\STUDENT_PORTAL\application\views\dashboard.php 2027
DEBUG - 2023-02-04 15:47:56 --> UTF-8 Support Enabled
DEBUG - 2023-02-04 15:47:56 --> Global POST, GET and COOKIE data sanitized
ERROR - 2023-02-04 15:47:58 --> Severity: error --> Exception: SQLSTATE[42S02]: Base table or view not found: 1932 Table 'sjboys.tbl_subjects' doesn't exist in engine C:\xampp\htdocs\PARROPHINS\ST_JOSEPHS_PUC_HASSAN\STUDENT_PORTAL\application\views\dashboard.php 2027
DEBUG - 2023-02-04 15:48:20 --> UTF-8 Support Enabled
DEBUG - 2023-02-04 15:48:20 --> Global POST, GET and COOKIE data sanitized
ERROR - 2023-02-04 15:48:21 --> Severity: error --> Exception: SQLSTATE[42S02]: Base table or view not found: 1932 Table 'sjboys.tbl_subjects' doesn't exist in engine C:\xampp\htdocs\PARROPHINS\ST_JOSEPHS_PUC_HASSAN\STUDENT_PORTAL\application\views\dashboard.php 2027
DEBUG - 2023-02-04 15:52:14 --> UTF-8 Support Enabled
DEBUG - 2023-02-04 15:52:14 --> Global POST, GET and COOKIE data sanitized
ERROR - 2023-02-04 15:52:16 --> Severity: error --> Exception: SQLSTATE[42S02]: Base table or view not found: 1932 Table 'sjboys.tbl_subjects' doesn't exist in engine C:\xampp\htdocs\PARROPHINS\ST_JOSEPHS_PUC_HASSAN\STUDENT_PORTAL\application\views\dashboard.php 2027
DEBUG - 2023-02-04 15:52:18 --> UTF-8 Support Enabled
DEBUG - 2023-02-04 15:52:18 --> Global POST, GET and COOKIE data sanitized
ERROR - 2023-02-04 15:52:19 --> Severity: error --> Exception: SQLSTATE[42S02]: Base table or view not found: 1932 Table 'sjboys.tbl_subjects' doesn't exist in engine C:\xampp\htdocs\PARROPHINS\ST_JOSEPHS_PUC_HASSAN\STUDENT_PORTAL\application\views\dashboard.php 2027
DEBUG - 2023-02-04 15:54:10 --> UTF-8 Support Enabled
DEBUG - 2023-02-04 15:54:10 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2023-02-04 15:54:10 --> UTF-8 Support Enabled
DEBUG - 2023-02-04 15:54:10 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2023-02-04 15:54:10 --> Total execution time: 0.0734
DEBUG - 2023-02-04 15:54:16 --> UTF-8 Support Enabled
DEBUG - 2023-02-04 15:54:16 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2023-02-04 15:54:16 --> Total execution time: 0.0844
DEBUG - 2023-02-04 15:55:57 --> UTF-8 Support Enabled
DEBUG - 2023-02-04 15:55:57 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2023-02-04 15:55:57 --> Total execution time: 0.0664
DEBUG - 2023-02-04 15:56:01 --> UTF-8 Support Enabled
DEBUG - 2023-02-04 15:56:01 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2023-02-04 15:56:01 --> Total execution time: 0.0833
DEBUG - 2023-02-04 16:06:40 --> UTF-8 Support Enabled
DEBUG - 2023-02-04 16:06:40 --> Global POST, GET and COOKIE data sanitized
ERROR - 2023-02-04 16:06:40 --> Query error: Table 'db_sjpuc_hassan_v1.ci_session_student_sjpuc_hassan' doesn't exist - Invalid query: SELECT `data`
FROM `ci_session_student_sjpuc_hassan`
WHERE `id` = 'ld06282734q29meon68fqg5pfldnhj6j'
DEBUG - 2023-02-04 16:06:40 --> Total execution time: 0.0604
ERROR - 2023-02-04 16:06:40 --> Query error: Table 'db_sjpuc_hassan_v1.ci_session_student_sjpuc_hassan' doesn't exist - Invalid query: INSERT INTO `ci_session_student_sjpuc_hassan` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('ld06282734q29meon68fqg5pfldnhj6j', '::1', 1675507000, '__ci_last_regenerate|i:1675507000;')
ERROR - 2023-02-04 16:06:40 --> Severity: Warning --> ini_set(): A session is active. You cannot change the session module's ini settings at this time C:\xampp\htdocs\PARROPHINS\ST_JOSEPHS_PUC_HASSAN\STUDENT_PORTAL\system\libraries\Session\Session_driver.php 188
ERROR - 2023-02-04 16:06:40 --> Severity: Warning --> session_write_close(): Failed to write session data using user defined save handler. (session.save_path: C:\xampp\tmp) Unknown 0
DEBUG - 2023-02-04 16:06:43 --> UTF-8 Support Enabled
DEBUG - 2023-02-04 16:06:43 --> Global POST, GET and COOKIE data sanitized
ERROR - 2023-02-04 16:06:43 --> Query error: Table 'db_sjpuc_hassan_v1.ci_session_student_sjpuc_hassan' doesn't exist - Invalid query: SELECT `data`
FROM `ci_session_student_sjpuc_hassan`
WHERE `id` = 'ld06282734q29meon68fqg5pfldnhj6j'
DEBUG - 2023-02-04 16:06:43 --> Total execution time: 0.0541
ERROR - 2023-02-04 16:06:43 --> Query error: Table 'db_sjpuc_hassan_v1.ci_session_student_sjpuc_hassan' doesn't exist - Invalid query: INSERT INTO `ci_session_student_sjpuc_hassan` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('ld06282734q29meon68fqg5pfldnhj6j', '::1', 1675507003, '__ci_last_regenerate|i:1675507003;')
ERROR - 2023-02-04 16:06:43 --> Severity: Warning --> ini_set(): A session is active. You cannot change the session module's ini settings at this time C:\xampp\htdocs\PARROPHINS\ST_JOSEPHS_PUC_HASSAN\STUDENT_PORTAL\system\libraries\Session\Session_driver.php 188
ERROR - 2023-02-04 16:06:43 --> Severity: Warning --> session_write_close(): Failed to write session data using user defined save handler. (session.save_path: C:\xampp\tmp) Unknown 0
DEBUG - 2023-02-04 16:06:44 --> UTF-8 Support Enabled
DEBUG - 2023-02-04 16:06:44 --> Global POST, GET and COOKIE data sanitized
ERROR - 2023-02-04 16:06:44 --> Query error: Table 'db_sjpuc_hassan_v1.ci_session_student_sjpuc_hassan' doesn't exist - Invalid query: SELECT `data`
FROM `ci_session_student_sjpuc_hassan`
WHERE `id` = 'ld06282734q29meon68fqg5pfldnhj6j'
DEBUG - 2023-02-04 16:06:44 --> Total execution time: 0.0743
ERROR - 2023-02-04 16:06:44 --> Query error: Table 'db_sjpuc_hassan_v1.ci_session_student_sjpuc_hassan' doesn't exist - Invalid query: INSERT INTO `ci_session_student_sjpuc_hassan` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('ld06282734q29meon68fqg5pfldnhj6j', '::1', 1675507004, '__ci_last_regenerate|i:1675507004;')
ERROR - 2023-02-04 16:06:44 --> Severity: Warning --> ini_set(): A session is active. You cannot change the session module's ini settings at this time C:\xampp\htdocs\PARROPHINS\ST_JOSEPHS_PUC_HASSAN\STUDENT_PORTAL\system\libraries\Session\Session_driver.php 188
ERROR - 2023-02-04 16:06:44 --> Severity: Warning --> session_write_close(): Failed to write session data using user defined save handler. (session.save_path: C:\xampp\tmp) Unknown 0
DEBUG - 2023-02-04 16:06:47 --> UTF-8 Support Enabled
DEBUG - 2023-02-04 16:06:47 --> Global POST, GET and COOKIE data sanitized
ERROR - 2023-02-04 16:06:47 --> Query error: Table 'db_sjpuc_hassan_v1.ci_session_student_sjpuc_hassan' doesn't exist - Invalid query: SELECT `data`
FROM `ci_session_student_sjpuc_hassan`
WHERE `id` = 'ld06282734q29meon68fqg5pfldnhj6j'
DEBUG - 2023-02-04 16:06:47 --> Total execution time: 0.0632
ERROR - 2023-02-04 16:06:47 --> Query error: Table 'db_sjpuc_hassan_v1.ci_session_student_sjpuc_hassan' doesn't exist - Invalid query: INSERT INTO `ci_session_student_sjpuc_hassan` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('ld06282734q29meon68fqg5pfldnhj6j', '::1', 1675507007, '__ci_last_regenerate|i:1675507007;')
ERROR - 2023-02-04 16:06:47 --> Severity: Warning --> ini_set(): A session is active. You cannot change the session module's ini settings at this time C:\xampp\htdocs\PARROPHINS\ST_JOSEPHS_PUC_HASSAN\STUDENT_PORTAL\system\libraries\Session\Session_driver.php 188
ERROR - 2023-02-04 16:06:47 --> Severity: Warning --> session_write_close(): Failed to write session data using user defined save handler. (session.save_path: C:\xampp\tmp) Unknown 0
DEBUG - 2023-02-04 16:06:48 --> UTF-8 Support Enabled
DEBUG - 2023-02-04 16:06:48 --> Global POST, GET and COOKIE data sanitized
ERROR - 2023-02-04 16:06:48 --> Query error: Table 'db_sjpuc_hassan_v1.ci_session_student_sjpuc_hassan' doesn't exist - Invalid query: SELECT `data`
FROM `ci_session_student_sjpuc_hassan`
WHERE `id` = 'ld06282734q29meon68fqg5pfldnhj6j'
DEBUG - 2023-02-04 16:06:48 --> Total execution time: 0.0781
ERROR - 2023-02-04 16:06:48 --> Query error: Table 'db_sjpuc_hassan_v1.ci_session_student_sjpuc_hassan' doesn't exist - Invalid query: INSERT INTO `ci_session_student_sjpuc_hassan` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('ld06282734q29meon68fqg5pfldnhj6j', '::1', 1675507008, '__ci_last_regenerate|i:1675507008;')
ERROR - 2023-02-04 16:06:48 --> Severity: Warning --> ini_set(): A session is active. You cannot change the session module's ini settings at this time C:\xampp\htdocs\PARROPHINS\ST_JOSEPHS_PUC_HASSAN\STUDENT_PORTAL\system\libraries\Session\Session_driver.php 188
ERROR - 2023-02-04 16:06:48 --> Severity: Warning --> session_write_close(): Failed to write session data using user defined save handler. (session.save_path: C:\xampp\tmp) Unknown 0
DEBUG - 2023-02-04 16:06:51 --> UTF-8 Support Enabled
DEBUG - 2023-02-04 16:06:51 --> Global POST, GET and COOKIE data sanitized
ERROR - 2023-02-04 16:06:51 --> Query error: Table 'db_sjpuc_hassan_v1.ci_session_student_sjpuc_hassan' doesn't exist - Invalid query: SELECT `data`
FROM `ci_session_student_sjpuc_hassan`
WHERE `id` = 'ld06282734q29meon68fqg5pfldnhj6j'
DEBUG - 2023-02-04 16:06:51 --> Total execution time: 0.0527
ERROR - 2023-02-04 16:06:51 --> Query error: Table 'db_sjpuc_hassan_v1.ci_session_student_sjpuc_hassan' doesn't exist - Invalid query: INSERT INTO `ci_session_student_sjpuc_hassan` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('ld06282734q29meon68fqg5pfldnhj6j', '::1', 1675507011, '__ci_last_regenerate|i:1675507011;')
ERROR - 2023-02-04 16:06:51 --> Severity: Warning --> ini_set(): A session is active. You cannot change the session module's ini settings at this time C:\xampp\htdocs\PARROPHINS\ST_JOSEPHS_PUC_HASSAN\STUDENT_PORTAL\system\libraries\Session\Session_driver.php 188
ERROR - 2023-02-04 16:06:51 --> Severity: Warning --> session_write_close(): Failed to write session data using user defined save handler. (session.save_path: C:\xampp\tmp) Unknown 0
DEBUG - 2023-02-04 16:06:54 --> UTF-8 Support Enabled
DEBUG - 2023-02-04 16:06:54 --> Global POST, GET and COOKIE data sanitized
ERROR - 2023-02-04 16:06:54 --> Query error: Table 'db_sjpuc_hassan_v1.ci_session_student_sjpuc_hassan' doesn't exist - Invalid query: SELECT `data`
FROM `ci_session_student_sjpuc_hassan`
WHERE `id` = 'ld06282734q29meon68fqg5pfldnhj6j'
DEBUG - 2023-02-04 16:06:54 --> Total execution time: 0.0951
ERROR - 2023-02-04 16:06:54 --> Query error: Table 'db_sjpuc_hassan_v1.ci_session_student_sjpuc_hassan' doesn't exist - Invalid query: INSERT INTO `ci_session_student_sjpuc_hassan` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('ld06282734q29meon68fqg5pfldnhj6j', '::1', 1675507014, '__ci_last_regenerate|i:1675507014;')
ERROR - 2023-02-04 16:06:54 --> Severity: Warning --> ini_set(): A session is active. You cannot change the session module's ini settings at this time C:\xampp\htdocs\PARROPHINS\ST_JOSEPHS_PUC_HASSAN\STUDENT_PORTAL\system\libraries\Session\Session_driver.php 188
ERROR - 2023-02-04 16:06:54 --> Severity: Warning --> session_write_close(): Failed to write session data using user defined save handler. (session.save_path: C:\xampp\tmp) Unknown 0
DEBUG - 2023-02-04 16:08:47 --> UTF-8 Support Enabled
DEBUG - 2023-02-04 16:08:47 --> Global POST, GET and COOKIE data sanitized
ERROR - 2023-02-04 16:08:47 --> Query error: Table 'db_sjpuc_hassan_v1.ci_session_student_sjpuc_hassan' doesn't exist - Invalid query: SELECT `data`
FROM `ci_session_student_sjpuc_hassan`
WHERE `id` = 'ld06282734q29meon68fqg5pfldnhj6j'
DEBUG - 2023-02-04 16:08:47 --> Total execution time: 0.0835
ERROR - 2023-02-04 16:08:47 --> Query error: Table 'db_sjpuc_hassan_v1.ci_session_student_sjpuc_hassan' doesn't exist - Invalid query: INSERT INTO `ci_session_student_sjpuc_hassan` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('ld06282734q29meon68fqg5pfldnhj6j', '::1', 1675507127, '__ci_last_regenerate|i:1675507127;')
ERROR - 2023-02-04 16:08:47 --> Severity: Warning --> ini_set(): A session is active. You cannot change the session module's ini settings at this time C:\xampp\htdocs\PARROPHINS\ST_JOSEPHS_PUC_HASSAN\STUDENT_PORTAL\system\libraries\Session\Session_driver.php 188
ERROR - 2023-02-04 16:08:47 --> Severity: Warning --> session_write_close(): Failed to write session data using user defined save handler. (session.save_path: C:\xampp\tmp) Unknown 0
DEBUG - 2023-02-04 16:08:48 --> UTF-8 Support Enabled
DEBUG - 2023-02-04 16:08:48 --> Global POST, GET and COOKIE data sanitized
ERROR - 2023-02-04 16:08:48 --> 404 Page Not Found: Assets/dist
DEBUG - 2023-02-04 16:08:50 --> UTF-8 Support Enabled
DEBUG - 2023-02-04 16:08:50 --> Global POST, GET and COOKIE data sanitized
ERROR - 2023-02-04 16:08:50 --> Query error: Table 'db_sjpuc_hassan_v1.ci_session_student_sjpuc_hassan' doesn't exist - Invalid query: SELECT `data`
FROM `ci_session_student_sjpuc_hassan`
WHERE `id` = 'ld06282734q29meon68fqg5pfldnhj6j'
DEBUG - 2023-02-04 16:08:50 --> Total execution time: 0.0478
ERROR - 2023-02-04 16:08:50 --> Query error: Table 'db_sjpuc_hassan_v1.ci_session_student_sjpuc_hassan' doesn't exist - Invalid query: INSERT INTO `ci_session_student_sjpuc_hassan` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('ld06282734q29meon68fqg5pfldnhj6j', '::1', 1675507130, '__ci_last_regenerate|i:1675507130;')
ERROR - 2023-02-04 16:08:50 --> Severity: Warning --> ini_set(): A session is active. You cannot change the session module's ini settings at this time C:\xampp\htdocs\PARROPHINS\ST_JOSEPHS_PUC_HASSAN\STUDENT_PORTAL\system\libraries\Session\Session_driver.php 188
ERROR - 2023-02-04 16:08:50 --> Severity: Warning --> session_write_close(): Failed to write session data using user defined save handler. (session.save_path: C:\xampp\tmp) Unknown 0
DEBUG - 2023-02-04 16:08:50 --> UTF-8 Support Enabled
DEBUG - 2023-02-04 16:08:50 --> Global POST, GET and COOKIE data sanitized
ERROR - 2023-02-04 16:08:50 --> 404 Page Not Found: Assets/dist
DEBUG - 2023-02-04 16:08:53 --> UTF-8 Support Enabled
DEBUG - 2023-02-04 16:08:53 --> Global POST, GET and COOKIE data sanitized
ERROR - 2023-02-04 16:08:53 --> Query error: Table 'db_sjpuc_hassan_v1.ci_session_student_sjpuc_hassan' doesn't exist - Invalid query: SELECT `data`
FROM `ci_session_student_sjpuc_hassan`
WHERE `id` = 'ld06282734q29meon68fqg5pfldnhj6j'
DEBUG - 2023-02-04 16:08:53 --> Total execution time: 0.0519
ERROR - 2023-02-04 16:08:53 --> Query error: Table 'db_sjpuc_hassan_v1.ci_session_student_sjpuc_hassan' doesn't exist - Invalid query: INSERT INTO `ci_session_student_sjpuc_hassan` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('ld06282734q29meon68fqg5pfldnhj6j', '::1', 1675507133, '__ci_last_regenerate|i:1675507133;')
ERROR - 2023-02-04 16:08:53 --> Severity: Warning --> ini_set(): A session is active. You cannot change the session module's ini settings at this time C:\xampp\htdocs\PARROPHINS\ST_JOSEPHS_PUC_HASSAN\STUDENT_PORTAL\system\libraries\Session\Session_driver.php 188
ERROR - 2023-02-04 16:08:53 --> Severity: Warning --> session_write_close(): Failed to write session data using user defined save handler. (session.save_path: C:\xampp\tmp) Unknown 0
DEBUG - 2023-02-04 16:08:53 --> UTF-8 Support Enabled
DEBUG - 2023-02-04 16:08:53 --> Global POST, GET and COOKIE data sanitized
ERROR - 2023-02-04 16:08:53 --> 404 Page Not Found: Assets/dist
DEBUG - 2023-02-04 16:17:51 --> UTF-8 Support Enabled
DEBUG - 2023-02-04 16:17:51 --> Global POST, GET and COOKIE data sanitized
ERROR - 2023-02-04 16:17:51 --> Query error: Table 'db_sjpuc_hassan_v1.ci_session_student_sjpuc_hassan' doesn't exist - Invalid query: SELECT `data`
FROM `ci_session_student_sjpuc_hassan`
WHERE `id` = 'ld06282734q29meon68fqg5pfldnhj6j'
DEBUG - 2023-02-04 16:17:51 --> Total execution time: 0.0864
ERROR - 2023-02-04 16:17:51 --> Query error: Table 'db_sjpuc_hassan_v1.ci_session_student_sjpuc_hassan' doesn't exist - Invalid query: INSERT INTO `ci_session_student_sjpuc_hassan` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('ld06282734q29meon68fqg5pfldnhj6j', '::1', 1675507671, '__ci_last_regenerate|i:1675507671;')
ERROR - 2023-02-04 16:17:51 --> Severity: Warning --> ini_set(): A session is active. You cannot change the session module's ini settings at this time C:\xampp\htdocs\PARROPHINS\ST_JOSEPHS_PUC_HASSAN\STUDENT_PORTAL\system\libraries\Session\Session_driver.php 188
ERROR - 2023-02-04 16:17:51 --> Severity: Warning --> session_write_close(): Failed to write session data using user defined save handler. (session.save_path: C:\xampp\tmp) Unknown 0
DEBUG - 2023-02-04 16:17:55 --> UTF-8 Support Enabled
DEBUG - 2023-02-04 16:17:55 --> Global POST, GET and COOKIE data sanitized
ERROR - 2023-02-04 16:17:55 --> Query error: Table 'db_sjpuc_hassan_v1.ci_session_student_sjpuc_hassan' doesn't exist - Invalid query: SELECT `data`
FROM `ci_session_student_sjpuc_hassan`
WHERE `id` = 'ld06282734q29meon68fqg5pfldnhj6j'
DEBUG - 2023-02-04 16:17:55 --> Total execution time: 0.0689
ERROR - 2023-02-04 16:17:55 --> Query error: Table 'db_sjpuc_hassan_v1.ci_session_student_sjpuc_hassan' doesn't exist - Invalid query: INSERT INTO `ci_session_student_sjpuc_hassan` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('ld06282734q29meon68fqg5pfldnhj6j', '::1', 1675507675, '__ci_last_regenerate|i:1675507675;')
ERROR - 2023-02-04 16:17:55 --> Severity: Warning --> ini_set(): A session is active. You cannot change the session module's ini settings at this time C:\xampp\htdocs\PARROPHINS\ST_JOSEPHS_PUC_HASSAN\STUDENT_PORTAL\system\libraries\Session\Session_driver.php 188
ERROR - 2023-02-04 16:17:55 --> Severity: Warning --> session_write_close(): Failed to write session data using user defined save handler. (session.save_path: C:\xampp\tmp) Unknown 0
DEBUG - 2023-02-04 16:17:56 --> UTF-8 Support Enabled
DEBUG - 2023-02-04 16:17:56 --> Global POST, GET and COOKIE data sanitized
ERROR - 2023-02-04 16:17:56 --> Query error: Table 'db_sjpuc_hassan_v1.ci_session_student_sjpuc_hassan' doesn't exist - Invalid query: SELECT `data`
FROM `ci_session_student_sjpuc_hassan`
WHERE `id` = 'ld06282734q29meon68fqg5pfldnhj6j'
DEBUG - 2023-02-04 16:17:56 --> Total execution time: 0.0753
ERROR - 2023-02-04 16:17:56 --> Query error: Table 'db_sjpuc_hassan_v1.ci_session_student_sjpuc_hassan' doesn't exist - Invalid query: INSERT INTO `ci_session_student_sjpuc_hassan` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('ld06282734q29meon68fqg5pfldnhj6j', '::1', 1675507676, '__ci_last_regenerate|i:1675507676;')
ERROR - 2023-02-04 16:17:56 --> Severity: Warning --> ini_set(): A session is active. You cannot change the session module's ini settings at this time C:\xampp\htdocs\PARROPHINS\ST_JOSEPHS_PUC_HASSAN\STUDENT_PORTAL\system\libraries\Session\Session_driver.php 188
ERROR - 2023-02-04 16:17:56 --> Severity: Warning --> session_write_close(): Failed to write session data using user defined save handler. (session.save_path: C:\xampp\tmp) Unknown 0
DEBUG - 2023-02-04 16:17:59 --> UTF-8 Support Enabled
DEBUG - 2023-02-04 16:17:59 --> Global POST, GET and COOKIE data sanitized
ERROR - 2023-02-04 16:17:59 --> Query error: Table 'db_sjpuc_hassan_v1.ci_session_student_sjpuc_hassan' doesn't exist - Invalid query: SELECT `data`
FROM `ci_session_student_sjpuc_hassan`
WHERE `id` = 'ld06282734q29meon68fqg5pfldnhj6j'
DEBUG - 2023-02-04 16:17:59 --> Total execution time: 0.0717
ERROR - 2023-02-04 16:17:59 --> Query error: Table 'db_sjpuc_hassan_v1.ci_session_student_sjpuc_hassan' doesn't exist - Invalid query: INSERT INTO `ci_session_student_sjpuc_hassan` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('ld06282734q29meon68fqg5pfldnhj6j', '::1', 1675507679, '__ci_last_regenerate|i:1675507679;')
ERROR - 2023-02-04 16:17:59 --> Severity: Warning --> ini_set(): A session is active. You cannot change the session module's ini settings at this time C:\xampp\htdocs\PARROPHINS\ST_JOSEPHS_PUC_HASSAN\STUDENT_PORTAL\system\libraries\Session\Session_driver.php 188
ERROR - 2023-02-04 16:17:59 --> Severity: Warning --> session_write_close(): Failed to write session data using user defined save handler. (session.save_path: C:\xampp\tmp) Unknown 0
DEBUG - 2023-02-04 16:18:54 --> UTF-8 Support Enabled
DEBUG - 2023-02-04 16:18:54 --> Global POST, GET and COOKIE data sanitized
ERROR - 2023-02-04 16:18:55 --> Query error: Table 'db_sjpuc_hassan_v1.ci_session_student_sjpuc_hassan' doesn't exist - Invalid query: SELECT `data`
FROM `ci_session_student_sjpuc_hassan`
WHERE `id` = 'ld06282734q29meon68fqg5pfldnhj6j'
DEBUG - 2023-02-04 16:18:55 --> Total execution time: 0.0603
ERROR - 2023-02-04 16:18:55 --> Query error: Table 'db_sjpuc_hassan_v1.ci_session_student_sjpuc_hassan' doesn't exist - Invalid query: INSERT INTO `ci_session_student_sjpuc_hassan` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('ld06282734q29meon68fqg5pfldnhj6j', '::1', 1675507735, '__ci_last_regenerate|i:1675507735;')
ERROR - 2023-02-04 16:18:55 --> Severity: Warning --> ini_set(): A session is active. You cannot change the session module's ini settings at this time C:\xampp\htdocs\PARROPHINS\ST_JOSEPHS_PUC_HASSAN\STUDENT_PORTAL\system\libraries\Session\Session_driver.php 188
ERROR - 2023-02-04 16:18:55 --> Severity: Warning --> session_write_close(): Failed to write session data using user defined save handler. (session.save_path: C:\xampp\tmp) Unknown 0
DEBUG - 2023-02-04 16:18:57 --> UTF-8 Support Enabled
DEBUG - 2023-02-04 16:18:58 --> Global POST, GET and COOKIE data sanitized
ERROR - 2023-02-04 16:18:58 --> Query error: Table 'db_sjpuc_hassan_v1.ci_session_student_sjpuc_hassan' doesn't exist - Invalid query: SELECT `data`
FROM `ci_session_student_sjpuc_hassan`
WHERE `id` = 'ld06282734q29meon68fqg5pfldnhj6j'
DEBUG - 2023-02-04 16:18:58 --> Total execution time: 0.0580
ERROR - 2023-02-04 16:18:58 --> Query error: Table 'db_sjpuc_hassan_v1.ci_session_student_sjpuc_hassan' doesn't exist - Invalid query: INSERT INTO `ci_session_student_sjpuc_hassan` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('ld06282734q29meon68fqg5pfldnhj6j', '::1', 1675507738, '__ci_last_regenerate|i:1675507738;')
ERROR - 2023-02-04 16:18:58 --> Severity: Warning --> ini_set(): A session is active. You cannot change the session module's ini settings at this time C:\xampp\htdocs\PARROPHINS\ST_JOSEPHS_PUC_HASSAN\STUDENT_PORTAL\system\libraries\Session\Session_driver.php 188
ERROR - 2023-02-04 16:18:58 --> Severity: Warning --> session_write_close(): Failed to write session data using user defined save handler. (session.save_path: C:\xampp\tmp) Unknown 0
DEBUG - 2023-02-04 16:18:59 --> UTF-8 Support Enabled
DEBUG - 2023-02-04 16:18:59 --> Global POST, GET and COOKIE data sanitized
ERROR - 2023-02-04 16:18:59 --> Query error: Table 'db_sjpuc_hassan_v1.ci_session_student_sjpuc_hassan' doesn't exist - Invalid query: SELECT `data`
FROM `ci_session_student_sjpuc_hassan`
WHERE `id` = 'ld06282734q29meon68fqg5pfldnhj6j'
DEBUG - 2023-02-04 16:18:59 --> Total execution time: 0.0495
ERROR - 2023-02-04 16:18:59 --> Query error: Table 'db_sjpuc_hassan_v1.ci_session_student_sjpuc_hassan' doesn't exist - Invalid query: INSERT INTO `ci_session_student_sjpuc_hassan` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('ld06282734q29meon68fqg5pfldnhj6j', '::1', 1675507739, '__ci_last_regenerate|i:1675507739;')
ERROR - 2023-02-04 16:18:59 --> Severity: Warning --> ini_set(): A session is active. You cannot change the session module's ini settings at this time C:\xampp\htdocs\PARROPHINS\ST_JOSEPHS_PUC_HASSAN\STUDENT_PORTAL\system\libraries\Session\Session_driver.php 188
ERROR - 2023-02-04 16:18:59 --> Severity: Warning --> session_write_close(): Failed to write session data using user defined save handler. (session.save_path: C:\xampp\tmp) Unknown 0
DEBUG - 2023-02-04 17:31:00 --> UTF-8 Support Enabled
DEBUG - 2023-02-04 17:31:00 --> No URI present. Default controller set.
DEBUG - 2023-02-04 17:31:00 --> Global POST, GET and COOKIE data sanitized
ERROR - 2023-02-04 17:31:10 --> Severity: Warning --> mysqli::real_connect(): (HY000/2003): Can't connect to MySQL server on '192.168.0.100' (110) /home/chandrahasa/public_html/sjpuchassan.schoolphins.com/student/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-02-04 17:31:10 --> Unable to connect to the database
ERROR - 2023-02-04 17:31:20 --> Severity: Warning --> mysqli::real_connect(): (HY000/2003): Can't connect to MySQL server on '192.168.0.100' (110) /home/chandrahasa/public_html/sjpuchassan.schoolphins.com/student/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-02-04 17:31:20 --> Severity: Warning --> ini_set(): A session is active. You cannot change the session module's ini settings at this time /home/chandrahasa/public_html/sjpuchassan.schoolphins.com/student/system/libraries/Session/Session_driver.php 188
ERROR - 2023-02-04 17:31:20 --> Severity: Warning --> session_start(): Failed to initialize storage module: user (path: /opt/alt/php73/var/lib/php/session) /home/chandrahasa/public_html/sjpuchassan.schoolphins.com/student/system/libraries/Session/Session.php 143
DEBUG - 2023-02-04 17:31:20 --> Total execution time: 20.0548
DEBUG - 2023-02-04 17:31:24 --> UTF-8 Support Enabled
DEBUG - 2023-02-04 17:31:24 --> No URI present. Default controller set.
DEBUG - 2023-02-04 17:31:24 --> Global POST, GET and COOKIE data sanitized
ERROR - 2023-02-04 17:31:34 --> Severity: Warning --> mysqli::real_connect(): (HY000/2003): Can't connect to MySQL server on '192.168.0.100' (110) /home/chandrahasa/public_html/sjpuchassan.schoolphins.com/student/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-02-04 17:31:34 --> Unable to connect to the database
ERROR - 2023-02-04 17:31:44 --> Severity: Warning --> mysqli::real_connect(): (HY000/2003): Can't connect to MySQL server on '192.168.0.100' (110) /home/chandrahasa/public_html/sjpuchassan.schoolphins.com/student/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-02-04 17:31:44 --> Severity: Warning --> ini_set(): A session is active. You cannot change the session module's ini settings at this time /home/chandrahasa/public_html/sjpuchassan.schoolphins.com/student/system/libraries/Session/Session_driver.php 188
ERROR - 2023-02-04 17:31:44 --> Severity: Warning --> session_start(): Failed to initialize storage module: user (path: /opt/alt/php73/var/lib/php/session) /home/chandrahasa/public_html/sjpuchassan.schoolphins.com/student/system/libraries/Session/Session.php 143
DEBUG - 2023-02-04 17:31:44 --> Total execution time: 20.0247
DEBUG - 2023-02-04 17:33:16 --> UTF-8 Support Enabled
DEBUG - 2023-02-04 17:33:16 --> Global POST, GET and COOKIE data sanitized
ERROR - 2023-02-04 17:33:16 --> 404 Page Not Found: Assets/downloads
DEBUG - 2023-02-04 17:33:21 --> UTF-8 Support Enabled
DEBUG - 2023-02-04 17:33:21 --> Global POST, GET and COOKIE data sanitized
ERROR - 2023-02-04 17:33:31 --> Severity: Warning --> mysqli::real_connect(): (HY000/2003): Can't connect to MySQL server on '192.168.0.100' (110) /home/chandrahasa/public_html/sjpuchassan.schoolphins.com/student/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-02-04 17:33:31 --> Unable to connect to the database
ERROR - 2023-02-04 17:33:41 --> Severity: Warning --> mysqli::real_connect(): (HY000/2003): Can't connect to MySQL server on '192.168.0.100' (110) /home/chandrahasa/public_html/sjpuchassan.schoolphins.com/student/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-02-04 17:33:41 --> Severity: Warning --> ini_set(): A session is active. You cannot change the session module's ini settings at this time /home/chandrahasa/public_html/sjpuchassan.schoolphins.com/student/system/libraries/Session/Session_driver.php 188
ERROR - 2023-02-04 17:33:41 --> Severity: Warning --> session_start(): Failed to initialize storage module: user (path: /opt/alt/php73/var/lib/php/session) /home/chandrahasa/public_html/sjpuchassan.schoolphins.com/student/system/libraries/Session/Session.php 143
DEBUG - 2023-02-04 17:33:41 --> Total execution time: 20.0265
DEBUG - 2023-02-04 17:33:41 --> UTF-8 Support Enabled
DEBUG - 2023-02-04 17:33:41 --> Global POST, GET and COOKIE data sanitized
ERROR - 2023-02-04 17:33:41 --> 404 Page Not Found: Assets/dist
DEBUG - 2023-02-04 17:33:59 --> UTF-8 Support Enabled
DEBUG - 2023-02-04 17:33:59 --> No URI present. Default controller set.
DEBUG - 2023-02-04 17:33:59 --> Global POST, GET and COOKIE data sanitized
ERROR - 2023-02-04 17:34:09 --> Severity: Warning --> mysqli::real_connect(): (HY000/2003): Can't connect to MySQL server on '192.168.0.100' (110) /home/chandrahasa/public_html/sjpuchassan.schoolphins.com/student/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-02-04 17:34:09 --> Unable to connect to the database
ERROR - 2023-02-04 17:34:19 --> Severity: Warning --> mysqli::real_connect(): (HY000/2003): Can't connect to MySQL server on '192.168.0.100' (110) /home/chandrahasa/public_html/sjpuchassan.schoolphins.com/student/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-02-04 17:34:19 --> Severity: Warning --> ini_set(): A session is active. You cannot change the session module's ini settings at this time /home/chandrahasa/public_html/sjpuchassan.schoolphins.com/student/system/libraries/Session/Session_driver.php 188
ERROR - 2023-02-04 17:34:19 --> Severity: Warning --> session_start(): Failed to initialize storage module: user (path: /opt/alt/php73/var/lib/php/session) /home/chandrahasa/public_html/sjpuchassan.schoolphins.com/student/system/libraries/Session/Session.php 143
DEBUG - 2023-02-04 17:34:19 --> Total execution time: 20.0246
DEBUG - 2023-02-04 17:35:14 --> UTF-8 Support Enabled
DEBUG - 2023-02-04 17:35:14 --> No URI present. Default controller set.
DEBUG - 2023-02-04 17:35:14 --> Global POST, GET and COOKIE data sanitized
ERROR - 2023-02-04 17:35:24 --> Severity: Warning --> mysqli::real_connect(): (HY000/2003): Can't connect to MySQL server on '192.168.0.100' (110) /home/chandrahasa/public_html/sjpuchassan.schoolphins.com/student/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-02-04 17:35:24 --> Unable to connect to the database
ERROR - 2023-02-04 17:35:34 --> Severity: Warning --> mysqli::real_connect(): (HY000/2003): Can't connect to MySQL server on '192.168.0.100' (110) /home/chandrahasa/public_html/sjpuchassan.schoolphins.com/student/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-02-04 17:35:34 --> Severity: Warning --> ini_set(): A session is active. You cannot change the session module's ini settings at this time /home/chandrahasa/public_html/sjpuchassan.schoolphins.com/student/system/libraries/Session/Session_driver.php 188
ERROR - 2023-02-04 17:35:34 --> Severity: Warning --> session_start(): Failed to initialize storage module: user (path: /opt/alt/php73/var/lib/php/session) /home/chandrahasa/public_html/sjpuchassan.schoolphins.com/student/system/libraries/Session/Session.php 143
DEBUG - 2023-02-04 17:35:34 --> Total execution time: 20.0249
DEBUG - 2023-02-04 17:35:35 --> UTF-8 Support Enabled
DEBUG - 2023-02-04 17:35:35 --> Global POST, GET and COOKIE data sanitized
ERROR - 2023-02-04 17:35:35 --> 404 Page Not Found: Assets/dist
DEBUG - 2023-02-04 17:36:13 --> UTF-8 Support Enabled
DEBUG - 2023-02-04 17:36:13 --> No URI present. Default controller set.
DEBUG - 2023-02-04 17:36:13 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2023-02-04 17:36:20 --> UTF-8 Support Enabled
DEBUG - 2023-02-04 17:36:20 --> No URI present. Default controller set.
DEBUG - 2023-02-04 17:36:20 --> Global POST, GET and COOKIE data sanitized
ERROR - 2023-02-04 17:36:23 --> Severity: Warning --> mysqli::real_connect(): (HY000/2003): Can't connect to MySQL server on '192.168.0.100' (110) /home/chandrahasa/public_html/sjpuchassan.schoolphins.com/student/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-02-04 17:36:23 --> Unable to connect to the database
ERROR - 2023-02-04 17:36:30 --> Severity: Warning --> mysqli::real_connect(): (HY000/2003): Can't connect to MySQL server on '192.168.0.100' (110) /home/chandrahasa/public_html/sjpuchassan.schoolphins.com/student/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-02-04 17:36:30 --> Unable to connect to the database
ERROR - 2023-02-04 17:36:33 --> Severity: Warning --> mysqli::real_connect(): (HY000/2003): Can't connect to MySQL server on '192.168.0.100' (110) /home/chandrahasa/public_html/sjpuchassan.schoolphins.com/student/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-02-04 17:36:33 --> Severity: Warning --> ini_set(): A session is active. You cannot change the session module's ini settings at this time /home/chandrahasa/public_html/sjpuchassan.schoolphins.com/student/system/libraries/Session/Session_driver.php 188
ERROR - 2023-02-04 17:36:33 --> Severity: Warning --> session_start(): Failed to initialize storage module: user (path: /opt/alt/php73/var/lib/php/session) /home/chandrahasa/public_html/sjpuchassan.schoolphins.com/student/system/libraries/Session/Session.php 143
DEBUG - 2023-02-04 17:36:33 --> Total execution time: 20.0238
DEBUG - 2023-02-04 17:36:33 --> UTF-8 Support Enabled
DEBUG - 2023-02-04 17:36:33 --> Global POST, GET and COOKIE data sanitized
ERROR - 2023-02-04 17:36:40 --> Severity: Warning --> mysqli::real_connect(): (HY000/2003): Can't connect to MySQL server on '192.168.0.100' (110) /home/chandrahasa/public_html/sjpuchassan.schoolphins.com/student/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-02-04 17:36:40 --> Severity: Warning --> ini_set(): A session is active. You cannot change the session module's ini settings at this time /home/chandrahasa/public_html/sjpuchassan.schoolphins.com/student/system/libraries/Session/Session_driver.php 188
ERROR - 2023-02-04 17:36:40 --> Severity: Warning --> session_start(): Failed to initialize storage module: user (path: /opt/alt/php73/var/lib/php/session) /home/chandrahasa/public_html/sjpuchassan.schoolphins.com/student/system/libraries/Session/Session.php 143
DEBUG - 2023-02-04 17:36:40 --> Total execution time: 20.0249
ERROR - 2023-02-04 17:36:43 --> Severity: Warning --> mysqli::real_connect(): (HY000/2003): Can't connect to MySQL server on '192.168.0.100' (110) /home/chandrahasa/public_html/sjpuchassan.schoolphins.com/student/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-02-04 17:36:43 --> Unable to connect to the database
ERROR - 2023-02-04 17:36:53 --> Severity: Warning --> mysqli::real_connect(): (HY000/2003): Can't connect to MySQL server on '192.168.0.100' (110) /home/chandrahasa/public_html/sjpuchassan.schoolphins.com/student/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-02-04 17:36:53 --> Severity: Warning --> ini_set(): A session is active. You cannot change the session module's ini settings at this time /home/chandrahasa/public_html/sjpuchassan.schoolphins.com/student/system/libraries/Session/Session_driver.php 188
ERROR - 2023-02-04 17:36:53 --> Severity: Warning --> session_start(): Failed to initialize storage module: user (path: /opt/alt/php73/var/lib/php/session) /home/chandrahasa/public_html/sjpuchassan.schoolphins.com/student/system/libraries/Session/Session.php 143
DEBUG - 2023-02-04 17:36:53 --> Total execution time: 20.0289
DEBUG - 2023-02-04 17:36:54 --> UTF-8 Support Enabled
DEBUG - 2023-02-04 17:36:54 --> Global POST, GET and COOKIE data sanitized
ERROR - 2023-02-04 17:36:54 --> 404 Page Not Found: Assets/dist
DEBUG - 2023-02-04 17:36:55 --> UTF-8 Support Enabled
DEBUG - 2023-02-04 17:36:55 --> Global POST, GET and COOKIE data sanitized
ERROR - 2023-02-04 17:36:55 --> 404 Page Not Found: Assets/dist
DEBUG - 2023-02-04 17:38:53 --> UTF-8 Support Enabled
DEBUG - 2023-02-04 17:38:53 --> Global POST, GET and COOKIE data sanitized
ERROR - 2023-02-04 17:39:03 --> Severity: Warning --> mysqli::real_connect(): (HY000/2003): Can't connect to MySQL server on '192.168.0.100' (110) /home/chandrahasa/public_html/sjpuchassan.schoolphins.com/student/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-02-04 17:39:03 --> Unable to connect to the database
ERROR - 2023-02-04 17:39:13 --> Severity: Warning --> mysqli::real_connect(): (HY000/2003): Can't connect to MySQL server on '192.168.0.100' (110) /home/chandrahasa/public_html/sjpuchassan.schoolphins.com/student/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-02-04 17:39:13 --> Severity: Warning --> ini_set(): A session is active. You cannot change the session module's ini settings at this time /home/chandrahasa/public_html/sjpuchassan.schoolphins.com/student/system/libraries/Session/Session_driver.php 188
ERROR - 2023-02-04 17:39:13 --> Severity: Warning --> session_start(): Failed to initialize storage module: user (path: /opt/alt/php73/var/lib/php/session) /home/chandrahasa/public_html/sjpuchassan.schoolphins.com/student/system/libraries/Session/Session.php 143
DEBUG - 2023-02-04 17:39:13 --> Total execution time: 20.0255
DEBUG - 2023-02-04 17:39:13 --> UTF-8 Support Enabled
DEBUG - 2023-02-04 17:39:13 --> Global POST, GET and COOKIE data sanitized
ERROR - 2023-02-04 17:39:13 --> 404 Page Not Found: Assets/dist
DEBUG - 2023-02-04 17:39:14 --> UTF-8 Support Enabled
DEBUG - 2023-02-04 17:39:14 --> Global POST, GET and COOKIE data sanitized
ERROR - 2023-02-04 17:39:14 --> 404 Page Not Found: Assets/dist
DEBUG - 2023-02-04 17:39:16 --> UTF-8 Support Enabled
DEBUG - 2023-02-04 17:39:16 --> No URI present. Default controller set.
DEBUG - 2023-02-04 17:39:16 --> Global POST, GET and COOKIE data sanitized
ERROR - 2023-02-04 17:39:26 --> Severity: Warning --> mysqli::real_connect(): (HY000/2003): Can't connect to MySQL server on '192.168.0.100' (110) /home/chandrahasa/public_html/sjpuchassan.schoolphins.com/student/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-02-04 17:39:26 --> Unable to connect to the database
ERROR - 2023-02-04 17:39:36 --> Severity: Warning --> mysqli::real_connect(): (HY000/2003): Can't connect to MySQL server on '192.168.0.100' (110) /home/chandrahasa/public_html/sjpuchassan.schoolphins.com/student/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-02-04 17:39:36 --> Severity: Warning --> ini_set(): A session is active. You cannot change the session module's ini settings at this time /home/chandrahasa/public_html/sjpuchassan.schoolphins.com/student/system/libraries/Session/Session_driver.php 188
ERROR - 2023-02-04 17:39:36 --> Severity: Warning --> session_start(): Failed to initialize storage module: user (path: /opt/alt/php73/var/lib/php/session) /home/chandrahasa/public_html/sjpuchassan.schoolphins.com/student/system/libraries/Session/Session.php 143
DEBUG - 2023-02-04 17:39:36 --> Total execution time: 20.0230
DEBUG - 2023-02-04 17:40:29 --> UTF-8 Support Enabled
DEBUG - 2023-02-04 17:40:29 --> Global POST, GET and COOKIE data sanitized
ERROR - 2023-02-04 17:40:39 --> Severity: Warning --> mysqli::real_connect(): (HY000/2003): Can't connect to MySQL server on '192.168.0.100' (110) /home/chandrahasa/public_html/sjpuchassan.schoolphins.com/student/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-02-04 17:40:39 --> Unable to connect to the database
ERROR - 2023-02-04 17:40:50 --> Severity: Warning --> mysqli::real_connect(): (HY000/2003): Can't connect to MySQL server on '192.168.0.100' (110) /home/chandrahasa/public_html/sjpuchassan.schoolphins.com/student/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-02-04 17:40:50 --> Severity: Warning --> ini_set(): A session is active. You cannot change the session module's ini settings at this time /home/chandrahasa/public_html/sjpuchassan.schoolphins.com/student/system/libraries/Session/Session_driver.php 188
ERROR - 2023-02-04 17:40:50 --> Severity: Warning --> session_start(): Failed to initialize storage module: user (path: /opt/alt/php73/var/lib/php/session) /home/chandrahasa/public_html/sjpuchassan.schoolphins.com/student/system/libraries/Session/Session.php 143
DEBUG - 2023-02-04 17:40:50 --> Total execution time: 20.0265
DEBUG - 2023-02-04 17:40:50 --> UTF-8 Support Enabled
DEBUG - 2023-02-04 17:40:50 --> Global POST, GET and COOKIE data sanitized
ERROR - 2023-02-04 17:40:50 --> 404 Page Not Found: Assets/dist
DEBUG - 2023-02-04 17:41:52 --> UTF-8 Support Enabled
DEBUG - 2023-02-04 17:41:52 --> No URI present. Default controller set.
DEBUG - 2023-02-04 17:41:52 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2023-02-04 17:41:57 --> UTF-8 Support Enabled
DEBUG - 2023-02-04 17:41:57 --> Global POST, GET and COOKIE data sanitized
ERROR - 2023-02-04 17:42:02 --> Severity: Warning --> mysqli::real_connect(): (HY000/2003): Can't connect to MySQL server on '192.168.0.100' (110) /home/chandrahasa/public_html/sjpuchassan.schoolphins.com/student/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-02-04 17:42:02 --> Unable to connect to the database
ERROR - 2023-02-04 17:42:07 --> Severity: Warning --> mysqli::real_connect(): (HY000/2003): Can't connect to MySQL server on '192.168.0.100' (110) /home/chandrahasa/public_html/sjpuchassan.schoolphins.com/student/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-02-04 17:42:07 --> Unable to connect to the database
ERROR - 2023-02-04 17:42:12 --> Severity: Warning --> mysqli::real_connect(): (HY000/2003): Can't connect to MySQL server on '192.168.0.100' (110) /home/chandrahasa/public_html/sjpuchassan.schoolphins.com/student/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-02-04 17:42:12 --> Severity: Warning --> ini_set(): A session is active. You cannot change the session module's ini settings at this time /home/chandrahasa/public_html/sjpuchassan.schoolphins.com/student/system/libraries/Session/Session_driver.php 188
ERROR - 2023-02-04 17:42:12 --> Severity: Warning --> session_start(): Failed to initialize storage module: user (path: /opt/alt/php73/var/lib/php/session) /home/chandrahasa/public_html/sjpuchassan.schoolphins.com/student/system/libraries/Session/Session.php 143
DEBUG - 2023-02-04 17:42:12 --> Total execution time: 20.0260
ERROR - 2023-02-04 17:42:17 --> Severity: Warning --> mysqli::real_connect(): (HY000/2003): Can't connect to MySQL server on '192.168.0.100' (110) /home/chandrahasa/public_html/sjpuchassan.schoolphins.com/student/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-02-04 17:42:17 --> Severity: Warning --> ini_set(): A session is active. You cannot change the session module's ini settings at this time /home/chandrahasa/public_html/sjpuchassan.schoolphins.com/student/system/libraries/Session/Session_driver.php 188
ERROR - 2023-02-04 17:42:17 --> Severity: Warning --> session_start(): Failed to initialize storage module: user (path: /opt/alt/php73/var/lib/php/session) /home/chandrahasa/public_html/sjpuchassan.schoolphins.com/student/system/libraries/Session/Session.php 143
DEBUG - 2023-02-04 17:42:17 --> Total execution time: 20.0257
DEBUG - 2023-02-04 17:42:17 --> UTF-8 Support Enabled
DEBUG - 2023-02-04 17:42:17 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2023-02-04 17:42:17 --> UTF-8 Support Enabled
DEBUG - 2023-02-04 17:42:17 --> Global POST, GET and COOKIE data sanitized
ERROR - 2023-02-04 17:42:17 --> 404 Page Not Found: Assets/dist
ERROR - 2023-02-04 17:42:27 --> Severity: Warning --> mysqli::real_connect(): (HY000/2003): Can't connect to MySQL server on '192.168.0.100' (110) /home/chandrahasa/public_html/sjpuchassan.schoolphins.com/student/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-02-04 17:42:27 --> Unable to connect to the database
ERROR - 2023-02-04 17:42:37 --> Severity: Warning --> mysqli::real_connect(): (HY000/2003): Can't connect to MySQL server on '192.168.0.100' (110) /home/chandrahasa/public_html/sjpuchassan.schoolphins.com/student/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-02-04 17:42:37 --> Severity: Warning --> ini_set(): A session is active. You cannot change the session module's ini settings at this time /home/chandrahasa/public_html/sjpuchassan.schoolphins.com/student/system/libraries/Session/Session_driver.php 188
ERROR - 2023-02-04 17:42:37 --> Severity: Warning --> session_start(): Failed to initialize storage module: user (path: /opt/alt/php73/var/lib/php/session) /home/chandrahasa/public_html/sjpuchassan.schoolphins.com/student/system/libraries/Session/Session.php 143
DEBUG - 2023-02-04 17:42:37 --> Total execution time: 20.0247
DEBUG - 2023-02-04 17:42:37 --> UTF-8 Support Enabled
DEBUG - 2023-02-04 17:42:37 --> Global POST, GET and COOKIE data sanitized
ERROR - 2023-02-04 17:42:37 --> 404 Page Not Found: Assets/dist
DEBUG - 2023-02-04 17:45:04 --> UTF-8 Support Enabled
DEBUG - 2023-02-04 17:45:04 --> Global POST, GET and COOKIE data sanitized
ERROR - 2023-02-04 17:45:14 --> Severity: Warning --> mysqli::real_connect(): (HY000/2003): Can't connect to MySQL server on '192.168.0.100' (110) /home/chandrahasa/public_html/sjpuchassan.schoolphins.com/student/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-02-04 17:45:14 --> Unable to connect to the database
ERROR - 2023-02-04 17:45:24 --> Severity: Warning --> mysqli::real_connect(): (HY000/2003): Can't connect to MySQL server on '192.168.0.100' (110) /home/chandrahasa/public_html/sjpuchassan.schoolphins.com/student/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-02-04 17:45:24 --> Severity: Warning --> ini_set(): A session is active. You cannot change the session module's ini settings at this time /home/chandrahasa/public_html/sjpuchassan.schoolphins.com/student/system/libraries/Session/Session_driver.php 188
ERROR - 2023-02-04 17:45:24 --> Severity: Warning --> session_start(): Failed to initialize storage module: user (path: /opt/alt/php73/var/lib/php/session) /home/chandrahasa/public_html/sjpuchassan.schoolphins.com/student/system/libraries/Session/Session.php 143
DEBUG - 2023-02-04 17:45:24 --> Total execution time: 20.0259
DEBUG - 2023-02-04 17:55:46 --> UTF-8 Support Enabled
DEBUG - 2023-02-04 17:55:46 --> Global POST, GET and COOKIE data sanitized
ERROR - 2023-02-04 17:55:56 --> Severity: Warning --> mysqli::real_connect(): (HY000/2003): Can't connect to MySQL server on '192.168.0.100' (110) /home/chandrahasa/public_html/sjpuchassan.schoolphins.com/student/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-02-04 17:55:56 --> Unable to connect to the database
ERROR - 2023-02-04 17:56:06 --> Severity: Warning --> mysqli::real_connect(): (HY000/2003): Can't connect to MySQL server on '192.168.0.100' (110) /home/chandrahasa/public_html/sjpuchassan.schoolphins.com/student/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-02-04 17:56:06 --> Severity: Warning --> ini_set(): A session is active. You cannot change the session module's ini settings at this time /home/chandrahasa/public_html/sjpuchassan.schoolphins.com/student/system/libraries/Session/Session_driver.php 188
ERROR - 2023-02-04 17:56:06 --> Severity: Warning --> session_start(): Failed to initialize storage module: user (path: /opt/alt/php73/var/lib/php/session) /home/chandrahasa/public_html/sjpuchassan.schoolphins.com/student/system/libraries/Session/Session.php 143
DEBUG - 2023-02-04 17:56:06 --> Total execution time: 20.0259
