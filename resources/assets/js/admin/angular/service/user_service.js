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
  };
  this.user_experience = function(id){
    var id = parseInt(id);
    var url = '/api/admin/people/'+id+'/experiences';
    return $q(function(resolve,reject){
      $.get(url).then(function(result){
        resolve(result)
      }, function(error){
        console.log(error)
        reject(error)
      })
    });
  };
  this.user_qualification = function(id){
    var id = parseInt(id);
    var url = '/api/admin/people/'+id+'/qualifications';
    return $q(function(resolve,reject){
      $.get(url).then(function(result){
        resolve(result)
      }, function(error){
        reject(error)
      })
    })
  };
  this.user_preference = function(id){
    var id = parseInt(id);
    var url = '/api/admin/people/'+id+'/preferences';
    return $q(function(resolve,reject){
      $.get(url).then(function(result){
        resolve(result)
      }, function(error){
        reject(error)
      })
    })
  }
}]);