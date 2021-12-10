// Counting Total Price and Total Item inside /cart/show page
const cartCheckout = document.querySelector('.cart-checkout')
const quantities = cartCheckout.querySelectorAll('.product-quantity')
const prices = cartCheckout.querySelectorAll('.product-price')
const totalPriceElement = cartCheckout.querySelector('.total-price')
const totalItemElement = cartCheckout.querySelector('.total-item')

function countTotal() {
    let totalPrice = 0
    let totalItem = 0
    for (let i = 0; i < quantities.length; i++) {
        let quantity = quantities[i]
        let price = prices[i]
        totalItem += parseInt(quantity.value)
        totalPrice += parseInt(quantity.value)*parseInt(price.innerHTML)
    }
    // console.log('total item:', totalItem)
    // console.log('total price:', totalPrice)
    totalItemElement.innerHTML = totalItem
    totalPriceElement.innerHTML = 'Rp ' + totalPrice
}
quantities.forEach(element => {
    element.addEventListener('change', function() {
        countTotal()
    })
})

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


function loadAddress(result) {
    $.each(result, function (i, data) {
        if (data.default) {
            $('.address-card__wrapper').append(`
            <div class="address-card address-card__main">
                <span>Utama</span>
                <p class="fw-bold">`+ data.fullname + `</p>
                <p>`+ data.phone_number + `</p>
                <p>`+ data.address + `, ` + data.subdistrict + `, ` + data.city + `, ` + data.province + `
                </p>
                <p>`+ data.postal_code + `</p>
                <div class="address-card__footer">
                    <p class="text-decoration-none update-address__btn" id="`+ data.id + `">Edit</p>
                </div>
            </div>
            `);
        }
    });

    $.each(result, function (i, data) {
        if (!data.default) {
            $('.address-card__wrapper').append(`
            <div class="address-card">
                <p class="fw-bold">`+ data.fullname + `</p>
                <p>`+ data.phone_number + `</p>
                <p>`+ data.address + `, ` + data.subdistrict + `, ` + data.city + `, ` + data.province + `
                </p>
                <p>`+ data.postal_code + `</p>
                <div class="address-card__footer">
                    <p class="text-decoration-none update-address__btn" id="`+ data.id + `">Edit</p>
                    <i class="fas fa-minus"></i>
                    <p class="text-decoration-none delete-address__btn"
                        id="`+ data.id + `">Delete</p>
                    <i class="fas fa-minus"></i>
                    <p class="text-decoration-none set-default-address__btn" id="`+ data.id + `">jadikan ini
                        alamat default</p>
                </div>
            </div>
            `);
        }
    })
}



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



    // delete alamat
    $(document).on('click', '.delete-address__btn', function (e) {
        console.log('ok')
        $.ajax({
            type: 'get',
            url: '/address/destroy/' + $(this).attr('id'),
            success: function (result) {
                $('.address-card__wrapper').html('')
                loadAddress(result)
            }
        });
    });
    // end delete alamat


    // tambah alamat (form submited)
    $('.add-address__modal___content').on('submit', function (e) {
        e.preventDefault();
        $.ajax({
            type: $(this).attr('method'),
            url: $(this).attr('action'),
            data: $(this).serialize(),
            success: function (result) {
                $('.address-card__wrapper').html('')
                loadAddress(result)
                $('#add-new-address').modal('hide')
                $('.add-address__modal___content')[0].reset();
            }
        })
    })
    // end tambah alamat

    // set alamat default
    $(document).on('click', '.set-default-address__btn', function (e) {
        $.ajax({
            type: 'get',
            url: '/address/default/' + $(this).attr('id'),
            success: function (result) {
                $('.address-card__wrapper').html('')
                loadAddress(result)
            }
        });
    });
    // end set alamat default

    // update alamat
    $(document).on('click', '.update-address__btn', function (e) {
        // fill modal input value
        $.ajax({
            type: 'get',
            url: '/address/edit/' + $(this).attr('id'),
            success: function (result) {
                $('#add-new-address').modal('show')
                $('#fullname').val(result.fullname)
                $('#phone_number').val(result.phone_number)
                $('#province').val(result.province)
                $('#city').val(result.city)
                $('#subdistrict').val(result.subdistrict)
                $('#address').val(result.address)
                $('#postal_code').val(result.postal_code)
                $('#submit-address__btn').html('Ubah')
                $('.add-address__modal___content .modal-title').html('Ubah alamat')
                $('.add-address__modal___content').attr('action', '/address/update/' + result.id)
            }
        });
    });
    // end update alamat

    // tombol tambah alamat clicked
    $('#add-address__btn').on('click', function () {
        $('#submit-address__btn').html('Simpan')
        $('.add-address__modal___content .modal-title').html('Tambah alamat')
        $('.add-address__modal___content').attr('action', '/address/store')
        $('.add-address__modal___content')[0].reset();
    })
    // end tombol tambah alamat clicked

})
