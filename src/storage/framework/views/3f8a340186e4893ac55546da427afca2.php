

<?php $__env->startSection('content'); ?>
<div class="p-2">
    <div class="block justify-between sm:flex">
        <div class="mb-3 lg:mb-0">
            <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl">COST ESTIMATION</h1>
            <p id="count-data" class="md:ml-0 text-sm font-normal text-gray-500"></p>
        </div>
        <div class="flex flex-row gap-x-4">
            <div class="items-center mb-0">
                
                <div class="relative w-48 lg:w-64 xl:w-96 flex justify-end items-center">
                    <input type="text" onkeyup="dataSearch()" id="product-search" class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 p-2.5" placeholder="Group Search">
                    
                    <svg class="h-8 w-8 absolute right-2 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                    
                </div>
                
                
            </div>
            
        </div>
    </div>
</div>

<table id="product-table" class="min-w-full border-2 border-gray-100">
    <thead class="bg-gray-100 sticky top-0">
        <tr>
            <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase">
                Group
            </th>
            <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase">
                Minimum cost (฿)
            </th>
            <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase">
                Maximum cost (฿)
            </th>
            <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase">
                Average cost (฿)
            </th>
            <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase">
                Actions
            </th>
        </tr>
    </thead>
    <tbody id="product-table-body" class="bg-white divide-y divide-gray-200">
        <?php $__currentLoopData = $costEstimateDocument; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr class="hover:bg-gray-100 ">

            <?php if(isset($data['GROUP']) && $data['GROUP'] !== ''): ?>
            <td class="p-4 text-sm font-medium text-gray-900 whitespace-nowrap"><?php echo e($data['GROUP']); ?>

            </td>
            <?php else: ?>
            <td class="p-4 text-xs font-normal text-red-600 whitespace-nowrap">Data Not Found</td>
            <?php endif; ?>

            <?php if(isset($data['MIN_COST']) && $data['MIN_COST'] !== ''): ?>
            <td class="p-4 text-sm font-medium text-gray-900 whitespace-nowrap"><?php echo e($data['MIN_COST']); ?>

            </td>
            <?php else: ?>
            <td class="p-4 text-xs font-normal text-red-600 whitespace-nowrap">Data Not Found</td>
            <?php endif; ?>

            <?php if(isset($data['MAX_COST']) && $data['MAX_COST'] !== ''): ?>
            <td class="p-4 text-sm font-medium text-gray-900 whitespace-nowrap">
                <?php echo e(number_format($data['MAX_COST'])); ?></td>
            <?php else: ?>
            <td class="p-4 text-xs font-normal text-red-600 whitespace-nowrap">Data Not Found</td>
            <?php endif; ?>

            <?php if(isset($data['MAX_COST']) && $data['MAX_COST'] !== '' && isset($data['MAX_COST']) && $data['MAX_COST'] !== ''): ?>
            <td class="p-4 text-sm font-medium text-gray-900 whitespace-nowrap">
                <?php echo e(number_format(($data['MIN_COST']+$data['MAX_COST'])/2)); ?></td>
            <?php else: ?>
            <td class="p-4 text-xs font-normal text-red-600 whitespace-nowrap">Data Not Found</td>
            <?php endif; ?>

            <td class="p-4 flex space-x-2">
                <div class="w-24">
                    <?php echo $__env->make('CONTENT_MANAGEMENT_SYSTEM/component/costUpdateModal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
                <div class="w-24">
                    
                </div>
            </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>

<div class="sm:flex-1 sm:flex xs:items-center sm:justify-between p-4 space-y-2">
</div>
<script>
    function dataSearch() {
        // Declare variables
        var input, filter, tbody, tr, td, i, txtValue
        input = document.getElementById('product-search')
        filter = input.value.toUpperCase()
        tbody = document.getElementById("product-table-body")
        tr = tbody.getElementsByTagName('tr')

        // Loop through all list items, and hide those who don't match the search query
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[0]
            txtValue = td.textContent || td.innerText
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = ""
            } else {
                tr[i].style.display = "none"
            }
        }
    }

</script>
<script>
    function countAndDisplayVisibleRows() {
        var trElements = document.querySelectorAll("#product-table tbody tr");
        var visibleRowCount = 0;

        trElements.forEach(tr => {
            if (window.getComputedStyle(tr).display !== "none") {
                visibleRowCount++;
            }
        });

        var countData = document.getElementById("count-data");
        countdata.innerText = "showing of " + visibleRowCount + " data";
    }

    // Set up the keyup event listener on the input field
    document.getElementById('product-search').addEventListener('keyup', countAndDisplayVisibleRows);

    // Also call the function on page load to initialize the count
    document.addEventListener('DOMContentLoaded', countAndDisplayVisibleRows);

</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('CONTENT_MANAGEMENT_SYSTEM/layout/defaultLayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\my-project\miscibles-platform-development\src\resources\views/CONTENT_MANAGEMENT_SYSTEM/page/cost_estimation.blade.php ENDPATH**/ ?>