<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

   <title>Expeditors Feedback System | Admin Pannel </title>

    <!-- ================= Favicon ================== -->
    <!-- Standard -->
    <link rel="shortcut icon" href="http://placehold.it/64.png/000/fff">
    <!-- Retina iPad Touch Icon-->
    <link rel="apple-touch-icon" sizes="144x144" href="http://placehold.it/144.png/000/fff">
    <!-- Retina iPhone Touch Icon-->
    <link rel="apple-touch-icon" sizes="114x114" href="http://placehold.it/114.png/000/fff">
    <!-- Standard iPad Touch Icon-->
    <link rel="apple-touch-icon" sizes="72x72" href="http://placehold.it/72.png/000/fff">
    <!-- Standard iPhone Touch Icon-->
    <link rel="apple-touch-icon" sizes="57x57" href="http://placehold.it/57.png/000/fff">

    <!-- Styles -->
    <link href="assets/css/lib/font-awesome.min.css" rel="stylesheet">
    <link href="assets/css/lib/themify-icons.css" rel="stylesheet">
    <link href="assets/css/lib/menubar/sidebar.css" rel="stylesheet">
    <link href="assets/css/lib/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/lib/helper.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
</head>

<body>

        <div class="sidebar sidebar-hide-to-small sidebar-shrink sidebar-gestures">
            <div class="nano">
                <div class="nano-content">
                    <div class="logo"><a href="dashboard.php"><!-- <img src="assets/images/logo.png" alt="" /> --><span>Admin Pannel</span></a></div>
                    <ul>
                        <li class="label">Main</li>
                        <li><a href="dashboard.php" class="label"><i class="ti-home"></i> Dashboard</a>                     
                        </li>

                        <li class="label">Apps</li>
                        <li class="active"><a href="table.php" class="label"><i class="fa fa-television"></i> Table </a></li>
                       <li><a href="reports.php" class="label"><i class="ti-layout-grid4-alt"></i> Report </a></li>
                        <li><a><i class="ti-close"></i> Logout</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- /# sidebar -->


   
     <div class="header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="float-left">
                            <div class="hamburger sidebar-toggle">
                                <span class="line"></span>
                                <span class="line"></span>
                                <span class="line"></span>
                            </div>
                        </div>
                        <div class="float-right">
                            <ul>
                               
                                <li class="header-icon dib"><span class="user-avatar">Admin<i class="ti-angle-down f-s-10"></i></span>
                                    <div class="drop-down dropdown-profile">
                                        <div class="dropdown-content-body">
                                            <ul>
                                                <li><a href="#"><i class="ti-power-off"></i> <span>Logout</span></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>







    <div class="content-wrap">
        <div class="main">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-8 p-r-0 title-margin-right">
                        <div class="page-header">
                            <div class="page-title">
                                <h1>Hello Admin, <span>Welcome Here</span></h1>
                            </div>
                        </div>
                    </div>
                    <!-- /# column -->
                    <div class="col-lg-4 p-l-0 title-margin-left">
                        <div class="page-header">
                            <div class="page-title">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                                    <li class="breadcrumb-item active">Feedback Update Form</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                    <!-- /# column -->
                </div>
                <!-- /# row -->
                <section id="main-content">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-title">
                                    <h4>Edit Form</h4>
                                    
                                </div>
                                <div class="card-body">
                                    <div class="horizontal-form">
                                        <form class="form-horizontal" method="post">
                                            <?php
                                                if(isset($_GET['edit']))
                                                {	$db = mysqli_connect('localhost','root', '','anonymous');
                                                      $id = $_GET['edit'];
                                                    $sel="select * from feed where id='$id'";
                                                    $kl=mysqli_query($db,$sel);
                                                    $name=mysqli_fetch_assoc($kl);
                                            ?>
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">Feedback</label>
                                                <div class="col-sm-10">
                                                    <input type="textarea" name="feedback" readonly class="form-control" value="<?php echo $name['feedback']; ?>" >
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">Date</label>
                                                <div class="col-sm-10">
                                                    <input type="text"  readonly name="date" class="form-control" value="<?php echo $name['date']; ?>">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">Status</label>
                                                <div class="col-sm-10">
                                                    <select name="status" class="form-control">
															<option>In Progress</option>
															<option>Resolved</option>
															<option>Reopen</option>
														</select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">Remarks</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="remarks" class="form-control" value="<?php echo $name['remarks']; ?>" placeholder="Remarks">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-offset-2 col-sm-10">
                                                    <button type="submit" name="update" class="btn btn-default">Update</button>
                                                    <button type="submit" name="delete" class="btn btn-default">Delete</button>
                                                </div>
                                            </div>
                                            <?php	
                                            }

                                            ?>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /# column -->
                           <!-- /# card -->
                        </div>
                        <!-- /# column -->
                    
                    <!-- /# row -->
                    
                    <?php
                        if(isset($_POST['update']))
                        {
                        $db = mysqli_connect('localhost','root', '','anonymous');
                            $get=$_POST['status'];
                            $gets=$_POST['remarks'];
                            $id=$_GET['edit'];
                            $query="UPDATE feed set status='".$get."' , remarks='".$gets."' WHERE id ='$id'";
                            $update=mysqli_query($db,$query);
                            echo "<script>window.open('table.php ','_self')</script>";
                        }
                    
                        if(isset($_POST['delete']))
                        {
                        $db = mysqli_connect('localhost','root', '','anonymous');
                            $id=$_GET['edit'];
                            $query="DELETE FROM feed WHERE id='$id'";
                            $update=mysqli_query($db,$query);
                            echo "<script>window.open('table.php ','_self')</script>";
                        }
                       ?>
                    

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="footer">
                                <p><?php echo date("Y"); ?> © Admin Pannel Board. - <a href="#">Expeditors.com</a></p>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>






    
    <!-- jquery vendor -->
    <script src="assets/js/lib/jquery.min.js"></script>
    <script src="assets/js/lib/jquery.nanoscroller.min.js"></script>
    <!-- nano scroller -->
    <script src="assets/js/lib/menubar/sidebar.js"></script>
    <script src="assets/js/lib/preloader/pace.min.js"></script>
    <!-- sidebar -->
    
    <!-- bootstrap -->
    <script src="assets/js/lib/bootstrap.min.js"></script><script src="assets/js/scripts.js"></script>
    <!-- scripit init-->





</body>

</html>