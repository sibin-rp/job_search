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
    })
});


$(window).on('load', function() {
    //
    $('.home-content-section').removeClass('hidden').addClass('animated zoomIn')
})