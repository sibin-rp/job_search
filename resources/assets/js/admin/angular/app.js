var appAccelaar = window.appAccelaar = angular.module('appAccelaar',['ngResource','ui.router','ui.bootstrap']);

appAccelaar.config(['$stateProvider','$urlRouterProvider',function($stateProvider,$urlRouterProvider){
  $urlRouterProvider.otherwise('/home');
  $stateProvider.state('home',{
    url:'/home',
    templateUrl:'/js/admin/templates/home.html',
    controller: 'HomeController'
  })
    .state('internship_settings',{
      url:'/internship_settings',
      templateUrl:'/js/admin/templates/internship-settings.html',
      controller: 'InternshipController'
    })
    .state('company_lis',{
      url:'/company_lists',
      templateUrl:'/js/admin/templates/company.html',
      controller:'CompanyController'
    })
    .state('users',{
      url:'/users',
      templateUrl:'/js/admin/templates/users.html',
      controller:'UserController'
    })
}]);
