<?php 
/*
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
*/

session_start();
require_once '../path_info.php';
if(isset($_SESSION['admin'])){
    $user= $_SESSION['admin'];
}else{
    header("location:index.php");
}

require_once 'include/db.php';
$user=new db();// OBJECT 
$tname="hotel_list";
$data=$user->select($tname);
require_once "pinpage.php";
/////////// update status ///////////////
if (isset($_POST['status'])) {
     $d = array('status' => $_POST['status']);
	 $condtion = " AND hotel_id  =  {$_POST['hotel_location_id']}";
     echo $user->update($tname, $d, $condtion);
     exit;
}
//////////////////////Delete Function/////////////////////
if (isset($_POST['id'])) {
	 $id = $_POST['id'];
	 $condtion = array('hotel_id' => $id);
	 $con = " AND hotel_id  = {$id}";
     $select=$user->select($tname,$con);
    unlink(IMAGES."hotel_list/".$id."/".$select[0]['hotel_small_pic']); 
	unlink(IMAGES."hotel_list/".$id."/".$select[0]['hotel_large_pic']); 
    rmdir(IMAGES."hotel_list/".$id);
	
     $data=$user->delete($tname, $condtion);
	 echo $data;
	 exit;
}
?>
<?php require_once '../path_info.php';?>

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

			 <div class="col-lg-10 main pt-5 mt-3">
			 	<hr>
					<h1 class="display-4 d-none d-sm-block">VIEW All HOTELS</h1>
					
                <?php include 'breadcrumb.php';?>
			    <div class="card mb-4">
			        <div class="card-header">View All hotel_list
						<a href="add_hotels.php"><button class="btn btn-success float-right">Add Hotel Details</button></a>
					</div>
    <div class="card-body">
        <div class="datatable table-responsive">
          	<table id="example" class="table table-striped table-bordered" style="width:100%">
				<thead class="text-info font-weight-bold">
					<tr>
						<th>S.no#</th>
						<th>Hotel Images</th>
						<th>Hotel Title</th>
						<th>Hotel Industry</th>
						<th>Number of Rooms</th>
						<th>Room Type</th>
						<th>Room Rating</th>
						<th>Room Short Description</th>
						<th>Room Description</th>							
						<th>Status</th>
						<th>Action</th>
					</tr>
				</thead>
			<tbody class="font-weight-bold">
	<?php $count=0;
	foreach($data as $value){ ?>
      <tr>
		<td><?php echo ++$count;?></td>
		<td><img id="myImg<?php echo $value['hotel_id']; ?>" class="img-fluid"  alt="<?php echo $value['hotel_small_pic'];?>" 
		src="<?php echo "../images/Hotels/".$value['hotel_id']."/".$value['hotel_small_pic'];?>" style="height: 50px;"></td>
		<td><?php echo $value['hotel_title'];?></td>
		<td><?php 
			$con=" AND hotel_location_id = {$value['hotel_location_id']}";
			$edit_cat = $user->select("industry",$con);
			echo $edit_cat[0]['industry'];		 
			?>
		</td>
		<td><?php echo $value['hotel_room'];?></td>
		<td><?php echo $value['room_type'];?></td>
		<td><?php echo $value['hotel_star'];?></td>
		<td><?php echo $value['hotel_sort_desc'];?></td>
        <td><?php echo substr($value['hotel_long_desc'],0,100);?>
			<span id="demo_<?php echo $value['hotel_id'] ?>" class="collapse">
				<?php echo substr($value['hotel_long_desc'],100);?>
			</span>
			<br><?php if(strlen($value['hotel_long_desc'])>100){?>
			<button class="btn btn-secondary mt-3 readmore">Read More</button>
			<?php } ?>
		</td>
		<td><i data="<?php echo $value['hotel_id'];?>" class="status_checks btn
					<?php echo ($value['status'])?
					'btn-success': 'btn-danger'?>"><?php echo ($value['status'])? 'Active' : 'Inactive'?>
			</i>
		</td>
			
		<td><a href="add_hotels.php?edit_id=<?php echo $value['hotel_id'];?>" title="add_hotel_list.php?edit_id=<?php echo $value['hotel_id'];?>"> 
			   <button class='edit btn btn-info m-2' id='edit_<?php echo $value['hotel_id']; ?>'>
			   		Edit<i class="fa fa-pencil-square-o" aria-hidden="true"></i>
			   	</button>
			</a>
			 <button class='delete btn btn-danger m-2' id='del_<?php echo $value['hotel_id']; ?>'>Delete
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
<!-- The Modal -->
<div id="myModal" class="modal">
  <span class="close">&times;</span>
  <img class="modal-content" id="img01">
  <div id="caption"></div>
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
          {   //alert(data);
              location.reload();
          }
        });
      }      
    });
//end status function

	// Delete 
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
     url: "view_hotels.php",
     type: "POST",
     data: {id:deleteid},
     success: function(response){
		 alert(response);
				window.location.href = "view_hotel_list.php";
    }
   });
   }
 });
 
 
$("body").on("click",".readmore",function() {
            var val = $(this).text();
			console.log("val:"+val);
            var id = $(this).prev().prev().attr("id");
            console.log(id);
            if(val == "Read More") {
                $(this).text("Read Less");
                $(this).addClass("text-white");
                $(this).addClass("bg-danger");
                $("#"+id).removeClass("collapse");
            }
            else {
                $(this).text("Read More");
                $(this).removeClass("bg-danger");
                $(this).addClass("text-white");
				$(this).addClass("bg-primary");
                $("#"+id).addClass("collapse");
            }
        });
});

</script>
<script>
// Get the modal
var modal = document.getElementById("myModal");

<?php foreach ($data as $v){?>
// Get the image and insert it inside the modal - use its "alt" text as a caption
var img = document.getElementById("myImg<?php echo $v['hotel_id']?>");
var modalImg = document.getElementById("img01");
var captionText = document.getElementById("caption");
img.onclick = function(){
  modal.style.display = "block";
  modalImg.src = this.src;
  captionText.innerHTML = this.alt;
}

<?php }?>
// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the modal
span.onclick = function() { 
  modal.style.display = "none";
}
</script>
</body>
</html>