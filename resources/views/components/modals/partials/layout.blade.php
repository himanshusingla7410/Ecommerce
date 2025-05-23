<body>
     <div id="modalOverlay" class="fixed inset-0 bg-[rgba(0,0,0,0.4)] z-40 hidden items-center justify-center mt-8 overflow-y-auto"> <!--overflow-y-auto added to make modal scrollable  -->
        <div id="main" class="container mx-auto max-w-lg bg-white justify-content: text-center shadow-md rounded-md ">
            <x-modals.partials.header></x-modals.partials.header>
            {{$slot}}
        </div>
    </div>
</body>