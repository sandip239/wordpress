jQuery(document).ready(function($) {
    $('.hello-world-widget').on('mouseover', function() {
        $(this).css({
            'font-weight': 'bold',
            'font-size': '1.2em' // Increase font size on hover
        });
    });

    $('.hello-world-widget').on('mouseout', function() {
        $(this).css({
            'font-weight': 'normal',
            'font-size': '1em' // Return font size to normal on mouseout
        });
    });
});
