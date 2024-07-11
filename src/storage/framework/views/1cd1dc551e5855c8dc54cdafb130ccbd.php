

<?php $__env->startSection('content'); ?>
    <div class="p-2">
        <div class="block justify-between sm:flex">
            <div class="mb-3 lg:mb-0">
                <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl uppercase">quotation</h1>
                <p id="count-quotations" class="md:ml-0 text-sm font-normal text-gray-500"></p>
            </div>
            <div class="flex">
                <div class="mb-0 mr-4">
                    <div class="relative w-64 xl:w-96 flex justify-end">
                        <input type="text" onkeyup="modelSearch()" id="model-search"
                            class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary py-2.5 max-h-11"
                            placeholder="Product model search">
                        <input type="text" onkeyup="clientSearch()" id="client-search"
                            class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary py-2.5 max-h-11"
                            placeholder="Client search">
                        <select id="search-options" onchange="searchChange()"
                            class="absolute border-gray-300 text-gray-900 text-sm rounded-r-lg focus:ring-primary focus:border-primary h-full">
                            <option value="model-search" selected>Model</option>
                            <option value="client-search">Client</option>
                        </select>
                        <svg class="h-8 w-8 absolute top-1 right-24 text-gray-600" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </div>
                </div>
                <?php echo $__env->make('pages/admin/quotation/modal-add', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
        </div>
    </div>

    <table id="quotation-table" class="min-w-full shadow-md">
        <thead class="bg-gray-100 sticky top-0">
            <tr>
                <th scope="col" class="p-4 text-xs font-medium text-left text-black uppercase">
                    Product Model
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
                    <tr class="count hover:bg-gray-100 ">

                        <?php if(
                            (isset($quotation['quotation_code']) && $quotation['quotation_code'] !== '') ||
                                (isset($quotation['product_data']['product_name']) && $quotation['product_data']['product_name'] !== '')): ?>
                            <td class="p-4 text-sm font-medium text-gray-900 whitespace-nowrap">
                                <?php if(isset($quotation['product_data']['product_name']) && $quotation['product_data']['product_name'] !== ''): ?>
                                    <?php echo e($quotation['product_data']['product_model']); ?> <br>
                                <?php else: ?>
                                    <p class="text-xs font-normal whitespace-nowrap">product not found</p>
                                <?php endif; ?>
                                <p class="text-xxs font-normal"><?php echo e($quotation['quotation_code']); ?></p>
                            </td>
                        <?php else: ?>
                            <td class="p-4 text-xs font-normal whitespace-nowrap">Data Not Found</td>
                        <?php endif; ?>

                        <?php if(isset($quotation['client_data']['client_contact_name']) &&
                                $quotation['client_data']['client_contact_name'] !== '' &&
                                isset($quotation['created_at']) &&
                                $quotation['created_at'] !== ''): ?>
                            <td class="p-4 text-sm font-medium text-gray-900 whitespace-nowrap">
                                <?php echo e($quotation['client_data']['client_contact_name']); ?> <br>
                                <p class="text-xxs font-normal"><?php echo e($quotation['created_at']); ?></p>
                            </td>
                        <?php else: ?>
                            <td class="p-4 text-xs font-normal whitespace-nowrap">Data Not Found</td>
                        <?php endif; ?>

                        <?php if(isset($quotation['edited_by']) &&
                                $quotation['edited_by'] !== '' &&
                                isset($quotation['edited_at']) &&
                                $quotation['edited_at'] !== ''): ?>
                            <td class="p-4 text-sm font-medium text-gray-900 whitespace-nowrap">
                                <?php echo e($quotation['edited_by']); ?> <br>
                                <p class="text-xxs font-normal"><?php echo e($quotation['edited_at']); ?></p>
                            </td>
                        <?php else: ?>
                            <td class="p-4 text-xs font-normal whitespace-nowrap">Data Not Found</td>
                        <?php endif; ?>

                        <td class="p-4 flex space-x-2">
                            <div class="w-24">
                                <a href="<?php echo e(url('admin/quotation-pdf/' . $quotation['quotation_id'])); ?>" target="_blank"
                                    class="uppercase w-full inline-flex items-center px-3 py-2 text-xs font-medium text-center text-white bg-primary rounded-md hover:bg-green-900">
                                    <img src="/svg/pdf.svg" alt="NA" class="w-4 h-4 mr-2">
                                    PDF
                                </a>
                            </div>
                            <div class="w-24">
                                <?php echo $__env->make('pages/admin/quotation/modal-send', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            </div>
                            <div class="w-24">
                                <?php echo $__env->make('pages/admin/quotation/modal-share', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            </div>
                            <div class="w-24">
                                <?php echo $__env->make('pages/admin/quotation/modal-update', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            </div>
                            <div class="w-24">
                                <?php echo $__env->make('pages/admin/quotation/modal-delete', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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
        function searchChange() {
            let selectorValue = document.getElementById('search-options').value;
            let modelSearch = document.getElementById('model-search');
            let clientSearch = document.getElementById('client-search');

            if (selectorValue == 'model-search') {
                modelSearch.style.display = 'block';
                clientSearch.style.display = 'none';
            } else if (selectorValue == 'client-search') {
                modelSearch.style.display = 'none';
                clientSearch.style.display = 'block';
            }
        }
        window.onload = function() {
            searchChange();
        };


        function modelSearch() {
            var input, filter, tbody, tr, td, i, txtValue
            input = document.getElementById('model-search')
            filter = input.value.toUpperCase()
            tbody = document.getElementById("quotation-table-body")
            tr = tbody.querySelectorAll("tr.count")

            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[0]
                console.log(td)
                txtValue = td.textContent || td.innerText
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = ""
                } else {
                    tr[i].style.display = "none"
                }
            }
        }

        function clientSearch() {
            var input, filter, tbody, tr, td, i, txtValue
            input = document.getElementById('client-search')
            filter = input.value.toUpperCase()
            tbody = document.getElementById("quotation-table-body")
            tr = tbody.querySelectorAll("tr.count")

            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[1]
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
            var trElements = document.querySelectorAll("table#quotation-table tbody tr.count");
            var visibleRowCount = 0;

            trElements.forEach(tr => {
                if (window.getComputedStyle(tr).display !== "none") {
                    visibleRowCount++;
                }
            });

            var countquotations = document.getElementById("count-quotations");
            countquotations.innerText = "showing of " + visibleRowCount + " quotation";
        }

        document.getElementById('model-search').addEventListener('keyup', countAndDisplayVisibleRows);

        document.addEventListener('DOMContentLoaded', countAndDisplayVisibleRows);
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/admin', ['title' => 'Quotation CMS'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\patip\NEX\miscibles-platform\src\resources\views/pages/admin/quotation/cms.blade.php ENDPATH**/ ?>