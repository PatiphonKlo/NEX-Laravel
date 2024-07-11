<!DOCTYPE html>
<head>
    <title>Quotation</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="/images/favicon.ico">
    <link rel="stylesheet" href="css/quotation.css">
</head>
<style>
  @font-face {
    font-family: 'THSarabunNew';
    font-style: normal;
    font-weight: normal;
    src: url("<?php echo e(public_path('fonts/THSarabunNew.ttf')); ?>") format('truetype');
  }
  @font-face {
    font-family: 'THSarabunNew';
    font-style: normal;
    font-weight: bold;
    src: url("<?php echo e(public_path('fonts/THSarabunNew Bold.ttf')); ?>") format('truetype');
  }
  @font-face {
    font-family: 'THSarabunNew';
    font-style: italic;
    font-weight: normal;
    src: url("<?php echo e(public_path('fonts/THSarabunNew Italic.ttf')); ?>") format('truetype');
  }
  @font-face {
    font-family: 'THSarabunNew';
    font-style: italic;
    font-weight: bold;
    src: url("<?php echo e(public_path('fonts/THSarabunNew BoldItalic.ttf')); ?>") format('truetype');
  }
</style>
<body>
    <table>
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
                <img class="LOGO" src="images/image001.png" alt="MISCIBLEs logo">
                <img class="ISO" src="images/image002.png" >
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
            <th colspan="1"><?php echo e($day); ?></th>
            <th colspan="1"><?php echo e($month); ?></th>
            <th colspan="1"><?php echo e($year); ?></th>
            <th colspan="1">Code:</th>
            <th colspan="2">MQ.<?php echo e(count($allOrder)); ?><?php echo e($dateFormat); ?></th>
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
            <th colspan="4"><?php echo e($customerData['contact name']); ?></th>
            <th colspan="2" class="bg-grey">TEL :</th>
            <th colspan="4"><?php echo e($customerData['phone']); ?></th>
        </tr>
        <tr>
            <th colspan="2" class="bg-grey">CUSTOMER :</th>
            <th colspan="4"><?php echo e($customerData['company']); ?></th>
            <th colspan="2" class="bg-grey">EMAIL :</th>
            <th colspan="4"><?php echo e($customerData['email']); ?></th>
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
            <td colspan="6" class="dashed-right left"><?php echo e($productDocument['PRODUCT_NAME']); ?></td>
            <td colspan="1" class="dashed-right">1.0</td>
            <td colspan="2" class="dashed-right"><?php echo e(number_format($productDocument['PRICE'])); ?></td>
            <td colspan="2" class="dashed-right"><?php echo e(number_format($productDocument['PRICE']*1.0)); ?></td>
        </tr>

        
        <?php $__currentLoopData = $productTechnical; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr class="dashed">
                <td colspan="1" class="dashed-right"></td>
                <td colspan="6" class="dashed-right left"><?php echo e($item['TECHNICAL_PARTS']); ?> : <?php echo e($item['TECHNICAL_SPECIFICATION']); ?></td>
                <td colspan="1" class="dashed-right"></td>
                <td colspan="2" class="dashed-right"></td>
                <td colspan="2" class="dashed-right"></td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php for($i=0;$i<(16-count($productTechnical));$i++): ?>
            <tr>
                <td colspan="1" class="dashed-right"></td>
                <td colspan="6" class="dashed-right"></td>
                <td colspan="1" class="dashed-right"></td>
                <td colspan="2" class="dashed-right"></td>
                <td colspan="2" class="dashed-right"></td>
            </tr>
        <?php endfor; ?>
       


        <tr class="dashed">
            <td colspan="1" class="dashed-right"></td>
            <td colspan="9" class="dashed-right"> **หมายเหตุ**   (บริษัท มิสซิเบิล เทคโนโลยี จำกัด  มีระยะเวลารับประกันสินค้า <?php echo e($productDocument['ASSURANCE']); ?> ปี )</td>
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
            <th colspan="4" class="bg-grey">Price Validity: (<?php echo e($productDocument['PRICE_VALIDITY']); ?> Days)</th>
            <th colspan="4" class="bg-grey">Delivery Term : (<?php echo e($productDocument['DELIVERY_TERM']); ?> Days)</th>
            <th colspan="2" class="bg-grey">DISCOUNT</th>
            <th colspan="2"><?php echo e(number_format($productDocument['DISCOUNT'], 1, '.', '')); ?> %</th>
        </tr>
        <tr>
            <th colspan="2" class="bg-grey">Down Payment</th>
            <th colspan="2" class="bg-grey">Final Check</th>
            <th colspan="2" class="bg-grey">After Install</th>
            <th colspan="2" class="bg-grey" rowspan="3">Credit <?php echo e($productDocument['CREDIT_DAYS']); ?> Days</th>
            <th colspan="2" class="bg-grey">TOTAL</th>
            <th colspan="2" class="bg-dark-grey"><?php echo e(number_format($productDocument['PRICE'])); ?></th>
        </tr>
        <tr>
            <th colspan="2" class="bg-grey"><?php echo e(number_format($productDocument['DOWN_PAYMENT'], 1, '.', '')); ?>%</th>
            <th colspan="2" class="bg-grey"><?php echo e(number_format($productDocument['FINAL_CHECK'], 1,'.', '')); ?>%</th>
            <th colspan="2" class="bg-grey"><?php echo e(number_format($productDocument['AFTER_INSTALL'], 1, '.', '')); ?>%</th>
            <th colspan="2" class="bg-grey">VAT 7.0%</th>
            <th colspan="2" class="bg-dark-grey"><?php echo e(number_format($productDocument['PRICE']*0.07)); ?></th>
        </tr>
        <tr>
            <th colspan="2" class="bg-dark-grey"><?php echo e(number_format(($productDocument['PRICE']+($productDocument['PRICE']*0.07))*($productDocument['DOWN_PAYMENT']/100))); ?></th>
            <th colspan="2" class="bg-dark-grey"><?php echo e(number_format(($productDocument['PRICE']+($productDocument['PRICE']*0.07))*($productDocument['FINAL_CHECK']/100))); ?></th>
            <th colspan="2" class="bg-dark-grey"><?php echo e(number_format(($productDocument['PRICE']+($productDocument['PRICE']*0.07))*($productDocument['AFTER_INSTALL']/100))); ?></th>
            <th colspan="2" class="bg-grey">TOTAL PRICE</th>
            <th colspan="2" class="bg-dark-grey"><?php echo e(number_format($productDocument['PRICE']+($productDocument['PRICE']*0.07)-($productDocument['PRICE']*$productDocument['DISCOUNT']/100))); ?></th>
        </tr>
        <tr>
            <th colspan="4" rowspan="4">
                <img src="images/image003.png" width="45" height="30" style="margin: 7px;">
                <img src="images/image004.png" width="45" height="30" style="margin: 7px;">
                <img src="images/image005.png" width="45" height="30" style="margin: 7px;">
                <img src="images/image006.png" width="45" height="25" style="margin: 7px;">
                <img src="images/image007.png" width="45" height="30" style="margin: 7px;">
                <img src="images/image008.png" width="45" height="25" style="margin: 7px;">
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
</body>
</html>

<?php /**PATH C:\my-project\miscibles-platform-development\src\resources\views/STANDARD_PRODUCTS/page/pdfQuotation.blade.php ENDPATH**/ ?>