<?php
include_once '../includes/connect.inc.php';
$uname = $_SESSION['uname'];
$query = "SELECT * FROM `movies` WHERE `list_id`='$uname'" ;
?>
<ion-view view-title="movies">
    <ion-content>
        <h1 class="title">Movies</h1>
        <ion-list>
            <div ng-controller="test">
                <button class="button button-positive" style="margin-left:20px" ng-click="movshow()">
                    AddMovies
                </button>
            </div>
       <?php
       if($res = mysqli_query($con,$query))
       {
           $grab = mysqli_fetch_assoc($res);
           if(!empty($grab['Movie_name'])){
               echo '<div class="card">
                   <div class="item item-text-wrap">
                       <div class="row header" style="border:1px solid black">
                           <!--<div class="col">S.no</div>-->
                           <div class="col">Movie Name</div>
                           <div class="col">Contributer</div>
                           <div class="col"></div>
                       </div>
                       <div class="row" ng-repeat="q in qwerty | filter: query" style="border:1px solid black">
                           <!--    <div class="col"style="border:1px solid black" >{{q.id}}</div>-->
                           <div class="col" >{{q.title}}</div>
                           <div class="col" >{{q.uname}}</div>
                           <div class="col" ><button class="button button-calm" >Like</button></div>
                       </div>
                   </div>
               </div>';
           }
           else{
               echo '<h1>NO MOVIE ADDED YET</h1>';
           }
       }

       ?>


        </ion-item>
    </ion-list>

    <body>

    </body>



</ion-content>
</ion-view>
