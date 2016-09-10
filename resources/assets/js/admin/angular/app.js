var appAccelaar = angular.module('appAccelaar',['ngResource','ui.router','ui.bootstrap']);

appAccelaar.config(['$stateProvider','$urlRouterProvider',function($stateProvider,$urlRouterProvider){
  $urlRouterProvider.otherwise('/');
  $stateProvider.state('home',{
    url:'/',
    templateUrl:'/js/admin/templates/home.html',
    controller:'HomeController'
  });
}]);