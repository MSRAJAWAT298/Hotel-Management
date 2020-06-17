<?php 

 /*   ini_set('display_errors', 1);
 ini_set('display_startup_errors', 1);
 error_reporting(E_ALL);
  */
 require_once '../path_info.php';
 require_once 'include/db.php';
 session_start();
 if(isset($_SESSION['admin'])){
  header("location:dasboard");
}else{
  
  if(isset($_POST['submit'])){
    if($_POST['username']=="" || $_POST['password']==""){
      $error="please enter username and password";
    }elseif(($_SESSION['admin'])){
       // $_SESSION['admin'] = $_POST['username'];
     header("Location:dasboard");
   } else {
     $username=$_POST['username'];
     $password=$_POST['password'];
     $con=" AND username = '{$username}' AND password = '{$password}'";
     $user = new db();
     $admin=$user->select("admin",$con);
			 /*echo "<pre>";
			 print_r($admin);
			 echo count($admin);
			 exit;*/
       if(count($admin)){
         $_SESSION['admin']=$username;
         if (! empty($_POST["checkbox"])) {
           setcookie("username", $username, time() + 60 * 60 * 24 * 7);
           setcookie("password", $password, time() + 60 * 60 * 24 * 7);
           setcookie("checkbox", $_POST["checkbox"], time() + 60 * 60 * 24 * 7);
//                  echo "Cookies Set Successfully";
           header("Location:dasboard");
         } else {
           setcookie("username", "");
           setcookie("password", "");
           setcookie("checkbox", "");
//                  echo "Cookies Not Set";
           header("Location:dasboard");
         }
       }else{
        $error="<font color='red'> Username or password wrong! try again....</font><br/>";
      }
    }      
  }

}

?>

<?php require_once 'include/header.php';?>
<body>
  <?php  require_once 'include/navbar.php';?>
<div class="continer text-center mt-5"> 
  <form class="form-signin mt-5 pt-4" action="" method="POST">
    <span class="m-2 p-2"> <?php if(isset($error)){echo $error;}?></span>
    <img class="mb-4" src="../images/user_circle.png" alt="" width="72" height="72">
    <h1 class="h3 mb-3 font-weight-normal">Admin Login</h1>
      <div class="row">
          <div class="col-lg-12 p-2"> 
              <input type="text" id="inputUsername" class="form-control" placeholder="Enter Username" name="username" value="<?php if(isset($_COOKIE['username'])) { echo $_COOKIE['username']; }?>" required autofocus>
            </div>
        

          <div class="col-lg-12 p-2">
              <input type="password" id="inputPassword" class="form-control" placeholder="Password"  name="password" value="<?php if(isset($_COOKIE['password'])) { echo $_COOKIE['password']; }?>" required>
          </div>

          <div class="col-lg-6 p-2"> 
              <div class="checkbox mb-3">
                <label>
                  <input type="checkbox" name="checkbox" <?php if(isset($_COOKIE['checkbox'])) { echo "checked"; }?> value="1"> Remember me
                </label>
              </div>
          </div>
          <button class="btn btn-lg btn-success btn-block" type="submit" name="submit" value="Sign in">Sign in</button>
          <button class="btn btn-lg btn-info btn-block" type="submit">Forget Password</button>
            </form>
</div>
</div>
</body>
<?php require_once 'include/footer.php';?>