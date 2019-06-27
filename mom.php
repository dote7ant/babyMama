<?php
require_once 'db.php'; 
$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error) die("Fatal Error");


 if (isset($_POST['id'])   && isset($_POST['Fname']) && isset($_POST['username']) && isset($_POST['pass'])  && isset($_POST['blood'])
  && isset($_POST['telephone'])  && isset($_POST['email']) && isset($_POST['nok']) && isset($_POST['DOB']) && isset($_POST['dp']))
  {
$id    = get_post($conn, 'id');
$name  =get_post($conn, 'Fname');
$user  = get_post($conn, 'username');
$pwd   =get_post($conn, 'pass');
$blood =get_post($conn, 'blood');
$tel   =get_post($conn, 'telephone');
$email =get_post($conn, 'email');
$nok   =get_post($conn, 'nok');
$dob   =get_post($conn, 'DOB');
$dp    =get_post($conn, 'dp');


$query    = "INSERT INTO usermum(Mname, nationalID, username, DOB, pwd, dp, bloodG, nok, email, Tel)
 VALUES ('$name', '$id', '$user ', '$dob', '$pwd', '$dp', '$blood', '$nok', '$email', '$tel' )"; 
if ($conn->query($query)==TRUE)
{
  echo "New record created successfully";
}
else
{
  echo"Error! " .$query. "<br>". $conn->error;
}
$conn->close();
}
  
 function get_post($conn, $var) 
{
return $conn->real_escape_string($_POST[$var]);  
} 

?>