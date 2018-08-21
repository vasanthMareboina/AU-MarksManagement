<?php include('home2.php'); ?>
<div align="center">
<?php
	session_start();
	if($_SESSION['sid']==session_id())
	{
		
		echo "<a href='studentpage.php'></a>";
		echo "<a href='logout.php'>logout</a>";
	}
	else
	{
		header("location:login1.php");
	}
?>

<form action="" method="POST">
<h5>Select semister number and enter student register number  for whom you need marks</h5><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="text" name="stdid" placeholder="register no">
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
<input type="button" value="submit">
<br><br><br><br>&nbsp;&nbsp;&nbsp;
<h5>Enter students register numbers range to get all students SGPA</h5><br><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="text" name = "startno" placeholder="starting regno">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name = "endno" placeholder="ending regno">
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type ="text" name ="minsgpa" placeholder="enter min SGPA you need" size="25">&nbsp;&nbsp;&nbsp;<input type="button" value="submit">
</form>
</div>
<?php
$userid=" ";
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
<script language="javascript">
    window.location.href = "markslist.php"
</script>
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

