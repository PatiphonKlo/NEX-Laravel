<!DOCTYPE html>
<html>
<head>
    <title>View PDF</title>
</head>
<body>
    <?php if($pdfURL): ?>
        <p>PDF URL: <a href="<?php echo e($pdfURL); ?>" target="_blank">View PDF</a></p>
    <?php else: ?>
        <p>PDF not found.</p>
    <?php endif; ?>
</body>
</html>
<?php /**PATH C:\NEX\miscibles-platform-2.1\src\resources\views/pages/admin/product/spec/view.blade.php ENDPATH**/ ?>