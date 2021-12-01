const swiper = new Swiper('.swiper', {
    // Optional parameters
    direction: 'horizontal',
    loop: true,
    slidesPerView: 5,
    spaceBetween: 20,


    // If we need pagination
    pagination: {
        el: '.swiper-pagination',
    },

    // Navigation arrows
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },

    // And if we need scrollbar
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


})