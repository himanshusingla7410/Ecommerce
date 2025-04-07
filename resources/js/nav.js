
document.addEventListener('DOMContentLoaded', () => {

    const menFlyOutMenu = document.querySelector('#men-flyout-menu');
    const menTab = document.querySelector('#men-tab');
    const womenTab = document.querySelector('#women-tab');
    const womenFlyOutMenu = document.querySelector('#women-flyout-menu');
    const btn = document.querySelectorAll('button');
    const imgFirst = document.querySelector('#first');

    function flyOutMenuShow($tab, $flyOutMenu) {
        $tab.addEventListener('click', (e) => {
            $flyOutMenu.classList.contains('hidden') ? $flyOutMenu.classList.remove('hidden') : $flyOutMenu.classList.add('hidden');
        })
    }

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

    // function pictureChange($id, $link) {
    //     $id.addEventListener('mouseover', () => {
    //         // $id.src = ($link);
    //         console.log('check');
    //     })
    // }

    
    flyOutMenuShow(womenTab, womenFlyOutMenu);
    flyOutMenuShow(menTab, menFlyOutMenu);
    activeTab(womenTab);
    activeTab(menTab);

})
