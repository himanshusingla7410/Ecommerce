
document.addEventListener('DOMContentLoaded', () => {

    const menFlyOutMenu = document.querySelector('#men-flyout-menu');
    const menTab = document.querySelector('#men-tab');
    const womenTab = document.querySelector('#women-tab');
    const womenFlyOutMenu = document.querySelector('#women-flyout-menu');
    const imgFirst = document.querySelectorAll('#landing-page');
    const imgSecond = document.querySelector('#second');
    const imgThird = document.querySelector('#third');
    const imgFourth = document.querySelector('#fourth');

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
    function imageSwitch($tags, $event = "") {
       const  images = [
            'https://babli.in/cdn/shop/files/Black_Weave_Dress_With_Top_6.jpg?v=1741865528&width=800',
            'https://babli.in/cdn/shop/files/Evening_Blue_Strappy_Dress_3.jpg?v=1741779567&width=800',
            'https://babli.in/cdn/shop/files/Mysterious_Grey_Dress_7.jpg?v=1741777951&width=500',
            'https://babli.in/cdn/shop/files/Pinky_Red_Jacket_with_Dress_6.jpg?v=1741778399&width=500'
        ]

        $tags.forEach((tag, index) => {
            const img = images[index % images.length]; // Loop if more tags than images
            tag.addEventListener(event,() => {
                tag.src = img;
            });

        });


    }

    imageSwitch(imgFirst, 'mouseenter');
    // imageSwitch(imgFirst, 'https://babli.in/cdn/shop/files/Black_Weave_Dress_With_Top_6.jpg?v=1741865528&width=800', 'mouseenter');
    // imageSwitch(imgFirst, 'https://babli.in/cdn/shop/files/Black_Weave_Dress_With_Top_1.jpg?v=1741865528&width=500', 'mouseleave');

    // imageSwitch(imgSecond, 'https://babli.in/cdn/shop/files/Evening_Blue_Strappy_Dress_3.jpg?v=1741779567&width=800', 'mouseenter');
    imageSwitch(imgSecond,  'mouseenter');
    // imageSwitch(imgSecond, 'https://babli.in/cdn/shop/files/Evening_Blue_Strappy_Dress_6.jpg?v=1741779567&width=500', 'mouseleave');

    imageSwitch(imgThird, 'mouseenter');
    // imageSwitch(imgThird, 'https://babli.in/cdn/shop/files/Mysterious_Grey_Dress_7.jpg?v=1741777951&width=500', 'mouseenter');
    // imageSwitch(imgThird, 'https://babli.in/cdn/shop/files/Mysterious_Grey_Dress_1.jpg?v=1741777951&width=800', 'mouseleave');

    // imageSwitch(imgFourth, 'https://babli.in/cdn/shop/files/Pinky_Red_Jacket_with_Dress_6.jpg?v=1741778399&width=500', 'mouseenter');
    imageSwitch(imgFourth, 'mouseenter');
    // imageSwitch(imgFourth, 'https://babli.in/cdn/shop/files/Pinky_Red_Jacket_with_Dress_5.jpg?v=1741778399&width=500', 'mouseleave');



    flyOutMenuShow(womenTab, womenFlyOutMenu);
    flyOutMenuShow(menTab, menFlyOutMenu);
    activeTab(womenTab);
    activeTab(menTab);

})
