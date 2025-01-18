<?php $__env->startSection('content'); ?>
    <div class="pagetitle">
        <h1>Detail <?php echo e($data->bill_no); ?></h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>">Home</a></li>
                <li class="breadcrumb-item"><a href="<?php echo e(route('report.index')); ?>"><?php echo e($data->bill_no); ?></a></li>
                <li class="breadcrumb-item active">Detail <?php echo e($data->bill_no); ?></li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <section class="section">
        <div class="row">
            <div class="col-lg-12 col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">
                            List Barang Keluar
                            <a href="<?php echo e(route('keluar.index')); ?>" class="btn btn-sm btn-outline-secondary m-2">Kembali</a>
                        </h5>

                        <!-- Table -->
                        <div class="table-responsive">
                            <table id="table-in" class="table table table table-hover" style="width:100%">
                                <thead>
                                    <tr>
                                        <th scope="col">Nota</th>
                                        <th scope="col">Kode Barang</th>
                                        <th scope="col">Nama Barang</th>
                                        <th scope="col">Customer</th>
                                        <th scope="col" class="text-center">Jumlah</th>
                                        <th scope="col">Keterangan</th>
                                        <th scope="col">Dibuat Oleh</th>
                                        <th scope="col">Tanggal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $data->detail; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($data->bill_no); ?></td>
                                            <td><?php echo e($item->barang ? $item->barang->code : 'null'); ?></td>
                                            <td><?php echo e($item->barang ? $item->barang->name : 'null'); ?></td>
                                            <td><?php echo e($data->customer->name); ?></td>
                                            <td class="text-center"><?php echo e($item->qty); ?></td>
                                            <td><?php echo e($item->remarks); ?></td>
                                            <td><?php echo e($item->user->name); ?></td>
                                            <td><?php echo e(carbon\Carbon::parse($item->date)->format('d-M-Y') ?? ''); ?></td>
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

<?php echo $__env->make('layouts.template.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\elnusa-inventory\resources\views/pages/stock/stockOut/detail.blade.php ENDPATH**/ ?>