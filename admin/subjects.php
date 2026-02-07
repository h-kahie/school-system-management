<?php
session_start();
include("../config/db.php");
if($_SESSION['role']!="admin") exit("Denied");

if(isset($_POST['add'])){
    $name=$_POST['subject_name'];
    $class=$_POST['class_id'];
    $teacher=$_POST['teacher_id'];
    mysqli_query($conn,"INSERT INTO subjects(subject_name,class_id,teacher_id) VALUES('$name','$class','$teacher')");
}

$subjects = mysqli_query($conn,"SELECT * FROM subjects ORDER BY id DESC");
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
        <div class="topbar"><h3>Subjects</h3></div>
        <!-- Added subjects management form and list for admin. -->
        <form method="post" class="form-box">
            <input name="subject_name" placeholder="Subject Name" required>
            <input name="class_id" placeholder="Class ID" required>
            <input name="teacher_id" placeholder="Teacher ID" required>
            <button name="add">Add Subject</button>
        </form>
        <div class="form-box">
            <table style="width:100%; border-collapse:collapse;">
                <thead>
                    <tr>
                        <th style="text-align:left; padding:8px; border-bottom:1px solid #ddd;">ID</th>
                        <th style="text-align:left; padding:8px; border-bottom:1px solid #ddd;">Subject</th>
                        <th style="text-align:left; padding:8px; border-bottom:1px solid #ddd;">Class</th>
                        <th style="text-align:left; padding:8px; border-bottom:1px solid #ddd;">Teacher</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($row=mysqli_fetch_assoc($subjects)){ ?>
                        <tr>
                            <td style="padding:8px; border-bottom:1px solid #f0f0f0;"><?php echo $row['id']; ?></td>
                            <td style="padding:8px; border-bottom:1px solid #f0f0f0;"><?php echo $row['subject_name']; ?></td>
                            <td style="padding:8px; border-bottom:1px solid #f0f0f0;"><?php echo $row['class_id']; ?></td>
                            <td style="padding:8px; border-bottom:1px solid #f0f0f0;"><?php echo $row['teacher_id']; ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>
