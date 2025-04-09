<x-modalPartials.layout>
    <div class="pt-8 px-8">

        <!-- Order Summary -->
        <div id="order-summary" class="flex justify-between pb-3 cursor-pointer font-semibold ">
            <div id="order-sum" >Order Summary<span id="items"> (1 Item)</span></div>
            <div class="flex items-center">
                <div id="price">Rs. 2350.00</div>
                <img id="arrow" class="pl-1 w-4 pt-1 " src="https://fastrr-boost-ui.pickrr.com/assets/images/svg/down-arrow.svg" alt="Arrow down">
            </div>
        </div>

        <!-- Sub summary -->
        <div id="sub-total" class="bg-rose-50 hidden p-2 mb-4 rounded-md">
            <div class="flex justify-between text-xs">
                <div >Sub total</div>
                <div >Rs. 2350.00</div>
            </div>

            <div id="coupon-discount" class=" justify-between text-green-500 text-xs mt-1 hidden">
                <p>Coupon discount(XOXO10)</p>
                <span>-Rs 235.00</span>
            </div>

            <div id="item" class="flex justify-between mt-6  text-xs">
                <div class="flex">
                    <img class="rounded-md mr-2" src="https://babli.in/cdn/shop/files/Black_Weave_Dress_With_Top_1.jpg?v=1741865528&width=50" alt="product">
                    <div>
                        <span>Black Weave Dress With Top - XS</span>
                        <span>Qty: 1</span>
                    </div>
                </div>
                <div id="price-per-item">Rs. 2350</div>
            </div>
        </div>

        <!-- Coupon Summary -->
        <div class="px-3 py-2 border border-gray-300 rounded-lg">
            <div class="flex justify-between">
                <div class="flex">
                    <img src="https://fastrr-boost-ui.pickrr.com/assets/images/svg/discount_icon.svg" alt="coupon-logo" class="pr-0.5">
                    <span id="coupon-code" class="text-s">XOXO10</span>
                </div>
                <div>
                    <button id="apply-btn" class="text-indigo-500 font-semibold cursor-pointer">Apply</button>
                    <button id="remove-coupon" class=" cursor-pointer hidden ">X</button>
                </div>
            </div>

            <div class=" flex justify-items-start text-green-800 font-semibold text-sm mt-3">
                <p id="coupon-applied-message"> Apply coupon and save<span> Rs. 235.00</span></p>
            </div>

            <div style="height: 1px; background-image: linear-gradient(90deg, rgba(0, 0, 0, 0.1), rgba(0, 0, 0, 0.1) 75%, transparent 75%, transparent 100%); background-size: 8px 1px; border: none; margin: 10px 0px 0px;"></div>

            <button class="text-sm px-3 py-1 font-semibold text-gray-600 mt-2 cursor-pointer">
                View all coupons >
            </button>
        </div>

        <!-- Phone number input -->
        <section class="space-y-1">
            <h2 class="font-bold text-xl mt-4">Enter phone number</h2>
            <p class="text-gray-600 text-sm">Please provide your phone number to continue</p>
            <div class="border border-gray-300 rounded-lg flex  overflow-hidden shadow-sm mt-5">
                <div class="flex items-center px-3 py-3 border-r border-gray-300">
                    <img class="pr-0.5" src="https://fastrr-boost-ui.pickrr.com/assets/images/indian_flag.svg" alt="">
                    <span style="font-size: 16px; font-weight: 400;">+91</span>
                </div>
                <form action="" id="phone_number">
                    <input class="w-full focus:outline-none px-3 py-3" type="text" name="phone_number" value="" placeholder="10-digit phone number" required>
                </form>
            </div>
            <button form="phone_number" id="submit" type="submit" class="px-44 py-2 bg-black text-white text-lg font-semibold rounded-md shadow-md hover:bg-gray-800 transition mt-1">Submit</button>
        </section>

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
</x-modalPartials.layout>