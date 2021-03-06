/**
 * JOB SEARCH JAVASCRIPT FUNCTIONS
 * @RedPanther 
 */
$(document).ready(function() {
    /** DEFAULTS **/
    Dropzone.autoDiscover = false;
    $.fn.select2.defaults.set( "theme", "bootstrap" );
    $('[data-toggle="popover"]').popover();
    $('.year-datepicker').datetimepicker({
      format:'YYYY'
    });
    $('.normal-date').datetimepicker({
      format:'YYYY-MM-DD'
    })
    /** EOF DEFAULTS **/
    // Home carousel by OWL Carousel 
    $('#home-slider').owlCarousel({
        items: 1,
        loop: true,
        dots: false,
        autoplay: true
    });
    // Set Date Picker
    $('.date-picker').datetimepicker({
        format:'YYYY-MM-DD',
        useCurrent: true
        // debug:true
    });
    $('#show-living-address').click(function(){
        $('#live-address-fields').toggleClass('hidden')
    })


    /**
     * STUDENT REGISTER FORMS
     *
     */
    var personalInfoForm = $('#personal_info_form');
    if(personalInfoForm.length > 0){
        personalInfoForm.submit(function(event){
            event.preventDefault();
        });
        personalInfoForm.parsley();

        personalInfoForm.parsley().on('form:error', function(object){
            $.each(object.fields, function(index,element){
                if(element.validationResult && !$.isArray(element.validationResult)){
                    element.$element.closest('.form-group').addClass('has-success')
                }else{
                    element.$element.closest('.form-group').addClass('has-error')
                }
            })
        });
        personalInfoForm.parsley().on('form:validate', function(object){
            $.each(object.fields, function(index, element){
                element.$element.closest('.form-group').removeClass('has-success has-error');
            })
        });
        personalInfoForm.parsley().on('form:success',function(object){
            if(object.validationResult){
                var getUrl = object.$element.attr('action');
                var formData = object.$element.serialize();
                // Call Ajax function and save fields
                $.post(getUrl, formData).then(function(success){
                    if(success.status == 200){
                        toastr.success(success.message);
                        $('#personalFormCollapse').collapse('hide');
                        $('#internshipInfoCollapse').collapse('show');
                    }else{
                        toastr.error(success.message);
                    }
                }, function(error){
                    console.log(error)
                })
            }
        });
        /* EOF STUDENT REGISTER FORM */
    };
 

    /** add intership  */
 var addInternshipParsleyForm = $('#add_internship_parsley_form');

      addInternshipParsleyForm.parsley();

       /* eof add intership*/

    /** EOF STUDENT REGISTER FORM **/


    /** INTERNSHIP INFO FORM **/
    var internshipInfoForm = $('#internship_info_form');
    if(internshipInfoForm.length > 0){
        /* INTERNSHIP INFO FORM EVENTS */
        internshipInfoForm.submit(function(e){
            e.preventDefault();
          var formUrl = $(this).attr('action');
          var formData = $(this).serialize();
            $.post(formUrl,formData).then(function(result){
              console.log(result)
              if(result.status == 200){
                toastr.success("Internship preference data saved..")
                $('a[href="#qualificationInfoCollapse"]').click();
              }
            }, function(error){
              console.log(error)
            })
        });
        internshipInfoForm.parsley();
        /* EOF INTERNSHIP INFO FORM **/
    }

  var internshipExperienceForm = $('#internship-experience-form');
  if(internshipExperienceForm.length > 0){
    internshipExperienceForm.submit(function(e){
      e.preventDefault();
      var formUrl = $(this).attr('action');
      var formData = $(this).serialize();
      $.post(formUrl,formData).then(function(result){
        if(result.status == 200){
          toastr.success(result.message);
          setTimeout(function(){
            toastr.info("Thanks for registering on this Website");
            window.location.href = "/thanks";
          },1000)
        }
      }, function(error){
      }, function(error){

      })
    })
  }
  var internshipQualificationForm = $('.internship-qualification-form');
  if(internshipQualificationForm.length > 0){
    internshipQualificationForm.submit(function(e){
      e.preventDefault();
      var formUrl = $(this).attr('action');
      var formData = $(this).serialize();
      $.post(formUrl,formData).then(function(result){
        if(result.status == 200){
          toastr.success(result.message);
          $('a[href="#'+result.key+'"]').click();
        }
      }, function(error){

      })
    })
  }



    /** EOF INTERNSHIP INFO FORM **/


    /**
     * ------------------------------------------
     *  COMPANY REGISTER FORM
     * ------------------------------------------
     */
     $('#company-logo').dropzone({
         url:'/company-logo-upload',
         dictDefaultMessage: 'Upload your Company Logo',
         dictFallbackMessage:"Use IE9+, Latest Chrome, Firefox browsers",
         maxFilesize: 2,
         maxFiles: 1,
         paramName:"logo",
         headers:{
             "X-CSRF-TOKEN" : $('meta[name="csrf_token"]').attr('content')
         }
     });

     $('.internship-duration').datetimepicker({
       format:'YYYY-MM-DD',
       useCurrent: true ,
       minDate: moment().format()
     });
      $('#internship-duration-start').on('dp.change', function (e) {
        var newDate = e.date;
        $('#internship-duration-end').data('DateTimePicker').minDate(newDate)
      });

      $('#internship-state').select2();

      $('.internship-qualification-select').click(function(){
        var extraFieldExist = $(this).data('extra');
        var currentValue    = $(this).val();
        console.log(currentValue)
        $('.qualification-inbox').each(function(index,element){
         if(!$(element).hasClass('hidden')){
           $(element).addClass('hidden');
         }
        });
          if($(this).prop('checked')){
             $('[data-box="'+currentValue+'"]').removeClass('hidden')
          }else{
            $('[data-box="'+currentValue+'"]').addClass('hidden')
          }
      });

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
                  toastr.warning("Sorry no Skills found for this field")
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

    /* COLLEGE NAME AUTOCOMPLETE */
  var collegeName = new Bloodhound({
    datumTokenizer: Bloodhound.tokenizers.whitespace,
    queryTokenizer: Bloodhound.tokenizers.whitespace,
    // url points to a json file that contains an array of country names, see
    // https://github.com/twitter/typeahead.js/blob/gh-pages/data/countries.json
    prefetch: '/api/get-colleges',
    remote: {
      url: '/api/get-colleges/%QUERY',
      wildcard: '%QUERY'
    }
  });
    $('.college-name').typeahead({
      minLength:1
    },{
      source: collegeName,
      display:'name'
    });

    /* END COLLEGE NAME AUTOCOMPLETE */


    /* COMMON SELECT 2 BOX */
    $('.select-2-select').select2({
        theme:'bootstrap',
        placeholder: "Select from options",
    });
    /* EOF COMMON SELECT 2 BOX */

    /* Select2 box intership_list*/
    $('.select-2-internlist').select2({
        theme:'bootstrap'
    });
    $(".js-placeholder-multiple").select2({
        placeholder: "Select a state"
    });
  $(".js-example-basic-single").select2({
    placeholder: "Select a state"
  });
  /* EOF select2 box intership_list */

    /* salary ranger*/
    $('#ex1').slider({
        formatter: function(value) {
            return 'Current value: ' + value;
        }
    });

    /*EOF salary ranger*/

  /*Smooth Scroll*/
  smoothScroll.init();
  /*eof smooth scroll*/


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

  $('.q-mark').on('blur change keyup', function(){
    var minValue = parseFloat($(this).attr('min'));
    var maxValue = parseFloat($(this).attr('max'));
    var currentValue = parseFloat($(this).val());
    if(currentValue > maxValue){
      $(this).val(maxValue)
    }
  });

  /*================= EMD =================================*/


});

$(window).on('load', function() {
    //
    $('.home-content-section').removeClass('hidden').addClass('animated zoomIn')
})