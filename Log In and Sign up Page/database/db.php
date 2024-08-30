<?php
$servername = "localhost";
$username = "root";
$password = "";
$database ="login_db";

$conn = mysqli_connect($servername,$username,$password,$database);

if($conn){
    echo "Connected successfully";
    
}
else{
    echo " Connection failed";
}
?>