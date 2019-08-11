<?php
include('session.php');
 require_once 'db.php'; 
 $conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error) die("Fatal Error");


echo <<<_END
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>My profile</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="stylesheets/home.css">
</head>
<body style="background: #003333;">
<div id="main">
<div id="nav">
<nav class="navbar navbar-inverse" > 
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span> 
      </button>
      <a class="navbar-brand" href="home.html">BabyMama</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
         <li><a href="home.php">Home</a></li>
      <li class="active"><a href="#">Profile</a></li>
      <li><a href="about.html">About us</a></li>
      <li><a href="contact.html">Contact us</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
       <li><a href="profile.php"><span class="glyphicon glyphicon-user"></span> My profile</a></li>
      <li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Log out</a></li>
      </ul>
    </div>
  </div>
</nav>
</div>


</div>
</body>
</html>

_END;
?>
