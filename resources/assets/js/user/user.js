/**
 * Created by sibin on 30/9/16.
 */

'use strict';

$(document).ready(function(){
  $('.common-date-picker').datetimepicker({
    format:'YYYY-MM-DD'
  });

  $('.year-datepicker').datetimepicker({
    format:'YYYY'
  });

  // Extra qualification

  var extraQualificationForm = $('#add_extra_qualification');
  if(extraQualificationForm.length > 0){
    extraQualificationForm.on('submit', function(element){
      // element.preventDefault();
      var change_type = $('[name="change_type"]').val();
      var formData = $(this).serializeArray();
      formData = formData.filter(function(value){
        return value.name!="_token" && value.name!="_method"
          && value.name!="change_type" && value.value!="";
      });
      if(change_type && formData.length > 0){
        $('.change-name').each(function(index,element){
          var currentName = $(element).attr('name');
          var firstPosition = currentName.indexOf("[");
          var lastPosition = currentName.indexOf("]");
          currentName = currentName.replace(currentName.substring(firstPosition,lastPosition+1),"[other]");
          currentName = currentName.replace("other", change_type);
          $(element).attr('name',currentName);
        })
        $(this).submit();
      }
      return false;
    })
  }

});


