<?php
session_start();
include("../config/db.php");
if($_SESSION['role']!="admin") exit("Denied");

$users = mysqli_query($conn,"SELECT id,name,email,role FROM users ORDER BY id DESC");
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
        <!-- Added admin users list view for quick access. -->
        <!-- Removed the cramped boxed table style and replaced with wide responsive table container. -->
        <div class="table-box">
            <table class="data-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
        <div class="form-box">
            <table style="width:100%; border-collapse:collapse;">
                <thead>
                    <tr>
                        <th style="text-align:left; padding:8px; border-bottom:1px solid #ddd;">ID</th>
                        <th style="text-align:left; padding:8px; border-bottom:1px solid #ddd;">Name</th>
                        <th style="text-align:left; padding:8px; border-bottom:1px solid #ddd;">Email</th>
                        <th style="text-align:left; padding:8px; border-bottom:1px solid #ddd;">Role</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($row=mysqli_fetch_assoc($users)){ ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['name']; ?></td>
                            <td><?php echo $row['email']; ?></td>
                            <td><?php echo $row['role']; ?></td>
                            <td style="padding:8px; border-bottom:1px solid #f0f0f0;"><?php echo $row['id']; ?></td>
                            <td style="padding:8px; border-bottom:1px solid #f0f0f0;"><?php echo $row['name']; ?></td>
                            <td style="padding:8px; border-bottom:1px solid #f0f0f0;"><?php echo $row['email']; ?></td>
                            <td style="padding:8px; border-bottom:1px solid #f0f0f0;"><?php echo $row['role']; ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>
