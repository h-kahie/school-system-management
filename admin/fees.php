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

$fees = mysqli_query($conn,"SELECT * FROM fees ORDER BY id DESC");
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
        <!-- Added fees management form and list for admin. -->
        <form method="post" class="form-box">
            <input name="student_id" placeholder="Student ID" required>
            <input name="amount" placeholder="Amount" type="number" min="0" required>
            <select name="status" required>
            <select name="status" required style="width:100%; padding:10px; margin-bottom:10px;">
                <option value="">Select Status</option>
                <option value="paid">Paid</option>
                <option value="unpaid">Unpaid</option>
            </select>
            <button name="add">Add Fee</button>
        </form>
        <!-- Removed the cramped boxed table style and replaced with wide responsive table container. -->
        <div class="table-box">
            <table class="data-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Student</th>
                        <th>Amount</th>
                        <th>Status</th>
        <div class="form-box">
            <table style="width:100%; border-collapse:collapse;">
                <thead>
                    <tr>
                        <th style="text-align:left; padding:8px; border-bottom:1px solid #ddd;">ID</th>
                        <th style="text-align:left; padding:8px; border-bottom:1px solid #ddd;">Student</th>
                        <th style="text-align:left; padding:8px; border-bottom:1px solid #ddd;">Amount</th>
                        <th style="text-align:left; padding:8px; border-bottom:1px solid #ddd;">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($row=mysqli_fetch_assoc($fees)){ ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['student_id']; ?></td>
                            <td><?php echo $row['amount']; ?></td>
                            <td><?php echo $row['status']; ?></td>
                            <td style="padding:8px; border-bottom:1px solid #f0f0f0;"><?php echo $row['id']; ?></td>
                            <td style="padding:8px; border-bottom:1px solid #f0f0f0;"><?php echo $row['student_id']; ?></td>
                            <td style="padding:8px; border-bottom:1px solid #f0f0f0;"><?php echo $row['amount']; ?></td>
                            <td style="padding:8px; border-bottom:1px solid #f0f0f0;"><?php echo $row['status']; ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>
