<?php
include_once 'connect.inc.php';
$uname = $_SESSION['uname'];
$query = "SELECT * FROM `movies` WHERE `list_id`='$uname'";

if($results=mysqli_query($con,$query))
{  $grab = mysqli_fetch_all($results,MYSQLI_ASSOC);
    foreach($grab as $res=>$a)
    {$data[] =[
        'uname' => $a['uname'],
        'title' => $a['Movie_name'],
        'id'    => $a['id']
    ];
}

echo json_encode($data);


}
?>
