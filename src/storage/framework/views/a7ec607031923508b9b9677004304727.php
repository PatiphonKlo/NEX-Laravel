

<?php $__env->startSection('content'); ?>
    <div class="p-2">
        <div class="block justify-between sm:flex">
            <div class="mb-3 lg:mb-0">
                <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl uppercase">All enquiry</h1>
                <p id="count-enquirys" class="md:ml-0 text-sm font-normsal text-gray-500"></p>
            </div>
            <div class="flex flex-row gap-x-4">
                <div class="items-center mb-0">
                    <div class="relative w-48 lg:w-64 xl:w-96 flex justify-end items-center">
                        <input type="text" onkeyup="EnquirySearch()" id="enquiry-search"
                            class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary p-2.5"
                            placeholder="Enquiry Search">
                        <svg class="h-8 w-8 absolute right-2 text-gray-600" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </div>
                </div>
                <a href="<?php echo e(url('admin/made-to-order')); ?>"
                    class="uppercase text-white bg-primary hover:bg-green-900 focus:ring-2 focus:ring-gray-200 font-medium rounded-md text-sm px-4 py-2.5 max-h-11 focus:outline-none">
                    New Enquiry Form
                </a>
            </div>
        </div>
    </div>

    <table id="enquiry-table" class="min-w-full shadow-md">
        <thead class="bg-gray-100 sticky top-0">
            <tr>
                <th scope="col" class="p-4 text-xs font-medium text-left text-black uppercase">
                    Client Name <br>
                    <p class="text-xxs font-normal">enquiry ID</p>
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
        <tbody id="enquiry-table-body" class="bg-white divide-y divide-gray-200">
            <?php if(isset($enquiryData)): ?>
                <?php $__currentLoopData = $enquiryData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $enquiry): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr class="hover:bg-gray-100 ">

                        <?php if(isset($enquiry['client_data']['client_contact_name']) &&
                                $enquiry['client_data']['client_contact_name'] !== '' &&
                                $enquiry['enquiry_id'] !== ''): ?>
                            <td class="p-4 text-sm font-medium text-gray-900 whitespace-nowrap">
                                <?php echo e($enquiry['client_data']['client_contact_name']); ?> <br>
                                <p class="text-xxs font-normal"><?php echo e($enquiry['enquiry_id']); ?></p>
                            </td>
                        <?php else: ?>
                            <td class="p-4 text-xs font-normal whitespace-nowrap">Data Not Found</td>
                        <?php endif; ?>

                        <?php if(isset($enquiry['created_by']) &&
                                $enquiry['created_by'] !== '' &&
                                isset($enquiry['created_at']) &&
                                $enquiry['created_at'] !== ''): ?>
                            <td class="p-4 text-sm font-medium text-gray-900 whitespace-nowrap">
                                <?php echo e($enquiry['created_by']); ?> <br>
                                <p class="text-xxs font-normal"><?php echo e($enquiry['created_at']); ?></p>
                            </td>
                        <?php else: ?>
                            <td class="p-4 text-xs font-normal whitespace-nowrap">Data Not Found</td>
                        <?php endif; ?>

                        <?php if(isset($enquiry['edited_by']) &&
                                $enquiry['edited_by'] !== '' &&
                                isset($enquiry['edited_at']) &&
                                $enquiry['edited_at'] !== ''): ?>
                            <td class="p-4 text-sm font-medium text-gray-900 whitespace-nowrap">
                                <?php echo e($enquiry['edited_by']); ?> <br>
                                <p class="text-xxs font-normal"><?php echo e($enquiry['edited_at']); ?></p>
                            </td>
                        <?php else: ?>
                            <td class="p-4 text-xs font-normal whitespace-nowrap">Data Not Found</td>
                        <?php endif; ?>

                        <td class="p-4 flex space-x-2">
                            <div class="w-24">
                                <?php echo $__env->make('pages/admin/enquiry/modal-send', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            </div>
                            <div class="w-24">
                                <?php if(isset($enquiry['enquiry_id']) && isset($enquiry['client_data'])): ?>
                                <a href="<?php echo e(url('admin/enquiry-pdf/'.$enquiry['enquiry_id'])); ?>"
                                    class="uppercase w-full inline-flex items-center px-3 py-2 text-xs font-medium text-center text-white bg-green-600 rounded-lg hover:bg-green-900 focus:ring-2 focus:ring-green-300">
                                    <svg class="w-5 h-4 mr-2 text-white" xmlns="http://www.w3.org/2000/svg"
                                        xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="256"
                                        height="256" viewBox="0 0 256 256" xml:space="preserve">
                                        <defs>
                                        </defs>
                                        <g style="stroke: none; stroke-width: 0; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: none; fill-rule: nonzero; opacity: 1;"
                                            transform="translate(1.4065934065934016 1.4065934065934016) scale(2.81 2.81)">
                                            <path
                                                d="M 11.58 54.882 v 31.965 c 0 1.741 1.412 3.153 3.153 3.153 h 60.534 c 1.741 0 3.153 -1.412 3.153 -3.153 V 54.882 C 56.073 47.881 33.792 47.838 11.58 54.882 z"
                                                style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(184,53,53); fill-rule: nonzero; opacity: 1;"
                                                transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                                            <path
                                                d="M 78.42 54.882 V 18.345 C 69.386 13.658 63.133 7.61 60.075 0 H 14.733 c -1.741 0 -3.153 1.412 -3.153 3.153 v 51.729 H 78.42 z"
                                                style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(233,233,224); fill-rule: nonzero; opacity: 1;"
                                                transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                                            <path
                                                d="M 78.42 18.345 H 62.948 c -1.587 0 -2.873 -1.286 -2.873 -2.873 V 0 L 78.42 18.345 z"
                                                style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(217,215,202); fill-rule: nonzero; opacity: 1;"
                                                transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                                            <path
                                                d="M 32.116 62.679 h -5.944 c -0.829 0 -1.5 0.672 -1.5 1.5 v 9.854 v 6.748 c 0 0.828 0.671 1.5 1.5 1.5 s 1.5 -0.672 1.5 -1.5 v -5.248 h 4.444 c 2.392 0 4.338 -1.946 4.338 -4.338 v -4.177 C 36.454 64.625 34.508 62.679 32.116 62.679 z M 33.454 71.194 c 0 0.737 -0.6 1.338 -1.338 1.338 h -4.444 v -6.854 h 4.444 c 0.738 0 1.338 0.601 1.338 1.339 V 71.194 z"
                                                style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(249,249,249); fill-rule: nonzero; opacity: 1;"
                                                transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                                            <path
                                                d="M 46.109 82.28 h -5.652 c -0.829 0 -1.5 -0.672 -1.5 -1.5 V 64.179 c 0 -0.828 0.671 -1.5 1.5 -1.5 h 5.652 c 2.553 0 4.63 2.077 4.63 4.63 V 77.65 C 50.739 80.203 48.662 82.28 46.109 82.28 z M 41.957 79.28 h 4.152 c 0.898 0 1.63 -0.731 1.63 -1.63 V 67.309 c 0 -0.898 -0.731 -1.63 -1.63 -1.63 h -4.152 V 79.28 z"
                                                style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(249,249,249); fill-rule: nonzero; opacity: 1;"
                                                transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                                            <path
                                                d="M 63.828 62.679 h -8.782 c -0.828 0 -1.5 0.672 -1.5 1.5 V 80.78 c 0 0.828 0.672 1.5 1.5 1.5 s 1.5 -0.672 1.5 -1.5 v -6.801 h 4.251 c 0.828 0 1.5 -0.672 1.5 -1.5 s -0.672 -1.5 -1.5 -1.5 h -4.251 v -5.301 h 7.282 c 0.828 0 1.5 -0.672 1.5 -1.5 S 64.656 62.679 63.828 62.679 z"
                                                style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(249,249,249); fill-rule: nonzero; opacity: 1;"
                                                transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                                        </g>
                                    </svg>
                                    PDF
                                </a>
                                <?php else: ?>
                                <button type="button" id="enquiry" disabled class="uppercase w-full inline-flex items-center px-3 py-2 text-xs font-medium text-center text-white bg-green-200 rounded-lg cursor-not-allowed">
                                    <svg class="w-5 h-4 mr-2 text-white" xmlns="http://www.w3.org/2000/svg"
                                        xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="256"
                                        height="256" viewBox="0 0 256 256" xml:space="preserve">
                                        <defs>
                                        </defs>
                                        <g style="stroke: none; stroke-width: 0; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: none; fill-rule: nonzero; opacity: 1;"
                                            transform="translate(1.4065934065934016 1.4065934065934016) scale(2.81 2.81)">
                                            <path
                                                d="M 11.58 54.882 v 31.965 c 0 1.741 1.412 3.153 3.153 3.153 h 60.534 c 1.741 0 3.153 -1.412 3.153 -3.153 V 54.882 C 56.073 47.881 33.792 47.838 11.58 54.882 z"
                                                style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(184,53,53); fill-rule: nonzero; opacity: 1;"
                                                transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                                            <path
                                                d="M 78.42 54.882 V 18.345 C 69.386 13.658 63.133 7.61 60.075 0 H 14.733 c -1.741 0 -3.153 1.412 -3.153 3.153 v 51.729 H 78.42 z"
                                                style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(233,233,224); fill-rule: nonzero; opacity: 1;"
                                                transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                                            <path
                                                d="M 78.42 18.345 H 62.948 c -1.587 0 -2.873 -1.286 -2.873 -2.873 V 0 L 78.42 18.345 z"
                                                style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(217,215,202); fill-rule: nonzero; opacity: 1;"
                                                transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                                            <path
                                                d="M 32.116 62.679 h -5.944 c -0.829 0 -1.5 0.672 -1.5 1.5 v 9.854 v 6.748 c 0 0.828 0.671 1.5 1.5 1.5 s 1.5 -0.672 1.5 -1.5 v -5.248 h 4.444 c 2.392 0 4.338 -1.946 4.338 -4.338 v -4.177 C 36.454 64.625 34.508 62.679 32.116 62.679 z M 33.454 71.194 c 0 0.737 -0.6 1.338 -1.338 1.338 h -4.444 v -6.854 h 4.444 c 0.738 0 1.338 0.601 1.338 1.339 V 71.194 z"
                                                style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(249,249,249); fill-rule: nonzero; opacity: 1;"
                                                transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                                            <path
                                                d="M 46.109 82.28 h -5.652 c -0.829 0 -1.5 -0.672 -1.5 -1.5 V 64.179 c 0 -0.828 0.671 -1.5 1.5 -1.5 h 5.652 c 2.553 0 4.63 2.077 4.63 4.63 V 77.65 C 50.739 80.203 48.662 82.28 46.109 82.28 z M 41.957 79.28 h 4.152 c 0.898 0 1.63 -0.731 1.63 -1.63 V 67.309 c 0 -0.898 -0.731 -1.63 -1.63 -1.63 h -4.152 V 79.28 z"
                                                style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(249,249,249); fill-rule: nonzero; opacity: 1;"
                                                transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                                            <path
                                                d="M 63.828 62.679 h -8.782 c -0.828 0 -1.5 0.672 -1.5 1.5 V 80.78 c 0 0.828 0.672 1.5 1.5 1.5 s 1.5 -0.672 1.5 -1.5 v -6.801 h 4.251 c 0.828 0 1.5 -0.672 1.5 -1.5 s -0.672 -1.5 -1.5 -1.5 h -4.251 v -5.301 h 7.282 c 0.828 0 1.5 -0.672 1.5 -1.5 S 64.656 62.679 63.828 62.679 z"
                                                style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(249,249,249); fill-rule: nonzero; opacity: 1;"
                                                transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                                        </g>
                                    </svg>
                                    PDF
                                </button>
                                <?php endif; ?>
                            </div>
                            <div class="w-24">
                                <a href="<?php echo e(url('admin/enquiry-edit/'.$enquiry['enquiry_id'])); ?>"
                                    class="uppercase w-full inline-flex items-center px-3 py-2 text-xs font-medium text-center text-white bg-yellow-500 rounded-lg hover:bg-yellow-500">
                                    <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 22" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z"></path>
                                        <path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd"></path>
                                    </svg>
                                    Edit
                                </a>
                            </div>
                            <div class="w-24">
                                <?php echo $__env->make('pages/admin/enquiry/modal-delete', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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
        function EnquirySearch() {
            // Declare variables
            var input, filter, tbody, tr, td, i, txtValue
            input = document.getElementById('enquiry-search')
            filter = input.value.toUpperCase()
            tbody = document.getElementById("enquiry-table-body")
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
            var trElements = document.querySelectorAll("#enquiry-table tbody tr");
            var visibleRowCount = 0;

            trElements.forEach(tr => {
                if (window.getComputedStyle(tr).display !== "none") {
                    visibleRowCount++;
                }
            });

            var countenquirys = document.getElementById("count-enquirys");
            countenquirys.innerText = "showing of " + visibleRowCount + " enquiry data";
        }

        // Set up the keyup event listener on the input field
        document.getElementById('enquiry-search').addEventListener('keyup', countAndDisplayVisibleRows);

        // Also call the function on page load to initialize the count
        document.addEventListener('DOMContentLoaded', countAndDisplayVisibleRows);
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/admin', ['title' => 'Enquiry Form CMS'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\miscibles-platform\src\resources\views/pages/admin/enquiry/cms.blade.php ENDPATH**/ ?>