<?php  
session_start();  
if(isset($_SESSION["user"]))  
{  
  header("location:home.php");  
}  

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Shangri-La ADMIN</title>
  
  

  <link rel="stylesheet" href="style.css">

  
</head>

<body>
  <div id="clouds">
   <div class="cloud x1"></div>
   <!-- Time for multiple clouds to dance around -->
   <div class="cloud x2"></div>
   <div class="cloud x3"></div>
   <div class="cloud x4"></div>
   <div class="cloud x5"></div>
   <div class="cloud x6"></div>
   

 </div>

 <div class="container">


  <div id="login">

    <form method="post">

      <fieldset class="clearfix">

        <span class="fontawesome-user"></span><input type="text"  name="user" placeholder="username">
        <span class="fontawesome-lock"></span><input type="password" name="pass" placeholder="password">
        <p><input type="submit" name="sub"  value="Login"></p>

      </fieldset>

    </form>
  </div> <!-- end login -->

</div>
<div class="bottom"> <h3><a href="../index.php">Shangri-La HOMEPAGE</a></h3>

</div>


</body>
</html>

<?php
include('../db.php');
extract($_POST);

if(isset ($_POST['sub'])) {
// username and password sent from form 

  $myusername = $_POST['user'];
  $mypassword = $_POST['pass']; 

  $sql = "SELECT id FROM login WHERE usname = '".$myusername."' and pass = '".$mypassword."'";
  $result = mysqli_query($link,$sql);
  $row = mysqli_fetch_assoc($result);
  $active = mysqli_num_rows($result);

  $count = mysqli_num_rows($result);

  // If result matched $myusername and $mypassword, table row must be 1 row

  if($active == 1) {

   $_SESSION['user'] = $myusername;

   header("location: home.php");
 }else {
   echo '<script>alert("Please Enter credentials") </script>' ;

 }
}
?>
