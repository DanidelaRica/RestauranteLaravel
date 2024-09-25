<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title><?php echo $__env->yieldContent('title'); ?></title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&family=Pacifico&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->

    <link href="<?php echo e(asset('lib/animate/animate.min.css')); ?>" rel="stylesheet"/>

    <link href="<?php echo e(asset('lib/owlcarousel/assets/owl.carousel.min.css')); ?>" rel="stylesheet"/>

    <link href="<?php echo e(asset('lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css')); ?>" rel="stylesheet"/>

    <!-- Customized Bootstrap Stylesheet -->

    <link href="<?php echo e(asset('css/bootstrap.min.css')); ?>" rel="stylesheet"/>

    <!-- Template Stylesheet -->

    <link href="<?php echo e(asset('css/style.css')); ?>" rel="stylesheet"/>

    <?php echo $__env->yieldContent('css'); ?>
</head>

<body>
    <div class="container-xxl bg-white p-0">
        <!-- Spinner Start -->
        <div id="spinner"
            class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Navbar & Hero Start -->
        <div class="container-xxl position-relative p-0">
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark px-4 px-lg-5 py-3 py-lg-0 sticky-top shadow-sm">
                <a href="<?php echo e(route('welcome.index')); ?>" class="navbar-brand p-0">
                    <h1 class="text-primary m-0"><i class="fa fa-utensils me-3"></i>Restaurante</h1>
                    <!-- <img src="img/logo.png" alt="Logo"> -->
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="fa fa-bars"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav ms-auto py-0 pe-4">
                        <a href="<?php echo e(route('welcome.index')); ?>" class="nav-item nav-link active">Inicio</a>
                        <?php if(Auth::user()): ?>
                        <?php if(Auth::user()->is_admin): ?>
                            <a href="<?php echo e(route('admin.bookings')); ?>" class="nav-item nav-link">Admin Reservas</a>
                        <?php endif; ?>
                            <a href="<?php echo e(route('dashboard.index')); ?>" class="nav-item nav-link">Mis reservas</a>
                            <a href="<?php echo e(route('profile.index')); ?>" class="nav-item nav-link">Mi cuenta</a>
                            <a href="<?php echo e(route('user.dologout')); ?>" class="nav-item nav-link">Cerrar sesión</a>
                        <?php else: ?>
                            <a href="<?php echo e(route('welcome.login')); ?>" class="nav-item nav-link">Iniciar sesión</a>
                            <a href="<?php echo e(route('welcome.register')); ?>" class="nav-item nav-link">Regístrate</a>
                        <?php endif; ?>
                        <a href="<?php echo e(route('welcome.contact')); ?>" class="nav-item nav-link">Contacto</a>
                    </div>
                    <a href="<?php echo e(route('welcome.booking')); ?>" class="btn btn-primary py-2 px-4">Reserva</a>
                </div>
            </nav>

            <div class="mb-5 py-5"></div>
        </div>
        <!-- Navbar & Hero End -->

        <?php echo $__env->yieldContent('content'); ?>

        <!-- Footer Start -->
        <div class="container-fluid bg-dark text-light footer pt-5 mt-5 wow fadeIn" data-wow-delay="0.1s">
            <div class="container py-5">
                <div class="row g-5">
                    <div class="col-lg-3 col-md-6">
                        <h4 class="section-title ff-secondary text-start text-primary fw-normal mb-4">Restaurante</h4>
                        <p href="">Sobre nosotros</p>
                        <p>Contacto</p>
                        <p>Reserva</p>
                        <p>Privacidad</p>
                        <p>Terminos y condiciones</p>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <h4 class="section-title ff-secondary text-start text-primary fw-normal mb-4">Contacto</h4>
                        <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>123 Street, New York, USA</p>
                        <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+012 345 67890</p>
                        <p class="mb-2"><i class="fa fa-envelope me-3"></i>info@example.com</p>
                        <div class="d-flex pt-2">
                            <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-youtube"></i></a>
                            <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <h4 class="section-title ff-secondary text-start text-primary fw-normal mb-4">Apertura</h4>
                        <h5 class="text-light fw-normal">Lunes - Sabado</h5>
                        <p>09AM - 09PM</p>
                        <h5 class="text-light fw-normal">Domingo</h5>
                        <p>10AM - 08PM</p>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <h4 class="section-title ff-secondary text-start text-primary fw-normal mb-4">Newsletter</h4>
                        <p>Dolor amet sit justo amet elitr clita ipsum elitr est.</p>

                    </div>
                </div>
            </div>
            <div class="container">
                <div class="copyright">
                    <div class="row">
                        <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                            &copy; <a class="border-bottom" href="#">Restaurante</a> | All Right Reserved.
                        </div>
                        <div class="col-md-6 text-center text-md-end">
                            <div class="footer-menu">
                                <a href="">Inicio</a>
                                <a href="">Cookies</a>
                                <a href="">Ayuda</a>
                                <a href="">FQAs</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="<?php echo e(asset('lib/wow/wow.min.js')); ?>"></script>

    <script src="<?php echo e(asset('lib/easing/easing.min.js')); ?>"></script>

    <script src="<?php echo e(asset('lib/waypoints/waypoints.min.js')); ?>"></script>

    <script src="<?php echo e(asset('lib/counterup/counterup.min.js')); ?>"></script>

    <script src="<?php echo e(asset('lib/owlcarousel/owl.carousel.min.js')); ?>"></script>

    <script src="<?php echo e(asset('lib/tempusdominus/js/moment.min.js')); ?>"></script>

    <script src="<?php echo e(asset('lib/tempusdominus/js/moment-timezone.min.js')); ?>"></script>

    <script src="<?php echo e(asset('lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js')); ?>"></script>

    <!-- Template Javascript -->

    <script src="<?php echo e(asset('js/main.js')); ?>"></script>

    <?php echo $__env->yieldContent('js'); ?>
</body>

</html>
<?php /**PATH C:\wamp64\www\restauranteee\resources\views/template.blade.php ENDPATH**/ ?>