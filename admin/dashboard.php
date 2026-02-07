<?php
session_start();
include("../config/db.php");
if($_SESSION['role']!="admin") exit("Denied");

$total_students = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM students"));
$total_teachers = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM teachers"));
$total_classes  = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM classes"));
?>
<!DOCTYPE html>
<html>
<head><link rel="stylesheet" href="../assets/css/style.css"></head>
<body>
<div class="wrapper">
    <div class="sidebar">
        <h2>Admin</h2>
        <a href="dashboard.php">Dashboard</a>
        <a href="students.php">Students</a>
        <a href="../auth/logout.php">Logout</a>
    </div>
    <div class="main">
        <div class="topbar"><h3>Dashboard Overview</h3></div>
        
        <div class="card-container">
            <div class="card">
                <h1><?php echo $total_students; ?></h1>
                <p>Total Students</p>
            </div>
            <div class="card">
                <h1><?php echo $total_teachers; ?></h1>
                <p>Total Teachers</p>
            </div>
            <div class="card">
                <h1><?php echo $total_classes; ?></h1>
                <p>Total Classes</p>
            </div>
        </div>
    </div>
</div>
</body>
</html>
