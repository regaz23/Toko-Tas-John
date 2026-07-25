<?php $__env->startSection("home_content"); ?>
<div class="stagger" style="display:grid;grid-template-columns:repeat(auto-fill,minmax(240px,1fr));gap:16px;">

    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check("admin")): ?>
    <div class="stat-card">
        <div class="stat-card-icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 16 16">
                <path d="M4.5 2A1.5 1.5 0 0 0 3 3.5v9A1.5 1.5 0 0 0 4.5 14h7a1.5 1.5 0 0 0 1.5-1.5v-7l-4-4H4.5zm0 1H9v3.5a.5.5 0 0 0 .5.5H13v5.5a.5.5 0 0 1-.5.5h-7a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5z"/>
            </svg>
        </div>
        <div class="stat-card-body">
            <div class="stat-card-value"><?php echo e($category_count); ?></div>
            <div class="stat-card-label">Kategori</div>
            <div class="stat-card-sub">Total kategori produk</div>
        </div>
    </div>
    <?php endif; ?>

    <div class="stat-card">
        <div class="stat-card-icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 16 16">
                <path d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l1.25 5h8.22l1.25-5H3.14zM5 13a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z"/>
            </svg>
        </div>
        <div class="stat-card-body">
            <div class="stat-card-value"><?php echo e($product_count); ?></div>
            <div class="stat-card-label">Produk</div>
            <div class="stat-card-sub">Total produk tersedia</div>
        </div>
    </div>

    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check("admin")): ?>
    <div class="stat-card">
        <div class="stat-card-icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 16 16">
                <path d="M14 2H2a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2zm0 10H2V4h12v8z"/>
                <path d="M4 8h1v4H4zm2-3h1v7H6zm2 2h1v5H8zm2-1h1v6h-1z"/>
            </svg>
        </div>
        <div class="stat-card-body">
            <div class="stat-card-value"><?php echo e($report_count); ?></div>
            <div class="stat-card-label">Laporan</div>
            <div class="stat-card-sub">Total laporan tercatat</div>
        </div>
    </div>
    <?php endif; ?>

</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make("home", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\DOWNLOAD\john-bag-shop-master\john-bag-shop-master\resources\views/dashboard.blade.php ENDPATH**/ ?>