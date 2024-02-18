

<?php $__env->startSection('content'); ?>
    <div class="bg-dark container">
    <?php if(auth()->check() && auth()->user()->id == 2): ?>
        <h2>Edit User</h2>

        <!-- Formularz edycji użytkownika -->
        <form method="post" action="<?php echo e(route('users.update', $user->id)); ?>" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PATCH'); ?>
            <div class="mb-3">
                <label for="name" class="form-label">Name:</label>
                <input type="text" class="form-control" id="name" name="name" value="<?php echo e($user->name); ?>" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" class="form-control" id="email" name="email" value="<?php echo e($user->email); ?>" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password (leave blank to keep current password):</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
            <div class="mb-3">
                <label for="photo" class="form-label">Avatar:</label>
                <input type="file" class="form-control" id="photo" name="photo" accept="image/*">
            </div>
            <!-- Dodaj inne pola edycji użytkownika według potrzeb -->
            <br>
            <button type="submit" class="btn btn-warning">Update User</button>
        </form>
        <br>
        <a class="btn btn-primary" href="/users">go back</a>
        <?php else: ?>
            <p>Access denied.</p>
        <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Na nowy dysk\semestr5\aplikacje\projekt\projekt_Kordalski_20192\resources\views/users/edit.blade.php ENDPATH**/ ?>