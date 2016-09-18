/**
 * Created by sibin on 9/18/2016.
 */
'use-strict';

appAccelaar.service('User',['$http','$q', function($http,$q){
  this.users = function(){
    var defer = $q.defer();
    $http.get('/api/admin/users').then(function(result){
      defer.resolve(result);
    }, function(error){
      defer.reject(error)
    });
    return defer.promise;
  }
}]);