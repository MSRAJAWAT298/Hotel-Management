<?php

/*ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);*/
session_start();
require_once '../path_info.php';
require_once 'include/db.php';
if(isset($_SESSION['admin'])){
	$user= $_SESSION['admin'];
}else{
	header("location:index.php");
}

$room_type = array( 'Single Room' => 'Single Room', 
    'Deluxe Room'=> 'Deluxe Room', 
    'Guest House'=> 'Guest House',
    'Luxury Room'=>'Luxury Room' );


$tname="industry";
$table_name ="hotel_list";
$user = new db();
$data = $user->select($tname);

require_once "pinpage.php";
/////////////////////// A D D______H O T E L //////////////////
if (isset($_POST['submit'])) {
	if ($_POST['Hotelsname'] == "" 
		|| $_FILES["image1"]["name"] == "" 
		|| $_FILES["image2"]["name"] == "" 
		|| $_POST['pdate']==""
		|| $_POST['summary']=="" 
		|| $_POST['details']=="" 
        || $_POST['industry']=="" 
        || $_POST['room_type']=="" 
        || $_POST['room_number']=="" 
        || $_POST['rating']==""
	) 
	{
		$error = "please fill the all fields<br><hr>";
	}
	if($_FILES["image1"]["name"] == ""){$img_error="please Upload small pic1";}
	if($_FILES["image2"]["name"] == ""){$img_error2="please upload image ";}
	else {$error="";
	$array = array(
		'hotel_title' => $_POST['Hotelsname'],
		'hotel_star' =>  $_POST['rating'],
		'hotel_register_date' => $_POST['pdate'],
		'hotel_small_pic' => $_FILES["image1"]["name"],
        'hotel_large_pic' => $_FILES["image2"]["name"],
		'hotel_sort_desc' => $_POST['summary'],
		'hotel_location_id' => $_POST['industry'],
		'hotel_long_desc' => $_POST['details'],
        'hotel_room'=>$_POST['room_number'],
        'room_type'=>$_POST['room_type'],
		'status' => 1,
	);
/*
    echo $table_name;
    echo "<pre>";
    print_r($array);exit;*/
	$insert = $user->insertdata($table_name, $array);
    
	if (isset($insert)) {
		$uploadOk = 1;
		$target_path = "../images/Hotels/" . $insert . "/";
		$target_path2 = "../images/Hotels/" . $insert . "/";
		if (! file_exists($target_path)) {
			mkdir("../images/Hotels/" . $insert, 0777);
		}
		$target_path = $target_path . basename($_FILES['image1']['name']);
		$target_path2 = $target_path2 . basename($_FILES['image2']['name']);
		$imageFileType = strtolower(pathinfo($target_path, PATHINFO_EXTENSION));
		if (file_exists($target_path)) {
			$r = "Sorry, file already exists";
			$uploadOk = 0;
		}
		if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
			$uploadOk = 0;
		}
		if ($uploadOk == 1) {
			if (move_uploaded_file($_FILES['image1']['tmp_name'], $target_path) && 	      move_uploaded_file($_FILES['image2']['tmp_name'], $target_path2))
				$uploadOk = 1;
		} else {
			$r .= "sorry file not uploaded";
		}
	} else {
		$r .= "something went wrong!";
	}
	echo '<script type="text/javascript">';
    echo "setTimeout(function() {
                    $.bootstrapGrowl('Update data Sucessfully.', 
                        { 
                            type: 'success', 
                            align: 'center',
                            width: 'auto',
                            allow_dismiss: false
                    });
                }, 1000);";
	//echo'alert("Add Hotels succesfully!");';
	//echo 'window.location.href="view_hotels.php";';
	echo '</script>';
	
}
}

//////////////////////////////// O N U P D A T E //////////////////////////////////////////


if(isset($_GET['edit_id'])){//check edit button is click or not
	$con=" AND hotel_id = {$_GET['edit_id']}";
	$edit = $user->select($table_name,$con);

	$Hotels_id=$edit[0]['hotel_id'];
	$pdate=$edit[0]['hotel_register_date'];
	$bname=$edit[0]['hotel_title'];
    $rating=$edit[0]['hotel_star'];
    $type=$edit[0]['room_type'];
    $room=$edit[0]['hotel_room'];
	$hotel_location_id=$edit[0]['hotel_location_id'];
	$short_desc=$edit[0]['hotel_sort_desc'];
	$long_desc=$edit[0]['hotel_long_desc'];
	$small_pic=$edit[0]['hotel_small_pic'];
	$large_pic=$edit[0]['hotel_large_pic'];
	$con=" AND hotel_location_id = {$hotel_location_id}";
	$edit_cat = $user->select($tname,$con);
}
////////////////////////////////////////////////////////////////////////////
if (isset($_POST['update'])) {
	//echo '<script>alert("update getting start");</script>';
	if ($_FILES["image1"]["name"] == "") {
		$pic1 = $small_pic;
	}else {     
		unlink("../images/Hotels/".$Hotels_id."/".$small_pic);
		$pic1 = $_FILES["image1"]["name"];
	}
	
	if ($_FILES["image2"]["name"] == "") {
		$pic2 = $large_pic;
	} else {     
		unlink("../images/Hotels/".$Hotels_id."/".$large_pic);
		$pic2 = $_FILES["image2"]["name"];
	}
	
	$array = array(
        'hotel_title' => $_POST['Hotelsname'],
        'hotel_star' =>  $_POST['rating'],
        'hotel_register_date' => $_POST['pdate'],
        'hotel_small_pic' => $pic1,
        'hotel_large_pic' => $pic2,
        'hotel_sort_desc' => $_POST['summary'],
        'hotel_location_id' => $_POST['industry'],
        'hotel_long_desc' => $_POST['details'],
        'hotel_room'=>$_POST['room_number'],
        'room_type'=>$_POST['room_type'],
        'status' => 1,
	); 
	
	    $con=" AND hotel_id = {$Hotels_id}";
        $update = $user->update($table_name, $array, $con);
        
        
        if (isset($update)) {
        	$uploadOk = 1;
        	$target_path = "../images/Hotels/".$Hotels_id."/";
        	$target_path2 = "../images/Hotels/".$Hotels_id."/";
        	$target_path = $target_path . basename($_FILES['image1']['name']);
        	$target_path2 = $target_path2 . basename($_FILES['image2']['name']);
        	$imageFileType = strtolower(pathinfo($target_path, PATHINFO_EXTENSION));

            if ($uploadOk == 1) {
            	
            	//echo '<script>alert("Hello update");</script>';
            	if (move_uploaded_file($_FILES['image1']['tmp_name'], $target_path)){
            		$uploadOk = 1;
            		
            		//echo '<script>alert("move1 succesfully");</script>';
            	}
            	
            	//echo '<script>alert("move2 failed");</script>';
            	if(move_uploaded_file($_FILES['image2']['tmp_name'], $target_path2))
            	{
            		echo '<script>alert("move succesfully");</script>';
            		$uploadOk = 1;
            	}
            	
            	//echo '<script>alert("after failed");</script>';
            } else {
            	$r .= "sorry file not uploaded";
            }
        } else {
        	$r .= "something went wrong!";
        }
        
        echo '<script type="text/javascript">';
    echo "setTimeout(function() {
                    $.bootstrapGrowl('Update data Sucessfully.', 
                        { 
                            type: 'success', 
                            align: 'center',
                            width: 'auto',
                            allow_dismiss: false
                    });
                }, 1000);";
//        echo'alert("Update succesfully!");';
//        echo 'window.location.href="view_hotels.php";';
        echo '</script>';
        
    }

    ?>
<!--Header include-->
    <?php include_once 'include/header.php';?>

<!-------------body starting----------------->
<body>  

<!-------------navbar starting----------------->
<?php include 'include/navbar.php';?>
<!-------------end navbar starting----------------->

<!-------------Main continer----------------->
    <div class="container-fluid" id="main">
    	<div class="row row-offcanvas row-offcanvas-left">

<!-------------sidebar starting----------------->
    	<?php include 'include/sidebar.php';?>
<!-------------end sideba----------------->

    	   <div class="col main pt-5 mt-3"><hr>
        		<h1 class="display-4 d-none d-sm-block">
    		          <?php if (!empty($_GET['edit_id']))
                                {echo "Edit Hotels"; }
                            else{ echo "Add Hotels";}
                        ?> 
                </h1>
                
                <?php include 'breadcrumb.php';?>

            <span class="font-weight-bold text-info">
                <?php if(!empty($error))echo $error;?>                
            </span>
    			
            <div class="col-lg-2 ml-auto">
    			<a class="nav-link btn btn-outline-light bg-info border"
                        href="view_Hotels.php">View all Hotels</a>
    		</div>
    			
            <!-------------form starting----------------->
            <form class="font-weight-bold" method="POST" id="myForm" action="" autocomplete="on"  enctype="multipart/form-data">

                <!-------------row starting----------------->
    		    <div class="row">
                    <!-------------col-1 starting----------------->
    				<div class="col-lg-6">
    					<div class="form-group">
                            <?php if(!empty($small_pic)){?>
                            <img class="img-fluid w-25" alt="" src="../images/Hotels/<?php echo $Hotels_id."/".$small_pic; ?>">
                            <?php }?>
    						<label for="file-input">
                                Upload small pic 
    						</label>
    						<input id="file-input"  type="file" name="image1" accept="image/gif, image/jpeg, image/png" value="<?php if(!empty($small_pic)){echo $small_pic;}?>" />
    					</div>
    					<span class="text-danger" id="error_img1">
    					   <?php if(!empty($img_error)){ echo $img_error;}?>
    					</span>
    				</div>
            <!-------------end col-1------------------->

                    <!-------------col-2 starting----------------->
                    <div class="col-lg-6">
    					<div class="form-group">
    						
                            <?php if(!empty($large_pic)){ ?>
                            <img class="img-fluid w-25" alt="myimages" src="../images/Hotels/<?php echo $Hotels_id.'/'.$large_pic; ?>" 
                            <?php }?>

                            <label for="file-input"> 
                                Upload Large Image 
                            </label>
    						<input id="file-input2" type="file" 
    								accept="image/gif, image/jpeg, image/png" 
    								name="image2"
    						<?php if(!empty($large_pic)){echo "value=$large_pic";}?>  />
    					</div>
    					<span class="text-danger" id="error_img2">
    					<?php //if(!empty($img_error2=="")) {echo $img_error2;}?></span>
    				</div>

                    <!-------------col-3 starting----------------->
    				<div class="col-lg-6">
    					<div class="form-group">
    						<label for="name">Hotels Name:</label> 
    						<input type="text"
    								class="form-control rounded" 
    								id="bname" 
    								placeholder="Enter Hotels Name"
    								name="Hotelsname" 
    								value="<?php if(!empty($bname))echo $bname;?>"> 
    						<span class="text-danger" id="error1"></span>
    					</div>
    				</div>

                    <!-------------col-5 starting----------------->
                    <div class="col-lg-6">
                        <div class="form-group ">
                            <label for="sel1">Select Hotel Industry</label> 
                                <select class="form-control" name="industry" id="location">
                                    <option value="<?php if(!empty($hotel_location_id)){echo $hotel_location_id?>">
                                    <?php echo $edit_cat[0]['industry'];} else{?>">Select Hotel Industry<?php }?></option>
                                    <?php foreach ($data as $value){?>
                                    <option value="<?php echo $value['hotel_location_id'];?>"><?php echo $value['industry'];?></option>
                                    <?php }?>
                                </select>
                            <span class="text-danger" id="error_location"></span>
                        </div>
                    </div>
                    <!-------------col-5 starting----------------->
    				<div class="col-lg-6">
    					<div class="form-group ">
    						<label for="sel1">Select room type</label> 
    							<select class="form-control" name="room_type" id="room_type">
    								<option value="<?php if(!empty($type)){echo $type?>">
    								<?php echo $type;} else{?>">Select Room type<?php }?></option>
    								<?php foreach ($room_type as $value){?>
    								<option value="<?php echo $value;?>"><?php echo $value;?></option>
    								<?php }?>
    							</select>
    						<span class="text-danger" id="error_cat"></span>
    				    </div>
    				</div>

                    <!-------------col-6 starting----------------->
    				<div class="col-lg-6">
    					<div class="form-group">
    						<label for="name">Number of room</label> 
    							<input  type="number"
    								    class="form-control rounded" 
    								    id="room_number" 
    									placeholder="Enter Number of room"
    								    name="room_number" 
    									value="<?php if(!empty($room))echo $room;?>"> 
    						<span class="text-danger" id="error_room_number"></span>
    					</div>
    				</div>

                    <!-------------rating col starting----------------->
                    <div class="col-lg-6">
                        <div class="form-group ">
                            <label for="sel1">Select hotel rating</label> 
                            <select class="form-control" name="rating" id="rating">
                                <option value="<?php if(!empty($rating)){echo 
                                        $rating ?>">
                                    <?php echo $rating;} else{?>">Select Rating<?php }?></option>
                                    <?php for ($x = 1; $x <= 5; $x++){?>
                                    <option value="<?php echo $x;?>"><?php echo $x;?></option>
                                    <?php }?>
                                </select>
                            <span class="text-danger" id="error_rating"></span>
                        </div>
                    </div>

                    <!-------------col-6 starting----------------->
    				<div class="col-lg-6">
    					<div class="form-group">
    						<label for="date">Hotel Register date:</label> 
    							<input  type="date"
    									class="form-control rounded" 
    									id="date" 
    									placeholder="Enter Hotels Name"
    									name="pdate" 
    									value="<?php if(!empty($pdate))echo $pdate;?>"> 
    						<span class="text-danger" id="error_date"></span>
    					</div>
    				</div>

                    <!-------------col-7 starting----------------->
    				<div class="col-lg-6">
    					<div class="form-group">
    						<label for="summary">Hotels Summary:</label>
    						<textarea class="form-control" rows="5" id="summary" name="summary"><?php if(!empty($short_desc))echo $short_desc;?></textarea>
    						<span class="text-danger" id="error_summary"></span>
    					</div>
    				</div>
    									
                    <!-------------col-8 starting----------------->
    				<div class="col-lg-6">
    					<div class="form-group">
    						<label for="name">Hotels details:</label>
    						<textarea class="form-control" rows="5" id="details"  name="details" ><?php if(!empty($long_desc))echo $long_desc;?></textarea>
    						<span class="text-danger" id="error_details"></span>
    					</div>
    				</div>

                    <!-------------col-9 starting----------------->
    				<div class="col-lg-6">
    				<?php if (!empty($_GET['edit_id'])) {?>
    			     <input type="submit" class="btn btn-success" name="update" value="update Hotels details">
    				<?php }else{?> 
    		          <input type="submit" id="submit" class="btn btn-success" name="submit" value="Add Hotels"><?php } ?>
    		          </div>
    			</div>
    		</form>
    	</div>
    </div>
</div>
<?php include 'include/footer.php';?>
</body>
</html>