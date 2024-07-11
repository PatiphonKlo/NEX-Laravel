<!DOCTYPE html>

<head>
    <title>Enquiry Sheet</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/enquiry.css">
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
    <div>
        <?php $__empty_1 = true; $__currentLoopData = $enquiryData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $enquiryData): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <table cellspacing="0" cellpadding="0">
                <thead>
                    <tr>
                        <th width="25%" height="0%"></th>
                        <th width="25%" height="0%"></th>
                        <th width="25%" height="0%"></th>
                        <th width="25%" height="0%"></th>
                    </tr>
                    <tr>
                        <th colspan="4">AGITATOR ENQUIRY SHEET</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    </tr>
                    <tr>
                        <td rowspan="1" colspan="4" id="header">CONTACT INFORMATION</td>
                    </tr>
                    <tr>
                        <td>ชื่อบริษัท</td>
                        <td><?php echo e(isset($enquiryData['client_data']['client_company']) ? $enquiryData['client_data']['client_company'] : 'N/A'); ?></td>
                        <td>เบอร์มือถือ</td>
                        <td><?php echo e(isset($enquiryData['client_data']['client_phone_number']) ? $enquiryData['client_data']['client_phone_number'] : 'N/A'); ?></td>
                    </tr>
                    <tr>
                        <td>บุคคลติดต่อ</td>
                        <td><?php echo e($enquiryData['client_data']['client_contact_name']); ?></td>
                        <td>อีเมลล์</td>
                        <td><?php echo e($enquiryData['client_data']['client_email']); ?></td>
                    </tr>
                    <tr>
                        <td colspan="4" id="header">MIXING TASK</td>
                    </tr>
                    <tr>
                        <td>ชื่อสารเคมี</td>
                        <td colspan="3"><?php echo e($enquiryData['chemical substances']); ?></td>
                    </tr>
                    <tr>
                        <td>ชนิดของ Base / Base Type</td>
                        <td><?php echo e($enquiryData['base type']); ?></td>
                        <td>จำนวนชนิดของผสม ของแข็ง/ผง กับของเหลว (Solid- Liquid Mixing)</td>
                        <td><?php echo e($enquiryData['solid-liquid']); ?></td>
                    </tr>
                    <tr>
                        <td>จำนวนชนิดของผสม ของเหลวกับของเหลว (Liquid-Liquid Mixing)</td>
                        <td><?php echo e($enquiryData['liquid-liquid']); ?></td>
                        <td>ความสามารถในการเข้ากันได้ดี</td>
                        <td><?php echo e($enquiryData['liquid-liquid miscible']); ?></td>
                    </tr>
                    <tr>
                        <td>ความสามารถในการเข้ากันได้ดี</td>
                        <td><?php echo e($enquiryData['solid-liquid miscible']); ?></td>
                        <td>% ของผง</td>
                        <td><?php echo e($enquiryData['solid particle']); ?></td>
                    </tr>
                    <tr style="height: 53px;">
                        <td>ป้องกันการตกตะกอนของผง (Slurry Storage)</td>
                        <td></td>
                        <td>การกระจายตัวของผงในของเหลว (Solid - Liquid Dispersion)</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>% ของผง</td>
                        <td><?php echo e($enquiryData['slurry storage']); ?></td>
                        <td>% ของผง</td>
                        <td><?php echo e($enquiryData['solid-liquid dispersion']); ?></td>
                    </tr>
                    <tr>
                        <td>ผสมของเหลวเพื่อทำปฏิกิริยา / กระบวนการผสมอย่างย่อ</td>
                        <td colspan="3"><?php echo e($enquiryData['mixing reaction']); ?></td>
                    </tr>
                    <tr>
                        <td>หมายเหตุ</td>
                        <td colspan="3"><?php echo e($enquiryData['mixing annotation']); ?></td>
                    </tr>
                    <tr>
                        <td colspan="4" id="header">LIQUID PROPERTIES</td>
                    </tr>
                    
                    <tr>
                        <td>Max. Viscosity / CPS</td>
                        <td><?php echo e($enquiryData['max viscosity']); ?></td>
                        <td>Max. Density / kg/m^3</td>
                        <td><?php echo e($enquiryData['max density']); ?></td>
                    </tr>
                    <tr>
                        <td>การให้ความร้อน</td>
                        <td><?php echo e($enquiryData['heating']); ?></td>
                        <td>การระบายความร้อน</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>ให้ความร้อนโดย</td>
                        <td><?php echo e($enquiryData['heater']); ?></td>
                        <td>ระบายความร้อนโดย</td>
                        <td><?php echo e($enquiryData['cooler']); ?></td>
                    </tr>
                    <tr>
                        <td>อุณหภูมิ (Temp.) / ° C</td>
                        <td><?php echo e($enquiryData['heating temperature']); ?></td>
                        <td>อุณหภูมิ (Temp.) / ° C</td>
                        <td><?php echo e($enquiryData['cooling temperature']); ?></td>
                    </tr>
                    <tr>
                        <td>ความดัน (Pressure) / Bar</td>
                        <td><?php echo e($enquiryData['heating pressure']); ?></td>
                        <td>ความดัน (Pressure) / Bar</td>
                        <td><?php echo e($enquiryData['cooling pressure']); ?></td>
                    </tr>
                    <tr>
                        <td>หมายเหตุ</td>
                        <td colspan="3"><?php echo e($enquiryData['mixing annotation']); ?></td>
                    </tr>
                    <tr>
                        <td colspan="4" id="header">VESSEL TANK</td>
                    </tr>
                    <tr>
                        <td>วัสดุที่สัมผัสสารของถัง</td>
                        <td><?php echo e($enquiryData['material']); ?></td>
                        <td>จำนวนชั้นของถัง</td>
                        <td><?php echo e($enquiryData['layer']); ?></td>
                    </tr>
                    <tr>
                        <td>ถังชั้นเดียว</td>
                        <td>Thickness : mm</td>
                        <td colspan="2"><?php echo e($enquiryData['first layer thickness']); ?></td>
                    </tr>
                    <tr>
                        <td>Diameter : mm</td>
                        <td><?php echo e($enquiryData['first layer diameter']); ?></td>
                        <td>Shell : mm</td>
                        <td><?php echo e($enquiryData['first layer shell']); ?></td>
                    </tr>
                    <tr>
                        <td>Bottom : mm</td>
                        <td colspan="3"><?php echo e($enquiryData['first layer bottom']); ?></td>
                    </tr>
                    <tr>
                        <td>ถังสองชั้น</td>
                        <td><?php echo e($enquiryData['second layer']); ?></td>
                        <td>Thickness : mm</td>
                        <td><?php echo e($enquiryData['second layer thickness']); ?></td>
                    </tr>
                    <tr>
                        <td>หุ้มฉนวน</td>
                        <td><?php echo e($enquiryData['insulator']); ?></td>
                        <td>Thickness : mm</td>
                        <td><?php echo e($enquiryData['insulator thickness']); ?></td>
                    </tr>
                    <tr>
                        <td>หุ้มด้วย</td>
                        <td><?php echo e($enquiryData['overlay']); ?></td>
                        <td>Thickness : mm</td>
                        <td><?php echo e($enquiryData['overlay thickness']); ?></td>
                    </tr>
                    <tr>
                        <td>ลักษณะของหัวถัง</td>
                        <td><?php echo e($enquiryData['vessel head']); ?></td>
                        <td>ลักษณะของก้นถัง</td>
                        <td><?php echo e($enquiryData['vessel bottom']); ?></td>
                    </tr>
                    <tr>
                        <td>รายละเอียดเพิ่มเติม</td>
                        <td colspan="3"><?php echo e($enquiryData['more information']); ?></td>
                    </tr>
                    <tr>
                        <td colspan="4" id="header">MORE IMPORTANT INFORMATION</td>
                    </tr>
                    <tr>
                        <td>ชนิดมอเตอร์</td>
                        <td><?php echo e($enquiryData['motor type']); ?></td>
                        <td>ยี่ห้ออุปกรณ์ Motor</td>
                        <td><?php echo e($enquiryData['motor brand']); ?></td>
                    </tr>
                    <tr>
                        <td>ระบบไฟฟ้า</td>
                        <td><?php echo e($enquiryData['power system']); ?></td>
                        <td>Inverter</td>
                        <td><?php echo e($enquiryData['inverter brand']); ?></td>
                    </tr>
                    <tr>
                        <td>ความเร็วรอบ</td>
                        <td><?php echo e($enquiryData['RPM']); ?></td>
                        <td>แนบไฟล์ Drawing</td>
                        <td><?php echo e($enquiryData['drawing file']); ?></td>
                    </tr>
                </tbody>
            </table>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <p>no data</p>
        <?php endif; ?>
</div>
</body>
<?php /**PATH C:\my-project\miscibles-platform\src\resources\views/layouts/pdf/enquiry.blade.php ENDPATH**/ ?>