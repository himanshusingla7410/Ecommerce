document.addEventListener('DOMContentLoaded', () => {

    // Image Switching
    const images = document.querySelectorAll('#thumbnail');
    images.forEach((i) => {
        i.addEventListener('click', (e) => {
            document.querySelector('#mainImage').src = i.src;
        })
    })

    // Qty Updating
    const plusBtn = document.querySelector('#btn-plus');
    const minusBtn = document.querySelector('#btn-minus');
    const inputQty = document.querySelector('#qty');
    const displayQty = document.querySelector('#input-qty');
    let qty = 1

    plusBtn.addEventListener('click', (e) => {
        qty += 1
        displayQty.innerHTML = qty;
        inputQty.value = qty;
    })
    minusBtn.addEventListener('click', (e) => {
        if (qty > 1) {
            qty -= 1
            displayQty.innerHTML = qty;
            inputQty.value = qty;
        }
    })

    // Size selection
    const sizeSelected = document.querySelectorAll('#size');

    sizeSelected.forEach((size) => {

        size.addEventListener('click', (e) => {

            sizeSelected.forEach((btn) => {
                btn.classList.remove('border-black', 'bg-indigo-600', 'text-white')
            })

            size.classList.toggle('border-black')
            size.classList.toggle('bg-indigo-600')
            size.classList.toggle('text-white')
        });

    });

})