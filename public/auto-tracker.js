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
  this.queueFormData = [];
  this.ajaxOnProcess = false;

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
      console.log("Remove")
     _this.removeSessionData(key);
    }
    _this.getSessionData(key);
    if(allDataObject[key].length < 5){
      if(Array.isArray(data)){
        for(var ai=0; ai<data.length; ai++){
          allDataObject[key].push(data[ai]);
        }
      }else{
        allDataObject[key].push(data);
      }
      sessionStorage.setItem(key,JSON.stringify(allDataObject[key]))
    }else{
      _this.removeSessionData(key)
    }
  };

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


this.sendFormDataToQueue = function(formData,form){

  _this.queueFormData = [{
    formData: formData,
    time: (new Date()).getTime(),
    queued: true,
    formId: (form && form.id) ? form.id : null,
  }];
  _this.setSessionData('form_submit_data',_this.queueFormData)
};

  /**
   *
   * @param currentFormData { FORM DATA }
   * @param form {CurrentForm}
   */
this.sendFormDataToServer = function(currentFormData,form){
  try{
    _this.ajaxOnProcess = true;
    var sendFormData = new XMLHttpRequest();
    sendFormData.open('POST',_this.formUrl,true);
    sendFormData.send(JSON.stringify({data:(JSON.stringify(currentFormData))}))
    sendFormData.onreadystatechange= function(){
      if(sendFormData.readyState == XMLHttpRequest.DONE && sendFormData.status== 200){
        var serverResponse = JSON.parse(sendFormData.response);
        _this.ajaxOnProcess = false;
        if(serverResponse.status == 200){
          if(typeof form !="undefined"){
            form.submit();
          }
          return true;
        }else{
          _this.sendFormDataToQueue(currentFormData,form);
          if(typeof form !="undefined"){
            form.submit();
          }
        }
      }
    }
  }catch(e){
    _this.sendFormDataToQueue(currentFormData)
  }
};
this.formDataSubmission = function(){
  if(1==1){// no selected forms, go for all forms
    var allForms = document.querySelectorAll('form');

    for(var form of allForms){

      try{
        form.addEventListener('submit', function(event){
          var currentFormData = [];
          event.preventDefault();
          var elements = this.elements;
          try{
            var shouldNotInclude = ['submit','button'];
            for(var element of elements){
              try{
                if(shouldNotInclude.indexOf(element.type) == - 1){
                  if(element.value!=""){
                    var shouldSave = {
                      name: element.name || '',
                      value: element.value || '',
                      type: element.type,
                      time: (new Date()).getTime()
                    };
                    if(element.type =="checkbox" || element.type == "radio"){
                      shouldSave['checked'] = typeof element.checked!="undefined" ? element.checked:false
                    }
                    currentFormData.push(shouldSave)

                  }
                }
              }catch(e){
                console.log(e)
                // Save currentFormData if ajax failed
              }
            }
            if(Array.isArray(currentFormData) && currentFormData.length > 0){
              _this.sendFormDataToServer(currentFormData,form)
            }
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
}

  /* FORM SUBMISSION SECTION */


  // Support form on submit



  /* END FORM SUBMISSION */
  /* For the first page */
  this.getQueryParams = function(){
    var queryParamCheck =  /(.*?)(?:\=(.*?))?(&|$)/g;
    var currentQueryParams = {};
    var queryParams = document.location.href.match(/\?(.*?)(#|$)/);
    console.log(queryParams)
    if(!queryParams) return {};
    queryParams = typeof queryParams[1]!="undefined"? queryParams[1]:[];
    console.log(queryParams);
    debugger
    for(;;){
      console.log('HELLLO')
      var getEachParamsCheck = queryParamCheck.exec(queryParams);
      console.log(getEachParamsCheck[1])
      if(!getEachParamsCheck[1]){
        console.log(getEachParamsCheck[1])
        break; // If second element not present break loop
      }
      currentQueryParams[getEachParamsCheck[1]] = getEachParamsCheck[2];
    }
    console.log(currentQueryParams);
    return currentQueryParams || {};
  };
  this.getUTMParams = function(){
    var utmParams = {};
    var getCurrentQueryParams = _this.getQueryParams();
    var allowedUTMPParams = ["utm_campaign", "utm_source", "utm_medium", "utm_term", "utm_content"];
    for(var keys in getCurrentQueryParams){
      if(getCurrentQueryParams.hasOwnProperty(keys)){
        if(allowedUTMPParams.indexOf(keys)!=-1){
          utmParams[keys] = getCurrentQueryParams[keys]
        }
      }
    }
    return utmParams || {};
  };
  window.addEventListener('load', function(event){
    debugger
    var currentUTMParams = {};
    //try{
      // Create visit id in every browser load
      _this.setVisitIds('visitId',"visitId",_this.generateSecretKey(),options.visitExpire);
      _this.getSessionData('view_change_data');
      var currentPageDetails = {
        l: encodeURIComponent(location.host+location.pathname),
        ts: (new Date()).getTime(),
        tt: document.title,
        sW: window.screen.width,
        sH: window.screen.height,
        p: (navigator.platform || null),
        referrer: document.referrer,
        vsId: _this.visitorsId,
        vId: _this.visitId
      };
      currentUTMParams = _this.getUTMParams();
      if(typeof currentUTMParams != "undefined" && Object.keys(currentUTMParams).length > 0){
        currentPageDetails['utm'] = currentUTMParams
      }
      console.log(currentUTMParams)
      allDataObject['view_change_data'] =[(currentPageDetails)];
      _this.setSessionData('view_change_data',allDataObject['view_change_data'],true);
    //}catch(e){
    //  console.log(e)
    //
    //}

    _this.formDataSubmission();
    // visit cookie
  });


  /* INTERVAL TO SEND QUEUED */
  setInterval(function(){
    console.log("Hello")
    if(!_this.ajaxOnProcess){//If ajax not running
      _this.getSessionData('form_submit_data');
      if(Array.isArray(allDataObject['form_submit_data']) && allDataObject['form_submit_data'].length > 0){
        allDataObject['form_submit_data'] = _removeDuplicates(allDataObject['form_submit_data'],'time')
        for(formDataQueue of allDataObject['form_submit_data']){
          _this.sendFormDataToServer(formDataQueue.formData);
          allDataObject['form_submit_data'].pop();
        }
        _this.setSessionData('form_submit_data',allDataObject['form_submit_data'],true)
      }
    }
  },10 * 1000);

  /* END INTERVAL */



  /* EVENT HANDLER */


  /* END EVENT HANDLER */
}


function _removeDuplicates(originalArray, prop) {
  console.log(originalArray,prop)
  var newArray = [];
  var lookupObject  = {};
  for(var i in originalArray) {
    lookupObject[originalArray[i][prop]] = originalArray[i];
  }
  for(i in lookupObject) {
    newArray.push(lookupObject[i]);
  }
  console.log(newArray)
  return newArray;
}