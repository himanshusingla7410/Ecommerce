<div {{$attributes->merge(['class'=> ' attention fixed top-40 right-10 border border-yellow-800 bg-yellow-100 text-yellow-800 p-4 w-80 rounded-md z-50 shadow-lg hidden']) }}>
    <strong>Attention !</strong>
    <p>{{$slot}}</p>
</div>