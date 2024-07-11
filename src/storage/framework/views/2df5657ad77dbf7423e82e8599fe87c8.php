<!DOCTYPE html>

<head>
  <title>Enquiry Sheet</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
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
  <?php $__empty_1 = true; $__currentLoopData = $Data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
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
        <td><?php echo e($Data['Customer_data']['company']); ?></td>
        <td>เบอร์มือถือ</td>
        <td><?php echo e($Data['Customer_data']['phone']); ?></td>
      </tr>
      <tr>
        <td>บุคคลติดต่อ</td>
        <td><?php echo e($Data['Customer_data']['contact name']); ?></td>
        <td>อีเมลล์</td>
        <td><?php echo e($Data['Customer_data']['email']); ?></td>
      </tr>
      <tr>
        <td colspan="4" id="header">MIXING TASK</td>
      </tr>
      <tr>
        <td>ชื่อสารเคมี</td>
        <td colspan="3"><?php echo e($Data['Enquiry_data']['chemical substances']); ?></td>
      </tr>
      <tr>
        <td>ชนิดของ Base / Base Type</td>
        <td><?php echo e($Data['Enquiry_data']['base type']); ?></td>
        <td>จำนวนชนิดของผสม ของแข็ง/ผง กับของเหลว (Solid- Liquid Mixing)</td>
        <td><?php echo e($Data['Enquiry_data']['solid-liquid']); ?></td>
      </tr>
      <tr>
        <td>จำนวนชนิดของผสม ของเหลวกับของเหลว (Liquid-Liquid Mixing)</td>
        <td><?php echo e($Data['Enquiry_data']['liquid-liquid']); ?></td>
        <td>ความสามารถในการเข้ากันได้ดี</td>
        <td><?php echo e($Data['Enquiry_data']['liquid-liquid miscible']); ?></td>
      </tr>
      <tr>
        <td>ความสามารถในการเข้ากันได้ดี</td>
        <td><?php echo e($Data['Enquiry_data']['solid-liquid miscible']); ?></td>
        <td>% ของผง</td>
        <td><?php echo e($Data['Enquiry_data']['solid particle']); ?></td>
      </tr>
      <tr style="height: 53px;">
        <td>ป้องกันการตกตะกอนของผง (Slurry Storage)</td>
        <td></td>
        <td>การกระจายตัวของผงในของเหลว (Solid - Liquid Dispersion)</td>
        <td></td>
      </tr>
      <tr>
        <td>% ของผง</td>
        <td><?php echo e($Data['Enquiry_data']['slurry storage']); ?></td>
        <td>% ของผง</td>
        <td><?php echo e($Data['Enquiry_data']['solid-liquid dispersion']); ?></td>
      </tr>
      <tr>
        <td>ผสมของเหลวเพื่อทำปฏิกิริยา / กระบวนการผสมอย่างย่อ</td>
        <td colspan="3"><?php echo e($Data['Enquiry_data']['mixing reaction']); ?></td>
      </tr>
      <tr>
        <td>หมายเหตุ</td>
        <td colspan="3"><?php echo e($Data['Enquiry_data']['mixing annotation']); ?></td>
      </tr>
      <tr>
        <td colspan="4" id="header">LIQUID PROPERTIES</td>
      </tr>
      
      <tr>
        <td>Max. Viscosity / CPS</td>
        <td><?php echo e($Data['Enquiry_data']['max viscosity']); ?></td>
        <td>Max. Density / kg/m^3</td>
        <td><?php echo e($Data['Enquiry_data']['max density']); ?></td>
      </tr>
      <tr>
        <td>การให้ความร้อน</td>
        <td><?php echo e($Data['Enquiry_data']['heating']); ?></td>
        <td>การระบายความร้อน</td>
        <td></td>
      </tr>
      <tr>
        <td>ให้ความร้อนโดย</td>
        <td><?php echo e($Data['Enquiry_data']['heater']); ?></td>
        <td>ระบายความร้อนโดย</td>
        <td><?php echo e($Data['Enquiry_data']['cooler']); ?></td>
      </tr>
      <tr>
        <td>อุณหภูมิ (Temp.) / ° C</td>
        <td><?php echo e($Data['Enquiry_data']['heating temperature']); ?></td>
        <td>อุณหภูมิ (Temp.) / ° C</td>
        <td><?php echo e($Data['Enquiry_data']['cooling temperature']); ?></td>
      </tr>
      <tr>
        <td>ความดัน (Pressure) / Bar</td>
        <td><?php echo e($Data['Enquiry_data']['heating pressure']); ?></td>
        <td>ความดัน (Pressure) / Bar</td>
        <td><?php echo e($Data['Enquiry_data']['cooling pressure']); ?></td>
      </tr>
      <tr>
        <td>หมายเหตุ</td>
        <td colspan="3"><?php echo e($Data['Enquiry_data']['mixing annotation']); ?></td>
      </tr>
      <tr>
        <td colspan="4" id="header">VESSEL TANK</td>
      </tr>
      <tr>
        <td>วัสดุที่สัมผัสสารของถัง</td>
        <td><?php echo e($Data['Enquiry_data']['material']); ?></td>
        <td>จำนวนชั้นของถัง</td>
        <td><?php echo e($Data['Enquiry_data']['layer']); ?></td>
      </tr>
      <tr>
        <td>ถังชั้นเดียว</td>
        <td>Thickness : mm</td>
        <td colspan="2"><?php echo e($Data['Enquiry_data']['first layer thickness']); ?></td>
      </tr>
      <tr>
        <td>Diameter : mm</td>
        <td><?php echo e($Data['Enquiry_data']['first layer diameter']); ?></td>
        <td>Shell : mm</td>
        <td><?php echo e($Data['Enquiry_data']['first layer shell']); ?></td>
      </tr>
      <tr>
        <td>Bottom : mm</td>
        <td colspan="3"><?php echo e($Data['Enquiry_data']['first layer bottom']); ?></td>
      </tr>
      <tr>
        <td>ถังสองชั้น</td>
        <td><?php echo e($Data['Enquiry_data']['second layer']); ?></td>
        <td>Thickness : mm</td>
        <td><?php echo e($Data['Enquiry_data']['second layer thickness']); ?></td>
      </tr>
      <tr>
        <td>หุ้มฉนวน</td>
        <td><?php echo e($Data['Enquiry_data']['insulator']); ?></td>
        <td>Thickness : mm</td>
        <td><?php echo e($Data['Enquiry_data']['insulator thickness']); ?></td>
      </tr>
      <tr>
        <td>หุ้มด้วย</td>
        <td><?php echo e($Data['Enquiry_data']['overlay']); ?></td>
        <td>Thickness : mm</td>
        <td><?php echo e($Data['Enquiry_data']['overlay thickness']); ?></td>
      </tr>
      <tr>
        <td>ลักษณะของหัวถัง</td>
        <td><?php echo e($Data['Enquiry_data']['vessel head']); ?></td>
        <td>ลักษณะของก้นถัง</td>
        <td><?php echo e($Data['Enquiry_data']['vessel bottom']); ?></td>
      </tr>
      <tr>
        <td>รายละเอียดเพิ่มเติม</td>
        <td colspan="3"><?php echo e($Data['Enquiry_data']['more information']); ?></td>
      </tr>
      <tr>
        <td colspan="4" id="header">MORE IMPORTANT INFORMATION</td>
      </tr>
      <tr>
        <td>ชนิดมอเตอร์</td>
        <td><?php echo e($Data['Enquiry_data']['motor type']); ?></td>
        <td>ยี่ห้ออุปกรณ์ Motor</td>
        <td><?php echo e($Data['Enquiry_data']['motor brand']); ?></td>
      </tr>
      <tr>
        <td>ระบบไฟฟ้า</td>
        <td><?php echo e($Data['Enquiry_data']['power system']); ?></td>
        <td>Inverter</td>
        <td><?php echo e($Data['Enquiry_data']['inverter brand']); ?></td>
      </tr>
      <tr>
        <td>ความเร็วรอบ</td>
        <td><?php echo e($Data['Enquiry_data']['RPM']); ?></td>
        <td>แนบไฟล์ Drawing</td>
        <td><?php echo e($Data['Enquiry_data']['drawing file']); ?></td>
      </tr>
    </tbody>
  </table>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
  <p>no data</p>
  <?php endif; ?>
</div>
</body><?php /**PATH C:\my-project\miscibles-platform-development\src\resources\views/CONTENT_MANAGEMENT_SYSTEM/component/pdfEnquiry.blade.php ENDPATH**/ ?>