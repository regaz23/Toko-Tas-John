<?php $__env->startSection("home_content"); ?>
<div class="animate-fade-up">

    
    <?php if(session('success')): ?>
    <div class="alert alert-success">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
        </svg>
        <span><strong>Berhasil!</strong> <?php echo e(session('success')); ?></span>
    </div>
    <?php endif; ?>

    <?php if(session('error')): ?>
    <div class="alert alert-error">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z"/>
        </svg>
        <span><strong>Error!</strong> <?php echo e(session('error')); ?></span>
    </div>
    <?php endif; ?>

    
    <div class="page-header">
        <div class="page-header-left">
            <h1 class="page-title">Data Produk</h1>
            <p class="page-subtitle">Kelola seluruh data produk toko</p>
        </div>
        <a href="/product/create" class="btn btn-primary">
            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" viewBox="0 0 16 16">
                <path d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2z"/>
            </svg>
            Tambah Produk
        </a>
    </div>

    
    <div class="card">
        <div class="card-header">
            <div class="card-header-icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5z"/>
                </svg>
            </div>
            <span class="card-header-title">Daftar Produk</span>
        </div>
        <div class="card-body" style="overflow-x:auto;">
            <table id="myTable" class="display responsive nowrap" style="width:100%">
                <thead>
                    <tr>
                        <th>No Produk</th>
                        <th>Nama Produk</th>
                        <th>Kategori</th>
                        <th>Stock</th>
                        <th>Pengguna</th>
                        <th>Harga Beli</th>
                        <th>Harga Jual</th>
                        <th>Dibuat</th>
                        <th>Diubah</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pro): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><span style="font-family:monospace;font-size:12px;color:var(--text-muted);"><?php echo e(sprintf("B%04d", $pro->id)); ?></span></td>
                        <td><strong><?php echo e($pro->name); ?></strong></td>
                        <td><?php echo e($pro->category->name); ?></td>
                        <td>
                            <span style="font-weight:600;color:<?php echo e($pro->stock < 5 ? 'var(--danger)' : 'var(--success)'); ?>">
                                <?php echo e($pro->stock); ?>

                            </span>
                        </td>
                        <td><?php echo e($pro->user->name); ?></td>
                        <td>Rp <?php echo e(number_format($pro->buy_price, 0, ',', '.')); ?></td>
                        <td>Rp <?php echo e(number_format($pro->sell_price, 0, ',', '.')); ?></td>
                        <td style="font-size:12px;color:var(--text-muted);"><?php echo e($pro->created_at); ?></td>
                        <td style="font-size:12px;color:var(--text-muted);"><?php echo e($pro->updated_at); ?></td>
                        <td>
                            <?php if($current_user->role_id == 1 || $pro->user->id == $current_user->id): ?>
                            <div style="display:flex;gap:6px;flex-wrap:nowrap;">
                                <a href="/product/edit/<?php echo e($pro->id); ?>" class="btn btn-warning btn-sm">Edit</a>
                                <button class="btn btn-danger btn-sm" onclick="confirmDelete('/product/destroy/<?php echo e($pro->id); ?>')">Hapus</button>
                            </div>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </div>

</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make("home", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\DOWNLOAD\john-bag-shop-master\john-bag-shop-master\resources\views/product/index.blade.php ENDPATH**/ ?>