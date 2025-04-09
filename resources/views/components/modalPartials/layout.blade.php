<body>
    <div id="modalOverlay" class="fixed inset-0 bg-[rgba(0,0,0,0.4)] z-40 hidden items-center justify-center mt-8">
        <div id="main" class="container mx-auto max-w-lg bg-white justify-content: text-center shadow-md rounded-md">
            <x-modalPartials.header></x-modalPartials.header>
            {{$slot}}
        </div>
    </div>
</body>