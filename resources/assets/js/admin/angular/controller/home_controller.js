/**
 * Created by sibin on 9/10/2016.
 */
var appAccelaar = window.appAccelaar || angular.module('appAccelaar',['ngTagsInput']);

appAccelaar.controller('HomeController',['$scope','InternshipService',
    function($scope,InternshipService){
    $scope.title = "Internship List";
    $scope.internship_list = [];
    InternshipService.getInternshipList().then(function(result){
        console.log(result)
        if(result.data.status == 200){
            $scope.internship_list = result.data.data
        }
        console.log($scope.internship_list)
    });

}]);

/* Start tag input*/

appAccelaar.controller('MainCtrl', function($scope, $http) {
  $scope.tags = [
    { text: 'Tag1' },
    { text: 'Tag2' },
    { text: 'Tag3' }
  ];
});
/*eof tag input*/




/* START HOME INTERNSHIP CONTROLLER */
/**
 * - List all internship fields and skills
 *
 */
appAccelaar.controller('HomeInternshipController',['$scope','InternshipService',
  function($scope,InternshipService){
  $scope.internship_list = []
  InternshipService.getInternshipList().then(function(result){
    if(result.data.status == 200){
      $scope.internship_list = result.data.data;
    }
  }, function(error){
    console.log(error)
  })
}]);
/* EOF HOME INTERNSHIP CONTROLLER */

/* START COMPANY CONTROLLER */
appAccelaar.controller('HomeCompanyController',['$scope','Company', function($scope,Company){
  $scope.companies = [];
  Company.company().then(function(result){
    console.log(result)
    console.log(result.data)
    $scope.companies = result.data
  }, function(error){
    console.log(error)
  }, function (update) {
    console.log(update)
  })
}]);

/* END COMPANY CONTROLLER */

/* START USER CONTROLLER */
appAccelaar.controller('HomeUserController',['$scope','User', function($scope,User){
  $scope.users = [];
  User.users().then(function(result){
    $scope.users = result.data;
  }, function(error){

  })
}]);
/* END USER CONTROLLER */

/* START SKILLS CONTROLLER */
appAccelaar.controller('HomeSkillsController',['$scope', function($scope, $http){
  $scope.tags = [
    { text: 'Tag1' },
    { text: 'Tag2' },
    { text: 'Tag3' }
  ];

}]);

/* END START SKILLS CONTROLLER */

/* START SETTINGS CONTROLLER */
appAccelaar.controller('HomeSettingsController',['$scope', function($scope){

}]);

/* END START SETTINGS CONTROLLER */

/* START SINGLEUSER CONTROLLER */
appAccelaar.controller('HomeSingleuserController',['$scope', function($scope){

    $scope.tabs = [
      { title:'Dynamic Title 1', content:'Dynamic content 1' },
      { title:'Dynamic Title 2', content:'Dynamic content 2', disabled: true }
    ];

    $scope.alertMe = function() {
      setTimeout(function() {
        $window.alert('You\'ve selected the alert tab!');
      });
    };

    $scope.model = {
      name: 'Tabs'
    };
  $scope.navbarCollapsed = true;

}]);

/* END START SINGLEUSER CONTROLLER */