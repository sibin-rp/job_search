var appAccelaar = window.appAccelaar || angular.module('appAccelaar',[]);
appAccelaar.factory('InternshipService',['$http','$q',
    function($http,$q){
    var getInternshipList = function(){
        return $q(function(resolve,reject){
            $http({
                url:'/api/get-internships-list',
                method:'GET'
            }).then(function(result){
                resolve(result)
            }, function(error){
                reject(error)
            })
        })
    };

    return {
        getInternshipList: getInternshipList
    }
}]);