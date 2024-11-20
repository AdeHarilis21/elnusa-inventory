<?php $__env->startSection('content'); ?>
    <div class="pagetitle">
        <h1>Form Pengguna</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>">Home</a></li>
                <li class="breadcrumb-item"><a href="<?php echo e(route('user.index')); ?>">Data Pengguna</a></li>
                <li class="breadcrumb-item active"><?php echo e($data != null ? 'Ubah Data Pengguna' : 'Tambah Data Pengguna'); ?></li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title"><?php echo e($data != null ? 'Ubah Data Pengguna' : 'Tambah Data Pengguna'); ?></h5>

                <!-- Form -->
                <form class="row g-3" action="<?php echo e($data ? route('user.update', $data->id) : route('user.add')); ?>"
                    method="POST">
                    <?php echo csrf_field(); ?>
                    <div class="col-md-6">
                        <label class="form-label">Nama</label>
                        <input type="text" class="form-control" name="name" value="<?php echo e($data->name ?? ''); ?>" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" value="<?php echo e($data->email ?? ''); ?>" required>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Username</label>
                        <input type="text" class="form-control" name="username" value="<?php echo e($data->username ?? ''); ?>"
                            required>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Password</label>
                        <input type="password" class="form-control" name="password" <?php echo e($data == [] ? 'required' : ''); ?>>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Role</label>
                        <select name="role" class="form-control">
                            <option value="" disabled selected>Pilih</option>
                            <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($item->id); ?>"><?php echo e($item->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    
                    <div class="text-center">
                        <button type="submit" class="btn btn-outline-primary">Simpan</button>
                        <button type="reset" class="btn btn-outline-secondary">Reset</button>
                        <a href="<?php echo e(route('user.index')); ?>" class="btn btn-outline-danger">Batal</a>
                    </div>
                </form>
                <!-- End Form -->
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.template.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\elnusa-inventory\resources\views/pages/user/form.blade.php ENDPATH**/ ?>