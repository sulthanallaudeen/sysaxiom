var app = angular.module('myApp', ['ngRoute', 'ngAnimate', 'toaster']);

app.config(['$routeProvider',
  function ($routeProvider) {
        $routeProvider.
        when('/login', {
            title: 'Login',
            templateUrl: 'views/login.php',
            controller: 'authCtrl'
        })
		.when('/register', {
            title: 'Register',
            templateUrl: 'views/register.php',
            controller: 'authCtrl'
        })
            .when('/logout', {
                title: 'Logout',
                templateUrl: 'views/index.php',
                controller: 'logoutCtrl'
            })
            .when('/home', {
                title: 'Home',
                templateUrl: 'views/dashboard.php',
                controller: 'authCtrl'
            })
            .when('/', {
                title: 'Login',
                templateUrl: 'views/dashboard.php',
                controller: 'authCtrl',
                role: '0'
            })
            .otherwise({
                redirectTo: '/login'
            });
  }])
    .run(function ($rootScope, $location, Data, $http) {
            $rootScope.$on("$routeChangeStart", function (event, next, current) {
                $http.post('app/toolkit/checkSession.php', {}).then(function (results)
                {					
                   var nextUrl = next.$$route.originalPath;                   
				   var response = results.data;
				   console.log();
				   console.log(nextUrl);
                    if (nextUrl == '/register' || nextUrl == '/login' || nextUrl == '/terms')
                    {
                        console.log('outPages');
                    }
                    else if ( nextUrl=='/task/:UserID' )
                    {
                        console.log('User Profile');
                    }
                    else
                    {
                        if (response['success'] == 1)
                        {
                            console.log('loggedin');
                            $location.path(nextUrl);
                        }
                        else {
                            console.log('not logged in');
                            $location.path('/login');
                        }
                    }
                });
            });
        });