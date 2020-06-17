<?php

/*
 * ini_set('display_errors', 1);
 * ini_set('display_startup_errors', 1);
 * error_reporting(E_ALL);
 */
session_start();
require_once '../path_info.php';
echo '<script type="text/javascript">';

echo "setTimeout(function() {
                    $.bootstrapGrowl('Add data Sucessfully.', { type: 'success' });
                }, 1000);";
echo '</script>';


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
 
					<hr>
				

<?php include 'include/footer.php';?>

</body>
</html>