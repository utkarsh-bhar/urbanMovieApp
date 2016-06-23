<?php
include_once 'connect.inc.php';
$uname = $_SESSION['uname'];

$query = "SELECT * FROM `movies`,`movieslist` WHERE movieslist.uname = movies.uname AND movieslist.share = '1'";
//$query = "SELECT * FROM `movies` WHERE  `share` = '1'";

if($results=mysqli_query($con,$query))
{  $grab = mysqli_fetch_all($results,MYSQLI_ASSOC);
    foreach($grab as $res=>$a)
    {$data[] =[
        'uname' => $a['uname'],
        'Movie_title' => $a['Movie_name'],
        'list_id'    => $a['list_id'],
        'list_title' => $a['movielist_name']
        
    ];
}

echo json_encode($data);


}
?>

