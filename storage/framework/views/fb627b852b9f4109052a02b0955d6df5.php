
<?php $__env->startSection('content'); ?>
<div class="container d-flex justify-content-center flex-column">
<div class="container px-3">

    <h1><?php echo e($anime->name); ?></h1>
    <div class="embed-responsive embed-responsive-16by9">
    <iframe width='100%' height="650px" allowfullscreen  class="embed-responsive-item" src="<?php echo e($anime->link); ?>" ></iframe>
</div>

<?php if(!(auth()->check())): ?>
    <a> 
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-hand-thumbs-up" viewBox="0 0 16 16">
  <path d="M8.864.046C7.908-.193 7.02.53 6.956 1.466c-.072 1.051-.23 2.016-.428 2.59-.125.36-.479 1.013-1.04 1.639-.557.623-1.282 1.178-2.131 1.41C2.685 7.288 2 7.87 2 8.72v4.001c0 .845.682 1.464 1.448 1.545 1.07.114 1.564.415 2.068.723l.048.03c.272.165.578.348.97.484.397.136.861.217 1.466.217h3.5c.937 0 1.599-.477 1.934-1.064a1.86 1.86 0 0 0 .254-.912c0-.152-.023-.312-.077-.464.201-.263.38-.578.488-.901.11-.33.172-.762.004-1.149.069-.13.12-.269.159-.403.077-.27.113-.568.113-.857 0-.288-.036-.585-.113-.856a2.144 2.144 0 0 0-.138-.362 1.9 1.9 0 0 0 .234-1.734c-.206-.592-.682-1.1-1.2-1.272-.847-.282-1.803-.276-2.516-.211a9.84 9.84 0 0 0-.443.05 9.365 9.365 0 0 0-.062-4.509A1.38 1.38 0 0 0 9.125.111zM11.5 14.721H8c-.51 0-.863-.069-1.14-.164-.281-.097-.506-.228-.776-.393l-.04-.024c-.555-.339-1.198-.731-2.49-.868-.333-.036-.554-.29-.554-.55V8.72c0-.254.226-.543.62-.65 1.095-.3 1.977-.996 2.614-1.708.635-.71 1.064-1.475 1.238-1.978.243-.7.407-1.768.482-2.85.025-.362.36-.594.667-.518l.262.066c.16.04.258.143.288.255a8.34 8.34 0 0 1-.145 4.725.5.5 0 0 0 .595.644l.003-.001.014-.003.058-.014a8.908 8.908 0 0 1 1.036-.157c.663-.06 1.457-.054 2.11.164.175.058.45.3.57.65.107.308.087.67-.266 1.022l-.353.353.353.354c.043.043.105.141.154.315.048.167.075.37.075.581 0 .212-.027.414-.075.582-.05.174-.111.272-.154.315l-.353.353.353.354c.047.047.109.177.005.488a2.224 2.224 0 0 1-.505.805l-.353.353.353.354c.006.005.041.05.041.17a.866.866 0 0 1-.121.416c-.165.288-.503.56-1.066.56z"/>
</svg>   
 <?php echo e($anime->likes); ?>

    </a>
    <a> ㅤㅤㅤ </a>
    <a>
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-hand-thumbs-down" viewBox="0 0 16 16">
  <path d="M8.864 15.674c-.956.24-1.843-.484-1.908-1.42-.072-1.05-.23-2.015-.428-2.59-.125-.36-.479-1.012-1.04-1.638-.557-.624-1.282-1.179-2.131-1.41C2.685 8.432 2 7.85 2 7V3c0-.845.682-1.464 1.448-1.546 1.07-.113 1.564-.415 2.068-.723l.048-.029c.272-.166.578-.349.97-.484C6.931.08 7.395 0 8 0h3.5c.937 0 1.599.478 1.934 1.064.164.287.254.607.254.913 0 .152-.023.312-.077.464.201.262.38.577.488.9.11.33.172.762.004 1.15.069.13.12.268.159.403.077.27.113.567.113.856 0 .289-.036.586-.113.856-.035.12-.08.244-.138.363.394.571.418 1.2.234 1.733-.206.592-.682 1.1-1.2 1.272-.847.283-1.803.276-2.516.211a9.877 9.877 0 0 1-.443-.05 9.364 9.364 0 0 1-.062 4.51c-.138.508-.55.848-1.012.964zM11.5 1H8c-.51 0-.863.068-1.14.163-.281.097-.506.229-.776.393l-.04.025c-.555.338-1.198.73-2.49.868-.333.035-.554.29-.554.55V7c0 .255.226.543.62.65 1.095.3 1.977.997 2.614 1.709.635.71 1.064 1.475 1.238 1.977.243.7.407 1.768.482 2.85.025.362.36.595.667.518l.262-.065c.16-.04.258-.144.288-.255a8.34 8.34 0 0 0-.145-4.726.5.5 0 0 1 .595-.643h.003l.014.004.058.013a8.912 8.912 0 0 0 1.036.157c.663.06 1.457.054 2.11-.163.175-.059.45-.301.57-.651.107-.308.087-.67-.266-1.021L12.793 7l.353-.354c.043-.042.105-.14.154-.315.048-.167.075-.37.075-.581 0-.211-.027-.414-.075-.581-.05-.174-.111-.273-.154-.315l-.353-.354.353-.354c.047-.047.109-.176.005-.488a2.224 2.224 0 0 0-.505-.804l-.353-.354.353-.354c.006-.005.041-.05.041-.17a.866.866 0 0 0-.121-.415C12.4 1.272 12.063 1 11.5 1"/>
</svg> <?php echo e($anime->dislikes); ?>

    </a>
<?php else: ?>
    <?php
        $likeStatus = $anime->animeUsers->where('user_id', auth()->user()->id)->first()->liked ?? 0;
    ?>

    <div id="like-buttons">
        <button class="btn btn-primary like-btn <?php if($likeStatus == 1): ?> active btn-success <?php endif; ?>" data-action="/like/<?php echo e($anime->id); ?>" data-status="1">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-hand-thumbs-up" viewBox="0 0 16 16">
  <path d="M8.864.046C7.908-.193 7.02.53 6.956 1.466c-.072 1.051-.23 2.016-.428 2.59-.125.36-.479 1.013-1.04 1.639-.557.623-1.282 1.178-2.131 1.41C2.685 7.288 2 7.87 2 8.72v4.001c0 .845.682 1.464 1.448 1.545 1.07.114 1.564.415 2.068.723l.048.03c.272.165.578.348.97.484.397.136.861.217 1.466.217h3.5c.937 0 1.599-.477 1.934-1.064a1.86 1.86 0 0 0 .254-.912c0-.152-.023-.312-.077-.464.201-.263.38-.578.488-.901.11-.33.172-.762.004-1.149.069-.13.12-.269.159-.403.077-.27.113-.568.113-.857 0-.288-.036-.585-.113-.856a2.144 2.144 0 0 0-.138-.362 1.9 1.9 0 0 0 .234-1.734c-.206-.592-.682-1.1-1.2-1.272-.847-.282-1.803-.276-2.516-.211a9.84 9.84 0 0 0-.443.05 9.365 9.365 0 0 0-.062-4.509A1.38 1.38 0 0 0 9.125.111zM11.5 14.721H8c-.51 0-.863-.069-1.14-.164-.281-.097-.506-.228-.776-.393l-.04-.024c-.555-.339-1.198-.731-2.49-.868-.333-.036-.554-.29-.554-.55V8.72c0-.254.226-.543.62-.65 1.095-.3 1.977-.996 2.614-1.708.635-.71 1.064-1.475 1.238-1.978.243-.7.407-1.768.482-2.85.025-.362.36-.594.667-.518l.262.066c.16.04.258.143.288.255a8.34 8.34 0 0 1-.145 4.725.5.5 0 0 0 .595.644l.003-.001.014-.003.058-.014a8.908 8.908 0 0 1 1.036-.157c.663-.06 1.457-.054 2.11.164.175.058.45.3.57.65.107.308.087.67-.266 1.022l-.353.353.353.354c.043.043.105.141.154.315.048.167.075.37.075.581 0 .212-.027.414-.075.582-.05.174-.111.272-.154.315l-.353.353.353.354c.047.047.109.177.005.488a2.224 2.224 0 0 1-.505.805l-.353.353.353.354c.006.005.041.05.041.17a.866.866 0 0 1-.121.416c-.165.288-.503.56-1.066.56z"/>
</svg>   
 <?php echo e($anime->likes); ?>

        </button>
        <button class="btn btn-primary dislike-btn <?php if($likeStatus == 2): ?> active btn-danger <?php endif; ?>" data-action="/dislike/<?php echo e($anime->id); ?>" data-status="2">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-hand-thumbs-down" viewBox="0 0 16 16">
  <path d="M8.864 15.674c-.956.24-1.843-.484-1.908-1.42-.072-1.05-.23-2.015-.428-2.59-.125-.36-.479-1.012-1.04-1.638-.557-.624-1.282-1.179-2.131-1.41C2.685 8.432 2 7.85 2 7V3c0-.845.682-1.464 1.448-1.546 1.07-.113 1.564-.415 2.068-.723l.048-.029c.272-.166.578-.349.97-.484C6.931.08 7.395 0 8 0h3.5c.937 0 1.599.478 1.934 1.064.164.287.254.607.254.913 0 .152-.023.312-.077.464.201.262.38.577.488.9.11.33.172.762.004 1.15.069.13.12.268.159.403.077.27.113.567.113.856 0 .289-.036.586-.113.856-.035.12-.08.244-.138.363.394.571.418 1.2.234 1.733-.206.592-.682 1.1-1.2 1.272-.847.283-1.803.276-2.516.211a9.877 9.877 0 0 1-.443-.05 9.364 9.364 0 0 1-.062 4.51c-.138.508-.55.848-1.012.964zM11.5 1H8c-.51 0-.863.068-1.14.163-.281.097-.506.229-.776.393l-.04.025c-.555.338-1.198.73-2.49.868-.333.035-.554.29-.554.55V7c0 .255.226.543.62.65 1.095.3 1.977.997 2.614 1.709.635.71 1.064 1.475 1.238 1.977.243.7.407 1.768.482 2.85.025.362.36.595.667.518l.262-.065c.16-.04.258-.144.288-.255a8.34 8.34 0 0 0-.145-4.726.5.5 0 0 1 .595-.643h.003l.014.004.058.013a8.912 8.912 0 0 0 1.036.157c.663.06 1.457.054 2.11-.163.175-.059.45-.301.57-.651.107-.308.087-.67-.266-1.021L12.793 7l.353-.354c.043-.042.105-.14.154-.315.048-.167.075-.37.075-.581 0-.211-.027-.414-.075-.581-.05-.174-.111-.273-.154-.315l-.353-.354.353-.354c.047-.047.109-.176.005-.488a2.224 2.224 0 0 0-.505-.804l-.353-.354.353-.354c.006-.005.041-.05.041-.17a.866.866 0 0 0-.121-.415C12.4 1.272 12.063 1 11.5 1"/>
</svg> <?php echo e($anime->dislikes); ?>

        </button>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        // Initial check for liked/disliked status
        updateButtonStyles();

        $('.like-btn, .dislike-btn').on('click', function (event) {
            event.preventDefault();

            var button = $(this);
            var action = button.data('action');
            var status = button.data('status');
            var csrfToken = $('meta[name="csrf-token"]').attr('content');

            // Check if the button is already active
            var isActive = button.hasClass('active');
            $.ajax({
                type: 'POST',
                url: action,
                dataType: 'json',
                data: {
                    _token: csrfToken,
                },
                success: function (response) {

                    $('.like-btn').removeClass('active');
                    $('.dislike-btn').removeClass('active');
                     button.toggleClass('active', !isActive);

                     $('#like-buttons button').removeClass('btn-success btn-danger');
                     if ($('.dislike-btn').hasClass('active')) {
                        $('.dislike-btn').addClass('btn-danger');
                       
                     }

                     if ($('.like-btn').hasClass('active')) {
                        $('.like-btn').addClass('btn-success');
                       
                     } 
                    // Update button styles after successful AJAX request

                    $('#like-buttons .like-btn').html('<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-hand-thumbs-up" viewBox="0 0 16 16">'+
                     '<path d="M8.864.046C7.908-.193 7.02.53 6.956 1.466c-.072 1.051-.23 2.016-.428 2.59-.125.36-.479 1.013-1.04 1.639-.557.623-1.282 1.178-2.131 1.41C2.685 7.288 2 7.87 2 8.72v4.001c0 .845.682 1.464 1.448 1.545 1.07.114 1.564.415 2.068.723l.048.03c.272.165.578.348.97.484.397.136.861.217 1.466.217h3.5c.937 0 1.599-.477 1.934-1.064a1.86 1.86 0 0 0 .254-.912c0-.152-.023-.312-.077-.464.201-.263.38-.578.488-.901.11-.33.172-.762.004-1.149.069-.13.12-.269.159-.403.077-.27.113-.568.113-.857 0-.288-.036-.585-.113-.856a2.144 2.144 0 0 0-.138-.362 1.9 1.9 0 0 0 .234-1.734c-.206-.592-.682-1.1-1.2-1.272-.847-.282-1.803-.276-2.516-.211a9.84 9.84 0 0 0-.443.05 9.365 9.365 0 0 0-.062-4.509A1.38 1.38 0 0 0 9.125.111zM11.5 14.721H8c-.51 0-.863-.069-1.14-.164-.281-.097-.506-.228-.776-.393l-.04-.024c-.555-.339-1.198-.731-2.49-.868-.333-.036-.554-.29-.554-.55V8.72c0-.254.226-.543.62-.65 1.095-.3 1.977-.996 2.614-1.708.635-.71 1.064-1.475 1.238-1.978.243-.7.407-1.768.482-2.85.025-.362.36-.594.667-.518l.262.066c.16.04.258.143.288.255a8.34 8.34 0 0 1-.145 4.725.5.5 0 0 0 .595.644l.003-.001.014-.003.058-.014a8.908 8.908 0 0 1 1.036-.157c.663-.06 1.457-.054 2.11.164.175.058.45.3.57.65.107.308.087.67-.266 1.022l-.353.353.353.354c.043.043.105.141.154.315.048.167.075.37.075.581 0 .212-.027.414-.075.582-.05.174-.111.272-.154.315l-.353.353.353.354c.047.047.109.177.005.488a2.224 2.224 0 0 1-.505.805l-.353.353.353.354c.006.005.041.05.041.17a.866.866 0 0 1-.121.416c-.165.288-.503.56-1.066.56z"/></svg>' + response.likes);
                    $('#like-buttons .dislike-btn').html('<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-hand-thumbs-down" viewBox="0 0 16 16">'+ '<path d="M8.864 15.674c-.956.24-1.843-.484-1.908-1.42-.072-1.05-.23-2.015-.428-2.59-.125-.36-.479-1.012-1.04-1.638-.557-.624-1.282-1.179-2.131-1.41C2.685 8.432 2 7.85 2 7V3c0-.845.682-1.464 1.448-1.546 1.07-.113 1.564-.415 2.068-.723l.048-.029c.272-.166.578-.349.97-.484C6.931.08 7.395 0 8 0h3.5c.937 0 1.599.478 1.934 1.064.164.287.254.607.254.913 0 .152-.023.312-.077.464.201.262.38.577.488.9.11.33.172.762.004 1.15.069.13.12.268.159.403.077.27.113.567.113.856 0 .289-.036.586-.113.856-.035.12-.08.244-.138.363.394.571.418 1.2.234 1.733-.206.592-.682 1.1-1.2 1.272-.847.283-1.803.276-2.516.211a9.877 9.877 0 0 1-.443-.05 9.364 9.364 0 0 1-.062 4.51c-.138.508-.55.848-1.012.964zM11.5 1H8c-.51 0-.863.068-1.14.163-.281.097-.506.229-.776.393l-.04.025c-.555.338-1.198.73-2.49.868-.333.035-.554.29-.554.55V7c0 .255.226.543.62.65 1.095.3 1.977.997 2.614 1.709.635.71 1.064 1.475 1.238 1.977.243.7.407 1.768.482 2.85.025.362.36.595.667.518l.262-.065c.16-.04.258-.144.288-.255a8.34 8.34 0 0 0-.145-4.726.5.5 0 0 1 .595-.643h.003l.014.004.058.013a8.912 8.912 0 0 0 1.036.157c.663.06 1.457.054 2.11-.163.175-.059.45-.301.57-.651.107-.308.087-.67-.266-1.021L12.793 7l.353-.354c.043-.042.105-.14.154-.315.048-.167.075-.37.075-.581 0-.211-.027-.414-.075-.581-.05-.174-.111-.273-.154-.315l-.353-.354.353-.354c.047-.047.109-.176.005-.488a2.224 2.224 0 0 0-.505-.804l-.353-.354.353-.354c.006-.005.041-.05.041-.17a.866.866 0 0 0-.121-.415C12.4 1.272 12.063 1 11.5 1"/></svg>' + response.dislikes);
                },
                error: function (xhr, textStatus, errorThrown) {
                    console.error("AJAX Error:");
                    console.error("Status: " + textStatus);
                    console.error("Error: " + errorThrown);
                    console.error("Response: " + xhr.responseText);
                }
            });
        });

        function updateButtonStyles() {
            // Remove active class from all buttons
            
            // Check if user has liked or dislikedelse 
            if ($('.dislike-btn').hasClass('active')) {
               
            }
   
        }
    });
</script>

<?php endif; ?>
<hr>
    <p>Description: <?php echo e($anime->description); ?></p>
    <?php
        $currentEpisode = $anime->id;
        use App\Models\Anime;
        $maxAvailableEpisode = Anime::max('id');
        $minAvailableEpisode = Anime::min('id');
    ?>

    <?php if($currentEpisode > $minAvailableEpisode): ?>
        <a class="btn btn-primary" href="<?php echo e($currentEpisode - 1); ?>">
            Previous Episode
        </a>
    <?php else: ?>
        <a class="btn btn-secondary" href="#" disabled>
            Previous Episode
        </a>
    <?php endif; ?>


    <?php if($currentEpisode < $maxAvailableEpisode): ?>
    <a class="btn btn-primary" href="<?php echo e($currentEpisode + 1); ?>">
            Next Episode
    </a>
    <?php else: ?>
        <a class="btn btn-secondary" href="#" disabled>
            Next Episode
        </a>
    <?php endif; ?>



<hr>
<div>
<?php if(auth()->check()): ?>
    <?php
        $userAnime = $anime->animeUsers->where('user_id', auth()->user()->id)->first();
        $watchedClass = $userAnime && $userAnime->watched ? 'btn-danger' : 'btn-success';
        $actionRoute = $userAnime && $userAnime->watched ? 'anime.unmarkAsWatched' : 'anime.markAsWatched';
    ?>

    <button 
        type="button" 
        class="btn <?php echo e($watchedClass); ?> toggle-watch-status" 
        data-action="<?php echo e(route($actionRoute, $anime->id)); ?>">
        <?php echo e($userAnime && $userAnime->watched ? 'Unmark as watched' : 'Mark as watched'); ?>

    </button>
<?php endif; ?>

<script>
    $(document).ready(function () {
        $('.toggle-watch-status').on('click', function (event) {
            event.preventDefault();

            var button = $(this);
            var action = button.hasClass('btn-success') ? '/anime/<?php echo e($anime->id); ?>/markAsWatched' : '/anime/<?php echo e($anime->id); ?>/unmarkAsWatched';
            var csrfToken = $('meta[name="csrf-token"]').attr('content');

            $.ajax({
                type: 'POST',
                url: action,
                dataType: 'json',
                data: {
                    _token: csrfToken,
                },
                success: function (response) {
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
    <br>
    <br>
    <?php if(auth()->check()): ?>
        <form id="commentForm" method="post" action="<?php echo e(route('comments.store', $anime->id)); ?>">
            <?php echo csrf_field(); ?>
            <textarea class="form-control" rows="3" name="content" placeholder="Write a comment"></textarea>
            <br>
            <button type="button" id="submitComment" class="btn btn-primary">Submit Comment</button>
        </form>
    <?php endif; ?>
    <hr>
    <br>
    <h2>Comments</h2>
    <br>
    <div class="comments-container">
    <?php $__currentLoopData = $anime->comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="row d-flex justify-content-center">
            <div class="col-md-12 col-lg-10 col-xl-8">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex flex-start align-items-center">
                            <img class="rounded-circle shadow-1-strong me-3"
                                src="http://127.0.0.1:8000/<?php echo e($comment->user->img); ?>" alt="avatar" width="60"
                                height="60" />
                            <div>
                                <h6 class="fw-bold text-primary mb-1"><?php echo e($comment->user->name); ?></h6>
                                <p class="text-muted small mb-0">
                                    Shared publicly - <?php echo e($comment->created_at->format('Y-m-d H:i')); ?>

                                </p>
                            </div>
                        </div>
                        <p class="mt-3 mb-4 pb-2">
                            <?php echo e($comment->content); ?>

                        </p>

                        <?php if(auth()->check() && auth()->user()->id == $comment->user->id): ?>
                            <!-- Display delete button only if the active user is the comment owner -->
                            <form id="deleteForm-<?php echo e($comment->id); ?>" method="post"  >
                            <?php echo csrf_field(); ?>
                            <input  hidden name="animeId" type="number" value="<?php echo e($anime->id); ?>">
                            <?php echo method_field('DELETE'); ?>
                            <button data-comment-id="<?php echo e($comment->id); ?>" onclick="deleteCommentHandler($(this));" id="deletecomment" type="button" class="deleteComment btn btn-danger">Delete</button>
                            </form>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
        <br>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>
<script>
    $(document).ready(function () {
        // Submit comment form using AJAX
        $('#submitComment').on('click', function () {
            var form = $('#commentForm');
            var formData = form.serialize(); // Serialize form data

            $.ajax({
                type: form.attr('method'),
                url: form.attr('action'),
                data: formData,
                dataType: 'json',
                success: function (response) {
                        // Update comments container with the updated comments
                        updateComments(response.comments);
                        // Clear the textarea after successful submission
                        $('textarea[name="content"]').val('');
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

    // Delete comment using AJAX
    function deleteCommentHandler(button) {
    var commentId = button.data('comment-id');
    var form = $('#deleteForm-' + commentId);
    var formData = form.serialize(); // Serialize form data

    // Get CSRF token from the cookie
    var csrftoken = getCookie('csrftoken');

    $.ajax({
        type: 'DELETE',
        url: '/comments/' + commentId,
        data: formData,
        dataType: 'json',
        headers: {
            'X-CSRFToken': csrftoken
        },
        success: function (response) {
            // Assuming your updateComments function is defined elsewhere
            // Update comments container with the updated comments
            updateComments(response.comments);
        },
        error: function (xhr, textStatus, errorThrown) {
            console.error("AJAX Error:");
            console.error("Status: " + textStatus);
            console.error("Error: " + errorThrown);
            console.error("Response: " + xhr.responseText);
        }
    });
}


    // Function to get the value of a cookie by name
    function getCookie(name) {
        var value = "; " + document.cookie;
        var parts = value.split("; " + name + "=");
        if (parts.length === 2) return parts.pop().split(";").shift();
    }
    function formatDate(date) {
    let hours = date.getHours();
    let minutes = date.getMinutes();
    let strTime = hours + ':' + minutes;
    let month = (date.getMonth()+1);
    let m="";
    if (month<10){
        m="0"+month;
    }else{
        m=month;
    }
    return date.getFullYear() + "-" + m + "-" + (date.getDate() < 10 ? '0'+date.getDate() : date.getDate()) + " " + strTime;
}


    function updateComments(comments) {
    var commentsContainer = $('.comments-container');
    commentsContainer.empty(); // Clear existing comments

    // Append updated comments to the container
    $.each(comments, function(index, comment) {
        var commentHtml = 
                        '<div class="row d-flex justify-content-center">'+
                               '<div class="col-md-12 col-lg-10 col-xl-8">'+
                                    '<div class="card">'+
                                       '<div class="card-body">'+
                                            '<div class="d-flex flex-start align-items-center">'+
                                                '<img class="rounded-circle shadow-1-strong me-3"'+
                                                    'src="http://127.0.0.1:8000/'+ comment.user.img +'" alt="avatar" width="60"height="60" />'+
                                                '<div>'+
                                                    '<h6 class="fw-bold text-primary mb-1">' + comment.user.name + '</h6>'+
                                                    '<p class="text-muted small mb-0">'+
                                                        'Shared publicly - ' + formatDate(new Date(comment.created_at)) +
                                                    '</p>'+
                                                '</div>'+
                                            '</div>'+
                                            '<p class="mt-3 mb-4 pb-2">'+
                                          comment.content +
                                            '</p>';
                                            
                                            if(comment.user.id==<?php echo e(auth()->user()->id); ?>){
                                            commentHtml +=
                                                '<!-- Display delete button only if the active user is the comment owner -->'+
                                                '<form id="deleteForm-'+comment.id+'"  method="post">'+
                                                '<input  hidden name="animeId" type="number" value="<?php echo e($anime->id); ?>">'+
                                               ' <?php echo csrf_field(); ?>'+
                                                '<?php echo method_field("DELETE"); ?>'+
                                               '<button onclick="deleteCommentHandler($(this));" data-comment-id="'+comment.id+'" id="deletecomment" type="button" class="deleteComment btn btn-danger">Delete</button>'+
                                                '</form>';
                                            }

                                            commentHtml +='</div></div></div></div></div><br>';

                    commentsContainer.append(commentHtml);
    });
    }
</script>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\student\Desktop\projekt_Kordalski_20192\resources\views/anime/show.blade.php ENDPATH**/ ?>