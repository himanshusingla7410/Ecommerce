<!DOCTYPE html>
<html lang="en" class="h-full">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Page Not Found | Dilkash</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Allura&display=swap" rel="stylesheet">
    @vite(['resources/js/app.js'])
    <style>
        .error-illustration {
            font-family: 'Allura', cursive;
        }
    </style>
</head>

<body class="flex flex-col min-h-screen bg-gray-50">
    <x-header></x-header>

    <main class="flex-grow flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8 mt-30">
        <div class="max-w-md w-full space-y-8 text-center">
            <div class="error-illustration text-purple-600 text-9xl mb-6">404</div>
            <h1 class="text-3xl font-extrabold text-gray-900">Oops! Page Not Found</h1>
            <p class="mt-4 text-lg text-gray-600">The page you're looking for doesn't exist or has been moved.</p>

            <div class="mt-8">
                <a href="/cart" class="group relative w-full flex justify-center py-3 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-purple-600 hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500 transition duration-150 ease-in-out">
                    <span class="absolute left-0 inset-y-0 flex items-center pl-3">
                        <svg class="h-5 w-5 text-purple-300 group-hover:text-purple-200" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z" clip-rule="evenodd" />
                        </svg>
                    </span>
                    Return to Cart
                </a>
            </div>

            
        </div>
    </main>

    <!-- Track Button Fixed -->
    <div class="fixed bottom-6 right-6">
        <button class="bg-purple-600 text-white px-4 py-2 rounded-full flex items-center gap-2 shadow-lg hover:bg-purple-700 transition duration-150 ease-in-out">
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