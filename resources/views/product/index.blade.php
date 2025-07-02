<x-layout>

    <section class="relative pt-30 ">
        <!-- Main heading -->
        <div class="flex justify-center font-semibold p-15 border-b border-gray-300 text-5xl">
            New Arrivals
        </div>
        <!-- Sub head -->
        <div class="sub-head text-gray-400 flex justify-between items-center p-2 px-8 border-b border-gray-300">
            <div class="w-4 h-4 flex  space-x-2 items-center p-2   ">
                <button class="wide-view hover:text-black cursor-pointer">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                        <rect x="3" y="3" width="8" height="8" />
                        <rect x="13" y="3" width="8" height="8" />
                        <rect x="3" y="13" width="8" height="8" />
                        <rect x="13" y="13" width="8" height="8" />
                    </svg>
                </button>
                <button class="medium-view hover:text-black cursor-pointer">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                        <g>
                            <rect x="3" y="3" width="4" height="4" />
                            <rect x="10" y="3" width="4" height="4" />
                            <rect x="17" y="3" width="4" height="4" />

                            <rect x="3" y="10" width="4" height="4" />
                            <rect x="10" y="10" width="4" height="4" />
                            <rect x="17" y="10" width="4" height="4" />

                            <rect x="3" y="17" width="4" height="4" />
                            <rect x="10" y="17" width="4" height="4" />
                            <rect x="17" y="17" width="4" height="4" />
                        </g>
                    </svg>
                </button>
                <button class="small-view hover:text-black cursor-pointer">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                        <rect x="4" y="5" width="16" height="2" />
                        <rect x="4" y="11" width="16" height="2" />
                        <rect x="4" y="17" width="16" height="2" />
                    </svg>
                </button>
            </div>

            <div class=" text-s"><span id="count">{{$count}}</span> products</div>
            <div class=" items-center p-2 border-l border-gray-400">Sort by</div>
        </div>

        <div class="flex gap-10 px-10 py-10">
            <!-- Sidebar Filters -->
            <aside class="w-1/5 space-y-6">
                <details>
                    <summary class="flex justify-between font-semibold cursor-pointer">Size <span>&#9662;</span></summary>
                    <div class="mt-2">
                        <div>
                            <x-products.sizeSelector>XS</x-products.sizeSelector>
                            <x-products.sizeSelector>S</x-products.sizeSelector>
                            <x-products.sizeSelector>M</x-products.sizeSelector>
                            <x-products.sizeSelector>L</x-products.sizeSelector>
                            <x-products.sizeSelector>XL</x-products.sizeSelector>
                        </div>

                    </div>

                </details>
                <hr />
                <details>
                    <summary class="flex justify-between font-semibold cursor-pointer">Color <span>&#9662;</span></summary>
                    <div class="mt-2">
                        <div>
                            <x-products.colorSelector>Red</x-products.colorSelector>
                            <x-products.colorSelector>Green</x-products.colorSelector>
                            <x-products.colorSelector>White</x-products.colorSelector>
                            <x-products.colorSelector>Black</x-products.colorSelector>
                            <x-products.colorSelector>Pink</x-products.colorSelector>
                        </div>

                    </div>

                </details>
                <hr />
                <details>
                    <summary class="flex justify-between font-semibold cursor-pointer">Price <span>&#9662;</span></summary>
                    <div id="slider" class="mt-5"></div>

                    <div class="flex space-x-3 justify-between mt-5">
                        <span id="min-price" class="border border-gray-300 p-2">0</span>
                        <span id="max-price" class="border border-gray-300 p-2">0</span>
                    </div>
                </details>
                <hr />
                <div>
                    <h2 class="flex justify-between font-semibold mb-2 cursor-pointer">Availability <span>&#9662;</span></h2>
                    <hr />
                </div>
            </aside>

            <!-- Product Grid -->
            <section class=" product-grid flex-1 grid grid-cols-4 gap-10">
                <!-- Block for each product -->

                @include('components.products.show', ['products' => $products])

            </section>

        </div>



    </section>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/15.7.0/nouislider.min.js"></script>


    @push('scripts')
    @vite(['resources/js/allProducts.js'])
    @endpush





</x-layout>