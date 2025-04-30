<x-layout>

    <section class="relative pt-30 px-10">
        <div class="py-10 px-35">
            <div class="flex justify-center">
                <p class="font-bold text-2xl mt-10">Shopping cart</p>
            </div>
            <span class="text-gray-500 flex justify-center py-3">You are eligible for free shipping</span>
            <!-- Table for items in cart -->
            <div class="mt-3">
                <table class="min-w-full divide-y divide-gray-300 mt-8">
                    <thead>
                        <tr class="text-gray-500">
                            <th class="text-start px-8">Products</th>
                            <th class="px-35 text-center">Quantity</th>
                            <th class="px-10 text-center">Total</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200 border-b border-gray-300">
                        @foreach( $products as $item)
                        <tr>
                            <td class="px-6 py-4 flex items-start gap-4">
                                <img class="rounded-md w-24 h-auto" src="{{$item->product_image}}" alt="">
                                <div class="p-1">
                                    <div class="product font-semibold">{{$item->product_name}}</div>
                                    <div class="text-gray-500">₹ {{$item->product_price}}</div>
                                    <div class="text-s text-gray-400">{{$item->product_size}}</div>
                                </div>
                            </td>
                            <td id="qty-control" class="text-center align-middle">
                                 <!-- Quantity controls -->
                                <div class="inline-flex border border-gray-400 items-center justify-between w-24 mx-auto py-2 ">
                                    <button id="minus-btn" class="px-2 cursor-pointer">-</button>
                                    <span id="qty-value" data-qty="{{$item->product_quantity}}">{{$item->product_quantity}}</span>
                                    <button id="plus-btn" class="px-2 cursor-pointer">+</button>
                                </div>
                                 <!-- Form to remove items -->
                                <form action="/cart/delete" class="flex justify-center">
                                    @csrf
                                    @method('DELETE')
                                    <input type="hidden" name="product_name" value="{{$item->product_name}}">
                                    <input type="hidden" name="product_size" value="{{$item->product_size}}">
                                    <button type="submit" class=" mt-1 underline cursor-pointer">Remove</button>
                                </form>
                            </td>
                            <td   class="text-center align-middle">
                                ₹ <span id="price">{{$item->product_price }}</span>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                <!-- Total amount -->
                <div class="flex justify-between px-6 py-4  items-start gap-4">
                    <div class="">
                        <p>Add order note</p>
                        <textarea class="border border-gray-300 w-100 h-25 p-3 mt-1" type="text" name="order_note" value="" placeholder="How can we help you?"></textarea>
                    </div>
                    <div class="text-end">
                        <p class="text-end align-end px-10 text-xl">Total: ₹<span id="totalOrderValue" class="ml-2" data-price="{{$totalOrderValue}}" >{{$totalOrderValue}}</span></p>
                        <p class="text-gray-600 text-s">Tax included. Shipping calculated at checkout.</p>
                        <div class="ml-55 px-10 py-3">
                            <button id="buy-btn" type="button" class=" w-24 bg-black text-white py-2 rounded-lg flex items-center justify-center gap-2 hover:bg-gray-900 transition">
                                BUY NOW
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Shipping cost -->
                <div class="border border-gray-300 text-center py-6 mt-25">
                    <p class="mb-5 text-xl font-semibold">Estimate shipping</p>
                    <div class="flex items-center justify-center space-x-6">

                        <div>
                            <label for="country">Country</label>
                            <select class="border border-gray-300 p-2" name="country" id="country">
                                <option value="india" default>India</option>
                                <option value="usa" default>USA</option>
                                <option value="australia" default>Australia</option>
                            </select>
                        </div>
                        <div>
                            <label for="Province">Province</label>
                            <select class="border border-gray-300 p-2" name="Province" id="Province">
                                <option value="Delhi" default>Delhi</option>
                                <option value="chandigarh" default>Chandigarh</option>
                                <option value="mumbai" default>Mumbai</option>
                            </select>
                        </div>

                        <input class="border border-gray-300 p-2" type="zip-code" value="" placeholder="Enter zip code">
                        <button id="" type="button" class=" w-24 bg-black text-white py-2 rounded-lg flex items-center justify-center gap-2 hover:bg-gray-900 transition">
                            Estimate
                        </button>
                    </div>
                </div>

            </div>

        </div>
        <x-modal :products="$products"  :totalOrderValue="$totalOrderValue"></x-modal>

    </section>

    @push('scripts')
    @vite(['resources/js/cart.js'])
    @endpush


</x-layout>