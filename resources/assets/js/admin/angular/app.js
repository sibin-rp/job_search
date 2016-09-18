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
      controller: 'HomeInternshipController'
    })
    .state('company_lis',{
      url:'/company_lists',
      templateUrl:'/js/admin/templates/company.html',
      controller:'HomeCompanyController'
    })
    .state('users',{
      url:'/users',
      templateUrl:'/js/admin/templates/users.html',
      controller:'HomeUserController'
    })
}]);


/** FILTERS **/
appAccelaar.filter('company_type', function(){
  return function(input){
    if(!input) return null
    var newInput = input.replace('_',' ');
    return newInput.charAt(0).toUpperCase()+newInput.substr(1).toLowerCase()
  }
});

/** END FILTER **/