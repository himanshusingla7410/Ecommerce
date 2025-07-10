<x-layout>

    <section>
        <div class="relative pt-8">
            <img src="	https://babli.in/cdn/shop/files/11_9918ed89-b59a-426b-9afc-ccc67305cb62.jpg?v=1742564273&width=2000" alt="Model siting." class="w-full h-150 aspect-square rounded-lg shadow-md">
        </div>
        <div class="mt-5 items-center flex justify-center">
            <a href="/products" class="px-6 py-3 bg-indigo-600 text-white text-lg font-semibold rounded-md shadow-md hover:bg-indigo-700 transition">
                SHOP NOW
            </a>
        </div>


        <div class="mx-auto max-w-2xl px-4 py-16 sm:px-6 sm:py-24 lg:max-w-7xl lg:px-8">
            <h2 class="text-2xl font-bold tracking-tight text-center text-gray-900">New Arrivals</h2>

            <div class="mt-6 grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8">

                @foreach ( $products as $product)
                <a href="/product/{{$product->product_name}}">
                    <img id="landing-page"
                        src="{{ $product->product_image[0] }}"
                        data-original="{{$product->product_image[0]}}"
                        data-pic="{{$product->product_image[1] ?? $product->product_image[0]}}"
                        alt="Landing page image."
                        class="aspect-square w-full rounded-md bg-gray-200 object-cover  lg:aspect-auto lg:h-80">

                    <div class="mt-4 flex justify-between">
                        <div>
                            <h3 class="text-sm text-gray-900 font-bold">
                                <span aria-hidden="true" class="absolute inset-0"></span>
                                {{ $product->product_name }}
                            </h3>
                        </div>
                        <p class="text-sm font-medium text-gray-700">₹ {{$product->product_price}}</p>
                    </div>
                </a>
                @endforeach

            </div>
            <div class="mt-5 items-center flex justify-center">
                <a href="/products" class="px-6 py-3 bg-black text-white text-lg font-semibold rounded-md shadow-md hover:bg-gray-800 transition">
                    View all
                </a>
            </div>

        </div>
        <div>
            <img src="	https://babli.in/cdn/shop/files/DEC-BANNER-1.jpg?v=1702276496&width=1400" alt="Models posing." class="w-full h-125 aspect-square rounded-lg shadow-md">
        </div>


        <div class="mx-auto max-w-2xl px-4 py-16 sm:px-6 sm:py-24 lg:max-w-7xl lg:px-8">
            <h2 class="text-3xl font-bold tracking-tight text-center text-gray-900">Basics</h2>

            <div class="mt-6 grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8">

                @foreach ( $products1 as $product)
                <a href="/product/{{$product->product_name}}">
                    <img id="landing-page"
                        src="{{ $product->product_image[0] }}"
                        data-original="{{$product->product_image[0]}}"
                        data-pic="{{$product->product_image[1] ?? $product->product_image[0]}}"
                        alt="Landing page image."
                        class="aspect-square w-full rounded-md bg-gray-200 object-cover  lg:aspect-auto lg:h-80">
                    <div class="mt-4 flex justify-between">
                        <div>
                            <h3 class="text-sm text-gray-900 font-bold">
                                <span aria-hidden="true" class="absolute inset-0"></span>
                                {{ $product->product_name }}
                            </h3>
                        </div>
                        <p class="text-sm font-medium text-gray-700">₹ {{$product->product_price}}</p>
                    </div>
                </a>
                @endforeach

            </div>
            <div class="mt-5 items-center flex justify-center">
                <a href="/products" class="px-6 py-3 bg-black text-white text-lg font-semibold rounded-md shadow-md hover:bg-gray-800 transition">
                    View all
                </a>
            </div>

        </div>
    </section>
    <!-- Three icons at bottom -->
    <div class="flex justify-center  gap-40 mt-12 mb-12 items-baseline-last text-center">
        <div class="flex flex-col items-center space-y-5">
            <img src="https://babli.in/cdn/shop/files/4_0b831116-8dab-4548-a042-6c757d71a2f6.png?v=1698318177&width=97" alt="HANDMADE">
            <p class="text-sm">HANDMADE WITH LOVE</p>
        </div>
        <div class="flex flex-col items-center space-y-5">
            <img src="https://babli.in/cdn/shop/files/sustainable.png?v=1698319023&width=79" alt="SUSTAINABLY">
            <p class="text-sm">SUSTAINABLY SOURCED</p>
        </div>
        <div class="flex flex-col items-center space-y-5">
            <img src="	https://babli.in/cdn/shop/files/5.png?v=1698305851&width=128" alt="SUPPORTING">
            <p class="text-sm">SUPPORTING LOCAL ARTISANS</p>
        </div>
    </div>

    <!-- Welcome discount modal -->
    <x-modals.welcomeDiscount />
   @push('scripts')
   @vite(['resources/js/modal/welcome.js'])
   @endpush


</x-layout>