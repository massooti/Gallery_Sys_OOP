<?php
//include ('new_config.php');
defined('DS') ? null : define('DS',DIRECTORY_SEPARATOR);
define('SITE_ROOT' , DS . 'XAMPP' . DS . 'htdocs' . DS . 'Gallery_Syd_OOP' );
defined('INCLUDES_PATH') ? null : define('INCLUDES_PATH',SITE_ROOT . DS . 'admin' . DS .'includes');


require_once ('sessions.php');
require_once ('functions.php');
require_once ('database.php');
require_once ('db_object.php');
require_once ('user.php');
require_once ('photo.php');


?>