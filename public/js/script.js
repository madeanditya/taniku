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


// Counting Total price, Total item, and Total weight inside /cart/show page
$(document).ready(function()
{
    let cartShow = document.querySelector('.cart-show')
    if (cartShow) {
        let quantities = cartShow.querySelectorAll('.product-quantity')
        let weights = cartShow.querySelectorAll('.product-weight')
        let prices = cartShow.querySelectorAll('.product-price')
        let totalPriceElement = cartShow.querySelector('.total-price')
        let totalWeightElement = cartShow.querySelector('.total-weight')
        let totalItemElement = cartShow.querySelector('.total-item')
    
        function cartShowCountTotal() {
            let totalPrice = 0
            let totalWeight = 0
            let totalItem = 0
            for (let i = 0; i < quantities.length; i++) {
                let quantity = quantities[i]
                let weight = weights[i]
                let price = prices[i]
                totalItem += parseInt(quantity.value)
                totalWeight += parseInt(quantity.value) * parseInt(weight.innerHTML)
                totalPrice += parseInt(quantity.value) * parseInt(price.innerHTML)
            }
            totalItemElement.innerHTML = totalItem
            totalWeightElement.innerHTML = totalWeight + ' gram'
            totalPriceElement.innerHTML = 'Rp ' + totalPrice
        };
        
        quantities.forEach(element => {
            element.addEventListener('change', function () {
                cartShowCountTotal()
            })
        })   
    }
})

// Counting Total price, Total item, and Total weight inside /cart/checkout page
$(document).ready(function() {
    let cartCheckout = document.querySelector('.cart-checkout')
    if (cartCheckout) {
        let shippers = cartCheckout.querySelectorAll('.shipper')
        let summaries = cartCheckout.querySelectorAll('.summary')

        let subtotalPrices = cartCheckout.querySelectorAll('.subtotal-price')
        let subtotalWeights = cartCheckout.querySelectorAll('.subtotal-weight')

        let estimations = cartCheckout.querySelectorAll('.estimation')
        let shippingCosts = cartCheckout.querySelectorAll('.shipping-cost')
        let subtotalBills = cartCheckout.querySelectorAll('.subtotal-bill')

        let totalShippingCostContainer = cartCheckout.querySelector('.total-shipping-cost-container')
        let totalBillContainer = cartCheckout.querySelector('.total-bill-container')

        let totalShippingCost = cartCheckout.querySelector('.total-shipping-cost')
        let totalBill = cartCheckout.querySelector('.total-bill')

        for (let i = 0; i < shippers.length; i++) {
            let shipper = shippers[i]
            let summary = summaries[i]
            
            let subtotalPrice = parseInt(subtotalPrices[i].innerHTML)
            let subtotalWeight = parseInt(subtotalWeights[i].innerHTML)

            let estimation = estimations[i]
            let shippingCost = shippingCosts[i]
            let subtotalBill = subtotalBills[i]

            shipper.addEventListener('change', function() {
                if (shipper.value == 'pengiriman') {
                    summary.style.display = 'none'
                    totalShippingCostContainer.style.display = 'none'
                    totalBillContainer.style.display = 'none'
                }
                else {
                    summary.style.display = 'block'
                    if (shipper.value == 'instan') {
                        estimation.innerHTML = 'arrive in 3 to 6 hours'
                        shippingCost.innerHTML = 10000 + 50 * subtotalWeight
                        subtotalBill.innerHTML = subtotalPrice + (10000 + 50 * subtotalWeight)
                    }
                    else if (shipper.value == 'same day') {
                        estimation.innerHTML = 'arrive in 6 to 8 hours'
                        shippingCost.innerHTML = 10000 + 40 * subtotalWeight
                        subtotalBill.innerHTML = subtotalPrice + (10000 + 40 * subtotalWeight)
                    }
                    else if (shipper.value == 'reguler') {
                        estimation.innerHTML = 'arrive in 1 to 3 days'
                        shippingCost.innerHTML = 10000 + 20 * subtotalWeight
                        subtotalBill.innerHTML = subtotalPrice + (10000 + 20 * subtotalWeight)
                    }
                    else if (shipper.value == 'kargo') {
                        estimation.innerHTML = 'arrive in 3 to 7 days'
                        shippingCost.innerHTML = 10000 + 5 * subtotalWeight
                        subtotalBill.innerHTML = subtotalPrice + (10000 + 5 * subtotalWeight)
                    }
                    let totalShippingCostvalue = 0
                    let totalBillvalue = 0
                    for (let j = 0; j < shippers.length; j++) {
                        totalShippingCostvalue += parseInt(shippingCosts[j].innerHTML)
                        totalBillvalue += parseInt(subtotalBills[j].innerHTML)
                        if (shippers[j].value == 'pengiriman') {
                            break
                        }
                        else if (j == shippers.length - 1) {
                            totalShippingCostContainer.style.display = 'block'
                            totalBillContainer.style.display = 'block'
                            totalShippingCost.innerHTML = totalShippingCostvalue
                            totalBill.innerHTML = totalBillvalue
                        }
                    }
                }
            })
        }
    }
})