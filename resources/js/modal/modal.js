document.addEventListener('DOMContentLoaded', function () {

    const orderDetailsModal = {

        init() {

            this.cacheDom(),
            this.listenForEvents()

        },


        cacheDom() {

            this.buyBtn = document.querySelector('#buy-btn')
            this.modal = document.querySelector('#modalOverlay')
            this.closeBtn = document.querySelector('#close-btn')
            this.orderSummary = document.querySelector('#order-summary')
            this.subTotal = document.querySelector('#sub-total')
            this.arrow = document.querySelector('#arrow')
            this.productName = document.querySelectorAll('.product')
            this.couponApplied = document.querySelector('#remove-coupon')            

        },

        listenForEvents() {

            this.buyBtn.addEventListener('click', this.showModal.bind(this))
            this.closeBtn.addEventListener('click', this.hideModal.bind(this))
            this.orderSummary.addEventListener('click', this.toggleSubSummary.bind(this))
        },


        showModal() {
            
            this.modal.classList.remove('hidden');
            document.body.classList.add('overflow-hidden');
            if (this.couponApplied.classList.contains('hidden')) {
                this.updatingOrderAmt('#modal-total-price')
            }
            this.updatingOrderAmt('#modal-sub-total-price')
            this.updatingOrderAmt('#coupon-discount-amt', -0.1)
            this.updatingOrderAmt('#savings', 0.1)
            this.updatingQty('#totalOrderValue', document.querySelector('#qty-value').dataset.qty)
            document.querySelector('#savings').setAttribute('data-savings', parseFloat(document.querySelector('#totalOrderValue').getAttribute('data-price')) * 0.1 )

        },

        hideModal() {

            this.modal.classList.add('hidden');
            document.body.classList.remove('overflow-hidden');

        },

        toggleSubSummary() {

            if (this.subTotal.classList.contains('hidden')) {
                this.arrow.src = 'https://fastrr-boost-ui.pickrr.com/assets/images/svg/up-arrow.svg';
            } else {
                this.arrow.src = 'https://fastrr-boost-ui.pickrr.com/assets/images/svg/down-arrow.svg';
            }
            this.subTotal.classList.toggle('hidden');

        },


        // Updating amount of individual product
        updatingOrderAmt(element, mutliplier = 1) {

            const price = parseFloat(document.querySelector('#totalOrderValue').getAttribute('data-price'))
            document.querySelector(element).innerHTML = price * mutliplier
        },


        // Updating Qty in modal at sub summary
        updatingQty() {

            this.productName.forEach((product) => {

                document.querySelectorAll('#item').forEach((i) => {

                    if (product.textContent.trim() === i.dataset.productname) {
                        i.querySelector('.qty').textContent = product.closest('td')?.nextElementSibling.querySelector('#qty-value').dataset.qty ?? document.querySelector('#qty-value').dataset.qty
                    }
                })
            })

        }



    }

    orderDetailsModal.init()





})