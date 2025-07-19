<x-layout>
    <x-slot:heading>
        Shipping
    </x-slot:heading>
    @if($errors->any())
    <x-partials.failAlert> Oops! Something went wrong. Try again.</x-partials.failAlert>
    @endif
    <x-partials.attentionAlert>Please select an address.</x-partials.attentionAlert>
    <x-partials.failAlert>Request initiation failed.</x-partials.failAlert>

    <div class="mt-50 px-25">
        <div class="flex mb-5 ">
            <a href="/cart" class="text-gray-600 hover:text-gray-400">Cart</a>
            <span class="text-gray-600 ">&gt; Address</span>
            <span class="text-gray-600 ">&gt; Payment</span>
        </div>
        <div class="flex items-center mb-3">
            <a href="/cart">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" />
                </svg>
            </a>
            <p class="text-xl font-semibold mb-3 ml-2">Enter Delivery Address</p>
        </div>

        <div class="grid grid-cols-3 gap-4  shadow-md ">
            <!-- Delivery address section -->
            <div class=" col-span-2 border  border-gray-300 bg-gray-50 rounded-md px-5">
                <div class="flex border-b border-gray-200 ">
                    <div class="mt-5">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z" />
                        </svg>
                    </div>
                    <p class=" py-5 pl-3 font-semibold">Select Delivery Address </p>
                </div>
                @if ( isset($addresses))
                @foreach ( $addresses as $address)
                <div class=" border-b border-gray-200 p-5">
                    <div class="flex justify-between">
                        <div class="flex">
                            <input id="{{ $address['id'] }}" name="select_address" type="radio" value="{{ $address['addressDetails'] }}">
                            <p class=" ml-1 ">{{ $address['name'] }}</p>
                            <p class=" ml-1 hidden">{{ $address['email'] }}</p>
                            <p class=" ml-1">{{ $address['addressDetails'] }}</p>
                            <p class=" ml-1">{{ $address['city'] }}</p>
                            <p class=" ml-1">{{ $address['state'] }}</p>
                            <p class=" ml-1">{{ $address['postal_code'] }}</p>
                        </div>
                        <button type="button" class="edit-btn text-indigo-500 hover:underline cursor-pointer " data-id="{{ $address['id'] }}">Edit</button>
                    </div>
                    <div>
                        <p class="mt-2 ml-4 font-semibold text-xs">Mobile number: <span id="mobile-number">{{ $address['mobile_number']}}</span></p>
                    </div>
                </div>
                @endforeach
                @endif


                <!-- Add address button -->
                <div id="add-address-btn" class="flex p-2 bg-sky-200 border border-sky-300 rounded-md cursor-pointer w-50 hover:bg-sky-100 mt-5 mb-3">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>
                    <button class=" cursor-pointer ml-2 font-semibold ">Add new address</button>
                </div>
            </div>
            <!-- Billing details -->
            <div class="px-5  border border-gray-300 bg-gray-50 rounded-md">
                <p class="font-semibold border-b border-gray-200 py-5">Billing details</p>
                <!-- Tax and discount -->
                <div class="border-b border-gray-200  py-3 text-sm">
                    <div class="text-s flex justify-between space-y-2 ">
                        <span class="text-gray-400 ">MRP (Incl. Tax)</span>
                        <p class="font-semibold">₹ <span class="font-semibold">{{$orderAmt ?? 0}} </span></p>
                    </div>
                    @if(isset($couponUsed))
                    <div class="text-s flex justify-between">
                        <span class="text-gray-400">Discount ( <span id="couponCode">{{$couponUsed ?? 0}} </span> )</span>
                        <p class="font-semibold">- ₹ <span class="font-semibold">{{$savings ?? 0}}</span></p>
                    </div>
                    @endif
                </div>

                <!-- Total amount -->
                <div class="flex justify-between py-3">
                    <span class="font-semibold">Total Amount</span>
                    <p class="font-semibold">₹ <span id="totalAmt" class="font-semibold">{{$totalAmt ?? 0}}</span></p>
                </div>

                <!-- Global recognition and made with love -->
                <div class="border border-gray-200 flex p-7 justify-center space-x-15 rounded-md shadow-md mt-4">
                    <div>
                        <div class="flex justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12.75 3.03v.568c0 .334.148.65.405.864l1.068.89c.442.369.535 1.01.216 1.49l-.51.766a2.25 2.25 0 0 1-1.161.886l-.143.048a1.107 1.107 0 0 0-.57 1.664c.369.555.169 1.307-.427 1.605L9 13.125l.423 1.059a.956.956 0 0 1-1.652.928l-.679-.906a1.125 1.125 0 0 0-1.906.172L4.5 15.75l-.612.153M12.75 3.031a9 9 0 0 0-8.862 12.872M12.75 3.031a9 9 0 0 1 6.69 14.036m0 0-.177-.529A2.25 2.25 0 0 0 17.128 15H16.5l-.324-.324a1.453 1.453 0 0 0-2.328.377l-.036.073a1.586 1.586 0 0 1-.982.816l-.99.282c-.55.157-.894.702-.8 1.267l.073.438c.08.474.49.821.97.821.846 0 1.598.542 1.865 1.345l.215.643m5.276-3.67a9.012 9.012 0 0 1-5.276 3.67m0 0a9 9 0 0 1-10.275-4.835M15.75 9c0 .896-.393 1.7-1.016 2.25" />
                            </svg>
                        </div>
                        <span>Global recognition</span>
                    </div>

                    <div>
                        <div class="flex justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
                            </svg>
                        </div>
                        <span>Made with love</span>
                    </div>
                </div>

                <!-- Proceed button -->
                <div class="py-6 flex justify-center">
                    <button id="rzp-button1" type="button" class="px-30  py-2 bg-black text-white text-lg font-semibold rounded-md shadow-md hover:bg-gray-800 transition mt-1 cursor-pointer">Proceed to pay</button>
                </div>

                <!-- Bottom icons -->
                <div class="flex justify-center space-x-6 mb-8">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                        <path d="M10.464 8.746c.227-.18.497-.311.786-.394v2.795a2.252 2.252 0 0 1-.786-.393c-.394-.313-.546-.681-.546-1.004 0-.323.152-.691.546-1.004ZM12.75 15.662v-2.824c.347.085.664.228.921.421.427.32.579.686.579.991 0 .305-.152.671-.579.991a2.534 2.534 0 0 1-.921.42Z" />
                        <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25ZM12.75 6a.75.75 0 0 0-1.5 0v.816a3.836 3.836 0 0 0-1.72.756c-.712.566-1.112 1.35-1.112 2.178 0 .829.4 1.612 1.113 2.178.502.4 1.102.647 1.719.756v2.978a2.536 2.536 0 0 1-.921-.421l-.879-.66a.75.75 0 0 0-.9 1.2l.879.66c.533.4 1.169.645 1.821.75V18a.75.75 0 0 0 1.5 0v-.81a4.124 4.124 0 0 0 1.821-.749c.745-.559 1.179-1.344 1.179-2.191 0-.847-.434-1.632-1.179-2.191a4.122 4.122 0 0 0-1.821-.75V8.354c.29.082.559.213.786.393l.415.33a.75.75 0 0 0 .933-1.175l-.415-.33a3.836 3.836 0 0 0-1.719-.755V6Z" clip-rule="evenodd" />
                    </svg>

                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                        <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25ZM9.624 7.084a.75.75 0 0 0-1.248.832l2.223 3.334H9a.75.75 0 0 0 0 1.5h2.25v1.5H9a.75.75 0 0 0 0 1.5h2.25v1.5a.75.75 0 0 0 1.5 0v-1.5H15a.75.75 0 0 0 0-1.5h-2.25v-1.5H15a.75.75 0 0 0 0-1.5h-1.599l2.223-3.334a.75.75 0 1 0-1.248-.832L12 10.648 9.624 7.084Z" clip-rule="evenodd" />
                    </svg>

                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                        <path d="M4.5 3.75a3 3 0 0 0-3 3v.75h21v-.75a3 3 0 0 0-3-3h-15Z" />
                        <path fill-rule="evenodd" d="M22.5 9.75h-21v7.5a3 3 0 0 0 3 3h15a3 3 0 0 0 3-3v-7.5Zm-18 3.75a.75.75 0 0 1 .75-.75h6a.75.75 0 0 1 0 1.5h-6a.75.75 0 0 1-.75-.75Zm.75 2.25a.75.75 0 0 0 0 1.5h3a.75.75 0 0 0 0-1.5h-3Z" clip-rule="evenodd" />
                    </svg>

                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                        <path d="M12 7.5a2.25 2.25 0 1 0 0 4.5 2.25 2.25 0 0 0 0-4.5Z" />
                        <path fill-rule="evenodd" d="M1.5 4.875C1.5 3.839 2.34 3 3.375 3h17.25c1.035 0 1.875.84 1.875 1.875v9.75c0 1.036-.84 1.875-1.875 1.875H3.375A1.875 1.875 0 0 1 1.5 14.625v-9.75ZM8.25 9.75a3.75 3.75 0 1 1 7.5 0 3.75 3.75 0 0 1-7.5 0ZM18.75 9a.75.75 0 0 0-.75.75v.008c0 .414.336.75.75.75h.008a.75.75 0 0 0 .75-.75V9.75a.75.75 0 0 0-.75-.75h-.008ZM4.5 9.75A.75.75 0 0 1 5.25 9h.008a.75.75 0 0 1 .75.75v.008a.75.75 0 0 1-.75.75H5.25a.75.75 0 0 1-.75-.75V9.75Z" clip-rule="evenodd" />
                        <path d="M2.25 18a.75.75 0 0 0 0 1.5c5.4 0 10.63.722 15.6 2.075 1.19.324 2.4-.558 2.4-1.82V18.75a.75.75 0 0 0-.75-.75H2.25Z" />
                    </svg>
                </div>

            </div>

            <!-- Billing and shipping address -->
            <div class="col-span-2  border  border-gray-300 bg-gray-50 rounded-md px-5 py-3 mb-8">
                <!-- title -->
                <div class=" py-5 border-b border-gray-200 mb-5">
                    <p class="font-semibold  ">Enter Billing Address</p>
                </div>
                <!-- checkbox -->
                <div class=" flex border border-gray-200 rounded-md shadow-md p-5 mb-8">
                    <input id="shipping-address" class="mr-2" name="shipping-address" type="checkbox" value="">
                    <label for="shipping-address" class="font-semibold text-sm">Billing address is same as shipping address.</label>
                </div>
            </div>

        </div>
    </div>
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>


    <x-modals.addressForm />

    @push('scripts')
    @vite(['resources/js/modal/shipping.js'])
    @vite(['resources/js/paymentGateway.js'])
    @endpush


</x-layout>