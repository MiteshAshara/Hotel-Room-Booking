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
    <title>Administrator    </title>
    <!-- Bootstrap Styles-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FontAwesome Styles-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- Morris Chart Styles-->
    <link href="assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
    <!-- Custom Styles-->
    <link href="assets/css/custom-styles.css" rel="stylesheet" />
    <!-- Google Fonts-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
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
                <a class="navbar-brand" href="home.php"> <?php echo $_SESSION["user"]; ?> </a>
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
                        <a href="gallery.php"><i class="fa fa-picture-o"></i> Gallery</a>
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
                        <a class="active-menu" href="team.php"><i class="fa fa-users"></i> Team</a>
                    </li>
                    <li>
                        <a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                    </li>

                </ul>

            </div>

        </nav>
    </div>

        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-8">
                        <h1 class="page-header">Our Team</h1>
                    </div>
                    <div class="col-md-4">

                        <a class="btn btn-primary" href="teamedit.php" id="add">Add Team Member <span class="badge"></span></a>
                    </div>
                </div>
                <style type="text/css">
                    #add{
                        background-color: #5c8fa9;
                    }
                </style>
                
                <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
   <!--  <section id="team" class="section">
      <div class="container">
        <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-8">
                                <h1 class="page-header">Our Team</h1>
                            </div>
                            <div class="col-md-4">
                                <a class="btn btn-primary" href="teamedit.php" id="add">Add Team Member <span class="badge"></span></a>
                            </div>
                        </div>
                   </div>
               </div> 
                
      </div>
  </section> -->
  <!-- Team img -->
  <div id="team" class="row">
     <?php
     $num=1;
     $sql = "select * from team";
     $re = mysqli_query($link,$sql) or die(mysqli_error());
     while($row = mysqli_fetch_assoc($re))
     {
        ?>
        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-4 mix development print" style="margin-bottom:30px;">
          <div class="portfolio-item">
            <div class="shot-item">
              <img src="assets/img/team/<?php echo $row['img']; ?>" alt="" />  
              <a class="overlay icon"   href="teamedit.php?id=<?php echo $num;?>" style="margin-left:0px;">
                <i class="lnr lnr-pencil item-icon"></i> 
            </a>
            <a class="overlay icon" href="teamdel.php?id=<?php echo $row['id']; ?>" style="margin-left:70px;">
                <i class="lnr lnr-trash item-icon"></i> 
            </a>
        </div><br>
       <!--  <a href="teamedit.php?id=<?php echo $num;?>"><h5 class="text-center" style="font-size: 20px; color: blue;"><?php echo $row['name']?></h5></a>   
        <h5 class="text-center" style="font-size: 20px;"><?php echo $row['post']; ?></h5>  -->
       <!-- <form action="" method="post">
           <input type="hidden" name="delete" value="<?php echo $row['id']; ?>">  
           <input type="submit" name="del" value="delete member" class="btn btn-danger btn-xs">    
       </form> -->
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