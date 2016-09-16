/**
 * Created by sibin on 9/10/2016.
 */
var appAccelaar = window.appAccelaar || angular.module('appAccelaar',[]);

appAccelaar.controller('homeController',['$scope','InternshipService',
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




/* START HOME INTERNSHIP CONTROLLER */
/**
 * - List all internship fields and skills
 *
 */

appAccelaar.controller('homeInternshipController',['$scope', function($scope){
  $scope.intership_fileds = [
    {
      name:'Web Development',
      skills:[
        'Java','PHP','Rails', 'Javascript','HTML','CSS2'
      ]
    }
  ]
}]);

/* EOF HOME INTERNSHIP CONTROLLER */