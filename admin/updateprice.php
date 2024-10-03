<?php  
ob_start();
session_start();  
if(!isset($_SESSION["user"]))
{
   header("location:index.php");
}
include "db.php";
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
                        <a href="roomimg.php"><i class="fa fa-picture-o"></i> Room images</a>
                    </li>
                    <li>
                        <a  href="gallery.php"><i class="fa fa-picture-o"></i> Gallery</a>
                    </li>
                    <li>
                        <a href="payment.php"><i class="fa fa-qrcode"></i> Payment</a>
                    </li>
                    <!-- <li>
                        <a  href="profit.php"><i class="fa fa-money"></i> Profit</a>
                    </li> -->
                    <li>
                        <a class="active-menu" href="price.php"><i class="fa fa-edit"></i> Edit price</a>
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
          $id=$type=$price=$img="";
          if(isset($_GET['id'])){ 
            $title = "Want any changes";
            $id = $_GET['id'];
            $q = "select * from type where id={$id}";
            $result = mysqli_query($link,$q);
            $row = mysqli_fetch_assoc($result);
                // print_r($row);die;
            $id=$row['id'];
            $type=$row['type'];
            $price=$row['price'];
            $img=$row['img'];
        }
        else{
            $title = "Add New Member";
        }
        ?>
        <form method="post">
          <div class="form-group">


            <label>Price</label>
            <input type="text" class="form-control" name="price" value="<?php echo $price; ?>"></br>
            <label class="form-control" style="width: 23%;">Type of Room :- <?php echo  $type; ?></label><br>
            <label>Room image :-</label><br>
            <img src="<?php echo '../img/'.$img; ?>" height='200px' width="200px" id="name"/><br><br>
            <style>
                .form-control{
                    width: auto;
                    border-color: black;
                    border-radius: 8px;
                }
            </style>
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <input type="submit" name="update" class="btn btn-success">
        </div>
    </form>
    </html>
    <?php 

    if(isset($_POST['update'])){
        $id=$_POST['id'];
        $price = $_POST['price'];
        $sql= "update type set price='".$price."' where id='".$id."'" ;
        if(mysqli_query($link,$sql)) {
            header('Location: price.php');
            exit();
        }
    }
    ?>