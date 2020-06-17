<?php

/*
 * ini_set('display_errors', 1);
 * ini_set('display_startup_errors', 1);
 * error_reporting(E_ALL);
 */
session_start();
require_once '../path_info.php';

if(isset($_SESSION['admin'])){
    $user= $_SESSION['admin'];
}else{
    header("country:index.php");
}
require_once 'include/db.php';
$tname = "industry";
$user = new db();
require_once "pinpage.php";
/////////////////// FUNCTION FOR ADD Industry ///////////////////////////
if (isset($_POST['submit'])) {
    if ($_POST['industrytitle'] == "" ||
	    $_POST['country'] == "" ||
	    $_POST['state'] == "" ||
	    $_POST['city'] == ""||
	    $_POST['order'] == "")
    {
        $msg = "please fill the all fields<br><hr>";
    }
    else 
	{
		$msg="";
		$condtion = " AND industry LIKE '{$_POST['industrytitle']}' ";
    	$search_cat=$user->select($tname, $condtion);
    	
		if(!empty($search_cat)){
			if($search_cat[0]['industry']==$_POST['industrytitle']){
            echo "<script>alert('industry already set!');</script>";
			}
		}
		else{
	    		$array = array('industry' => $_POST['industrytitle'],
						       'country'  => $_POST['country'],
						       'state' 	  => $_POST['state'],
						       'city'     => $_POST['city'],
			    			   'sort_order' =>$_POST['order'], 
			    			   'status'     => 1
			    		);
	        $insert = $user->insertdata($tname, $array);
    	    if (isset($insert)) 
    	    {
    	    	if (isset($_GET['edit_id'])) {
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
				//echo'alert("Update industry succesfully!");';
				//echo 'window.location.href="view_industry.php";';
				echo '</script>';
				}else{
			    echo '<script type="text/javascript">';
				echo "setTimeout(function() {
                    $.bootstrapGrowl('Add Industry Sucessfully.', 
                    { 
                    	type: 'success', 
                     	align: 'center',
                        width: 'auto',
                        allow_dismiss: false 
                    });
                }, 1000);";
				//echo'alert("Add industry succesfully!");';
				//echo 'window.location.href="add_industry.php";';
				echo '</script>';
				}
			}
		}
	}
}


//////////Edit method///////////////////
if (isset($_GET['edit_id'])) {
	$_GET['edit_id'];
	//echo '<script>alert("hello");</script>';
    $condtion =" AND hotel_location_id = {$_GET['edit_id']}";
	$edit = $user->select($tname,$condtion);	
}
?>

<!--Header include-->
	<?php include_once 'include/header.php';?>

<!-------------------body starting---------->
	<body>

<!----------navbar include--------------->
		<?php include 'include/navbar.php';?>
			
<!----------main container starting --------------->
			<div class="container-fluid" id="main">
				<div class="row row-offcanvas row-offcanvas-left">

<!----------sidebar include --------------->
					<?php include 'include/sidebar.php';?>
 
 					<div class="col main pt-5 mt-3">
					<hr>
						<h1 class="display-4 d-none d-sm-block">
							<?php if (!empty($_GET['edit_id'])){echo "Edit Industry";}else{ echo "Add Industry";}?>
						</h1>
					
                <?php include 'breadcrumb.php';?>
				
				<span class="font-weight-bold text-info">
					<?php if(!empty($error)){echo $msg;} ?>
				</span>
				
            <div class="col-lg-2 ml-auto">
    			<a class="nav-link btn btn-outline-light bg-info border"
                        href="view_industry.php">View all Industry</a>
    		</div>
<!----------Form starting --------------->
				<form method="POST" id="add_industry" autocomplete="on">

<!----------Row starting --------------->
					<div class="row">
<!----------Column for input1 starting --------------->
						<div class="col-lg-6">
							<div class="form-group">
								<label for="name">Industry title:</label> 
								<input type="text" class="form-control rounded" id="industrytitle" 
									  placeholder="Enter Industry title" name="industrytitle" 
									  value="<?php if(isset($edit)){ echo $edit[0]['industry'];}?>">
                                <span class="text-danger" id="error1"></span>
							</div>
						</div>

    <!-------------col-country starting----------------->
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="name">Country:</label> 
                            <input type="text"
                                    class="form-control rounded" 
                                    id="country" 
                                    placeholder="Enter Country"
                                    name="country" 
                                    value="<?php if(isset($edit)){ echo $edit[0]['country'];}?>"> 
                            <span class="text-danger" id="error_country"></span>
                        </div>
                    </div>

    <!-------------col-state starting----------------->
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="name">State:</label> 
                            <input type="text"
                                    class="form-control rounded" 
                                    id="state" 
                                    placeholder="Enter state"
                                    name=state 
                                    value="<?php if(isset($edit)){ echo $edit[0]['state'];}?>"> 
                            <span class="text-danger" id="error_state"></span>
                        </div>
                    </div>
                  
    <!-------------col-city starting----------------->
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="name">City:</label> 
                            <input type="text"
                                    class="form-control rounded" 
                                    id="city" 
                                    placeholder="Enter city"
                                    name=city 
                                    value="<?php if(isset($edit)){ echo $edit[0]['city'];}?>"> 
                            <span class="text-danger" id="error_city"></span>
                        </div>
                    </div>  

    <!-------------col-sort order starting----------------->
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="name">Sort order:</label> 
                            <input type="number"
                                    class="form-control rounded" 
                                    id="order" 
                                    placeholder="Enter sort order"
                                    name=order 
                                    value="<?php if(isset($edit)){ echo $edit[0]['sort_order'];}?>"> 
                            <span class="text-danger" id="error_order"></span>
                        </div>
                    </div>  
					<div class="col-lg-12">
						<input type="submit" class="btn btn-success" name="submit" value=<?php if(isset($edit)){?>"update Industry"<?php }else{?>"Add Industry"><?php }?>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
<?php include 'include/footer.php';?>

<script>
$(document).ready(function(){
// 	  alert("helo");
	  var flag=true;
	   $("#add_industry").submit(function(event){
//	  alert("helo");
		  if($("#industrytitle").val()==""){ 
			  $("#error1").text("Enter Industry name");
			  flag=false;  
		  }else{
			  $("#error1").text("");}
		  
		  if($("#order").val()==""){ 
			  $("#error_order").text("Enter order");
			  flag=false;  
		  }else{
			  $("#error_order").text("");}
		  
		  if($("#country").val()==""){ 
			  $("#error_country").text("Enter country");
			  flag=false;  
		  }else{
			  $("#error_country").text("");}
		
		  if($("#state").val()==""){ 
			  $("#error_state").text("Enter state");
			  flag=false;  
		  }else{
			  $("#error_state").text("");}
		
		  if($("#city").val()==""){ 
			  $("#error_city").text("Enter city");
			  flag=false;  
		  }else{
			  $("#error_city").text("");}
		
	 	  if(flag==false){event.preventDefault();}
		  
		  });
});
</script>
</body>
</html>