class CartHandler {

    constructor() {
        this.cacheDOM()
        this.listenForEvents()
    }

    cacheDOM() {

        this.minusBtn = document.querySelectorAll('#minus-btn');
        this.plusBtn = document.querySelectorAll('#plus-btn');
        this.orderValue = document.querySelector('#totalOrderValue');
        this.estShippingbtn = document.querySelector('#est-shipping')
        this.message = document.querySelector('#message')
        this.charges = document.querySelector('#charges')
        this.error = document.querySelector('#error')

    }

    listenForEvents() {

        this.minusBtn.forEach(btn => this.minusQty(btn))
        this.plusBtn.forEach(btn => this.plusQty(btn))
        this.estShippingbtn.addEventListener('click', () => this.estShipping())
    }


    minusQty(btn) {

        btn.addEventListener('click', (e) => {
            const qty = e.target.nextElementSibling;
            const price = e.target.closest('tr').querySelector('#price').innerHTML;

            if (parseInt(qty.innerHTML) > 1) {
                qty.innerHTML = parseInt(qty.innerHTML) - 1;
                this.orderValue.innerHTML = parseInt(this.orderValue.innerHTML) - parseInt(price);
                this.orderValue.setAttribute('data-price', this.orderValue.innerHTML.trim())
                qty.setAttribute('data-qty', parseInt(qty.innerHTML.trim()))
            }
        })
    }


    plusQty(btn) {

        btn.addEventListener('click', (e) => {
            const qty = e.target.previousElementSibling;
            const price = e.target.closest('tr').querySelector('#price').innerHTML;
            if (parseInt(qty.innerHTML) < 10) {
                qty.innerHTML = parseInt(qty.innerHTML) + 1;
                this.orderValue.innerHTML = parseInt(this.orderValue.innerHTML.trim()) + parseInt(price.trim());
                this.orderValue.setAttribute('data-price', this.orderValue.innerHTML.trim())
                qty.setAttribute('data-qty', parseInt(qty.innerHTML.trim()))
            }
        })
    }


    async estShipping() {

        if (!parseInt(document.querySelector('#zip-code').value)) {
            this.error.classList.remove('hidden')
            if (!this.message.classList.contains('hidden')) {
                this.message.classList.add('hidden')
            }
        }

        const url = new URLSearchParams({
            'pickup_postcode': 141001,
            'delivery_postcode': parseInt(document.querySelector('#zip-code').value),
            'weight': 2,
            'cod': 1
        }).toString()

        "https://developer.hdfcsec.com/oapi/v1/orders/regular/25071600233448?api_key=358604873a1f46f4900d6f64c5cbf631"

        const response = await fetch(`https://apiv2.shiprocket.in/v1/external/courier/serviceability/?${url}`, {
            method: "GET",
            headers: {
                'Content-Type': 'application/json',
                'Authorization': 'Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJzdWIiOjcyNTE4ODYsInNvdXJjZSI6InNyLWF1dGgtaW50IiwiZXhwIjoxNzUzNjg4NzkwLCJqdGkiOiI1cVRjTjlDM1VKdlhXblJzIiwiaWF0IjoxNzUyODI0NzkwLCJpc3MiOiJodHRwczovL3NyLWF1dGguc2hpcHJvY2tldC5pbi9hdXRob3JpemUvdXNlciIsIm5iZiI6MTc1MjgyNDc5MCwiY2lkIjo2MTUwMDUxLCJ0YyI6MzYwLCJ2ZXJib3NlIjpmYWxzZSwidmVuZG9yX2lkIjowLCJ2ZW5kb3JfY29kZSI6IiJ9.8lpgOoq26WB2h6hVglC2_K92UPUStFS26xulxzrF_yo',
            },
        })

        if (!response.ok) {
            throw new Error(response.text())
        }

        const data = await response.json()

        if (data.status === 200) {
            if (this.message.classList.contains('hidden')) {
                this.message.classList.remove('hidden')
            }

            if(!this.error.classList.contains('hidden')){
                this.error.classList.add('hidden')
            }
            this.charges.textContent = data.data.available_courier_companies[0].freight_charge
        }

        if (data.status !== 200) {
            this.error.classList.remove('hidden')
            if (!this.message.classList.contains('hidden')) {
                this.message.classList.add('hidden')
            }
        }

    }




}





document.addEventListener('DOMContentLoaded', () => new CartHandler())


