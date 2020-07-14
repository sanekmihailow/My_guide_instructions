<?php

// Adjust error_reporting favourable to deployment.
version_compare(PHP_VERSION, '5.5.0') <= 0 ? error_reporting(E_WARNING & ~E_NOTICE & ~E_DEPRECATED & E_ERROR) : error_reporting(E_WARNING & ~E_NOTICE & ~E_DEPRECATED  & E_ERROR & ~E_STRICT); // PRODUCTION
//ini_set('display_errors','on'); version_compare(PHP_VERSION, '5.5.0') <= 0 ? error_reporting(E_WARNING & ~E_NOTICE & ~E_DEPRECATED) : error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED & ~E_STRICT);   // DEBUGGING
//ini_set('display_errors','on'); error_reporting(E_ALL); // STRICT DEVELOPMENT

include('vtigerversion.php');
//# memory limit default value = 64M
ini_set('memory_limit','512M');

//# show or hide calendar, world clock, calculator, chat and CKEditor
//# Do NOT remove the quotes if you set these to false!
$CALENDAR_DISPLAY = 'true';
$USE_RTE = 'true';

//# helpdesk support email id and support name (Example: 'support@vtiger.com' and 'vtiger support')
$HELPDESK_SUPPORT_EMAIL_ID = 'no_reply@vordoom.com';
$HELPDESK_SUPPORT_NAME = 'your-support name';
$HELPDESK_SUPPORT_EMAIL_REPLY_ID = $HELPDESK_SUPPORT_EMAIL_ID;

//---database---
$dbconfig['db_server'] = 'localhost';
$dbconfig['db_port'] = ':3306';
$dbconfig['db_username'] = 'DBusername';
$dbconfig['db_password'] = 'DBpassword';
$dbconfig['db_name'] = 'DBname';
$dbconfig['db_type'] = 'mysqli';
$dbconfig['db_status'] = 'true';
$dbconfig['db_hostname'] = $dbconfig['db_server'].$dbconfig['db_port'];
$dbconfig['log_sql'] = false;
$dbconfigoption['persistent'] = true;
$dbconfigoption['autofree'] = false;
$dbconfigoption['debug'] = 0;
$dbconfigoption['seqname_format'] = '%s_seq';
$dbconfigoption['portability'] = 0;
$dbconfigoption['ssl'] = false;
$host_name = $dbconfig['db_hostname'];

//---settings---
$site_URL = 'http://DomainName';
//# url for customer portal (Example: http://vtiger.com/portal)
$PORTAL_URL = $site_URL.'/customerportal';
//# root directory path
$root_directory = '/home/vtigers/VtigerName/domain
';
//# cache direcory path
$cache_dir = 'cache/';
$tmp_dir = 'cache/images/';
$import_dir = 'cache/import/';
$upload_dir = 'cache/upload/';

//# upload_maxsize default value = 3000000
$upload_maxsize = 3145728;//3MB

//# flag to allow export functionality
//# 'all' to allow anyone to use exports
//# 'admin' to only allow admins to export
//# 'none' to block exports completely
//# allow_exports default value = all
$allow_exports = 'all';
$upload_badext = array('php', 'php3', 'php4', 'php5', 'pl', 'cgi', 'py', 'asp', 'cfm', 'js', 'vbs', 'html', 'htm', 'exe', 'bin', 'bat', 'sh', 'dll', 'phps', 'phtml', 'xhtml', 'rb', 'msi', 'jsp', 'shtml', 'sth', 'shtm');
$list_max_entries_per_page = '20';
$history_max_viewed = '5';
$default_module = 'Home';
$default_action = 'index';
$default_theme = 'softed';

$default_user_name = '';
$default_password = '';
$create_default_user = false;
//# Master currency name
$currency_name = 'USA, Dollars';
$default_charset = 'UTF-8';
$default_language = 'en_us';
$display_empty_home_blocks = false;
$disable_stats_tracking = false;
//# Generating Unique Application Key
#M $application_unique_key = '38de833c0f52ab1d9bed830578c7aee7';
$application_unique_key = 'RandomText';
$php_max_execution_time = 0;
$default_timezone = 'Europe/Moscow';

if(isset($default_timezone) && function_exists('date_default_timezone_set')) {
        @date_default_timezone_set($default_timezone);
}
$default_layout = 'v7';
$sp_check_site_url = 'true';
include_once 'config.security.php';
