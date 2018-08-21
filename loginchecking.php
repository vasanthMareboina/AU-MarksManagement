<?php
// define variables and set to empty values
$useriderr = $pswderr = $pswd1err = $paswdErr = "";
$userid = $pswd = $pswd1 = $usertype = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
 if (empty($_POST["userid"])) {
        $useriderr = "Missing";
    }
    else {
        $userid = $_POST["userid"];
    }
  if (empty($_POST["password"])) {
    $pswderr = "Password is required";
	echo "$pswderr";
  } else {
    $pswd = ($_POST["password"]);
  }
  if (empty($_POST["usertype"])) {
    $usertypeErr = "usertype is required";
  } else {
    $usertype = ($_POST["usertype"]);
  }
 
 $conn=mysqli_connect("localhost","root","","college");
if($usertype == "staff"){
	$sql="select password from staffsignup where userid='$userid'";
	if(mysqli_query($conn,$sql))
	{
		echo "<br><br>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;invalid userid";
	}
	$pswd1=mysqli_query($conn,$sql);
	if($pswd == '$pswd1')
{	
	session_start();
	$_SESSION['sid']=session_id();
	header("location:staffpage.php");
}
else
{
	echo "<br><br>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;userid and password not matches";
}
}
else{
	$sql="select password from signup where userid='$userid'";
	if(mysqli_query($conn,$sql))
	{
		echo "<br><br>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;invalid userid";
	}
	$pswd1=mysqli_query($conn,$sql);
	
	if($pswd == '$pswd1')
{	
	session_start();
	$_SESSION['sid']=session_id();
	header("location:studentpage.php");
}
else
{
	echo "<br><br>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;userid and password not matches";
}
}
}
?>