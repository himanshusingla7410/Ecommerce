<!DOCTYPE html>
<html lang="en"class="h-full">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Dilkash</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Allura&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/15.7.0/nouislider.min.css">

    @vite(['resources/js/app.js'])
</head>

<body class="flex flex-col min-h-screen">
    <x-header></x-header>

    <div class="bg-white ">
        {{ $slot }}
    </div>

    <!-- Track Button Fixed -->
    <div class="fixed bottom-6 right-6">
        <button class="bg-purple-600 text-white px-4 py-2 rounded-full flex items-center gap-2 shadow-lg">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v2H4a2 2 0 00-2 2v3a7 7 0 1014 0V7a2 2 0 00-2-2h-1V3a1 1 0 00-1-1H6zM5 5V3h6v2H5z" clip-rule="evenodd" />
            </svg>
            Track
        </button>
    </div>




    <x-footer></x-footer>
    @stack('scripts')
</body>

</html>