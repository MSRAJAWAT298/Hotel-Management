<?php
require_once 'vendor/autoload.php';
define("HOME",$_SERVER['REQUEST_SCHEME']."://".$_SERVER['SERVER_NAME']."/hotel_managment/");
define("ADMIN_HOME",$_SERVER['REQUEST_SCHEME']."://".$_SERVER['SERVER_NAME']."/hotel_managment/admin/dasboard.php");
define("CSS", $_SERVER['REQUEST_SCHEME']."://".$_SERVER['SERVER_NAME']."/hotel_managment/css/");
define("admin_css", $_SERVER['REQUEST_SCHEME']."://".$_SERVER['SERVER_NAME']."/hotel_managment/admin/admin_templates/css");
define("JS",$_SERVER['REQUEST_SCHEME']."://".$_SERVER['SERVER_NAME']."/hotel_managment/js/");
define("IMAGES",$_SERVER['REQUEST_SCHEME']."://".$_SERVER['SERVER_NAME']."/hotel_managment/images/");

define("HOTEL_IMAGES",$_SERVER['REQUEST_SCHEME']."://".$_SERVER['SERVER_NAME']."/hotel_managment/images/Hotels");
$paths = array('home_path'=>HOME,'css_path'=>CSS,'admin_css'=>admin_css,'js_paths'=>JS,'images_path'=>IMAGES,'Hotel_images'=>HOTEL_IMAGES);
/*echo "<pre>";
print_r($paths);
exit;*/
//echo $twig->render('navbar.tpl', array('paths'=>$paths));
?>