<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<style>
  #search{
    float:left;
    width:300px;
    height:150px;
    background-color:white;
    box-shadow: 5px 10px 18px #888888;
  }
  #insertion{
    margin-top:180px;
    width:300px;
    height:200px;
    background-color:white;
    box-shadow: 5px 10px 18px #888888;
  }
  #update{
    margin-top:40px;
    width:300px;
    height:200px;
    background-color:white;
    box-shadow: 5px 10px 18px #888888;
  }
</style>
<body style="background-image: url('bookPen.jpg');background-repeat: no-repeat;  
background-size: cover">
      <h1 style="text-align: center; color:white">CRIMINOLOGY</h1>
      <form action="" method="POST" id="search">
          <label>Search by criminal id:</label><br><br>
            <input type="search" name="key" placeholder="Enter the search key" 
            style="width:150px;height:25px;margin-left:5px;"><br><br>
            <input type="submit" name="s_submit" value="submit" style="width:60px;height:30px;margin-left:5px;">
      </form>
      <br>
    <!--  <form id="insertion" >
            <label >Insert information at:</label><br><br>
        <input type="button" name="ins_crime_rec" value="crime_rec" style="width:100px;height:30px;margin-left:5px;">&nbsp<br><br>
        <input type="button" name="ins_fir_rec" value="fir_rec" style="width:100px;height:30px;margin-left:5px;">&nbsp<br><br>        
        <input type="button" name="ins_criminal_rec" value="criminal_rec" style="width:100px;height:30px;margin-left:5px;">&nbsp       
      </form>
      <form id="update" >
            <label >Update information to:</label><br><br>
            <input type="button" name="u_crime_rec" value="crime_rec" style="width:100px;height:30px;margin-left:5px">&nbsp<br><br>
            <input type="button" name="u_fir_rec" value="fir_rec" style="width:100px;height:30px;margin-left:5px">&nbsp<br><br>        
            <input type="button" name="u_criminal_rec" value="criminal_rec" style="width:100px;height:30px;margin-left:5px">&nbsp       
      </form>
-->
</body>
</html>

<?php
session_start();
$server_name = "localhost";
$username = "";
$password = "";
$dbname = "test";
$tbl_name="crime_rec";
$conn =  mysqli_connect($server_name, $username,$password,$dbname)or die(Mysqli_error());
$select_db = mysqli_select_db($conn,$dbname)or die(mysqli_error($conn));
$sql="SELECT * FROM $tbl_name";
$result=mysqli_query($conn, $sql) or die(mysqli_error($conn));
        //  for search in criminal_rec 
if(isset($_POST['s_submit']) && isset($_POST['key']))
{
    $key=$_POST['key'];
    $q="SELECT * FROM crime_rec WHERE criminal_id='$key'";
    $result_tuples = mysqli_query($conn,$q) or die(mysqli_error($conn));
    $ret=mysqli_num_rows($result_tuples);
    if($ret>0)
    {
        while($row = mysqli_fetch_assoc($result_tuples)) {
         echo  "<center><h3 style='color:white'><B>Criminal ID:<B> " . $row['criminal_id'].
          "    <B>Name:</B> " . $row["name"].
          "     <B>Address:</B> "
          . $row["address"]. "<br></h3></center>";
    }
    }
    else 
    {
    echo"<center><h2 style='color:green'>Criminal ID is not found</h2></center>";
    }
}
Mysqli_close($conn);
?>