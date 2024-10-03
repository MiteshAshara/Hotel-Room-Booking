<?php 
ob_start();
?>


<?php  
session_start();  
if(!isset($_SESSION["user"]))
{
 header("location:index.php");
}
include "../db.php";
?> 
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>


  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Shangri-La Hotel</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
  <!-- Bootstrap Styles-->
  <link href="assets/css/bootstrap.css" rel="stylesheet" />
  <!-- FontAwesome Styles-->
  <link href="assets/css/font-awesome.css" rel="stylesheet" />
  <!-- Morris Chart Styles-->

  <!-- Custom Styles-->
  <link href="assets/css/custom-styles.css" rel="stylesheet" />
  <!-- Google Fonts-->
  <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
  <!-- TABLE STYLES-->
  <link href="assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
</head>
<body>
  <div id="wrapper">

    <nav class="navbar navbar-default top-navbar" role="navigation">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="home.php"><?php echo $_SESSION["user"]; ?> </a>
      </div>

      <ul class="nav navbar-top-links navbar-right">
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
            <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
          </a>
          <ul class="dropdown-menu dropdown-user">
            <li><a href="usersetting.php"><i class="fa fa-user fa-fw"></i> User Profile</a>
            </li>
            <li><a href="settings.php"><i class="fa fa-gear fa-fw"></i> Settings</a>
            </li>
            <li class="divider"></li>
            <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
            </li>
          </ul>
          <!-- /.dropdown-user -->
        </li>
        <!-- /.dropdown -->
      </ul>
    </nav>
    <!--/. NAV TOP  -->
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/line-icons.css">
    <link rel="stylesheet" href="../css/owl.carousel.css">
    <link rel="stylesheet" href="../css/owl.theme.css">
    <link rel="stylesheet" href="../css/nivo-lightbox.css">
    <link rel="stylesheet" href="../css/magnific-popup.css">
    <link rel="stylesheet" href="../css/slicknav.css">
    <link rel="stylesheet" href="../css/animate.css">
    <link rel="stylesheet" href="../css/main.css">    
    <link rel="stylesheet" href="../css/responsive.css">

    <!--/. NAV TOP  -->
    <div style="margin-left: 6px;">
    <nav class="navbar-default navbar-side" role="navigation">
      <div class="sidebar-collapse">
        <ul class="nav" id="main-menu">

          <li>
            <a  href="home.php"><i class="fa fa-dashboard"></i> Status</a>
          </li>
          <li>
            <a href="roombook.php"><i class="fa fa-bar-chart-o"></i> Room Booking</a>
          </li>
          <li>
            <a href="roomimg.php"><i class="fa fa-picture-o"></i> Room images</a>
          </li>
          <li>
            <a class="active-menu" href="gallery.php"><i class="bi bi-images"></i></i> Gallery</a>
          </li>
          <li>
            <a href="payment.php"><i class="fa fa-qrcode"></i> Payment</a>
          </li>
          <!-- <li>
            <a  href="profit.php"><i class="fa fa-money"></i> Profit</a>
          </li> -->
          <li>
            <a href="price.php"><i class="fa fa-edit"></i> Edit price</a>
          </li>
          <li>
            <a href="team.php"><i class="fa fa-users"></i> Team</a>
          </li>
          <li>
            <a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
          </li>

        </ul>

      </div>

    </nav>
  </div>
    <!-- /. NAV SIDE  -->
    <div id="page-wrapper" >
      <div id="page-inner">
        <div class="row">
          <div class="col-md-12">
            <h1 class="page-header">
             Gallery <small>Iitems</small>
           </h1>
           <div class="col-md-4">
            <a class="btn btn-primary" href="addgallery.php" id="add">Add Gellery item <span class="badge"></span></a>
            <style>
              #add{
                border: 1px solid black;
                margin:20px;
                color: black;
                background-color: skyblue;
                border-radius: 8px;
              }
            </style>
          </div>
        </div>
      </div> 
      <?php
      if(isset($_POST['add']) && isset($_FILES['file1'])){
        include '../db.php';
        // echo '<pre>';
        // print_r($_FILES['file1']);
        // echo '</pre>';
        $img_name=$_FILES['file1']['name'];
        $img_size=$_FILES['file1']['size'];
        $tmp_name=$_FILES['file1']['tmp_name'];
        $error=$_FILES['file1']['error'];
        if($error===0){
          if($img_size >120000){
           $err="your file too large.";
           header("location:addgallery.php?error=$err");
         }
         else{
          $img_ex=pathinfo($img_name,PATHINFO_EXTENSION);
          $img_ex_lc=strtolower($img_ex);
          $allow=array("jpg","jpeg");
          if(in_array($img_ex_lc,$allow)){
            $new_img_name=uniqid("IMG-").'.'.$img_ex_lc;
            $img_upload_path='../assets/img/gallery/'.$new_img_name;
            move_uploaded_file($tmp_name, $img_upload_path);

            //insert a image into database 
            $sql="INSERT INTO  gallery(name) VALUES('$new_img_name')";
            mysqli_query($link,$sql);
            header("location:gallery.php");
          }
          // else{
          //   $err="you can't upload this file";
          //   header("location:addgallery.php?error=$err");

          // }
        }
      }
      else{
        $err="unknown error";
        header("location:addgallery.php?error=$err");
      }



    }
    ?>

    <!-- display a data from database 
        <?php
        include '../db.php';
        $query="SELECT * FROM  gallery";
        $result=mysqli_query($link,$query);

        if(mysqli_num_rows($result)>0){
          while($images=mysqli_fetch_assoc($result)){ ?>
             
           
           <?php } } ?> -->

           <!-- Portfolio Recent Projects -->


           <div id="portfolio" class="row">
             <?php
             include '../db.php';
             $num=1;
             
             $query="SELECT * FROM  gallery";
             $result=mysqli_query($link,$query);

             while($images=mysqli_fetch_assoc($result)){

               ?>
               <div class="col-sm-6 col-md-4 col-lg-4 col-xl-4 mix development print" style="margin-bottom:20px">
                <div class="portfolio-item">
                  <div class="shot-item">
                    <img src="../assets/img/gallery/<?=$images['name']?>" /> 
                    <a class="overlay lightbox" href="galleryedit.php?id=<?php echo $num ;?>">
                      <i class="lnr lnr-pencil item-icon"></i>
                    </a>
                    <a class="overlay icon" id="btnShowMsg" href="gallerydel.php?id=<?php echo $images['id']; ?>" style="margin-left:70px;" onClick="showMessage()">
                      <i class="lnr lnr-trash item-icon"></i>   
                    </a>
                  </div>               
                </div>
              </div>
              <?php
              $num++;		
            }
            ?>
          </div>



          <!-- /. PAGE WRAPPER  -->
          <!-- /. WRAPPER  -->
          <!-- JS Scripts-->
          <!-- jQuery Js -->
          <script src="assets/js/jquery-1.10.2.js"></script>
          <!-- Bootstrap Js -->
          <script src="assets/js/bootstrap.min.js"></script>
          <!-- Metis Menu Js -->
          <script src="assets/js/jquery.metisMenu.js"></script>
          <!-- DATA TABLE SCRIPTS -->
          <script src="assets/js/dataTables/jquery.dataTables.js"></script>
          <script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
          <script>
            $(document).ready(function () {
              $('#dataTables-example').dataTable();
            });
          </script>

          <!-- alert box when delete a image  -->
          <script type="text/javascript">
            function showMessage() {
              alert("image deleted successfully!");
            }
          </script>


          <!-- Custom Js -->
          <script src="assets/js/custom-scripts.js"></script>

          <!-- jQuery first, then Tether, then Bootstrap JS. -->
          <script src="../js/jquery-min.js"></script>   
          <script src="../js/bootstrap.min.js"></script>
          <script src="../js/jquery.mixitup.js"></script>
          <script src="../js/jquery.nav.js"></script>    
          <script src="../js/jquery.slicknav.js"></script>	
          <script src="../js/wow.js"></script>	
          <script src="../js/jquery.counterup.min.js"></script>    
          <script src="../js/main.js"></script>



        </body>
        </html>