<?php
session_start();
include("../config/db.php");
if($_SESSION['role']!="admin") exit("Denied");

$total_students = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM students"));
$total_teachers = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM teachers"));
$total_classes  = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM classes"));
$total_fees  = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM fees"));
$total_subject  = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM subjects"));
$total_exams  = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM exams"));
$total_users = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM users"));






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
        <a href="teachers.php">Teachers</a>
        <a href="classes.php">Classes</a>
        <a href="fees.php">Fees</a>
        <a href="subjects.php">Subjects</a>
        <a href="exams.php">Exams</a>
        <a href="users.php">Users</a>

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
            <div class="card">
                <h1><?php echo $total_fees; ?></h1>
                <p>Total Fees</p>
            </div>
            <div class="card">
                <h1><?php echo $total_exam; ?></h1>
                <p>Total Exam</p>
            </div>
            <div class="card">
                <h1><?php echo $total_subject; ?></h1>
                <p>Total Subject</p>
            </div>
            <div class="card">
                <h1><?php echo $total_exams; ?></h1>
                <p>Total Exams</p>
            </div>
            <div class="card">
                <h1><?php echo $total_users; ?></h1>
                <p>Total Users</p>
            </div>
        </div>
    </div>
</div>
</body>
</html>
