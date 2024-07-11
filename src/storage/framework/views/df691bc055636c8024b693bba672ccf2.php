<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" type="image/x-icon" href="/images/favicon.ico">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Inter&display=swap" rel="stylesheet"/>
    <?php echo $__env->yieldContent('link'); ?>
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css','resources/js/app.js']); ?>
  </head>
<body>    
  
    <?php if(session('status')): ?>
    <div id="alert" class="w-full fixed bottom-0 z-50 flex items-center p-8 text-gray-800 border-gray-600 bg-gray-800 justify-center" role="alert">
      <svg class="flex-shrink-0 w-4 h-4 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
      </svg>
      <div class="ml-6 ms-3 text-sm font-medium text-white">
        <?php echo e(session('status')); ?>

      </div>
      <button type="button" class="rounded-md ml-6 -mx-1.5 -my-1.5 bg-gray-100 text-gray-800 p-1.5 hover:bg-gray-400 inline-flex items-center justify-center h-8 w-8"  data-dismiss-target="#alert" aria-label="Close">
        <span class="sr-only">Dismiss</span>
        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
        </svg>
      </button>
    </div>
    <?php endif; ?>

    <?php if(session('error')): ?>
    <div id="alert-2" class="w-full fixed bottom-0 z-50 flex items-center p-8 text-gray-800 border-gray-600 bg-gray-800 justify-center" role="alert">
      <svg class="flex-shrink-0 w-4 h-4 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
      </svg>
      <div class="ml-6 ms-3 text-sm font-medium text-white">
        <?php echo e(session('error')); ?>

      </div>
      <button type="button" class="rounded-md ml-6 -mx-1.5 -my-1.5 bg-gray-100 text-gray-800 p-1.5 hover:bg-gray-400 inline-flex items-center justify-center h-8 w-8"  data-dismiss-target="#alert-2" aria-label="Close">
        <span class="sr-only">Dismiss</span>
        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
        </svg>
      </button>
    </div>
    <?php endif; ?>

    <div>
      <?php echo $__env->make('CONTENT_MANAGEMENT_SYSTEM/component/navSidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>

    <div class="p-6 pt-2 lg:ml-56">
        <?php echo $__env->yieldContent('content'); ?>
   </div>

   <div class="hidden fixed bottom-0 left-5 lg:left-16 p-4 z-40 opacity-70" id="scroll-btn">
    <button class="bg-gray-800 text-white rounded-md w-12 h-12 flex items-center justify-center p-3" onclick="backToTop()" >
      <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"></path>
      </svg>
    </button>
  </div>
    
    <script>
      // Get the button
      let mybutton = document.getElementById("scroll-btn");
      
      // When the user scrolls down 20px from the top of the document, show the button
      window.onscroll = function() {
        scrollFunction()
      };
      
      function scrollFunction() {
        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
          mybutton.classList.remove("hidden");
        } else {
          mybutton.classList.add("hidden");
        }
      }
      
      // When the user clicks on the button, scroll to the top of the document
      function backToTop() {
        window.scrollTo({top: 0, behavior: 'smooth'});
      }


      if (performance.navigation.type === performance.navigation.TYPE_RELOAD) {
          fetch('/clear-cache')
        .then(response => response.json())
        .then(data => console.log(data));
        }
      </script>
  </body>
</html><?php /**PATH C:\my-project\miscibles-platform\src\resources\views/CONTENT_MANAGEMENT_SYSTEM/layout/defaultLayout.blade.php ENDPATH**/ ?>