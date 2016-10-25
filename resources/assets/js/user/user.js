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
  });


  /*---------------------------------------
  | COMPANY INTERNSHIP PROGRAM            |
  *----------------------------------------*/
  /* Update Skills set when user select internship field */
  $('#internship-field').change(function(){
    var internshipFieldId = $(this).val();
    $('#skill-info-box').addClass('hidden');
    var url = $(this).data('url');
    if($('.skills-box').find('.well').children().length > 0){
      $('.skills-box').find('.well').children().remove();
    }
    $.get(url,{id: internshipFieldId}).done(function(result){
      if(result.status == 200 && result.data.length > 0){
        var skillList = result.data.map(function(value,index){
          return "<label><input type='checkbox' class='skill-checkbox' data-name='"+value.name+"' name='internship_skills["+index+"]' value='"+value.id+"'>"+value.name+"</label>"
        });
        $('.skills-box').removeClass('hidden').find('.well').append(skillList)
      }else{
        $('.skills-box').addClass('hidden');
        console.log("Sorry no Skills found for this field")
      }
    });
  });
  $('.skills-box').find('#skill-well').on('click','.skill-checkbox', function(){
    var skillUserSelect = $('.skills-box').find('.skill-user-select');
    var checkedSkillsSet = [];
    var dataName = $(this).data('name')
    var idValue = $(this).val();
    if($(this).prop('checked')){
      var codeToPush = "<li class='list-group-item clearfix' id='user-skill-set-"+idValue+"'>"+dataName +
        "<div class='pull-right'> <input type='radio' name='internship[skills]["+idValue+"]' value='beginner'>&nbsp;Beginner" +
        "<input type='radio' name='internship[skills]["+idValue+"]' value='intermediate'>&nbsp;Intermediate" +
        "<input type='radio' name='internship[skills]["+idValue+"]' value='expert'>&nbsp;Expert" +
        "</div></li>";

    }else{
      $(document).find('#user-skill-set-'+idValue).remove();
    }
    var skillUserSelectBox = $(document).find('#skill-user-select');
    if(skillUserSelectBox.length == 0){
      skillUserSelectBox= $('<ul/>',{
        class:"skill-user-select list-group",
        id:'skill-user-select'
      });
    }
    skillUserSelectBox.append(codeToPush);
    $('.skills-box').find('#skill-well').after(skillUserSelectBox)

  });

  /** =========================================*/

  /*---------- END -------------------------*/



  /*=================== USER/COMPANY DASHBOARD ============= */

  /**
   * Show/Close minimum qualification section
   */
  $('.min_qual_radio').click(function(){
    $('.qualification-section').removeClass('open');
    var currentValue = $(this).val();
    if($(this).prop('checked')){
      $('#quali-'+currentValue).addClass('open')
    }else{
      $('#quali-'+currentValue).removeClass('open')
    }
  });

  /**
   * Change Min-Max When user select CGPA4/10 and Percentage
   */
  $('.q-type').on('change', function(){
    var selectedValue = $(this).val();
    var closestInputField = $(this).parents('.qualification-section').find('.q-mark');
    var minAndMax = {min:0,max:100}
    switch (selectedValue){
      case 'cgpa_4':
        minAndMax = {min:0,max:4};
        break;
      case 'cgpa_10':
        minAndMax = {min:0,max:10};
        break;
      case 'percentage':
        minAndMax = {min:0,max:100};
        break;
      default:
        minAndMax = {min:0,max:100};
        break
    }
    closestInputField.attr(minAndMax)
  });

  $('.q-mark').on('blue change keyup', function(){
    var minValue = parseFloat($(this).attr('min'));
    var maxValue = parseFloat($(this).attr('max'));
    var currentValue = parseFloat($(this).val());
    if(currentValue > maxValue){
      $(this).val(maxValue)
    }
  });

  /*================= EMD =================================*/
});


