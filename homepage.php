<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Search</title>
</head>
<style>
  #search{
    float:left;
    width:250px;
    height:350px;
    background-color:white;
    box-shadow: 5px 10px 18px #888888;
    margin-top: 200px;
    margin-left: 30px;
  }
</style>
<body style="background-image: url('bookPen.jpg');background-repeat: no-repeat;  
background-size: cover">
    <h1 style="text-align: center; color:white">CRIMINOLOGY</h1>
    <nav></nav>
    <div class="container">
    <form action="" method="POST" id="search" >
        <br><label style="margin-left:15px;">Search by criminal id:</label><br><br>
        <input type="search" name="key" placeholder="Enter the search key" 
            style="width:150px;height:25px;margin-left:15px;"><br><br>
          <input type="radio" name="s_key" value="Criminal id" 
            style="width:20px;height:20px;margin-left:15px;">Criminal id<br>
          <br><input type="radio" name="s_key" value="Crime id" 
            style="width:20px;height:20px;margin-left:15px;">Crime id<br>
          <br><input type="radio" name="s_key" value="Fir id"
            style="width:20px;height:20px;margin-left:15px;">Fir id<br>    
          <br><input type="radio" name="s_key" value="Name"
            style="width:20px;height:20px;margin-left:15px;">Name<br><br>    
          <div class="container" style="margin-left:60px">
          <button type="submit" name="submit" style="width:100px;height:30px;">Submit</button>
          </div>
    </form> <br><br>
    </div>
</body>
</html>

<?php
session_start();
$server_name = "localhost";
$username = "";
$password = "";
$dbname = "test";
$conn =  mysqli_connect($server_name, $username,$password,$dbname)or die(Mysqli_error());
$select_db = mysqli_select_db($conn,$dbname)or die(mysqli_error($conn));
    //$sql="SELECT * FROM $tbl_name";
    //$result=mysqli_query($conn, $sql) or die(mysqli_error($conn));
        //  for search in criminal_rec 
  //$key=$_POST['key'];
  if(isset($_POST['s_key']) && isset($_POST['key'])){
if($_POST['s_key']=="Criminal id")
{
   $key = $_POST['key'];
    $q = "SELECT * FROM criminal_record WHERE criminal_id='$key'";
    $result_tuples = $conn->query($q) or die(mysqli_error($conn));
    if($result_tuples->num_rows > 0)
    {
        while($row = mysqli_fetch_assoc($result_tuples)) {
         echo  "<center><h4 style='color:white'>Criminal ID: " . $row['Criminal_id'].
          "&nbsp &nbsp &nbsp Name: " . $row["Name"];
          echo "&nbsp &nbsp Address: "
          . $row["P_Address"] ;
         echo "&nbsp &nbsp &nbsp Alias name:" .$row["Alias_name"] ."<br></h3></center>";
    } }
    else{
      echo "<center><h3 style='color:white'>Could not fetch records for given ID...</h3></center>";
    }
  }
else if($_POST['s_key']=="Crime id" )
{
  $key=$_POST['key'];
    $q="SELECT * FROM crime_record WHERE crime_id='$key'";
    $result_tuples = mysqli_query($conn,$q) or die(mysqli_error($conn));
    $ret=mysqli_num_rows($result_tuples);
    if($ret>0)
    {
        while($row = mysqli_fetch_assoc($result_tuples)) {
         echo  "<center><h3 style='color:white'><B>Criminal ID:<B> " . $row['Criminal_id'].
          "&nbsp &nbsp<B>Crime Id:</B> " . $row["crime_id"].
          "&nbsp &nbsp<B>station:</B> "
          . $row["station"]. "&nbsp &nbsp<B>Type of Crime:</B>". $row['type_of_crime']  .
          "&nbsp &nbsp <B>FIR ID :</B>". $row['fir_id'] ."<br></h3></center>";
    }}
    else{
      echo "<center><h2 style='color:white'>Could not fetch records for given ID...";
    }
}
else if($_POST['s_key']=="Fir id"){
 $key=$_POST['key'];
  $q="SELECT * FROM fir WHERE fir_id='$key'";
  $result_tuples = mysqli_query($conn,$q) or die(mysqli_error($conn));
  $ret=mysqli_num_rows($result_tuples);
  if($ret>0)
  {
      while($row = mysqli_fetch_assoc($result_tuples)) {
       echo  "<center><h3 style='color:white'><B>FIR ID :<B> " . $row['fir_id'].
       "&nbsp &nbsp<B>Station :</B> " . $row["station"].
        "&nbsp &nbsp<B>Complaint's name :</B> " . $row["c_name"].
        "&nbsp &nbsp<B>Contact number :</B> " . $row["c_num"].
        "&nbsp &nbsp<br><B>Place :</B> "
        . $row["place"]. "&nbsp &nbsp<B>Time :</B>". $row['c_time']  .
        "&nbsp &nbsp<B>Date :</B>". $row['c_date'] ."<br></h3></center>";
  }}
    else{
    echo "<center><h2 style='color:white'>Could not fetch the records for given ID...";
  }
}
else if($_POST['s_key']=="Name"){
  $key=$_POST['key'];
  $q = "SELECT * FROM criminal_record WHERE Alias_name = '$key'";
   $result_tuples = mysqli_query($conn,$q) or die(mysqli_error($conn));
   $ret=mysqli_num_rows($result_tuples);
   if($result_tuples->num_rows > 0)
   {
       while($row = mysqli_fetch_assoc($result_tuples)) {
        echo  "<center><h4 style='color:white'>Criminal ID: " . $row['Criminal_id'].
         "&nbsp &nbsp &nbsp Name: " . $row["Name"];
         echo "&nbsp &nbsp Address: "
         . $row["P_Address"] ;
        echo "&nbsp &nbsp &nbsp Alias name:" .$row["Alias_name"] ."<br></h3></center>";
   } }
   else{
     echo "<center><h3 style='color:white'>No criminal records for given name...</h3></center>";
   }
 }
}
Mysqli_close($conn);
?>
