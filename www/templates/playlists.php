<ion-view view-title="MovieLists">
    <ion-content >
        <ion-list>
            <ion-item ng-repeat="mov in movies | filter: query" href="#/app/playlists/{{mov.id}}" >
                <div class="list">
                    {{mov.title}}

                </div>

            </ion-item>
            <ion-item ng-controller="PlaylistsCtrl">
                <?php
                    require_once("../includes/connect.inc.php");
                    $uname = $_SESSION['uname'];
                    $sql = "SELECT id FROM movieslist WHERE `uname` = '$uname'";
                    if ($results = mysqli_query($con, $sql)) {
                        if(mysqli_num_rows($results) != 0) {
                            echo '<button class="button button-positive" style="float:right" ng-click="shareList()">
                                Share
                          </button>';
                        }else
                        {echo '<h1>NO MOVIE LIST CREATED !!</h1>';

                    }
                    }

                    
                ?>
            </ion-list>
        </ion-content>
    </ion-view>
