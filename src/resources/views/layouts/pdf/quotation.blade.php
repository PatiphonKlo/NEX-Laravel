<!DOCTYPE html>
<html lang="en">

<head>
    <title>NEX | Miscible Quotation PDF</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/quotation-pdf.css">
</head>

<style>
    @font-face {
        font-family: "THSarabunNew";
        font-style: normal;
        font-weight: normal;
        src: url("{{ public_path('fonts/THSarabunNew.ttf') }}") format("truetype");
    }

    @font-face {
        font-family: "THSarabunNew";
        font-style: normal;
        font-weight: bold;
        src: url("{{ public_path('fonts/THSarabunNew Bold.ttf') }}") format("truetype");
    }

    @font-face {
        font-family: "THSarabunNew";
        font-style: italic;
        font-weight: normal;
        src: url("{{ public_path('fonts/THSarabunNew Italic.ttf') }}") format("truetype");
    }

    @font-face {
        font-family: "THSarabunNew";
        font-style: italic;
        font-weight: bold;
        src: url("{{ public_path('fonts/THSarabunNew BoldItalic.ttf') }}") format("truetype");
    }
</style>

<body>

    @php
        $chunks = chunkTechnicalData($quotation['product_data']['technical_data'], 12);
    @endphp

    @foreach ($chunks as $chunk)
        @if (!$loop->first)
            <div class="page_break"></div>
        @endif

        <table id="quotaionTable">
            <thead>
                <tr class="non-border">
                    <th class="non-border" width="8.33%"></th>
                    <th class="non-border" width="8.33%"></th>
                    <th class="non-border" width="8.33%"></th>
                    <th class="non-border" width="8.33%"></th>
                    <th class="non-border" width="8.33%"></th>
                    <th class="non-border" width="8.33%"></th>
                    <th class="non-border" width="8.33%"></th>
                    <th class="non-border" width="8.33%"></th>
                    <th class="non-border" width="8.33%"></th>
                    <th class="non-border" width="8.33%"></th>
                    <th class="non-border" width="8.33%"></th>
                    <th class="non-border" width="8.33%"></th>
                </tr>
                <tr>
                    <th rowspan="4" colspan="5">
                        <div class="flex-row items-center justify-center pt-5">
                            <img class="LOGO" src="{{ public_path('images/image001.png') }}" alt="Logo">
                        </div>
                    </th>
                    <th class="bg-grey" colspan="7" style="font-size: 18px; font-weight: bold;">
                        QUOTATION
                    </th>
                </tr>

                <tr class="bg-grey">
                    <th colspan="4">เอกสารใบเสนอราคา ประจำปี 2023</th>
                    <th colspan="3">ISO 9001 : 2015</th>
                </tr>
                <tr class="bg-grey">
                    <th colspan="1">Date:</th>
                    <th colspan="3">{{ $quotation['created_at'] }}</th>
                    <th colspan="1">Code:</th>
                    <th colspan="2">{{ $quotation['quotation_code'] }}</th>
                </tr>
                <tr>
                    <th colspan="7" class="bg-grey bold">Miscible Technology Co.,Ltd.</th>
                </tr>
                <tr>
                    <th colspan="12" class="bg-grey">221/24 Panyaintra Bangchan Klongsamwa Bangkok 10510 / Tel:
                        02-548-0414-5 / Fax : 02-548-0413 <br>
                        Email : miscible@miscible.co.th / miscibleagitator@gmail.com / www.miscible.co.th</th>
                </tr>
                <tr>
                    <th colspan="2" class="bg-grey">ATTN :</th>
                    <th colspan="4">{{ $quotation['client_data']['client_contact_name'] }}</th>
                    <th colspan="2" class="bg-grey">TEL :</th>
                    <th colspan="4">{{ $quotation['client_data']['client_phone_number'] }}</th>
                </tr>
                <tr>
                    <th colspan="2" class="bg-grey">CUSTOMER :</th>
                    <th colspan="4">{{ $quotation['client_data']['client_company'] }}</th>
                    <th colspan="2" class="bg-grey">EMAIL :</th>
                    <th colspan="4">{{ $quotation['client_data']['client_email'] }}</th>
                </tr>
                <tr class="bg-grey">
                    <th colspan="1">ITEM</th>
                    <th colspan="6">DESCRIPTION</th>
                    <th colspan="1">UNIT</th>
                    <th colspan="2">PRICE/UNIT</th>
                    <th colspan="2">AMOUNT</th>
                </tr>
            </thead>
            <tbody>
                @if ($loop->first)
                    <tr>
                        <td colspan="1" class="dashed-right"></td>
                        <td colspan="6" class="dashed-right left">{{ $quotation['group_name'] ?? '' }}</td>
                        <td colspan="1" class="dashed-right"></td>
                        <td colspan="2" class="dashed-right"></td>
                        <td colspan="2" class="dashed-right"></td>
                    </tr>
                    <tr>
                        <td colspan="1" class="dashed-right">1</td>
                        <td colspan="6" class="dashed-right left">
                            {{ $quotation['product_data']['product_name'] ?? '' }}
                        </td>
                        <td colspan="1" class="dashed-right">1.0</td>
                        <td colspan="2" class="dashed-right">
                            {{ number_format($quotation['product_price'] ?? 0) }}</td>
                        <td colspan="2" class="dashed-right">
                            {{ number_format($quotation['product_price'] ?? 0) }}</td>
                    </tr>
                @endif

                @foreach ($chunk as $index => $technical_data)
                    <tr class="dashed">
                        <td colspan="1" class="dashed-right"></td>
                        <td colspan="6" class="dashed-right left">
                            {{ $technical_data['technical_component'] }} :
                            {{ $technical_data['specification'] }}
                        </td>
                        <td colspan="1" class="dashed-right"></td>
                        <td colspan="2" class="dashed-right"></td>
                        <td colspan="2" class="dashed-right"></td>
                    </tr>
                @endforeach

                @if ($loop->first)
                    <tr>
                        <td colspan="1" class="dashed-right">2</td>
                        <td colspan="6" class="dashed-right left">
                            Logistic and Basic Training
                        </td>
                        <td colspan="1" class="dashed-right">1.0</td>
                        <td colspan="2" class="dashed-right">
                            {{ number_format($quotation['product_data']['product_logistic_cost'] ?? 0) }}
                        </td>
                        <td colspan="2" class="dashed-right">
                            {{ number_format($quotation['product_data']['product_logistic_cost'] ?? 0) }}
                        </td>
                    </tr>
                @endif

                @for ($i = count($chunk); $i < 12; $i++)
                    <tr>
                        <td colspan="1" class="dashed-right"></td>
                        <td colspan="6" class="dashed-right"></td>
                        <td colspan="1" class="dashed-right"></td>
                        <td colspan="2" class="dashed-right"></td>
                        <td colspan="2" class="dashed-right"></td>
                    </tr>
                @endfor

                @if (!$loop->last)
                    <tr>
                        <td colspan="12" class="dashed-right" style="text-align: center;">
                            ใบเสนอราคามีหน้าถัดไป กรุณาแนบด้วยกัน
                        </td>
                    </tr>
                @endif


                <tr class="dashed">
                    <td colspan="12" class="dashed-right"> **หมายเหตุ** (บริษัท มิสซิเบิล เทคโนโลยี จำกัด
                        มีระยะเวลารับประกันสินค้า {{ $quotation['product_assurance'] ?? '' }} ปี )</td>
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="8" rowspan="2" class="non-border-bottom bg-grey left">
                        <span style="text-decoration: underline; font-weight: bold;">ORDER CONFIRMATION</span><br>
                        Confirm to purchase all quoted items (Accepted By :
                        ..........................................................................................)
                    </th>
                    <th colspan="2" class="dashed-right"></th>
                    <th colspan="2" class="dashed-left"></th>
                </tr>
                <tr>
                    <th colspan="2" class="dashed-right"></th>
                    <th colspan="2" class="dashed-left"></th>
                </tr>
                <tr>
                    <th colspan="4" class="bg-grey">Price Validity:
                        ({{ $quotation['product_price_validity'] ?? '' }} Days)</th>
                    <th colspan="4" class="bg-grey">Delivery Term :
                        ({{ $quotation['product_delivery_term'] ?? '' }} Days)</th>
                    <th colspan="2" class="bg-grey">DISCOUNT</th>
                    <th colspan="2">
                        {{ number_format($quotation['product_discount'] ?? 0, 1, '.', '') }} %</th>
                </tr>
                <tr>
                    <th colspan="2" class="bg-grey">Down Payment</th>
                    <th colspan="2" class="bg-grey">Final Check</th>
                    <th colspan="2" class="bg-grey">After Install</th>
                    <th colspan="2" class="bg-grey" rowspan="3">PDC.
                        {{ $quotation['product_credit_day'] ?? '' }} Days</th>
                    <th colspan="2" class="bg-grey">TOTAL</th>
                    <th colspan="2" class="bg-dark-grey">
                        {{ number_format(($quotation['product_price'] ?? 0) + ($quotation['product_data']['product_logistic_cost'] ?? 0)) }}
                    </th>
                </tr>
                <tr>
                    <th colspan="2" class="bg-grey">
                        {{ number_format($quotation['product_down_payment'] ?? 0, 1, '.', '') }}%</th>
                    <th colspan="2" class="bg-grey">
                        {{ number_format($quotation['product_final_check'] ?? 0, 1, '.', '') }}%</th>
                    <th colspan="2" class="bg-grey">
                        {{ number_format($quotation['product_after_install'] ?? 0, 1, '.', '') }}%</th>
                    <th colspan="2" class="bg-grey">VAT 7.0%</th>
                    <th colspan="2" class="bg-dark-grey">
                        {{ number_format((($quotation['product_price'] ?? 0) + ($quotation['product_data']['product_logistic_cost'] ?? 0)) * 0.07) }}
                    </th>
                </tr>
                <tr>
                    @php
                        $totalPrice =
                            ($quotation['product_price'] ?? 0) +
                            ($quotation['product_data']['product_logistic_cost'] ?? 0) +
                            (($quotation['product_price'] ?? 0) +
                                ($quotation['product_data']['product_logistic_cost'] ?? 0)) *
                                0.07 -
                            ((($quotation['product_price'] ?? 0) +
                                ($quotation['product_data']['product_logistic_cost'] ?? 0)) *
                                ($quotation['product_discount'] ?? 0)) /
                                100;
                    @endphp

                    <th colspan="2" class="bg-dark-grey">
                        {{ number_format($totalPrice * (($quotation['product_down_payment'] ?? 0) / 100)) }}
                    </th>
                    <th colspan="2" class="bg-dark-grey">
                        {{ number_format($totalPrice * (($quotation['product_final_check'] ?? 0) / 100)) }}
                    </th>
                    <th colspan="2" class="bg-dark-grey">
                        {{ number_format($totalPrice * (($quotation['product_after_install'] ?? 0) / 100)) }}
                    </th>
                    <th colspan="2" class="bg-grey">TOTAL PRICE</th>
                    <th colspan="2" class="bg-dark-grey">
                        {{ number_format($totalPrice) }}
                    </th>
                </tr>
                <tr>
                    <th colspan="4" rowspan="4">
                        <img src="{{ public_path('images/image003.png') }}" width="45" height="30"
                            style="margin: 7px;">
                        <img src="{{ public_path('images/image004.png') }}" width="45" height="30"
                            style="margin: 7px;">
                        <img src="{{ public_path('images/image005.png') }}" width="45" height="30"
                            style="margin: 7px;">
                        <img src="{{ public_path('images/image006.png') }}" width="45" height="25"
                            style="margin: 7px;">
                        <img src="{{ public_path('images/image007.png') }}" width="45" height="30"
                            style="margin: 7px;">
                        <img src="{{ public_path('images/image008.png') }}" width="45" height="25"
                            style="margin: 7px;">
                    </th>
                    <th colspan="4" rowspan="4" class="signature">
                        <div class="flex-container">
                            <img class="ISO" src="{{ public_path('images/image002.png') }}">
                        </div>
                    </th>
                    <th colspan="4" height="80">
                        <div class="flex-container">
                            <img src="{{ $quotation['signature'] }}" alt="">
                        </div>
                    </th>
                </tr>
                <tr>
                    <th colspan="4" class="bg-grey">(Sataporn Liengsirikul)</th>
                </tr>
                <tr>
                    <th colspan="4" class="bg-grey">Tel / Line : 091-7400-555</th>
                </tr>
                <tr>
                    <th colspan="4" class="bg-grey">Authorized Signature</th>
                </tr>
            </tfoot>
        </table>
    @endforeach
</body>
</html>
