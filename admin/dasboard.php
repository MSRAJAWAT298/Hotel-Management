<?php
/*
 * ini_set('display_errors', 1);
 * ini_set('display_startup_errors', 1);
 * error_reporting(E_ALL);
 */
// Start the session
session_start();
require_once '../path_info.php';
if(isset($_SESSION['admin'])){
    $username= $_SESSION['admin'];
}else{
    header("location:index.php");
}

require_once 'include/db.php';
$user=new db();// OBJECT 
$data=new db();// OBJECT 
require_once "pinpage.php";
$total_industry=$data->select("industry");
$total_hotel=$data->select("hotel_list");
$pin_pages=$data->select("pin_pages");


//////////////////////Delete Function/////////////////////
if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $condtion = array('id' => $id);
    echo $data->delete('pin_pages',$condtion);
    exit;
}
?>
<?php include_once 'include/header.php';?>

<body>  
        <?php include 'include/navbar.php';?>
    <div class="container-fluid" id="main">
        <div class="row row-offcanvas row-offcanvas-left">
            <?php include 'include/sidebar.php';?>
        <div class="col main pt-5 mt-3">
            <h1 class="display-4 d-none d-sm-block">
                Dashboard <?php echo $username;?>
            </h1>
            <?php include 'breadcrumb.php';?>
            <div class="row mb-3">
               <div class="col-xl-3 col-sm-6 py-2">
                    <div class="card bg-success text-white h-100">
                        <a class="text-white" href="view_hotels.php" style="text-decoration: none;">
                        <div class="card-body bg-success">
                           <div class="rotate">
                            <i class="fa fa-hotel fa-4x"></i>
                        </div>
                        <h6 class="text-uppercase">Total Hotels</h6>
                        <h1 class="display-4">
                            <?php echo count($total_hotel);?>
                        </h1>
                    </div>
                </div>
                        </a>
            </div>
            <div class="col-xl-3 col-sm-6 py-2">
                <div class="card text-white bg-danger h-100">
                   <a class="text-white" href="view_industry.php" style="text-decoration: none;">
                    <div class="card-body bg-danger">
                        <div class="rotate">
                            <i class="fa fa-industry fa-4x"></i>
                        </div>
                        <h6 class="text-uppercase">Total Indurstries</h6>
                        <h1 class="display-4">
                            <?php echo count($total_industry);?>
                        </h1>
                    </div>
                    </a>
                </div>
            </div>
        </div>    <hr>
    <!--/row-->
    <div class="container-fluid">
        <h2>Pin Pages List</h2><hr>
        <div class="pined-data m-2">
        <?php foreach ($pin_pages as $value) { ?>
            <span class="span">
                <a href="<?php echo $value['page_link']; ?>">
                    <?php echo $value['page_name']; ?>
                </a>
     <button class='delete btn btn-danger m-2' id='del_<?php echo $value['id']; ?>'>        
        <i class="fa fa-times" aria-hidden="true"></i>
     </button>
               
           <?php }?>   
        </div>
    </div>
</div>
</div>
</div>
<?php include 'include/footer.php';?>

<script>
    // Delete 
 $('.delete').click(function(){
   var el = this;
   var id = this.id;
   var splitid = id.split("_");
   // Delete id
   var deleteid = splitid[1];
   //var del =confirm("Are you sure! remove from pin");
    //  if(del){
   // AJAX Request
     $.ajax({
        url: "",
        type: "POST",
        data: {id:deleteid},
        success: function(response){
            //alert(response);
            location.reload();
        }
    });
   //}
});
</script>

</body>
</html>
