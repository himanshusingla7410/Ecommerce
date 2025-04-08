<x-layout>
    <section class="relative pt-30 px-10">
        <!-- Product Review Page -->
        <div class="product-page grid grid-cols-1 md:grid-cols-2 gap-6 p-6">
            <!-- Left Image Section -->
            <div class="sticky top-20 flex gap-4 h-fit">
                <div class="flex flex-col gap-2 overflow-y-auto max-h-[600px]">
                    <img src="https://babli.in/cdn/shop/files/Black_Weave_Dress_With_Top_1.jpg?v=1741865528&width=800" id="thumbnail" alt="thumb" class="w-16 h-24 object-cover rounded-lg cursor-pointer border" />
                    <img src="https://babli.in/cdn/shop/files/Black_Weave_Dress_With_Top_6.jpg?v=1741865528&width=800" id="thumbnail" alt="thumb" class="w-16 h-24 object-cover rounded-lg cursor-pointer border" />
                    <img src="https://babli.in/cdn/shop/files/Black_Weave_Dress_With_Top_7.jpg?v=1741865528&width=800" id="thumbnail" alt="thumb" class="w-16 h-24 object-cover rounded-lg cursor-pointer border" />
                    <img src="https://babli.in/cdn/shop/files/Black_Weave_Dress_With_Top_2.jpg?v=1740219822&width=800" id="thumbnail" alt="thumb" class="w-16 h-24 object-cover rounded-lg cursor-pointer border" />
                    <img src="https://babli.in/cdn/shop/files/Black_Weave_Dress_With_Top_3.jpg?v=1740219822&width=800" id="thumbnail" alt="thumb" class="w-16 h-24 object-cover rounded-lg cursor-pointer border" />
                </div>
                <div class="flex-1 sticky top-20">
                    <img id="mainImage" src="https://babli.in/cdn/shop/files/Black_Weave_Dress_With_Top_1.jpg?v=1741865528&width=800" alt="product" class="w-full h-auto rounded-xl shadow-lg" />
                </div>
            </div>


            <form action="/product/checkout" id="product-details" class="px-5 pt-8">
                @method('POST')
                @csrf
                <!-- Right Product Detail Section -->
                <div class="flex flex-col gap-4 sticky top-20">
                    <input name="product_name" type="hidden" value="Black Weave Dress With Top">
                    <input name="product_price" type="hidden" value="Rs. 2,350.00">
                    <h1 class="text-2xl font-semibold">Black Weave Dress With Top</h1>
                    <P class="text-xl font-medium text-gray-600">Rs. 2,350.00</P>

                    <!-- Size Selector -->
                    <div class="flex gap-2">
                        <label>
                            <input type="hidden" id="input-size" name="product_size" value="XS" required>
                            <span id="size" class="px-3 py-1 border rounded cursor-pointer">XS</span>
                        </label>
                        <label>
                            <input type="hidden" id="input-size" name="product_size" value="S">
                            <span id="size" class="px-3 py-1 border rounded cursor-pointer">S</span>
                        </label>
                        <label>
                            <input type="hidden" id="input-size" name="product_size" value="M">
                            <span id="size" class="px-3 py-1 border rounded cursor-pointer">M</span>
                        </label>
                        <label>
                            <input type="hidden" id="input-size" name="product_size" value="L">
                            <span id="size" class="px-3 py-1 border rounded cursor-pointer">L</span>
                        </label>
                        <label>
                            <input type="hidden" id="input-size" name="product_size" value="XL">
                            <span id="size" class="px-3 py-1 border rounded cursor-pointer">XL</span>
                        </label>
                        <label>
                            <input type="hidden" id="input-size" name="product_size" value="XXL">
                            <span id="size" class="px-3 py-1 border rounded cursor-pointer">XXL</span>
                        </label>
                        <label>
                            <input type="hidden" id="input-size" name="product_size" value="3XL">
                            <span id="size" class="px-3 py-1 border rounded cursor-pointer">3XL</span>
                        </label>

                    </div>

                    <!-- Add to Cart & Buy Now Buttons -->
                    <div class="flex flex-col gap-2">
                        <button class="w-full bg-white border border-gray-800 text-black py-2 rounded-lg hover:bg-gray-100 transition">Add to cart</button>
                        <button id="buy-btn" type="button" class="w-full bg-black text-white py-2 rounded-lg flex items-center justify-center gap-2 hover:bg-gray-900 transition">
                            BUY NOW
                            <!-- <img src="gpay-icon.png" alt="Gpay" class="w-5 h-5" /> -->
                            <!-- <img src="paytm-icon.png" alt="Paytm" class="w-5 h-5" /> -->
                        </button>
                    </div>

                    <!-- Size Chart and Quantity -->
                    <div class="flex items-center justify-between mt-4">
                        <a href="/modal" class="text-blue-600 flex items-center gap-1">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M10 2a8 8 0 100 16 8 8 0 000-16zM9 7a1 1 0 112 0v4a1 1 0 11-2 0V7zm1 8a1.5 1.5 0 110-3 1.5 1.5 0 010 3z" />
                            </svg>
                            Size Chart
                        </a>
                        <div class="flex items-center gap-2">
                            <button id="btn-minus" type="button" class="w-8 h-8 border rounded hover:bg-gray-200 ">-</button>
                            <input id="input-qty" type="hidden" name="product_quantity" value="1">
                            <span id="qty">1</span>
                            <button id="btn-plus" type="button" class="w-8 h-8 border rounded hover:bg-gray-200 ">+</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>



        <!-- Additional Info Section -->
        <div class="w-full max-w-4xl mx-auto mt-10 mb-12">
            <div class="divide-y divide-gray-300">
                <details class="py-4 cursor-pointer">
                    <summary class="font-semibold text-lg">Description</summary>
                    <p class="mt-2 text-gray-600">A stylish and comfortable black weave dress with a contrasting white top, perfect for casual outings or relaxed gatherings.</p>
                </details>
                <details class="py-4 cursor-pointer">
                    <summary class="font-semibold text-lg">Fabric & Wash Care</summary>
                    <p class="mt-2 text-gray-600">Made with cotton-blend fabric. Gentle machine wash with like colors. Do not bleach.</p>
                </details>
                <details class="py-4 cursor-pointer">
                    <summary class="font-semibold text-lg">Shipping</summary>
                    <p class="mt-2 text-gray-600">Ships within 3-5 business days. Free shipping on orders above Rs. 999.</p>
                </details>
                <details class="py-4 cursor-pointer">
                    <summary class="font-semibold text-lg">Return & Exchange</summary>
                    <p class="mt-2 text-gray-600">Easy return and exchange within 7 days of delivery. Product must be unused and in original condition.</p>
                </details>
            </div>
        </div>


    </section>

    


    @push('scripts')
    @vite(['resources/js/productView.js'])
    @vite(['resources/js/modal.js'])
    @endpush

</x-layout>

<x-modal></x-modal>
