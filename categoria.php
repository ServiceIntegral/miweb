<?php
$page_title = 'Lista de categorías';
require_once('includes/load.php');
// Checkin What level user has permission to view this page
page_require_level(2);

$all_categories = find_all('categories');

// Agregar Categoria
if (isset($_POST['add_cat'])) {
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
      <div class="col p-md-0">
        <ol class="breadcrumb">
          <li class="breadcrumb-item active">Categorías</li>
        </ol>
      </div>
    </div>
    <?php echo display_msg($msg); ?>
    <!-- row -->
    <div class="row">
      <div class="col-12">
        <button type="button" class="btn btn-card btn-primary card-title" data-toggle="modal" data-target=".modal-agregar-categoria">Agregar Categoria</button>
        <div class="card">
          <div class="card-body">
            <div class="table-responsive">
              <table id="example" class="display" style="min-width: 845px">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Categoria</th>
                    <th>Acciones</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($all_categories as $cat) : ?>
                    <tr>
                      <td><?php echo count_id(); ?></td>
                      <td><?php echo remove_junk(ucfirst($cat['name'])); ?></td>
                      <td>
                        <span>
                          <a href="#" onclick="fEd('<?php echo $cat['id']; ?>');" data-toggle="tooltip" data-placement="top" title="" class="text-pale-sky" data-original-title="Editar">
                            <i class="fa fa-pencil"></i>
                          </a>
                          <a href="categoria.php?a=d&i=<?php echo (int)$cat['id']; ?>" data-toggle="tooltip" data-placement="top" title="" class="text-pale-sky" data-original-title="Eliminar">
                            <i class="fa fa-close"></i>
                          </a>
                        </span>
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
<!--**********************************
            Content body end
        ***********************************-->
<!-- Modal Agregar Categoria -->
<div class="modal fade modal-agregar-categoria" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Agregar Categoria</h5>
        <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
        </button>
      </div>
      <form method="post" action="categoria.php">
        <div class="modal-body">
          <div class="form-group">
            <label for="name">Categoria</label>
            <input type="text" class="form-control" name="categorie-name" placeholder="Nombre de la Categoria" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          <button type="submit" name="add_cat" class="btn btn-primary">Guardar</button>
        </div>
      </form>
    </div>
  </div>
</div>

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
</script>