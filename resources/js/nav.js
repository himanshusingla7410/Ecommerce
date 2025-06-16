
document.addEventListener('DOMContentLoaded', () => {

    const menFlyOutMenu = document.querySelector('#men-flyout-menu');
    const menTab = document.querySelector('#men-tab');
    const womenTab = document.querySelector('#women-tab');
    const womenFlyOutMenu = document.querySelector('#women-flyout-menu');
    const images = document.querySelectorAll('#landing-page');

    // Appearing flyout menu
    function flyOutMenuShow($tab, $flyOutMenu) {
        $tab.addEventListener('click', (e) => {
            $flyOutMenu.classList.contains('hidden') ? $flyOutMenu.classList.remove('hidden') : $flyOutMenu.classList.add('hidden');
        })
    }

    // Active tab
    function activeTab($tab) {
        $tab.addEventListener('click', (e) => {
            if ($tab.classList.contains('border-transparent', 'text-gray-700', 'hover:text-gray-800')) {
                $tab.classList.remove('border-transparent', 'text-gray-700', 'hover:text-gray-800');
                $tab.classList.add('border-indigo-600', 'text-indigo-600');
            } else {
                $tab.classList.remove('border-indigo-600', 'text-indigo-600');
                $tab.classList.add('border-transparent', 'text-gray-700', 'hover:text-gray-800');
            }
        })
    }


    // Image switching 
    images.forEach(image=>{
        image.addEventListener('mouseenter', ()=>{
            const hoversrc= image.getAttribute('data-pic');
            image.src = hoversrc;
        })

        image.addEventListener('mouseleave', ()=>{
            const originalsrc= image.getAttribute('data-original');
            image.src = originalsrc;
        })
    })

    




    flyOutMenuShow(womenTab, womenFlyOutMenu);
    flyOutMenuShow(menTab, menFlyOutMenu);
    activeTab(womenTab);
    activeTab(menTab);

})
