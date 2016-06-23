<?php
include_once 'connect.inc.php';
$uname = $_SESSION['uname'];
$query = "SELECT * FROM `movieslist` WHERE `share` ='1' ";

if($results=mysqli_query($con,$query))
{  $grab = mysqli_fetch_all($results,MYSQLI_ASSOC);
    foreach($grab as $res=>$a)
    {$data1[] =[
        'list_id' => $a['list_id'],
        'title' => $a['movielist_name']
        
    ];
}

echo json_encode($data1);
}
?>
