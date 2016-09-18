var appAccelaar = window.appAccelaar || angular.module('appAccelaar',[]);
appAccelaar.factory('InternshipService',['$http','$q','$resource',
    function($http,$q,$resource){
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
    var internships = function(){
        console.log("Hello");
        return $resource('/api/admin/internships/:id',{id:'@id'})
    };
    return {
        getInternshipList: getInternshipList,
        internships:internships
    }
}]);