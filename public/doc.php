<?php
require_once 'db.php'; 
$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error) die("Fatal Error");


if (isset($_POST['id'])   && isset($_POST['Fname']) && isset($_POST['empID']) && isset($_POST['hospital'])  && isset($_POST['FOS'])
  && isset($_POST['telephone'])  && isset($_POST['email']) && isset($_POST['pass']))
  {
$id    = get_post($conn, 'id');
$name  =get_post($conn, 'Fname');
$emp  = get_post($conn, 'empID');
$hos   =get_post($conn, 'hospital');
$fos =get_post($conn, 'FOS');
$tel   =get_post($conn, 'telephone');
$email =get_post($conn, 'email');
$pass   =get_post($conn, 'pass');


$query    ="INSERT INTO userdoc(`Dname`, `nationalID`, `empID`, `hname`, `FOS`, `pwd`, `email`, `Tel`)
 VALUES ('$name', '$id', '$emp', '$hos', '$fos', '$pass', '$email', '$tel')";
if ($conn->query($query)==TRUE)
{
  echo "successful registration, await verification!!!";
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


?>