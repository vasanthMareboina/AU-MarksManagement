<?php
  $array = array(
    "O" => 10,
    "A+" => 9,
	"A" => 8,
	"B+" => 7,
	"B" => 6,
	"C" => 5,
	"P" => 4,
	"F" => 0
);
  $con=mysqli_connect("localhost","root","","college");
  if(!$con)
  {
	  echo 'error';
  }
  $sql="SELECT * FROM credits_map";
  $r=$con->query($sql);
  $sum=0;
  $i=0;
  $row = $r->fetch_assoc();
  $s1=$row["Credits"];
  $row = $r->fetch_assoc();
  $s2=$row["Credits"];
  $row = $r->fetch_assoc();
  $s3=$row["Credits"];
  $row = $r->fetch_assoc();
  $s4=$row["Credits"];
  $row = $r->fetch_assoc();
  $s5=$row["Credits"];
  $row = $r->fetch_assoc();
  $s6=$row["Credits"];
  $row = $r->fetch_assoc();
  $s7=$row["Credits"];
  $row = $r->fetch_assoc();
  $s8=$row["Credits"];
  
  $sql = "SELECT * FROM marks";
  $result = $con->query($sql);
  $sum=$s1+$s2+$s3+$s4+$s5+$s6+$s7+$s8;
 if ($result->num_rows > 0) {
   while($row = $result->fetch_assoc()) {
    $user=$row["userid"];
	$credit=0;
	$credit=$credit+($array[$row["Mathematics1"]]*$s1);
	$credit=$credit+($array[$row["Mathematics2"]]*$s2);
	$credit=$credit+($array[$row["CPNM"]]*$s3);
	$credit=$credit+($array[$row["Chemistry"]]*$s4);
	$credit=$credit+($array[$row["English"]]*$s5);
	$credit=$credit+($array[$row["HST"]]*$s6);
	$credit=$credit+($array[$row["CPNM_Lab"]]*$s7);
	$credit=$credit+($array[$row["Chemistry_Lab"]]*$s8);
	$CGPA=$credit/$sum;
	echo "<Strong>"."CREDITS:"."</strong>".$credit."<br>";
	echo "<Strong>"."SUM:"."</strong>".$sum."<br>";
	echo "<Strong>"."CGPA:"."</strong>".$CGPA."<br>"."<br>"."<br>"."<br>";
	$q="UPDATE marks SET CGPA='$CGPA' where userid='$user'";
	if($con->query($q)){
	}
  }
}
?>
