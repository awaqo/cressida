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