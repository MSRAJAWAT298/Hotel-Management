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
    header("location:index.php");
}

require_once 'include/db.php';  
$tname = "industry";
$user = new db();
$data = $user->select($tname);
require_once "pinpage.php";

/////////// update status ///////////////
if (isset($_POST['status'])) {
     $d = array('status' => $_POST['status']);
	 $condtion = " AND hotel_location_id  =  {$_POST['hotel_location_id']}";
     echo $user->update($tname, $d, $condtion);
     exit;
}
/////////// update catgories ///////////////
if (isset($_POST['update'])) {
	//echo '<script>alert("hello update");</script>';
	 $array = array('industry' => $_POST['catname']);	 
	 $con = " AND hotel_location_id = {$_GET['edit_id']}";
	 $user->update($tname, $array, $con);
	    header("location:add_industry.php");
}
//////////////////////Delete Function/////////////////////
if (isset($_POST['id'])) {
	//echo '<script>alert("hello");</script>';
     $id = $_POST['id'];
     $con=" AND hotel_location_id = {$id}";
	 $del = $user->select("hotel_list",$con);
	 if(count($del)==0){
	 $condtion = array('hotel_location_id' => $id);
     $data=$user->delete($tname, $condtion);
	 echo $data;
	 }else{//print_r($data);
		 echo "Something went wrong !...";
	 }
	 exit;
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
			<?php include 'include/sidebar.php';?>
 				<div class="col main pt-5 mt-3">
			 	<hr>
					<h1 class="display-4 d-none d-sm-block">View All Industry</h1>
				
                <?php include 'breadcrumb.php';?>

<!----------Table container --------------->
		<div class="card mb-4">
<!----------container header---------------->
        	<div class="card-header">Industry
				<a href="add_industry.php">
					<button class="btn btn-success float-right">Add Industry</button>
				</a>
			</div>
<!----------container body---------------->
            <div class="card-body">
                <div class="datatable table-responsive">
<!----------Table--------------->
			<table id="example" class="table table-striped table-bordered" style="width:100%">
				<thead>
				      <tr>
				        <th>Industry_id #</th>
				        <th>Industry Name</th>
				        <th>Country</th>
				        <th>State</th>
				        <th>City</th>
						<th>Sort_order</th>
				        <th>Status</th>
				        <th>Action</th>
				      </tr>
				    </thead>
				<tbody>
	<?php 
	foreach($data as $value){ ?>
      <tr>
		<td><?php echo $value['hotel_location_id'];?></td>
        <td><?php echo $value['industry'];?></td>	
	    <td><?php echo $value['country'];?></td>
	    <td><?php echo $value['state'];?></td>
	    <td><?php echo $value['city'];?></td>
        <td><?php echo $value['sort_order'];?></td>	
		<td><i data="<?php echo $value['hotel_location_id'];?>" class="status_checks btn
				 <?php echo ($value['status'])? 'btn-success': 'btn-danger'?>">
				 <?php echo ($value['status'])? 'Active' : 'Inactive'?>
			</i>
		</td>
		<td><a href="add_industry.php?edit_id=<?php echo $value['hotel_location_id'];?>" 
		       title="add_industry.php?edit_id=<?php echo $value['hotel_location_id'];?>"> 
			   <button class='edit btn btn-info' id='edit_<?php echo $value['hotel_location_id']; ?>'>Edit
			<i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></a>
			| <button class='delete btn btn-danger' id='del_<?php echo $value['hotel_location_id']; ?>'>Delete
			<i class="fa fa-trash" aria-hidden="true"></i></button></td>
		</tr> 
	<?php }?>
      </tr>
    </tbody>
  </table>
		</div>
     </div>
    </div>
</div>
</div>
</div>
</div>
<?php include 'include/footer.php';?>

<script>
///////////////////////////////////////////////////////////////////////////////
//////////// J Q U E R Y F U N C T I O N S////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////

$(document).ready(function(){

	//start status funtion//
	$(document).on('click','.status_checks',function(){
      var status = ($(this).hasClass("btn-success")) ? '0' : '1';
      var msg = (status=='0')? 'Deactivate' : 'Activate';
      if(confirm("Are you sure to "+ msg)){

        var current_element = $(this);
        $.ajax({
          type:"POST",
          url: "",
          data: {hotel_location_id:$(current_element).attr('data'),status:status},
          success: function(data)
          {     
          	
				//alert(data);
              location.reload();
          }
        });
      }      
    });
//end status function

 // Delete  function
 $('.delete').click(function(){
   var el = this;
   var id = this.id;
   var splitid = id.split("_");

   // Delete id
   var deleteid = splitid[1];
   
   var del =confirm("Are you sure! you want to delete");
   if(del){
   // AJAX Request
   $.ajax({
     url: "view_industry.php",
     type: "POST",
     data: {id:deleteid},
     success: function(response){
		 alert(response);
				window.location.href = "view_Industry.php";
    }
   });
   }
 });

		
});

</script>
</body>
</html>