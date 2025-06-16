class ProductViewHandler {

    constructor() {

        this.cacheDOM()
        this.imageSwitcher()
        this.listenForEvents()

    }

    cacheDOM() {

        this.addCartbtn = document.querySelector('#add-to-cart-btn')
        this.removeCartbtn = document.querySelector('#remove-from-cart-btn')
        this.plusBtn = document.querySelector('#btn-plus');
        this.minusBtn = document.querySelector('#btn-minus');
        this.inputQty = document.querySelector('#input-qty');
        this.displayQty = document.querySelector('#qty-value');
        this.images = document.querySelectorAll('#thumbnail');
        this.sizeSelected = document.querySelectorAll('#size');
        this.submissionForm = document.querySelector('#product-details')
        this.deletionForm = document.querySelector('#remove-item')
        this.blackDot = document.querySelector('#cart-black-dot')
        this.individualItemPrice = document.querySelector('#totalOrderValue')
        this.qty = 1
    }

    listenForEvents() {

        this.plusBtn.addEventListener('click', () => this.increaseQty())
        this.minusBtn.addEventListener('click', () => this.decreaseQty())
        this.submissionForm.addEventListener('submit', (e) => this.addToCart(e))
    }


    imageSwitcher() {

        this.images.forEach((i) => i.addEventListener('click', (e) => {
            document.querySelector('#mainImage').src = i.src;
        })
        )
    }

    increaseQty() {

        this.qty += 1
        this.displayQty.textContent = this.qty;
        this.inputQty.value = this.qty;
        this.displayQty.setAttribute('data-qty', this.qty)
        this.individualItemPrice.setAttribute('data-price', this.individualItemPrice.innerHTML * this.qty)

    }

    decreaseQty() {

        if (this.qty > 1) {
            this.qty -= 1
            this.displayQty.textContent = this.qty;
            this.inputQty.value = this.qty;
            this.displayQty.setAttribute('data-qty', this.qty)
            this.individualItemPrice.setAttribute('data-price', this.individualItemPrice.textContent * this.qty)
        }

    }

    cartDotVisibility(cartCount = 0) {
        cartCount > 0 ? this.blackDot.classList.replace('opacity-0', 'opacity-100') : this.blackDot.classList.replace('opacity-100', 'opacity-0');
    }

    async addToCart(e) {

        e.preventDefault();
        const formData = new FormData(this.submissionForm);
        try {

            const response = await fetch('/product/cart', {

                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                    'Accept': 'application/json',
                },
                body: formData
            })

            if (!response.ok) {
                throw new Error(await response.text())
            }

            const data = await response.json()

            if (data.status === 'success') {
                this.cartDotVisibility(data.cartCount);
                this.addCartbtn.classList.add('hidden')
                this.removeCartbtn.classList.remove('hidden')
            }
        }
        catch (error) {
            console.error('Some error occured while adding.', error)
            this.addCartbtn.classList.remove('bg-white', 'hover:bg-gray-100')
            this.addCartbtn.classList.add('bg-red-600', 'hover:bg-red-500')
            this.addCartbtn.innerHTML = 'Oops ! Failed to add in cart.'
        }

    }





}


document.addEventListener('DOMContentLoaded', () => new ProductViewHandler())















