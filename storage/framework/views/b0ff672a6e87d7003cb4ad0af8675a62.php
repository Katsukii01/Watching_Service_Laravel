<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><?php echo e(__('Profile')); ?></div>

                <div class="card-body">
                    <?php if(session('status')): ?>
                        <div class="alert alert-success" role="alert">
                            <?php echo e(session('status')); ?>

                        </div>
                    <?php endif; ?>
                    <img class="img-fluid rounded-circle mb-2" src="<?php echo e(url(Auth::user()->img)); ?>" style="width: 120px; height: 120px">
                    <p class="h1">
                                        <?php echo e(Auth::user()->name); ?>

                    </p>
                    <hr>
                    <a class="nav-link h2"  href="/watched">
                        Watched list
                    </a>
                    <hr>
                    <a class="nav-link h2"  href="/pfpchange">
                        Change profile picture
                    </a>
                    <a class="nav-link h2"  href="/namechange">
                        Change name 
                    </a>
                    <a class="nav-link h2"  href="/passchange">
                        Change password
                    </a>
                    <hr>
                    <a style="color:red" class="nav-link h2"  href="/deleteaccount">
                        Delete account
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Na nowy dysk\semestr5\aplikacje\projekt\projekt_Kordalski_20192\resources\views/home.blade.php ENDPATH**/ ?>