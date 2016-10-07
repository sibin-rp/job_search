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
appAccelaar.controller('HomeSkillsController',['$scope','General',
  function($scope, General){
  $scope.available_fields = [];
  $scope.skill_tags =  [];
  General.getSkills().then(function(result){
    if(result.status == 200){
      $scope.available_fields = result.data
    }
  }, function(error){
    console.log(error)
  });

  $scope.fetchSkills = function(id){
    General.getSkillsById(id).then(function(result){
      if(result.status == 200){
        if(result.data.status == 200){
          $scope.skill_tags = result.data.data;
        }else{
          $scope.skill_tags = [];

        }
      }
    }, function(error){
      console.log(error)
    })
  };

  $scope.saveTagsToField = function(){
    if($scope.skill_tag_add){
      General.saveSkillById($scope.get_field_id, $scope.skill_tag_add).then(function(result){
        if(result.status == 200 && result.data.status == 200){
          $scope.skill_tag_add = null;
          General.getSkillsById($scope.get_field_id).then(function(result){
            if(result.status == 200){
              if(result.data.status == 200){
                $scope.skill_tags = result.data.data;
              }
            }
          }, function(error){
            console.log(error)
          })
        }
      }, function(error){
        console.log(error)
      })
    }
  };
  $scope.loadTags = function(query){
    General.getSkills().then(function(result){
      return  result;
    }, function(error){
      console.log(error)
    })
  };

  $scope.removeSkill = function(event,skill){
    console.log(skill)
    toastr.success("Skill removed")
    event.stopPropagation();
  }

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