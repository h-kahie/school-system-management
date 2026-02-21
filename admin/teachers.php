<?php
session_start();
include("../config/db.php");
if($_SESSION['role']!="admin") exit("Denied");

if(isset($_POST['add'])){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $qualification=$_POST['qualification'];
    $pass=password_hash("12345",PASSWORD_DEFAULT);

    mysqli_query($conn,"INSERT INTO users(name,email,password,role) VALUES('$name','$email','$pass','teacher')");
    $uid=mysqli_insert_id($conn);

    mysqli_query($conn,"INSERT INTO teachers(user_id,qualification) VALUES('$uid','$qualification')");
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
        <div class="topbar"><h3>Teachers</h3></div>
        <form method="post" class="form-box">
            <input name="name" placeholder="Name" required>
            <input name="email" placeholder="Email" type="email" required>
            <input name="qualification" placeholder="Qualification" required>
            <button name="add">Add Teacher</button>
        </form>
    </div>
</div>
</body>
</html>
