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

$teachers = mysqli_query($conn,"SELECT teachers.id, users.name, users.email, teachers.qualification FROM teachers JOIN users ON users.id=teachers.user_id ORDER BY teachers.id DESC");
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
        <!-- Added teachers management form and list for admin. -->
        <form method="post" class="form-box">
            <input name="name" placeholder="Name" required>
            <input name="email" placeholder="Email" type="email" required>
            <input name="qualification" placeholder="Qualification" required>
            <button name="add">Add Teacher</button>
        </form>
        <!-- Removed the cramped boxed table style and replaced with wide responsive table container. -->
        <div class="table-box">
            <table class="data-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Qualification</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($row=mysqli_fetch_assoc($teachers)){ ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['name']; ?></td>
                            <td><?php echo $row['email']; ?></td>
                            <td><?php echo $row['qualification']; ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>
