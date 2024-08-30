<?php
//include 'database/db.php';
//session_start();
error_reporting(0);
$conn = mysqli_connect('localhost','root','');
mysqli_select_db($conn,'login_db');
if(isset($_POST['submit'])){
$email=$_POST['email'];
$password=$_POST['password'];

$q= "select * from registration where email='$email' AND password='$password'";
$result=mysqli_query($conn,$q);
$num =mysqli_num_rows($result);
$row=mysqli_fetch_array($result);
if(!$num==1)
{
echo '<script>alert("Wrong Password")</script>';
}
else
{ 
$_SESSION['email']=$row['password'];
header('location:home.php');
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
    <title>Log In</title>
</head>
<body>
    <div class="login-box">
        <form method="post">
        <h1>Login</h1>
            <label>Email</label>
            <input type="email" name = "email" placeholder="Email">
            <label>Password</label>
            <input type="password" name="password" placeholder="Password" id="password">
            <label><img src="icon/eye-close.png" id="eyeicon"></label>
            <button class="button" type="submit" name="submit">Login</button>
        </form>
    </div>
    <p class="para-2">Not have an account? <a href="sign_up.php">Sign Up Here</a></p>
    
    <script>
        let eyeicon = document.getElementById("eyeicon");
        let password = document.getElementById("password");
        
        eyeicon.onclick = function(){
            if(password.type == "password"){
                password.type = "text";
                eyeicon.src ="icon/eye-open.png";
            }
            else{
                password.type = "password";
                eyeicon.src = "icon/eye-close.png";
            }
        }
        
    </script>
</body>
</html>