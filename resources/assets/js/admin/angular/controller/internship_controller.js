'use-strict';

appAccelaar.controller('InternshipController', ['$scope','InternshipService','$stateParams',
  function($scope,InternshipService,$stateParams){
  console.log($stateParams);
  $scope.internship = {};
  InternshipService.internships().get({id:$stateParams.id}, function(result){
    $scope.internship = result;
  }, function(error){
    console.log(error)
  })
}]);
