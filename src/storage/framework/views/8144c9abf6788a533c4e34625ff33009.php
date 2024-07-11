

<?php $__env->startSection('content'); ?>
    <div class="p-2">
        <div class="block justify-between sm:flex">
            <div class="mb-3 lg:mb-0">
                <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl uppercase">client data </h1>
                <p id="count-clients" class="md:ml-0 text-sm font-normsal text-gray-500"></p>
            </div>
            <div class="flex flex-row">
                <div class="items-center mb-0 mr-4">
                    <div class="relative w-48 lg:w-64 xl:w-96 flex justify-end items-center">
                        <input type="text" onkeyup="ClientSearch()" id="client-search"
                            class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary p-2.5"
                            placeholder="Client Data Name Search">
                        <svg class="h-8 w-8 absolute right-2 text-gray-600" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </div>
                </div>
                <?php echo $__env->make('pages/admin/client/modal-add', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
        </div>
    </div>

    <table id="client-table" class="min-w-full shadow-md">
        <thead class="bg-gray-100 sticky top-0">
            <tr>
                <th scope="col" class="p-4 text-xs font-medium text-left text-black uppercase">
                    client Data Name <br>
                    <p class="text-xxs font-normal">client Data ID</p>
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
        <tbody id="client-table-body" class="bg-white divide-y divide-gray-200">
            <?php if(isset($clientData)): ?>
                <?php $__currentLoopData = $clientData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $client): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr class="hover:bg-gray-100 ">

                        <?php if(isset($client['client_contact_name']) && $client['client_contact_name'] !== '' && $client['client_id'] !== ''): ?>
                            <td class="p-4 text-sm font-medium text-gray-900 whitespace-nowrap">
                                <?php echo e($client['client_contact_name']); ?> <br>
                                <p class="text-xxs font-normal"><?php echo e($client['client_id']); ?></p>
                            </td>
                        <?php else: ?>
                            <td class="p-4 text-xs font-normal whitespace-nowrap">Data Not Found</td>
                        <?php endif; ?>


                        <?php if((isset($client['created_by']) && $client['created_by'] !== '') || (isset($client['created_at']) && $client['created_at'] !== '')): ?>
                            <td class="p-4 text-sm font-medium text-gray-900 whitespace-nowrap">
                                <?php if(isset($client['created_by']) && $client['created_by'] !== ''): ?>
                                    <?php echo e($client['created_by']); ?> <br>
                                <?php else: ?>
                                    <p class="text-xs font-normal whitespace-nowrap">creator not found</p>
                                <?php endif; ?>
                                <p class="text-xxs font-normal"><?php echo e($client['created_at']); ?></p>
                            </td>
                        <?php else: ?>
                            <td class="p-4 text-xs font-normal whitespace-nowrap">Data Not Found</td>
                        <?php endif; ?>

                        <?php if((isset($client['edited_by']) && $client['edited_by'] !== '') || (isset($client['edited_at']) && $client['edited_at'] !== '')): ?>
                            <td class="p-4 text-sm font-medium text-gray-900 whitespace-nowrap">
                                <?php if(isset($client['edited_by']) && $client['edited_by'] !== ''): ?>
                                    <?php echo e($client['edited_by']); ?> <br>
                                <?php else: ?>
                                    <p class="text-xs font-normal whitespace-nowrap">editor not found</p>
                                <?php endif; ?>
                                <p class="text-xxs font-normal"><?php echo e($client['edited_at']); ?></p>
                            </td>
                        <?php else: ?>
                            <td class="p-4 text-xs font-normal whitespace-nowrap">Data Not Found</td>
                        <?php endif; ?>

                        <td class="p-4 flex space-x-2">
                            <div class="w-36">
                                <?php echo $__env->make('pages/admin/client/modal-update', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            </div>
                            <div class="w-24">
                                <?php echo $__env->make('pages/admin/client/modal-delete', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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
        function ClientSearch() {
            // Declare variables
            var input, filter, tbody, tr, td, i, txtValue
            input = document.getElementById('client-search')
            filter = input.value.toUpperCase()
            tbody = document.getElementById("client-table-body")
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
            var trElements = document.querySelectorAll("#client-table tbody tr");
            var visibleRowCount = 0;

            trElements.forEach(tr => {
                if (window.getComputedStyle(tr).display !== "none") {
                    visibleRowCount++;
                }
            });

            var countclients = document.getElementById("count-clients");
            countclients.innerText = "showing of " + visibleRowCount + " client data";
        }

        // Set up the keyup event listener on the input field
        document.getElementById('client-search').addEventListener('keyup', countAndDisplayVisibleRows);

        // Also call the function on page load to initialize the count
        document.addEventListener('DOMContentLoaded', countAndDisplayVisibleRows);
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/admin', ['title' => 'Client Data CMS'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\patip\NEX\miscibles-platform\src\resources\views/pages/admin/client/cms.blade.php ENDPATH**/ ?>