<?php
$page_title = 'Lista De Permisos De Usuario';
require_once('includes/load.php');
// Checkin What level user has permission to view this page
page_require_level(2);

if (!isset($_GET['id'])) {
  $session->msg("s", "Se Requiere El Id.");
  redirect('usuarios.php', false);
} else
  $id = $_GET['id'];

$sql  = "Select name From users Where id={$id};";
$user = find_by_sql($sql);
if (count($user) == 0) {
  $session->msg("s", "Usuario No Encontrado.");
  redirect('usuarios.php', false);
}
$name = "";
foreach ($user as $row)
  $name = $row['name'];

$sql = "Select c.*, Case When p.id Is Null Then 0 Else 1 End As perm From categories As c Left Join permissions As p On p.idcategorie = c.id And p.iduser = {$id} ";
$sql .= "Order By Case When p.id Is Null Then 1 Else 0 End, c.name;";
$all_perm = find_by_sql($sql);

// Agregar Categoria
if (isset($_POST['add_per'])) {
  $req_field = array('categorie-name');
  validate_fields($req_field);
  $cat_name = remove_junk($db->escape($_POST['categorie-name']));
  if (empty($errors)) {
    $sql  = "INSERT INTO categories (name)";
    $sql .= " VALUES ('{$cat_name}')";
    if ($db->query($sql)) {
      $session->msg("s", "Categoría agregada exitosamente.");
      redirect('categoria.php', false);
    } else {
      $session->msg("d", "Lo siento, registro falló");
      redirect('categoria.php', false);
    }
  } else {
    $session->msg("d", $errors);
    redirect('categoria.php', false);
  }
}

// Editar Categoria 
if (isset($_POST['edit_cat'])) {
  $req_field = array('categorie-name');
  validate_fields($req_field);
  $cat_id = remove_junk($db->escape($_POST['categorie-id']));
  $cat_name = remove_junk($db->escape($_POST['categorie-name']));
  if (empty($errors)) {
    $sql = "UPDATE categories SET name='{$cat_name}'";
    $sql .= " WHERE id='{$cat_id}'";
    $result = $db->query($sql);
    if ($result && $db->affected_rows() === 1) {
      $session->msg("s", "Categoría actualizada con éxito.");
      redirect('categoria.php', false);
    } else {
      $session->msg("d", "Lo siento, actualización falló.");
      redirect('categoria.php', false);
    }
  } else {
    $session->msg("d", $errors);
    redirect('categoria.php', false);
  }
}

if (isset($_GET['a']) && isset($_GET['i'])) {
  $a = $_GET['a'];
  $i = $_GET['i'];
  if ($a == "d") {
    $sql  = "Delete From categories Where id={$i};";
    if ($db->query($sql))
      $session->msg("s", "Categoría eliminada exitosamente.");
    else
      $session->msg("d", "Lo siento, la eliminación falló");
    redirect('categoria.php', false);
  } else {
    $sql = "Select name From categories Where id={$i}";
    $cat = find_by_sql($sql);
    $c = "";
    foreach ($cat as $row)
      $c = $row['name'];
  }
}

include_once('layouts/header.php'); ?>

<!--**********************************
            Content body start
        ***********************************-->
<div class="content-body">
  <div class="container-fluid">
    <div class="row page-titles">
      <div class="col p-md-0">
        <h4>Bienvenido, <span><?php echo remove_junk(ucfirst($user['name'])); ?></span></h4>
      </div>
    </div>
    <?php echo display_msg($msg); ?>
    <div id="msj">
    </div>
    <!-- row -->
    <div class="row">
      <div class="col-12">
        <div class="card">
          <li class="breadcrumb-item active p-md-3"> Permisos Del Usuario: <b><?php echo remove_junk(ucfirst($name)) ?></b></li>
          <div class="card-body">
            <div class="table-responsive">
              <table id="tbl" class="display" style="min-width: 845px" ui="<?php echo $id; ?>">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Categoria</th>
                    <th class="text-center">Permiso</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($all_perm as $perm) : ?>
                    <tr>
                      <td><?php echo count_id(); ?></td>
                      <td><?php echo remove_junk(ucfirst($perm['name'])); ?></td>
                      <td class="text-center form-check">
                        <input type="checkbox" class="form-check-input" name="chkPerm" i="<?php echo $perm["id"] ?>" <?php echo $perm["perm"] == "1" ? " checked" : "" ?> />
                      </td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- #/ container -->
</div>
<!--********************************** Content body end ***********************************-->
<!-- Modal Editar Categoria -->
<div class="modal fade modal-editar-categoria" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 id="edTit" class="modal-title">Editando</h5>
        <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
        </button>
      </div>
      <form method="post" action="categoria.php">
        <div class="modal-body">
          <div class="form-group">
            <label for="name">Categoria</label>
            <input id="edId" type="hidden" name="categorie-id">
            <input id="edCat" type="text" class="form-control" name="categorie-name">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          <button type="submit" name="edit_cat" class="btn btn-primary">Actualizar</button>
        </div>
      </form>
    </div>
  </div>
</div>
<?php include_once('layouts/footer.php'); ?>
<script>
  function fEd(i) {
    var o = window.event.srcElement;
    while (o.tagName.toLowerCase() != "tr" && o != null) {
      o = o.parentElement;
    }
    if (o != null) {
      document.getElementById("edId").value = i;
      document.getElementById("edCat").value = o.children[1].innerText;
      document.getElementById("edTit").innerHTML = "Editando <b>" + o.children[1].innerText + "</b>";
      $('.modal-editar-categoria').modal('show');
    }
  }

  $('.form-check-input').each(function() {
    var elem = $(this);
    elem.bind("change", function() {
      var parm = "i=" + elem.attr("i") + "&v=" + elem.prop("checked") + "&u=" + $("#tbl").attr("ui");
      $.ajax({
        type: "POST",
        url: "./chgperm.php",
        data: parm,
        success: function(datos) {
          if (datos.startsWith('Error'))
            t = "danger";
          else
            t = "success";
          fMs(t, datos);
        },
        error: function(jqXHR, textStatus, errorThrown) {
          fMs("danger", "Error al agregar el permiso.");
        }
      });
    })
  })

  function fMs(t, m) {
    $("#msj").html("<div class='alert alert-" + t + "'><span>" + m + "</span><a href='#' class='close' data-dismiss='alert'>&times;</a></div>");
  }
</script>