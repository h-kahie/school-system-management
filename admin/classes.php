<?php
session_start();
include("../config/db.php");
if($_SESSION['role']!="admin") exit("Denied");

if(isset($_POST['add'])){
    $name=$_POST['class_name'];
    mysqli_query($conn,"INSERT INTO classes(class_name) VALUES('$name')");
}

$classes = mysqli_query($conn,"SELECT * FROM classes ORDER BY id DESC");
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
        <div class="topbar"><h3>Classes</h3></div>
        <!-- Added classes management form and list for admin. -->
        <form method="post" class="form-box">
            <input name="class_name" placeholder="Class Name" required>
            <button name="add">Add Class</button>
        </form>
        <div class="form-box">
            <table style="width:100%; border-collapse:collapse;">
                <thead>
                    <tr>
                        <th style="text-align:left; padding:8px; border-bottom:1px solid #ddd;">ID</th>
                        <th style="text-align:left; padding:8px; border-bottom:1px solid #ddd;">Class Name</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($row=mysqli_fetch_assoc($classes)){ ?>
                        <tr>
                            <td style="padding:8px; border-bottom:1px solid #f0f0f0;"><?php echo $row['id']; ?></td>
                            <td style="padding:8px; border-bottom:1px solid #f0f0f0;"><?php echo $row['class_name']; ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>
