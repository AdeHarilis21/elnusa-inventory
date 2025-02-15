<?php $__env->startSection('content'); ?>
    <div class="pagetitle">
        <h1>Detail Laporan Stok</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>">Home</a></li>
                <li class="breadcrumb-item"><a href="<?php echo e(route('report.index')); ?>">Laporan Stok</a></li>
                <li class="breadcrumb-item active">Detail Laporan Stok</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <section class="section">
        <div class="row">
            <div class="col-lg-12 col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"></h5>
                        <form class="row g-3 mb-4" action="<?php echo e(route('report.detail', $data->id)); ?>" method="GET">
                            <div class="col-6">
                                <label class="form-label">Tanggal Awal</label>
                                <input type="date" class="form-control" name="startDate"
                                    value="<?php echo e(app('request')->input('startDate')); ?>" required>
                            </div>
                            <div class="col-6">
                                <label class="form-label">Tanggal Akhir</label>
                                <input type="date" class="form-control" name="endDate"
                                    value="<?php echo e(app('request')->input('endDate')); ?>" required>
                            </div>
                            <div class="text-left">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <a href="<?php echo e(route('report.detail', $data->id)); ?>" class="btn btn-secondary">Reset Filter</a>
                            </div>
                        </form>

                        <?php if(is_null(app('request')->input('startDate'))): ?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <i class="bi bi-collection me-1"></i>
                                Data yang ditampilkan tanpa filter, adalah data yang di tambahkan dari tanggal
                                <?php echo e(Carbon\Carbon::now()->startOfMonth()->format('d-M-Y')); ?> s/d
                                <?php echo e(Carbon\Carbon::now()->format('d-M-Y')); ?>

                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">
                            Laporan Penyesuaian Stok
                        </h5>

                        <!-- Table -->
                        <div class="table-responsive">
                            <table id="table-adjustment" class="table table table table-hover" style="width:100%">
                                <thead>
                                    <tr>
                                        <th scope="col">Nota</th>
                                        <th scope="col">Stok Awal</th>
                                        <th scope="col" class="text-center">Stok Aktual</th>
                                        <th scope="col">Keterangan</th>
                                        <th scope="col">Dibuat Oleh</th>
                                        <th scope="col">Tanggal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $adjustments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($item->adjustment->bill_no); ?></td>
                                            <td class="text-center"><?php echo e($item->stock_existing); ?></td>
                                            <td class="text-center"><?php echo e($item->stock_actual); ?></td>
                                            <td><?php echo e($item->remark); ?></td>
                                            <td><?php echo e($item->user->name); ?></td>
                                            <td><?php echo e($item->date); ?></td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- End Table -->
                    </div>
                </div>
            </div>
            <div class="col-lg-12 col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">
                            Laporan Stock Masuk
                        </h5>

                        <!-- Table -->
                        <div class="table-responsive">
                            <table id="table-in" class="table table table table-hover" style="width:100%">
                                <thead>
                                    <tr>
                                        <th scope="col">Nota</th>
                                        <th scope="col">Nomor PO</th>
                                        <th scope="col">Supplier</th>
                                        <th scope="col" class="text-center">Jumlah</th>
                                        <th scope="col">Keterangan</th>
                                        <th scope="col">Dibuat Oleh</th>
                                        <th scope="col">Tanggal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $stockIns; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($item->stock->bill_no); ?></td>
                                            <td><?php echo e($item->po_number); ?></td>
                                            <td><?php echo e($item->stock->supplier->name); ?></td>
                                            <td class="text-center"><?php echo e($item->qty); ?></td>
                                            <td><?php echo e($item->remarks); ?></td>
                                            <td><?php echo e($item->user->name); ?></td>
                                            <td><?php echo e($item->date); ?></td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- End Table -->
                    </div>
                </div>
            </div>
            <div class="col-lg-12 col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">
                            Laporan Stock Keluar
                        </h5>

                        <!-- Table -->
                        <div class="table-responsive">
                            <table id="table-out" class="table table table table-hover" style="width:100%">
                                <thead>
                                    <tr>
                                        <th scope="col">Nota</th>
                                        <th scope="col">Nomor DO</th>
                                        <th scope="col">Pelanggan</th>
                                        <th scope="col" class="text-center">Jumlah</th>
                                        <th scope="col">Keterangan</th>
                                        <th scope="col">Dibuat Oleh</th>
                                        <th scope="col">Tanggal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $stockOuts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($item->stock->bill_no); ?></td>
                                            <td><?php echo e($item->stock->do_number); ?></td>
                                            <td><?php echo e($item->stock->customer->name); ?></td>
                                            <td class="text-center"><?php echo e($item->qty); ?></td>
                                            <td><?php echo e($item->remarks); ?></td>
                                            <td><?php echo e($item->user->name); ?></td>
                                            <td><?php echo e($item->date); ?></td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- End Table -->
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script src="<?php echo e(asset('datatables/js/dataTables.fixedHeader.min.js')); ?>"></script>

    <script>
        $('#table-adjustment thead tr')
            .clone(true)
            .addClass('filters')
            .appendTo('#table thead');

        $('#table-in thead tr')
            .clone(true)
            .addClass('filters')
            .appendTo('#table thead');

        $('#table-out thead tr')
            .clone(true)
            .addClass('filters')
            .appendTo('#table thead');

        $(document).ready(function() {
            var table = $('#table-adjustment').DataTable({
                scrollX: false,
                dom: 'Bfrtip',
                buttons: [
                    'excel'
                ],
                pageLength: 20,
                paging: true,
                orderCellsTop: true,
                initComplete: function() {
                    var api = this.api();

                    // For each column
                    api
                        .columns()
                        .eq(0)
                        .each(function(colIdx) {
                            // Set the header cell to contain the input element
                            var cell = $('.filters th').eq(
                                $(api.column(colIdx).header()).index()
                            );
                            var title = $(cell).text();
                            $(cell).html('<input type="text" placeholder="' + title + '" />');

                            // On every keypress in this input
                            $(
                                    'input',
                                    $('.filters th').eq($(api.column(colIdx).header()).index())
                                )
                                .off('keyup change')
                                .on('change', function(e) {
                                    // Get the search value
                                    $(this).attr('title', $(this).val());
                                    var regexr =
                                        '({search})'; //$(this).parents('th').find('select').val();

                                    var cursorPosition = this.selectionStart;
                                    // Search the column for that value
                                    api
                                        .column(colIdx)
                                        .search(
                                            this.value != '' ?
                                            regexr.replace('{search}', '(((' + this.value +
                                                ')))') :
                                            '',
                                            this.value != '',
                                            this.value == ''
                                        )
                                        .draw();
                                })
                                .on('keyup', function(e) {
                                    e.stopPropagation();

                                    $(this).trigger('change');
                                    $(this)
                                        .focus()[0]
                                        .setSelectionRange(cursorPosition, cursorPosition);
                                });
                        });
                },
            });
        });

        $(document).ready(function() {
            var table = $('#table-in').DataTable({
                scrollX: false,
                dom: 'Bfrtip',
                buttons: [
                    'excel'
                ],
                pageLength: 20,
                paging: true,
                orderCellsTop: true,
                initComplete: function() {
                    var api = this.api();

                    // For each column
                    api
                        .columns()
                        .eq(0)
                        .each(function(colIdx) {
                            // Set the header cell to contain the input element
                            var cell = $('.filters th').eq(
                                $(api.column(colIdx).header()).index()
                            );
                            var title = $(cell).text();
                            $(cell).html('<input type="text" placeholder="' + title + '" />');

                            // On every keypress in this input
                            $(
                                    'input',
                                    $('.filters th').eq($(api.column(colIdx).header()).index())
                                )
                                .off('keyup change')
                                .on('change', function(e) {
                                    // Get the search value
                                    $(this).attr('title', $(this).val());
                                    var regexr =
                                        '({search})'; //$(this).parents('th').find('select').val();

                                    var cursorPosition = this.selectionStart;
                                    // Search the column for that value
                                    api
                                        .column(colIdx)
                                        .search(
                                            this.value != '' ?
                                            regexr.replace('{search}', '(((' + this.value +
                                                ')))') :
                                            '',
                                            this.value != '',
                                            this.value == ''
                                        )
                                        .draw();
                                })
                                .on('keyup', function(e) {
                                    e.stopPropagation();

                                    $(this).trigger('change');
                                    $(this)
                                        .focus()[0]
                                        .setSelectionRange(cursorPosition, cursorPosition);
                                });
                        });
                },
            });
        });

        $(document).ready(function() {
            var table = $('#table-out').DataTable({
                scrollX: false,
                dom: 'Bfrtip',
                buttons: [
                    'excel'
                ],
                pageLength: 20,
                paging: true,
                orderCellsTop: true,
                initComplete: function() {
                    var api = this.api();

                    // For each column
                    api
                        .columns()
                        .eq(0)
                        .each(function(colIdx) {
                            // Set the header cell to contain the input element
                            var cell = $('.filters th').eq(
                                $(api.column(colIdx).header()).index()
                            );
                            var title = $(cell).text();
                            $(cell).html('<input type="text" placeholder="' + title + '" />');

                            // On every keypress in this input
                            $(
                                    'input',
                                    $('.filters th').eq($(api.column(colIdx).header()).index())
                                )
                                .off('keyup change')
                                .on('change', function(e) {
                                    // Get the search value
                                    $(this).attr('title', $(this).val());
                                    var regexr =
                                        '({search})'; //$(this).parents('th').find('select').val();

                                    var cursorPosition = this.selectionStart;
                                    // Search the column for that value
                                    api
                                        .column(colIdx)
                                        .search(
                                            this.value != '' ?
                                            regexr.replace('{search}', '(((' + this.value +
                                                ')))') :
                                            '',
                                            this.value != '',
                                            this.value == ''
                                        )
                                        .draw();
                                })
                                .on('keyup', function(e) {
                                    e.stopPropagation();

                                    $(this).trigger('change');
                                    $(this)
                                        .focus()[0]
                                        .setSelectionRange(cursorPosition, cursorPosition);
                                });
                        });
                },
            });
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.template.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\elnusa-inventory\resources\views/pages/stock/report/detail.blade.php ENDPATH**/ ?>