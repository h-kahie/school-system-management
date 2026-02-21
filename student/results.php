<?php
session_start();
include("../config/db.php");
if($_SESSION['role']!="student") exit("Denied");
$uid=$_SESSION['uid'];

$result=mysqli_query($conn,"
SELECT subjects.subject_name, marks.marks
FROM marks
JOIN students ON students.id=marks.student_id
JOIN subjects ON subjects.id=marks.subject_id
WHERE students.user_id='$uid'
");

?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
<div class="wrapper">
    <div class="sidebar">
        <h2>Student</h2>
        <a href="dashboard.php">Dashboard</a>
        <a href="results.php">Results</a>
        <a href="../auth/logout.php">Logout</a>
    </div>
    <div class="main">
        <div class="topbar"><h3>Results</h3></div>
        <!-- Added student layout styling and structured results list. -->
        <div class="list-box list-box-tight-top">
            <?php if(mysqli_num_rows($result) === 0){ ?>
                <p>No results available yet.</p>
            <?php } else { ?>
                <table class="data-table">
                    <thead>
                        <tr>
                            <th>Subject</th>
                            <th>Marks</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while($r=mysqli_fetch_assoc($result)){ ?>
                            <tr>
                                <td><?php echo $r['subject_name']; ?></td>
                                <td><?php echo $r['marks']; ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            <?php } ?>
        </div>
    </div>
</div>
</body>
</html>
