<?php
    
$server_name = "localhost";
$username = "root";
$password = "";
$dbname = "test";
$conn =  mysqli_connect($server_name, $username,$password,$dbname)or die(Mysqli_error());
$sql = "CALL `adminDisplay`()";
$result_tuples = $conn->query($sql) or die(mysqli_error($conn));

if($result_tuples->num_rows > 0)
{
    while($row = mysqli_fetch_assoc($result_tuples)) {
     echo  "<center><h4 style='color:black'>Username: " . $row['username']."&nbsp &nbsp Mail id:". $row['mail_id'].
     " </h4></center>";
     } }
else{
  echo "<center><h3 style='color:red'>Could not fetch records for given ID...</h3></center>";
}
?>