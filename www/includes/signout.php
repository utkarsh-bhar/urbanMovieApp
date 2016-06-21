<?php
include_once 'connect.inc.php';

if(isset($_SESSION['uname']))
{
     session_destroy();
    header('Location: ../index.html');
}
?>
