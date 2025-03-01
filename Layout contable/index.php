<?php
ob_start();
require_once('includes/load.php');
if ($session->isUserLoggedIn(true)) {
    redirect('home.php', false);
}
?>
<!DOCTYPE html>
<html lang="es" class="h-100" id="login-page1">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Sistema Archivos - SCIESC</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/">
    <!-- Custom Stylesheet -->
    <link href="assets/css/style.css" rel="stylesheet">

</head>

<body class="h-100">
    <div id="preloader">
        <div class="loader">
            <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10" />
            </svg>
        </div>
    </div>
    <div class="login-bg h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100">
                <div class="col-xl-6">
                    <div class="form-input-content login-form">
                        <div class="card">
                            <div class="card-body">
                                <div class="logo text-center">
                                    <a href="index.html">
                                        <img src="assets/images/logo-sciesc.png" width="200px" alt="">
                                    </a>
                                </div>
                                <h4 class="text-center mt-4">Bienvenido Iniciar Sesión</h4>
                                <?php echo display_msg($msg); ?>
                                <form method="post" action="auth.php" class="mt-5 mb-5 clearfix">
                                    <div class="form-group">
                                        <label for="username" class="control-label">Usuario:</label>
                                        <input type="name" class="form-control" name="username" placeholder="Usuario">
                                    </div>
                                    <div class="form-group">
                                        <label for="Password" class="control-label">Contraseña:</label>
                                        <input type="password" class="form-control" name= "password" placeholder="Contraseña">
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                        </div>
                                        <div class="form-group col-md-6 text-right"><a href="javascript:void()">Olvidaste tu Contraseña?</a></div>
                                    </div>
                                    <div class="text-center mb-4 mt-4">
                                        <button type="submit" class="btn btn-primary">Iniciar Sesión</button>
                                    </div>
                                </form>
                                <div class="text-center">
                                    <p class="mt-5">No tienes cuenta? <a href="https://sciesc.com.mx/registro">Solicitala Aqui</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- #/ container -->
    <!-- Common JS -->
    <script src="assets/plugins/common/common.min.js"></script>
    <!-- Custom script -->
    <script src="assets/js/custom.min.js"></script>
    <script src="assets/js/settings.js"></script>
    <script src="assets/js/gleek.js"></script>
</body>

</html>