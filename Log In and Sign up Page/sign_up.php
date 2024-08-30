<?php 
// include 'database/db.php';
// error_reporting(0);
$conn = mysqli_connect('localhost','root','');
mysqli_select_db($conn,'login_db');
if(isset($_POST['submit']))
{
    $fistname = $_POST['fname'];
    $lastname = $_POST['lname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    $q= "insert into registration (f_name,l_name,email,password,confirm_password) values ('$fistname','$lastname','$email','$password','$confirm_password')";
    $result=mysqli_query($conn,$q);
    $num =mysqli_num_rows($result);
    if($result)
    {
        // echo 'Data Insert Successfully';
        echo '<script>alert("Data inserted Successfully");
        window.location = "sign_up.php";
        </script>';
    }
    else{
        echo "error:".mysqli_errno($conn);
    }
    mysqli_close($conn);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/signup.css">
    <title>Sign Up</title>
</head>
<body>
    <div class="signup-box">
        <h1>Sign Up</h1>
        <h4>Register Your Self</h4>

        <form method="POST">
            <label>First Name</label>
            <input type="text" name="fname" placeholder="First Name">
            <label>Last Name</label>
            <input type="text" name="lname"  placeholder="Last Name">
            <label>Email</label>
            <input type="email" name="email" placeholder="Email">
            <label>Password</label>
            <input type="password" name="password" placeholder="Password">
            <label>Confirm Password</label>
            <input type="password" name="confirm_password" placeholder="Confirm Password">
            <button class="button" name="submit" >Submit</button>
        </form>
        <p>By clicking the Sign Up button, you agree to our <br>
        <a href="#">Terms and Condition</a> and <a href="#">Policy And Privacy</a></p>
    </div>
    <p class="para-2">Already have an account? <a href="log_in.php">Login Here</a></p>
    <script>
        let eyeicon = document.getElementById("eyeicon");
        let password = document.getElementById("password");
        
        eyeicon.onclick = function(){
            if(password.type == "password"){
                password.type = "text";
                // eyeicon.src ="icon/eye-open.png";
            }
            else{
                password.type = "password";
                // eyeicon.src = "icon/eye-close.png";
            }
        }
        
    </script>
</body>
</html>