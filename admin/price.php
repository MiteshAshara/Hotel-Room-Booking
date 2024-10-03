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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
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
                        <a href="gallery.php"><i class="bi bi-images"></i></i> Gallery</a>
                    </li>
                    <li>
                        <a href="payment.php"><i class="fa fa-qrcode"></i> Payment</a>
                    </li>
                   <!--  <li>
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
      </div>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            <div id="page-inner">


                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">
                            Change <small>Room Price</small>
                        </h1>
                    </div>
                </div>         
                <div class="row">

                   <?php
                   include('../db.php');
                   if(isset($_POST['add']))
                   {
                      $type = $_POST['type'];
                      $bed = $_POST['bed'];
                      $price = $_POST['price'];
                      $place = 'Free';

                         $check="SELECT * FROM type WHERE type = '".$type."' AND price'".$price."'";
                      $rs = mysqli_query($check);
                      $data = mysqli_fetch_assoc($rs);
                      if($data[0] > 1) {
                         echo "<script type='text/javascript'> alert('Room Already in Exists')</script>";

                     }

                     else
                     {


                       $sql ="INSERT INTO type (type, price) VALUES ('".$type."', '".$price."')"; 
                      if(mysqli_query($link,$sql))
                      {
                         echo "<script>alert('New Room Added') </script>" ;
                     }else {
                         echo "<script>alert('Sorry ! Check The System') </script>" ;
                     }
                 }
             }

             ?>
             <!-- Advanced Tables -->
             <div class="panel panel-default">
                <?php
                $sql = "select * from type";
                $re = mysqli_query($link,$sql)
                ?>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>

                                    <th>Room Type</th>  
                                    <th>Price</th>  
                                    <th>Actions</th>                                           

                                </tr>
                            </thead>
                            <tbody>

                               <?php
                               while($row= mysqli_fetch_assoc($re))
                               {
                                $id = $row['id'];
                                if($id % 2 == 0) 
                                {
                                    echo "<tr class=odd gradeX>

                                    <td>".$row['type']."</td>
                                    <td>".$row['price']."</td>
                                    <td><a href='updateprice.php?id=".$id."'><input type='button' name='edit' value='Edit' class='btn btn-primary'></a></td>
                                    </tr>";
                                }
                                else
                                {
                                    echo"<tr class=even gradeC>
                                    <td>".$row['type']."</td>
                                    <td>".$row['price']."</td>
                                    <td><a href='updateprice.php?id=".$id."'><input type='button' name='edit' value='Edit' class='btn btn-primary'></a></td>
                                    </tr>";

                                }
                            }
?>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
        <!--End Advanced Tables -->	  

    </div>

</div>
</div>


</div>


<!-- /. WRAPPER  -->
<!-- JS Scripts-->
<!-- jQuery Js -->
<script src="assets/js/jquery-1.10.2.js"></script>
<!-- Bootstrap Js -->
<script src="assets/js/bootstrap.min.js"></script>
<!-- Metis Menu Js -->
<script src="assets/js/jquery.metisMenu.js"></script>
<!-- Custom Js -->
<script src="assets/js/custom-scripts.js"></script>


</body>
</html>
