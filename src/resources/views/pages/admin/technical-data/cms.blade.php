@extends('layouts/admin',['title' => 'Technical Data CMS'])

@section('content')
<div class="p-2">
    <div class="block justify-between sm:flex">
        <div class="mb-3 lg:mb-0">
            <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl uppercase">technical</h1>
            <p id="count-technicals" class="md:ml-0 text-sm font-normal text-gray-500"></p>
        </div>
        <div class="flex flex-row">
            <div class="items-center mb-0 mr-4">
                <div class="relative w-48 lg:w-64 xl:w-96 flex justify-end items-center">
                    <input type="text" onkeyup="technicalSearch()" id="technical-search"
                        class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary p-2.5"
                        placeholder="Technical Data Search">
                    <svg class="h-8 w-8 absolute right-2 text-gray-600" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </div>
            </div>
            @include('pages/admin/technical-data/modal-add')
        </div>
    </div>
</div>

<table id="technical-table" class="min-w-full shadow-md">
    <thead class="bg-gray-100 sticky top-0">
        <tr>
            <th scope="col" class="p-4 text-xs font-medium text-left text-black uppercase">
                Technical Data Name <br>
                <p class="text-xxs font-normal">Specification</p>
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
        @if(isset($technicalData))
        @foreach ($technicalData as $key => $technical)
        <tr class="hover:bg-gray-100 ">

            @if (isset($technical['technical_component']) && $technical['technical_component'] !== '' &&
            $technical['technical_data_id'] !== '')
            <td class="p-4 text-sm font-medium text-gray-900 whitespace-nowrap">
                {{ $technical['technical_component'] }} <br>
                <p class="text-xxs font-normal">{{$technical['specification']}}</p>
            </td>
            @else
            <td class="p-4 text-xs font-normal whitespace-nowrap">Data Not Found</td>
            @endif

            @if (isset($technical['created_by']) && $technical['created_by'] !== '' && isset($technical['created_at']) &&
            $technical['created_at'] !== '')
            <td class="p-4 text-sm font-medium text-gray-900 whitespace-nowrap">
                {{ $technical['created_by'] }} <br>
                <p class="text-xxs font-normal">{{ $technical['created_at'] }}</p>
            </td>
            @else
            <td class="p-4 text-xs font-normal whitespace-nowrap">Data Not Found</td>
            @endif

            @if (isset($technical['edited_by']) && $technical['edited_by'] !== '' && isset($technical['edited_at']) &&
            $technical['edited_at'] !== '')
            <td class="p-4 text-sm font-medium text-gray-900 whitespace-nowrap">
                {{ $technical['edited_by'] }} <br>
                <p class="text-xxs font-normal">{{ $technical['edited_at'] }}</p>
            </td>
            @else
            <td class="p-4 text-xs font-normal whitespace-nowrap">Data Not Found</td>
            @endif

            <td class="p-4 flex space-x-2">
                <div class="w-36">
                    @include('pages/admin/technical-data/modal-update')
                </div>
                <div class="w-24">
                    @include('pages/admin/technical-data/modal-delete')
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
@endsection