

<?php $__env->startSection('content'); ?>
<div class="p-2">
    <div class="block justify-between sm:flex">
        <div class="mb-3 lg:mb-0">
            <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl uppercase">technical</h1>
            <p id="count-technicals" class="md:ml-0 text-sm font-normal text-gray-500"></p>
        </div>
        <div class="flex flex-row gap-x-4">
            <div class="items-center mb-0">
                <div class="relative w-48 lg:w-64 xl:w-96 flex justify-end items-center">
                    <input type="text" onkeyup="technicalSearch()" id="technical-search"
                        class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-600 focus:border-green-600 p-2.5"
                        placeholder="Technical Data Search">
                    <svg class="h-8 w-8 absolute right-2 text-gray-600" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </div>
            </div>
            <?php echo $__env->make('CONTENT_MANAGEMENT_SYSTEM/component/technicalDataAddModal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    </div>
</div>

<table id="technical-table" class="min-w-full shadow-md">
    <thead class="bg-gray-100 sticky top-0">
        <tr>
            <th scope="col" class="p-4 text-xs font-medium text-left text-black uppercase">
                Technical Data Name <br>
                <p class="text-xxs font-normal">Technical Data ID</p>
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
    <tbody id="technical-table-body" class="bg-white divide-y divide-gray-200">
        <?php if(isset($technicalData)): ?>
        <?php $__currentLoopData = $technicalData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $technical): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr class="hover:bg-gray-100 ">

            <?php if(isset($technical['TECHNICAL_COMPONENT']) && $technical['TECHNICAL_COMPONENT'] !== '' &&
            $technical['KEY'] !== ''): ?>
            <td class="p-4 text-sm font-medium text-gray-900 whitespace-nowrap">
                <?php echo e($technical['TECHNICAL_COMPONENT']); ?> <br>
                <p class="text-xxs font-normal"><?php echo e($technical['KEY']); ?></p>
            </td>
            <?php else: ?>
            <td class="p-4 text-xs font-normal text-red-600 whitespace-nowrap">Data Not Found</td>
            <?php endif; ?>

            <?php if(isset($technical['CREATED_BY']) && $technical['CREATED_BY'] !== '' && isset($technical['CREATED_AT']) &&
            $technical['CREATED_AT'] !== ''): ?>
            <td class="p-4 text-sm font-medium text-gray-900 whitespace-nowrap">
                <?php echo e($technical['CREATED_BY']); ?> <br>
                <p class="text-xxs font-normal"><?php echo e($technical['CREATED_AT']); ?></p>
            </td>
            <?php else: ?>
            <td class="p-4 text-xs font-normal text-red-600 whitespace-nowrap">Data Not Found</td>
            <?php endif; ?>

            <?php if(isset($technical['EDITED_BY']) && $technical['EDITED_BY'] !== '' && isset($technical['EDITED_AT']) &&
            $technical['EDITED_AT'] !== ''): ?>
            <td class="p-4 text-sm font-medium text-gray-900 whitespace-nowrap">
                <?php echo e($technical['EDITED_BY']); ?> <br>
                <p class="text-xxs font-normal"><?php echo e($technical['EDITED_AT']); ?></p>
            </td>
            <?php else: ?>
            <td class="p-4 text-xs font-normal text-red-600 whitespace-nowrap">Data Not Found</td>
            <?php endif; ?>

            <td class="p-4 flex space-x-2">
                <div class="w-36">
                    <?php echo $__env->make('CONTENT_MANAGEMENT_SYSTEM/component/technicalUpdateModal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
                <div class="w-24">
                    <?php echo $__env->make('CONTENT_MANAGEMENT_SYSTEM/component/technicalDeleteModal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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
    function technicalSearch() {
        // Declare variables
        var input, filter, tbody, tr, td, i, txtValue
        input = document.getElementById('technical-search')
        filter = input.value.toUpperCase()
        tbody = document.getElementById("technical-table-body")
        tr = tbody.getElementsByTagName('tr')

        // Loop through all list items, and hide those who don't match the search query
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[0]
            // p = td.getElementsByTagName('p');
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
        var trElements = document.querySelectorAll("#technical-table tbody tr");
        var visibleRowCount = 0;

        trElements.forEach(tr => {
            if (window.getComputedStyle(tr).display !== "none") {
                visibleRowCount++;
            }
        });

        var counttechnicals = document.getElementById("count-technicals");
        counttechnicals.innerText = "showing of " + visibleRowCount + " technical data";
    }

    // Set up the keyup event listener on the input field
    document.getElementById('technical-search').addEventListener('keyup', countAndDisplayVisibleRows);

    // Also call the function on page load to initialize the count
    document.addEventListener('DOMContentLoaded', countAndDisplayVisibleRows);

</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('CONTENT_MANAGEMENT_SYSTEM/layout/defaultLayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\my-project\miscibles-platform-development\src\resources\views/CONTENT_MANAGEMENT_SYSTEM/page/technical_data.blade.php ENDPATH**/ ?>