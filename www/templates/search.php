<?php
    include_once '../includes/connect.inc.php';
    $uname = $_SESSION['uname'];
    $query = "SELECT * FROM `movieslist` WHERE `share`='1'" ;
?>
<ion-view view-title="Timeline">
    <ion-content>
        <style>
            .last{
                display : none;
            }
        </style>
        <h1 style = "text-align:center">Wall</h1><br\>
      <?php
        if($results = mysqli_query($con,$query))
        {   
            if(mysqli_num_rows($results) ==0)
            {
                echo '<h1>NOTHING SHARED RYT NOW!!!</h1>';
            }
            else
            {     
                  echo '<div ng-controller="sharelist1">
                            <div ng-repeat="k in List ">
                                <div class="card" >
                                    <div class="item item-text-wrap" style = "background-color:#F9FBE7">
                                        <h2><strong>{{k.list_id}}</strong> shared his list</h2>
                                        <div class="row header" style="border:1px solid black">
                                            <div class="col" style="border:1px solid black">Movie Name</div>
                                            <div class="col" style="border:1px solid black">Contributer</div>
                                            <div class="col" style="border:1px solid black">Votes</div>
                                        </div>
                                        <div class="row" ng-repeat="q in wallMovies | filter: query"  >
                                            <div ng-class="{last: q.list_id !=\'{{k.list_id}}\'}" class = "row">
                                                <div class="col" >{{q.Movie_title}}</div>
                                                <div class="col" >{{q.uname}}</div>
                                                <div class="col" ng-controller="likeButton"><button class="button button-calm" ng-model="like" ng-disabled="Dis" ng-click="isDisabled()">LIKE</button></div>
                                            </div>
                                        </div>
                                        <div ng-controller="addingmovie">
                                            <button class="button button-positive" href=""  ng-click="addMov12(k)">
                                                Add Movies
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>';
            }
        }
        else
        {
            echo '<h1>no query</h1>';
        }
      ?>
    </ion-content>
</ion-view>