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
    var default_options = {
      visitExpire: 4*60*60*1000,
      visitorExpire: 365*24*60*60*1000
    };

    /* Set default option if option not available */
    for(var i in default_options){
      if(default_options.hasOwnProperty(i)){
        if(!options[i]){
          options[i] = default_options[i]
        }
      }
    }
    new AutoTrackerClass(options)
  }
};

function AutoTrackerClass(options){

  var _this         = this;
  this.visitId      = "";
  this.visitorsId   = "";
  this.pageUrl      = "http://job_search.dev/auto-tracker-image.gif";
  this.formUrl      = "http://job_search.dev/auto-tracker-form.gif";

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
  };

  /* Check existence and set default values */
  for(var key_a in allDataObject){
    if(allDataObject.hasOwnProperty(key_a)){
      _this.setStorageIfNotExist(key_a,allDataObject)
    }
  }
  this.getSessionData = function(key){
    allDataObject[key] = JSON.parse(sessionStorage.getItem(key))|| [];
  }
  this.removeSessionData = function(key){
    sessionStorage.removeItem(key);
  }
  /* Set session data */
  this.setSessionData = function(key,data,clear){
    if(typeof clear=="undefined") clear=false;
    if(clear){
     _this.removeSessionData(key);
    }
    _this.getSessionData(key);

    if(Array.isArray(data)){
      for(var ai=0; ai<data.length; ai++){
        allDataObject[key].push(data[ai]);
      }
    }else{
      allDataObject[key].push(data);
    }
    sessionStorage.setItem(key,JSON.stringify(allDataObject[key]))
  }

  /* end session data */

  /**
   *
   * @param cname
   * @returns {*}
   */
  this.getCookies = function(cname){
    var name = cname + "=";
    var ca = document.cookie.split(';');
    for(var i = 0; i <ca.length; i++) {
      var c = ca[i];
      while (c.charAt(0)==' ') {
        c = c.substring(1);
      }
      if (c.indexOf(name) == 0) {
        return c.substring(name.length,c.length);
      }
    }
    return "";
  };

  /**
   *
   * @param cookieName
   * @param value
   * @param cookiesExpire
   */
  this.setCookies = function(cookieName,value,cookiesExpire){
    var d = new Date();
    d.setTime(d.getTime() + cookiesExpire);
    var expireTime = d.toUTCString();
    document.cookie= cookieName+"="+value+";expires="+expireTime+";path=/";
  };

  this.setVisitIds = function(variableId,variableName,value,expireTime,clear){
    // Check cookies or create one
    if(_this.getCookies(variableName)==""){
      _this[variableId] = _this.generateSecretKey();
      _this.setCookies(variableName,value,expireTime);
    }else{
      _this[variableId] = _this.getCookies(variableName);
    }
  };

  /** VISITORS ID **/
  this.setVisitIds('visitorsId',"visitorsId",this.generateSecretKey(),options.visitorExpire);
  /** END VISITORS ID */

  /* For the first page */

  window.addEventListener('load', function(event){
    try{
      // Create visit id in every browser load
      _this.setVisitIds('visitId',"visitId",_this.generateSecretKey(),options.visitExpire);
      _this.getSessionData('view_change_data');
      var currentPageDetails = {
        url: encodeURIComponent(window.location.href),
        time: (new Date()).getTime(),
        title: document.title,
        screenWidth: window.screen.width,
        screenHeight: window.screen.height,
        platform: (navigator.platform || null),
        referrer: document.referrer || "",
        visitorId: _this.visitorsId,
        visitId: _this.visitId
      };
      allDataObject['view_change_data'] =[(currentPageDetails)];
      _this.setSessionData('view_change_data',allDataObject['view_change_data'],true);
    }catch(e){
      console.log(e)

    }
    // visit cookie
  });

this.sendPageViewData = function(url){
  if(allDataObject['view_change_data'] && Array.isArray(allDataObject['view_change_data']) && ['view_change_data'].length > 0){
    var sendViewData = new XMLHttpRequest();
    var sendData = (JSON.stringify(allDataObject['view_change_data']));
    sendViewData.open('GET',url+'?data='+sendData,false);
    sendViewData.send();
  }
};
  /* Track Url Changes */
 window.onbeforeunload  = function(){
   _this.getSessionData('view_change_data');
   _this.sendPageViewData(_this.pageUrl)
 };
  /* end Track Url changes */





  /* FORM SUBMISSION SECTION */
  if(1==1){// no selected forms, go for all forms
    var allForms = document.querySelectorAll('form');

    for(var form of allForms){

      try{
        form.addEventListener('submit', function(event){
          var currentFormData = [];
          event.preventDefault();
          var elements = this.elements;
          try{
            console.log("Hello World")
            console.log(elements)
            var shouldNotInclude = ['submit','button'];
            for(var element of elements){
              try{
                if(shouldNotInclude.indexOf(element.type) == - 1){
                  if(element.value!=""){
                    var shouldSave = {
                      name: element.name || '',
                      value: element.value || '',
                      type: element.type
                    };
                    if(element.type =="checkbox" || element.type == "radio"){
                      shouldSave['checked'] = typeof element.checked!="undefined" ? element.checked:false
                    }
                    currentFormData.push(shouldSave)

                  }
                }
              }catch(e){
                console.log(e)
              }
            }
            if(Array.isArray(currentFormData) && currentFormData.length > 0){
              var sendFormData = new XMLHttpRequest();
              sendFormData.open('POST',_this.formUrl,false);
              sendFormData.send(JSON.stringify({data:(JSON.stringify(currentFormData))}))
              sendFormData.onreadystatechange= function(){
                if(sendFormData.readyState= XMLHttpRequest.DONE && sendFormData.status== 200){
                  console.log(sendFormData.status, sendFormData.statusText)
                  return true;
                }
              }
            }

            console.log(currentFormData)
          }catch(e){
            console.log(e)
          }
          return true;
        })
      }catch(er){
        console.log(er)
      }
    }
  }

  // Support form on submit



  /* END FORM SUBMISSION */
}