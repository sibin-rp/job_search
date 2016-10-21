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
    $scope.$broadcast('skill_re_fetch',id)
  };

  $scope.$on('skill_re_fetch', function(event,id){
    console.log(id)
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
  });

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
    General.removeSkill(skill).then(function(result){
      if(result.status == 200 && result.data.status == 200){
        $scope.$broadcast('skill_re_fetch',skill.internship_field_id)
      }
      toastr.success("Skill removed")
    }, function(error){

    });

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

/* START QUALIFICATION TYPE CONTROLLER */
appAccelaar.controller('HomeQualificationController',[
  '$scope','General','$uibModal',
  function($scope,General,$uibModal){

    /* Load first */
    fetch_all_qualification = function(){
      $scope.qualification_types = [];

      General.qualificationType().query(function(result){
        if(result.length > 0) $scope.qualification_types = result
      }, function(error){
        console.log(error)
      })
    };
    /* end load first */



    fetch_all_qualification();
    /**
     *
     * @param event {event}
     * @param formData
     * @use Create/Add qualification data
     */
    $scope.saveFormData = function(event, formData){
      event.preventDefault();
      General.qualificationType().save(formData, function(result){
        if(result.status == 200){
          $scope.qualification = {}; // empty fields
          $scope.qualificationTypeForm.$setPristine();
          fetch_all_qualification()
        }
      }, function(error){
        console.log(error)
      })
    };

    /**
     *
     * @param event {event}
     * @param s_type {object}
     * @use Delete selected qualification type
     * @return Re fetch data
     */
    $scope.deleteType = function(event,s_type){
      if(!s_type.id) throw new Error("Id is not found");

      General.qualificationType().remove({id:s_type.id}, function(result){
        if(result.status == 200){
          fetch_all_qualification();
        }
      }, function(error){
        console.log(error)
      })
    };

    $scope.editModalType = function(event, data){
      event.preventDefault();
      var editQTypeModal = $uibModal.open({
        templateUrl:"edit_qualification_type_modal",
        controller:'homeEditQualificationTypeCtrl',
        size:'md',
        resolve:{
          item: function(){
            return data
          }
        }
      });

      editQTypeModal.result.then(function(status){
        console.log(status);
        if(status.status == 200){
          fetch_all_qualification();
        }
      });
    }
  }
]);

/* END QUALIFICATION TYPE CONTROLLER */

/* START QUALIFICATION EDIT MODAL CONTROLLER */
appAccelaar.controller('homeEditQualificationTypeCtrl',[
  '$scope','$uibModalInstance','item','General',
  function($scope,$uiModalInstance,item,General){
    $scope.item = item;

    $scope.closeModal = function(){
      $uiModalInstance.dismiss('cancel')
    };

    $scope.editQualificationSubmit = function(event, data){
      General.qualificationType().update({id: data.id},data, function(result){
        if(result.status == 200){
          $uiModalInstance.close(result)
        }
      }, function(error){
        console.log(error)
      })
    };
  }


]);

/* END QUALIFICATION EDIT MODAL CONTROLLER */