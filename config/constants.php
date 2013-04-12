<?php
#project paths
	define('DOC_ROOT',$_SERVER['DOCUMENT_ROOT']);
	define('SITE_ROOT',DOC_ROOT.'/jobportal/');
	define('SITE_PATH','http://'.$_SERVER['HTTP_HOST'].'/jobportal/');
	define('IMAGE_PATH',SITE_PATH.'images/');
	define('CSS_PATH',SITE_PATH.'css/');
	define('JS_PATH',SITE_PATH.'js/');
	define('CLASSES_ROOT',SITE_ROOT.'classes/');
	define('LIBRARY_ROOT',SITE_ROOT.'library/');
	define('SERVER_VALIDATION_ROOT',SITE_ROOT.'library/serverValidation.class.php');
	define('PDO_ROOT',SITE_ROOT.'library/database/');
	define('VIEW_PATH',SITE_ROOT.'view/');
	define('MODEL_PATH',SITE_ROOT.'model/');
	define('CONFIG_PATH',SITE_ROOT.'config/');
#path for logo
	define('LOGO_IMAGE_PATH',SITE_PATH.'images/logo/');
	define('LOGO_IMAGE_UPLOAD_PATH',SITE_ROOT.'images/logo/');	
#path for ads
	define('ADS_IMAGE_PATH',SITE_PATH.'images/ads/');
	define('ADS_IMAGE_UPLOAD_PATH',SITE_ROOT.'images/ads/');
	
#Admin constants
	define('ADMIN_VIEW_PATH',SITE_ROOT.'view/admin_view/');
	define('ADMIN_MODEL_PATH',SITE_ROOT.'model/admin_model/');
	
#PDO constants 	
	define('PDO',SITE_ROOT.'library/pdo/cxpdo_modified.php');
	define('PDO_CONFIG',SITE_ROOT.'library/pdo/pdo_config.php');

#admin language
	define('ADMIN_LANGUAGE_PATH',SITE_ROOT.'config/Admin_Language.php');




#datbase section
    define('DB_HOST', 'localhost');
    define('DB_USER', 'root');
    define('DB_PASSWORD', 'mysql');
    define('DB_DATABASE', 'job_portal');


#views related

    define('FNAME', 'FIRST NAME');
    define('MNAME', 'MIDDLE NAME');
    define('LNAME', 'LAST NAME');
    define('PASSWORD','Password');
    define('CONFIRM_PASSWORD','Confirm Password');
    define('GENDER', 'GENDER');
    define('DOB','DATE OF BIRTH');	
    define('EMAIL', 'EMAIL ID');
    define('PHNO', 'PHONE NUMBER');
    define('ADDRESS', 'ADDRESS');
    define('PADDRESS', 'PERMANENT ADDRESS');
    define('CADDRESS', 'CURRENT ADDRESS');
    define('CITY', 'CITY');
    define('STATE', 'STATE');
    define('PINCODE', 'PINCODE');
    define('COUNTRY', 'COUNTRY');
    define('HIGHEST_DEGREE','HIGHEST DEGREE');
    define('GRADUATION','GRADUATION DEGREE');
    define('PG','POST GRADUATION DEGREE');
    define('PHD','PHD');
    define('OTHER_QUAL','OTHER QUALIFICATIONS');
    define('EXP','EXPERIENCE');
    define('KEY_SKILLS','KEY SKILLS');
    define('INDUSTRY','INDUSTRY');
    define('FUNCTIONAL_AREA','FUNCTIONAL AREA');
    define('JOBSEEKER','Job Seeker');
    define('JOBSEEKERS','Job Seekers');
    define('EMPLOYER','Employer');
    define('EMPLOYERS','Employers');
    define('ABOUT_US','About Us');
    define('CONTACT_US','Contact Us');
    define('CAREER_ADVICE','Career Advice');
?>
