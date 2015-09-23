var app = angular.module('myApp', ['ngRoute', 'ngAnimate', 'toaster'], function ($interpolateProvider) {
    //$interpolateProvider.startSymbol('<%');
    //$interpolateProvider.endSymbol('%>');
});
var layoutPath = 'resources/views/admin/html/';
app.config(['$routeProvider',
    function ($routeProvider) {
        $routeProvider.
                when('/login', {
                    title: 'Login',
                    templateUrl: layoutPath + 'login.php',
                    controller: 'authCtrl'
                })
                .when('/logout', {
                    title: 'Logout',
                    templateUrl: 'views/login.php',
                    controller: 'logoutCtrl'
                })
                .when('/home', {
                    title: 'Home',
                    templateUrl: layoutPath + 'dashBoard.php',
                    controller: 'authCtrl'
                })
                .when('/profile', {
                    title: 'Profile',
                    templateUrl: 'views/profile.php',
                    controller: 'authCtrl'
                })
                .when('/addtask', {
                    title: 'Add Task',
                    templateUrl: layoutPath + 'addTask.php',
                    controller: 'authCtrl'
                })
                .when('/listtask', {
                    title: 'List Task',
                    templateUrl: layoutPath + 'listTask.php',
                    controller: 'authCtrl'
                })
                .otherwise({
                    redirectTo: '/login'
                });
    }])
        .run(function ($rootScope, $location, Data, $http) {
            $rootScope.$on("$routeChangeStart", function (event, next, current) {
                $http.post('checkSession', {}).then(function (results)
                {
                    var nextUrl = next.$$route.originalPath;
                    if (nextUrl == '/register' || nextUrl == '/login' || nextUrl == '/terms')
                    {
                        console.log('Extenal Page Called');
                    }
                    else if (nextUrl == '/task/:UserID')
                    {
                        console.log('Page with Parameter');

                    }
                    else
                    {
                        if (results.data.success == 1)
                        {
                            console.log('User Logged In');
                            $location.path(nextUrl);
                        }
                        else {
                            console.log('User Not Logged In');
                            $location.path('/login');
                        }
                    }
                });
            });
        });