<ion-side-menus enable-menu-with-back-views="false">
  <ion-side-menu-content>
    <ion-nav-bar class="bar-royal">
      <ion-nav-back-button>
      </ion-nav-back-button>
      <ion-nav-buttons side="left">
        <button class="button button-icon button-clear ion-navicon" menu-toggle="left">
        </button>
      </ion-nav-buttons>
    </ion-nav-bar>
    <ion-nav-view name="menuContent"></ion-nav-view>
      
  </ion-side-menu-content>

  <ion-side-menu side="left">
    <ion-header-bar class="bar-royal">
      <h1 class="title"><?php
      include_once '../includes/connect.inc.php';
      $uname = $_SESSION['uname'];
      echo $uname;
      ?></h1>
    </ion-header-bar>
    <ion-content>
      <ion-list >
          <?php
            $sql = "SELECT id FROM movieslist WHERE `uname` = '$uname'";
          if(!isset($_SESSION['uname']))
          {
              echo '<ion-item menu-close  ng-click="Login(1)">
                Login
              </ion-item>
              <ion-item menu-close ng-click="Login(2)">
                Register
              </ion-item>
              <ion-item menu-close ng-href="#/app/Home.html">
                Home
              </ion-item>';
          }
          else{
              echo '<ion-item menu-close href="includes/signout.php">
                SignOut
              </ion-item>
              <ion-item menu-close href="#/app/home">
                Home
              </ion-item>
              <ion-item menu-close href="#/app/search">
                Timeline
              </ion-item>';
              if ($results = mysqli_query($con, $sql)) {
                  if(mysqli_num_rows($results) == 0) {
                      echo '<ion-item menu-close href="#/app/browse">
                                Add Movie List
                            </ion-item>';
                  }
              }
              
              echo '<ion-item menu-close href="#/app/playlists">
                        MovieList
                    </ion-item>';
          }
          ?>

   
      </ion-list>
    </ion-content>
  </ion-side-menu>
</ion-side-menus>

