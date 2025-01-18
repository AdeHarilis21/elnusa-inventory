<?php $__env->startSection('content'); ?>
    <div class="pagetitle">
        <h1>Detail Penyesuaian Stok</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>">Home</a></li>
                <li class="breadcrumb-item"><a href="<?php echo e(route('penyesuaian.stok.index')); ?>">Data Penyesuaian Stok</a></li>
                <li class="breadcrumb-item active">Detail Data Penyesuaian Stok</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12 col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">
                            List Data Penyesuaian Stok
                            <a href="<?php echo e(route('penyesuaian.stok.index')); ?>"
                                class="btn btn-sm btn-outline-secondary m-2">Kembali</a>
                        </h5>
                        <div class="table-responsive">
                            <table id="table" class="table table table-hover" style="width:100%">
                                <thead>
                                    <tr>
                                        <th scope="col">Kode Barang</th>
                                        <th scope="col">Nama Barang</th>
                                        <th scope="col" class="text-center">Stok Awal</th>
                                        <th scope="col" class="text-center">Stok Aktual</th>
                                        <th scope="col">Keterangan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $data->detail; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($item->barang->code); ?></td>
                                            <td><?php echo e($item->barang->name); ?></td>
                                            <td class="text-center"><?php echo e($item->stock_existing); ?></td>
                                            <td class="text-center"><?php echo e($item->stock_actual); ?></td>
                                            <td><?php echo e($item->remark); ?></td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.template.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\elnusa-inventory\resources\views/pages/stock/adjustmentStock/detail.blade.php ENDPATH**/ ?>