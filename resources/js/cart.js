document.addEventListener('DOMContentLoaded', function () {

    const minusBtn = document.querySelectorAll('#minus-btn');
    const plusBtn = document.querySelectorAll('#plus-btn');
    const orderValue = document.querySelector('#totalOrderValue');

    // Subtracting quantity and updating order value
    minusBtn.forEach(btn => {
        btn.addEventListener('click', (e) => {
            const qty = e.target.nextElementSibling;
            const price = e.target.closest('tr').querySelector('#price').innerHTML;

            if (parseInt(qty.innerHTML) > 1) {
                qty.innerHTML = parseInt(qty.innerHTML) - 1;
                orderValue.innerHTML = parseInt(orderValue.innerHTML) - parseInt(price);
                orderValue.setAttribute('data-price', orderValue.innerHTML.trim())
                qty.setAttribute('data-qty', parseInt(qty.innerHTML.trim()))
            }
        })
    })

    // Adding quantity and updating order value
    plusBtn.forEach(btn => {
        btn.addEventListener('click', (e) => {
            const qty = e.target.previousElementSibling;
            const price = e.target.closest('tr').querySelector('#price').innerHTML;
            if (parseInt(qty.innerHTML) < 10) {
                qty.innerHTML = parseInt(qty.innerHTML) + 1;
                orderValue.innerHTML = parseInt(orderValue.innerHTML.trim()) + parseInt(price.trim());
                orderValue.setAttribute('data-price', orderValue.innerHTML.trim())
                qty.setAttribute('data-qty', parseInt(qty.innerHTML.trim()))
            }
        })
    })



})


