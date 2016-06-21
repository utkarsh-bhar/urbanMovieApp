<?php include_once '../includes/connect.inc.php'; ?>
<ion-modal-view>
    <ion-header-bar>
        <h1 class="title">Add movies</h1>
        <div class="buttons">
            <button class="button button-clear" ng-click="closeMovieModal()">Close</button>
        </div>
    </ion-header-bar>
    <ion-content ng-controller="movieController">
        <form ng-submit="pushData(inData)" action="" method="get">
            <div class="list">
                <label class="item item-input">
                    <span class="input-label" >Movie Name</span>
                    <input type="text" ng-model="inData.mname" name="mname">
                </label>
                <div style="width:100px ;margin:0 auto;margin-top:20px">
                    <button type="button" class="button button-positive" ng-click="pushData(inData)" >Add</button>
                </div>
                <div class="row header">
                    <div class="col">MovieName</div>
                    <div class="col">UserName</div>
                    <div class="col"></div>
                </div>
                <div class="row" ng-repeat="data in myData">
                    <div class="col">{{data}}</div>
                    <div class="col"><?= $_SESSION['uname']; ?></div>
                    <a href="" ng-click="removeData(data)">Remove</a>
                </div>
            </div>
        </form><form action="#/app/playlists">
            <button  class="button button-block button-positive" type="submit"  >Add Movie</button>
        </form>

    </ion-content>
</ion-modal-view>
