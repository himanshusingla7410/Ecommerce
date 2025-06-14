<div {{ $attributes->merge(['class' => 'fixed top-40 right-10 border border-red-800 bg-red-100 text-red-800 p-4 w-80 rounded-md z-50 shadow-lg']) }}>
    <strong>Failed !</strong>
    <p>{{$slot}}</p>
</div>