<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>NEX - Home</title>
    <link rel="icon" type="image/x-icon" href="/images/favicon.ico">
    <?php echo app('Illuminate\Foundation\Vite')('resources/css/app.css'); ?>
</head>
<body>
    
    <div class="mx-10 sm:mx-20 md:mx-12 xl:mx-32 min-h-[80vh] mt-10 md:mt-0 flex-col md:grid md:grid-rows-2">
        <div class="flex items-end justify-center">
            <img class="mb-8 object-fill w-72 sm:w-80 md:w-[420px] lg:w-128 h-15 md:h-30 -z-10" src="/images/MISCIBLEs LOGO 1.jpg" alt="NEX logo" />
        </div>
        <div id="Menu" class="">
            <div class="grid md:grid-cols-3 gap-4">
                <a href="<?php echo e(url('standard_products')); ?>">
                    <button class="shadow-md transition hover:bg-green-600 hover:text-white h-full md:h-40 font-bold w-full rounded-[200px] bg-gray-300 border-2 border-green-600 text-lg lg:text-xl p-8 lg:p-10">
                        STANDARD PRODUCTS
                    </button>
                </a>
                <a href="<?php echo e(url('made_to_order')); ?>">
                    <button class="shadow-md transition hover:bg-green-600 hover:text-white h-full md:h-40 font-bold w-full rounded-[200px] bg-gray-300 border-2 border-green-600 text-lg lg:text-xl p-8 lg:p-10">
                        MADE TO ORDER 
                    </button>
                </a>
                <a href="#">
                    <button class="shadow-md transition hover:bg-green-600 hover:text-white h-full md:h-40 font-bold w-full rounded-[200px] bg-gray-300 border-2 border-green-600 text-lg lg:text-xl p-8 lg:p-10">
                        Ai RECOMMENDATION
                    </button>
                </a>
            </div>
        </div>
    </div>
</body>
</html>

<?php /**PATH C:\my-project\miscibles-platform\src\resources\views/welcome.blade.php ENDPATH**/ ?>