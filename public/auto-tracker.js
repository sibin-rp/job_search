/**
 * AUTO TRACKER LIKE JS
 *
 * @objectives
 * - Track forms
 * - Use Session storage
 * - Send data
 *
 *
 *
 * @type {{init: Function}}
 */


var AutoTracker = {
  init: function(options){
    new AutoTrackerClass(options)
  }
};

function AutoTrackerClass(options){

  var _this = this;
  /**
   * Generate secrets key
   * @returns {string}
   */
  this.generateSecretKey = function(){
    return 'xxxxxxxx-xxxx-4xxx-yxxx-xxxxxxxxxxxx'.replace(/[xy]/g, function(c) {
      var r = Math.random() * 16 | 0,
        v = c == 'x' ? r : (r & 0x3 | 0x8);
      return v.toString(16);
    });
  };


  /* Initial Stages */
  /* Create VisitID and VisitorsID and store it in cookies */
  this.visitorsId = this.visitorsId || this.generateSecretKey();


  var allDataObject =  {
    form_submit_data:[],
    view_change_data:[],
    event_change_data:[]
  };



  /* Set Session if not exists */

  this.setStorageIfNotExist = function(key_a,allDataObject){
    if(sessionStorage.getItem(key_a)){
      allDataObject[key_a] = JSON.parse(sessionStorage.getItem(key_a))
    }else{
      sessionStorage.setItem(key_a,JSON.stringify(allDataObject[key_a]));
    }
    console.log(allDataObject)
  };

  /* Check existence and set default values */
  for(var key_a in allDataObject){
    if(allDataObject.hasOwnProperty(key_a)){
      _this.setStorageIfNotExist(key_a,allDataObject)
    }
  }
  this.getSessionData = function(key){
    allDataObject[key] = JSON.parse(sessionStorage.getItem(key));
  }
  /* Set session data */
  this.setSessionData = function(key,data){
    _this.getSessionData(key);
    allDataObject[key].push(data);
    sessionStorage.setItem(key,JSON.stringify(allDataObject[key]))
  }

  /* end session data */

  /* Track Url Changes */
  window.onbeforeunload = function(event){
    var currentPageDetails = {
      url: window.location.href,
      time: new Date(),
      title: document.title,
      screenWidth: window.screen.width,
      screenHeight: window.screen.height,
      platform: (navigator.platform || null),
      visitorId: _this.visitorsId
    };
    _this.setSessionData('view_change_data',currentPageDetails)
  };
  window.load = function(e){

  }

  /* end Track Url changes */

  var currentForm = document.getElementById(options.id);
  /* Form  submission */
  currentForm.addEventListener('submit', function(e){
    e.preventDefault();
    var formObject = {};
    formObject['id'] = e.target.id;
    formObject['data'] = [];
    formObject['time'] = new Date();
    for(var i=0; i<= currentForm.elements.length;i++){
      formObject.data.push({
        id: currentForm.elements[i].id,
        name: currentForm.elements[i].name,
        value: currentForm.elements[i].value
      })
    }
  });

  /* end form submission */



  var callClickAction = function(event){
    var dataStored = {};
    dataStored['event'] = event.type;
    dataStored['id'] = event.target.id;
    dataStored['value'] = event.target.value;
    dataStored['time'] = new Date();
    _this.setSessionData('event_change_data',dataStored)
  };
  var attachEventListners = function(element, events, callback){
    for(var i=0; i < events.length;i++){
      element.addEventListener(events[i],callback)
    }
  }


  if(currentForm){
    for(var i=0;i < currentForm.elements.length;i++){
      attachEventListners(currentForm.elements[i],['click','blur','change'],callClickAction)
    }
  }

  window.addEventListener('onbeforeunload',function(e){
    if(allDataObject){
      $.post(url,JSON.stringify(allDataObject)).then(function(result){
        console.log(result)
      }, function(error){
        console.log(error)
      })
    }
  });
}