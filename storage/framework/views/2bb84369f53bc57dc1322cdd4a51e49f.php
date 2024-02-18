

<?php $__env->startSection('content'); ?>
<?php if(auth()->check() && auth()->user()->id == 2): ?>
    <div class="bg-dark container">
        <h2>Comment List</h2>

        <ul>
            <?php $__currentLoopData = $comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li>
                <div>
                <img class="rounded-circle shadow-1-strong me-3"
                src="http://127.0.0.1:8000/<?php echo e($comment->user->img); ?>" alt="avatar" width="60" height="60" />
                <h6 class="fw-bold text-primary mb-1"><?php echo e($comment->user->name); ?></h6>
                <?php echo e($comment->content); ?>

                </div>
                    <form method="post" onsubmit="return confirmDelete()" action="<?php echo e(route('comments.destroy', $comment->id)); ?>" style="display: inline;">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </li>
                <br>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
    <?php else: ?>
            <p>Access denied.</p>
<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\student\Desktop\projekt_Kordalski_20192\resources\views/comments/index.blade.php ENDPATH**/ ?>