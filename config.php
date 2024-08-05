<?php 

//Host
$host = "localhost";

//dbname
$dbname = "auth-sys";

//user
$user = "chrislocal";

//pass
$pass = "password123";

//connection using PDO
$conn = new PDO("mysql:host=$host;dbname=$dbname;", $user, $pass);

if($conn == true) {
    //echo "It is working perfectly";
} else {
    echo "Connection incorrectly configured: Error";
}

?>