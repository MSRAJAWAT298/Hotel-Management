<?php

/*
 * ini_set('display_errors', 1);
 * ini_set('display_startup_errors', 1);
 * error_reporting(E_ALL);
 */
session_start();
require_once '../path_info.php';
require_once "pinpage.php";
if(isset($_SESSION['admin'])){
    $user= $_SESSION['admin'];
}else{
    header("location:index.php");
}
require_once 'include/db.php';
$user=new db();// OBJECT 
$tname="themes";
$data=$user->select($tname);

/////////// update theme ///////////////
if (isset($_POST['theme'])) {
     $insert = array('theme_type' => $_POST['theme']);
     echo $user->update($tname, $insert);
     exit;
}

/////////// update menulink ///////////////
if (isset($_POST['menulink'])) {
     $insert = array('navbar_link' => $_POST['menulink']);
     echo $user->update($tname, $insert);
     exit;
}

/////////// update sidebar ///////////////
if (isset($_POST['sidebar'])) {
     $insert = array('sidebar' => $_POST['sidebar']);
     echo $user->update($tname, $insert);
     exit;
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
							User Setting
						</h1>
					
                <?php include 'breadcrumb.php';?>
				
				<span class="font-weight-bold text-info">
					<?php if(!empty($error)){echo $msg;} ?>
				</span>

				<div class="alert alert-success collapse" role="alert">
          <strong>Update successfully</strong>
        </div>
<!----------Form starting --------------->
				<form method="POST" id="add_industry" autocomplete="on">

<!----------Row starting --------------->
					<div class="row">
<!----------Column for input1 starting --------------->
						<div class="col-lg-12">
							<div class="form-group">
								<label class="p-2 font-weight-bold" for="name">
									Do you want to Show navbar Link</label> 
								<select class="pl-3 pr-3 font-weight-bold menulink">
 								<option value="<?php if(!empty($data)){echo $data[0]['navbar_link'] ?>">
                                    <?php echo $data[0]['navbar_link'];} else{?>">Select navbar <?php }?></option>
                                    <option value="Yes">Yes</option>
									<option value="NO">No</option>
								</select>
                                <span class="text-danger" id="error1"></span>
							</div>
						</div>

<!----------Column for input2 starting --------------->
						<div class="col-lg-12">
							<div class="form-group">
								<label class="p-2 font-weight-bold">
									Change User Theme </label> 
								<select class="pl-3 pr-3 font-weight-bold theme">
 								<option value="<?php if(!empty($data)){echo $data[0]['theme_type'] ?>">
                                    <?php echo $data[0]['theme_type']." Theme";} else{?>">Select Theme <?php }?></option>
									<option value="Standard">Standard Theme</option>
									<option value="Classic">Classic Theme</option>
								</select>
							</div>
						</div>

<!----------Column for input3 starting --------------->
						<div class="col-lg-12">
							<div class="form-group">
								<label class="p-2 font-weight-bold">
									Do you want to Show Sidebar filter </label> 
								<select class="pl-3 pr-3 font-weight-bold filter">
 								<option value="<?php if(!empty($data)){echo $data[0]['sidebar'] ?>">
                                    <?php echo $data[0]['sidebar'];} else{?>">Select Theme <?php }?></option>
                                    <option value="Yes">Yes</option>
									<option value="NO">No</option>
								</select>
							</div>
						</div>
				</div>
			</form>
		</div>
	</div>
</div>
<?php include 'include/footer.php';?>

<script>
//////////// J Q U E R Y F U N C T I O N S////////////////////

$(document).ready(function(){
	//start theme funtion//
	$(document).on('change','.theme',function(){
      
      var theme = ($(this).val());

      if(confirm("Are you sure to Change Theme" + theme)){
        var current_element = $(this);
        $.ajax({
          type:"POST",
          url: "",
          data: {theme:theme},
          success: function(data)
          {     
				swal({
  					 text: data,
  					 icon: "success",
				});// alert(" Theme " + data);
          }
        });
      }      
    });
//end theme function
//start Navbar link funtion//
	$(document).on('change','.menulink',function(){
      var menulink = ($(this).val());
      swal({
          title: "Are you sure?",
          icon: "warning",
          buttons: [
            'No, cancel it!',
            'Yes, I am sure!'
          ],
          dangerMode: true,
        }).then(function(isConfirm) {
          if (isConfirm) {
              var current_element = $(this);
                $.ajax({
                        type:"POST",
                        url: "",
                        data: {menulink:menulink},
                        success: function(data)
                        {    
                          swal({
                            text: data,
                            icon: "success",
                          }); //end swal
                        }//end success
                });//end ajax
          }//end of if tag 
          else {
            swal("Cancelled", "", "error");
          }
        }); //end of isconfirm function 
    });
//end navbar function




//start Sidebar funtion//
	$(document).on('change','.filter',function(){
      var menulink = ($(this).val());
      if(confirm("Are you sure to Hide Sidbar")){
        var current_element = $(this);
        $.ajax({
          type:"POST",
          url: "",
          data: {sidebar:menulink},
          success: function(data)
          {     setTimeout(function() {
                    $.bootstrapGrowl(data , 
                      { 
                        type: 'success',
                        align: 'center',
                        width: 'auto',
                        allow_dismiss: false 
                      });
                }, 1000);
          
          }
        });
      }      
    });
//end navbar function
});
</script>
</body>
</html>