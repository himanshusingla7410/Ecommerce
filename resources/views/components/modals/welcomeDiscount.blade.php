<div id="main" class="fixed inset-0 bg-[rgba(0,0,0,0.4)]  items-center justify-center z-50 hidden">
    <div class="relative bg-white rounded-xl shadow-2xl p-6 text-center max-w-auto h-120  ">
        <div class="flex justify-between items-center">
            <div id="title" style="font-family: 'Allura';" class="font-semibold text-5xl text-red-500 mt-5 ml-50">DILkash</div>
            <button id="close-btn" class="text-end cursor-pointer">X</button>
        </div>

        
        <div class="space-y-12 hidden">
            <h2 class="font-semibold mt-12  text-3xl text-rounded">Congrats !🎉</h2>
            <p class="font-bold text-5xl">WELCOME200 Unlocked.</p>
            <div class="mt-1">
                <a href="/" class="px-44 py-3 bg-black text-white text-2xl font-semibold rounded-md shadow-md hover:bg-gray-800 transition mt-1">SHOP NOW</a>
            </div>
            <p class="text-gray-600 text-s mt-6">You have subcribed to receive communication and can unsubscribe at any time.</p>
        </div>
        
        <div class="discount-offer">
            <div class="space-y-1">
                <h2 class="font-semibold mt-12  text-5xl text-rounded">Get 10% OFF</h2>
                <p class="text-gray-600 text-sm mt-5">Sign up and unlock your instant discount.</p>

                <div class="border border-gray-300 rounded-lg flex  overflow-hidden shadow-sm mt-5">
                    <div class="flex items-center px-3 py-3 border-r border-gray-300">
                        <img class="pr-0.5" src="https://fastrr-boost-ui.pickrr.com/assets/images/indian_flag.svg" alt="">
                        <span style="font-size: 16px; font-weight: 400;">+91</span>
                    </div>
                    <form action="/login" id="mobile_number">
                        <input class="w-full focus:outline-none px-3 py-3" type="text" name="mobile_number" value="" placeholder="10-digit phone number" required>
                    </form>
                </div>

            </div>

            <div class="mt-1">
                <button form="mobile_number" id="submit" type="submit" class="px-44 py-3 bg-black text-white text-2xl font-semibold rounded-md shadow-md hover:bg-gray-800 transition mt-1 cursor-pointer">Claim discount</button>
            </div>

            <div class="mt-5">
                <button id="no-thanks" class="text-indigo-500 hover:underline cursor-pointer text-xl">No, thanks</button>
            </div>
            <p class="text-gray-600 text-s mt-6">You are signing up to receive communication and can unsubscribe at any time.</p>
        </div>
        

    </div>
</div>