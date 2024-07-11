<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps([
'quotationId',
'header1',
'header2',
'header3',
'header4',
'header5',
'header6',
'header7',
'content1',
'content2',
'content3',
'content4',
'content5',
'content6',
'content7',
'content8',
'content9',
'content10',
'content11',
'content12',
'content13',
'content14',
'content15',
'content16',
'content17',
'content18',
'content19',
'content20',
'content21',
'content22',
'content23',
'content24',
'content25',
'content26',
'content27',
'content28',
'content29',
'footer1',
'footer2',
'footer3',
'footer4',
'footer5',
'footer6',
]) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps([
'quotationId',
'header1',
'header2',
'header3',
'header4',
'header5',
'header6',
'header7',
'content1',
'content2',
'content3',
'content4',
'content5',
'content6',
'content7',
'content8',
'content9',
'content10',
'content11',
'content12',
'content13',
'content14',
'content15',
'content16',
'content17',
'content18',
'content19',
'content20',
'content21',
'content22',
'content23',
'content24',
'content25',
'content26',
'content27',
'content28',
'content29',
'footer1',
'footer2',
'footer3',
'footer4',
'footer5',
'footer6',
]); ?>
<?php foreach (array_filter(([
'quotationId',
'header1',
'header2',
'header3',
'header4',
'header5',
'header6',
'header7',
'content1',
'content2',
'content3',
'content4',
'content5',
'content6',
'content7',
'content8',
'content9',
'content10',
'content11',
'content12',
'content13',
'content14',
'content15',
'content16',
'content17',
'content18',
'content19',
'content20',
'content21',
'content22',
'content23',
'content24',
'content25',
'content26',
'content27',
'content28',
'content29',
'footer1',
'footer2',
'footer3',
'footer4',
'footer5',
'footer6',
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>

<link rel="stylesheet" href="<?php echo e(asset('css/quotation.css')); ?>">
<style>
    @font-face {
        font-family: "THSarabunNew";
        font-style: normal;
        font-weight: normal;
        src: url("<?php echo e(asset('fonts/THSarabunNew.ttf')); ?>") format("truetype");
    }

    @font-face {
        font-family: "THSarabunNew";
        font-style: normal;
        font-weight: bold;
        src: url("<?php echo e(asset('fonts/THSarabunNew Bold.ttf')); ?>") format("truetype");
    }

    @font-face {
        font-family: "THSarabunNew";
        font-style: italic;
        font-weight: normal;
        src: url("<?php echo e(asset('fonts/THSarabunNew Italic.ttf')); ?>") format("truetype");
    }

    @font-face {
        font-family: "THSarabunNew";
        font-style: italic;
        font-weight: bold;
        src: url("<?php echo e(asset('fonts/THSarabunNew BoldItalic.ttf')); ?>") format("truetype");
    }

</style>

<table >
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
                <img class="LOGO" src="<?php echo e(asset('images/image001.png')); ?>" alt="MISCIBLEs logo">
                <img class="ISO" src="<?php echo e(asset('images/image002.png')); ?>">
            </th>
            <th class="bg-grey" colspan="7" style="font-size: 18px; font-weight: bold;">
                <input id="header1" type="text">
            </th>
        </tr>

        <tr class="bg-grey">
            <th colspan="4"><input id="header2" type="text"></th>
            <th colspan="3"><input id="header3" type="text"></th>
        </tr>
        <tr class="bg-grey">
            <th colspan="1"><input id="header4" type="text"></th>
            <th colspan="3"></th>
            <th colspan="1"><input id="header5" type="text"></th>
            <th colspan="2"></th>
        </tr>
        <tr>
            <th colspan="7" class="bg-grey bold">Miscible Technology Co.,Ltd.</th>
        </tr>
        <tr>
            <th colspan="12" class="bg-grey">
                <textarea placeholder="<?php echo e($header6); ?>" name="header5"><?php echo e($header6); ?></textarea>
                <p></p>
            </th>
        </tr>
        <tr>
            <th colspan="2" class="bg-grey">ATTN :</th>
            <th colspan="4"></th>
            <th colspan="2" class="bg-grey">TEL :</th>
            <th colspan="4"></th>
        </tr>
        <tr>
            <th colspan="2" class="bg-grey">CUSTOMER :</th>
            <th colspan="4"></th>
            <th colspan="2" class="bg-grey">EMAIL :</th>
            <th colspan="4"></th>
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
        <tr>
            <td colspan="1" class="dashed-right">1</td>
            <td colspan="6" class="dashed-right left"></td>
            <td colspan="1" class="dashed-right">1.0</td>
            <td colspan="2" class="dashed-right"></td>
            <td colspan="2" class="dashed-right"></td>
        </tr>


        <?php for($i=0;$i<=10;$i++): ?> <tr>
            <td colspan="1" class="dashed-right"></td>
            <td colspan="6" class="dashed-right"></td>
            <td colspan="1" class="dashed-right"></td>
            <td colspan="2" class="dashed-right"></td>
            <td colspan="2" class="dashed-right"></td>
            </tr>
            <?php endfor; ?>


            <tr class="dashed">
                <td colspan="1" class="dashed-right"></td>
                <td colspan="9" class="dashed-right"> **หมายเหตุ** (บริษัท มิสซิเบิล เทคโนโลยี จำกัด มีระยะเวลารับประกันสินค้า 1 ปี )</td>
                <td colspan="2" class="dashed-right"></td>
            </tr>
    </tbody>
    <tfoot>
        <tr>
            <th colspan="8" rowspan="2" class="non-border-bottom bg-grey left">
                <span style="text-decoration: underline; font-weight: bold;">ORDER CONFIRMATION</span><br>
                Confirm to purchase all quoted items (Accepted By : ..........................................................................................)
            </th>
            <th colspan="2" class="dashed-right"></th>
            <th colspan="2" class="dashed-left"></th>
        </tr>
        <tr>
            <th colspan="2" class="dashed-right"></th>
            <th colspan="2" class="dashed-left"></th>
        </tr>
        <tr>
            <th colspan="4" class="bg-grey">Price Validity: 2 Days</th>
            <th colspan="4" class="bg-grey">Delivery Term : 2 Days</th>
            <th colspan="2" class="bg-grey">DISCOUNT</th>
            <th colspan="2"> %</th>
        </tr>
        <tr>
            <th colspan="2" class="bg-grey">Down Payment</th>
            <th colspan="2" class="bg-grey">Final Check</th>
            <th colspan="2" class="bg-grey">After Install</th>
            <th colspan="2" class="bg-grey" rowspan="3">Credit Days</th>
            <th colspan="2" class="bg-grey">TOTAL</th>
            <th colspan="2" class="bg-dark-grey"></th>
        </tr>
        <tr>
            <th colspan="2" class="bg-grey">%</th>
            <th colspan="2" class="bg-grey">%</th>
            <th colspan="2" class="bg-grey">%</th>
            <th colspan="2" class="bg-grey">VAT 7.0%</th>
            <th colspan="2" class="bg-dark-grey"></th>
        </tr>
        <tr>
            <th colspan="2" class="bg-dark-grey"></th>
            <th colspan="2" class="bg-dark-grey"></th>
            <th colspan="2" class="bg-dark-grey"></th>
            <th colspan="2" class="bg-grey">TOTAL PRICE</th>
            <th colspan="2" class="bg-dark-grey"></th>
        </tr>
        <tr>
            <th colspan="4" rowspan="4">
                <img src="<?php echo e(asset('images/image003.png')); ?>" width="45" height="30" style="margin: 7px;">
                <img src="<?php echo e(asset('images/image004.png')); ?>" width="45" height="30" style="margin: 7px;">
                <img src="<?php echo e(asset('images/image005.png')); ?>" width="45" height="30" style="margin: 7px;">
                <img src="<?php echo e(asset('images/image006.png')); ?>" width="45" height="25" style="margin: 7px;">
                <img src="<?php echo e(asset('images/image007.png')); ?>" width="45" height="30" style="margin: 7px;">
                <img src="<?php echo e(asset('images/image008.png')); ?>" width="45" height="25" style="margin: 7px;">
            </th>
            <th colspan="4" rowspan="1" height="40"></th>
            <th colspan="4" rowspan="1" height="40"></th>
        </tr>
        <tr>
            <th colspan="4" class="bg-grey">(Sataporn Liengsirikul)</th>
            <th colspan="4" class="bg-grey">(Sataporn Liengsirikul)</th>
        </tr>
        <tr>
            <th colspan="4" class="bg-grey">Tel / Line : 091-7400-555</th>
            <th colspan="4" class="bg-grey">Tel / Line : 091-7400-555</th>
        </tr>
        <tr>
            <th colspan="4" class="bg-grey">Technical Sales</th>
            <th colspan="4" class="bg-grey">Authorized Signature</th>
        </tr>
    </tfoot>
</table>
<?php /**PATH C:\my-project\miscibles-platform\src\resources\views/components/quotation.blade.php ENDPATH**/ ?>