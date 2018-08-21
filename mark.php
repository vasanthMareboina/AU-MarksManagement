<?php
$con=mysqli_connect("localhost","root","","college");
if(!$con)
{
echo "unsucessful";
}
else
{
echo "success";
}
$sql="SELECT * FROM marks";
$result=mysqli_query($con,$sql);


$count=mysqli_num_rows($result);

if ($count>=1) {
    echo "<script> window.location.assign('calculation.php'); </script>";
} 
else {
    echo "<script> window.location.assign('index.php'); </script>";
}



?>