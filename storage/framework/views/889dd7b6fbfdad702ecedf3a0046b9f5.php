<?php $__env->startSection('content'); ?>
    <?php
        use App\Models\Barang;
        use App\Models\Stock\StockInDetail;
        use App\Models\Stock\StockOutDetail;
        use App\Models\Stock\AdjustmentDetailStock;

        $products = Barang::all();

        $stockIns = StockInDetail::whereBetween('date', [
            Carbon\Carbon::now()->startOfMonth(),
            Carbon\Carbon::now(),
        ])->get();

        $stockOuts = StockOutDetail::whereBetween('date', [
            Carbon\Carbon::now()->startOfMonth(),
            Carbon\Carbon::now(),
        ])->get();

        $adjustments = AdjustmentDetailStock::whereBetween('date', [
            Carbon\Carbon::now()->startOfMonth(),
            Carbon\Carbon::now(),
        ])->get();

        $criticalStocks = Barang::whereColumn('stock', '<=', 'minimal_stock')->get();
    ?>
    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </nav>
    </div>
    <!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">

            <!-- Left side columns -->
            <div class="col-lg-12">
                <div class="row">

                    <!-- Product -->
                    <div class="col-xxl-6 col-md-6">
                        <div class="card info-card sales-card">

                            <div class="card-body">
                                <h5 class="card-title">Total Stok Kritis <span>|
                                        Periode : <?php echo e(Carbon\Carbon::now()->startOfMonth()->format('d-M-Y')); ?> s/d
                                        <?php echo e(Carbon\Carbon::now()->format('d-M-Y')); ?></span></h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-exclamation-triangle"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6><?php echo e($criticalStocks->count()); ?></h6>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div><!-- End Product -->

                    <!-- Adjustment -->
                    <div class="col-xxl-6 col-md-6">
                        <div class="card info-card revenue-card">

                            <div class="card-body">
                                <h5 class="card-title">Total Penyesuaian Stok <span>|
                                        Periode : <?php echo e(Carbon\Carbon::now()->startOfMonth()->format('d-M-Y')); ?> s/d
                                        <?php echo e(Carbon\Carbon::now()->format('d-M-Y')); ?></span></h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-arrow-left-right"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6><?php echo e($adjustments->count()); ?></h6>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div><!-- End Adjustment -->

                    <!-- Stock In -->
                    <div class="col-xxl-6 col-xl-12">

                        <div class="card info-card customers-card">

                            <div class="card-body">
                                <h5 class="card-title">Barang Masuk <span>|
                                        Periode : <?php echo e(Carbon\Carbon::now()->startOfMonth()->format('d-M-Y')); ?> s/d
                                        <?php echo e(Carbon\Carbon::now()->format('d-M-Y')); ?></span></h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-arrow-return-right"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6><?php echo e($stockIns->count()); ?></h6>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div><!-- End Stock In -->

                    <!-- Stock Out -->
                    <div class="col-xxl-6 col-xl-12">

                        <div class="card info-card customers-card">

                            <div class="card-body">
                                <h5 class="card-title">Barang Keluar <span>|
                                        Periode : <?php echo e(Carbon\Carbon::now()->startOfMonth()->format('d-M-Y')); ?> s/d
                                        <?php echo e(Carbon\Carbon::now()->format('d-M-Y')); ?></span></h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-arrow-return-left"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6><?php echo e($stockOuts->count()); ?></h6>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div><!-- End Stock Out -->

                    <!-- Report -->
                    <div class="col-12">
                        <div class="card recent-sales overflow-auto">

                            <div class="card-body">
                                <h5 class="card-title">Stok Kritis <span>| <?php echo e($products->count()); ?> barang</span></h5>

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
                                            <?php $__currentLoopData = $criticalStocks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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

                            </div>

                        </div>
                    </div><!-- End Report -->

                </div>
            </div><!-- End Left side columns -->
        </div>
    </section>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script src="<?php echo e(asset('datatables/js/dataTables.fixedHeader.min.js')); ?>"></script>

    <script>
        $(document).ready(function() {
            var table = $('#table').DataTable({
                scrollX: false,
                dom: 'Bfrtip',
                buttons: [
                    'excel'
                ],
                pageLength: 20,
                paging: true,
            });
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.template.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\elnusa-inventory\resources\views/dashboard.blade.php ENDPATH**/ ?>