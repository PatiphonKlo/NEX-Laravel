@extends('layouts/admin', ['title' => 'Assembly Part CMS'])

@section('content')
<div class="p-2">
    <div class="block justify-between sm:flex">
        <div class="mb-3 lg:mb-0">
            <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl uppercase">PART </h1>
            <p id="count-parts" class="md:ml-0 text-sm font-normal text-gray-500"></p>
        </div>
        <div class="flex flex-row">
            <div class="items-center mb-0 mr-4">
                <div class="relative w-48 lg:w-64 xl:w-96 flex justify-end items-center">
                    <input type="text" onkeyup="partSearch()" id="part-search" class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary p-2.5" placeholder="Part Search">
                    <svg class="h-8 w-8 absolute right-2 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </div>
            </div>
            <x-link href="https://www.appsheet.com/start/aef75d1b-a90a-4961-81fb-ba43f29d27b2?platform=desktop#viewStack[0][identifier][Type]=Control&viewStack[0][identifier][Name]=Inventory&appName=StockStoreV1-11909385">
                <button class="uppercase text-white bg-primary hover:bg-green-900 font-medium rounded-md text-sm px-4 py-2.5 h-11">
                    New Part
                </button>
            </x-link>
        </div>
    </div>
</div>

<table id="part-table" class="min-w-full shadow-md">
    <thead class="bg-gray-100 sticky top-0">
        <tr>
            <th scope="col" class="p-4 text-xs font-medium text-left text-black uppercase">
                Part Name
                <p class="text-xxs font-normal">Part ID</p>
            </th>
            <th scope="col" class="p-4 text-xs font-medium text-left text-black uppercase">
                Edited by
                <p class="text-xxs font-normal">Edited time</p>
            </th>
            <th scope="col" class="p-4 text-xs font-medium text-left text-black uppercase">
                Spare part
                <p class="text-xxs font-normal">Spare part</p>
            </th>
            <th scope="col" class="p-4 text-xs font-medium text-left text-black uppercase">
                Action
            </th>
        </tr>
    </thead>
    <tbody id="part-table-body" class="bg-white divide-y divide-gray-200">
        @if (isset($partData))
        @foreach ($partData as $key => $part)
        <tr class="hover:bg-gray-100 ">

            @if (isset($part['part_name']) && $part['part_name'] !== '')
            <td class="p-4 text-sm font-medium text-gray-900 whitespace-nowrap">
                {{ $part['part_name'] }} <br>
                <p class="text-xxs font-normal">{{ $part['part_id'] }}</p>
            </td>
            @else
            <td class="p-4 text-xs font-normal whitespace-nowrap">Data Not Found</td>
            @endif

            @if (isset($part['edited_by']) && $part['edited_by'] !== '' && isset($part['edited_at']) && $part['edited_at'] !== '')
            <td class="p-4 text-sm font-medium text-gray-900 whitespace-nowrap">
                {{ $part['edited_by'] }} <br>
                <p class="text-xxs font-normal">{{ $part['edited_at'] }}</p>
            </td>
            @else
            <td class="p-4 text-xs font-normal whitespace-nowrap">Data Not Found</td>
            @endif

            @if (isset($part['spare_part']) && $part['spare_part'] !== '' )
            <td class="p-4 text-sm font-medium text-gray-900 whitespace-nowrap">
                {{ $part['spare_part'] }}
            </td>
            @else
            <td class="p-4 text-xs font-normal whitespace-nowrap">Data Not Found</td>
            @endif

            <td class="p-4 flex space-x-2">
                <div class="w-36">
                    @include('pages/admin/assembly-part/modal-update')
                </div>
                {{-- <div class="w-24">
                    @include('CONTENT_MANAGEMENT_SYSTEM/component/partDeleteModal')
                </div> --}}
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
    function partSearch() {
        // Declare variables
        var input, filter, tbody, tr, td, i, txtValue
        input = document.getElementById('part-search')
        filter = input.value.toUpperCase()
        tbody = document.getElementById("part-table-body")
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
        var trElements = document.querySelectorAll("#part-table tbody tr");
        var visibleRowCount = 0;

        trElements.forEach(tr => {
            if (window.getComputedStyle(tr).display !== "none") {
                visibleRowCount++;
            }
        });

        var countParts = document.getElementById("count-parts");
        countParts.innerText = "showing of " + visibleRowCount + " parts";
    }

    // Set up the keyup event listener on the input field
    document.getElementById('part-search').addEventListener('keyup', countAndDisplayVisibleRows);

    // Also call the function on page load to initialize the count
    document.addEventListener('DOMContentLoaded', countAndDisplayVisibleRows);

</script>
@endsection
