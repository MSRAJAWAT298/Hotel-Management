<?php
require_once "vendor_require.php";
$user = new db();
$data = array();
if(isset($_POST['submit'])){
	$data = array('name' =>	$_POST['name'],'email' =>  $_POST['email'],
				  'comment'=> $_POST['details']);

   if ($_POST['name'] == "" || $_POST['email']=="" || $_POST['details'] =="") 
    {
    	$result= "all the fileds required!";
	}
   	else
   	{
		$insert = $user->insertdata('contact_us',$data);
		if($insert){echo $insert;
				echo '<script type="text/javascript">';
				echo 'alert("subscribe succefully.......");';
				echo '</script>';
		}
    }
}


$theme=$user->select("themes");
$navlink=$theme[0]['navbar_link'];

if($theme[0]['theme_type']=="Standard"){
echo $twig->render('index.tpl',array('paths'=>$paths,'data'=>$data,"navlink"=>$navlink));
}
else{
	echo $twig->render('theme-2/index.tpl',array('paths'=>$paths,'data'=>$data,"navlink"=>$navlink));
}
?>
