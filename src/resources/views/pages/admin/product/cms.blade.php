@extends('layouts/admin', ['title' => 'Product CMS'])

@section('content')
    <div class="p-2">
        <div class="block justify-between sm:flex">
            <div class="mb-3 lg:mb-0">
                <h1 class="text-xl font-semibold text-black sm:text-2xl uppercase">PRODUCT </h1>
                <p id="count-products" class="md:ml-0 text-sm font-normal text-gray-500"></p>
            </div>
            <div class="flex flex-row">
                <div class="items-center mb-0 mr-4">
                    <div class="relative w-48 lg:w-64 xl:w-96 flex justify-end items-center">
                        <input type="text" onkeyup="productSearch()" id="product-search"
                            class="w-full bg-gray-50 border border-gray-300 text-black text-sm rounded-lg focus:ring-primary focus:border-primary p-2.5"
                            placeholder="Model Search">
                        <svg class="h-8 w-8 absolute right-2 text-tertiary" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </div>
                </div>
                @include('pages/admin/product/modal-add')
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
        <tbody id="product-table-body" class="bg-white divide-y divide-gray-200">
            @if (isset($productData))
                @foreach ($productData as $key => $product)
                    <tr class="hover:bg-gray-100 ">

                        @if (isset($product['product_name']) &&
                                $product['product_name'] !== '' &&
                                isset($product['product_model']) &&
                                $product['product_model'] !== '')
                            <td class="p-4 text-sm font-medium text-black whitespace-nowrap">
                                {{ $product['product_name'] }}
                                <p class="text-xxs font-normal">{{ $product['product_model'] }}</p>
                            </td>
                        @else
                            <td class="p-4 text-xs font-normal whitespace-nowrap">Data Not Found</td>
                        @endif

                        @if (isset($product['image_url']) && !empty($product['image_url']))
                            <td
                                class="w-24 mr-3 text-sm font-medium text-black whitespace-nowrap flex flex-col items-center justify-center lg:grid lg:grid-rows-2 lg:grid-cols-2 lg:gap-0">
                                @foreach ($product['image_url'] as $url)
                                    <img class="object-contain w-10 h-12" src="{{ $url }}" alt="" onerror="this.onerror=null; this.src='{{ asset('images/no-image.png') }}';">
                                @endforeach
                            </td>
                        @else
                            <td class="p-4 text-xs font-normal whitespace-nowrap">Data Not Found</td>
                        @endif

                        @if (isset($product['created_by']) &&
                                $product['created_by'] !== '' &&
                                isset($product['created_at']) &&
                                $product['created_at'] !== '')
                            <td class="p-4 text-sm font-medium text-black whitespace-nowrap">
                                {{ $product['created_by'] }} <br>
                                <p class="text-xxs font-normal">{{ $product['created_at'] }}</p>
                            </td>
                        @else
                            <td class="p-4 text-xs font-normal whitespace-nowrap">Data Not Found</td>
                        @endif

                        @if (isset($product['edited_by']) &&
                                $product['edited_by'] !== '' &&
                                isset($product['edited_at']) &&
                                $product['edited_at'] !== '')
                            <td class="p-4 text-sm font-medium text-black whitespace-nowrap">
                                {{ $product['edited_by'] }} <br>
                                <p class="text-xxs font-normal">{{ $product['edited_at'] }}</p>
                            </td>
                        @else
                            <td class="p-4 text-xs font-normal whitespace-nowrap">Data Not Found</td>
                        @endif

                        <td class="p-4 flex flex-col xl:flex-row space-y-2 xl:space-y-0 xl:space-x-2">
                            <div class="w-36 xl:w-32">
                                @include('pages/admin/product/spec/modal-view')
                            </div>
                            <div class="w-36">
                                @include('pages/admin/product/modal-update')
                            </div>
                            <div class="w-36 xl:w-24">
                                @include('pages/admin/product/modal-delete')
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

@endsection
