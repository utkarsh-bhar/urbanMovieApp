<?php
include_once 'connect.inc.php';

$query = "SELECT * FROM `movies`";

if($results=mysqli_query($con,$query))
{  $grab = mysqli_fetch_all($results,MYSQLI_ASSOC);
    foreach($grab as $res=>$a)
    {$data[] =[
        'uname' => $a['uname'],
        'title' => $a['Movie_name'],
    ];
}

echo json_encode($data);
}
?>
