<?php

require_once 'db.php'; 
$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error) die("Fatal Error");


if (isset($_POST['emp'])   && isset($_POST['topic']) && isset($_POST['fname']) && isset($_POST['feed']))
  {
$emp   = get_post($conn, 'emp');
$topic  =get_post($conn, 'topic');
$fname  = get_post($conn, 'fname');
$feed   =get_post($conn, 'feed');

$query    = "INSERT INTO `feeds`(`fname`, `topic`, `empID`, `feed`) VALUES 
('$fname', '$topic', '$emp','$feed')";

if ($conn->query($query)==TRUE)
{
  echo "successful!!!";
}
else
{
  echo"Error!" .$query. "<br>". $conn->error;
}

$conn->close();
}  
  
 function get_post($conn, $var) 
{
return $conn->real_escape_string($_POST[$var]);  
} 



echo <<<_END
<!DOCTYPE html>
<html>

<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Home</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>



<link rel="stylesheet" href="stylesheets/style.css">
<link rel="stylesheet" href="stylesheets/home.css">
<script src="https://cdn.botframework.com/botframework-webchat/latest/botchat.js"></script>

<link href="https://cdn.botframework.com/botframework-webchat/latest/botchat.css" rel="stylesheet" />



</head>

<body style="background: #003333; color:white;">
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
         <li class="active"><a href="#">Home</a></li>
      <li><a href="profile.php">Profile</a></li>
      <li><a href="about.html">About us</a></li>
      <li><a href="contact.html">Contact us</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
       <li><a href="profile.html"><span class="glyphicon glyphicon-user"></span> My profile</a></li>
      <li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Log out</a></li>
      </ul>
    </div>
  </div>
</nav>
</div>
<div id="content">
<form action="docs.php" method="POST">
<fieldset>
<legend>Write an article</legend>
<ol style="list-style: none;">
<li><label for="empID:">Enter employee number:</label><br><input type="text" name="emp" id="empID"></li><br>
<li><label for="topic:">Topic: </label><br><input type="text" name="topic" id="topic"></li><br>
<li><label for="Fname:">Your name:</label><br><input type= "text" name="fname" id="fname"></li><br>
<li><label for="feed:">Article:</label><br><input type="textarea" name="feed" id="feed" maxlength="3000"></li><br>
</ol>
<input type="submit" name="submit" value="SUBMIT">


</fieldset>
</form>
    </div>

</body>

</html>

_END;
?>