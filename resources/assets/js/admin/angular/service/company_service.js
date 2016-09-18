var appAccelaar = window.appAccelaar || angular.module('appAccelaar',[]);
appAccelaar.service('Company',['$http','$q', function($http,$q){
  this.company = function(){
    var defer = $q.defer();
    $http.get('/api/admin/companies').then(function(result){
      defer.resolve(result)
    }, function(error){
      defer.reject(error)
    });
    return defer.promise;
  }
}]);