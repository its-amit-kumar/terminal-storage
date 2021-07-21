<?php
require_once("../mysqli_connect.php");
$url = $_GET['id'];
//echo $url;

$query = "SELECT * FROM terminal WHERE url = '$url'";
$result = $con->query($query) or die("error");
$port = 0;
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    $port = $row['port'];
    $isSharable = (int)$row['isSharable'];
  }
}
else{
  header('location: /index.php');
}

if(!$isSharable){
  session_start();
  if(!isset($_SESSION['email'])){
    header('location: /login.php');
  }

}



?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Terminal</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

    <!--[if lt IE 9]>
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
  </head>
  <body>
      <iframe src="http://13.233.112.151:<?php echo $port ?>/" frameborder="0" style="height : 100vh; width: 100%"></iframe>
  </body>


  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
</html>
