<x-layout>

    <section class="relative pt-30 ">
        <!-- Main heading -->
        <div class="flex justify-center font-semibold p-15 border-b border-gray-300 text-5xl">
            New Arrivals
        </div>
        <!-- Sub head -->
        <div class="text-gray-400 flex justify-between items-center p-2 px-8 border-b border-gray-300">
            <div class="w-4 h-4 flex  space-x-2 items-center p-2   ">
                <button class="hover:text-black cursor-pointer">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                        <rect x="3" y="3" width="8" height="8" />
                        <rect x="13" y="3" width="8" height="8" />
                        <rect x="3" y="13" width="8" height="8" />
                        <rect x="13" y="13" width="8" height="8" />
                    </svg>
                </button>
                <button class="hover:text-black cursor-pointer">
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
                <button class="hover:text-black cursor-pointer">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                        <rect x="4" y="5" width="16" height="2" />
                        <rect x="4" y="11" width="16" height="2" />
                        <rect x="4" y="17" width="16" height="2" />
                    </svg>
                </button>
            </div>

            <div class=" text-s">{{$count}} products</div>
            <div class=" items-center p-2 border-l border-gray-400">Sort by</div>
        </div>

        <div class="flex gap-10 px-10 py-10">
            <!-- Sidebar Filters -->
            <aside class="w-1/5 space-y-6">
                <div>
                    <h2 class="font-semibold mb-2 cursor-pointer">Size <span class="float-right">&#9662;</span></h2>
                    <hr />
                </div>
                <div>
                    <h2 class="font-semibold mb-2 cursor-pointer">Color <span class="float-right">&#9662;</span></h2>
                    <hr />
                </div>
                <div>
                    <h2 class="font-semibold mb-2 cursor-pointer">Price <span class="float-right">&#9662;</span></h2>
                    <hr />
                </div>
                <div>
                    <h2 class="font-semibold mb-2 cursor-pointer">Availability <span class="float-right">&#9662;</span></h2>
                    <hr />
                </div>
            </aside>

            <!-- Product Grid -->
            <section class="flex-1 grid grid-cols-4 gap-10">
                <!-- Block for each product -->
                @foreach ($products as $product)
                <a href="/product/{{$product->product_name}}" class="overflow-hidden rounded-md shadow hover:shadow-lg transition">
                    <img id="landing-page"
                        src="{{$product->product_image[0]}}"
                        data-original="{{$product->product_image[0]}}"
                        data-pic="{{$product->product_image[2] ?? $product->product_image[0]}}"
                        alt="Product 1"
                        class="w-full h-auto object-cover" />
                    <div class=" text-center py-2 font-semibold">
                        <p class="">{{$product->product_name}}</p>
                        <p class=" text-gray-400 text-s">₹ {{$product->product_price}}</p>
                    </div>
                </a>
                @endforeach
            </section>
        </div>


        <div class="px-8 py-8">
            {{ $products->links() }}
        </div>
    </section>



   


</x-layout>