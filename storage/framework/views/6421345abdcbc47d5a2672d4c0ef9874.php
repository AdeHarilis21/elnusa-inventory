<?php $__env->startSection('content'); ?>
    <div class="pagetitle">
        <h1>Data Barang</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>">Home</a></li>
                <li class="breadcrumb-item active">Data Barang</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">
                    Daftar Barang
                    <?php if(Auth::user()->roles_label[0] == 'SuperAdmin'): ?>
                        <a href="<?php echo e(route('barang.create')); ?>" class="btn btn-sm btn-outline-success">
                            <i class="bi bi-pencil"></i> Tambah
                        </a>
                    <?php endif; ?>
                </h5>

                <!-- Table -->
                <div class="table-responsive">
                    <table id="table" class="table table-borderless display nowrap" style="width:100%">
                        <thead>
                            <tr>
                                <th scope="col" class="text-center">#</th>
                                <th scope="col">Kode</th>
                                <th scope="col">Nomor Material</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Proyek</th>
                                <th scope="col">Stok</th>
                                <th scope="col">Satuan</th>
                                <th scope="col">Merek</th>
                                <th scope="col">Stok Minimal</th>
                                <th scope="col">Nomor PO</th>
                                <th scope="col">Lokasi</th>
                                <th scope="col">Tanggal kadaluarsa</th>
                                <th scope="col">Keterangan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $datas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td class="text-center">
                                        <?php if(Auth::user()->roles_label[0] == 'SuperAdmin'): ?>
                                            <form action="<?php echo e(route('barang.destroy', $item->id)); ?>" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus barang ini?')">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('DELETE'); ?>
                                                <a href="<?php echo e(route('barang.edit', $item->id)); ?>" class="btn btn-sm btn-outline-info">
                                                    <i class="bi bi-pencil"></i>
                                                </a>
                                                <button type="submit" class="btn btn-sm btn-outline-danger">
                                                    <i class="bi bi-trash"></i> Hapus
                                                </button>
                                            </form>
                                        <?php endif; ?>
                                    </td>
                                    <td><?php echo e($item->code); ?></td>
                                    <td><?php echo e($item->material_no); ?></td>
                                    <td><?php echo e($item->name); ?></td>
                                    <td><?php echo e($item->project->name); ?></td>
                                    <td><?php echo e($item->stock); ?></td>
                                    <td><?php echo e($item->unit->name); ?></td>
                                    <td><?php echo e($item->brand ? $item->brand->name : '-'); ?></td>
                                    <td><?php echo e($item->minimal_stock); ?></td>
                                    <td><?php echo e($item->po_number); ?></td>
                                    <td><?php echo e($item->location); ?></td>
                                    <td><?php echo e($item->exp_date); ?></td>
                                    <td><?php echo e($item->remark); ?></td>
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

<?php echo $__env->make('layouts.template.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\elnusa-inventory\resources\views/pages/barang/index.blade.php ENDPATH**/ ?>