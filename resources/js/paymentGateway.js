import {feedback} from './helper.js'

class paymentHandler {

    constructor() {
        this.cacheDOM()
        this.listenForEvents()
    }

    cacheDOM() {
        this.proceedBtn = document.querySelector('#rzp-button1')
        this.amount = document.querySelector('#totalAmt').textContent
        this.couponCode = document.querySelector('#couponCode')?.textContent
        this.addresses = document.querySelectorAll('input[name="select_address"]')
        this.attention = document.querySelector('.attention')
        this.fail = document.querySelector('.fail')
    }


    listenForEvents() {
        this.proceedBtn.addEventListener('click', (e) => this.createOrder(e))
        this.getAddress()
    }

    getAddress() {
        this.addresses.forEach((address) => {
            address.addEventListener('change', (e) => {
                this.address = e.target.value;
                this.mobileNumber = e.target.parentElement.parentElement.nextElementSibling.querySelector('#mobile-number').textContent
                this.email = e.target.nextElementSibling.nextElementSibling.textContent
                this.name = e.target.nextElementSibling.textContent
            })
        })
    }

    async createOrder(e) {
        e.preventDefault();

        if (!this.address) {
            feedback(this.attention)

        } else {

            
            this.ProceedbtnUpdate('bg-black', 'bg-gray-800', 'Processing...')


            try {
                const response = await fetch('/createOrder', {
                    method: 'POST',
                    headers: {
                        'content-type': 'application/json',
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                    },
                    body: JSON.stringify({
                        "amount": this.amount,
                        "currency": "INR",
                        "receipt": "receipt1",
                        "notes": {
                            "couponCode": this.couponCode ?? "",
                            "address": this.address
                        }
                    })
                })

                if (!response.ok) {
                    console.log('rsp not ok')
                    throw new Error(`${response.status}: ${response.text()}`)
                }

                const data = await response.json()

                if (data.status === 'success') {
                    
                    var options = {
                        "key": data.key, // Enter the Key ID generated from the Dashboard
                        "amount": data.amount, // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
                        "currency": "INR",
                        "name": "Dilkash",
                        "description": "Test Transaction",
                        "image": "https://example.com/your_logo",
                        "order_id": data.id, //This is a sample Order ID. Pass the `id` obtained in the response of Step 1
                        "callback_url": `/api/verifyPayment?orderNumber=${data.orderNumber}`,
                        "prefill": {
                            "name": this.name,
                            "email": this.email,
                            "contact": this.mobileNumber
                        },
                        "notes": {
                            "address": "Razorpay Corporate Office"
                        },
                        "theme": {
                            "color": "#3399cc"
                        }
                    };
                    var rzp1 = new Razorpay(options);
                    rzp1.on('payment.failed', function (response) {
                        alert(response.error.code);
                        alert(response.error.description);
                        alert(response.error.source);
                        alert(response.error.step);
                        alert(response.error.reason);
                        alert(response.error.metadata.order_id);
                        alert(response.error.metadata.payment_id);
                    });

                    rzp1.open();

                }

            }
            catch (error) {
                console.log('Error while sending request for order creation.')
                this.ProceedbtnUpdate('bg-gray-800', 'bg-black', 'Proceed to pay')
                feedback(this.fail)
            }
        }
    }


    ProceedbtnUpdate($toReplace, $withReplace, $text) {
        this.proceedBtn.classList.replace($toReplace, $withReplace)
        this.proceedBtn.textContent = $text
    }



}

document.addEventListener('DOMContentLoaded', () => new paymentHandler())