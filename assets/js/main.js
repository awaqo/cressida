// carousel
$('.center').slick({
    centerMode: true,
    centerPadding: '100px',
    slidesToShow: 2,
    autoplay: true,
    autoplaySpeed: 1500,
    dots: true,
    adaptiveHeight: true,
    responsive: [
        {
            breakpoint: 768,
            settings: {
                arrows: true,
                centerMode: true,
                centerPadding: '40px',
                slidesToShow: 3
            }
        },
        {
            breakpoint: 480,
            settings: {
                arrows: true,
                centerMode: true,
                centerPadding: '40px',
                slidesToShow: 1
            }
        }
    ]
});

// insta feed
$(document).ready(function() {
    $.instagramFeed({
        'username': 'katalogcressidaofficial',
        'container': "#instagram-feed",
        'display_profile': false,
        'display_biography': false,
        'display_gallery': true,
        'get_raw_json': false,
        'callback': null,
        'styling': true,
        'items': 4,
        'items_per_row': 4,
        'margin': 0.3,
    });
});

// scroll to top
$(document).ready(function(){
    $(window).scroll(function(){
        if($(this).scrollTop() > 200){
            $('.scrollToTop').fadeIn();
        } else {
            $('.scrollToTop').fadeOut();
        }
    });
    $('.scrollToTop').click(function(){
        $('html,body').animate({scrollTop: 0}, 1000)
    })
});

function back() {
    window.history.back();
}

var obj = JSON.parse('{ "name":"John", "age":30, "city":"New York"}');
document.getElementById("demo").innerHTML = obj.name + ", " + obj.age;