var appAccelaar = window.appAccelaar || angular.module('appAccelaar',[]);
appAccelaar.service('General',['$http','$q', function($http,$q){
  this.getSkills = function(query){
    var defer = $q.defer();
    defer.resolve([]);
    defer.reject('not available');
    return defer.promise;
  }
}]);