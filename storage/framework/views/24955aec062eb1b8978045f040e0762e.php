<!DOCTYPE html>
<html>

<head>
    <title><?php echo e($data->do_number); ?></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <style>
        .page-break {
            page-break-after: always;
        }

        .button {
            transition-duration: 0.4s;
        }

        .button:hover {
            background-color: #04AA6D;
            /* Green */
            color: white;
        }

        @page {
            margin: 100px 25px;
        }

        header {
            position: fixed;
            top: -60px;
            left: 0px;
            right: 0px;
            background-color: lightblue;
            height: 50px;
        }

        footer {
            position: fixed;
            bottom: 160px;
            left: 0px;
            right: 0px;
            height: 50px;
        }

        p {
            page-break-after: always;
        }

        p:last-child {
            page-break-after: never;
        }
    </style>
</head>

<body>
    <button class="bi bi-print" class="button button-hover" color: white;" href="javascript:void(0);"
        onclick="printPageArea('print')">Print</button>

    <div id="print" class="page-break">
        <footer>
            <div class="mt-4">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col" class="text-center">PREPERED BY</th>
                            <th scope="col" class="text-center">APPROVED BY</th>
                            <th scope="col" class="text-center">USER PROJECT</th>
                            <th scope="col" class="text-center">RECEIVED BY</th>
                        </tr>
                    </thead>
                    <tbody style="height: 100px">
                        <tr style="height: 80px">
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                        <tr>
                            <th scope="col" class="text-center"><?php echo e($data->user->name); ?></th>
                            <th scope="col" class="text-center"></th>
                            <th scope="col" class="text-center"></th>
                            <th scope="col" class="text-center"></th>
                        </tr>
                    </tbody>
                </table>
            </div>
        </footer>
        <div class="row">
            <div class="col-6 p-4 ">
                <img src="<?php echo e(asset('img/logo-elnusa.png')); ?>" width="250" height="90">
            </div>
            <div class="col-6 p-4 text-right">
                <h6>
                    Jl. Mulawarman No.91, Batakan, <br>
                    Kecamatan Balikpapan Selatan, Kota Balikpapan, <br>
                    Kalimantan
                    Timur
                    76116
                </h6>
                <h5>
                    DELIVERY ORDER <br> <?php echo e($data->do_number); ?>

                </h5>
            </div>
        </div>
        <div class="mt-4">
            <h4 class="text-right">
                </h6>
        </div>
        <div class="row mt-4">
            <div class="col-12">
                <table class="table table-borderless">
                    <tr>
                        <td style="width: 150px;"><strong>FROM</strong></td>
                        <td>: <?php echo e($data->from); ?></td>
                        <td style="width: 150px;"><strong>VIA</strong></td>
                        <td>: <?php echo e($data->via); ?></td>
                    </tr>
                    <tr>
                        <td><strong>TO</strong></td>
                        <td>: <?php echo e($data->customer->name); ?></td>
                        <td><strong>Carrier</strong></td>
                        <td>: <?php echo e($data->carrier); ?></td>
                    </tr>
                    <tr>
                        <td><strong>Address</strong></td>
                        <td>: <?php echo e($data->customer->address); ?></td>
                        <td><strong>REFF</strong></td>
                        <td>: <?php echo e($data->reff); ?></td>
                    </tr>
                    <tr>
                        <td><strong>Date</strong></td>
                        <td>: <?php echo e($data->date); ?></td>
                        <td><strong>TRUCK NUM</strong></td>
                        <td>: <?php echo e($data->truck_no); ?></td>
                    </tr>
                    <tr>
                        <td><strong>ATTN</strong></td>
                        <td>: <?php echo e($data->attn); ?></td>
                        <td><strong>DELIVERED BY</strong></td>
                        <td>: <?php echo e($data->delivered_by); ?></td>
                    </tr>
                </table>
            </div>
        </div>

        <div class="mt-4">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col" class="text-center">NO</th>
                        <th scope="col" class="text-center">QTY</th>
                        <th scope="col">UoM</th>
                        <th scope="col">Kode Barang</th>
                        <th scope="col">Nama Barang</th>
                        <th scope="col">Remark</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $data->detail; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>

                            <td class="text-center"><?php echo e($key + 1); ?></td>
                            <td class="text-center"><?php echo e($item->qty); ?></td>
                            <td><?php echo e($item->barang->unit->name); ?></td>
                            <td><?php echo e($item->barang->code); ?></td>
                            <td><?php echo e($item->barang->name); ?></td>
                            <td><?php echo e($item->remarks); ?></td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </div>

    <script>
        function printPageArea(areaID) {
            var printContent = document.getElementById(areaID).innerHTML;
            var originalContent = document.body.innerHTML;
            document.body.innerHTML = printContent;
            window.print();
            document.body.innerHTML = originalContent;
        }
    </script>
</body>

</html>
<?php /**PATH C:\laragon\www\elnusa-inventory\resources\views/pdf/do.blade.php ENDPATH**/ ?>