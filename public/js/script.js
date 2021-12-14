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

function loadAddressCheckout(result) {
    $.each(result, function (i, data) {
        if (data.default) {
            $('.pick-address__modal').append(`
            <div class="address-card">
                <span>Utama</span>
                <p class="fw-bold">`+ data.fullname + `</p>
                <p>`+ data.phone_number + `</p>
                <p>`+ data.address + `, ` + data.subdistrict + `, ` + data.city + `, ` + data.province + `
                </p>
                <p>`+ data.postal_code + `</p>
            </div>
            `);
        }
    });

    $.each(result, function (i, data) {
        if (!data.default) {
            $('.pick-address__modal').append(`
            <div>
            <input type="radio" id="address-`+ data.id + `" name="active_address" value="` + data.id + `" hidden ` + +` {{ $active_address == ` + data.id + ` ? 'checked' : '' }}>
                <label for="address-`+ data.id + `" class="address-card address-card__checkout">
                    <p class="fw-bold">`+ data.fullname + `</p>
                    <p>`+ data.phone_number + `</p>
                    <p>`+ data.address + `, ` + data.subdistrict + `, ` + data.city + `, ` + data.province + `
                    </p>
                    <p>`+ data.postal_code + `</p>
                </label>
            </div>
            `);
        }
    })
}

function loadDefaultAddress(result) {
    $.each(result, function (i, data) {
        if (data.default) {
            $('.address').append(`
            <h3 class="fw-bold mb-3">Alamat Penerima</h3>
                <div class="address-card">
                <p class="fw-bold">`+ data.fullname + `</p>
                <p>`+ data.phone_number + `</p>
                <p>`+ data.address + `, ` + data.subdistrict + `, ` + data.city + `, ` + data.province + `
                </p>
                <p>`+ data.postal_code + `</p>
                    <div class="address-card__footer">
                        <button type="button" class="btn btn-success" data-bs-toggle="modal"
                            data-bs-target="#editAddressModal">
                            Ubah alamat</button>
                    </div>
                </div>
            `);
            return;
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

    // tambah alamat checkout page (form submited)
    $('.address-modal__checkout').on('submit', function (e) {
        e.preventDefault();
        $.ajax({
            type: $(this).attr('method'),
            url: $(this).attr('action'),
            data: $(this).serialize(),
            success: function (result) {
                $('.pick-address__modal').html('')
                loadAddressCheckout(result)
                $('.address-modal__checkout')[0].reset();
                $('.address-back__btn').click()
            }
        })

    })
    // end tambah alamat checkout page (form submited)

    // ubah alamat checkout page
    $('.change-address__modal').on('submit', function (e) {
        e.preventDefault();
        const addressId = $('input[name="active_address"]:checked').val();
        $.ajax({
            type: 'get',
            url: '/address/default/' + addressId,
            success: function (result) {
                $('.pick-address__modal').html('')
                loadAddressCheckout(result)
                $('.address').html('')
                loadDefaultAddress(result)
                $('#editAddressModal').modal('hide')
            }
        });
    })
    // end ubah alamat checkout page

    // toggle add note textarea
    $('.product-note label').on('click', function () {
        const id = $(this).attr('for')
        $('#' + id).toggleClass('d-none')
    })
    // end toggle add note textarea

})

// Counting change action inside /cart/show page
$(document).ready(function () {
    let cartShow = document.querySelector('.cart-show')
    if (cartShow) {
        let productQuantities = cartShow.querySelectorAll('.product-quantity')
        let productWeights = cartShow.querySelectorAll('.product-weight')
        let productPrices = cartShow.querySelectorAll('.product-price')
        let summaryPrice = cartShow.querySelector('.summary-price')
        let summaryWeight = cartShow.querySelector('.summary-weight')
        let sumaaryItem = cartShow.querySelector('.summary-item')

        function cartShowCountTotal() {
            let totalPrice = 0
            let totalWeight = 0
            let totalItem = 0
            for (let i = 0; i < productQuantities.length; i++) {
                let quantity = productQuantities[i]
                let weight = productWeights[i]
                let price = productPrices[i]
                totalItem += parseInt(quantity.value)
                totalWeight += parseInt(quantity.value) * parseInt(weight.innerHTML)
                totalPrice += parseInt(quantity.value) * parseInt(price.innerHTML)
            }
            sumaaryItem.innerHTML = totalItem
            summaryWeight.innerHTML = totalWeight + ' gram'
            summaryPrice.innerHTML = 'Rp ' + totalPrice
        };

        productQuantities.forEach(element => {
            element.addEventListener('change', function () {
                cartShowCountTotal()
            })
        })
    }
})

// Counting change action inside /cart/checkout page
$(document).ready(function () {
    let cartCheckout = document.querySelector('.cart-checkout')
    if (cartCheckout) {

        // suppliers
        let supllierShippers = cartCheckout.querySelectorAll('.supplier-shipper')

        // products
        let subtotalProductQuantities = cartCheckout.querySelectorAll('.subtotal-product-quantity')
        let subtotalProductPrices = cartCheckout.querySelectorAll('.subtotal-product-price')
        let subtotalProductWeights = cartCheckout.querySelectorAll('.subtotal-product-weight')

        // subsummaries
        let subsummaries = cartCheckout.querySelectorAll('.subsummary')
        let subsummaryEstimations = cartCheckout.querySelectorAll('.subsummary-estimation')
        let subsummaryShippingCosts = cartCheckout.querySelectorAll('.subsummary-shipping-cost')
        let subsummaryBills = cartCheckout.querySelectorAll('.subsummary-bill')

        // summary containers
        let summaryShippingCostContainer = cartCheckout.querySelector('.summary-shipping-cost-container')
        let summaryBillContainer = cartCheckout.querySelector('.summary-bill-container')

        // summaries
        let summaryShippingCost = cartCheckout.querySelector('.summary-shipping-cost')
        let summaryBill = cartCheckout.querySelector('.summary-bill')

        for (let i = 0; i < supllierShippers.length; i++) {

            // retrieving data
            let supplierShipper = supllierShippers[i]

            let subtotalProductPrice = parseInt(subtotalProductPrices[i].innerHTML)
            let subtotalProductWeight = parseInt(subtotalProductWeights[i].innerHTML)

            let subsummary = subsummaries[i]
            let subsummaryEstimation = subsummaryEstimations[i]
            let subsummaryShippingCost = subsummaryShippingCosts[i]
            let subsummaryBill = subsummaryBills[i]

            // counting subsummary
            supplierShipper.addEventListener('change', function () {
                if (supplierShipper.value == 'pengiriman') {
                    subsummary.style.display = 'none'
                    summaryShippingCostContainer.style.display = 'none'
                    summaryBillContainer.style.display = 'none'
                }
                else {
                    subsummary.style.display = 'block'
                    if (supplierShipper.value == 'instan') {
                        subsummaryEstimation.innerHTML = 'arrive in 3 to 6 hours'
                        subsummaryShippingCost.innerHTML = 10000 + 50 * subtotalProductWeight
                        subsummaryBill.innerHTML = subtotalProductPrice + (10000 + 50 * subtotalProductWeight)
                    }
                    else if (supplierShipper.value == 'same day') {
                        subsummaryEstimation.innerHTML = 'arrive in 6 to 8 hours'
                        subsummaryShippingCost.innerHTML = 10000 + 40 * subtotalProductWeight
                        subsummaryBill.innerHTML = subtotalProductPrice + (10000 + 40 * subtotalProductWeight)
                    }
                    else if (supplierShipper.value == 'reguler') {
                        subsummaryEstimation.innerHTML = 'arrive in 1 to 3 days'
                        subsummaryShippingCost.innerHTML = 10000 + 20 * subtotalProductWeight
                        subsummaryBill.innerHTML = subtotalProductPrice + (10000 + 20 * subtotalProductWeight)
                    }
                    else if (supplierShipper.value == 'kargo') {
                        subsummaryEstimation.innerHTML = 'arrive in 3 to 7 days'
                        subsummaryShippingCost.innerHTML = 10000 + 5 * subtotalProductWeight
                        subsummaryBill.innerHTML = subtotalProductPrice + (10000 + 5 * subtotalProductWeight)
                    }

                    // counting summary
                    let totalShippingCost = 0
                    let totalBill = 0
                    for (let j = 0; j < supllierShippers.length; j++) {
                        totalShippingCost += parseInt(subsummaryShippingCosts[j].innerHTML)
                        totalBill += parseInt(subsummaryBills[j].innerHTML)
                        if (supllierShippers[j].value == 'pengiriman') {
                            break
                        }
                        else if (j == supllierShippers.length - 1) {
                            summaryShippingCostContainer.style.display = 'flex'
                            summaryBillContainer.style.display = 'flex'
                            summaryShippingCost.innerHTML = totalShippingCost
                            summaryBill.innerHTML = totalBill
                        }
                    }
                }
            })
        }
    }
})

// Counting change action inside /cart/checkoutOne page
$(document).ready(function () {
    let cartCheckoutOne = document.querySelector('.cart-checkout-one')
    if (cartCheckoutOne) {

        // supplier
        let supplierShipper = cartCheckoutOne.querySelector('.supplier-shipper')

        // product
        let productQuantity = cartCheckoutOne.querySelector('.product-quantity')
        let productWeight = parseInt(cartCheckoutOne.querySelector('.product-weight').innerHTML)
        let productPrice = parseInt(cartCheckoutOne.querySelector('.product-price').innerHTML)

        // subsummary
        let subsummary = cartCheckoutOne.querySelector('.subsummary')
        let subsummaryEstimation = cartCheckoutOne.querySelector('.subsummary-estimation')

        // summary container
        let summaryItemContainer = cartCheckoutOne.querySelector('.summary-item-container')
        let summaryWeightContainer = cartCheckoutOne.querySelector('.summary-weight-container')
        let summaryShippingCostContainer = cartCheckoutOne.querySelector('.summary-shipping-cost-container')
        let summaryBillContainer = cartCheckoutOne.querySelector('.summary-bill-container')

        // summary
        let summaryItem = cartCheckoutOne.querySelector('.summary-item')
        let summaryWeight = cartCheckoutOne.querySelector('.summary-weight')
        let summaryShippingCost = cartCheckoutOne.querySelector('.summary-shipping-cost')
        let summaryBill = cartCheckoutOne.querySelector('.summary-bill')

        // counting summary and subsumary
        function count() {
            if (supplierShipper.value == 'pengiriman') {
                subsummary.style.display = 'none'
                summaryShippingCostContainer.style.display = 'none'
                summaryBillContainer.style.display = 'none'
            }
            else {
                subsummary.style.display = 'block'
                summaryShippingCostContainer.style.display = 'flex'
                summaryBillContainer.style.display = 'flex'
                if (supplierShipper.value == 'instan') {
                    subsummaryEstimation.innerHTML = 'arrive in 3 to 6 hours'
                    summaryShippingCost.innerHTML = 10000 + (50 * productWeight * parseInt(productQuantity.value))
                    summaryBill.innerHTML = productPrice + (10000 + 50 * productWeight * parseInt(productQuantity.value))
                }
                else if (supplierShipper.value == 'same day') {
                    subsummaryEstimation.innerHTML = 'arrive in 6 to 8 hours'
                    summaryShippingCost.innerHTML = 10000 + 40 * productWeight * parseInt(productQuantity.value)
                    summaryBill.innerHTML = productPrice + (10000 + 40 * productWeight * parseInt(productQuantity.value))
                }
                else if (supplierShipper.value == 'reguler') {
                    subsummaryEstimation.innerHTML = 'arrive in 1 to 3 days'
                    summaryShippingCost.innerHTML = 10000 + 20 * productWeight * parseInt(productQuantity.value)
                    summaryBill.innerHTML = productPrice + (10000 + 20 * productWeight * parseInt(productQuantity.value))
                }
                else if (supplierShipper.value == 'kargo') {
                    subsummaryEstimation.innerHTML = 'arrive in 3 to 7 days'
                    summaryShippingCost.innerHTML = 10000 + 5 * productWeight * parseInt(productQuantity.value)
                    summaryBill.innerHTML = productPrice + (10000 + 5 * productWeight * parseInt(productQuantity.value))
                }
            }
        }

        supplierShipper.addEventListener('change', function () {
            count()
        })

        productQuantity.addEventListener('change', function () {
            count()
        })
    }
})