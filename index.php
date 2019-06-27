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


$query    = "INSERT INTO usermum (Mname, nationalID, username, DOB, pwd, dp, bloodG, nok, email, Tel)
 VALUES ('$name', '$id', '$user ', '$dob', '$pwd', '$dp', '$blood', '$nok', '$email', '$tel', )"; 
if ($conn->query($query)==TRUE)
{
  echo "New record created successfully";
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
	<title>Welcome</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!--Custom styles-->
	<link rel="stylesheet" type="text/css" href="index.css">

	<style>
#info
{
	width:100%;
	left:0%;
	display:flex;
}
#cont
{
    width: 50%;
    display:flex;
    flex-direction:row;
    border
}
#add1
{
    width:50%;
    border: 2px solid black ;
}
#add2
{
    width:50%;
    border:2px solid black;
}

	</style>
</head>

<body>
<h2 style="text-align:center, font-family:monospace;">BabyMama</h2><br>
<div id="info">

<div id="cont">
<div id="add1">
<p id="add">
<ol>
<li>Address: Silicon Valley str.26-27 cave avenue</li><br>
<li>Email: terminalschools@gmail </li><br>
<li>Phone: +1 612 387 456</li>
</ol>
</p>
</div>

<div id="add2">
<p id="add">
<ol>
<li>Address: Silicon  str.26-27 Switzerland</li><br>
<li>Email: terminalschools@gmail </li><br>
<li>Phone: +44 612 387 456</li>
</ol>
</p>
</div>
</div>
<div class="container" id="login">
	<div class="d-flex justify-content-center h-100">
		<div class="card">
			<div class="card-header">
				<h3>Sign In</h3>
				<div class="d-flex justify-content-end social_icon">
					<span><i class="fab fa-google-square"></i></span>
				</div>
			</div>
			<div class="card-body">
				<form action="login.php" method="POST">
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-user"></i></span>
						</div>
						<input type="text" class="form-control" placeholder="username" name="username">
						
					</div>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-key"></i></span>
						</div>
						<input type="password" class="form-control" placeholder="password" name="pass">
					</div> 
					<div class="row align-items-center remember">
						<input type="checkbox">Remember Me
					</div>
					<div class="form-group">
						<input type="submit" value="Login" style="border-radius: 8px; ">
                    </div>
                    <p style="color: white;">Don't have an account? &nbsp;<button id="btnsign" onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Sign Up</button>
					<br><a href="#">Forgot your password?</a><p>
				</form>
			</div>
			
				
		
		</div>
	</div>

	<div id="id01" class="modal">
	<span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
	<p style="color: white; text-align: center; padding: 15px"> SIGN UP AS A DOCTOR OR AS A MOTHER!</p><br>
                <div class="clearfix">
                    <button id="docbtn" type="button" onclick="document.getElementById('DOC').style.display='block'" >Doctor</button>
                   <br> <button id="mombtn" type="button" onclick="document.getElementById('MOM').style.display='block'">Mother</button>
                </div>
            </div>
        </form>
    </div>
</div> 
<div id="DOC">
<span onclick="document.getElementById('DOC').style.display='none'" class="close" title="Close Modal">&times;</span>
<form name="myForm" action="doc.php" method="POST">
<fieldset>
<legend style="color: white; text-align: center;" >Register as a Doctor</legend>
<P style="color: white; text-align: center;">Enter your details here</p>
<ol style="list-style: none;">
<li><label for="ID_number:">National ID: </label><input type="text" name="id" id="nationalID"></li><br><p id="idn"> </P>
<li><label for="Name">NAME: </label> <input type="text" name="Fname" id="Name"></li><br><p id="idfname"> </P>
<li><label for="empID">Employee ID: </label> <input type="text" name="empID" id="empID"></li><br><p id="idemp"> </P>
<li><label for="HOS">Hospital name :</label><input type="text" name="hospital"  id="HOS" ></li><br>
<li><label for="FOS">Field of Specialisation: </label> <input type="text" name="FOS" id="FOS"></li><br>
<li><label for="phone">PHONE NUMBER: </label><input type="tel" name="telephone" id="phone"></li><br>
<li><label for="email">EMAIL ADDRESS: </label><input type="email" name="email" id="email"></li><br>
<li><label for="pwd">password: </label><input type="password" name="pass" id="pwd"></li><br>
</ol>
<input type="submit" name="submit" id="submit" value="SUBMIT"> &nbsp;&nbsp;<input type="reset" name="reset" id="reset" value="RESET FORM">
</fieldset>
</form>
</div>
<div id="MOM">
<span onclick="document.getElementById('MOM').style.display='none'" class="close" title="Close Modal">&times;</span>
<form name="myForm" action="mom.php" method="POST">
<fieldset>
<legend style="color: white; text-align: center;">Register as a Mother</legend>
<P style="color: white; text-align: center;">Enter your details here</p>
<ol style="list-style: none;">
<li><label for="ID_number">National ID: </label><input type="text" name="id" id="nationalID"></li><br><p id="idn"> </P>
<li><label for="Name">NAME: </label> <input type="text" name="Fname" id="Mname"></li><br><p id="idfname"> </P>
<li><label for="Username">Username: </label> <input type="text" name="username" id="username" placeholder="Select a username!"></li><br><p id="idemp"> </P>
<li><label for="pwd">password: </label><input type="password" name="pass" id="pwd"></li><br>
<li><label for="blood">Blood Group:</label><input type="text" name="blood"  id="bloodG" ></li><br>
<li><label for="phone">PHONE NUMBER: </label><input type="tel" name="telephone" id="phone"></li><br>
<li><label for="email">EMAIL ADDRESS: </label><input type="email" name="email" id="email"></li><br>
<li><label for="nok">tel of Next of Kin:</label><input type="tel" name="nok" id= "nok"></li><br>
<li><label for="DOB">Date Of Birth:</label><input type="date" name="DOB" id= "DOB" value="2019/03/22"></li><br>
<li><label for="dp"> UPLOAD profile picture:</label><input type="file" name="dp" id="dp"></li><br>

</ol>
<input type="submit" name="submit" id="submit" value="SUBMIT"> &nbsp;&nbsp;<input type="reset" name="reset" id="reset" value="RESET FORM">
</fieldset>
</form>
</div>
</div>
</body>
</html>

_END;
?>