<?php

session_start();
if(!isset($_SESSION['email'])){
	header('location: login.php');
}


$isSharable = $_POST['isSharable'];
$url = uniqid();
$temp_user = $_POST['username'];
$pass = $_POST['password'];

require_once("../../mysqli_connect.php");



$query = "INSERT INTO terminal (user, url, port, isSharable)";
$query .= "VALUES(?, ?, ?, ?)";

// initialize a statement
$q = mysqli_stmt_init($con) or die("Not connect");

// prepare sql statement
mysqli_stmt_prepare($q, $query) or die("not prepare");



$user = $_SESSION['email'];
$ports = array(3000, 3010, 3020, 3030, 3040);
$assigned = 0;
foreach($ports as $port){
    for($i = 0; $i<3; $i++){
        $res = shell_exec("ss -tulpn | grep ':".$port."'");
        if($res == ""){
            $assigned = $port;
            $q->bind_param("ssii",$user, $url, $assigned, $isSharable) or die($q->error);
            $q->execute() or die($q->error);
            if(mysqli_stmt_affected_rows($q) == 1){
                shell_exec("./gotty --timeout 60 -c ".$temp_user.":".$pass." -p ".$port." -w docker exec -it ".$user." bash > /dev/null 2>/dev/null &");
                $res = array(
                    "status" => 1,
                    "url" => $url
                );
                echo json_encode($res);
                exit();
            }else{
                $res = array(
                    "status" => 0,
                    "error" => "Some error occured try again later"
                );
                echo json_encode($res);
                exit();
            }

        }
    }
}

$res = array(
    "status" => 0,
    "error" => "No Ports are available"
);
echo json_encode($res);

?>
