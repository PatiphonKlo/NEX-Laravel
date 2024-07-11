@extends('layouts/admin', ['title' => 'Enquiry Form CMS'])

@section('content')
    <div class="p-2">
        <div class="block justify-between sm:flex">
            <div class="mb-3 lg:mb-0">
                <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl uppercase">All enquiry</h1>
                <p id="count-enquirys" class="md:ml-0 text-sm font-normsal text-gray-500"></p>
            </div>
            <div class="flex flex-row">
                <div class="items-center mb-0 mr-4">
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
                <a href="{{ url('admin/made-to-order') }}">
                    <button
                        class="uppercase text-white bg-primary hover:bg-green-900 font-medium rounded-md text-sm px-4 py-2.5 max-h-11 focus:outline-none">
                        New Enquiry Form
                    </button>
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
            @if (isset($enquiryData))
                @foreach ($enquiryData as $key => $enquiry)
                    <tr class="hover:bg-gray-100 ">

                        @if (isset($enquiry['client_data']['client_contact_name']) &&
                                $enquiry['client_data']['client_contact_name'] !== '' &&
                                $enquiry['enquiry_id'] !== '')
                            <td class="p-4 text-sm font-medium text-gray-900 whitespace-nowrap">
                                {{ $enquiry['client_data']['client_contact_name'] }} <br>
                                <p class="text-xxs font-normal">{{ $enquiry['enquiry_id'] }}</p>
                            </td>
                        @else
                            <td class="p-4 text-xs font-normal whitespace-nowrap">Data Not Found</td>
                        @endif

                        @if (isset($enquiry['created_by']) &&
                                $enquiry['created_by'] !== '' &&
                                isset($enquiry['created_at']) &&
                                $enquiry['created_at'] !== '')
                            <td class="p-4 text-sm font-medium text-gray-900 whitespace-nowrap">
                                {{ $enquiry['created_by'] }} <br>
                                <p class="text-xxs font-normal">{{ $enquiry['created_at'] }}</p>
                            </td>
                        @else
                            <td class="p-4 text-xs font-normal whitespace-nowrap">Data Not Found</td>
                        @endif

                        @if (isset($enquiry['edited_by']) &&
                                $enquiry['edited_by'] !== '' &&
                                isset($enquiry['edited_at']) &&
                                $enquiry['edited_at'] !== '')
                            <td class="p-4 text-sm font-medium text-gray-900 whitespace-nowrap">
                                {{ $enquiry['edited_by'] }} <br>
                                <p class="text-xxs font-normal">{{ $enquiry['edited_at'] }}</p>
                            </td>
                        @else
                            <td class="p-4 text-xs font-normal whitespace-nowrap">Data Not Found</td>
                        @endif

                        <td class="p-4 flex space-x-2">
                            <div class="w-24">
                                @include('pages/admin/enquiry/modal-send')
                            </div>
                            <div class="w-24">
                                @include('pages/admin/enquiry/modal-share')
                            </div>
                            <div class="w-30">
                                <a href="{{ url('admin/enquiry-edit/' . $enquiry['enquiry_id']) }}"
                                    class="uppercase w-full inline-flex items-center px-3 py-2 text-xs font-medium text-center text-white bg-yellow-500 rounded-lg hover:bg-yellow-500">
                                    <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 22"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z">
                                        </path>
                                        <path fill-rule="evenodd"
                                            d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                    VIEW & UPDATE
                                </a>
                            </div>
                            @include('pages/admin/enquiry/view-drawing')
                            <div class="w-24">
                                @include('pages/admin/enquiry/modal-delete')
                            </div>
                        </td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
    @if (isset($message))
        <div class="w-full text-center p-4">
            {{ $message }}
        </div>
    @endif

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
@endsection
