document.addEventListener('DOMContentLoaded', () => {

    const data = {

        init() {

            this.cacheDOM();
            this.listenForEvents();

        },

        cacheDOM() {

            this.coupon = document.querySelector('#view-coupons')

        },

        listenForEvents() {

            this.coupon.addEventListener('click', (e) => {
                e.preventDefault();
                const value = document.querySelector('#view-coupons').dataset.value

                fetch(`/coupon?orderValue=${value}`, {
                    method: 'GET',
                    headers: {
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                    },
                })
                    .then(response => {
                        if (!response.ok) {
                            return response.text().then(text => { throw new Error(text) })
                        } else {
                            return response.json()
                        }
                    })
                    .then(data => {
                        if (data.status === 'success') {
                            this.displayingCoupons(data.data);
                        }
                    })
                    .catch(error => {
                        console.log(error);
                    })
            })
        },

        displayingCoupons(data) {

            const viewCoupons = document.querySelector('#applicable-coupons')

            data.forEach(coupon => {

                const couponCard = document.createElement('div')
                couponCard.className = "border border-gray-300 rounded-md m-1 p-3 mt-4"
                couponCard.innerHTML = `
                        <div class="flex justify-between items-center">
                            <div class="flex">
                                <img src="https://fastrr-boost-ui.pickrr.com/assets/images/svg/discount_icon.svg" alt="coupon-logo" class="pr-0.5">
                                <span>${coupon.code}</span>
                            </div>
                            <button class="border border-indigo-500 px-4 py-0.5  rounded-md">Apply</button>
                        </div>
                        <div class="mt-3">
                            <p class="text-green-800 font-semibold text-start text-sm">Apply this coupon and save 780</p>
                            <p class="text-xs text-start">${coupon.description}</p>
                        </div>
                `
                viewCoupons.appendChild(couponCard)
            });

            viewCoupons.classList.contains('hidden') ? viewCoupons.classList.remove('hidden') : viewCoupons.classList.add('hidden')

        }



    }


    data.init();







})