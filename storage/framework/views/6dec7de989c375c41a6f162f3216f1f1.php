<?php $__env->startSection('content'); ?>
    <div class="pagetitle">
        <h1>Form Barang</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>">Home</a></li>
                <li class="breadcrumb-item"><a href="<?php echo e(route('barang.index')); ?>">Data Barang</a></li>
                <li class="breadcrumb-item active"><?php echo e($data != null ? 'Ubah Data Barang' : 'Tambah Data Barang'); ?></li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title"><?php echo e($data != null ? 'Ubah Data Barang' : 'Tambah Data Barang'); ?></h5>

                <!-- Form -->
                <form class="row g-3" action="<?php echo e($data ? route('barang.update', $data->id) : route('barang.add')); ?>"
                    method="POST">
                    <?php echo csrf_field(); ?>
                    <div class="col-md-4">
                        <label class="form-label">Kode</label>
                        <input type="text" class="form-control" name="code" value="<?php echo e($data->code ?? ''); ?>" required>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Nomor Material</label>
                        <input type="text" class="form-control" name="material_no" value="<?php echo e($data->material_no ?? ''); ?>"
                            required>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Nama</label>
                        <input type="text" class="form-control" name="name" value="<?php echo e($data->name ?? ''); ?>" required>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Stok</label>
                        <input type="number" class="form-control" name="stock" value="<?php echo e($data->stock ?? ''); ?>"
                            <?php echo e($data ? 'disabled' : 'required'); ?>>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Satuan</label>
                        <select name="unit_id" class="form-control" required>
                            <?php if($data): ?>
                                <option value="<?php echo e($data->unit_id); ?>" selected><?php echo e($data->unit->name); ?></option>
                            <?php else: ?>
                                <option value="" disabled selected>Pilih</option>
                            <?php endif; ?>
                            <?php $__currentLoopData = $unit; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($item->id); ?>"><?php echo e($item->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Stok Minimal</label>
                        <input type="number" class="form-control" name="minimal_stock"
                            value="<?php echo e($data->minimal_stock ?? 1); ?>" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Proyek</label>
                        <select name="project_id" class="form-control" required>
                            <?php if($data): ?>
                                <option value="<?php echo e($data->project_id); ?>" selected><?php echo e($data->project->name); ?></option>
                            <?php else: ?>
                                <option value="" disabled selected>Pilih</option>
                            <?php endif; ?>
                            <?php $__currentLoopData = $project; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($item->id); ?>"><?php echo e($item->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Merek</label>
                        <select name="brand_id" class="form-control" required>
                            <?php if($data): ?>
                                <option value="<?php echo e($data->brand_id); ?>" selected><?php echo e($data->brand->name); ?></option>
                            <?php else: ?>
                                <option value="" disabled selected>Pilih</option>
                            <?php endif; ?>
                            <?php $__currentLoopData = $brand; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($item->id); ?>"><?php echo e($item->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>

                    <h5 class="card-title">Form Tambahan</h5>

                    <!-- Additional Form Accordion -->
                    <div class="accordion" id="accordionExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    Form Tambahan
                                </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <div class="col-md-12">
                                        <label class="form-label">Nomor PO</label>
                                        <input type="text" class="form-control" name="po_number"
                                            value="<?php echo e($data->po_number ?? ''); ?>">
                                    </div>
                                    <div class="col-md-12">
                                        <label class="form-label">Lokasi</label>
                                        <input type="text" class="form-control" name="location"
                                            value="<?php echo e($data->location ?? ''); ?>">
                                    </div>
                                    <div class="col-md-12">
                                        <label class="form-label">Tanggal Kadaluarsa</label>
                                        <input type="date" class="form-control" name="exp_date"
                                            value="<?php echo e($data->exp_date ?? ''); ?>">
                                    </div>
                                    <div class="col-md-12">
                                        <label class="form-label">Keterangan</label>
                                        <input type="text" class="form-control" name="remark"
                                            value="<?php echo e($data->remark ?? ''); ?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- End Additional Form Accordion -->

                    <div class="text-center">
                        <button type="submit" class="btn btn-outline-primary">Simpan</button>
                        <button type="reset" class="btn btn-outline-secondary">Reset</button>
                        <a href="<?php echo e(route('barang.index')); ?>" class="btn btn-outline-danger">Batal</a>
                    </div>
                </form>
                <!-- End Form -->
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.template.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\elnusa-inventory\resources\views/pages/barang/form.blade.php ENDPATH**/ ?>