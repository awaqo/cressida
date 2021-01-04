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
        'username': 'cressidabeauty',
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

// more info glow
var i = 0;
function increaseItem() {
    document.getElementById('additem').value = ++i;
}
function decreaseItem() {
    if (i > 0){
        document.getElementById('additem').value = --i;
    } else {
        document.getElementById('additem').value = i;
    }
}

function login() {
    Swal.fire({
    title: 'Login',
    text: "Successfully Logged in",
    icon: 'success',
    timer: 1000
    })
}