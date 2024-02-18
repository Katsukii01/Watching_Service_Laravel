

<?php $__env->startSection('content'); ?>
<div class="container">
    <h1>Anime List</h1>
    <div class="row">
        <ul>
        <?php $__currentLoopData = $anime; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $a): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if($a->isWatched()): ?>
        <li>
            <div class="col-md-4 mb-4 d-flex justify-content-center">
            <h5 class="card-title"><?php echo e($a->name); ?></h5>
                        <?php if(auth()->check()): ?>
                        <?php
                            $watchedClass = $a->isWatched() ? 'btn-danger' : 'btn-success';
                            $actionRoute = $a->isWatched() ? 'anime.unmarkAsWatched' : 'anime.markAsWatched';
                        ?>
                        <button 
                            type="button" 
                            class="btn <?php echo e($watchedClass); ?> toggle-watch-status-<?php echo e($a->id); ?>" 
                            data-action="<?php echo e(route($actionRoute, $a->id)); ?>">
                            <?php echo e($a->isWatched() ? 'Unmark as watched' : 'Mark as watched'); ?>

                        </button>
                        <?php endif; ?>


                    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                    <script>
                    $(document).ready(function () {
                        $('.toggle-watch-status-<?php echo e($a->id); ?>').on('click', function (event) {
                            event.preventDefault();

                            var button = $(this);
                            var action = button.hasClass('btn-success') ? '/anime/<?php echo e($a->id); ?>/markAsWatched' : '/anime/<?php echo e($a->id); ?>/unmarkAsWatched';
                            var csrfToken = $('meta[name="csrf-token"]').attr('content');

                            $.ajax({
                                type: 'POST',
                                url: action,
                                dataType: 'json',
                                data: {
                                    _token: csrfToken,
                                },
                                success: function (response) {
                                    $('.b-<?php echo e($a->id); ?>').toggleClass('btn-primary btn-secondary');
                                    
                                    // Toggle button color
                                    button.toggleClass('btn-success btn-danger');
                                    
                                    // Toggle button text
                                    button.text(response.message);
                                },
                                error: function (xhr, textStatus, errorThrown) {
                                    console.error("AJAX Error:");
                                    console.error("Status: " + textStatus);
                                    console.error("Error: " + errorThrown);
                                    console.error("Response: " + xhr.responseText);
                                }
                            });
                        });
                    });
                </script>
            </div>
            </li>
            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\student\Desktop\projekt_Kordalski_20192\resources\views/watched.blade.php ENDPATH**/ ?>