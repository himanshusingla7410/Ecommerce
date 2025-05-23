<div id="main" class="fixed inset-0 bg-[rgba(0,0,0,0.4)]  items-center justify-center z-50 hidden">
    <div class="relative bg-white rounded-xl shadow-2xl p-6 text-center max-w-auto h-120  ">
        <div class="flex justify-between items-center">
            <div id="title" style="font-family: 'Allura';" class="font-semibold text-5xl text-red-500 mt-5 ml-50">DILkash</div>
            <button id="close-btn" class="text-end cursor-pointer">X</button>
        </div>

        @auth
        <div class="space-y-8">
            <h2 class="font-semibold mt-12 text-3xl text-rounded">Congrats !🎉</h2>
            <p class="font-bold text-5xl">{{ session("couponCode") ?? 'WELCOME200' }} Unlocked.</p>

            <div class="relative border border-gray-300 rounded-lg flex overflow-hidden shadow-sm mt-5">
                <input class="w-full focus:outline-none px-3 py-2 text-center text-lg" type="text" id="coupon-code" name="coupon-code" value='{{ session("couponCode") ?? "WELCOME200" }}' readonly>

                <!-- Copy Button  -->
                <button id="copy-btn" type="button" class="mr-3 cursor-pointer relative group">
                    <span class="absolute -top-8 left-1/2 -translate-x-1/2 bg-gray-800 text-white text-xs px-2 py-1 rounded opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 whitespace-nowrap z-10">
                        Copy
                    </span>

                    <!-- Clipboard Icon -->
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 group-hover:text-blue-500 transition-colors">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.666 3.888A2.25 2.25 0 0 0 13.5 2.25h-3c-1.03 0-1.9.693-2.166 1.638m7.332 0c.055.194.084.4.084.612v0a.75.75 0 0 1-.75.75H9a.75.75 0 0 1-.75-.75v0c0-.212.03-.418.084-.612m7.332 0c.646.049 1.288.11 1.927.184 1.1.128 1.907 1.077 1.907 2.185V19.5a2.25 2.25 0 0 1-2.25 2.25H6.75A2.25 2.25 0 0 1 4.5 19.5V6.257c0-1.108.806-2.057 1.907-2.185a48.208 48.208 0 0 1 1.927-.184" />
                    </svg>
                </button>
            </div>

            <div class="mt-1">
                <a href="/" class="shop-now px-44 py-3 bg-black text-white text-2xl font-semibold rounded-md shadow-md hover:bg-gray-800 transition mt-1">SHOP NOW</a>
            </div>
            <p class="text-gray-600 text-s py-2">You have subscribed to receive communication and can unsubscribe at any time.</p>
        </div>
        @endauth
        @guest
        <div class="discount-offer">
            <div class="space-y-1">
                <h2 class="font-semibold mt-12  text-5xl text-rounded">Get 10% OFF</h2>
                <p class="text-gray-600 text-sm mt-5">Sign up and unlock your instant discount.</p>

                <div class="border border-gray-300 rounded-lg flex  overflow-hidden shadow-sm mt-5">
                    <div class="flex items-center px-3 py-3 border-r border-gray-300">
                        <img class="pr-0.5" src="https://fastrr-boost-ui.pickrr.com/assets/images/indian_flag.svg" alt="">
                        <span style="font-size: 16px; font-weight: 400;">+91</span>
                    </div>
                    <form action="/login" id="mobile_number" method="POST">
                        @csrf
                        <input class="w-full focus:outline-none px-3 py-3" type="text" name="mobile_number" value="" placeholder="10-digit phone number" required>
                    </form>
                </div>

            </div>

            <div class="mt-1">
                <button form="mobile_number" type="submit" class="px-44 py-3 bg-black text-white text-2xl font-semibold rounded-md shadow-md hover:bg-gray-800 transition mt-1 cursor-pointer" >Claim discount</button>
            </div>

            <div class="mt-5">
                <button id="no-thanks" class="text-indigo-500 hover:underline cursor-pointer text-xl">No, thanks</button>
            </div>
            <p class="text-gray-600 text-s mt-6">You are signing up to receive communication and can unsubscribe at any time.</p>
        </div>
        @endguest

    </div>
</div>