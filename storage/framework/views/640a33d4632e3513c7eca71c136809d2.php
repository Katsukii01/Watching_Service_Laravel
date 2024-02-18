

<?php $__env->startSection('content'); ?>
    <div class="bg-dark container">
    <?php if(auth()->check() && auth()->user()->id == 2): ?>
        <h2>Comment List</h2>

            <?php $__currentLoopData = $comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="row align-items-center ">
            <div class="col-2">
                <img class="rounded-circle shadow-1-strong me-3"
                src="http://127.0.0.1:8000/<?php echo e($comment->user->img); ?>" alt="avatar" width="60" height="60" />
            </div>
            <div class="col-2">
                <h6 class="fw-bold text-primary mb-1"><?php echo e($comment->user->name); ?></h6>
            </div>
            <div class="col-2">
                   <?php echo e($comment->created_at->format('Y-m-d H:i')); ?>

            </div>  
            <div class="col-4">
                <div class="overflow-auto" style="word-wrap: break-word; max-height: 100px;"> 
                <?php echo e($comment->content); ?>

                </div>
            </div>

            <div class="col-2">
                    <form method="post" onsubmit="return confirmDelete()" action="<?php echo e(route('comment.destroy', $comment->id)); ?>" style="display: inline;">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
            </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php else: ?>
            <p>Access denied.</p>
<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Na nowy dysk\semestr5\aplikacje\projekt\projekt_Kordalski_20192\resources\views/comments/index.blade.php ENDPATH**/ ?>