const buyBtn = document.querySelector('#buy-btn')
const modal = document.querySelector('#modalOverlay')
const closeBtn = document.querySelector('#close-btn')

buyBtn.addEventListener('click', ()=>{

    modal.classList.remove('hidden');
    // document.body.classList.add('overflow-hidden');

})

closeBtn.addEventListener('click', ()=>{

    modal.classList.add('hidden');
    // document.body.classList.remove('overflow-hidden');

})