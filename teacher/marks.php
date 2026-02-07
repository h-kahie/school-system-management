<?php
session_start();
include("../config/db.php");
if($_SESSION['role']!="teacher") exit("Denied");

if(isset($_POST['save'])){
mysqli_query($conn,"INSERT INTO marks(student_id,subject_id,exam_id,marks)
VALUES('$_POST[student]','$_POST[subject]','$_POST[exam]','$_POST[marks]')");
}
?>
<form method="post" class="form-box">
<input name="student" placeholder="Student ID">
<input name="subject" placeholder="Subject ID">
<input name="exam" placeholder="Exam ID">
<input name="marks" placeholder="Marks">
<button name="save">Save</button>
</form>