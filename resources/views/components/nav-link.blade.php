<nav aria-label="Top" class="mx-auto max-w-7xl py-3 px-4 sm:px-6 lg:px-8 ">
    <div>
        <div class="flex h-16 items-center">
            <!-- Mobile menu toggle, controls the 'mobileMenuOpen' state. -->
            <button type="button" class="relative rounded-md bg-white p-2 text-gray-400 lg:hidden">
                <span class="absolute -inset-0.5"></span>
                <span class="sr-only">Open menu</span>
                <svg class="size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                </svg>
            </button>

            <!-- Logo -->
            <div class="ml-4 flex lg:ml-0">
                <a href="#">
                    <span class="sr-only">Your Company</span>
                    <img class="h-8 w-auto" src="https://tailwindcss.com/plus-assets/img/logos/mark.svg?color=indigo&shade=600" alt="">
                </a>
            </div>

            <!-- Flyout menus -->
            <div class="hidden lg:ml-8 lg:block lg:self-stretch">
                <div class="flex h-full space-x-8">
                    <div class="flex">
                        <button id="women-tab" type="button" class="relative z-10 -mb-px flex items-center border-b-2 pt-px text-sm font-medium transition-colors duration-200 ease-out border-transparent text-gray-700 hover:text-gray-800">Women</button>

                        <!--
                                        'Women' flyout menu, show/hide based on flyout menu state.

                                        Entering: "transition ease-out duration-200"
                                        From: "opacity-0"
                                        To: "opacity-100"
                                        Leaving: "transition ease-in duration-150"
                                        From: "opacity-100"
                                        To: "opacity-0"
                                        -->
                        <div id="women-flyout-menu" class="absolute hidden  inset-x-0 top-full text-sm text-gray-500">
                            <!-- Presentational element used to render the bottom shadow, if we put the shadow on the actual panel it pokes out the top, so we use this shorter element to hide the top of the shadow -->
                            <div class="absolute inset-0 top-1/2 bg-white shadow-sm" aria-hidden="true"></div>

                            <div class="relative bg-white">
                                <div class="mx-auto max-w-7xl px-8">
                                    <div class="grid grid-cols-2 gap-x-8 gap-y-10 py-16">
                                        <div class="col-start-2 grid grid-cols-2 gap-x-8">
                                            <div class="group relative text-base sm:text-sm">
                                                <img src="https://tailwindcss.com/plus-assets/img/ecommerce-images/mega-menu-category-01.jpg" alt="Models sitting back to back, wearing Basic Tee in black and bone." class="aspect-square w-full rounded-lg bg-gray-100 object-cover group-hover:opacity-75">
                                                <a href="#" class="mt-6 block font-medium text-gray-900">
                                                    <span class="absolute inset-0 z-10" aria-hidden="true"></span>
                                                    New Arrivals
                                                </a>
                                                <p aria-hidden="true" class="mt-1">Shop now</p>
                                            </div>
                                            <div class="group relative text-base sm:text-sm">
                                                <img src="https://tailwindcss.com/plus-assets/img/ecommerce-images/mega-menu-category-02.jpg" alt="Close up of Basic Tee fall bundle with off-white, ochre, olive, and black tees." class="aspect-square w-full rounded-lg bg-gray-100 object-cover group-hover:opacity-75">
                                                <a href="#" class="mt-6 block font-medium text-gray-900">
                                                    <span class="absolute inset-0 z-10" aria-hidden="true"></span>
                                                    Basic Tees
                                                </a>
                                                <p aria-hidden="true" class="mt-1">Shop now</p>
                                            </div>
                                        </div>
                                        <div class="row-start-1 grid grid-cols-3 gap-x-8 gap-y-10 text-sm">
                                            <div>
                                                <x-sub-heading id="Clothing-heading">Clothing</x-sub-heading>
                                                <ul role="list" aria-labelledby="Clothing-heading" class="mt-6 space-y-6 sm:mt-4 sm:space-y-4">
                                                    <x-items href="#">Tops</x-items>
                                                    <x-items href="#">Dresses</x-items>
                                                    <x-items href="#">Pants</x-items>
                                                    <x-items href="#">Sweaters</x-items>
                                                    <x-items href="#">Denim</x-items>
                                                    <x-items href="#">T-Shirts</x-items>
                                                    <x-items href="#">Jackets</x-items>
                                                    <x-items href="#">Activewear</x-items>
                                                    <x-items href="#">Browse All</x-items>
                                                </ul>
                                            </div>
                                            <div>
                                                <x-sub-heading id="Accessories-heading">Accessories</x-sub-heading>
                                                <ul role="list" aria-labelledby="Accessories-heading" class="mt-6 space-y-6 sm:mt-4 sm:space-y-4">
                                                    <x-items href="#">Watches</x-items>
                                                    <x-items href="#">Wallets</x-items>
                                                    <x-items href="#">Bags</x-items>
                                                    <x-items href="#">Sunglasses</x-items>
                                                    <x-items href="#">Hats</x-items>
                                                    <x-items href="#">Belts</x-items>
                                                </ul>
                                            </div>
                                            <div>
                                                <x-sub-heading id="Brands-heading">Brands</x-sub-heading>
                                                <ul role="list" aria-labelledby="Brands-heading" class="mt-6 space-y-6 sm:mt-4 sm:space-y-4">
                                                    <x-items href="#">Full Nelson</x-items>
                                                    <x-items href="#">My Way</x-items>
                                                    <x-items href="#">Re-Arranged</x-items>
                                                    <x-items href="#">Counterfeit</x-items>
                                                    <x-items href="#">Significant Other</x-items>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="flex">

                        <button id="men-tab" type="button" class="relative z-10 -mb-px flex items-center border-b-2 pt-px text-sm font-medium transition-colors duration-200 ease-out border-transparent text-gray-700 hover:text-gray-800">Men</button>

                        <!--
                                        'Men' flyout menu, show/hide based on flyout menu state.

                                        Entering: "transition ease-out duration-200"
                                        From: "opacity-0"
                                        To: "opacity-100"
                                        Leaving: "transition ease-in duration-150"
                                        From: "opacity-100"
                                        To: "opacity-0"
                                        -->
                        <div id="men-flyout-menu" class="hidden absolute  inset-x-0 top-full text-sm text-gray-500">
                            <!-- Presentational element used to render the bottom shadow, if we put the shadow on the actual panel it pokes out the top, so we use this shorter element to hide the top of the shadow -->
                            <div class="absolute inset-0 top-1/2 bg-white shadow-sm" aria-hidden="true"></div>

                            <div class="relative bg-white">
                                <div class="mx-auto max-w-7xl px-8">
                                    <div class="grid grid-cols-2 gap-x-8 gap-y-10 py-16">
                                        <div class="col-start-2 grid grid-cols-2 gap-x-8">
                                            <div class="group relative text-base sm:text-sm">
                                                <img src="https://tailwindcss.com/plus-assets/img/ecommerce-images/product-page-04-detail-product-shot-01.jpg" alt="Drawstring top with elastic loop closure and textured interior padding." class="aspect-square w-full rounded-lg bg-gray-100 object-cover group-hover:opacity-75">
                                                <a href="#" class="mt-6 block font-medium text-gray-900">
                                                    <span class="absolute inset-0 z-10" aria-hidden="true"></span>
                                                    New Arrivals
                                                </a>
                                                <p aria-hidden="true" class="mt-1">Shop now</p>
                                            </div>
                                            <div class="group relative text-base sm:text-sm">
                                                <img src="https://tailwindcss.com/plus-assets/img/ecommerce-images/category-page-02-image-card-06.jpg" alt="Three shirts in gray, white, and blue arranged on table with same line drawing of hands and shapes overlapping on front of shirt." class="aspect-square w-full rounded-lg bg-gray-100 object-cover group-hover:opacity-75">
                                                <a href="#" class="mt-6 block font-medium text-gray-900">
                                                    <span class="absolute inset-0 z-10" aria-hidden="true"></span>
                                                    Artwork Tees
                                                </a>
                                                <p aria-hidden="true" class="mt-1">Shop now</p>
                                            </div>
                                        </div>
                                        <div class="row-start-1 grid grid-cols-3 gap-x-8 gap-y-10 text-sm">
                                            <div>
                                                <p id="Clothing-heading" class="font-medium text-gray-900">Clothing</p>
                                                <ul role="list" aria-labelledby="Clothing-heading" class="mt-6 space-y-6 sm:mt-4 sm:space-y-4">
                                                    <x-items href="#">Tops</x-items>
                                                    <x-items href="#">Pants</x-items>
                                                    <x-items href="#">Sweaters</x-items>
                                                    <x-items href="#">T-Shirts</x-items>
                                                    <x-items href="#">Jackets</x-items>
                                                    <x-items href="#">Activewear</x-items>
                                                    <x-items href="#">Browse All</x-items>
                                                </ul>
                                            </div>
                                            <div>
                                                <p id="Accessories-heading" class="font-medium text-gray-900">Accessories</p>
                                                <ul role="list" aria-labelledby="Accessories-heading" class="mt-6 space-y-6 sm:mt-4 sm:space-y-4">
                                                    <x-items href="#">Watches</x-items>
                                                    <x-items href="#">Wallets</x-items>
                                                    <x-items href="#">Bags</x-items>
                                                    <x-items href="#">Sunglasses</x-items>
                                                    <x-items href="#">Hats</x-items>
                                                    <x-items href="#">Belts</x-items>
                                                </ul>
                                            </div>
                                            <div>
                                                <p id="Brands-heading" class="font-medium text-gray-900">Brands</p>
                                                <ul role="list" aria-labelledby="Brands-heading" class="mt-6 space-y-6 sm:mt-4 sm:space-y-4">
                                                    <x-items href="#">Full Nelson</x-items>
                                                    <x-items href="#">My Way</x-items>
                                                    <x-items href="#">Re-Arranged</x-items>
                                                    <x-items href="#">Counterfeit</x-items>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <a href="#" class="flex items-center text-sm font-medium text-gray-700 hover:text-gray-800">Stores</a>
                </div>
            </div>

            <a href="/" class=" ml-auto flex items-baseline-center justify-center text-5xl mt-5 text-red-500 font-medium" style="font-family: 'Allura';">DILkash</a>

            <div class="ml-auto flex items-center">
                <div class="hidden lg:flex lg:flex-1 lg:items-center lg:justify-end lg:space-x-6">
                    <a href="#" class="text-sm font-medium text-gray-700 hover:text-gray-800">Sign in</a>
                    <span class="h-6 w-px bg-gray-200" aria-hidden="true"></span>
                    <a href="#" class="text-sm font-medium text-gray-700 hover:text-gray-800">Create account</a>
                </div>

                <!-- Search -->
                <div class="flex lg:ml-6">
                    <a href="#" class="p-2 text-gray-400 hover:text-gray-500">
                        <span class="sr-only">Search</span>
                        <svg class="size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                        </svg>
                    </a>
                </div>

                <!-- Cart -->
                <div class="ml-4 flow-root lg:ml-6 ">
                    <a href="#" class="group -m-2 flex items-center p-2">
                        <div class="relative">
                            <svg class="size-6 shrink-0 text-gray-400 group-hover:text-gray-500" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 1 0-7.5 0v4.5m11.356-1.993 1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 0 1-1.12-1.243l1.264-12A1.125 1.125 0 0 1 5.513 7.5h12.974c.576 0 1.059.435 1.119 1.007ZM8.625 10.5a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm7.5 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                            </svg>
                            <span id="cart-black-dot" class=" {{$cartCount > 0 ? 'opacity-100' : 'opacity-0'}}  absolute top-0 right-0 block  rounded-full ring-1 ring-black h-2 w-2 bg-black"></span>
                        </div>
                        <span class="sr-only">items in cart, view bag</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</nav>