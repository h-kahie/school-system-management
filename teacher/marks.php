<?php
session_start();
include("../config/db.php");
if($_SESSION['role']!="teacher") exit("Denied");

if(isset($_POST['save'])){
mysqli_query($conn,"INSERT INTO marks(student_id,subject_id,exam_id,marks)
VALUES('$_POST[student]','$_POST[subject]','$_POST[exam]','$_POST[marks]')");
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
        <h2>Teacher</h2>
        <a href="dashboard.php">Dashboard</a>
        <a href="marks.php">Marks</a>
        <a href="../auth/logout.php">Logout</a>
    </div>
    <div class="main">
        <div class="topbar"><h3>Record Marks</h3></div>
        <!-- Added teacher layout styling for the marks entry form. -->
        <form method="post" class="form-box">
            <input name="student" placeholder="Student ID" required>
            <input name="subject" placeholder="Subject ID" required>
            <input name="exam" placeholder="Exam ID" required>
            <input name="marks" placeholder="Marks" type="number" min="0" required>
            <button name="save">Save</button>
        </form>
    </div>
</div>
</body>
</html>
