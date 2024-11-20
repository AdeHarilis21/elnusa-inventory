<div class="modal fade" id="updateCart<?php echo e($item->id); ?>" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Ubah Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?php echo e(route('penyesuaian.stok.cart.update', $item->id)); ?>" method="post">
                <?php echo csrf_field(); ?>
                <div class="modal-body">
                    <div class="col-md-12">
                        <label class="form-label">Stok Aktual</label>
                        <input type="number" class="form-control" name="stock_actual"
                            value="<?php echo e($item->stock_actual); ?>">
                    </div>
                    <div class="col-md-12">
                        <label class="form-label">Keterangan</label>
                        <input type="text" class="form-control" name="remark" value="<?php echo e($item->remark); ?>">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php /**PATH C:\laragon\www\elnusa-inventory\resources\views/pages/stock/adjustmentStock/cart/update.blade.php ENDPATH**/ ?>