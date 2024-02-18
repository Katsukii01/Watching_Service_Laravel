

<?php $__env->startSection('content'); ?>
    <?php if(auth()->check() && auth()->user()->id == 2): ?>
    <div class="container">
        <h2>Edit Anime</h2>

        <form method="post" action="<?php echo e(route('anime.update', $anime->id)); ?>" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>

            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" name="name" value="<?php echo e($anime->name); ?>" required>
            </div>

            <div class="form-group">
                <label for="description">Description:</label>
                <textarea class="form-control" id="description" name="description" rows="4" required><?php echo e($anime->description); ?></textarea>
            </div>

            <div class="form-group">
                <label for="link">Link:</label>
                <input type="text" class="form-control" id="link" name="link" value="<?php echo e($anime->link); ?>" required>
            </div>

            <div class="form-group">
                <label for="previmg">Preview Image:</label>
                <input type="file" class="form-control" id="previmg" name="previmg" accept="image/*">
            </div>

            <div class="form-group">
                <label for="likes">Likes:</label>
                <input type="number" class="form-control" id="likes" name="likes" value="<?php echo e($anime->likes); ?>" required>
            </div>

            <div class="form-group">
                <label for="dislikes">Dislikes:</label>
                <input type="number" class="form-control" id="dislikes" name="dislikes" value="<?php echo e($anime->dislikes); ?>" required>
            </div>
            <br>
            <button type="submit" class="btn btn-warning">Update Anime</button>
        </form>
        <br>
        <a class="btn btn-primary" href="/anime/create">go back</a>
        <?php else: ?>
            <p>Access denied.</p>
        <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Na nowy dysk\semestr5\aplikacje\projekt\projekt_Kordalski_20192\resources\views/anime/edit.blade.php ENDPATH**/ ?>