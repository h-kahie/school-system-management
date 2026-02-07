<?php
session_start();
include("../config/db.php");

if(isset($_POST['login'])){
    $email = $_POST['email'];
    $pass  = $_POST['password'];

    $q = mysqli_query($conn,"SELECT * FROM users WHERE email='$email'");
    $u = mysqli_fetch_assoc($q);

    if($u && password_verify($pass,$u['password'])){
        $_SESSION['uid']=$u['id'];
        $_SESSION['role']=$u['role'];

        if($u['role']=="admin") header("Location: ../admin/dashboard.php");
        if($u['role']=="teacher") header("Location: ../teacher/dashboard.php");
        if($u['role']=="student") header("Location: ../student/dashboard.php");
    } else {
        $error="Invalid login";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
<div class="form-box">
<h2>School Login</h2>
<form method="post">
<input name="email" placeholder="Email">
<input type="password" name="password" placeholder="Password">
<button name="login">Login</button>
<?php if(isset($error)) echo $error; ?>
</form>
</div>
</body>
</html>