<?php
include_once 'connect.inc.php';
$uname = $_SESSION['uname'];
$query = "SELECT * FROM `movieslist` WHERE `uname`='$uname' ";

if($results=mysqli_query($con,$query))
{  $grab = mysqli_fetch_all($results,MYSQLI_ASSOC);
    foreach($grab as $res=>$a)
    {$data[] =[
        'uname' => $a['uname'],
        'title' => $a['movielist_name'],
        'desc' => $a['Description'],
        'id'=>    $a['id']
    ];
}

echo json_encode($data);
}
?>
