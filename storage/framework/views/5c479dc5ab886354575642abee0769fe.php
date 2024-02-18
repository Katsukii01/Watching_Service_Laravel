

<?php $__env->startSection('content'); ?>
<div class="container">
    <h2>Anime User Records</h2>
        <ul>
            <?php $__currentLoopData = $anime->animeUsers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $animeUser): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li>
                    User ID: <?php echo e($animeUser->user_id); ?>

                    Anime ID: <?php echo e($animeUser->anime_id); ?>

                    Watched: <?php echo e($animeUser->watched ? 'Yes' : 'No'); ?>

                </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Na nowy dysk\semestr5\aplikacje\projekt\projekt_Kordalski_20192\resources\views/test.blade.php ENDPATH**/ ?>