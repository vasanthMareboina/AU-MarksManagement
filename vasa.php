

<!DOCTYPE html>
<html>
<title>Students Marks management</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-black.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
html,body,h1,h2,h3,h4,h5,h6 {font-family: "Roboto", sans-serif;}
.w3-sidebar {
  z-index: 3;
  width: 250px;
  top: 43px;
  bottom: 0;
  height: inherit;
}
</style>
<body>

<!-- Navbar -->
<div class="w3-top">
  <div class="w3-bar w3-theme w3-top w3-left-align w3-large">
    <a class="w3-bar-item w3-button w3-right w3-hide-large w3-hover-white w3-large w3-theme-l1" href="javascript:void(0)" onclick="w3_open()"><i class="fa fa-bars"></i></a>
    <a href="home1.php" class="w3-bar-item w3-button w3-theme-l1">HOME</a>
   <!-- <a href="#" class="w3-bar-item w3-button w3-hide-small w3-hover-white">About</a>
    <a href="#" class="w3-bar-item w3-button w3-hide-small w3-hover-white">Values</a>
    <a href="#" class="w3-bar-item w3-button w3-hide-small w3-hover-white">News</a>
    <a href="#" class="w3-bar-item w3-button w3-hide-small w3-hover-white">Contact</a>
    <a href="#" class="w3-bar-item w3-button w3-hide-small w3-hide-medium w3-hover-white">Clients</a>
    <a href="#" class="w3-bar-item w3-button w3-hide-small w3-hide-medium w3-hover-white">Partners</a>-->
  </div>
</div>

<!-- Sidebar -->
<nav class="w3-sidebar w3-bar-block w3-collapse w3-large w3-theme-l5 w3-animate-left" id="mySidebar">
  <a href="javascript:void(0)" onclick="w3_close()" class="w3-right w3-xlarge w3-padding-large w3-hover-black w3-hide-large" title="Close Menu">
    <i class="fa fa-remove"></i>
  </a>
  <!--<h4 class="w3-bar-item"><b>Menu</b></h4>-->
  <a class="w3-bar-item w3-button w3-hover-black" href="login">About</a>
  <a class="w3-bar-item w3-button w3-hover-black" href="logout.php">Logout</a>
  <a class="w3-bar-item w3-button w3-hover-black" href="login1.php">Login</a>
  <a class="w3-bar-item w3-button w3-hover-black" href="#">Link</a>
</nav>

<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- Main content: shift it to the right by 250 pixels when the sidebar is visible -->
<div class="Body" style="padding-left:42%;padding-top:200px">
<h1 style="padding-right:50%">Login to Your Account</h1><br>
				  

<html>
<head></head>
<form action="" method="POST" >

  
    <input type="text" placeholder="Enter your id" name="userid" min="315175710001" max="315175710240" required><br>
	<br>

    
    <input type="password" placeholder="Enter Password" name="psw" required><br><br>

    
    <input type="password" placeholder="Repeat Password" name="rpsw" required><br><br>
	<input type="radio" name="usertype" value="student"   > Student
                    &emsp;<input type="radio" name="usertype" value="staff"> Staff
                     &emsp;<input type="radio" name="usertype" value="admin"> Admin<br><br>

      <button type="button" class="cancelbtn">Cancel</button>
      &emsp;<button type="submit" class="signupbtn">Sign Up</button>


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
  if (empty($_POST["psw"])) {
    $pswderr = "Password is required";
	echo "$pswderr";
  } else {
    $pswd = ($_POST["psw"]);
  }
  
   if (empty($_POST["rpsw"])) {
    $pswd1err = "Password is required";
  } else {
    $pswd1 = ($_POST["rpsw"]);
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
     die("<br><br><br><br><br><br><br><br><br>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;userid already exits"); 
  }
      $sql1 = "INSERT INTO staffsignup (userid, password) VALUES ('$userid', '$pswd')";
		 }
         else {
			  $sql="select * from signup where userid='$userid'";
  if(mysqli_fetch_assoc(mysqli_query($conn,$sql))){
     die("<br><br><br><br><br><br><br><br><br>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;userid already exits"); 
  }
			 $sql1 = "INSERT INTO signup (userid, password) VALUES ('$userid', '$pswd')";
		 }
     mysqli_query($conn,$sql1);
	 echo "&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;$usertype";
      echo "&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Success";
      }
      else{
          $pswdErr1="&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;passwords not matched";
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
 
 

</form>
</div>
</body>
</html>

