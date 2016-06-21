<?php
include_once '../includes/connect.inc.php';
$uname = $_SESSION['uname'];
$query = "SELECT * FROM `movieslist` WHERE `share`='1'" ;
?>
<ion-view view-title="Search">
    <ion-content>
        <h1>Wall</h1>
        <!--{  $grab = mysqli_fetch_assoc($results);
        print_r($grab);
    }-->
    <?php
    if($results=mysqli_query($con,$query))
    {
        $grab = mysqli_fetch_assoc($results);
        echo '<div class="card" >
        <div class="item item-text-wrap">';
        echo '' . $grab['list_id'] . ' shared his list
        <div class="row header" style="border:1px solid black">
        <div class="col">S.no</div>
        <div class="col">Movie Name</div>
        <div class="col">Contributer</div>
        <div class="col"></div>
        </div>
        <div class="row" ng-repeat="q in wallMovies | filter: query" style="border:1px solid black">
        <div class="col"style="border:1px solid black" >{{q.id}}</div>
        <div class="col" style="border:1px solid black">{{q.title}}</div>
        <div class="col" style="border:1px solid black">{{q.uname}}</div>
        <div class="col" style="border:1px solid black"><button class="button button-calm" >LIKE</button></div>
        </div>
        </div>
        </div>';
    }else{
        echo '<h1>Nothing to show here</h1>';
    }
    ?>

</ion-content>
</ion-view>
