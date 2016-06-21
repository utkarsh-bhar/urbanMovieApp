angular.module('starter.controllers', [])


.controller('AppCtrl', function($scope, $ionicModal, $timeout) {

    // With the new view caching in Ionic, Controllers are only called
    // when they are recreated or on app start, instead of every page change.
    // To listen for when this page is active (for example, to refresh data),
    // listen for the $ionicView.enter event:
    //$scope.$on('$ionicView.enter', function(e) {
    //});

    // Form data for the login modal
    $scope.loginData = {};
    $scope.registerData={};
    // Create the login modal that we will use later
    $ionicModal.fromTemplateUrl('templates/login.html', {
        id:'1',
        scope: $scope,
        animation:'slide-in-up'

    }).then(function(modal) {
        $scope.modal = modal;
    });
    $ionicModal.fromTemplateUrl('templates/register.html', {
        id:'2',
        scope: $scope,
        animation:'slide-in-up'

    }).then(function(modal) {
        $scope.modal1 = modal;
    });
    // Triggered in the login modal to close it
    $scope.Login = function(index) {
        if (index == '1') $scope.modal.show();
        else $scope.modal1.show();
    };

    $scope.closeLogin = function(index) {
        if (index == '1') $scope.modal.hide();
        else $scope.modal1.hide();
    };



    // Perform the login action when the user submits the login form
    $scope.doLogin = function() {
        console.log('Doing login', $scope.loginData);

        // Simulate a login delay. Remove this and replace with your login
        // code if using a login system
        $timeout(function() {
            $scope.closeLogin();
        }, 1000);
    };
    $scope.doregister = function() {
        console.log('Doing registration', $scope.registerData);

        // Simulate a Register delay. Remove this and replace with your login
        // code if using a Register system
        $timeout(function() {
            $scope.closeLogin();
        }, 1000);
    };
})

.controller('movieController',['$scope', '$http', '$log', function($scope, $http, $log) {
    $scope.myData = [];

    $scope.pushData = function($params) {
        $http.post('includes/json2.php',{'mname':$scope.inData.mname})
        .success(function(data) {
            $scope.blogs = data;
            console.log("Success");

            $scope.myData.push($scope.inData.mname);
            $scope.inData="";
        })
        .error(function(err) {
            console.log("Fail");
        })
    };

    $scope.removeData = function(selData) {
        $scope.myData.splice($scope.myData.indexOf(selData),1);
    };
}])

.controller('test',['$scope', '$http', '$log', '$ionicModal', '$timeout', function($scope, $http, $log, $ionicModal, $timeout){


    $http.get('includes/json1.php')
    .success(function(uiop) {
        $scope.qwerty = uiop;

    })
    .error(function(err) {
        console.log("jasdjasd");
        $log.error(err);
    })


    $ionicModal.fromTemplateUrl('templates/moviesadd.php', {
        scope: $scope,
        animation:'slide-in-up'

    }).then(function(modal) {
        $scope.modal = modal;
    });
    $scope.movshow = function() {
        $scope.modal.show();
    };

    $scope.closeMovieModal = function(index) {
        $scope.modal.hide();

    };
    $scope.addMovie1 = function() {
        console.log('Adding Movie', $scope.addMovie);
        $timeout(function() {
            $scope.closeMovieModal();
        }, 1000);
    };
}
]
)
.controller('PlaylistsCtrl', ['$scope', '$http', '$log', function($scope, $http, $log) {
    $http.get('includes/json.php')
    .success(function(data) {
        $scope.movies = data;

    })
    .error(function(err) {
        console.log("jasdjasd");
        $log.error(err);
        $http.get('include/json.php')
        .success(function(data1){
            $scope.movieslist =data1;
        })
    })
    $scope.shareList = function() {
        $http.post('includes/share.php',{'share':'1'})
        .success(function(data) {
            $scope.shareMov = data;
            console.log("Success");
        })
        .error(function(err){
            console.log("not sharing");
            $log.error(err);
        })
    }
}])
.controller('wallPost',['$scope','$http','$log',function($scope,$http,$log){
    $http.get('includes/json1.php')
    .success(function(dada){
        $scope.wallMovies = dada;
    })
    .error(function(err)
    {
        console.log("not shared");
        $log.error(err)
    })
}])
.controller('addmovies',function($scope){

})

.controller('PlaylistCtrl', function($scope, $stateParams) {
});
