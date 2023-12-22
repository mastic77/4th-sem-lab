<?php
session_start();
$_SESSION['isLoggedIn'] = false;
$_SESSION['loggedInAs'] = "student";
header("location: /4th-sem-lab/Forms/login.php")
?>
