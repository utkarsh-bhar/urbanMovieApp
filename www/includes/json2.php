<?php
include_once 'connect.inc.php';

$data = json_decode(file_get_contents("php://input"));
$uname = $_SESSION['uname'];
$que = "SELECT * FROM `movies` WHERE `Movie_name` = '$data->mname'";
$query = "INSERT INTO `movies`(`Movie_name`, `uname`, `list_id`) VALUES('$data->mname', '$uname', '$uname' ) ";
if($res = mysqli_query($con,$que))
{
    if(mysqli_num_rows($res)==0)
    {
       mysqli_query($con,$query);
    }
    else
    {
        echo '<h1>MOVIE already in the list..<h1>';
    }
}
?>
