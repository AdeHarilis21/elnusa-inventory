<?php $__env->startSection('content'); ?>
    <div class="pagetitle">
        <h1>Form Supplier</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>">Home</a></li>
                <li class="breadcrumb-item"><a href="<?php echo e(route('supplier.index')); ?>">Data Supplier</a></li>
                <li class="breadcrumb-item active"><?php echo e($data != null ? 'Ubah Data Supplier' : 'Tambah Data Supplier'); ?></li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title"><?php echo e($data != null ? 'Ubah Data Supplier' : 'Tambah Data Supplier'); ?></h5>

                <!-- Form -->
                <form class="row g-3" action="<?php echo e($data ? route('supplier.update', $data->id) : route('supplier.add')); ?>"
                    method="POST">
                    <?php echo csrf_field(); ?>
                    <div class="col-md-6">
                        <label class="form-label">Kode</label>
                        <input type="text" class="form-control" name="code" value="<?php echo e($data->code ?? ''); ?>" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Nama</label>
                        <input type="text" class="form-control" name="name" value="<?php echo e($data->name ?? ''); ?>" required>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Tanggal Daftar</label>
                        <input type="date" class="form-control" name="register_date"
                            value="<?php echo e($data->register_date ?? ''); ?>" required>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Alamat</label>
                        <input type="text" class="form-control" name="address" value="<?php echo e($data->address ?? ''); ?>"
                            required>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Nomor HP/Telp</label>
                        <input type="text" class="form-control" name="telp" value="<?php echo e($data->telp ?? ''); ?>" required>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-outline-primary">Simpan</button>
                        <button type="reset" class="btn btn-outline-secondary">Reset</button>
                        <a href="<?php echo e(route('supplier.index')); ?>" class="btn btn-outline-danger">Batal</a>
                    </div>
                </form>
                <!-- End Form -->
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.template.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\elnusa-inventory\resources\views/pages/masterData/supplier/form.blade.php ENDPATH**/ ?>