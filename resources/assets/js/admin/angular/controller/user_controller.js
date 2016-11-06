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

appAccelaar.controller('UserExperienceController',[
  '$scope','User','$stateParams','$uibModal',
  function($scope,User,$stateParams,$uibModal){
    $scope.experience = [];
    User.user_experience($stateParams.id).then(function(result){
      console.log(result)
      $scope.experiences = _.groupBy(result, function(item){
        return item.experience_type;
      })
      console.log($scope.experiences)
    }, function(error){
      console.log(error)
    })

    /* Modal */
    $scope.openModal = function(event,item){
      var studentModal = $uibModal.open({
        size:'md',
        templateUrl:'student-modal.html',
        controller:'UserStudentModalController',
        resolve: {
          item: function(){
            return item;
          }
        }
      })
    }
  }
]);

appAccelaar.controller('UserStudentModalController',[
  '$scope','$uibModalInstance','item',
  function($scope,$uibModalInstance,item){
    $scope.item = item;
    $scope.closeModal = function(){
      $uibModalInstance.dismiss();
    }
  }
]);


appAccelaar.controller('UserQualificationController',[
  '$scope','$uibModal','User','$stateParams',
  function($scope, $uibModal, User, $stateParams){
    $scope.qualification = [];
    User.user_qualification($stateParams.id).then(function(result){
      $scope.qualification = _.groupBy(result, function(item){
        return item.type;
      });
      console.log($scope.qualification)
    }, function(error){
      console.log(error)
    })

    $scope.openModal = function(event,item){
      $uibModal.open({
        size: 'md',
        templateUrl:'student-qualification-modal.html',
        controller: function($scope,$uibModalInstance,item){
          $scope.item = item;
          $scope.closeModal = function(){
            $uibModalInstance.dismiss()
          }
        },
        resolve:{
          item: function(){
            return item;
          }
        }

      })
    }
  }
]);

appAccelaar.controller('UserPreferenceController',[
  '$scope','$uibModal','User','$stateParams',
  function($scope,$uibModal, User, $stateParams){
    $scope.preferences = [];
    User.user_preference($stateParams.id).then(function(result){
      $scope.preferences = result;
    }, function(error){
      console.log(error)
    });

    $scope.openModal= function(event,item){
      $uibModal.open({
        size:'lg',
        templateUrl:'student-preference-modal.html',
        resolve:{
          item: function(){
            return item;
          }
        },
        controller:function($scope, $uibModalInstance, item){
          $scope.item = item;
          $scope.closeModal = function(){
            $uibModalInstance.dismiss();
          }
        }
      })
    }
  }
]);