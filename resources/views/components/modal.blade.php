<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dilkash</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Allura&display=swap" rel="stylesheet">
    @vite(['resources/js/app.js'])
</head>

<body class=" ">

    <div id="modalOverlay" class="fixed inset-0 bg-black bg-opacity-50 z-40 hidden items-center justify-center">

        <div id="main" class="container mx-auto max-w-lg bg-white justify-content: text-center shadow-md rounded-md">
            <header>
                <div class="flex justify-between items-center">
                    <div class="ml-6 ">
                        <button id="close-btn" href="" class="flex justify-start ">X</button>
                    </div>
                    <div class="mr-50">
                        <h1 class=" font-bold text-3xl text-red-500 text-center  px-3 py-3 " style="font-family: Allura ;">DILkash</h1>
                    </div>
                </div>

                <p class="text-white bg-black text-xs px-3 py-1 font-semibold ">Additional 5% Off (Upto Rs.100) On Pre-Paid Orders</p>
            </header>

            <div class="pt-8 px-8">

                <!-- Order Summary -->
                <div class="flex justify-between pb-4">
                    <div id="order-summary" class="font-semibold  ">Order Summary<span id="items"> (1 Item)</span></div>
                    <div id="price" class="font-semibold ">Rs. 2350.00</div>
                </div>

                <!-- Coupon Summary -->
                <div class="px-3 py-2 border border-gray-300 rounded-lg">
                    <div class="flex justify-between">
                        <div class="flex">
                            <img src="https://fastrr-boost-ui.pickrr.com/assets/images/svg/discount_icon.svg" alt="coupon-logo" class="pr-0.5">
                            <span id="coupon-code" class="text-s">XOXO10</span>
                        </div>
                        <div>
                            <button id="apply" class="text-indigo-500 font-semibold">Apply</button>
                        </div>

                    </div>
                    <div class=" flex justify-items-start text-green-800 font-semibold text-sm mt-3">
                        <p> Apply coupon and save<span> Rs. 235.00</span></p>
                    </div>
                    <div style="height: 1px; background-image: linear-gradient(90deg, rgba(0, 0, 0, 0.1), rgba(0, 0, 0, 0.1) 75%, transparent 75%, transparent 100%); background-size: 8px 1px; border: none; margin: 10px 0px 0px;"></div>

                    <div class="text-sm px-3 py-1 font-semibold text-gray-600 mt-2">
                        <a href="">
                            View all coupons >
                        </a>
                    </div>
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
                        <form action="">
                            <input class="w-full focus:outline-none px-3 py-3" type="text" name="phone_number" value="" placeholder="10-digit phone number" required>
                        </form>
                    </div>
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
        </div>
    </div>
</body>

</html>