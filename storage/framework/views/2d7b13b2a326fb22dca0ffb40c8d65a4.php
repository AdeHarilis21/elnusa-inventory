<?php $__env->startSection('content'); ?>
    <div class="pagetitle">
        <h1>Form Satuan</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>">Home</a></li>
                <li class="breadcrumb-item"><a href="<?php echo e(route('satuan.index')); ?>">Data Satuan</a></li>
                <li class="breadcrumb-item active"><?php echo e($data != null ? 'Ubah Data Satuan' : 'Tambah Data Satuan'); ?></li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title"><?php echo e($data != null ? 'Ubah Data Satuan' : 'Tambah Data Satuan'); ?></h5>

                <!-- Form -->
                <form class="row g-3" action="<?php echo e($data ? route('satuan.update', $data->id) : route('satuan.add')); ?>"
                    method="POST">
                    <?php echo csrf_field(); ?>
                    <div class="col-md-12">
                        <label class="form-label">Nama</label>
                        <input type="text" class="form-control" name="name" value="<?php echo e($data->name ?? ''); ?>" required>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-outline-primary">Simpan</button>
                        <button type="reset" class="btn btn-outline-secondary">Reset</button>
                        <a href="<?php echo e(route('satuan.index')); ?>" class="btn btn-outline-danger">Batal</a>
                    </div>
                </form>
                <!-- End Form -->
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.template.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\elnusa-inventory\resources\views/pages/atributBarang/unit/form.blade.php ENDPATH**/ ?>