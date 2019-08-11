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
<button id="btnchat" type="button" onclick="document.getElementById('webchat').style.display='flex'" >Chat</button>
<div id="webchat" role="main">
<span onclick="document.getElementById('webchat').style.display='none'" class="close" title="Close Modal">&times;</span>

<script src="https://cdn.botframework.com/botframework-webchat/latest/webchat.js"></script>
<script>
name= document.getElementById('name')
   window.WebChat.renderWebChat(
      {
         directLine: window.WebChat.createDirectLine({
            token: 'lVl2lZ9Qqe4.ITg75j-DcagdpLIzopScDbbGrsbvuK_P79DGMiLFdA0'
         }),
      
         userID: 'YOUR_USER_ID',
         username: 'Web Chat User',
         locale: 'en-US',
         botAvatarInitials: 'bot',
         userAvatarInitials: 'user'
      },
      document.getElementById('webchat')
   );
</script>       
</div>
<div id="advert">



</div>
<div id="webchat" role="main" style="width:50%">

<script src="https://cdn.botframework.com/botframework-webchat/latest/webchat.js"></script>
<script>
name= document.getElementById('name')
   window.WebChat.renderWebChat(
      {
         directLine: window.WebChat.createDirectLine({
            token: 'lVl2lZ9Qqe4.ITg75j-DcagdpLIzopScDbbGrsbvuK_P79DGMiLFdA0'
         }),
      
         userID: 'YOUR_USER_ID',
         username: 'Web Chat User',
         locale: 'en-US',
         botAvatarInitials: 'bot',
         userAvatarInitials: 'user'
      },
      document.getElementById('webchat')
   );
</script>


 
</div>

</body>

</html>

_END;

$query  = "SELECT * FROM feeds";
$result = $conn->query($query); 
 if (!$result) die("Fatal Error");
$rows = $result->num_rows;
for ($j = 0 ; $j < $rows ; ++$j) 
 {   
 $row = $result->fetch_array(MYSQLI_ASSOC);
  echo '<p style="color: black;">'.'Posted by: '   . htmlspecialchars($row['fname']). '<br>'; 
  echo 'Topic: '    . htmlspecialchars($row['topic']) .'<p>'   . '<br>';   
  echo '<p>'.'Article: '     . htmlspecialchars($row['feed']).'<p>'     . '<br><br>';  }
$result->close();  $conn->close();
?>