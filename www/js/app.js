
angular.module('starter', ['ionic', 'starter.controllers'])

.run(function($ionicPlatform) {
    $ionicPlatform.ready(function() {
        // Hide the accessory bar by default (remove this to show the accessory bar above the keyboard
        // for form inputs)
        if (window.cordova && window.cordova.plugins.Keyboard) {
            cordova.plugins.Keyboard.hideKeyboardAccessoryBar(true);
            cordova.plugins.Keyboard.disableScroll(true);

        }
        if (window.StatusBar) {
            // org.apache.cordova.statusbar required
            StatusBar.styleDefault();
        }
    });
})
/*.config(function($routeProvider){
$routeProvider
.when('/',{
templatesUrl:'templates/menu.html'
})
.when('/browse',{
templatesUrl:'templates/browse.html',
controller:'MovieCtrol'
})

})*/

.config(function($stateProvider, $urlRouterProvider) {
    $stateProvider

    .state('app', {
        url: '/app',
        abstract: true,
        templateUrl: 'templates/menu.php',
        controller: 'AppCtrl'
    })


    .state('app.search', {
        url: '/search',
        views: {
            'menuContent': {
                templateUrl: 'templates/search.php',
                controller: 'wallPost'
            }
        }
    })

    .state('app.home', {
        url: '/home',
        views: {
            'menuContent': {
                templatesUrl: 'templates/home.html'
            }
        }
    })
    .state('app.browse', {
        url: '/browse',

        views: {
            'menuContent': {
                templateUrl: 'templates/browse.html',
                controller : 'addmovies'

            }
        }
    })

    .state('app.playlists', {
        url: '/playlists',
        views: {
            'menuContent': {
                templateUrl: 'templates/playlists.html',
                controller: 'PlaylistsCtrl'
            }
        }
    })

    .state('app.single', {
        url: '/playlists/:mov',
        views: {
            'menuContent': {
                templateUrl: 'templates/movielist11.html',
                controller: 'test'
            }
        }
    });
    // if none of the above states are matched, use this as the fallback
    $urlRouterProvider.otherwise('/app/home');
});
