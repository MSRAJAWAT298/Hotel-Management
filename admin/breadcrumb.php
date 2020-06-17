<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active">
            <a href="<?php echo HOME ?>"><i class="fa fa-home pr-2"></i>Homes </a>
        </li> 
        <?php if($text=="dasboard"){?>
            <li class="breadcrumb-item active">
                <a href="<?php echo $url ?>">Dashboard</a>
            </li> 
        <?php }?>

        <?php if($text=="add_industry"){?>
            <li class="breadcrumb-item active">
                <a href="<?php echo $url ?>">Add Industry</a>
            </li> 
        <?php }?>

        <?php if($text=="add_hotels"){?>
            <li class="breadcrumb-item active">
                <a href="<?php echo $url ?>">Add Hotels</a>
            </li> 
        <?php }?>


        <?php if($text=="view_industry"){?>
            <li class="breadcrumb-item active">
                <a href="<?php echo $url ?>">View Industry</a>
            </li> 
        <?php }?>

        <?php if($text=="view_hotels"){?>
            <li class="breadcrumb-item active">
                <a href="<?php echo $url ?>">View Hotels</a>
            </li> 
        <?php }?>

        <?php if($text=="setting"){?>
            <li class="breadcrumb-item active">
                <a href="<?php echo $url ?>">Setting</a>
            </li> 
            
        <?php }?>

<!---starting edit if -->
    <?php if(!empty($_GET['edit_id'])){?>
        <?php if($text=="add_hotels.php?edit_id={$_GET['edit_id']}"){?>
            <li class="breadcrumb-item active">
                <a href="<?php echo $url ?>">Edit Hotels</a>
            </li> 
            
        <?php }?>

      
        <?php if($text=="add_industry.php?edit_id={$_GET['edit_id']}"){?>
            <li class="breadcrumb-item active">
                <a href="<?php echo $url ?>">Edit Industry</a>
            </li> 
        <?php }?>

<!---end edit if -->
    <?php } ?>
    <ul class="ml-auto">
        <a class="pin" title="pin page at Dashboard" href="<?php echo $url ?>">
            <i class="fa fa-thumb-tack fa-2x"></i> 
        </a>
    </ul>       
    </ol>
</nav>
<hr>

<script>
//////////// J Q U E R Y F U N C T I O N S////////////////////

$(document).ready(function(){
  $(document).on('click','.pin',function(){
    //alert("hello pin");
    var oldUrl = $(this).attr("href");
   // alert(oldUrl); // Create new url
    var page_name="<?php echo $text; ?>";
   // alert(page_name);
      if(confirm("Are you sure to pin this page"))
      {
        $.ajax({
          type:"POST",
          url: "",
          data: {oldUrl:oldUrl,page_name:page_name},
          success: function(data)
          {
            alert(data);
          }
        });
      }      
    });
//end function
});
</script>