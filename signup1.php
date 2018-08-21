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
h3{
	margin-top:40px;
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
.input label{
	color:black;
	font-size:20px;
	font-family:times new roman;
	font-style:bold;
	padding-left:15px;
}
.input input
{
	width:400px;
	margin-top:15px; 
	margin-left:10px;
	height:35px;
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
	margin-top:30px;
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
<center><h3>Sign up!</h3></center>
<form action="" method="POST" >

	  <div class="input">
	  <label> EnterId:</label>
    <input type="text" placeholder="Enter your id" name="userid" required>
	</div>
	<div class="input">
	  <label> Password::</label>
	<input type="password" placeholder="Enter Password" name="psw" required></div>
	<div class="input">
	 <label> Confirm Password:</label>
	<input type="password" placeholder="Repeat Password" name="rpsw" required>
	</div>
	<div class="radio">
	<input type="radio" name="usertype" value="student" > Student
     <input type="radio" name="usertype" value="staff"> Staff
    <input type="radio" name="usertype" value="admin"> Admin<br><br>
    </div>
      <button type="submit" class="cancelbtn" style="background:black;color:white;">Cancel</button>
      <button type="submit" value="signup" style="background:black;color:white;">Signup</button>

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
        $userid = test_input($_POST["userid"]);
    }
  if (empty($_POST["psw"])) {
    $pswderr = "Password is required";
	echo "$pswderr";
  } else {
    $pswd = test_input($_POST["psw"]);
  }
  
   if (empty($_POST["rpsw"])) {
    $pswd1err = "Password is required";
  } else {
    $pswd1 = test_input($_POST["rpsw"]);
  }
 if (empty($_POST["usertype"])) {
    $usertypeErr = "usertype is required";
  } else {
    $usertype = ($_POST["usertype"]);
  }
 
 $conn=mysqli_connect("localhost","root","","college");
  
 
  
     if($pswd == $pswd1){
		 
		 if($usertype == "staff")
		 {
			  $sql="select * from staffsignup where userid='$userid'";
  if(mysqli_fetch_assoc(mysqli_query($conn,$sql))){
     echo"<br><br>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;userid already exits"; 
  }
      $sql1 = "INSERT INTO staffsignup (userid, password) VALUES ('$userid', '$pswd')";
		 }
         else {
			 $id=(double)$userid;
			 if($id<31517571001||$id>315175710250)
			 {
				  echo"<br><br>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;userid invalid"; 
			 }
			  $sql="select * from signup where userid='$userid'";
  if(mysqli_fetch_assoc(mysqli_query($conn,$sql))){
     die("<br><br>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;userid already exits"); 
  }
			 $sql1 = "INSERT INTO signup (userid, password) VALUES ('$userid', '$pswd')";
		 }
     mysqli_query($conn,$sql1);
	 echo "&emsp;&emsp;&emsp;&emsp;$usertype";
      echo "&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Success";
      }
      else{
          $pswdErr1="<br><br>&emsp;&emsp;&emsp;passwords not matched";
		  echo "$pswdErr1";
      }
  
  
  
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
 </div>
 </body>
 </html>