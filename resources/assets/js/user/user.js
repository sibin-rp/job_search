/**
 * Created by sibin on 30/9/16.
 */

'use strict';

$(document).ready(function(){
  $('.common-date-picker').datetimepicker({
    format:'YYYY-MM-DD',
    //debug: true
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

  /* Internship Preference Page
   * -----------------------------
   * User select field, show skills
   */
  $('#internship_field_select').on('change', function(e){
    var currentSelection  = $(this).val();
    // remove skills and levels when new internship field select
    $('#skill-box').addClass('hidden')
    $('#skill-box-list').children().remove();
    $('#choose-skill-level').children().remove();
    var url = '/api/get-skills-by-id';
    if(currentSelection){//call and get skills
      $.get(url,{id:currentSelection}, function(success){
        $('#skill-box').removeClass('hidden');
        if(success.status == 200 && success.data.length > 0){
          var liElement = [];
          $.each(success.data, function(index,value){
            liElement.push("<li><input type='checkbox' name='fields' value='"+JSON.stringify(value)+"'>&nbsp;"+value.name+"</li>")
          });
          if(liElement.length>0)
          $('#skill-box-list').append(liElement)
        }else{
          $('#skill-box-list').append('<li>No skills found..</li>')
        }
      }).fail(function(error){
        console.log(error)
      })
    }
  });
  /* When user select multiple checkbox */
  $('#skill-box-list').on('click','li input', function(e){
    var chooseSkillLevel = $('#choose-skill-level');
    chooseSkillLevel.parent().removeClass('hidden');
    var selectedCheckbox = JSON.parse($(this).val());
    if($(this).prop('checked')){//add
      var listElement = "<li class='list-group-item skill-list-item-"+selectedCheckbox.id+"'>"+selectedCheckbox.name+"<div class='pull-right'>" +
        "<input type='radio' value='beginner' name='preference[skill]["+selectedCheckbox.id+"]'/>&nbsp;Beginner&nbsp;"+
        "<input type='radio' value='intermediate' name='preference[skill]["+selectedCheckbox.id+"]'/>&nbsp;Intermediate&nbsp;"+
        "<input type='radio' value='expert' name='preference[skill]["+selectedCheckbox.id+"]'/>&nbsp;Expert&nbsp;"+
        "</div></li>";
      chooseSkillLevel.append(listElement)
    }else{//remove
      chooseSkillLevel.find('.skill-list-item-'+selectedCheckbox.id).remove()
    }
  })

});


