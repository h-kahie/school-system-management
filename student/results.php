<?php
session_start();
include("../config/db.php");
$uid=$_SESSION['uid'];

$result=mysqli_query($conn,"
SELECT subjects.subject_name, marks.marks
FROM marks
JOIN students ON students.id=marks.student_id
JOIN subjects ON subjects.id=marks.subject_id
WHERE students.user_id='$uid'
");

while($r=mysqli_fetch_assoc($result)){
echo $r['subject_name']." : ".$r['marks']."<br>";
}
?>