
class LogInDiscountHandler {

    constructor() {

        this.show()
        this.listenForEvents()

    }

    listenForEvents() {
        document.querySelector('#copy-btn')?.addEventListener('click', () => this.copyCode());
        document.querySelector('#close-btn').addEventListener('click', () => document.querySelector('#main').classList.replace('flex', 'hidden'))
        document.querySelector('#no-thanks')?.addEventListener('click', () => document.querySelector('#main').classList.replace('flex', 'hidden'))
        document.querySelector('.shop-now')?.addEventListener('click', () => localStorage.setItem('discountClaimed', true))

    }

    show() {

        if (!localStorage.getItem('discountClaimed')) {
            setTimeout(() => {
                document.querySelector('#main').classList.replace('hidden', 'flex');
            }, 3000)
        }
    }


    async copyCode() {

        const couponCode = document.getElementById('coupon-code').value;
        const btn = document.querySelector('#copy-btn');
        const tooltip = btn.querySelector('span');
        const icon = btn.querySelector('svg');

        try {
            await navigator.clipboard.writeText(couponCode);

            tooltip.textContent = 'Copied!';
            tooltip.classList.add('bg-green-500');
            icon.classList.add('text-green-500');

            setTimeout(() => {
                tooltip.textContent = 'Copy';
                tooltip.classList.remove('bg-green-500');
                icon.classList.remove('text-green-500');
            }, 5000);

        } catch (err) {
            console.error('Failed to copy: ', err);
            tooltip.textContent = 'Failed!';
            tooltip.classList.add('bg-red-500');
            setTimeout(() => {
                tooltip.textContent = 'Copy';
                tooltip.classList.remove('bg-red-500');
            }, 2000);
        }

    }

    // document.querySelector('#submit').addEventListener('click', (e) => this.store(e))
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



