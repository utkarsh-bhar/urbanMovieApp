<?php
include_once 'connect.inc.php';
$error='';
if(isset($_GET['sub']))
{   $uname=$_SESSION['uname'];
    $title=$_GET['mname'];
    $list_id = $_GET['listid']
    $query_check= "SELECT * FROM `movies` WHERE `Movie_name` = '$title'";
    if(!empty($title))
    {
        if($result = mysqli_query($con,$query_check))
        {
            if(mysqli_num_rows($result) !=0)
            {
                $error='title already taken';
            }
            else{
                $query = "INSERT INTO `movies`(`Movie_name`,`uname`, `list_id`)VALUES('$title','$uname', '$list_id')";
                if(mysqli_query($con,$query))
                {
                    header("Location: index.html");
                }
                else
                {
                    echo 'sorry';
                }
            }
        }else{
            echo 'ihujk';
        }
    }else{
        echo 'PLZ fill form Completely';
    }

}

?>
