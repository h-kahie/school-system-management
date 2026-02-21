<?php
session_start();
include("../config/db.php");
if($_SESSION['role']!="admin") exit("Denied");

if(isset($_POST['add'])){
    $name=$_POST['exam_name'];
    $class=$_POST['class_id'];
    $date=$_POST['exam_date'];
    mysqli_query($conn,"INSERT INTO exams(exam_name,class_id,exam_date) VALUES('$name','$class','$date')");
}

$exams = mysqli_query($conn,"SELECT * FROM exams ORDER BY id DESC");
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
        <div class="topbar"><h3>Exams</h3></div>
        <!-- Added exams management form and list for admin. -->
        <form method="post" class="form-box">
            <input name="exam_name" placeholder="Exam Name" required>
            <input name="class_id" placeholder="Class ID" required>
            <input name="exam_date" type="date" required>
            <button name="add">Add Exam</button>
        </form>
        <!-- Removed the cramped boxed table style and replaced with wide responsive table container. -->
        <div class="table-box">
            <table class="data-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Exam</th>
                        <th>Class</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($row=mysqli_fetch_assoc($exams)){ ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['exam_name']; ?></td>
                            <td><?php echo $row['class_id']; ?></td>
                            <td><?php echo $row['exam_date']; ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>
