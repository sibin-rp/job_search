/**
 * JOB SEARCH JAVASCRIPT FUNCTIONS
 * @RedPanther 
 */
$(document).ready(function() {
    /** DEFAULTS **/
    Dropzone.autoDiscover = false;
    $.fn.select2.defaults.set( "theme", "bootstrap" );
    $('[data-toggle="popover"]').popover();
    /** EOF DEFAULTS **/
    // Home carousel by OWL Carousel 
    $('#home-slider').owlCarousel({
        items: 1,
        loop: true,
        dots: false,
        autoplay: true
    });
    // Student register 
    $('#student-register').submit(function(e) {
        e.preventDefault();
        return true
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
    /** EOF STUDENT REGISTER FORM **/


    /** INTERNSHIP INFO FORM **/
    var internshipInfoForm = $('#internship_info_form');
    if(internshipInfoForm.length > 0){
        /* INTERNSHIP INFO FORM EVENTS */
        internshipInfoForm.submit(function(e){
            console.log($(this).serialize());
            e.preventDefault();
        });
        internshipInfoForm.parsley();
        /* EOF INTERNSHIP INFO FORM **/

        $('.date-from').datetimepicker({
            format:'YYYY-MM-DD',
            minDate: moment().format()
        });
        $('.date-to').datetimepicker({
            format:'YYYY-MM-DD',
            minDate: moment().format()
        });

        $('.date-from').on('dp.change', function(event){
            var newDate = event.date;
            var idElement = $(event.target).data('to')
            $(idElement).data('DateTimePicker').minDate(newDate);
        });
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

      /* Update Skills set when user select internship field */
      $('#internship-field').change(function(){
          var internshipFieldId = $(this).val();
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

                  toastr.warning("Sorry no Skills found for this field")
              }
          });
      });
        $('.skills-box').find('#skill-well').on('click','.skill-checkbox', function(){
            var skillUserSelect = $('.skills-box').find('.skill-user-select');
            if(skillUserSelect.length > 0){
                skillUserSelect.remove()
            }
            var checkedSkillsSet = [];
            $('.skills-box .skill-checkbox:checked').each(function(index,value){
                var nameValue = $(value).val();
                checkedSkillsSet.push("<li>"+nameValue+"</li>" +
                  "<input type='radio' name='internship[skills][index]' value='"+dataValue+",beginner'>&nbsp;Beginner" +
                  "<input type='radio' name='internship[skills][index]' value='"+dataValue+",intermediate'>&nbsp;Intermediate" +
                  "<input type='radio' name='internship[skills][index]' value='"+dataValue+",expert'>&nbsp;Expert")
            })
            var skillUserSelectBox = $('<div/>',{
                class:"skill-user-select",
                id:'skill-user-select'
            });
            skillUserSelectBox.append(checkedSkillsSet);
            $('.skills-box').find('#skill-well').after(skillUserSelectBox)

        });

    /** =========================================*/

    /* COMMON SELECT 2 BOX */
    $('.select-2-select').select2({
        theme:'bootstrap'
    });
    /* EOF COMMON SELECT 2 BOX */

    /* Select2 box intership_list*/
    $('.select-2-internlist').select2({
        theme:'bootstrap'
    });
    $(".js-placeholder-multiple").select2({
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

});

$(window).on('load', function() {
    //
    $('.home-content-section').removeClass('hidden').addClass('animated zoomIn')
})