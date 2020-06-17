<?php
require_once "vendor_require.php";
$user = new db();
$tname="hotel_list";
$tablename="industry";
$data=$user->select($tname);

if(isset($_GET['id']))
{
    $id = $_GET['id'];
}
else
{
    header("location:search_hotel.php");
}

$con = " AND hotel_id ={$id}";
$hotels = $user->select($tname,$con);
if(!$hotels){
    header("location:search_hotel.php");
}

$theme=$user->select("themes");
$navlink=$theme[0]['navbar_link'];
$sidebar=$theme[0]['sidebar'];
if($theme[0]['theme_type']=="Standard"){
	echo $twig->render('theme-2/hotel_details.tpl',array('paths'=>$paths,'data'=>$hotels,"navlink"=>$navlink,"sidebar"=>$sidebar));
}
else{

echo $twig->render('theme-2/hotel_details.tpl',array('paths'=>$paths,'data'=>$hotels,"navlink"=>$navlink,"sidebar"=>$sidebar));
}


?>
