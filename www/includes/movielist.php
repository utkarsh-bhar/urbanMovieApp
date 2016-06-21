<?php
include_once 'connect.inc.php';
$error='';
if(isset($_GET['sub']))
{   $uname=$_SESSION['uname'];
    $title=$_GET['title'];
    $desc=$_GET['desc'];
    $query_check= "SELECT * FROM `movieslist` WHERE `movielist_name` = '$title'";
    if(!empty($title) && !empty($desc))
    {
        if($result = mysqli_query($con,$query_check))
        {
            if(mysqli_num_rows($result) !=0)
            {
                $error='title already taken';
            }
            else{
                $query = "INSERT INTO `movieslist`(`movielist_name`,`Description`, `uname`,`list_id`)VALUES('$title','$desc', '$uname','$uname')";
                if(mysqli_query($con,$query))
                {
                    header("Location: /www/index.html");
                }else {
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
