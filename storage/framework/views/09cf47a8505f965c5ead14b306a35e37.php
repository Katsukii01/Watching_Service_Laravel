

<?php $__env->startSection('content'); ?>
    <div class="container">
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
            <button type="submit" class="btn btn-primary">Add Anime</button>
            </form>
        <?php else: ?>
            <p>Access denied.</p>
        <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Na nowy dysk\semestr5\aplikacje\projekt\projekt_Kordalski_20192\resources\views/create.blade.php ENDPATH**/ ?>