

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><?php echo e(__('Profile picture change')); ?></div>
                <form action="<?php echo e(route('upload')); ?>" method="post" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>

                    <!-- Podgląd dodawanego zdjęcia -->
                    <?php
                        $userId = Auth::id();
                        $avatarPath = "avatar/{$userId}.png";
                        $avatarExists = Storage::exists("public/{$avatarPath}");
                    ?>

                    <img class="img-fluid rounded-circle mb-2" id="preview" src="<?php echo e($avatarExists ? asset("storage/{$avatarPath}") : asset('storage/avatar/default.png')); ?>" alt="Podgląd" style="width: 120px; height: 120px">

                    <!-- Przycisk do wyboru pliku -->
                    <input required type="file" name="photo" accept="image/*" onchange="previewImage(this)">

                    <!-- Przycisk do przesłania pliku -->
                    <button type="submit">Upload</button>
                </form>

                <script>
                    // Funkcja do podglądu zdjęcia przed przesłaniem
                    function previewImage(input) {
                        var preview = document.getElementById('preview');
                        preview.style.display = 'block';

                        var reader = new FileReader();
                        reader.onload = function (e) {
                            preview.src = e.target.result;
                        };

                        // Sprawdź, czy użytkownik wybrał plik
                        if (input.files && input.files[0]) {
                            reader.readAsDataURL(input.files[0]);
                        } else {
                            // Jeżeli nie wybrano pliku, pokaż domyślne zdjęcie
                            preview.src = "<?php echo e(asset('img/default.png')); ?>";
                        }
                    }
                </script>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\student\Desktop\projekt_Kordalski_20192\resources\views/pfpchange.blade.php ENDPATH**/ ?>