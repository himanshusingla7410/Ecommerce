<div id="address-form" class="fixed inset-0 bg-[rgba(0,0,0,0.4)]  items-center justify-center z-50 hidden overflow-y-auto">
    <div class="relative bg-white rounded-xl shadow-2xl p-6 text-center max-w-2xl w-full">
        <h2 class="text-2xl font-bold text-gray-800 mt-10">Add Address</h2>

        <button class="absolute top-3 right-4 text-gray-500 hover:text-black text-2xl font-bold">&times;</button>

        <form action="/address" method="POST" id="addressForm">
            @csrf

            <div class="space-y-12">
                <div class="border-b border-gray-900/10 pb-12">
                    <h2 class="text-base/7 font-semibold text-gray-900">Personal Information</h2>
                    <p class="mt-1 text-sm/6 text-gray-600">Use a permanent address where you can receive items.</p>
                    <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                        <div class="sm:col-span-3">
                            <label for="first_name" class="block text-sm/6 font-medium text-gray-900">First name</label>
                            <div class="mt-2">
                                <input type="text" name="first_name" id="first_name" autocomplete="given-name" value='' class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                            </div>
                            @error('first_name')
                            <p class="text-red-500 text-xs font-semibold mt1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="sm:col-span-3">
                            <label for="last_name" class="block text-sm/6 font-medium text-gray-900">Last name</label>
                            <div class="mt-2">
                                <input type="text" name="last_name" id="last_name" autocomplete="family-name" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                            </div>
                            @error('last_name')
                            <p class="text-red-500 text-xs font-semibold mt1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="sm:col-span-4">
                            <label for="email" class="block text-sm/6 font-medium text-gray-900">Email address</label>
                            <div class="mt-2">
                                <input id="email" name="email" type="email" autocomplete="email" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                            </div>
                            @error('email')
                            <p class="text-red-500 text-xs font-semibold mt1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="sm:col-span-3 ">
                            <label for="country" class="block text-sm/6 font-medium text-gray-900">Country</label>
                            <div class="mt-2 grid grid-cols-1">
                                <select id="country" name="country" autocomplete="country-name" class="col-start-1 row-start-1 w-full appearance-none rounded-md bg-white py-1.5 pr-8 pl-3 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                                    <option>United States</option>
                                    <option>Canada</option>
                                    <option>Mexico</option>
                                </select>
                                <svg class="pointer-events-none col-start-1 row-start-1 mr-2 size-5 self-center justify-self-end text-gray-500 sm:size-4" viewBox="0 0 16 16" fill="currentColor" aria-hidden="true" data-slot="icon">
                                    <path fill-rule="evenodd" d="M4.22 6.22a.75.75 0 0 1 1.06 0L8 8.94l2.72-2.72a.75.75 0 1 1 1.06 1.06l-3.25 3.25a.75.75 0 0 1-1.06 0L4.22 7.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
                                </svg>
                            </div>

                        </div>
                        <div class="sm:col-span-3">
                            <label for="mobile_number" class="block text-sm/6 font-medium text-gray-900">Mobile Number</label>
                            <div class="mt-2">
                                <input type="text" name="mobile_number" id="mobile_number" autocomplete="family-name" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                            </div>
                            @error('mobile_number')
                            <p class="text-red-500 text-xs font-semibold mt1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="col-span-full">
                            <label for="address" class="block text-sm/6 font-medium text-gray-900">Street address</label>
                            <div class="mt-2">
                                <input type="text" name="address" id="address" autocomplete="address" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                            </div>
                            @error('address')
                            <p class="text-red-500 text-xs font-semibold mt1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="sm:col-span-2 sm:col-start-1">
                            <label for="city" class="block text-sm/6 font-medium text-gray-900">City</label>
                            <div class="mt-2">
                                <input type="text" name="city" id="city" autocomplete="address-level2" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                            </div>
                            @error('city')
                            <p class="text-red-500 text-xs font-semibold mt1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="sm:col-span-2">
                            <label for="state" class="block text-sm/6 font-medium text-gray-900">State / Province</label>
                            <div class="mt-2">
                                <input type="text" name="state" id="state" autocomplete="address-level1" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                            </div>
                            @error('state')
                            <p class="text-red-500 text-xs font-semibold mt1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="sm:col-span-2">
                            <label for="postal_code" class="block text-sm/6 font-medium text-gray-900">ZIP / Postal code</label>
                            <div class="mt-2">
                                <input type="text" name="postal_code" id="postal_code" autocomplete="postal_code" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                            </div>
                            @error('postal_code')
                            <p class="text-red-500 text-xs font-semibold mt1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-6 flex items-center justify-end gap-x-6">
                <button id="cancel-btn" type="button" class="text-sm/6 font-semibold text-gray-900 cursor-pointer">Cancel</button>
                <button id="submit-btn" type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 cursor-pointer">Save & Proceed</button>
                <button id="update-btn" type="button" class=" rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 cursor-pointer">Update & Proceed</button>
            </div>

        </form>
    </div>

</div>

