<?php
include'connect.inc.php';
$error='';
if(isset($_POST['sub']))
{
    $uname = $_POST['uname'];
    $pass =$_POST['pass'];
    $pass1=$_POST['pass1'];
    $query_check = "SELECT * FROM `users` WHERE `uname` = '$uname'";

    if(!empty($uname)&& !empty($pass) && !empty($pass1))
    {
       if($result= mysqli_query($con,$query_check))
       {
           if(mysqli_num_rows($result) !=0)
           {
               $error ="Username already Taken";
           }
           else
            {
                if(strcasecmp($pass, $pass1) == 0)
                {
                  $pass_hash = md5($pass1);
                  $query="INSERT INTO `users`(`id`, `uname`,`pass`) VALUES (NULL,'$uname','$pass_hash')";
                  if(mysqli_query($con, $query))
                   {
                     header('Location: ../index.html');
                   }
                 else
                  {
                    $error = 'Unexpected Error in Database';
                  }
                }
               else
                {
                  $error = 'Password  doesn\'t match';
                }
            }
       }
    }
    else
    {
        $error='Please Fill up the Form Completely';
    }
}


 echo $error;
?>
