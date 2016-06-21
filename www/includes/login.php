<?php
include 'connect.inc.php';
$err = " ";
if(isset($_POST['submit']))
{
    $uname_log = htmlspecialchars($_POST['uname']);
    $pass_log = htmlspecialchars($_POST['pass']);
    if(empty($uname_log)&&empty($pass_log))
    {
        $err = 'Please Fill the Form Completely';
    }
    else
    {
        $pass_hash = md5($pass_log);
        $query_log="SELECT * from `users` where `uname`='$uname_log' AND `pass`='$pass_hash'";
        if($qwe=mysqli_query($con, $query_log))
        {
            $val_login =  mysqli_num_rows($qwe);
            if($val_login==0)
            {
                $err = 'Invalid Username or Password';
            }
            else
            if($val_login==1)
            {
                $_SESSION['uname']=$uname_log;
                header('Location: ../index.html#/app/playlists');
            }
        }
        else
        {
            $err = "E:01 Unexpected Error";
        }
    }
}
echo $err;
?>
