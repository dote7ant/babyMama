<?php
   include('db.php');
   $conn = new mysqli($hn, $un, $pw, $db);
   if ($conn->connect_error) die("Fatal Error");
   session_start();
   
   $user_check = $_SESSION['login_user'];
   
   $ses_sql = mysqli_query($conn,"select username from usermum where username = '$user_check' ");
   
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC) or die( mysqli_error($conn));;
   
   $login_session = $row['username'];
   
   if(!isset($_SESSION['login_user'])){
      header("location:index.php");
      die();
   }
?>