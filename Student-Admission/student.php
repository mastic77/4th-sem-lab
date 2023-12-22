<?php
require_once("../initiate.php");
if ($_SESSION['isLoggedIn'] != true || $_SESSION['loggedInAs'] != "student") {
    header("Location: ../Forms/login.php");
    // echo "you fool";
    exit;
}
echo "this will be student dashboard. place your UI here."

?>