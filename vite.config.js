import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 
                    'resources/js/app.js',
                    'resources/js/allProducts.js',
                    'resources/js/cart.js',
                    'resources/js/helper.js',
                    'resources/js/orderDetails.js',
                    'resources/js/paymentGateway.js',
                    'resources/js/productView.js',
                    'resources/js/modal/coupon.js',
                    'resources/js/modal/modal.js',
                    'resources/js/modal/shipping.js',
                    'resources/js/modal/welcome.js',
                    ],
            refresh: true,
        }),
        tailwindcss(),
    ],
    
});
