<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="<?php echo e(asset('css/quotation.css')); ?>">
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
                <th class="non-border" width="8.33%" height="0"></th>
                <th class="non-border" width="8.33%" height="0"></th>
                <th class="non-border" width="8.33%" height="0"></th>
                <th class="non-border" width="8.33%" height="0"></th>
                <th class="non-border" width="8.33%" height="0"></th>
                <th class="non-border" width="8.33%" height="0"></th>
                <th class="non-border" width="8.33%" height="0"></th>
                <th class="non-border" width="8.33%" height="0"></th>
                <th class="non-border" width="8.33%" height="0"></th>
                <th class="non-border" width="8.33%" height="0"></th>
                <th class="non-border" width="8.33%" height="0"></th>
                <th class="non-border" width="8.33%" height="0"></th>
            </tr>
            <tr>
                <th rowspan="4" colspan="5" height="150">
                    <div class="flex-row">
                        <img class="LOGO" src="<?php echo e(asset('images/image001.png')); ?>" alt="MISCIBLEs logo">
                        <img class="ISO" src="<?php echo e(asset('images/image002.png')); ?>">
                    </div>
                </th>
                <th class="bg-grey" colspan="7" style="font-size: 18px; font-weight: bold;">
                    <input required id="header1" name="header1" type="text">
                </th>
            </tr>

            <tr class="bg-grey">
                <th colspan="4"><input required id="header2" name="header2" type="text"></th>
                <th colspan="3"><input required id="header3" name="header3" type="text"></th>
            </tr>
            <tr class="bg-grey">
                <th colspan="1">
                    <input required id="header4" name="header4" type="text">
                </th>
                <th colspan="3"></th>
                <th colspan="1">
                    <input required id="header5" name="header5" type="text">
                </th>
                <th colspan="2"></th></th>
            </tr>
            <tr>
                <th colspan="7" class="bg-grey bold">
                    <input required id="header6" name="header6" type="text">
                </th>
            </tr>
            <tr>
                <th colspan="12" class="bg-grey">
                    <textarea id="textarea1" name="textarea1"></textarea>
                </th>
            </tr>
            <tr>
                <th colspan="2" class="bg-grey">
                    <input required id="header7" name="header7" type="text">
                </th>
                <th colspan="4"></th>
                <th colspan="2" class="bg-grey">
                    <input required id="header8" name="header8" type="text">
                </th>
                <th colspan="4"></th>
            </tr>
            <tr>
                <th colspan="2" class="bg-grey">
                    <input required id="header9" name="header9" type="text">
                </th>
                <th colspan="4"></th>
                <th colspan="2" class="bg-grey">
                    <input required id="header10" name="header10" type="text">
                </th>
                <th colspan="4"></th>
            </tr>
            <tr class="bg-grey">
                <th colspan="1">
                    <input required id="content1" name="content1" type="text">
                </th>
                <th colspan="6">
                    <input required id="content2" name="content2" type="text">
                </th>
                <th colspan="1">
                    <input required id="content3" name="content3" type="text">
                </th>
                <th colspan="2">
                    <input required id="content4" name="content4" type="text">
                </th>
                <th colspan="2">
                    <input required id="content5" name="content5" type="text">
                </th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td colspan="1" class="dashed-right"></td>
                <td colspan="6" class="dashed-right left"></td>
                <td colspan="1" class="dashed-right"></td>
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
                    <td colspan="9" class="dashed-right">
                        <input required style="width: 65%; text-align: center;" id="content6" name="content6" type="text" class="annotation align-left"><input required style="width: 8%; text-align: left;" id="content7" name="content7" type="text" class="annotation align-left" placeholder="unit">
                    </td>
                    <td colspan="2" class="dashed-right"></td>
                </tr>
        </tbody>
        <tfoot>
            <tr>
                <th colspan="8" rowspan="2" class="non-border-bottom bg-grey left">
                    <span style="text-decoration: underline; font-weight: bold;"><input required style="text-align: left;" id="content8" name="content8" type="text"></span><br>
                    <input required style="text-align: left;" id="content9" name="content9" type="text">
                </th>
                <th colspan="2" class="dashed-right"></th>
                <th colspan="2" class="dashed-left"></th>
            </tr>
            <tr>
                <th colspan="2" class="dashed-right"></th>
                <th colspan="2" class="dashed-left"></th>
            </tr>
            <tr>
                <th colspan="4" class="bg-grey"><input required style="width: 45%;" id="content10" name="content10" type="text"><input required style="width: 25%;" id="content11" name="content11" type="text" placeholder="unit"></th>
                <th colspan="4" class="bg-grey"><input required style="width: 45%;" id="content12" name="content12" type="text"><input required style="width: 25%;" id="content13" name="content13" type="text" placeholder="unit"></th>
                <th colspan="2" class="bg-grey"><input required style="width: 55%;" id="content14" name="content14" type="text"> (%)</th>
                <th colspan="2"></th>
            </tr>
            <tr>
                <th colspan="2" class="bg-grey"><input required id="content15" name="content15" type="text"></th>
                <th colspan="2" class="bg-grey"><input required id="content16" name="content16" type="text"></th>
                <th colspan="2" class="bg-grey"><input required id="content17" name="content17" type="text"></th>
                <th colspan="2" class="bg-grey" rowspan="3"><input required style="width: 45%;" id="content18" name="content18" type="text"><input required style="width: 40%;" id="content19" name="content19" type="text" placeholder="unit"></th>
                <th colspan="2" class="bg-grey"><input required id="content20" name="content20" type="text"></th>
                <th colspan="2" class="bg-dark-grey"></th>
            </tr>
            <tr>
                <th colspan="2" class="bg-grey">(%)</th>
                <th colspan="2" class="bg-grey">(%)</th>
                <th colspan="2" class="bg-grey">(%)</th>
                <th colspan="2" class="bg-grey"><input required style="width: 55%;" id="content21" name="content21" type="text"> 7.0 (%)</th>
                <th colspan="2" class="bg-dark-grey"></th>
            </tr>
            <tr>
                <th colspan="2" class="bg-dark-grey"></th>
                <th colspan="2" class="bg-dark-grey"></th>
                <th colspan="2" class="bg-dark-grey"></th>
                <th colspan="2" class="bg-grey"><input required id="content22" name="content22" type="text"></th>
                <th colspan="2" class="bg-dark-grey"></th>
            </tr>
            <tr>
                <th colspan="4" rowspan="4">
                    <div class="flex-container">
                        <div class="flex-row">
                            <img src="<?php echo e(asset('images/image003.png')); ?>" width="85" height="30" style="margin: 7px;">
                            <img src="<?php echo e(asset('images/image004.png')); ?>" width="85" height="30" style="margin: 7px;">
                            <img src="<?php echo e(asset('images/image005.png')); ?>" width="85" height="30" style="margin: 7px;">
                        </div>
                        <div class="flex-row">
                            <img src="<?php echo e(asset('images/image006.png')); ?>" width="85" height="25" style="margin: 7px;">
                            <img src="<?php echo e(asset('images/image007.png')); ?>" width="85" height="30" style="margin: 7px;">
                            <img src="<?php echo e(asset('images/image008.png')); ?>" width="85" height="25" style="margin: 7px;">
                        </div>
                    </div>
                </th>
                <th colspan="4" height="80"></th>
                <th colspan="4" height="80"></th>
            </tr>
            <tr>
                <th colspan="4" class="bg-grey"><input required id="footer1" name="footer1" type="text"></th>
                <th colspan="4" class="bg-grey"><input required id="footer2" name="footer2" type="text"></th>
            </tr>
            <tr>
                <th colspan="4" class="bg-grey"><input required id="footer3" name="footer3" type="text"></th>
                <th colspan="4" class="bg-grey"><input required id="footer4" name="footer4" type="text"></th>
            </tr>
            <tr>
                <th colspan="4" class="bg-grey"><input required id="footer5" name="footer5" type="text"></th>
                <th colspan="4" class="bg-grey"><input required id="footer6" name="footer6" type="text"></th>
            </tr>
        </tfoot>
    </table>

</body>
</html>
<?php /**PATH C:\my-project\miscibles-platform\src\resources\views/CONTENT_MANAGEMENT_SYSTEM/layout/quotation.blade.php ENDPATH**/ ?>