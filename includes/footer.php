<?php
$tema = $_COOKIE['tema'];
?>
<footer class="mt-5 py-5">
    <div class="container">
        <div class="row align-items-start">

            <!-- Logo -->
            <div class="col-md-4 text-center text-md-start mb-4">
                <img class="logoFooter" src="<?= $tema === 'dark' ? 'img/logoClaro.png' : 'img/logo.png' ?>" alt="AulaFix">
            </div>

            <!-- Contacto -->
            <div class="col-md-4 mb-4">
                <h6 class="fw-bold mb-3">Contacto</h6>

                <div class="row mb-2">
                    <div class="col-4">Dirección</div>
                    <div class="col-8">Calle aulafix, 123</div>
                </div>

                <div class="row mb-2">
                    <div class="col-4">Teléfono</div>
                    <div class="col-8">+123456789</div>
                </div>

                <div class="row">
                    <div class="col-4">Email</div>
                    <div class="col-8">info@aulafix.com</div>
                </div>
            </div>

            <!-- Redes Sociales -->
            <div class="col-md-4 text-center text-md-start mb-4">
                <h6 class="fw-bold mb-3">Redes sociales</h6>

                <div class="d-flex flex-column gap-3">
                    <a href="#" class="text-danger">
                        <i class="bi bi-youtube fs-5"></i>
                    </a>

                    <a href="#" class="text">
                        <i class="bi bi-facebook fs-5"></i>
                    </a>

                    <a href="#" class="text-danger">
                        <i class="bi bi-instagram fs-5"></i>
                    </a>
                </div>
            </div>

        </div>

        <!-- Enlaces legales -->
        <div class="row mt-4">
            <div class="col text-center">
                <a href="#" class="text-decoration-none text-secondary mx-2">
                    Términos y condiciones
                </a>

                <a href="#" class="text-decoration-none text-secondary mx-2">
                    Aviso legal
                </a>

                <a href="#" class="text-decoration-none text-secondary mx-2">
                    Política de privacidad
                </a>

                <a href="#" class="text-decoration-none text-secondary mx-2">
                    Cookies
                </a>
            </div>
        </div>

        <!-- Copyright -->
        <div class="row mt-4">
            <div class="col text-center text-muted small">
                © <?php echo date('Y'); ?> AulaFix Group · DAW 2
            </div>
        </div>
    </div>
</footer>