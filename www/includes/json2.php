<?php
include_once 'connect.inc.php';

$data = json_decode(file_get_contents("php://input"));
$uname = $_SESSION['uname'];
$query = "INSERT INTO `movies`(`Movie_name`, `uname`, `list_id`) VALUES('$data->mname', '$uname', '$uname' )";

if($results=mysqli_query($con,$query)) { }

?>
