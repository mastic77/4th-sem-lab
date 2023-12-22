<?php

require_once("../initiate.php");
if ($_SESSION['isLoggedIn'] != true || $_SESSION['loggedInAs'] != "admin") {
    header("Location: ../Forms/login.php");
    exit;
}
echo "this will be admin dashboard. place your UI here."
?>