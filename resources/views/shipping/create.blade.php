<x-layout>
    <x-partials.successAlert>Order details sent on mail.</x-partials.successAlert>
    <!-- Payment Success  -->
    <div class="mt-40 mb-40 ml-70 mr-70 border border-black-300 rounded-md shadow-lg ">
        <div class="flex justify-center mt-5 ">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-15">
                <path fill-rule="evenodd" d="M8.603 3.799A4.49 4.49 0 0 1 12 2.25c1.357 0 2.573.6 3.397 1.549a4.49 4.49 0 0 1 3.498 1.307 4.491 4.491 0 0 1 1.307 3.497A4.49 4.49 0 0 1 21.75 12a4.49 4.49 0 0 1-1.549 3.397 4.491 4.491 0 0 1-1.307 3.497 4.491 4.491 0 0 1-3.497 1.307A4.49 4.49 0 0 1 12 21.75a4.49 4.49 0 0 1-3.397-1.549 4.49 4.49 0 0 1-3.498-1.306 4.491 4.491 0 0 1-1.307-3.498A4.49 4.49 0 0 1 2.25 12c0-1.357.6-2.573 1.549-3.397a4.49 4.49 0 0 1 1.307-3.497 4.49 4.49 0 0 1 3.497-1.307Zm7.007 6.387a.75.75 0 1 0-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 0 0-1.06 1.06l2.25 2.25a.75.75 0 0 0 1.14-.094l3.75-5.25Z" clip-rule="evenodd" />
            </svg>
        </div>
        <p class="mb-4 text-3xl font-semibold text-center py-5">Order placed successfully !</p>

        <div class="border border-gray-300 space-y-4 rounded-md p-8 m-10">
            <div class="flex">
                <span>Order number: </span>
                <p class="ml-2 font-semibold">{{$orderDetails['orderNumber']}}</p>
            </div>
            <div class="flex">
                <span>Receiver name: </span>
                <p class="ml-2 ">{{$orderDetails['receiverName']}}</p>
            </div>
            <div class="flex">
                <span>Address: </span>
                <p class="ml-2"> {{$orderDetails['address']}}</p>
            </div>
            <div class="flex">
                <span>Mobile number: </span>
                <p class="ml-2"> {{$orderDetails['mobileNumber']}}</p>
            </div>
            <div class="flex">
                <span>Amount: </span>
                <p class="ml-2"> {{$orderDetails['amount']}}</p>
            </div>
            <div class="flex">
                <span>Payment Status: </span>
                <p class=" font-semibold text-green-700 ml-2"> {{$orderDetails['paymentStatus']}}</p>
            </div>
        </div>

        <div class="flex justify-center gap-4 py-8" id="close-btn">
            <a href="/" class="px-4 py-2 bg-blue-700 text-white rounded hover:bg-blue-600">Back To Shopping</a>
        </div>
    </div>


    @push('scripts')
    @vite(['resources/js/orderDetails.js'])
    @endpush


</x-layout>