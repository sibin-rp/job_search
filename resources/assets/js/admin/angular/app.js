var appAccelaar = window.appAccelaar = angular.module('appAccelaar',
  ['ngResource','ui.router','ui.bootstrap','ngTagsInput','smart-table']);

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
    .state('user_show',{
      url:'/user/:id',
      templateUrl:'/js/admin/templates/user/show.html',
      controller:'UserController'
    })
    .state('user_show.experience',{
      url:'/experience',
      templateUrl:'/js/admin/templates/user/experience.html',
      controller:'UserExperienceController'
    })
    .state('user_show.qualification',{
      url:'/qualification',
      templateUrl:'/js/admin/templates/user/qualification.html',
      controller:'UserQualificationController'
    })
    .state('user_show.preference',{
      url:'/preference',
      templateUrl:'/js/admin/templates/user/preference.html',
      controller:'UserPreferenceController'
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
    .state('colleges',{
      url:'/colleges',
      templateUrl:'/js/admin/templates/college/index.html',
      controller:'CollegeController'
    })
    .state('colleges_show',{
      url:'/college/:id',
      templateUrl:'/js/admin/templates/college/show.html',
      controller:'CollegeShowController'
    })
    .state('colleges_form',{
      url:'/college_form?id',
      templateUrl:'/js/admin/templates/college/create.html',
      controller:'CollegeFormController'
    })
    .state('qualification',{
      url:'/qualification-type',
      templateUrl:'/js/admin/templates/qualification-type.html',
      controller:'HomeQualificationController'
    })
}]);


/** FILTERS **/
appAccelaar.filter('company_type', function(){
  return function(input){
    if(!input) return null;
    var newInput = input.replace('_',' ');
    return newInput.charAt(0).toUpperCase()+newInput.substr(1).toLowerCase()
  }
});

/** END FILTER **/