

<?php $__env->startSection('content'); ?>
<div class="p-2">
    <div class="block justify-between sm:flex">
        <div class="mb-3 lg:mb-0">
            <h1 class="text-xl font-semibold text-black sm:text-2xl uppercase">PRODUCT </h1>
            <p id="count-products" class="md:ml-0 text-sm font-normal text-gray-500"></p>
        </div>
        <div class="flex flex-row">
            <div class="items-center mb-0 mr-4">
                <div class="relative w-48 lg:w-64 xl:w-96 flex justify-end items-center">
                    <input type="text" onkeyup="productSearch()" id="product-search" class="w-full bg-gray-50 border border-gray-300 text-black text-sm rounded-lg focus:ring-primary focus:border-primary p-2.5" placeholder="Model Search">
                    <svg class="h-8 w-8 absolute right-2 text-tertiary" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </div>
            </div>
            <?php echo $__env->make('pages/admin/product/modal-add', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    </div>
</div>

<table id="product-table" class="min-w-full shadow-md">
    <thead class="bg-gray-100 sticky top-0">
        <tr>
            <th scope="col" class="p-4 text-xs font-medium text-left text-black uppercase">
                Product Name <br>
                <p class="text-xxs font-normal">Model</p>
            </th>
            <th scope="col" class="p-4 text-xs font-medium text-left text-black uppercase">
                Image
            </th>
            <th scope="col" class="p-4 text-xs font-medium text-left text-black uppercase">
                Created by <br>
                <p class="text-xxs font-normal">Created time</p>
            </th>
            <th scope="col" class="p-4 text-xs font-medium text-left text-black uppercase">
                Edited by <br>
                <p class="text-xxs font-normal">Edited time</p>
            </th>
            <th scope="col" class="p-4 text-xs font-medium text-left text-black uppercase">
                Action
            </th>
        </tr>
    </thead>
    <tbody class="bg-white divide-y divide-gray-200">
        <?php if(isset($productData)): ?>
        <?php $__currentLoopData = $productData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr class="hover:bg-gray-100 ">

            <?php if(isset($product['product_name']) && $product['product_name'] !== '' && isset($product['product_model']) &&
            $product['product_model'] !== ''): ?>
            <td class="p-4 text-sm font-medium text-black whitespace-nowrap">
                <?php echo e($product['product_name']); ?>

                <p class="text-xxs font-normal"><?php echo e($product['product_model']); ?></p>
            </td>
            <?php else: ?>
            <td class="p-4 text-xs font-normal whitespace-nowrap">Data Not Found</td>
            <?php endif; ?>

            <?php if(isset($product['image_url']) && !empty($product['image_url'])): ?>
            <td class="m-1 mr-3 text-sm font-medium text-black whitespace-nowrap flex-col lg:grid grid-rows-2 grid-cols-2">
                <?php $__currentLoopData = $product['image_url']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $url): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <img class="object-fill w-10 h-12" src="<?php echo e($url); ?>" alt="NA">
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </td>
            <?php else: ?>
            <td class="p-4 text-xs font-normal whitespace-nowrap">Data Not Found</td>
            <?php endif; ?>

            <?php if(isset($product['created_by']) && $product['created_by'] !== '' && isset($product['created_at']) &&
            $product['created_at'] !== ''): ?>
            <td class="p-4 text-sm font-medium text-black whitespace-nowrap">
                <?php echo e($product['created_by']); ?> <br>
                <p class="text-xxs font-normal"><?php echo e($product['created_at']); ?></p>
            </td>
            <?php else: ?>
            <td class="p-4 text-xs font-normal whitespace-nowrap">Data Not Found</td>
            <?php endif; ?>

            <?php if(isset($product['edited_by']) && $product['edited_by'] !== '' && isset($product['edited_at']) &&
            $product['edited_at'] !== ''): ?>
            <td class="p-4 text-sm font-medium text-black whitespace-nowrap">
                <?php echo e($product['edited_by']); ?> <br>
                <p class="text-xxs font-normal"><?php echo e($product['edited_at']); ?></p>
            </td>
            <?php else: ?>
            <td class="p-4 text-xs font-normal whitespace-nowrap">Data Not Found</td>
            <?php endif; ?>

            <td class="p-4 flex flex-col lg:flex-row space-y-2 lg:space-y-0 lg:space-x-2">
                <div class="w-36">
                    <?php echo $__env->make('pages/admin/product/modal-update', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
                <div class="w-36 lg:w-24">
                    <?php echo $__env->make('pages/admin/product/modal-delete', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
            </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
    </tbody>
</table>
<?php if(isset($message)): ?>
<div class="w-full text-center p-4">
    <?php echo e($message); ?>

</div>
<?php endif; ?>



<script>
    function productSearch() {
        var input, filter, tbody, tr, td, i, txtValue;
        input = document.getElementById("product-search");
        filter = input.value.toUpperCase();
        tbody = document.getElementById("product-table-body");
        tr = tbody.getElementsByTagName("tr");

        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[0];
            txtValue = td.textContent || td.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
        }
    }

    function countAndDisplayVisibleRows() {
        var trElements = document.querySelectorAll("#product-table tbody tr");
        var visibleRowCount = 0;

        trElements.forEach((tr) => {
            if (window.getComputedStyle(tr).display !== "none") {
                visibleRowCount++;
            }
        });

        var countProducts = document.getElementById("count-products");
        countProducts.innerText = "showing of " + visibleRowCount + " products";
    }

    document.getElementById("product-search").addEventListener("keyup", countAndDisplayVisibleRows);

    document.addEventListener("DOMContentLoaded", countAndDisplayVisibleRows);

</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts/admin',['title' => 'Product CMS'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\my-project\miscibles-platform\src\resources\views/pages/admin/product/cms.blade.php ENDPATH**/ ?>