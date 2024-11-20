<?php $__env->startSection('content'); ?>
    <div class="pagetitle">
        <h1>Form Stok Barang Keluar</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>">Home</a></li>
                <li class="breadcrumb-item"><a href="<?php echo e(route('keluar.index')); ?>">Data Stok Barang Keluar</a></li>
                <li class="breadcrumb-item active">Tambah Data Stok Barang Keluar</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-6 col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Tambah Data Stok Keluar </h5>
                        <form class="row g-3" action="<?php echo e(route('keluar.cart')); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <div class="col-md-12">
                                <label class="form-label">Barang</label>
                                <select id="product" name="barang_id" class="form-control select2" required>
                                    <option value="" disabled selected>Pilih</option>
                                    <?php $__currentLoopData = $datas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($item->id); ?>">
                                            <?php echo e($item->code); ?> | <?php echo e($item->name); ?>

                                        </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <div class="col-md-12">
                                <label class="form-label">Nama Barang</label>
                                <select id="name" name="" class="form-control">
                                    <option value="" disabled>Pilih</option>
                                </select>
                            </div>
                            <div class="col-md-12">
                                <label class="form-label">Stok</label>
                                <select id="stock" name="" class="form-control">
                                    <option value="" disabled>Pilih</option>
                                </select>
                            </div>
                            <div class="col-md-12">
                                <label class="form-label">Jumlah</label>
                                <input type="number" class="form-control" name="qty" value="1" required>
                            </div>
                            <div class="col-md-12">
                                <label class="form-label">Keterangan</label>
                                <input type="text" class="form-control" name="remarks">
                            </div>

                            <div class="text-end">
                                <button type="submit" class="btn btn-outline-primary">Tambah</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">List Data Stok Barang Keluar</h5>
                        <div class="table-responsive">
                            <table id="table" class="table table table-hover" style="width:100%">
                                <thead>
                                    <tr>
                                        <th scope="col">Kode Barang</th>
                                        <th scope="col">Nama Barang</th>
                                        <th scope="col" class="text-center">Stok</th>
                                        <th scope="col" class="text-center">Jumlah</th>
                                        <th scope="col" class="text-center">Stok Aktual</th>
                                        <th scope="col">Keterangan</th>
                                        <th scope="col" class="text-center">#</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $carts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($item->barang->code); ?></td>
                                            <td><?php echo e($item->barang->name); ?></td>
                                            <td class="text-center"><?php echo e($item->barang->stock); ?></td>
                                            <td class="text-center"><?php echo e($item->qty); ?></td>
                                            <td class="text-center"><?php echo e($item->barang->stock - $item->qty); ?></td>
                                            <td><?php echo e($item->remarks); ?></td>

                                            <td class="text-center">
                                                <form action="<?php echo e(route('keluar.cart.delete', $item->id)); ?>" method="post">
                                                    <?php echo csrf_field(); ?>
                                                    <?php echo method_field('delete'); ?>
                                                    <a href="" class="btn btn-sm btn-outline-info"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#updateCart<?php echo e($item->id); ?>">
                                                        <i class="bi bi-pencil"></i>
                                                    </a>
                                                    <button type="submit" class="btn btn-sm btn-outline-secondary"
                                                        onclick="return confirm('Are you sure?')">
                                                        <i class="bi bi-trash"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                        <?php echo $__env->make('pages.stock.stockOut.cart.update', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-body">
                        <form class="row g-3" action="<?php echo e(route('keluar.add')); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <div class="col-md-12">
                                <label class="form-label">Pelanggan</label>
                                <select name="customer_id" class="form-control" required>
                                    <option value="" disabled selected>Pilih</option>
                                    <?php $__currentLoopData = $customers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($item->id); ?>">
                                            <?php echo e($item->name); ?>

                                        </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <div class="col-md-12">
                                <label class="form-label">ATTN</label>
                                <input type="text" class="form-control" name="attn">
                            </div>
                            <div class="col-md-12">
                                <label class="form-label">Via</label>
                                <input type="text" class="form-control" name="via">
                            </div>
                            <div class="col-md-12">
                                <label class="form-label">Pengirim</label>
                                <input type="text" class="form-control" name="carrier">
                            </div>
                            <div class="col-md-12">
                                <label class="form-label">Reff</label>
                                <input type="text" class="form-control" name="reff">
                            </div>
                            <div class="col-md-12">
                                <label class="form-label">Nomor Truck</label>
                                <input type="text" class="form-control" name="truck_no">
                            </div>
                            <div class="col-md-12">
                                <label class="form-label">Dikirim Oleh</label>
                                <input type="text" class="form-control" name="delivered_by">
                            </div>
                            <div class="col-md-12">
                                <label class="form-label">From</label>
                                <input type="text" class="form-control" name="from">
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-outline-primary">Simpan</button>
                                <a href="<?php echo e(route('keluar.index')); ?>" class="btn btn-outline-danger">Batal</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script>
        $('#product').on('change', function(e) {
            console.log(e);

            var id = e.target.value;

            $.get('<?php echo e(url('getJson')); ?>/' + id, function(data) {
                $('#name').empty();
                $.each(data, function(index, dataObj) {
                    $('#name').append('<option value="' + dataObj.name + '" selected>' +
                        dataObj
                        .name +
                        '</option> ');
                });

                $('#stock').empty();
                $.each(data, function(index, dataObj) {
                    $('#stock').append('<option value="' + dataObj.stock + '" selected>' +
                        dataObj
                        .stock +
                        '</option> ');
                });
            });
        });

        $(document).ready(function() {
            $('.select2').select2();
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.template.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\elnusa-inventory\resources\views/pages/stock/stockOut/add.blade.php ENDPATH**/ ?>