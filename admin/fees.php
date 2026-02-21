<?php
session_start();
include("../config/db.php");
if($_SESSION['role']!="admin") exit("Denied");

if(isset($_POST['add'])){
    $student=$_POST['student_id'];
    $amount=$_POST['amount'];
    $status=$_POST['status'];
    mysqli_query($conn,"INSERT INTO fees(student_id,amount,status) VALUES('$student','$amount','$status')");
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
        <div class="topbar"><h3>Fees</h3></div>
        <form method="post" class="form-box">
            <input name="student_id" placeholder="Student ID" required>
            <input name="amount" placeholder="Amount" type="number" min="0" required>
            <select name="status" required>
                <option value="">Select Status</option>
                <option value="paid">Paid</option>
                <option value="unpaid">Unpaid</option>
            </select>
            <button name="add">Add Fee</button>
        </form>
    </div>
</div>
</body>
</html>
