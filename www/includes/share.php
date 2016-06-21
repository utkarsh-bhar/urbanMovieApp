<?php
include_once 'connect.inc.php';


$uname = $_SESSION['uname'];
$query = "UPDATE `movieslist` SET `share`='1' WHERE `list_id` = '$uname'";

if($results=mysqli_query($con,$query)) { echo "success"; }
else echo mysqli_error($con);

?>
