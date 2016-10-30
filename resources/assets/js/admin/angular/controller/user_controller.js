appAccelaar.controller('UserController',[
  '$scope','User','$stateParams',
  function($scope, User, $stateParams){
    $scope.user = {};
    User.user().get({id:$stateParams.id}, function(result){
      if(result.status == 200){
        $scope.user = result.data;
      }
      console.log($scope.user)
    }, function(error){
      console.log(error)
    });
  }
]);
