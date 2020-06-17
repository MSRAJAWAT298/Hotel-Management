<?php
require_once "vendor_require.php";

$user = new db();
$tname="hotel_list";
$tablename="industry";
$data=$user->select($tname);
$industrydata=$user->select($tablename);
$array=array();
foreach($industrydata as $value){
array_push($array,$value['industry']);
}




/////////////search function////////////////
function search($searchdata,$paths){
      foreach($searchdata as $value){

     echo "<div class='col-lg-4 col-md-6 mb-3'>
          <div class='card h-100'>
            <a href='hotel_details/{$value['hotel_id']}'>
              <img class='img-fluid w-100' src='{$paths['Hotel_images']}/{$value['hotel_id']}/{$value['hotel_small_pic']}'> 
            </a>
          <div class='card-body'>
            <h4 class='card-title'>Hotel Name: 
              <a href='hotel_details/{$value['hotel_id']}'>
                {$value['hotel_title']}
              </a>
            </h4>
            <h6>{$value['room_type']}</h6>
            <h5 class='text-warning'> Details: </h5>
              <p class='card-text'>  {$value['hotel_sort_desc']}</p>
          </div>
          <div class='card-footer'>Rating:"; 
      for ($x = 1; $x <= $value['hotel_star']; $x++) {
              echo "<span class='fa fa-star checked'></span>";
            }
    echo  "</div>
        </div>
      </div>";
  }
}



if (isset($_POST['search_name'])) {
    $search = $_POST['search_name'];

	$condtion = " AND hotel_title LIKE '%$search'";
    $searchdata=$user->select($tname, $condtion);
	if(count($searchdata))
	{   
		 search($searchdata,$paths);
	}
	else
		{echo "Sorry! No result found"; exit;}
	    exit;
}


/////////////search function////////////////
if (isset($_POST['search_element'])) {
    $search = $_POST['search_element'];
	$condtion = " AND room_type LIKE '%$search'";
    $searchdata=$user->select($tname, $condtion);
	if(count($searchdata))
	{   
		/*echo "<pre>";
		print_r($searchdata);
		echo "</pre>";*/
   search($searchdata,$paths);
		//echo $twig->render('search_hotel.tpl',array('data'=>$searchdata));
		exit;
	}
	else
		{
			echo "Sorry! No result found"; 
			exit;
		}
	    exit;
}

/////////////search function////////////////
if (isset($_POST['search_rating'])) {
    $search = $_POST['search_rating'];
	$condtion = " AND hotel_star LIKE '%$search'";
    $searchdata=$user->select($tname, $condtion);
	if(count($searchdata))
	{   
      search($searchdata,$paths);

		exit;
	}
	else
		{
			echo "Sorry! No result found"; 
			exit;
		}
	    exit;
}



$theme=$user->select("themes");
$navlink=$theme[0]['navbar_link'];
$sidebar=$theme[0]['sidebar'];
if($theme[0]['theme_type']=="Standard"){
	echo $twig->render('search_hotel.tpl',array('paths'=>$paths,'data'=>$data,'industrydata'=>$array,"navlink"=>$navlink,"sidebar"=>$sidebar));
}
else{
	echo $twig->render('theme-2/search_hotel.tpl',array('paths'=>$paths,'data'=>$data,'industrydata'=>$array,"navlink"=>$navlink,"sidebar"=>$sidebar));
}


?>
