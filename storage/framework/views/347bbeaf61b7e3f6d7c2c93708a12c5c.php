<?php $__env->startSection('content'); ?>
    <div class="pagetitle">
        <h1>Data Stok Keluar</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>">Home</a></li>
                <li class="breadcrumb-item active">Data Stok Keluar</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">
                    Daftar Stok Keluar
                    <?php if(Auth::user()->roles_label[0] != 'Manager'): ?>
                        <a href="<?php echo e(route('keluar.create')); ?>" class="btn btn-sm btn-outline-success">
                            <i class="bi bi-pencil"></i> Tambah
                        </a>
                    <?php endif; ?>
                </h5>

                <form class="row g-3 mb-4" action="<?php echo e(route('keluar.index')); ?>" method="GET">
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
                        <a href="<?php echo e(route('keluar.index')); ?>" class="btn btn-secondary">Reset Filter</a>
                    </div>
                </form>

                <?php if(is_null(app('request')->input('startDate'))): ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="bi bi-collection me-1"></i>
                        Data yang ditampilkan tanpa filter, adalah data yang di tambahkan dari tanggal
                        <?php echo e(Carbon\Carbon::now()->startOfMonth()->format('d-M-Y')); ?> s/d
                        <?php echo e(Carbon\Carbon::now()->format('d-M-Y')); ?>

                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif; ?>

                <!-- Table -->
                <div class="table-responsive">
                    <table id="table" class="table table-borderless display nowrap" style="width:100%">
                        <thead>
                            <tr>
                                <th scope="col" class="text-center">#</th>
                                <th scope="col">Nomor Nota</th>
                                <th scope="col">Nomor DO</th>
                                <th scope="col">Pelanggan</th>
                                <th scope="col">Tanggal</th>
                                <th scope="col">Dibuat Oleh</th>
                                <th scope="col">ATTN</th>
                                <th scope="col">Via</th>
                                <th scope="col">Carrier</th>
                                <th scope="col">Reff</th>
                                <th scope="col">Nomor Truck</th>
                                <th scope="col">Dikirim Oleh</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $datas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td class="text-center">
                                        <form action="<?php echo e(route('keluar.delete', $item->id)); ?>" method="post">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('delete'); ?>
                                            <a href="<?php echo e(route('keluar.detail', $item->id)); ?>"
                                                class="btn
                                                btn-sm btn-outline-primary">
                                                <i class="bi bi-eye"></i>
                                            </a>
                                            <a href="<?php echo e(route('keluar.getPdf', $item->id)); ?>"
                                                class="btn btn-sm btn-outline-info" target="_balnk">
                                                <i class="bi bi-download"></i>
                                            </a>
                                            <?php if(Auth::user()->roles_label[0] == 'SuperAdmin'): ?>
                                                <button type="submit" onclick="return confirm('Are you sure?')"
                                                    class="btn btn-sm btn-outline-secondary">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                            <?php endif; ?>
                                        </form>
                                    </td>
                                    <td><?php echo e($item->bill_no); ?></td>
                                    <td><?php echo e($item->do_number); ?></td>
                                    <td><?php echo e($item->customer->name); ?></td>
                                    <td><?php echo e(carbon\Carbon::parse($item->date)->format('d-M-Y') ?? ''); ?></td>
                                    <td><?php echo e($item->user->name); ?></td>
                                    <td><?php echo e($item->attn); ?></td>
                                    <td><?php echo e($item->via); ?></td>
                                    <td><?php echo e($item->carrier); ?></td>
                                    <td><?php echo e($item->reff); ?></td>
                                    <td><?php echo e($item->truck_no); ?></td>
                                    <td><?php echo e($item->delivered_by); ?></td>
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

<?php echo $__env->make('layouts.template.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\elnusa-inventory\resources\views/pages/stock/stockOut/index.blade.php ENDPATH**/ ?>