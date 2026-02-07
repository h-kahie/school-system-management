<?php
session_start();
include("../config/db.php");
if($_SESSION['role']!="admin") exit("Denied");

if(isset($_POST['add'])){
$name=$_POST['name'];
$email=$_POST['email'];
$roll=$_POST['roll'];
$class=$_POST['class'];
$pass=password_hash("12345",PASSWORD_DEFAULT);

mysqli_query($conn,"INSERT INTO users(name,email,password,role)
VALUES('$name','$email','$pass','student')");
$uid=mysqli_insert_id($conn);

mysqli_query($conn,"INSERT INTO students(user_id,class_id,roll_no)
VALUES('$uid','$class','$roll')");
}
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
        <div class="topbar"><h3>Add Student</h3></div>
        <!-- Added consistent admin layout and styling for the add student form. -->
        <form method="post" class="form-box">
            <input name="name" placeholder="Name" required>
            <input name="email" placeholder="Email" type="email" required>
            <input name="roll" placeholder="Roll" required>
            <input name="class" placeholder="Class ID" required>
            <button name="add">Add Student</button>
        </form>
    </div>
</div>
</body>
</html>
