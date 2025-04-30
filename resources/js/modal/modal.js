document.addEventListener('DOMContentLoaded', function () {

    const buyBtn = document.querySelector('#buy-btn')
    const modal = document.querySelector('#modalOverlay')
    const closeBtn = document.querySelector('#close-btn')
    const orderSummary = document.querySelector('#order-summary')
    const subTotal = document.querySelector('#sub-total')
    const applyBtn = document.querySelector('#apply-btn')
    const removeCoupon = document.querySelector('#remove-coupon')
    const coupon = document.querySelector('#coupon-code')
    const couponAppliedMessage = document.querySelector('#coupon-applied-message')
    const arrow = document.querySelector('#arrow')
    const couponDiscount = document.querySelector('#coupon-discount')
    const productName = document.querySelectorAll('.product')


    // Displaying modal
    buyBtn.addEventListener('click', () => {
        modal.classList.remove('hidden');
        document.body.classList.add('overflow-hidden');
        updatingOrderAmt('#modal-total-price' )
        updatingOrderAmt('#modal-sub-total-price')
        updatingOrderAmt('#coupon-discount-amt', -0.1)
        updatingOrderAmt('#coupon-saving-amt', 0.1)
        updatingQty('#totalOrderValue', document.querySelector('#qty-value').dataset.qty)
    })

    // Closing modal
    closeBtn.addEventListener('click', () => {
        modal.classList.add('hidden');
        document.body.classList.remove('overflow-hidden');
    })

    // Displaying Sub total
    orderSummary.addEventListener('click', (e) => {

        if (subTotal.classList.contains('hidden')) {
            arrow.src = 'https://fastrr-boost-ui.pickrr.com/assets/images/svg/up-arrow.svg';
        } else {
            arrow.src = 'https://fastrr-boost-ui.pickrr.com/assets/images/svg/down-arrow.svg';
        }
        subTotal.classList.toggle('hidden');

    })

    // Apply coupon
    applyBtn.addEventListener('click', (e) => {

        applyBtn.classList.add('hidden')
        removeCoupon.classList.remove('hidden')
        coupon.textContent = 'XOXO10 applied!'
        couponAppliedMessage.innerHTML = 'You save'
        updatingOrderAmt('#modal-total-price', 0.9)
        couponDiscount.classList.add('flex')
        couponDiscount.classList.remove('hidden')

    })

    // Remove coupon
    removeCoupon.addEventListener('click', (e) => {
        removeCoupon.classList.add('hidden')
        applyBtn.classList.remove('hidden')
        coupon.textContent = 'XOXO10'
        couponAppliedMessage.innerHTML = 'Apply coupon and save'
        updatingOrderAmt('#modal-total-price')
        couponDiscount.classList.remove('flex')
        couponDiscount.classList.add('hidden')
    })

    // Updating amount of individual product
    function updatingOrderAmt(element, mutliplier = 1) {

        const price = document.querySelector('#totalOrderValue').getAttribute('data-price')
        document.querySelector(element).innerHTML = price * mutliplier
    }

    function updatingQty() {

        productName.forEach((product) => {

            document.querySelectorAll('#item').forEach((i) => {

                if (product.textContent.trim() === i.dataset.productname) {
                    i.querySelector('.qty').textContent = product.closest('td')?.nextElementSibling.querySelector('#qty-value').dataset.qty ?? document.querySelector('#qty-value').dataset.qty
                }
            })
        })

    }









})