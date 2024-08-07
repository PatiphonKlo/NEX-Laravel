<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="<?php echo e(asset('css/quotation-preview.css')); ?>">
</head>

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
<body>
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
                <th rowspan="4" colspan="5" height="150">
                    <div class="flex-row">
                        <img class="LOGO" src="<?php echo e(asset('images/image001.png')); ?>" alt="Logo">
                        <img class="ISO" src="<?php echo e(asset('images/image002.png')); ?>">
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
                <th colspan="3"><?php echo e($quotation['created_at']); ?></th>
                <th colspan="1">Code:</th>
                <th colspan="2"><?php echo e($quotation['quotation_code']); ?></th>
            </tr>
            <tr>
                <th colspan="7" class="bg-grey bold">Miscible Technology Co.,Ltd.</th>
            </tr>
            <tr>
                <th colspan="12" class="bg-grey">221/24 Panyaintra Bangchan Klongsamwa Bangkok 10510 / Tel: 02-548-0414-5 / Fax : 02-548-0413 <br>
                    Email : miscible@miscible.co.th / miscibleagitator@gmail.com / www.miscible.co.th</th>
            </tr>
            <tr>
                <th colspan="2" class="bg-grey">ATTN :</th>
                <th colspan="4"><?php echo e($quotation['client_data']['client_contact_name'] ?? ''); ?></th>
                <th colspan="2" class="bg-grey">TEL :</th>
                <th colspan="4"><?php echo e($quotation['client_data']['client_phone_number'] ?? ''); ?></th>
            </tr>
            <tr>
                <th colspan="2" class="bg-grey">CUSTOMER :</th>
                <th colspan="4"><?php echo e($quotation['client_data']['client_company'] ?? ''); ?></th>
                <th colspan="2" class="bg-grey">EMAIL :</th>
                <th colspan="4"><?php echo e($quotation['client_data']['client_email'] ?? ''); ?></th>
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
                <td colspan="6" class="dashed-right left"><?php echo e($quotation['product_data']['product_name'] ?? ''); ?></td>
                <td colspan="1" class="dashed-right">1.0</td>
                <td colspan="2" class="dashed-right"><?php echo e(number_format($quotation['product_data']['product_price'] ?? 0)); ?></td>
                <td colspan="2" class="dashed-right"><?php echo e(number_format($quotation['product_data']['product_price'] ?? 0)); ?></td>
            </tr>

            <?php if(isset($quotation['product_data']['technical_data'])): ?>
            <?php $__currentLoopData = $quotation['product_data']['technical_data']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr class="dashed">
                <td colspan="1" class="dashed-right"></td>
                <td colspan="6" class="dashed-right left"><?php echo e($item['technical_component']); ?> : <?php echo e($item['specification']); ?></td>
                <td colspan="1" class="dashed-right"></td>
                <td colspan="2" class="dashed-right"></td>
                <td colspan="2" class="dashed-right"></td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            
            <?php for($i=0;$i<(10-count($quotation['product_data']['technical_data']));$i++): ?> 
            <tr>
                <td colspan="1" class="dashed-right"></td>
                <td colspan="6" class="dashed-right"></td>
                <td colspan="1" class="dashed-right"></td>
                <td colspan="2" class="dashed-right"></td>
                <td colspan="2" class="dashed-right"></td>
            </tr>
            <?php endfor; ?>
            <?php else: ?>
            <?php for($i=0;$i<16;$i++): ?> <tr>
                <td colspan="1" class="dashed-right"></td>
                <td colspan="6" class="dashed-right"></td>
                <td colspan="1" class="dashed-right"></td>
                <td colspan="2" class="dashed-right"></td>
                <td colspan="2" class="dashed-right"></td>
                </tr>
            <?php endfor; ?>
            <?php endif; ?>



                <tr class="dashed">
                    <td colspan="1" class="dashed-right"></td>
                    <td colspan="9" class="dashed-right"> **หมายเหตุ** (บริษัท มิสซิเบิล เทคโนโลยี จำกัด มีระยะเวลารับประกันสินค้า <?php echo e($quotation['product_data']['product_assurance'] ?? ''); ?> ปี )</td>
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
                <th colspan="4" class="bg-grey">Price Validity: (<?php echo e($quotation['product_data']['product_price_validity'] ?? ''); ?> Days)</th>
                <th colspan="4" class="bg-grey">Delivery Term : (<?php echo e($quotation['product_data']['product_delivery_term'] ?? ''); ?> Days)</th>
                <th colspan="2" class="bg-grey">DISCOUNT</th>
                <th colspan="2"><?php echo e(number_format($quotation['product_data']['product_discount'] ?? 0, 1, '.', '')); ?> %</th>
            </tr>
            <tr>
                <th colspan="2" class="bg-grey">Down Payment</th>
                <th colspan="2" class="bg-grey">Final Check</th>
                <th colspan="2" class="bg-grey">After Install</th>
                <th colspan="2" class="bg-grey" rowspan="3">Credit <?php echo e($quotation['product_data']['product_credit_day'] ?? ''); ?> Days</th>
                <th colspan="2" class="bg-grey">TOTAL</th>
                <th colspan="2" class="bg-dark-grey"><?php echo e(number_format($quotation['product_data']['product_price'] ?? 0)); ?></th>
            </tr>
            <tr>
                <th colspan="2" class="bg-grey"><?php echo e(number_format($quotation['product_data']['product_down_payment'] ?? 0, 1, '.', '')); ?>%</th>
                <th colspan="2" class="bg-grey"><?php echo e(number_format($quotation['product_data']['product_final_check'] ?? 0, 1,'.', '')); ?>%</th>
                <th colspan="2" class="bg-grey"><?php echo e(number_format($quotation['product_data']['product_after_install'] ?? 0, 1, '.', '')); ?>%</th>
                <th colspan="2" class="bg-grey">VAT 7.0%</th>
                <th colspan="2" class="bg-dark-grey"><?php echo e(number_format(($quotation['product_data']['product_price']?? 0) *0.07)); ?></th>
            </tr>
            <tr>
                <th colspan="2" class="bg-dark-grey"><?php echo e(number_format((($quotation['product_data']['product_price']?? 0)+(($quotation['product_data']['product_price']?? 0)*0.07))*(($quotation['product_data']['product_down_payment']?? 0)/100))); ?></th>
                <th colspan="2" class="bg-dark-grey"><?php echo e(number_format((($quotation['product_data']['product_price']?? 0)+(($quotation['product_data']['product_price']?? 0)*0.07))*(($quotation['product_data']['product_final_check']?? 0)/100))); ?></th>
                <th colspan="2" class="bg-dark-grey"><?php echo e(number_format((($quotation['product_data']['product_price']?? 0)+(($quotation['product_data']['product_price']?? 0)*0.07))*(($quotation['product_data']['product_after_install']?? 0)/100))); ?></th>
                <th colspan="2" class="bg-grey">TOTAL PRICE</th>
                <th colspan="2" class="bg-dark-grey"><?php echo e(number_format(($quotation['product_data']['product_price']?? 0)+(($quotation['product_data']['product_price']?? 0)*0.07)-(($quotation['product_data']['product_price']?? 0)*($quotation['product_data']['product_discount']?? 0)/100))); ?></th>
            </tr>
            <tr>
                <th colspan="4" rowspan="4">
                    <div class="flex-container">
                        <div class="flex-row">
                            <img src="<?php echo e(asset('images/image003.png')); ?>" width="45" height="30" style="margin: 7px;">
                            <img src="<?php echo e(asset('images/image004.png')); ?>" width="45" height="30" style="margin: 7px;">
                            <img src="<?php echo e(asset('images/image005.png')); ?>" width="45" height="30" style="margin: 7px;">
                        </div>
                        <div class="flex-row">
                            <img src="<?php echo e(asset('images/image006.png')); ?>" width="45" height="25" style="margin: 7px;">
                            <img src="<?php echo e(asset('images/image007.png')); ?>" width="45" height="30" style="margin: 7px;">
                            <img src="<?php echo e(asset('images/image008.png')); ?>" width="45" height="25" style="margin: 7px;">
                        </div>
                    </div>
                </th>
                <th colspan="4" height="80"></th>
                <th colspan="4" height="80"></th>
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
</body>
</html>
<?php /**PATH C:\miscibles-platform\src\resources\views/pages/admin/quotation/quotation-preview.blade.php ENDPATH**/ ?>