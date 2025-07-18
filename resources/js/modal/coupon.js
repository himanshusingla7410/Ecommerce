

class couponHandler {

    constructor() {

        this.cacheDOM();
        this.listenForEvents();
        this.setObserver()
        this.applyBtnSetup()
        this.removeCoupon()
    }

    setObserver() {

        this.observer = new IntersectionObserver((entries) => {

            entries.forEach((e) => e.isIntersecting ? this.preloadCoupons() : ""); // this.observer.unobserve(e.target) 

        }, { threshold: 0.50 })

        this.viewCoupons ? this.observer.observe(this.viewCoupons) : "no element"

    }

    cacheDOM() {

        this.coupon = document.querySelector('#view-coupons')
        this.viewCoupons = document.querySelector('#applicable-coupons')
        this.couponContainer = document.querySelector('.view-coupon-container')
        this.subCouponCode = document.querySelector('#sub-coupon-code')
        this.subCouponDiscount = document.querySelector('#coupon-discount-amt')
        this.subCouponDisplay = document.querySelector('#coupon-discount')
        this.defaultApplyBtn = document.querySelector('#default-apply-btn')
        this.couponRemoveBtn = document.querySelector('#remove-coupon')
        this.couponCode = document.querySelector('#coupon-code')
        this.couponAppliedMessage = document.querySelector('#coupon-applied-message')
        this.couponUsedForPlaceOrder = document.querySelector('#final-coupon-used')
        this.savingsForPlaceOrder = document.querySelector('#final-savings')
    }

    async preloadCoupons() {

        const value = document.querySelector('#totalOrderValue').getAttribute('data-price')

        if (!value) {
            return;
        }

        try {
            const response = await fetch(`/coupon?orderValue=${value}`, {
                method: 'GET',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                    'Accept': 'application/json'
                }
            })

            if (!response.ok) {
                throw new Error(await response.text())
            }

            const data = await response.json()

            if (data.status === 'success') {
                this.addingCoupons(data.data)
            }
        }
        catch (error) {
            console.error('Failed to preload', error)
        }
    }


    listenForEvents() {

        this.coupon.addEventListener('click', (e) => this.viewCoupons.classList.toggle('hidden'))
        this.couponRemoveBtn.addEventListener('click', () => this.removeCoupon())

    }



    addingCoupons(data) {

        this.viewCoupons.innerHTML = ""

        data.forEach(coupon => {

            const couponCard = document.createElement('div')
            couponCard.className = "border border-gray-300 rounded-md m-1 p-3 mt-4"
            couponCard.innerHTML = `
                        <div class="flex justify-between items-center">
                            <div class="flex">
                                <img src="https://fastrr-boost-ui.pickrr.com/assets/images/svg/discount_icon.svg" alt="coupon-logo" class="pr-0.5">
                                ${coupon.missingAmount === 0 ?
                    `<span>${coupon.code}</span>` :
                    `<span class="text-gray-500">${coupon.code}</span>`
                }
                            </div>
                            <button type="button" class="apply-btn border ${coupon.missingAmount === 0 ? `border-indigo-500` : `border-gray-500 opacity-50`}  px-4 py-0.5  rounded-md cursor-pointer" data-code = "${coupon.code}">Apply</button>
                        </div>
                        <div class="mt-3">
                            ${coupon.missingAmount === 0 ?
                    `<p id="savings" class=" text-green-800 font-semibold text-start text-sm" data-savings = ${coupon.savings}>Apply this coupon and save ₹ ${coupon.savings}</p>` :
                    `<p class="text-red-800 font-semibold text-start text-sm">Add more items worth ₹ ${coupon.missingAmount} to apply this offer</p>`
                }  
                            <p class="text-xs text-start">${coupon.description}</p>
                        </div>
                `

            this.viewCoupons.appendChild(couponCard)
        });

        this.applyBtnSetup()

    }

    applyBtnSetup() {

        const applybtn = document.querySelectorAll('.apply-btn')

        applybtn.forEach(btn => btn.addEventListener('click', (e) => {

            const code = e.target.dataset.code
            const savingAmt = btn.parentElement.nextElementSibling.querySelector('#savings').dataset.savings
            this.couponApplied(code, savingAmt)

        })

        )

    }

    couponApplied(code, savingAmt) {

        this.couponCode.innerHTML = `${code} applied! `
        this.defaultApplyBtn.classList.add('hidden')
        this.couponRemoveBtn.classList.remove('hidden')
        this.couponAppliedMessage.textContent = "You save"
        document.querySelector('#savings').textContent = ` ₹ ${savingAmt}`
        this.couponContainer.classList.add('hidden')
        this.updatingOrderAmt('#modal-total-price', savingAmt)
        this.subCouponCode.textContent = `Coupon Discount (${code})`
        this.subCouponDiscount.textContent = `- ₹ ${savingAmt}`
        this.subCouponDisplay.classList.replace('hidden', 'flex')
        this.displaySuccessMessage(code, savingAmt)
        this.couponUsedForPlaceOrder.value = code
        this.savingsForPlaceOrder.value = savingAmt
    }



    updatingOrderAmt(element, mutliplier = 0) {

        const price = document.querySelector('#totalOrderValue').getAttribute('data-price')
        document.querySelector(element).innerHTML = price - mutliplier
    }



    displaySuccessMessage(code, savingAmt) {

        const couponSucess = document.querySelector('#coupon-success')
        document.querySelector('#coupon-success-code').textContent = code
        document.querySelector('#coupon-success-savings').textContent = savingAmt

        couponSucess.classList.replace('hidden', 'flex')

        confetti({
            particleCount: 100,
            spread: 70,
            origin: { y: 0.6 }
        })

        if (couponSucess) {
            setTimeout(() => { couponSucess.classList.replace('flex', 'hidden') }, 3000)
        }

    }

    removeCoupon() {

        this.couponRemoveBtn.classList.add('hidden')
        this.defaultApplyBtn.classList.remove('hidden')
        this.couponCode.textContent = 'XOXO-10'
        this.couponAppliedMessage.innerHTML = 'Apply coupon and save'
        this.updatingOrderAmt('#modal-total-price')
        this.subCouponDisplay.classList.replace('flex', 'hidden')
        this.couponContainer.classList.remove('hidden')

    }



    

}


document.addEventListener('DOMContentLoaded', () => new couponHandler())
