<div class="modal fade" id="updateCart<?php echo e($item->id); ?>" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Ubah Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?php echo e(route('keluar.cart.update', $item->id)); ?>" method="post">
                <?php echo csrf_field(); ?>
                <div class="modal-body">
                    <div class="col-md-12">
                        <label class="form-label">Jumlah</label>
                        <input type="number" class="form-control" name="qty" value="<?php echo e($item->qty); ?>">
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
<?php /**PATH C:\laragon\www\elnusa-inventory\resources\views/pages/stock/stockOut/cart/update.blade.php ENDPATH**/ ?>