import { imageSwitcher } from "./helper";

class NavBarHandler {

    constructor() {

        this.cacheDOM();
        this.listenForEvents()

    }

    cacheDOM() {

        this.menFlyOutMenu = document.querySelector('#men-flyout-menu');
        this.menTab = document.querySelector('#men-tab');
        this.womenTab = document.querySelector('#women-tab');
        this.womenFlyOutMenu = document.querySelector('#women-flyout-menu');
        this.dropdowns = document.querySelectorAll('.flyout-menu');
        this.tabs = document.querySelectorAll('.tab');
        this.head = document.querySelector('header')

    }

    listenForEvents() {
        imageSwitcher(document.querySelectorAll('#landing-page'));
        this.VisibilityOfFlyOutMenus()
    }


    // active tab / flyoutmenu visibility / header bg fixed
    VisibilityOfFlyOutMenus() {

        this.tabs.forEach((tab, index) => {
            tab.addEventListener('click', (e) => {

                this.dropdowns.forEach((dropdown, i) => {

                    if (i === index) {

                        if (dropdown.classList.contains('hidden')) {
                            e.target.classList.remove('border-transparent', 'text-gray-700', 'hover:text-gray-800');
                            e.target.classList.add('border-indigo-600', 'text-indigo-600');
                            this.head.classList.replace('hover:bg-white', 'bg-white')
                        } else {
                            e.target.classList.remove('border-indigo-600', 'text-indigo-600');
                            e.target.classList.add('border-transparent', 'text-gray-700', 'hover:text-gray-800');
                            this.head.classList.replace('bg-white','hover:bg-white' )
                        }

                        dropdown.classList.toggle('hidden')
                    }

                    if (i !== index) {

                        if (dropdown.previousElementSibling.classList.contains('border-indigo-600', 'text-indigo-600')) {
                            dropdown.previousElementSibling.classList.remove('border-indigo-600', 'text-indigo-600');
                            dropdown.previousElementSibling.classList.add('border-transparent', 'text-gray-700', 'hover:text-gray-800');
                        }

                        dropdown.classList.add('hidden')
                    }

                })
            })
        })
    }



}




document.addEventListener('DOMContentLoaded', () => new NavBarHandler())


