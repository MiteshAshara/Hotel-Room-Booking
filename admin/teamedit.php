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

        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">

                    <li>
                        <a  href="home.php"><i class="fa fa-dashboard"></i> Status</a>
                    </li>
                    <li>
                        <a href="messages.php"><i class="fa fa-desktop"></i> News Letters</a>
                    </li>
                    <li>
                        <a href="roombook.php"><i class="fa fa-bar-chart-o"></i> Room Booking</a>
                    </li>
                    <li>
                        <a href="gallery.php"><i class="fa fa-picture-o"></i> Gallery</a>
                    </li>
                    <li>
                        <a href="payment.php"><i class="fa fa-qrcode"></i> Payment</a>
                    </li>
                    <li>
                        <a  href="profit.php"><i class="fa fa-money"></i> Profit</a>
                    </li>
                    <li>
                        <a href="price.php"><i class="fa fa-sign-out fa-fw"></i> Edit price</a>
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



        <?php 
        $id=$name=$img=$post ="";
        if(isset($_GET['id'])){ 
            $title = "Want any changes";
            $id = $_GET['id'];
            $q = "select * from team where id={$id}";
            $result = mysqli_query($link,$q);
            $row = mysqli_fetch_assoc($result);
            $id=$row['id'];
            $name=$row['name'];
            $img=$row['img'];
            $post=$row['post'];
        }
        else{
            $title = "Add New Member";
        }
        ?>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            <div id="page-inner">


                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">
                            Team <small> <?php echo $title; ?> </small>
                        </h1>
                    </div>
                </div>


                <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
                <section id="team" class="section">
                  <div class="container">
        <!-- <div class="section-header">          
          <h2 class="section-title">Our Team</h2>
          <hr class="lines">
      </div>-->



      <form action="teamchange.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $id; ?>"> 
        <input type="hidden" name="img" value="<?php echo $img; ?>"> 
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    Name:<br><input type="text"  name="name" value="<?php echo $name; ?>">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    Post:<br><input type="text"  name="post" value="<?php echo $post; ?>">
                </div>
            </div>
            <div class="col-md-4"></div>
            <div class="col-md-6">
                <label for="exampleFormControlFile1">Member Image</label>
                <div class="form-group">
                    <?php if(!empty($img)){?>
                        <img src="<?php echo 'assets/img/team/'.$img; ?>" height='200px' width="200px" id="img"/>
                        <br /><br/><label for="exampleFormControlFile1">If you want to update, Select Image</label>
                    <?php } ?>

                    <input type="file" class="form-control-file" name="file1" id="file1" value="<?php echo $img; ?>">
                </div>
            </div>
        </div>
        <input type="submit" value="ADD" name="update" name="submit" class="button">
        <style>
            .button{
               background-color: rgb(0, 191, 255);
               color: rgb(255, 255, 255);
               padding: 10px 15px;
               font:status-bar;
               border-color: antiquewhite; 

           }
       </style>
   </div>
</form>
</html>
<?php

?>


