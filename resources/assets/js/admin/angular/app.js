var appAccelaar = window.appAccelaar = angular.module('appAccelaar',['ngResource','ui.router','ui.bootstrap']);

appAccelaar.config(['$stateProvider','$urlRouterProvider',function($stateProvider,$urlRouterProvider){
  $urlRouterProvider.otherwise('/home');
  $stateProvider.state('home',{
    url:'/home',
    templateUrl:'/js/admin/templates/home.html',
    controller: 'HomeController'
  })
    .state('internships',{
      url:'/internships',
      templateUrl:'/js/admin/templates/internship.html',
      controller: 'HomeInternshipController'
    })
    .state('internship',{
      url:'/internship/:id',
      templateUrl:'/js/admin/templates/internship/internship.html',
      controller:'InternshipController'
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
    .state('settings',{
      url:'/settings',
      templateUrl:'/js/admin/templates/settings.html',
      controller:'HomeSettingsController'
    })
    .state('skills',{
      url:'/skills',
      templateUrl:'/js/admin/templates/skills.html',
      controller:'HomeSkillsController'
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