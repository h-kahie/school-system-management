<?php
session_start();
include("../config/db.php");
if($_SESSION['role']!="admin") exit("Denied");

?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
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
        <div class="topbar"><h3>Users</h3></div>
    </div>
</div>
</body>
</html>
