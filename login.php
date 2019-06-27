<?php
 require_once 'db.php'; 
 $conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error) die("Fatal Error");
session_start();

if (isset($_POST['username']) && isset($_POST['pass']))
{
 $user  =  mysqli_real_escape_string($conn, $_POST['username']);
 $pass  =  mysqli_real_escape_string($conn, $_POST['pass']); 

 $query = "SELECT * FROM `usermum` WHERE username ='$user' AND pwd = '$pass'";
 $result = mysqli_query($conn, $query) or die( mysqli_error($conn));
 $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
 $active=$row['active'];
 

 $count = mysqli_num_rows($result);

 if($count == 1) 
 {
    session_name("username");
    $_SESSION['login_user'] = $user;
    
    header("location: home.php");
 }
 else 
 {
   header("location: index.php");
    $error = "Your Login Name or Password is invalid";

 }
}


?>