

<?php $__env->startSection('content'); ?>
    <div class="bg-dark container">
    <?php if(auth()->check() && auth()->user()->id == 2): ?>
        <h2>Add new user</h2>

        <!-- Formularz dodawania użytkownika -->
        <form method="post" action="<?php echo e(route('users.store')); ?>">
            <?php echo csrf_field(); ?>
            <div class="mb-3">
                <label for="name" class="form-label">Name:</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password:</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <!-- Dodaj inne pola formularza użytkownika według potrzeb -->

            <button type="submit" class="btn btn-primary">Add User</button>
        </form>

        <h2 class="mt-4">User List</h2>


            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if($user->id !=2): ?>
            <div class="row align-items-center ">
            <div class="col-2  ">
                    <img class="rounded-circle shadow-1-strong me-3"
                    src="http://127.0.0.1:8000/<?php echo e($user->img); ?>" alt="avatar" width="60" height="60" />
            </div>
            <div class="col-2  ">
                    <?php echo e($user->name); ?>

            </div>
            <div class="col-2  ">
                    <a href="<?php echo e(route('users.edit', $user->id)); ?>" class="btn btn-warning">Edit</a>
            </div>
            <div class="col-2  ">
                    <form method="post" onsubmit="return confirmDelete()" action="<?php echo e(route('users.destroy', $user->id)); ?>" style="display: inline;" >
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                        <button onclick="" type="submit" class="btn btn-danger">Delete</button>
                    </form>
            </div>
            </div>
            <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php else: ?>
            <p>Access denied.</p>
        <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Na nowy dysk\semestr5\aplikacje\projekt\projekt_Kordalski_20192\resources\views/users/index.blade.php ENDPATH**/ ?>