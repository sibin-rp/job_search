/**
 * Created by sibin on 9/18/2016.
 */
'use-strict';

appAccelaar.service('User',[
  '$http','$q','$resource',
  function($http,$q, $resource){
  this.users = function(){
    var defer = $q.defer();
    $http.get('/api/admin/users').then(function(result){
      defer.resolve(result);
    }, function(error){
      defer.reject(error)
    });
    return defer.promise;
  };
  this.user = function(){
    return $resource('/api/admin/people/:id')
  }
}]);