<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title>MyJujutsuKaisenPage</title>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <script>
    function confirmDelete() {
        return confirm("Czy na pewno chcesz usunąć?");
    }
    </script>
    <?php echo app('Illuminate\Foundation\Vite')(['resources/sass/app.scss', 'resources/js/app.js']); ?>
</head>
<body class="bg-dark text-light">
<nav class="navbar navbar-expand navbar-dark bg-primary shadow-sm px-3">
                    <!-- Left Side Of Navbar -->
                    <div class="navbar-nav col-2 ps-2" >
                        <h1><a class="navbar-brand" href="/"> Main page</a></h1>
                    </div>

                    <!-- Right Side Of Navbar -->
                    <?php if(auth()->guard()->guest()): ?>
                        <!-- Tu możesz umieścić treść, która będzie widoczna dla niezalogowanych użytkowników -->
                        <div class="navbar-nav col-4 ps-2"> 
                        </div>
                    <?php else: ?>
                        <?php if(auth()->check() && auth()->user()->id == 2): ?>
                        <div class="navbar-nav col-1 ps-2"> 
                        </div>
                        <div  class="navbar-nav col-3 ps-2">
                        <li  class="nav-item dropdown"> 
                                    <a style="color:red" id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                       Admin panel
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                        <div class="mb-3 d-flex flex-column align-items-center">                  
                                        <a style="color:red" class="nav-link" href="/anime/create">Manage episodes</a>
                                        <a style="color:red" class="nav-link" href="/comments">Manage comments</a>
                                        <a style="color:red" class="nav-link" href="/users">Manage users</a>
                                        </div>
                                    </div>
                             </li>
                            </div>
                        <?php else: ?>
                        <div class="navbar-nav col-4 ps-2"> 
                        </div>
                        <?php endif; ?>
                    <?php endif; ?>
                    <div class="navbar-nav col-2 ps-2" >
                        <a class="nav-link" href="/anime">Episodes</a>
                    </div>
                    <div class="navbar-nav col-2 ps-2" >
                         <a class="nav-link" href="/about">About JJK</a>
                    </div>
                    <div class="col-1 ps-2" >
                        <ul class="navbar-nav ms-auto">
                            <!-- Authentication Links -->
                            <?php if(auth()->guard()->guest()): ?>
                                <?php if(Route::has('login')): ?>
                                    <li class="nav-item">
                                        <a class="nav-link" href="<?php echo e(route('login')); ?>"><?php echo e(__('Login')); ?></a>
                                    </li>
                                <?php endif; ?>

                                <?php if(Route::has('register')): ?>
                                    <li class="nav-item">
                                        <a class="nav-link" href="<?php echo e(route('register')); ?>"><?php echo e(__('Register')); ?></a>
                                    </li>
                                <?php endif; ?>
                            <?php else: ?>
                                <li class="nav-item dropdown"> 
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        <?php echo e(Auth::user()->name); ?>

                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                        <div class="mb-3 d-flex flex-column align-items-center">
                                        <img class="img-fluid rounded-circle mb-2" src="<?php echo e(url(Auth::user()->img)); ?>" style="width: 40px; height: 40px">
                                        <a class="dropdown-item" href="<?php echo e(route('home')); ?>">
                                           Profile
                                        </a>
                                        <a class="dropdown-item" href="<?php echo e(route('logout')); ?>"
                                        onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                            <?php echo e(__('Logout')); ?>

                                        </a>

                                        <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
                                            <?php echo csrf_field(); ?>
                                        </form>
                                        </div>
                                    </div>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </div>
        </nav>

        <main style="background-image: url('https://images.alphacoders.com/133/1334857.png'); background-size: cover; background-position: center; height: 100vh;" class=" container-fluid py-4">
            <?php echo $__env->yieldContent('content'); ?>
        </main>
</body>
</html>
<?php /**PATH C:\Users\student\Desktop\projekt_Kordalski_20192\resources\views/layouts/app.blade.php ENDPATH**/ ?>