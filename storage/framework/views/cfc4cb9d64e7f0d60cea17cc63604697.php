<?php $__env->startSection('content'); ?>
    <div class="pagetitle">
        <h1>Laporan Stok Kritis</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>">Home</a></li>
                <li class="breadcrumb-item active">Laporan Stok Kritis</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">
                    Laporan Stok Kritis
                </h5>

                <!-- Table -->
                <div class="table-responsive">
                    <table id="table" class="table table-borderless display nowrap" style="width:100%">
                        <thead>
                            <tr>
                                <th scope="col">Kode</th>
                                <th scope="col">Nama</th>
                                <th scope="col" class="text-center">Stok Aktual</th>
                                <th scope="col" class="text-center">Minimal Stok</th>
                                <th scope="col" class="text-center">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $datas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($item->code); ?></td>
                                    <td><?php echo e($item->name); ?></td>
                                    <td class="text-center"><?php echo e($item->stock); ?></td>
                                    <td class="text-center"><?php echo e($item->minimal_stock); ?></td>
                                    <td class="text-center">
                                        <?php if($item->stock == $item->minimal_stock): ?>
                                            <span class="badge bg-warning text-dark">
                                                <i class="bi bi-exclamation-triangle me-1"></i> Stok Menipis
                                            </span>
                                        <?php elseif($item->stock <= 0): ?>
                                            <span class="badge bg-danger text-dark">
                                                <i class="bi bi-exclamation-triangle me-1"></i> Stok Habis
                                            </span>
                                        <?php else: ?>
                                            <span class="badge bg-danger">
                                                <i class="bi bi-exclamation-octagon me-1"></i> Stok Menipis
                                            </span>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
                <!-- End Table -->
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script src="<?php echo e(asset('datatables/js/dataTables.fixedHeader.min.js')); ?>"></script>

    <script>
        $('#table thead tr')
            .clone(true)
            .addClass('filters')
            .appendTo('#table thead');

        $(document).ready(function() {
            var table = $('#table').DataTable({
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

<?php echo $__env->make('layouts.template.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\elnusa-inventory\resources\views/pages/stock/criticalStock/index.blade.php ENDPATH**/ ?>