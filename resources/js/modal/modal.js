import {feedback} from '../helper.js'

class orderDetailsModal {

    constructor() {

        this.cacheDom()
        this.listenForEvents()

    }


    cacheDom() {

        this.buyBtn = document.querySelector('#buy-btn')
        this.modal = document.querySelector('#modalOverlay')
        this.closeBtn = document.querySelector('#close-btn')
        this.orderSummary = document.querySelector('#order-summary')
        this.subTotal = document.querySelector('#sub-total')
        this.arrow = document.querySelector('#arrow')
        this.productName = document.querySelectorAll('.product')
        this.couponApplied = document.querySelector('#remove-coupon')
        this.formSubmitBtn = document.querySelector('#submit')
        this.placeOrdeBtn = document.querySelector('.place-order')
        this.finalOrderAmt = document.querySelector('#final-order-amt')
        this.success = document.querySelector('.success')
    }

    listenForEvents() {

        this.buyBtn.addEventListener('click', () => this.showModal())
        this.closeBtn.addEventListener('click', () => this.hideModal())
        this.orderSummary.addEventListener('click', () => this.toggleSubSummary())
        this.placeOrdeBtn.addEventListener('click', () => this.placingOrder())
        // this.formSubmitBtn.addEventListener('click', (e) => this.store(e))
    }


    showModal() {
        this.modal.classList.remove('hidden');
        document.body.classList.add('overflow-hidden');
        this.updateAmtInModal()

    }

    hideModal() {

        this.modal.classList.add('hidden');
        document.body.classList.remove('overflow-hidden');

    }

    toggleSubSummary() {

        const ishidden = this.subTotal.classList.contains('hidden')

        this.arrow.src = ishidden ?
            'https://fastrr-boost-ui.pickrr.com/assets/images/svg/up-arrow.svg' :
            'https://fastrr-boost-ui.pickrr.com/assets/images/svg/down-arrow.svg';

        this.subTotal.classList.toggle('hidden');

    }

    updateAmtInModal() {

        if (this.couponApplied.classList.contains('hidden')) {
            this.updatingOrderAmt('#modal-total-price')
        }
        this.updatingOrderAmt('#modal-sub-total-price')
        this.updatingOrderAmt('#coupon-discount-amt', -0.1)
        this.updatingOrderAmt('#savings', 0.1)
        this.updatingQty('#totalOrderValue', document.querySelector('#qty-value').dataset.qty)
        document.querySelector('#savings').setAttribute('data-savings', parseFloat(document.querySelector('#totalOrderValue').getAttribute('data-price')) * 0.1)

    }


    // Updating amount of individual product
    updatingOrderAmt(element, mutliplier = 1) {

        const price = parseFloat(document.querySelector('#totalOrderValue').getAttribute('data-price'))
        document.querySelector(element).innerHTML = price * mutliplier

        this.finalOrderAmt.value = price

    }


    // Updating Qty in sub summary
    updatingQty() {

        this.productName.forEach((product) => {

            document.querySelectorAll('#item').forEach((i) => {

                if (product.textContent.trim() === i.dataset.productname) {
                    i.querySelector('.qty').textContent = product.closest('td')?.nextElementSibling.querySelector('#qty-value').dataset.qty ?? document.querySelector('#qty-value').dataset.qty
                }
            })
        })

    }

    async store(e) {

        e.preventDefault();

        const form = document.querySelector('#mobile_number');

        const formData = new FormData(form)
        try {
            const response = await fetch('/login', {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                    'Accept': 'application/json'
                },
                body: formData
            })

            if (!response.ok) {
                throw new Error(response.text())
            }

            const data = await response.json()

            if (data.status == 'success') {
                console.log('registered successfully !')
                feedback(this.success)
            }
        } catch (error) {
            console.log(error);
        }


    }

    




}



document.addEventListener('DOMContentLoaded', () => new orderDetailsModal())