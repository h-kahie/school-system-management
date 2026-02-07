<?php
session_start();
if($_SESSION['role']!="student") exit("Denied");
?>
<!DOCTYPE html>
<html>
<head><link rel="stylesheet" href="../assets/css/style.css"></head>
<body>
<div class="wrapper">
<div class="sidebar">
<h2>Student</h2>
<a href="dashboard.php">Dashboard</a>
<a href="results.php">Results</a>
<a href="../auth/logout.php">Logout</a>
</div>
<div class="main">
<div class="topbar"><h3>Student Dashboard</h3></div>
</div>
</div>
</body>
</html>