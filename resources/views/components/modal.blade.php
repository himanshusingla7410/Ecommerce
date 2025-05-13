<x-modalPartials.layout>
    <div class="pt-8 px-8">

        <!-- Order Summary -->
        <div id="order-summary" class="flex justify-between pb-3 cursor-pointer font-semibold ">
            <div id="order-sum">Order Summary</div>
            <div class="flex items-center">
                <div id="modal-total-price">{{$totalOrderValue}}</div>
                <img id="arrow" class="pl-1 w-4 pt-1 " src="https://fastrr-boost-ui.pickrr.com/assets/images/svg/down-arrow.svg" alt="Arrow down">
            </div>
        </div>

        <!-- Sub summary -->
        <div id="sub-total" class="bg-rose-50 hidden p-2 mb-4 rounded-md ">
            <div class="flex justify-between text-xs">
                <div>Sub total</div>
                <div id="modal-sub-total-price">{{$totalOrderValue}}</div>
            </div>

            <div id="coupon-discount" class=" justify-between text-green-500 text-xs mt-1 hidden">
                <p id="sub-coupon-code">Coupon discount(XOXO10)</p>
                <span id="coupon-discount-amt">-{{$totalOrderValue *0.1}} </span>
            </div>
            <div class="max-h-60 overflow-y-auto ml-2 mt-2">
                @foreach ( $products as $product)
                <div id="item" class="flex justify-between mt-6  text-xs mr-2 border-b border-gray-300" data-productname="{{$product->product_name }}">
                    <div class="flex">
                        <img class="rounded-md mr-2 h-16" src="{{$product->product_image[0]}}" alt="product">
                        <div>
                            <span class="product-name">{{$product->product_name }}</span>
                            <span>Qty:</span> <span class="qty">{{$product->product_quantity}}</span>
                        </div>
                    </div>
                    <div id="price-per-item">₹ {{$product->product_price }}</div>
                </div>
                @endforeach
            </div>
        </div>

        <!-- Coupon Summary -->
        <div class="px-3 py-2 border border-gray-300 rounded-lg">
            <div class="flex justify-between">
                <div class="flex">
                    <img src="https://fastrr-boost-ui.pickrr.com/assets/images/svg/discount_icon.svg" alt="coupon-logo" class="pr-0.5">
                    <span id="coupon-code" class="text-s">XOXO10</span>
                </div>

                <button id="default-apply-btn" class="apply-btn text-indigo-500 font-semibold cursor-pointer" data-code="XOXO10">Apply</button>
                <button id="remove-coupon" class=" cursor-pointer hidden ">X</button>

            </div>

            <div class=" flex justify-items-start text-green-800 font-semibold text-sm mt-3">
                <p id="coupon-applied-message"> Apply coupon and save </p><span id="savings" class="savings ml-1" data-savings="{{$totalOrderValue *0.1}}"> {{$totalOrderValue *0.1}}</span>
            </div>
            <div class="view-coupon-container">
                <div style="height: 1px; background-image: linear-gradient(90deg, rgba(0, 0, 0, 0.1), rgba(0, 0, 0, 0.1) 75%, transparent 75%, transparent 100%); background-size: 8px 1px; border: none; margin: 10px 0px 0px;"></div>

                <button type="button" id="view-coupons" data-value="{{$totalOrderValue}}" class="text-sm px-3 py-1 font-semibold text-gray-600 mt-2 cursor-pointer">
                    View all coupons >
                </button>
                <div id="applicable-coupons" class="overflow-y-auto max-h-70 hidden"></div>
            </div>
        </div>

        <!-- Phone number input -->
        <section class="mobile-number space-y-1">
            <h2 class="font-bold text-xl mt-4">Enter phone number</h2>
            <p class="text-gray-600 text-sm">Please provide your phone number to continue</p>
            <div class="border border-gray-300 rounded-lg flex  overflow-hidden shadow-sm mt-5">
                <div class="flex items-center px-3 py-3 border-r border-gray-300">
                    <img class="pr-0.5" src="https://fastrr-boost-ui.pickrr.com/assets/images/indian_flag.svg" alt="">
                    <span style="font-size: 16px; font-weight: 400;">+91</span>
                </div>
                <form action="/login" id="mobile_number">
                    <input class="w-full focus:outline-none px-3 py-3" type="text" name="mobile_number" value="" placeholder="10-digit phone number" required>
                </form>
            </div>
            <button form="mobile_number" id="submit" type="submit" class="px-44 py-2 bg-black text-white text-lg font-semibold rounded-md shadow-md hover:bg-gray-800 transition mt-1">Submit</button>
        </section>
        
        <!-- Placing order -->
        <div class="place-order hidden mt-25">
            <a  href="/address" id="placeOrder"  class="px-44 py-2 bg-black text-white text-lg font-semibold rounded-md shadow-md hover:bg-gray-800 transition mt-1">Place Order</a>
        </div>

        <!-- Payment merchant info -->
        <div class="flex justify-between space-x-3 text-xs mt-25 py-10">
            <div class="flex items-center space-x-1">
                <a href="https://checkout.shiprocket.in/terms-conditions/">T&C</a>
                <p>|</p>
                <a href="https://www.shiprocket.in/privacy-policy/my-shiprocket/">Privacy Policy</a>
                <p>|</p>
                <p>bf1eb3c6</p>
            </div>
            <div class="flex items-center">
                <p class="mr-0.5">Powered By</p>
                <img class="w-15" src="	https://fastrr-boost-ui.pickrr.com/assets/images/SRLogoDark.png" alt="shiprocket">
            </div>

        </div>

    </div>
    <x-modalPartials.couponSuccess></x-modalPartials.couponSuccess>

</x-modalPartials.layout>