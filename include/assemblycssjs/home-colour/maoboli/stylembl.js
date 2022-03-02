$(function() {
        let blur = $('.g-glossy-firefox')[0].style;
        let offset = $('.layui-header').eq(0).offset();

        function updateBlur() {
            blur.backgroundPosition = 
                `${-window.scrollX - offset.left}px ` + 
                `${-window.scrollY - offset.top}px`;
        }
        document.addEventListener('scroll', updateBlur, false), updateBlur();
});


var new_scroll_positions = 0;
var last_scroll_positions;
var headers = document.getElementById("firefoxjs");


window.addEventListener('scroll', function(e) {
    last_scroll_positions = window.scrollY;
    // Scrolling down
    if (new_scroll_positions < last_scroll_positions && last_scroll_positions > 80) {
        // header.removeClass('slideDown').addClass('slideUp');
        headers.classList.remove("slideDown");
        headers.classList.add("slideUp");
        // Scrolling up
    } else if (new_scroll_positions > last_scroll_positions) {
        // header.removeClass('slideUp').addClass('slideDown');
        headers.classList.remove("slideUp");
        headers.classList.add("slideDown");
    }
    new_scroll_positions = last_scroll_positions;
});
