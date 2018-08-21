<?php include('home2.php'); ?>
<html>
<head>
<style>
*{padding:0;margin:0px}
html
{
background-image:url(v3.jpeg);
background-size:100%100%;
}
h4{
	margin-top:10px;
	font-family:times;
	font-size:35px;
	font-style:bold;
	color:white;
}
form{
	width:450px;
	margin:40px auto;
	background:white;
	border-radius:10px;
}
.input{
	padding-top:15px;
}
.input label{
	color:black;
	font-size:22px;
	font-family:times new roman;
	font-style:bold;
	padding-left:10px;
}
.connect1
{
width:100%;
height:100px;
background:black;
border-bottom:4px solid white;
margin-left:0px;
box-shadow:0 15px 10px rgba(0,0,0,.6);
}
h1
{
padding:15px 0px 0px 70px;
font-style:times new roman;
color:white;
font-style:bold;
font-size:50px;
}
.id{
	font-size:30px;
	color:#E50303;
}
.input input
{
	width:400px;
	margin-top:15px; 
	margin-left:10px;
	height:30px;
	border:1px solid #262626;
	border-radius:10px;
}
.radio{
	font-size:22px;
	font-width:20px;
	font-family:times new roman;
	font-style:bold;
}
.radio input{
	margin-left:50px;
	margin-top:20px;
}
button[type="submit"]
{
margin:10px 0px 25px 40px;	
outline:none;
border:none;
height:45px;
width:150px;
color:black;
font-size:20px;
border:2px solid black;
background:white;
cursor:pointer;
font-weight:bold;
font-family:times new roman;
border-radius:10px;
}
 button[type="submit"]:hover
{
background:black;
color:white;
opacity:0.8;
}
</style>
</head>
<body>
<div>
 <center> <h4>Login to Your Account</h4></center><br>
				  <form action="login2.php" method="POST">
				  <div class="input">
				  <label>Username:</label><br/>
					<input type="text" name="userid" placeholder="Username" ><br/><br/></div>
					<div class="input">
					<label>Password:</label><br/>
					<input type="password" name="password" placeholder="Password"><br/><br/></div>
					<div class="radio">
					<input type="radio" name="usertype" value="student">Student
                    <input type="radio" name="usertype" value="staff" >Staff
                    <input type="radio" name="usertype" value="admin" >Admin<br><br></div>
					<button type="submit" name="login" class="login loginmodal-submit" style="background:black;color:white;">Login</button>
					<button type="submit" formaction="signup1.php"  width="30" height="10" style="background:black;color:white;">SignUp</button>
				  </form>

<?php
// define variables and set to empty values
$useriderr = $pswderr = $pswd1err = $paswdErr = "";
$userid = $pswd = $pswd1 = $usertype = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
 if (empty($_POST["userid"])) {
        $useriderr = "Missing";
    }
    else {
        $userid = trim($_POST["userid"]);
		
    }
  if (empty($_POST["password"])) {
    $pswderr = "Password is required";
	echo "$pswderr";
  } else {
    $pswd = trim($_POST["password"]);
  }
  if (empty($_POST["usertype"])) {
    $usertypeErr = "usertype is required";
  } else {
    $usertype = ($_POST["usertype"]);
  }
   $conn=mysqli_connect("localhost","root","","college");
  if($usertype == "admin")
  {
	  $sql="select * from admin u where u.userid='$userid' and u.password='$pswd'";
$a = mysqli_query($conn,$sql);
	$row = mysqli_num_rows($a);

	if($row != 1)
	{
		echo "<br><br>&emsp;&emsp;&emsp;userid and password not matched";
		//echo $a;
	}
	else 
{	
    echo "SUCCESS";
	session_start();
	$_SESSION['sid']=session_id();
	header("location:adminpage.php");
}
  }

if($usertype == "staff"){
	$sql="select * from staffsignup u where u.userid='$userid' and u.password='$pswd'";
$a = mysqli_query($conn,$sql);
	$row = mysqli_num_rows($a);

	if($row != 1)
	{
		echo "<br><br>&emsp;&emsp;&emsp;userid and password not matched";
		
	}
	else 
{	
    echo "SUCCESS";
	session_start();
	$_SESSION['sid']=session_id();
	header("location:staffpage.php");
}
}
else{
	$sql="select * from signup u where u.userid='$userid' and u.password='$pswd'";
$a = mysqli_query($conn,$sql);
	$row = mysqli_num_rows($a);

	if($row != 1)
	{
		echo "<br><br>invalid userid";
		//echo $a;
	}
	else 
{	
    echo "SUCUSS";
	session_start();
	$_SESSION['sid']=session_id();
	header("location:studentpage.php");
}
}
}

?>
</div>
</body>
</html>