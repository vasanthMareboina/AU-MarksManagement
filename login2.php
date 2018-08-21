
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