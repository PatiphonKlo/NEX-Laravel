

<?php $__env->startSection('content'); ?>
<div class="p-2">
    <div class="block justify-between sm:flex">
        <div class="mb-3 lg:mb-0">
            <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl uppercase">quotation</h1>
            <p id="count-quotations" class="md:ml-0 text-sm font-normal text-gray-500"></p>
        </div>
        <div class="flex flex-row gap-x-4">
            <div class="items-center mb-0">
                <div class="relative w-48 lg:w-64 xl:w-96 flex justify-end items-center">
                    <input type="text" onkeyup="modelSearch()" id="model-search" class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-600 focus:border-green-600 p-2.5" placeholder="Model search">
                    <input type="text" onkeyup="clientSearch()" id="client-search" class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-600 focus:border-green-600 p-2.5" placeholder="Client search">
                    <select id="search-options" onchange="searchChange()" class="absolute border-gray-300 text-gray-900 text-sm rounded-r-lg focus:ring-green-600 focus:border-green-600 h-full">
                        <option value="model-search" selected>Model</option>
                        <option value="client-search">Client</option>
                    </select>
                    <svg class="h-8 w-8 absolute right-24 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </div>
            </div>
            <a href="<?php echo e(url('/standard_products')); ?>">
                <button type="button" id="add-quotation-button" class="text-white bg-green-600 hover:bg-green-900 focus:ring-2 focus:ring-gray-200 font-medium rounded-md text-sm px-4 py-2.5 max-h-11 focus:outline-none">
                    NEW QUOTATION
                </button>
            </a>
        </div>
    </div>
</div>

<table id="quotation-table" class="min-w-full shadow-md">
    <thead class="bg-gray-100 sticky top-0">
        <tr>
            <th scope="col" class="p-4 text-xs font-medium text-left text-black uppercase">
                Product
                <p class="text-xxs font-normal">Quotation CODE</p>
            </th>
            <th scope="col" class="p-4 text-xs font-medium text-left text-black uppercase">
                CLIENT <br>
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
    <tbody id="quotation-table-body" class="bg-white divide-y divide-gray-200">
        <?php if(isset($quotationData)): ?>
        <?php $__currentLoopData = $quotationData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $quotation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr class="hover:bg-gray-100 ">

            <?php if(isset($quotation['CODE']) && $quotation['CODE'] !== '' && isset($quotation['MODEL']) && $quotation['MODEL'] !== ''): ?>
            <td class="p-4 text-sm font-medium text-gray-900 whitespace-nowrap">
                <?php echo e($quotation['MODEL']); ?> <br>
                <p class="text-xxs font-normal"><?php echo e($quotation['CODE']); ?></p>
            </td>
            <?php else: ?>
            <td class="p-4 text-xs font-normal whitespace-nowrap">Data Not Found</td>
            <?php endif; ?>

            <?php if(isset($quotation['CONTACT_NAME']) && $quotation['CONTACT_NAME'] !== '' && isset($quotation['CREATED_AT']) && $quotation['CREATED_AT'] !== ''): ?>
            <td class="p-4 text-sm font-medium text-gray-900 whitespace-nowrap">
                <?php echo e($quotation['CONTACT_NAME']); ?> <br>
                <p class="text-xxs font-normal"><?php echo e($quotation['CREATED_AT']); ?></p>
            </td>
            <?php else: ?>
            <td class="p-4 text-xs font-normal whitespace-nowrap">Data Not Found</td>
            <?php endif; ?>

            <?php if(isset($quotation['EDITED_BY']) && $quotation['EDITED_BY'] !== '' && isset($quotation['EDITED_AT']) && $quotation['EDITED_AT'] !== ''): ?>
            <td class="p-4 text-sm font-medium text-gray-900 whitespace-nowrap">
                <?php echo e($quotation['EDITED_BY']); ?> <br>
                <p class="text-xxs font-normal"><?php echo e($quotation['EDITED_AT']); ?></p>
            </td>
            <?php else: ?>
            <td class="p-4 text-xs font-normal whitespace-nowrap">Data Not Found</td>
            <?php endif; ?>

            <td class="p-4 flex space-x-2">
                <a href="<?php echo e(url('admin/quotation/'.$quotation['KEY'])); ?>" class="w-36">
                    <button type="button" id="update-quotation-button-<?php echo e($key); ?>" onclick="updateQuotationButton<?php echo e($key); ?>()" class="w-full inline-flex items-center px-3 py-2 text-xs font-medium text-center text-white bg-yellow-500 rounded-md hover:bg-yellow-900">
                        <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 22" xmlns="http://www.w3.org/2000/svg">
                            <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z"></path>
                            <path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd"></path>
                        </svg>
                        VIEW & UPDATE
                    </button>
                </a>
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
    function searchChange() {
        let selectorValue = document.getElementById('search-options').value;
        let modelSearch = document.getElementById('model-search');
        let clientSearch = document.getElementById('client-search');

        if (selectorValue == 'model-search') {
            modelSearch.style.display = 'block';
            clientSearch.style.display = 'none';
            anotherOptionSearch.style.display = 'none';
        } else if (selectorValue == 'client-search') {
            modelSearch.style.display = 'none';
            clientSearch.style.display = 'block';
            anotherOptionSearch.style.display = 'none';
        }
    }
    window.onload = function() {
        searchChange();
    };


    function modelSearch() {
        // Declare variables
        var input, filter, tbody, tr, td, i, txtValue
        input = document.getElementById('model-search')
        filter = input.value.toUpperCase()
        tbody = document.getElementById("quotation-table-body")
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

    function clientSearch() {
        // Declare variables
        var input, filter, tbody, tr, td, i, txtValue
        input = document.getElementById('client-search')
        filter = input.value.toUpperCase()
        tbody = document.getElementById("quotation-table-body")
        tr = tbody.getElementsByTagName('tr')

        // Loop through all list items, and hide those who don't match the search query
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[1]
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
        var trElements = document.querySelectorAll("#quotation-table tbody tr");
        var visibleRowCount = 0;

        trElements.forEach(tr => {
            if (window.getComputedStyle(tr).display !== "none") {
                visibleRowCount++;
            }
        });

        var countquotations = document.getElementById("count-quotations");
        countquotations.innerText = "showing of " + visibleRowCount + " quotation data";
    }

    // Set up the keyup event listener on the input field
    document.getElementById('model-search').addEventListener('keyup', countAndDisplayVisibleRows);

    // Also call the function on page load to initialize the count
    document.addEventListener('DOMContentLoaded', countAndDisplayVisibleRows);

</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('CONTENT_MANAGEMENT_SYSTEM/layout/defaultLayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\my-project\miscibles-platform\src\resources\views/CONTENT_MANAGEMENT_SYSTEM/page/quotations.blade.php ENDPATH**/ ?>