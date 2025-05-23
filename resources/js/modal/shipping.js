class ShippingHandler {

    constructor() {
        this.cacheDOM()
        this.listenForEvents()
    }

    cacheDOM() {

        this.main = document.querySelector('#address-form')
        this.addAddressBtn = document.querySelector('#add-address-btn')
        this.body = document.querySelector('body')
        this.cancelBtn = document.querySelector('#cancel-btn')
        this.editBtn = document.querySelectorAll('#edit-btn')
    }

    listenForEvents() {
        this.addAddressBtn.addEventListener('click', () => this.show())
        this.cancelBtn.addEventListener('click', () => this.hide())
        this.editBtn.forEach(btn => btn.addEventListener('click', (e) => this.fetchData(btn, e)))
    }

    show() {
        this.main.classList.replace('hidden', 'flex');
        this.body.classList.add('overflow-hidden')
    }

    hide() {
        this.main.classList.replace('flex', 'hidden');
        this.body.classList.remove('overflow-hidden')

    }

    async fetchData(btn, e) {
        e.preventDefault()
        const id = btn.getAttribute('data-id')

        try {
            const response = await fetch(`/address/${id}`, {
                method: 'GET',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                    'Accept': 'application/json'
                },
            })

            if (!response.ok) {
                throw new Error(await response.text())
            }

            const data = await response.json()

            if (data.status === "success") {
                this.edit(data.data);
            }
        } 
        catch(error){
            console.error('Failed to fetch data.', error);
        }
        
    }

    edit(data) {

        this.main.classList.replace('hidden', 'flex');
        this.body.classList.add('overflow-hidden')

        document.querySelector('#first_name').value = data.first_name
        document.querySelector('#last_name').value = data.last_name
        document.querySelector('#email').value = data.email
        document.querySelector('#mobile_number').value = data.mobile_number
        document.querySelector('#address').value = data.address
        document.querySelector('#city').value = data.city
        document.querySelector('#state').value = data.state
        document.querySelector('#postal_code').value = data.postal_code

    }





}



document.addEventListener('DOMContentLoaded', () => new ShippingHandler())