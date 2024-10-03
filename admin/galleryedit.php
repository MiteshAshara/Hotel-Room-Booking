<?php  
session_start();  
if(!isset($_SESSION["user"]))
{
   header("location:index.php");
}
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
                        <a class="active-menu" href="gallery.php"><i class="fa fa-picture-o"></i> Gallery</a>
                    </li>
                    <li>
                        <a href="roomimg.php"><i class="fa fa-picture-o"></i> Room images</a>
                    </li>
                    <li>
                        <a href="payment.php"><i class="fa fa-qrcode"></i> Payment</a>
                    </li>
                   <!--  <li>
                        <a  href="profit.php"><i class="fa fa-money"></i> Profit</a>
                    </li> -->
                    <li>
                        <a href="price.php"><i class="fa fa-sign-out fa-fw"></i> Edit price</a>
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
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">


            <?php 
            include '../db.php';
            $id=$name="";
            if(isset($_GET['id'])){ 
            // print_r($_GET); die;
                $id = $_GET['id'];
                $q = "select * from gallery where id={$id}";
                $result = mysqli_query($link,$q);
                $row = mysqli_fetch_assoc($result);
                $id=$row['id'];
                $img=$row['name'];
            }

            ?>
            <label for="exampleFormControlFile1">Gallery Image</label>
            <div class="form-group">    
                <form action="check.php" method="post">
                    <input type="hidden" name="id" value="<?php echo $id; ?>"> 
                    <input type="hidden" name="name" value="<?php echo $img; ?>"> 
                    <?php if(!empty($img)){?>
                        <img src="<?php echo '../assets/img/gallery/'.$img; ?>" height='200px' width="200px" id="name"/>
                        <br/><br/>
                        <label for="exampleFormControlFile1">If you want to update, Select Image</label>
                    <?php } ?>

                    <input type="file" class="form-control-file" name="file1" id="file1" value="<?php echo $img; ?>">
                    <input type="submit" value="save" name="update" class="button">
                </form>
            </div>

        </body>
        </html>


