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
            <h1 class="page-title">Data Kategori</h1>
            <p class="page-subtitle">Kelola kategori produk toko</p>
        </div>
        <a href="/category/create" class="btn btn-primary">
            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" viewBox="0 0 16 16">
                <path d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2z"/>
            </svg>
            Tambah Kategori
        </a>
    </div>

    
    <div class="card">
        <div class="card-header">
            <div class="card-header-icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M4.5 2A1.5 1.5 0 0 0 3 3.5v9A1.5 1.5 0 0 0 4.5 14h7a1.5 1.5 0 0 0 1.5-1.5v-7l-4-4H4.5zm0 1H9v3.5a.5.5 0 0 0 .5.5H13v5.5a.5.5 0 0 1-.5.5h-7a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5z"/>
                </svg>
            </div>
            <span class="card-header-title">Daftar Kategori</span>
        </div>
        <div class="card-body" style="overflow-x:auto;">
            <table id="myTable" class="display responsive nowrap" style="width:100%">
                <thead>
                    <tr>
                        <th style="text-align: center; width: 10%;">No Kategori</th>
                        <th>Nama Kategori</th>
                        <th>Dibuat</th>
                        <th>Diubah</th>
                        <th style="text-align: center;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td style="text-align: center;"><span style="font-family:monospace;font-size:12px;color:var(--text-muted);"><?php echo e(sprintf("K%04d", $cat->id)); ?></span></td>
                        <td><strong><?php echo e($cat->name); ?></strong></td>
                        <td style="font-size:12px;color:var(--text-muted);"><?php echo e($cat->created_at); ?></td>
                        <td style="font-size:12px;color:var(--text-muted);"><?php echo e($cat->updated_at); ?></td>
                        <td style="text-align: center;">
                            <div style="display:flex;gap:6px;justify-content:center;">
                                <a href="/category/edit/<?php echo e($cat->id); ?>" class="btn btn-warning btn-sm">Edit</a>
                                <button class="btn btn-danger btn-sm" onclick="confirmDelete('/category/destroy/<?php echo e($cat->id); ?>')">Hapus</button>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </div>

</div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make("home", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\DOWNLOAD\john-bag-shop-master\john-bag-shop-master\resources\views/category/index.blade.php ENDPATH**/ ?>