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

    
    <div class="page-header">
        <div class="page-header-left">
            <h1 class="page-title">Laporan Transaksi</h1>
            <p class="page-subtitle">Ringkasan seluruh transaksi penjualan</p>
        </div>
    </div>

    
    <div class="stagger" style="display:grid;grid-template-columns:repeat(auto-fit,minmax(220px,1fr));gap:16px;margin-bottom:24px;">
        <div class="stat-card">
            <div class="stat-card-icon" style="background:rgba(91,110,245,.12);color:var(--accent);">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10h14V4h-3.5zM2 5h12v8H2V5z"/>
                </svg>
            </div>
            <div class="stat-card-body">
                <div class="stat-card-value"><?php echo e($total_sell); ?></div>
                <div class="stat-card-label">Total Produk Terjual</div>
            </div>
        </div>
        <div class="stat-card">
            <div class="stat-card-icon" style="background:rgba(16,185,129,.12);color:var(--success);">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M4 10.781c.148 1.667 1.513 2.85 3.591 3.003V15h1.043v-1.216c2.27-.179 3.678-1.438 3.678-3.3 0-1.59-.947-2.51-2.956-3.028l-.722-.187V3.467c1.122.11 1.879.714 2.07 1.616h1.47c-.166-1.6-1.54-2.748-3.54-2.875V1H7.591v1.233c-1.939.23-3.27 1.472-3.27 3.156 0 1.454.966 2.483 2.661 2.917l.61.162v4.031c-1.149-.17-1.94-.8-2.131-1.718H4zm3.391-3.836c-1.043-.263-1.6-.825-1.6-1.616 0-.944.704-1.641 1.8-1.828v3.495l-.2-.05zm1.591 1.872c1.287.323 1.852.859 1.852 1.769 0 1.097-.826 1.828-2.2 1.939V8.73l.348.086z"/>
                </svg>
            </div>
            <div class="stat-card-body">
                <div class="stat-card-value">Rp <?php echo e(number_format($total_sell_price, 0, ',', '.')); ?></div>
                <div class="stat-card-label">Total Harga Jual</div>
            </div>
        </div>
        <div class="stat-card">
            <div class="stat-card-icon" style="background:rgba(245,158,11,.12);color:#f59e0b;">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4zm2-1a1 1 0 0 0-1 1v1h14V4a1 1 0 0 0-1-1H2zm13 4H1v5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V7z"/>
                </svg>
            </div>
            <div class="stat-card-body">
                <div class="stat-card-value">Rp <?php echo e(number_format($total_buy_price, 0, ',', '.')); ?></div>
                <div class="stat-card-label">Total Harga Beli</div>
            </div>
        </div>
        <div class="stat-card">
            <div class="stat-card-icon" style="background:rgba(16,185,129,.12);color:var(--success);">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                    <path d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z"/>
                </svg>
            </div>
            <div class="stat-card-body">
                <div class="stat-card-value" style="color:var(--success);">Rp <?php echo e(number_format($totalBenefit, 0, ',', '.')); ?></div>
                <div class="stat-card-label">Keuntungan Bersih</div>
            </div>
        </div>
    </div>

    
    <div class="card">
        <div class="card-header">
            <div class="card-header-icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M14 2H2a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2zM1 5.5h14v7A1 1 0 0 1 14 13H2a1 1 0 0 1-1-1V5.5zm13-2.5v1.5H2V3h12z"/>
                </svg>
            </div>
            <span class="card-header-title">Detail Transaksi</span>
        </div>
        <div class="card-body" style="overflow-x:auto;">
            <table id="report-table" class="display responsive nowrap" style="width:100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>No Transaksi</th>
                        <th>Nama Produk</th>
                        <th>Kategori</th>
                        <th>Harga Jual</th>
                        <th>Harga Beli</th>
                        <th>Qty</th>
                        <th>User</th>
                        <th>Tanggal</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $transactions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tran): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><span style="font-family:monospace;font-size:12px;color:var(--text-muted);"><?php echo e(sprintf("B%04d", $tran->id)); ?></span></td>
                        <td><span style="font-family:monospace;font-size:12px;color:var(--text-muted);"><?php echo e(sprintf("T%04d", $tran->product->id)); ?></span></td>
                        <td><strong><?php echo e($tran->product->name); ?></strong></td>
                        <td><?php echo e($tran->product->category->name); ?></td>
                        <td>Rp <?php echo e(number_format($tran->product->sell_price, 0, ',', '.')); ?></td>
                        <td>Rp <?php echo e(number_format($tran->product->buy_price, 0, ',', '.')); ?></td>
                        <td style="font-weight:600;"><?php echo e($tran->count); ?></td>
                        <td><?php echo e($tran->user->name); ?></td>
                        <td style="font-size:12px;color:var(--text-muted);"><?php echo e($tran->created_at); ?></td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </div>

</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection("extra_scripts"); ?>
<script src="/libs/jszip.min.js"></script>
<script src="/libs/dataTables.buttons.min.js"></script>
<script src="/libs/buttons.html5.min.js"></script>
<script src="/libs/buttons.print.min.js"></script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection("script"); ?>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        new DataTable("#report-table", {
            responsive: true,
            pageLength: 25,
            layout: {
                topStart: { buttons: ['excel', 'print'] }
            }
        });
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make("home", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\DOWNLOAD\john-bag-shop-master\john-bag-shop-master\resources\views/report/index.blade.php ENDPATH**/ ?>