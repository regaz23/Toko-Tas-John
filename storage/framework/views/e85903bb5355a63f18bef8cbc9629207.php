<?php $__env->startSection("content"); ?>
<div class="app-wrapper">

    
    <div id="sidebar">

        
        <div class="sidebar-brand">
            <img src="<?php echo e(asset('/logo.png')); ?>" alt="logo">
            <span class="sidebar-brand-name">John Bag Shop</span>
        </div>

        
        <div class="sidebar-user">
            <div class="sidebar-user-avatar">
                <?php echo e(strtoupper(substr($user_info->name, 0, 1))); ?>

            </div>
            <div class="sidebar-user-info">
                <div class="sidebar-user-name"><?php echo e($user_info->name); ?></div>
                <div class="sidebar-user-role"><?php echo e($user_info->role_id == 1 ? 'Admin' : 'Karyawan'); ?></div>
            </div>
        </div>

        
        <nav class="sidebar-nav">

            <span class="sidebar-section-label">Menu Utama</span>

            <a class="nav-item <?php echo e(explode('.', Route::currentRouteName())[0] == 'dashboard' ? 'active-navbar' : ''); ?>"
               href="/">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4.5a.5.5 0 0 0 .5-.5v-4h2v4a.5.5 0 0 0 .5.5H14a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146z"/>
                </svg>
                Dashboard
            </a>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check("admin")): ?>
            <a href="/category"
               class="nav-item <?php echo e(explode('.', Route::currentRouteName())[0] == 'category' ? 'active-navbar' : ''); ?>">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M4.5 2A1.5 1.5 0 0 0 3 3.5v9A1.5 1.5 0 0 0 4.5 14h7a1.5 1.5 0 0 0 1.5-1.5v-7l-4-4H4.5zm0 1H9v3.5a.5.5 0 0 0 .5.5H13v5.5a.5.5 0 0 1-.5.5h-7a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5z"/>
                </svg>
                Kategori
            </a>
            <?php endif; ?>

            <a href="/product"
               class="nav-item <?php echo e(explode('.', Route::currentRouteName())[0] == 'product' ? 'active-navbar' : ''); ?>">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l1.25 5h8.22l1.25-5H3.14zM5 13a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z"/>
                </svg>
                Produk
            </a>

            
            <div>
                <div class="nav-item <?php echo e(explode('.', Route::currentRouteName())[0] == 'transaction' ? 'active-navbar' : ''); ?>"
                     onclick="toggleTransactionMenu()" id="transaction-toggle">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                        <path d="M0 3.5A1.5 1.5 0 0 1 1.5 2h9A1.5 1.5 0 0 1 12 3.5V5h1.02a1.5 1.5 0 0 1 1.17.563l1.481 1.85a1.5 1.5 0 0 1 .329.938V10.5a1.5 1.5 0 0 1-1.5 1.5H14a2 2 0 1 1-4 0H5a2 2 0 1 1-3.998-.085A1.5 1.5 0 0 1 0 10.5v-7zm1.294 7.456A2 2 0 0 1 4.732 11h5.536a2 2 0 0 1 .732-.732V3.5a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5v7a.5.5 0 0 0 .294.456zM12 10a2 2 0 0 1 1.732 1h.768a.5.5 0 0 0 .5-.5V8.35a.5.5 0 0 0-.11-.312l-1.48-1.85A.5.5 0 0 0 13.02 6H12v4zm-9 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm9 1a1 1 0 1 0 2 0 1 1 0 0 0-2 0z"/>
                    </svg>
                    Transaksi
                    <svg id="transaction-chevron" xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor" viewBox="0 0 16 16" style="margin-left:auto;transition:transform .2s">
                        <path d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"/>
                    </svg>
                </div>
                <div id="transaction-menu" class="nav-submenu hidden" style="overflow:hidden">
                    <a href="/transaction/sales" class="nav-item">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" viewBox="0 0 16 16">
                            <path d="M11.354 6.354a.5.5 0 0 1 .707-.707l2 2a.5.5 0 0 1 0 .707l-2 2a.5.5 0 0 1-.707-.707L12.793 8.5H5.5a.5.5 0 0 1 0-1h7.293l-1.44-1.146z"/>
                            <path d="M3.5 3.5A1.5 1.5 0 0 1 5 2h6a1.5 1.5 0 0 1 1.5 1.5V5h-1V3.5A.5.5 0 0 0 11 3H5a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h6a.5.5 0 0 0 .5-.5V11h1v1.5A1.5 1.5 0 0 1 11 14H5a1.5 1.5 0 0 1-1.5-1.5v-9z"/>
                        </svg>
                        Penjualan
                    </a>
                    <a href="/transaction/purchase" class="nav-item">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" viewBox="0 0 16 16">
                            <path d="M8.354 11.354a.5.5 0 0 1-.708 0L5.5 9.207V12.5a.5.5 0 0 1-1 0V9.207L2.354 11.354a.5.5 0 1 1-.708-.708l3-3a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708z"/>
                            <path d="M3.5 6A1.5 1.5 0 0 0 2 7.5v1A1.5 1.5 0 0 0 3.5 10h1v-1h-1a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1v1h1A1.5 1.5 0 0 0 14 8.5v-1A1.5 1.5 0 0 0 12.5 6h-9z"/>
                        </svg>
                        Pembelian
                    </a>
                </div>
            </div>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check("admin")): ?>
            <span class="sidebar-section-label">Laporan & Pengaturan</span>

            <a href="/report"
               class="nav-item <?php echo e(explode('.', Route::currentRouteName())[0] == 'report' ? 'active-navbar' : ''); ?>">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M14 2H2a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2zm0 10H2V4h12v8z"/>
                    <path d="M4 8h1v4H4zm2-3h1v7H6zm2 2h1v5H8zm2-1h1v6h-1z"/>
                </svg>
                Laporan
            </a>

            <a href="/setting"
               class="nav-item <?php echo e(explode('.', Route::currentRouteName())[0] == 'setting' ? 'active-navbar' : ''); ?>">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M8 4.754a3.246 3.246 0 1 0 0 6.492 3.246 3.246 0 0 0 0-6.492zM5.754 8a2.246 2.246 0 1 1 4.492 0 2.246 2.246 0 0 1-4.492 0z"/>
                    <path d="M9.796 1.343c-.527-1.79-3.065-1.79-3.592 0l-.094.319a.873.873 0 0 1-1.255.52l-.292-.16c-1.64-.892-3.433.902-2.54 2.541l.159.292a.873.873 0 0 1-.52 1.255l-.319.094c-1.79.527-1.79 3.065 0 3.592l.319.094a.873.873 0 0 1 .52 1.255l-.16.292c-.892 1.64.901 3.434 2.541 2.54l.292-.159a.873.873 0 0 1 1.255.52l.094.319c.527 1.79 3.065 1.79 3.592 0l.094-.319a.873.873 0 0 1 1.255-.52l.292.16c1.64.893 3.434-.902 2.54-2.541l-.159-.292a.873.873 0 0 1 .52-1.255l.319-.094c1.79-.527 1.79-3.065 0-3.592l-.319-.094a.873.873 0 0 1-.52-1.255l.16-.292c.893-1.64-.902-3.433-2.541-2.54l-.292.159a.873.873 0 0 1-1.255-.52l-.094-.319zm-2.633.283c.246-.835 1.428-.835 1.674 0l.094.319a1.873 1.873 0 0 0 2.693 1.115l.291-.16c.764-.415 1.6.42 1.184 1.185l-.159.292a1.873 1.873 0 0 0 1.116 2.692l.318.094c.835.246.835 1.428 0 1.674l-.319.094a1.873 1.873 0 0 0-1.115 2.693l.16.291c.415.764-.42 1.6-1.185 1.184l-.291-.159a1.873 1.873 0 0 0-2.693 1.116l-.094.318c-.246.835-1.428.835-1.674 0l-.094-.319a1.873 1.873 0 0 0-2.692-1.115l-.292.16c-.764.415-1.6-.42-1.184-1.185l.159-.291A1.873 1.873 0 0 0 1.945 8.93l-.319-.094c-.835-.246-.835-1.428 0-1.674l.319-.094A1.873 1.873 0 0 0 3.06 4.377l-.16-.292c-.415-.764.42-1.6 1.185-1.184l.292.159a1.873 1.873 0 0 0 2.692-1.115l.094-.319z"/>
                </svg>
                Setting
            </a>
            <?php endif; ?>

        </nav>

        
        <div class="sidebar-bottom">
            <a href="/auth/logout" class="sidebar-logout">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z"/>
                    <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/>
                </svg>
                Logout
            </a>
        </div>

    </div>

    
    <div class="main-content">

        
        <div class="topbar">
            <div class="topbar-left">
                <div class="topbar-menu-btn" id="open-sidebar">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>
                    </svg>
                </div>
                <span class="topbar-title"><?php echo e($web_title); ?></span>
                <span class="topbar-badge"><?php echo e($user_info->role_id == 1 ? 'Admin' : 'Karyawan'); ?></span>
            </div>
            <div class="topbar-right">
                <a href="/auth/logout" class="topbar-logout-btn">
                    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="currentColor" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z"/>
                        <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/>
                    </svg>
                    Logout
                </a>
            </div>
        </div>

        
        <div class="page-content animate-fade">
            <?php echo $__env->yieldContent("home_content"); ?>
        </div>

    </div>

    
    <div id="sidebar-overlay" style="display:none;position:fixed;inset:0;background:rgba(0,0,0,.5);z-index:99;" onclick="closeSidebar()"></div>

</div>

<script>
    function toggleTransactionMenu() {
        const menu = document.getElementById('transaction-menu');
        const chevron = document.getElementById('transaction-chevron');
        menu.classList.toggle('hidden');
        chevron.style.transform = menu.classList.contains('hidden') ? '' : 'rotate(180deg)';
    }

    function closeSidebar() {
        document.getElementById('sidebar').classList.remove('active-sidebar');
        document.getElementById('sidebar-overlay').style.display = 'none';
    }

    document.getElementById('open-sidebar').addEventListener('click', () => {
        document.getElementById('sidebar').classList.add('active-sidebar');
        document.getElementById('sidebar-overlay').style.display = 'block';
    });

    // Auto-open submenu if active
    const currentPath = window.location.pathname;
    if (currentPath.startsWith('/transaction')) {
        document.getElementById('transaction-menu').classList.remove('hidden');
        document.getElementById('transaction-chevron').style.transform = 'rotate(180deg)';
    }
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\DOWNLOAD\john-bag-shop-master\john-bag-shop-master\resources\views/home.blade.php ENDPATH**/ ?>