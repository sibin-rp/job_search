/**
 * Created by sibin on 10/29/2016.
 */

appAccelaar.controller('CollegeController',[
  '$scope','General',
  function($scope, General){
    $scope.colleges = [];
    General.college().query(function(result){
      console.log(result)
      $scope.colleges = result;
    }, function(error){
      console.log(error)
    })


    /* Delete College */
    $scope.deleteCollege = function(event,college){
      event.preventDefault()
      General.college().delete({id:college.id}, function(result){
        console.log(result)
        if(result.status == 200){
          $state.go('colleges')
        }
      }, function(error){
        console.log(error)
      })
    }
  }
]);

appAccelaar.controller('CollegeShowController',[
  '$scope','General','$stateParams','$state',
  function($scope, General, $stateParams, $state){
    $scope.colleges = [];
    General.college().get({id:$stateParams.id},function(result){
      console.log(result)
      if(result.status == 200){
        $scope.college = result.data;
      }
    }, function(error){

    });

    /* Delete College */
    $scope.deleteCollege = function(event,college){
      event.preventDefault()
      General.college().delete({id:college.id}, function(result){
        console.log(result)
        if(result.status == 200){
          $state.go('colleges')
        }
      }, function(error){
        console.log(error)
      })
    }
  }
]);


appAccelaar.controller('CollegeFormController',[
  '$scope','$stateParams','General','$state',
  function($scope,$stateParams,General,$state){
    console.log($stateParams);
    $scope.states = [];
    $scope.college = {};//initialize empty college object

    if($stateParams.id){
      General.college().get({id:$stateParams.id}, function(result){
        console.log(result)
        if(result.status == 200){
          $scope.college = result.data;
        }
      }, function(error){
        console.log(error)
      })
    }
    General.getStates().then(function(result){
      if(result.status == 200 && result.data.status == 200){
        $scope.states = result.data.data;
      }
    }, function(error){
      console.log(error)
    });

    // Form submit
    $scope.addOrUpdateCollege = function(event,college){
      event.preventDefault();
      college['_token'] = $('meta[name="csrf_meta"]').attr('content');
      if($stateParams.id){
        General.college().update(college, function(result){
          if(result.status == 200){
            $state.go('colleges')
          }
        }, function(error){
          console.log(error)
        })
      }else{
        General.college().save(college, function(result){
          console.log(result)
          if(result.status == 200){
            $state.go('colleges')
          }
        }, function(error){
          console.log(error)
        })
      }
    }



  }
]);