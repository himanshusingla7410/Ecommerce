document.addEventListener('DOMContentLoaded', () => {
    const addCartbtn = document.querySelector('#add-to-cart-btn')
    const removeCartbtn = document.querySelector('#remove-from-cart-btn')
    const plusBtn = document.querySelector('#btn-plus');
    const minusBtn = document.querySelector('#btn-minus');
    const inputQty = document.querySelector('#input-qty');
    const displayQty = document.querySelector('#qty-value');
    const images = document.querySelectorAll('#thumbnail');
    const sizeSelected = document.querySelectorAll('#size');
    const submissionForm = document.querySelector('#product-details')
    const deletionForm = document.querySelector('#remove-item')
    const blackDot = document.querySelector('#cart-black-dot')
    const individualItemPrice = document.querySelector('#totalOrderValue')


    // Image Switching
    images.forEach((i) => {
        i.addEventListener('click', (e) => {
            document.querySelector('#mainImage').src = i.src;
        })
    })

    // Qty Updating
    let qty = 1

    plusBtn.addEventListener('click', (e) => {
        qty += 1
        displayQty.textContent = qty;
        inputQty.value = qty ;
        displayQty.setAttribute('data-qty', qty)
        individualItemPrice.setAttribute('data-price', individualItemPrice.innerHTML * qty)
    })
    minusBtn.addEventListener('click', (e) => {
        if (qty > 1) {
            qty -= 1
            displayQty.textContent = qty;
            inputQty.value = qty ;
            displayQty.setAttribute('data-qty', qty)
            individualItemPrice.setAttribute('data-price', individualItemPrice.textContent * qty)
        }
    })

    // Cart black dot visibility
    function cartDotVisibility($cartCount = 0) {

        if ($cartCount > 0) {
            blackDot.classList.replace('opacity-0', 'opacity-100');
        } else {
            blackDot.classList.replace('opacity-100', 'opacity-0');
        }

    }


    // Request to add items in cart
    submissionForm.addEventListener('submit', (e) => {
        e.preventDefault();
        const formData = new FormData(submissionForm);

        fetch('/product/cart', {

            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                'Accept': 'application/json',
            },
            body: formData
        })
            .then(response => {
                if (!response.ok) {
                    return response.text().then(text => { throw new Error(text) });
                }
                return response.json();
            })
            .then(data => {

                if (data.status === 'success') {
                    cartDotVisibility(data.cartCount);
                    addCartbtn.classList.add('hidden')
                    removeCartbtn.classList.remove('hidden')
                }
            })
            .catch(error => {
                console.error('Fetch error', error)
                addCartbtn.classList.remove('bg-white', 'hover:bg-gray-100')
                addCartbtn.classList.add('bg-red-600', 'hover:bg-red-500')
                addCartbtn.innerHTML = 'Oops ! Failed to add in cart.'
            })

    })


    // Request to remove items from cart
    deletionForm.addEventListener('submit', (e) => {
        e.preventDefault();

        const formData = new FormData(deletionForm)
        console.log(deletionForm);
        formData.append('_method', 'DELETE')
        fetch('/product/cart', {

            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                'Accept': 'application/json'
            },
            body: formData
        })
            .then(response => response.json())
            .then(data => {

                if (data.status === 'success') {
                    cartDotVisibility(data.cartCount);
                    removeCartbtn.classList.add('hidden')
                    addCartbtn.classList.remove('hidden')
                }

            })
            .catch(error => {
                removeCartbtn.classList.remove('bg-green-600', 'hover:bg-green-500')
                removeCartbtn.classList.add('bg-red-600', 'hover:bg-red-500')
                removeCartbtn.innerHTML = 'Oops ! Failed to remove from cart.'
                console.log('Fetch error', error)

            })

    })











})

