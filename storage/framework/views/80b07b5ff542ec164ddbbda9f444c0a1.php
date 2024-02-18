

<?php $__env->startSection('content'); ?>
    <div class="container bg-dark">
        <h2>Add New Anime</h2>

        <?php if(auth()->check() && auth()->user()->id == 2): ?>
            <form method="post" action="<?php echo e(route('anime.store')); ?>" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="description">Description:</label>
                <textarea class="form-control" id="description" name="description" rows="4" required></textarea>
            </div>
            <div class="form-group">
                <label for="link">Link:</label>
                <input type="text" class="form-control" id="link" name="link" required>
            </div>
            <div class="form-group">
                <label for="previmg">Preview Image:</label>
                <input type="file" class="form-control" id="previmg" name="previmg" accept="image/*" required>
            </div>
            <div class="form-group">
                <label for="likes">Likes:</label>
                <input type="number" class="form-control" id="likes" name="likes" required>
            </div>
            <div class="form-group">
                <label for="dislikes">Dislikes:</label>
                <input type="number" class="form-control" id="dislikes" name="dislikes" required>
            </div>
            </p>
            <button type="submit" class="btn btn-primary">Add Anime</button>
            </form>
        <hr>
        <div class="container bg-dark">
        <h2>Anime List</h2>

        <ul>
            <?php $__currentLoopData = $anime; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $a): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li>
                    <?php echo e($a->name); ?>

                    <a href="<?php echo e(route('anime.edit', $a->id)); ?>" class="btn btn-warning">Edit</a>
                    <form method="post" onsubmit="return confirmDelete()" action="<?php echo e(route('anime.destroy', $a->id)); ?>" style="display: inline;">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </li>
                </p>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
        <?php else: ?>
            <p>Access denied.</p>
        <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\student\Desktop\projekt_Kordalski_20192\resources\views/anime/create.blade.php ENDPATH**/ ?>