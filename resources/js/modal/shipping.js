class ShippingHandler {

    constructor() {
        this.cacheDOM()
        this.listenForEvents()
        // this.setObserver()
    }

    cacheDOM() {

        this.main = document.querySelector('#address-form')
        this.addAddressBtn = document.querySelector('#add-address-btn')
        this.body = document.querySelector('body')
        this.cancelBtn = document.querySelector('#cancel-btn')
        this.editBtn = document.querySelectorAll('.edit-btn')
        this.form = document.querySelector('#addressForm')
        this.updateBtn = document.querySelector('#update-btn')
        this.submitBtn = document.querySelector('#submit-btn')
        this.addressFormCloseBtn = document.querySelector('#form-close-btn')
    }

    listenForEvents() {
        this.isAddingMode = false
        this.addAddressBtn.addEventListener('click', () => {
            this.show()
        })
        this.cancelBtn.addEventListener('click', () => this.hide())
        this.addressFormCloseBtn.addEventListener('click', () => this.hide())
        this.editBtn.forEach(btn => btn.addEventListener('click', (e) => this.showFormToEdit(e)))
    }

    //redundant
    // setObserver() {

    //     this.observer = new IntersectionObserver((entries) => {
    //         entries.forEach((entry) => {

    //             if (entry.isIntersecting) {
    //                 this.preloadData(entry.target.getAttribute('data-id'))
    //                 this.observer.unobserve(entry.target)
    //             }
    //         })
    //     }, { threshold: 0.50 })

    //     this.editBtn.forEach(btn => this.observer.observe(btn))
    // }

    show() {
        this.resetForm()
        this.main.classList.replace('hidden', 'flex');
        this.body.classList.add('overflow-hidden')
        this.updateBtn.classList.add('hidden')
        this.submitBtn.classList.remove('hidden')
    }

    resetForm() {

        const fields = ['#first_name', '#last_name', '#email', '#mobile_number', '#address', '#city', '#state', '#postal_code']

        fields.forEach((field) => {
            document.querySelector(field).value = ""
        })


    }

    hide() {
        this.main.classList.replace('flex', 'hidden');
        this.body.classList.remove('overflow-hidden')
    }


    async preloadData(id) {

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
        catch (error) {
            console.error(`Failed to fetch data for ${id}`, error);
        }
    }

    edit(data) {

        const fields = {
            '#first_name': data.first_name,
            '#last_name': data.last_name,
            '#email': data.email,
            '#mobile_number': data.mobile_number,
            '#address': data.address,
            '#city': data.city,
            '#state': data.state,
            '#postal_code': data.postal_code,
        }

        Object.entries(fields).forEach(([key, value]) => {
            document.querySelector(key).value = value
        })

    }

    showFormToEdit(e) {

        this.resetForm()
        this.preloadData(e.target.getAttribute('data-id'))
        this.main.classList.replace('hidden', 'flex');
        this.body.classList.add('overflow-hidden')
        this.updateBtn.classList.remove('hidden')
        this.submitBtn.classList.add('hidden')
    }




}



document.addEventListener('DOMContentLoaded', () => new ShippingHandler())