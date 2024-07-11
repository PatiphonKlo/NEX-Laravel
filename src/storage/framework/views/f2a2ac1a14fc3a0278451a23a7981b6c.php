<!DOCTYPE html>
<html>
<head>
    
    <title>NEX - Made to Orders</title>
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" type="image/x-icon" href="/images/favicon.ico">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Inter&display=swap" rel="stylesheet" />
    <?php echo $__env->yieldContent('link'); ?>
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
</head>
<body class="mb-5">
    
    <?php if(session('status')): ?>
    <div id="alert-border-3" class="flex items-center p-4 mb-4 text-green-800 border-t-4 border-green-800 bg-green-50" role="alert">
        <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
        </svg>
        <div class="ms-3 text-sm font-medium">
            <?php echo e(session('status')); ?>

        </div>
        <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-green-50 text-green-900 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8" data-dismiss-target="#alert-border-3" aria-label="Close">
            <span class="sr-only">Dismiss</span>
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
            </svg>
        </button>
    </div>
    <?php endif; ?>

    
    <?php if(session('error')): ?>
    <div id="alert-border-3" class="flex items-center p-4 mb-4 text-red-800 border-t-4 border-red-800 bg-red-50" role="alert">
        <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
        </svg>
        <div class="ms-3 text-sm font-medium">
            <?php echo e(session('error')); ?>

        </div>
        <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-red-50 text-red-900 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex items-center justify-center h-8 w-8" data-dismiss-target="#alert-border-3" aria-label="Close">
            <span class="sr-only">Dismiss</span>
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
            </svg>
        </button>
    </div>
    <?php endif; ?>
    <div class="mx-4 md:mx-12 lg:mx-16 xl:mx-32 xxl:mx-52 text-sm xl:text-base">
        
        <nav class="mt-5">
            <div class="max-w-screen flex flex-wrap lg:grid grid-cols-12 lg:gap-5 items-center justify-between mx-auto">
                <button data-collapse-toggle="navbar-default" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-900 rounded-lg lg:hidden hover:bg-gray-100 focus:outline-none" aria-controls="navbar-default" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15" />
                    </svg>
                </button>
                <a class="-z-10 lg:hidden col-span-3 flex-nowrap">
                    <img src="/images/MISCIBLEs LOGO 1.jpg" class="h-8 contrast-150" alt="MISCIBLEs" />
                </a>
                <div class="hidden w-full lg:block lg:w-auto col-span-9" id="navbar-default">
                    <ul class="lg:font-normal lg:grid grid-cols-9 gap-3 lg:gap-5 font-semibold mt-1 rounded-md lg:flex-row lg:mt-0 bg-gray-300 lg:bg-white">
                        <li class="col-span-2">
                            <div class="text-white text-center font-inter font-semibold flex item-center justify-center rounded-t-md lg:rounded-md bg-green-600 lg:border-2 border-green-600 p-2 uppercase">
                                Made to Order
                            </div>
                        </li>
                        <li class="col-span-1">
                            <a href="<?php echo e(url('/')); ?>">
                                <div class="text-center font-inter font-semibold flex item-center justify-center transition hover:bg-green-600 hover:text-white lg:rounded-md bg-gray-300 lg:border-2 border-green-600 p-2">
                                    HOME
                                </div>
                            </a>
                        </li>
                        <li class="col-span-3">
                            <a href="<?php echo e(url('standard_products')); ?>">
                                <div class="uppercase text-center font-inter font-semibold flex justify-center transition hover:bg-green-600 hover:text-white lg:rounded-md bg-gray-300 lg:border-2 border-green-600 p-2">
                                    Standard Products
                                </div>
                            </a>
                        </li>
                        <li class="col-span-3">
                            <a href="#" class="">
                                <div class="text-center font-inter font-semibold flex justify-center transition hover:bg-green-600 hover:text-white lg:rounded-md rounded-b-md bg-gray-300 lg:border-2 border-green-600 p-2">
                                    Ai RECOMMENDATION
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
                <a href="http://www.miscible.co.th/" class="hidden lg:flex -z-10 col-span-3 justify-center">
                    <img src="/images/MISCIBLEs LOGO 1.jpg" class="lg:h-10 xl:h-12" alt="NEX logo" />
                </a>
            </div>
        </nav>
        <?php echo $__env->yieldContent('content'); ?>    
    </div> 
</body>
<?php /**PATH C:\my-project\miscibles-platform\src\resources\views/MADE_TO_ORDER/layout/defaultLayout.blade.php ENDPATH**/ ?>