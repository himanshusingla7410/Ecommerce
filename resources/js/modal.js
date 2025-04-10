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
const orderSummaryPrice = document.querySelector('#price')
const couponDiscount = document.querySelector('#coupon-discount')


// Displaying modal
buyBtn.addEventListener('click', () => {
    modal.classList.remove('hidden');
    document.body.classList.add('overflow-hidden');
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
    }else {
        arrow.src= 'https://fastrr-boost-ui.pickrr.com/assets/images/svg/down-arrow.svg';
    }
    subTotal.classList.toggle('hidden');

})

// Apply coupon
applyBtn.addEventListener('click', (e) => {

    
    applyBtn.classList.add('hidden')
    removeCoupon.classList.remove('hidden')
    coupon.textContent = 'XOXO10 applied!'
    couponAppliedMessage.innerHTML = 'You save'
    orderSummaryPrice.innerHTML = orderSummaryPrice.dataset.price *0.9
    couponDiscount.classList.add('flex')
    couponDiscount.classList.remove('hidden')
})

// Remove coupon
removeCoupon.addEventListener('click', (e) => {
    removeCoupon.classList.add('hidden')
    applyBtn.classList.remove('hidden')
    coupon.textContent = 'XOXO10'
    couponAppliedMessage.innerHTML = 'Apply coupon and save'
    orderSummaryPrice.innerHTML = orderSummaryPrice.dataset.price
    couponDiscount.classList.remove('flex')
    couponDiscount.classList.add('hidden')
})