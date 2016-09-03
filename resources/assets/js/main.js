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
                console.log("It is working")
            }
        }, function(error) {
            console.log(error.statusText)
        });
        return false; // prevent 
    });
    // Set Date Picker
    $('.date-picker').datetimepicker({
        format:'DD/MM/YYYY',
        // debug:true
    });
    $('#show-living-address').click(function(){
        $('#live-address-fields').toggleClass('hidden')
    })
});


$(window).on('load', function() {
    //
    $('.home-content-section').removeClass('hidden').addClass('animated zoomIn')
})