<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Dashboard - NiceAdmin Bootstrap Template</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="<?php echo e(asset('NiceAdmin/assets/img/favicon.png')); ?>" rel="icon">
    <link href="<?php echo e(asset('NiceAdmin/assets/img/apple-touch-icon.png')); ?>" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="<?php echo e(asset('NiceAdmin/assets/vendor/bootstrap/css/bootstrap.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('NiceAdmin/assets/vendor/bootstrap-icons/bootstrap-icons.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('NiceAdmin/assets/vendor/boxicons/css/boxicons.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('NiceAdmin/assets/vendor/quill/quill.snow.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('NiceAdmin/assets/vendor/quill/quill.bubble.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('NiceAdmin/assets/vendor/remixicon/remixicon.css')); ?>" rel="stylesheet">
    

    <!-- Template Main CSS File -->
    <link href="<?php echo e(asset('NiceAdmin/assets/css/style.css')); ?>" rel="stylesheet">

    <!-- dataTables CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('datatables/css/fixedColumns.dataTables.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('datatables/css/jquery.dataTables.min.css')); ?>">

    <!-- Select2 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <!-- =======================================================
  * Template Name: NiceAdmin - v2.4.1
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>
    <!-- ======= Sweet Alert ======= -->
    <?php echo $__env->make('sweetalert::alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- ======= End Sweet Alert ======= -->

    <!-- ======= Header ======= -->
    <?php echo $__env->make('layouts.template.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- End Header -->

    <!-- ======= Sidebar ======= -->
    <?php echo $__env->make('layouts.template.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- End Sidebar-->

    <!-- ======= Main ======= -->
    <main id="main" class="main">
        <?php echo $__env->yieldContent('content'); ?>
    </main>
    <!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">
        <div class="copyright">
            &copy; Copyright <strong><span>NiceAdmin</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
            <!-- All the links in the footer should remain intact. -->
            <!-- You can delete the links only if you purchased the pro version. -->
            <!-- Licensing information: https://bootstrapmade.com/license/ -->
            <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
            Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
        </div>
    </footer>
    <!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="<?php echo e(asset('NiceAdmin/assets/vendor/apexcharts/apexcharts.min.js')); ?>"></script>
    <script src="<?php echo e(asset('NiceAdmin/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')); ?>"></script>
    <script src="<?php echo e(asset('NiceAdmin/assets/vendor/chart.js/chart.min.js')); ?>"></script>
    <script src="<?php echo e(asset('NiceAdmin/assets/vendor/echarts/echarts.min.js')); ?>"></script>
    <script src="<?php echo e(asset('NiceAdmin/assets/vendor/quill/quill.min.js')); ?>"></script>
    <script src="<?php echo e(asset('NiceAdmin/assets/vendor/simple-datatables/simple-datatables.js')); ?>"></script>
    <script src="<?php echo e(asset('NiceAdmin/assets/vendor/tinymce/tinymce.min.js')); ?>"></script>
    <script src="<?php echo e(asset('NiceAdmin/assets/vendor/php-email-form/validate.js')); ?>"></script>

    <!-- Template Main JS File -->
    <script src="<?php echo e(asset('NiceAdmin/assets/js/main.js')); ?>"></script>
    <script src="<?php echo e(asset('datatables/js/jquery-3.5.1.js')); ?>"></script>

    <!-- dataTables JS -->
    <script src="<?php echo e(asset('datatables/js/jquery.dataTables.min.js')); ?>"></script>
    <script src="<?php echo e(asset('datatables/js/dataTables.fixedColumns.min.js')); ?>"></script>
    <script src="<?php echo e(asset('datatables/js/dataTables.buttons.min.js')); ?>"></script>
    <script src="<?php echo e(asset('datatables/js/buttons.html5.min.js')); ?>"></script>
    <script src="<?php echo e(asset('datatables/js/jszip.min.js')); ?>"></script>

    <!-- Select2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js" defer></script>
    <?php echo $__env->yieldContent('script'); ?>
</body>

</html>
<?php /**PATH C:\laragon\www\elnusa-inventory\resources\views/layouts/template/app.blade.php ENDPATH**/ ?>