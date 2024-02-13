<!-- outline:
This is login UI. It submits data to loginCon.php using post request.  -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport", initial-scale="1.0">
    <link rel="stylesheet" href="login.css">
    <title>Document</title>
</head>
<body>

    <div class="container">
        <div class="login-box">
            <form method="POST">
                <div class="page-box">
                    <div class="login-title">
                        <h2 class="loginTitle-text">Login</h2>
                        <p class="user-email">Please login to use The platform</p>
                    </div>
                    <div class="page email-page">
                        <div class="input-box">
                            <input type="text" class="email" name="email"
                            autofocus required pattern="/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/">
                            <label>Enter your Email</label>
                        </div>
                        <div class="forget">
                            <a href="#">Forgot Email?</a>
                        </div>
                    
                    <div class="guest-mode">
                        <p>Not your computer? Use guest mode to login privetly.</p>
                        <a href="#">Learn more</a>
                    </div>
                    <div class="btn-box">
                        <a href="./reg.php">Create Account</a>
                        <button class="btn-next">Next</button>
                     </div>
                    </div>

                    <div class="page password-page">
                        <div class="input-box">
                            <input type="password" class="password" name="password"
                             required>
                            <label>Enter your password</label>
                        </div><br>
                        <div class="input-box">
                            <select name="type" class="uc_padding uc_fullWidth uc_rounding uc_borderBlue uc_colorWhite uc_fontNormal" placeholder="Type" required>
                                <option class="uc_padding uc_fullWidth uc_rounding uc_nobackground" value="student" default>Student</option>
                                <option class="uc_padding uc_fullWidth uc_rounding uc_nobackground">Admin</option>
                            </select>
                            
                        </div>
                        <div class="forget show">
                            <a href="#">Forgot Password?</a>
                            <label for=""><input type="checkbox" class="checkbox-pass">show password</label>
                        </div>
                    <div class="btn-box">
                        <button class="btn-back">back</button>
                        <button class="btn-next" type="submit">Login</button>
                     </div>
                    </div>
                 </div>                  
            </form>
        </div>
    </div>
    <script src="login.js"></script>
</body>

</html>

<?php 
require_once("../initiate.php");
if ($_POST){
    $email = $_POST['email'];
    $password = $_POST['password'];
    $type = $_POST['type'];

    $response = (($con->query("SELECT count(*) AS count, usertype FROM reg WHERE email = '$email' AND password = '$password' AND usertype = '$type'")) -> fetch_assoc());
    $count = $response['count'];
        if ($count >= 1 && $response['usertype'] == "admin") {
            $_SESSION['isLoggedIn'] = true;
            $_SESSION['loggedInAs'] = "admin";
            header("Location: /4th-sem-lab/Student-Admission/?a=view");
        } else if ($count >= 1 && $response['usertype'] == "student") {
            $_SESSION['isLoggedIn'] = true;
            $_SESSION['loggedInAs'] = "student";
            header("Location: /4th-sem-lab/Student-Admission/index.php");
        } else {    
            echo "You fool";
        }
}
?>