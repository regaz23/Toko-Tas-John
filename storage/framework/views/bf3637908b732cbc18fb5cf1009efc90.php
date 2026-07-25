<?php $__env->startSection("home_content"); ?>
<div class="animate-fade-up" style="max-width: 640px;">

    <div class="page-header">
        <div class="page-header-left">
            <h1 class="page-title"><?php echo e(isset($product) ? 'Edit Produk' : 'Tambah Produk'); ?></h1>
            <p class="page-subtitle"><?php echo e(isset($product) ? 'Perbarui informasi produk' : 'Isi data produk baru'); ?></p>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <div class="card-header-icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5z"/>
                </svg>
            </div>
            <span class="card-header-title"><?php echo e(isset($product) ? 'Form Edit Produk' : 'Form Produk Baru'); ?></span>
        </div>

        <div class="card-body">
            <form action="/product/<?php echo e(isset($product) ? 'update/' . $product->id : 'store'); ?>" method="POST">
                <?php echo csrf_field(); ?>

                <div class="form-group">
                    <label class="form-label" for="name">Nama Produk</label>
                    <input
                        type="text"
                        id="name"
                        name="name"
                        class="form-control"
                        placeholder="Masukkan nama produk..."
                        value="<?php echo e(isset($product) ? $product->name : old('name')); ?>"
                        required
                    />
                    <?php if($errors->has('name')): ?>
                    <p class="form-error"><?php echo e($errors->first('name')); ?></p>
                    <?php endif; ?>
                </div>

                <div class="form-group">
                    <label class="form-label" for="category_id">Kategori</label>
                    <select id="category_id" name="category_id" class="form-control">
                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($cat->id); ?>" <?php echo e(isset($product) && $product->category_id == $cat->id ? 'selected' : ''); ?>>
                            <?php echo e($cat->name); ?>

                        </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                    <?php if($errors->has('category_id')): ?>
                    <p class="form-error"><?php echo e($errors->first('category_id')); ?></p>
                    <?php endif; ?>
                </div>

                <div style="display:grid;grid-template-columns:1fr 1fr;gap:16px;">
                    <div class="form-group">
                        <label class="form-label" for="buy_price">Harga Beli (Rp)</label>
                        <input
                            type="number"
                            id="buy_price"
                            name="buy_price"
                            class="form-control"
                            placeholder="0"
                            value="<?php echo e(isset($product) ? $product->buy_price : old('buy_price')); ?>"
                            required
                        />
                        <?php if($errors->has('buy_price')): ?>
                        <p class="form-error"><?php echo e($errors->first('buy_price')); ?></p>
                        <?php endif; ?>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="sell_price">Harga Jual (Rp)</label>
                        <input
                            type="number"
                            id="sell_price"
                            name="sell_price"
                            class="form-control"
                            placeholder="0"
                            value="<?php echo e(isset($product) ? $product->sell_price : old('sell_price')); ?>"
                            required
                        />
                        <?php if($errors->has('sell_price')): ?>
                        <p class="form-error"><?php echo e($errors->first('sell_price')); ?></p>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="form-actions">
                    <button type="button" onclick="history.back()" class="btn btn-ghost">Batal</button>
                    <button type="submit" class="btn <?php echo e(isset($product) ? 'btn-warning' : 'btn-primary'); ?>">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" viewBox="0 0 16 16">
                            <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z"/>
                        </svg>
                        <?php echo e(isset($product) ? 'Simpan Perubahan' : 'Tambah Produk'); ?>

                    </button>
                </div>

            </form>
        </div>
    </div>

</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make("home", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\DOWNLOAD\john-bag-shop-master\john-bag-shop-master\resources\views/product/form.blade.php ENDPATH**/ ?>