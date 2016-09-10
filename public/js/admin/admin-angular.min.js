/**
 * Created by sibin on 9/10/2016.
 */
appAccelaar.controller('HomeController',['$scope', function($scope){

}]);




/* START HOME INTERNSHIP CONTROLLER */
/**
 * - List all internship fields and skills
 *
 */

appAccelaar.controller('HomeInternshipController',['$scope', function($scope){
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