 @foreach ($products as $product)
 <a href="/product/{{$product->product_name}}" class="section overflow-hidden rounded-md shadow hover:shadow-lg transition">
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