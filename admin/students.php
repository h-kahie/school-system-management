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
<form method="post" class="form-box">
<input name="name" placeholder="Name">
<input name="email" placeholder="Email">
<input name="roll" placeholder="Roll">
<input name="class" placeholder="Class ID">
<button name="add">Add Student</button>
</form>