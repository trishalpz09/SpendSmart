<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

if (strlen($_SESSION['detsuid']) == 0) {
    header('location:logout.php');
} else {
    if (isset($_POST['submit'])) {
        $userid = $_SESSION['detsuid'];
        $budget_today = $_POST['budget_today'];
        $date = $_POST['date'];
        $query = mysqli_query($con, "INSERT INTO tbbudget (userid, budget_today, date) VALUES ('$userid', '$budget_today', '$date')");
        if ($query) {
            echo "<script>alert('Budget entry has been added');</script>";
            echo "<script>window.location.href='budget.php'</script>";
        } else {
            echo "<script>alert('Something went wrong. Please try again');</script>";
        }
    }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SpendSmart - Add Budget</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/datepicker3.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
</head>
<body>
    <?php include_once('includes/header.php'); ?>
    <?php include_once('includes/sidebar.php'); ?>
    
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="#"><em class="fa fa-home"></em></a></li>
                <li class="active">Budget</li>
            </ol>
        </div>
        
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Add Budget</div>
                    <div class="panel-body">
                        <p style="font-size:16px; color:red" align="center"><?php if ($msg) { echo $msg; } ?></p>
                        <div class="col-md-12">
                            <form role="form" method="post" action="">
                                <div class="form-group">
                                    <label>Date</label>
                                    <input class="form-control" type="date" name="date" required="true">
                                </div>
                                <div class="form-group">
                                    <label>Budget for Today</label>
                                    <input type="number" step="0.01" class="form-control" name="budget_today" required="true">
                                </div>
                                <div class="form-group has-success">
                                    <button type="submit" class="btn btn-primary" name="submit">Add</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                
                
            </div>
        </div>
        <?php include_once('includes/footer.php'); ?>
    </div>
    
    <script src="js/jquery-1.11.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/chart.min.js"></script>
    <script src="js/chart-data.js"></script>
    <script src="js/easypiechart.js"></script>
    <script src="js/easypiechart-data.js"></script>
    <script src="js/bootstrap-datepicker.js"></script>
    <script src="js/custom.js"></script>
</body>
</html>
<?php } ?>