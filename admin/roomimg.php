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
    <title>Administrator	</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <!-- Bootstrap Styles-->
    <link href="../assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FontAwesome Styles-->
    <link href="../assets/css/font-awesome.css" rel="stylesheet" />
    <!-- Morris Chart Styles-->
    <link href="../assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
    <!-- Custom Styles-->
    <link href="../assets/css/custom-styles.css" rel="stylesheet" />
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
                <a class="navbar-brand" href="home.php" style="padding: 16px 0 20px 40px;"> <?php echo $_SESSION["user"]; ?> </a>
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
                        <a class="active-menu" href="roomimg.php"><i class="fa fa-picture-o"></i> Room images</a>
                    </li>
                    <li>
                        <a href="gallery.php"><i class="bi bi-images"></i></i> Gallery</a>
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
        <div id="page-wrapper">
            <div id="page-inner">


                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">
                            Room Images <small> Change Images </small>
                        </h1>
                    </div>
                </div>
                <!-- /. ROW  -->
                
                
                <!-- Start Pricing Table Section -->
                <div id="pricing" class="section pricing-section">
                  <div class="container">
                     
                    <div class="row pricing-tables">
                      <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="pricing-table">
                          <div class="pricing-details">
                           
                           <?php
                           $sql5 = "SELECT img FROM type WHERE id = '1'";
                           $result5 = mysqli_query($link,$sql5);
                           $row5 = mysqli_fetch_assoc($result5);
                           $row5['img'];
                           ?>
                           
                           

                           <!--<img src="img/r1.jpg" alt="" />-->
                           <a class="overlay lightbox" href="roomedit.php?id=1">
                              <img src="../img/<?php echo $row5['img']; ?>" alt="" />
                              <h2>Superior Room</h2>
                          </a>
                      </div>
                  </div>
              </div>
              
              <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="pricing-table">
                  <div class="pricing-details">
                    <?php
                    $sql5 = "SELECT img FROM type WHERE id = '2'";
                    $result5 = mysqli_query($link,$sql5);
                    $row5 = mysqli_fetch_assoc($result5);
                    $row5['img'];
                    ?>
                    
                    <a class="overlay lightbox" href="roomedit.php?id=2">
                       <img src="../img/<?php echo $row5['img']; ?>" alt="" />
                       <h2>Deulex Room</h2>
                   </a>
               </div>
           </div>
       </div>

       <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="pricing-table">
          <div class="pricing-details">
            <?php
            $sql5 = "SELECT img FROM type WHERE id = '3'";
            $result5 = mysqli_query($link,$sql5);
            $row5 = mysqli_fetch_assoc($result5);
            $row5['img'];
            ?>

            
            <a class="overlay lightbox" href="roomedit.php?id=3">
                <img src="../img/<?php echo $row5['img']; ?>" alt="" />
                <h2>Guest House</h2>
            </a>
        </div>
    </div>
</div>

<div class="col-md-3 col-sm-6 col-xs-12">
    <div class="pricing-table">
      <div class="pricing-details">
        <?php
        $sql5 = "SELECT img FROM type WHERE id = '4'";
        $result5 = mysqli_query($link,$sql5);
        $row5 = mysqli_fetch_assoc($result5);
        $row5['img'];
        ?>
        
        <a class="overlay lightbox" href="roomedit.php?id=4">
            <img src="../img/<?php echo $row5['img']; ?>" alt="" />
            <h2>Single Room</h2>
        </a>
    </div>
</div>
</div>

</div>
</div>
</div>
<!-- End Pricing Table Section -->



			<!--<div id="portfolio" class="row">
			<?php
			$num=1;
						$sql = "select * from gallery";
						$re = mysqli_query($sql);
						while($row= mysqli_fetch_assoc($re))
						{ 
				
			?>
			<div class="col-sm-6 col-md-4 col-lg-4 col-xl-4 mix development print">
              <div class="portfolio-item">
                <div class="shot-item">
                  <img src="../assets/img/gallery/<?php echo $row['name']; ?>" alt="" />  
                  <a class="overlay lightbox" href="galleryedit.php?id=<?php echo $num ;?>">
                    <i class="lnr lnr-pencil item-icon"></i>
                  </a>
                </div>               
              </div>
            </div>
			<?php
						$num++;		
				}
			?>
            
			
           
      </div>
		</html>
       Container Ends -->
       
       <!-- /. PAGE INNER  -->
   </div>
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
<!-- Morris Chart Js -->
<script src="assets/js/morris/raphael-2.1.0.min.js"></script>
<script src="assets/js/morris/morris.js"></script>
<!-- Custom Js -->
<script src="assets/js/custom-scripts.js"></script>

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