
class LogInDiscountHandler {

    constructor() {

        this.show()
        this.listenForEvents()

    }

    show() {

        if (!localStorage.getItem('discountClaimed')) {
            setTimeout(() => {
                document.querySelector('#main').classList.replace('hidden', 'flex');
            }, 3000)
        }
    }

    listenForEvents(){
        document.querySelector('#close-btn').addEventListener('click', () => document.querySelector('#main').classList.replace('flex', 'hidden'))
        document.querySelector('#no-thanks').addEventListener('click', () => document.querySelector('#main').classList.replace('flex', 'hidden'))
        document.querySelector('#submit').addEventListener('click', (e) => this.store(e))
    }
    

    async store(e) {

        e.preventDefault();
        localStorage.setItem('discountClaimed', true)

        const form = document.querySelector('#mobile_number');

        const formData = new FormData(form)

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
            document.querySelector('.discount-offer').classList.add('hidden')
            document.querySelector('.space-y-12').classList.remove('hidden')
        }

    }


}

document.addEventListener('DOMContentLoaded', () => new LogInDiscountHandler());



