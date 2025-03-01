<?php
$page_title = 'Home Page';
require_once('includes/load.php');
if (!$session->isUserLoggedIn(true)) {
  redirect('index.php', false);
}
$all_messages = find_all('messages');
?>
<?php include_once('layouts/header.php'); ?>

<!--**********************************
            Content body start
        ***********************************-->
<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles">
            <div class="col p-md-0">
                <h4>Bienvenido, <span><?php echo remove_junk(ucfirst($user['name'])); ?></span></h4>
            </div>
            <div class="col p-md-0">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </div>
        </div>

        <!-- row -->
        <div class="row">
            <div class="col-xl-12">
                <div class="card transparent-card">
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-padded table-responsive-fix-big">
                                <tbody>
                                    <?php foreach ($all_messages as $message) : ?>
                                    <tr>
                                    <td><?php echo remove_junk(ucfirst($message['message'])); ?> - Enviado por Administrador</td>
                                    </tr>
                                    <?php endforeach;?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card flex-row download-docs-card flex-wrap">
                    <div class="card-body border-right d-flex justify-content-center">
                        <div class="media  document align-items-center">
                            <img class="mr-4" src="assets/images/icons/30.png" alt="">
                            <div class="media-body pl-1">
                                <h2>2480</h2>
                                <p>Documentos</p>
                            </div>
                        </div>
                    </div>
                    <div class="card-body border-right d-flex justify-content-center">
                        <div class="media  image align-items-center">
                            <img class="mr-4" src="assets/images/icons/31.png" alt="">
                            <div class="media-body pl-1">
                                <h2>62450</h2>
                                <p>Imagenes</p>
                            </div>
                        </div>
                    </div>
                    <div class="card-body border-right d-flex justify-content-center">
                        <div class="media  video align-items-center">
                            <img class="mr-4" src="assets/images/icons/32.png" alt="">
                            <div class="media-body pl-1">
                                <h2>125</h2>
                                <p>Videos</p>
                            </div>
                        </div>
                    </div>
                    <div class="card-body border-right d-flex justify-content-center">
                        <div class="media  audio align-items-center">
                            <img class="mr-4" src="assets/images/icons/33.png" alt="">
                            <div class="media-body pl-1">
                                <h2>750</h2>
                                <p>Audios</p>
                            </div>
                        </div>
                    </div>
                    <div class="card-body d-flex justify-content-center">
                        <div class="media  zip align-items-center">
                            <img class="mr-4" src="assets/images/icons/34.png" alt="">
                            <div class="media-body pl-1">
                                <h2>175</h2>
                                <p>ZIP</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body widget-file-container">
                        <h4 class="card-title">Documentos (2480) <a class="float-right text-info"
                                href="archivos.php"><small>Mostrar Todos</small></a></h4>
                        <div class="d-flex flex-wrap">
                            <div class="file-container">
                                <img src="assets/images/icons/35.png" alt="">
                                <p><small>Demo01.pdf</small>
                                </p>
                            </div>
                            <div class="file-container">
                                <img src="assets/images/icons/35.png" alt="">
                                <p><small>Demo02.pdf</small>
                                </p>
                            </div>
                            <div class="file-container">
                                <img src="assets/images/icons/35.png" alt="">
                                <p><small>Demo03.pdf</small>
                                </p>
                            </div>
                            <div class="file-container">
                                <img src="assets/images/icons/35.png" alt="">
                                <p><small>Demo04.pdf</small>
                                </p>
                            </div>
                            <div class="file-container">
                                <img src="assets/images/icons/35.png" alt="">
                                <p><small>Demo05.pdf</small>
                                </p>
                            </div>
                            <div class="file-container">
                                <img src="assets/images/icons/35.png" alt="">
                                <p><small>Demo06.pdf</small>
                                </p>
                            </div>
                            <div class="file-container">
                                <img src="assets/images/icons/35.png" alt="">
                                <p><small>Demo07.pdf</small>
                                </p>
                            </div>
                            <div class="file-container">
                                <img src="assets/images/icons/35.png" alt="">
                                <p><small>Demo08.pdf</small>
                                </p>
                            </div>
                            <div class="file-container">
                                <img src="assets/images/icons/35.png" alt="">
                                <p><small>Demo09.pdf</small>
                                </p>
                            </div>
                            <div class="file-container">
                                <img src="assets/images/icons/35.png" alt="">
                                <p><small>Demo10.pdf</small>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body widget-file-container">
                        <h4 class="card-title">Imagenes (2480) <a class="float-right text-warning"
                                href="archivos.php"><small>Mostrar Todos</small></a></h4>
                        <div class="d-flex flex-wrap">
                            <div class="file-container">
                                <img src="assets/images/icons/36.png" alt="">
                                <p><small>Demo01.jpg</small>
                                </p>
                            </div>
                            <div class="file-container">
                                <img src="assets/images/icons/36.png" alt="">
                                <p><small>Demo02.jpg</small>
                                </p>
                            </div>
                            <div class="file-container">
                                <img src="assets/images/icons/36.png" alt="">
                                <p><small>Demo03.jpg</small>
                                </p>
                            </div>
                            <div class="file-container">
                                <img src="assets/images/icons/36.png" alt="">
                                <p><small>Demo04.jpg</small>
                                </p>
                            </div>
                            <div class="file-container">
                                <img src="assets/images/icons/36.png" alt="">
                                <p><small>Demo05.jpg</small>
                                </p>
                            </div>
                            <div class="file-container">
                                <img src="assets/images/icons/36.png" alt="">
                                <p><small>Demo06.jpg</small>
                                </p>
                            </div>
                            <div class="file-container">
                                <img src="assets/images/icons/36.png" alt="">
                                <p><small>Demo07.jpg</small>
                                </p>
                            </div>
                            <div class="file-container">
                                <img src="assets/images/icons/36.png" alt="">
                                <p><small>Demo08.jpg</small>
                                </p>
                            </div>
                            <div class="file-container">
                                <img src="assets/images/icons/36.png" alt="">
                                <p><small>Demo09.jpg</small>
                                </p>
                            </div>
                            <div class="file-container">
                                <img src="assets/images/icons/36.png" alt="">
                                <p><small>Demo10.jpg</small>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body widget-file-container">
                        <h4 class="card-title">Videos (2480) <a class="float-right text-danger"
                                href="archivos.php"><small>Mostrar Todos</small></a></h4>
                        <div class="d-flex flex-wrap">
                            <div class="file-container">
                                <img src="assets/images/icons/37.png" alt="">
                                <p><small>Demo01.mp4</small>
                                </p>
                            </div>
                            <div class="file-container">
                                <img src="assets/images/icons/37.png" alt="">
                                <p><small>Demo02.mp4</small>
                                </p>
                            </div>
                            <div class="file-container">
                                <img src="assets/images/icons/37.png" alt="">
                                <p><small>Demo03.mp4</small>
                                </p>
                            </div>
                            <div class="file-container">
                                <img src="assets/images/icons/37.png" alt="">
                                <p><small>Demo04.mp4</small>
                                </p>
                            </div>
                            <div class="file-container">
                                <img src="assets/images/icons/37.png" alt="">
                                <p><small>Demo05.mp4</small>
                                </p>
                            </div>
                            <div class="file-container">
                                <img src="assets/images/icons/37.png" alt="">
                                <p><small>Demo06.mp4</small>
                                </p>
                            </div>
                            <div class="file-container">
                                <img src="assets/images/icons/37.png" alt="">
                                <p><small>Demo07.mp4</small>
                                </p>
                            </div>
                            <div class="file-container">
                                <img src="assets/images/icons/37.png" alt="">
                                <p><small>Demo08.mp4</small>
                                </p>
                            </div>
                            <div class="file-container">
                                <img src="assets/images/icons/37.png" alt="">
                                <p><small>Demo09.mp4</small>
                                </p>
                            </div>
                            <div class="file-container">
                                <img src="assets/images/icons/37.png" alt="">
                                <p><small>Demo10.mp4</small>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body widget-file-container">
                        <h4 class="card-title">Audios (2480) <a class="float-right text-dpink"
                                href="archivos.php"><small>Mostrar Todos</small></a></h4>
                        <div class="d-flex flex-wrap">
                            <div class="file-container">
                                <img src="assets/images/icons/38.png" alt="">
                                <p><small>Demo01.mp3</small>
                                </p>
                            </div>
                            <div class="file-container">
                                <img src="assets/images/icons/38.png" alt="">
                                <p><small>Demo02.mp3</small>
                                </p>
                            </div>
                            <div class="file-container">
                                <img src="assets/images/icons/38.png" alt="">
                                <p><small>Demo03.mp3</small>
                                </p>
                            </div>
                            <div class="file-container">
                                <img src="assets/images/icons/38.png" alt="">
                                <p><small>Demo04.mp3</small>
                                </p>
                            </div>
                            <div class="file-container">
                                <img src="assets/images/icons/38.png" alt="">
                                <p><small>Demo05.mp3</small>
                                </p>
                            </div>
                            <div class="file-container">
                                <img src="assets/images/icons/38.png" alt="">
                                <p><small>Demo06.mp3</small>
                                </p>
                            </div>
                            <div class="file-container">
                                <img src="assets/images/icons/38.png" alt="">
                                <p><small>Demo07.mp3</small>
                                </p>
                            </div>
                            <div class="file-container">
                                <img src="assets/images/icons/38.png" alt="">
                                <p><small>Demo08.mp3</small>
                                </p>
                            </div>
                            <div class="file-container">
                                <img src="assets/images/icons/38.png" alt="">
                                <p><small>Demo09.mp3</small>
                                </p>
                            </div>
                            <div class="file-container">
                                <img src="assets/images/icons/38.png" alt="">
                                <p><small>Demo10.mp3</small>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body widget-file-container">
                        <h4 class="card-title">ZIP (2480) <a class="float-right text-primary"
                                href="archivos.php"><small>Mostrar Todos</small></a></h4>
                        <div class="d-flex flex-wrap">
                            <div class="file-container">
                                <img src="assets/images/icons/39.png" alt="">
                                <p><small>Demo01.zip</small>
                                </p>
                            </div>
                            <div class="file-container">
                                <img src="assets/images/icons/39.png" alt="">
                                <p><small>Demo01.zip</small>
                                </p>
                            </div>
                            <div class="file-container">
                                <img src="assets/images/icons/39.png" alt="">
                                <p><small>Demo02.zip</small>
                                </p>
                            </div>
                            <div class="file-container">
                                <img src="assets/images/icons/39.png" alt="">
                                <p><small>Demo03.zip</small>
                                </p>
                            </div>
                            <div class="file-container">
                                <img src="assets/images/icons/39.png" alt="">
                                <p><small>Demo04.zip</small>
                                </p>
                            </div>
                            <div class="file-container">
                                <img src="assets/images/icons/39.png" alt="">
                                <p><small>Demo05.zip</small>
                                </p>
                            </div>
                            <div class="file-container">
                                <img src="assets/images/icons/39.png" alt="">
                                <p><small>Demo06.zip</small>
                                </p>
                            </div>
                            <div class="file-container">
                                <img src="assets/images/icons/39.png" alt="">
                                <p><small>Demo07.zip</small>
                                </p>
                            </div>
                            <div class="file-container">
                                <img src="assets/images/icons/39.png" alt="">
                                <p><small>Demo08.zip</small>
                                </p>
                            </div>
                            <div class="file-container">
                                <img src="assets/images/icons/39.png" alt="">
                                <p><small>Demo09.zip</small>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- #/ container -->
</div>
<!--**********************************
            Content body end
        ***********************************-->

<?php include_once('layouts/footer.php'); ?>