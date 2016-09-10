/**
 * JOB SEARCH JAVASCRIPT FUNCTIONS
 * @RedPanther 
 */
$(document).ready(function() {
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
        var url = $(this).attr('action');
        var data = $(this).serialize();
        $.post(url, data).then(function(result) {
            if (result.status == 200) {
                $('#student-modal-id').modal('hide');
                toastr.success("We have send confirmation email. Please check your Email inbox.")
            }else{
                $('#student-modal-id').modal('hide');
                toastr.error("We found unknown errors. Please come back later.")
            }
        }, function(error) {
            console.log(error.statusText)
        });
        return false; // prevent 
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
});

$(window).on('load', function() {
    //
    $('.home-content-section').removeClass('hidden').addClass('animated zoomIn')
})