<?php
$page_title = 'Lista de Archivos';
require_once('includes/load.php');
// Checkin What level user has permission to view this page
page_require_level(3);

$icat = "";
$user = current_user();
$iusr = $user["id"];
$nusr = $user["name"];
$ulvl = $user["user_level"];
if (isset($_GET["ic"])) {
  $icat = $_GET["ic"];
  $path = "uploads/files/f$icat";
  $ncat = find_by_id("categories", $icat);
  if (!file_exists($path)) {
    mkdir($path, 0777, true);
  }
  if (isset($_GET["a"]) && $_GET["a"] == "d" && isset($_GET["f"]) && $_GET["f"] != "") {
    $f = $_GET["f"];
    if (file_exists($path . "/" . $f)) {
      unlink($path . "/" . $f);
      $session->msg('s', " Archivo Eliminado: $f de Categoria: $ncat");
      redirect("media.php?ic=$icat", false);
    }
  }
  $files = array_diff(scandir($path), array('.', '..'));
} else {
  if ($ulvl == 1) {
    $cats = find_all('categories');
  } else {
    $sql  = "Select c.id, c.name From permissions p Inner Join categories c On c.id = p.idcategorie Where p.iduser = {$iusr} Order By c.name;";
    $cats = find_by_sql($sql);
  }
}

if (isset($_POST['submit'])) {
  $photo = new Media();
  $photo->upload($_FILES['file_upload']);
  if ($photo->process_media()) {
    $session->msg('s', 'Imagen subida al servidor.');
    redirect('media.php');
  } else {
    $session->msg('d', join($photo->errors));
    redirect('media.php');
  }
}

include_once('layouts/header.php');
?>
<!--************ Content body start ***************-->
<div class="content-body">
  <div class="container-fluid">
    <div class="row page-titles">
      <div class="col p-md-0">
        <h4>Bienvenido <?php echo $nusr; ?></h4>
      </div>
      <div class="col p-md-0">
        <ol class="breadcrumb">
          <li class="breadcrumb-item active"><?php echo $ulvl == "1" ? "Subir Archivos" : "Explorar Archivos" ?></li>
        </ol>
      </div>
    </div>
    <?php echo display_msg($msg); ?>
    <?php if ($icat != "" && $ulvl == "1") { ?>
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-body">
              <div id="myDrop1" class="dropzone">
                <div class="dz-message">
                  <div class="drag-icon-cph"><i class="mdi mdi-cursor-pointer mdi-36px"></i></div>
                  <h3>Suelte los archivos aquí o haga clic para cargar.</h3>
                </div>
              </div>
              <div id="oMsj" class="alert alert-success hidden">
                <span id="dMsj"></span>
                <a href="#" class="close" data-dismiss="alert">&times;</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    <?php } ?>

    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-body">
            <div id="rFiles" class="row">
              <?php
              if ($icat == "") {
                foreach ($cats as $cat) : ?>
                  <div class="col-xl-3 col-lg-4 col-xxl-4 col-sm-6">
                    <div class="card card-portfolio-widget">
                      <a href="media.php?ic=<?php echo $cat['id']; ?>">
                        <i class="mdi mdi-folder-multiple mdi-24px"></i>
                        <div class="card-body d-flex justify-content-between align-items-center">
                          <h5 class="mb-0"><?php echo $cat['name']; ?></h5>
                        </div>
                      </a>
                    </div>
                  </div>
                <?php endforeach;
              } else {
                asort($files);
                foreach ($files as $file) : ?>
                  <div class="col-xl-3 col-lg-4 col-xxl-4 col-sm-6">
                    <div class="card card-portfolio-widget">
                      <div class="card-body d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">
                          <a href="<?php echo "$path/$file" ?>" target="_blank" class="dropdown-item text-dark" title="Descargar"><?php echo $file; ?></a>
                        </h5>
                        <div class="card-reaction-panel d-flex">
                          <div class="m-0">
                            <?php
                            if ("$ulvl" == "1") { ?>
                              <a href="<?php echo "media.php?a=d&f=$file&ic=$icat"; ?>" class="dropdown-item text-dark" title="Eliminar"><b>X</b></a>
                            <?php } ?>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
              <?php endforeach;
              } ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- #/ container -->
</div>
<!--**************  Content body end  ***************-->

<?php include_once('layouts/footer.php'); ?>

<script>
  Dropzone.autoDiscover = false;
  var myDrop1 = new Dropzone("div#myDrop1", {
    maxFiles: 5,
    maxFilesize: 50000,
    addRemoveLinks: true,
    autoProcessQueue: true,
    url: 'mediaup.php?ic=<?php echo $icat ?>',
    init: function() {
      this.on("sending", function(file, xhr, f) {
        $("#oMsj").attr("class", "alert alert-success");
        $("#dMsj").text("Subiendo El Archivo...");
      });
      this.on("success", function(file, response) {
        myDrop1.removeFile(file);
        if (response.indexOf("Error:") == 0) {
          $("#oMsj").attr("class", "alert alert-danger");
          $("#dMsj").text(response);
        } else {
          $("#oMsj").attr("class", "alert alert-success");
          $("#dMsj").text("El Archivo Se Subió Correctamente.");
          $("#rFiles").append(response);
        }
      });
      this.on("error", function(file, errormessage, response) {
        $("#oMsj").attr("class", "alert alert-danger");
        $("#dMsj").text(errormessage);
      });
    }
  });
</script>