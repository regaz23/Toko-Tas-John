<?php $__env->startSection("content"); ?>
<div class="login-page">
    <div class="login-card">

        
        <div class="login-logo">
            <img src="<?php echo e(asset('/logo.png')); ?>" alt="John Bag Shop Logo">
            <div class="login-logo-name">John Bag Shop</div>
            <div class="login-logo-sub">Sistem Manajemen Toko</div>
        </div>

        <p class="login-form-title">Masuk ke akun Anda</p>

        <form action="/auth/signin" method="POST">
            <?php echo csrf_field(); ?>

            <div class="form-group">
                <label class="form-label" for="email">Email</label>
                <input
                    type="text"
                    id="email"
                    name="email"
                    class="form-control"
                    placeholder="Masukkan email..."
                    value="<?php echo e(old('email')); ?>"
                    autocomplete="email"
                />
                <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <p class="form-error"><?php echo e($message); ?></p>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <div class="form-group">
                <label class="form-label" for="password">Password</label>
                <input
                    type="password"
                    id="password"
                    name="password"
                    class="form-control"
                    placeholder="Masukkan password..."
                    autocomplete="current-password"
                />
                <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <p class="form-error"><?php echo e($message); ?></p>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <button type="submit" id="submit" class="login-btn">
                Masuk
            </button>
        </form>

    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\DOWNLOAD\john-bag-shop-master\john-bag-shop-master\resources\views/auth/login.blade.php ENDPATH**/ ?>