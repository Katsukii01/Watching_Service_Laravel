

<?php $__env->startSection('content'); ?>
<div class="container">
    <h1>Anime List</h1>
    <div class="row">
        <?php $__currentLoopData = $anime; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $a): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-md-4 mb-4 d-flex justify-content-center">
                <div class="card c-<?php echo e($a->id); ?>" style="max-width: 330px; <?php echo e($a->isWatched() ? 'background-color: black; color: white;' : ''); ?>">
                    <img src="<?php echo e(asset('storage/prev/' . $a->previmg)); ?>" class="card-img-top" style="max-width: 330px; height: 480px" alt="<?php echo e($a->name); ?>">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo e($a->name); ?></h5>
                    </div>
                    <div class="card-footer d-flex justify-content-center">
                        <a href="<?php echo e(route('anime.show', $a->id)); ?>" class="btn b-<?php echo e($a->id); ?> btn-<?php echo e($a->isWatched() ? 'secondary' : 'primary'); ?>">Go Watch</a>
                        <div>

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

                                    if(response.message=="Mark as watched"){
                                        $('.c-<?php echo e($a->id); ?>').css('background-color', 'white');
                                        $('.c-<?php echo e($a->id); ?>').css('color', 'black');
                                    }else{
                                        $('.c-<?php echo e($a->id); ?>').css('background-color', 'black');
                                        $('.c-<?php echo e($a->id); ?>').css('color', 'white');
                                    }
                    

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
                    </div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\student\Desktop\projekt_Kordalski_20192\resources\views/anime/index.blade.php ENDPATH**/ ?>