const swiper = new Swiper('.swiper', {

    direction: 'horizontal',
    loop: true,
    slidesPerView: 5,
    spaceBetween: 20,

    pagination: {
        el: '.swiper-pagination',
    },

    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },

    scrollbar: {
        el: '.swiper-scrollbar',
    },
});

$(document).ready(function () {


    $('.swiper').hover(function () {
        $('.swiper-button-prev').addClass('show-swiper-arrow')
        $('.swiper-button-next').addClass('show-swiper-arrow')
    }, function () {
        $('.swiper-button-prev').removeClass("show-swiper-arrow")
        $('.swiper-button-next').removeClass("show-swiper-arrow")
    })

    // $(window).scroll(function () {
    //     var top_of_element = $(".test").offset().top;
    //     var bottom_of_element = $('.products').height();
    //     var bottom_of_screen = $(window).scrollTop() + $(window).innerHeight();
    //     var top_of_screen = $(window).scrollTop();

    //     if ((bottom_of_screen > top_of_element) && (top_of_screen < bottom_of_element)) {
    //         $('.order').css({ 'position': 'absolute', 'inset': $('.products').height() + 'px auto auto 15px' })
    //     } else {
    //         $('.order').css({ 'position': 'fixed', 'top': '100px', 'right': 'auto', 'bottom': 'auto', 'left': '15px' })
    //     }
    // });

})
