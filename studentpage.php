<?php include('home2.php'); ?>
<head>
<style>
*{padding:0;margin:0px}
html
{
background-image:url(v3.jpeg);
background-size:100%100%;
}
.connect1
{
width:100%;
height:100px;
background:#262626;
opacity:0.8;
border-bottom:4px solid #E50303;
margin-left:0px;
box-shadow:0 15px 10px rgba(0,0,0,.6);
}
h1
{
padding:15px 0px 0px 70px;
font-style:times new roman;
color:#ffff;
font-style:bold;
font-size:50px;
}
</style>
</head>
<body>

<div align="center">
<?php
	session_start();
	if($_SESSION['sid']==session_id())
	{
		echo "<h1>Welcome to you</h2><br>";
		echo "<a href='studentpage.php'></a>";
		echo "<a href='logout.php'>logout</a>";
	}
	else
	{
		header("location:login1.php");
	}
?>
<form action="" method="POST">
<h4>ENTER THE SEMISTER NUMBER FOR WHICH YOU NEED MARKS</h4>
<br>
<input type="text" name="id" placeholder="Enter regno"><br>
<select>
  <option value="first sem">One</option>
  <option value="second sem">Two</option>
  <option value="three sem">Three</option>
  <option value="fourth sem">Four</option>
  <option value="fifth sem">Five</option>
  <option value="sixth sem">Six</option>
  <option value="seventh sem">Seven</option>
  <option value="eigth sem">Eight</option>
</select>&nbsp&nbsp
<input type="submit" value="submit">
</form>
</div>
</body>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
 if (empty($_POST["id"])) {
        $useriderr = "Missing";
    }
    else {
        $userid = trim($_POST["id"]);
		
    }
	 $conn=mysqli_connect("localhost","root","","college");
	 $sql="select * from marks  where userid='$userid'" ;
	 $result=mysqli_query($conn,$sql);
   if ($result->num_rows > 0) {
    // output data of each row
	//header("location:markslist.php");
    while($row = $result->fetch_assoc()) {
        echo "Registerno: " . $row["userid"]. " <br><br> Mathematics1: " . $row["Mathematics1"]. "<br> Mathematics2 " . $row["Mathematics2"].  " <br> CPNM: " . $row["CPNM"].
		" <br> Chemistry: " . $row["Chemistry"]. " <br> CPNM_Lab: " . $row["CPNM_Lab"].  " <br> Chemistry_Lab: " . $row["Chemistry_Lab"].
		" <br><br> CGPA: " . $row["CGPA"]."<br>";
    }
} else {
    echo "0 results";
}
$conn->close();
}