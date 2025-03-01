<?php
$page_title = 'Lista de usuarios';
require_once('includes/load.php');

// Checkin What level user has permission to view this page
page_require_level(2);
// Agregar Usuario
if (isset($_POST['add_user'])) {
  $req_fields = array('a_name', 'a_username', 'a_password', 'a_level');
  validate_fields($req_fields);
  if (empty($errors)) {
    $name   = remove_junk($db->escape($_POST['a_name']));
    $username   = remove_junk($db->escape($_POST['a_username']));
	$mail   = remove_junk($db->escape($_POST['a_mail']));
    $password   = remove_junk($db->escape($_POST['a_password']));
    $user_level = (int)$db->escape($_POST['a_level']);
    $password = sha1($password);
    $query = "INSERT INTO users (name, username, password, user_level, status) ";
    $query .= "VALUES ('$name', '$username', '$password', '$user_level', '1')";
    if ($db->query($query)) {
      //sucess
      $session->msg('s', " Cuenta de usuario ha sido creada");
      redirect('usuarios.php', false);
    } else {
      //failed
      $session->msg('d', ' No se pudo crear la cuenta.');
      redirect('usuarios.php', false);
    }
  } else {
    $session->msg("d", $errors);
    redirect('usuarios.php', false);
  }
}
//Editar Usuario
if (isset($_POST['update'])) {
  $req_fields = array('e_name', 'e_username');
  validate_fields($req_fields);
  if (empty($errors)) {
    $ui = remove_junk($db->escape($_POST['e_id']));
    $name = remove_junk($db->escape($_POST['e_name']));
    $username = remove_junk($db->escape($_POST['e_username']));
	$mail = remove_junk($db->escape($_POST['e_mail']));
    $password = remove_junk($db->escape($_POST['e_password']));
    $user_level = (int)$db->escape($_POST['e_level']);
    $status = (int)$db->escape($_POST['e_status']);
    $password = sha1($password);
    $query = "Update users Set name='$name', mail='$mail', username='$username', user_level='$user_level', status='$status'";
    if ($password != '')
      $query .= ", password='$password'";
    $query .= " Where id=$ui";
    if ($db->query($query)) {
      //sucess
      $session->msg('s', " Cuenta de usuario ha sido actualizada");
      redirect('usuarios.php', false);
    } else {
      //failed
      $session->msg('d', ' No se pudo actualizar la cuenta.');
      redirect('usuarios.php', false);
    }
  } else {
    $session->msg("d", $errors);
    redirect('usuarios.php', false);
  }
}
//Eliminar Usuario
if (isset($_GET['a']) && isset($_GET['i'])) {
  $i = remove_junk($db->escape($_GET['i']));
  $a = remove_junk($db->escape($_GET['a']));
  $query = "Delete From users Where id=$i";
  if ($db->query($query)) {
    //sucess
    $session->msg('s', " Cuenta de usuario ha sido eliminada");
    redirect('usuarios.php', false);
  } else {
    //failed
    $session->msg('d', ' No se pudo eliminar la cuenta.');
    redirect('usuarios.php', false);
  }
}
//pull out all user form database
$all_users = find_all_user();
$groups = find_all('user_groups');

include_once('layouts/header.php');
?>

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
          <li class="breadcrumb-item active">Usuarios</li>
        </ol>
      </div>
    </div>
    <?php echo display_msg($msg); ?>
    <!-- row -->
    <div class="row">
      <div class="col-12">
        <button type="button" class="btn btn-card btn-primary card-title" data-toggle="modal" data-target=".modal-agregar-usuario" onclick="fAd();">Agregar Usuario</button>
        <div class="card">
          <div class="card-body">
            <div class="table-responsive">
              <table id="example" class="display" style="min-width: 845px">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Nombre</th>
                    <th>Usuario</th>
					<th>Correo</th>
                    <th>Rol de Usuario</th>
                    <th>Estado</th>
                    <th>Ultimo Login</th>
                    <th>Acciones</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($all_users as $a_user) : ?>
                    <tr>
                      <td><?php echo count_id(); ?></td>
                      <td><?php echo remove_junk(ucwords($a_user['name'])) ?></td>
                      <td><?php echo remove_junk(ucwords($a_user['username'])) ?></td>
					  <td><?php echo remove_junk(ucwords($a_user['mail'])) ?></td>
                      <td l='<?php echo remove_junk(ucwords($a_user['user_level'])) ?>'><?php echo remove_junk(ucwords($a_user['group_name'])) ?></td>
                      <td> <?php if ($a_user['status'] === '1') : ?>
                          <span class="label label-fixed label-success"><?php echo "Activo"; ?></span>
                        <?php else : ?>
                          <span class="label label-fixed label-danger"><?php echo "Inactivo"; ?></span>
                        <?php endif; ?>
                      </td>
                      <td><?php echo read_date($a_user['last_login']) ?></td>
                      <td>
                        <span>
                          <a href="#" onclick="fEd(this, '<?php echo (int)$a_user['id']; ?>')" data-toggle="tooltip" data-placement="top" title="" class="text-pale-sky p-1" data-original-title="Editar">
                            <i class="fa fa-pencil"></i>
                          </a>
                          <a href="usuarios.php?a=d&i=<?php echo (int)$a_user['id']; ?>" data-toggle="tooltip" data-placement="top" title="" class="text-pale-sky p-1" data-original-title="Eliminar">
                            <i class="fa fa-close"></i>
                          </a>
                          <a href="permisos.php?id=<?php echo (int)$a_user['id']; ?>" data-toggle="tooltip" data-placement="top" title="" class="text-pale-sky p-1" data-original-title="Permisos">
                            <i class="fa fa-eye"></i>
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
<!-- Modal Agregar Usuario -->
<div class="modal fade modal-agregar-usuario" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Agregar usuario</h5>
        <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="usuarios.php">
          <div class="form-group">
            <label for="a_name">Nombre</label>
            <input id="a_name" type="text" class="form-control" name="a_name" placeholder="Nombre completo" required>
          </div>
          <div class="form-group">
            <label for="a_username">Usuario</label>
            <input id="a_username" type="text" class="form-control" name="a_username" placeholder="Nombre de usuario">
          </div>
          <div class="form-group">
            <label for="a_mail">Correo</label>
            <input id="a_mail" type="text" class="form-control" name="a_mail" placeholder="Correo electrónico">
          </div>
          <div class="form-group">
            <label for="a_password">Contraseña</label>
            <input id="a_password" type="password" class="form-control" name="a_password" placeholder="Contraseña">
          </div>
          <div class="form-group">
            <label for="a_level">Rol de usuario</label>
            <select class="form-control" name="a_level">
              <?php foreach ($groups as $group) : ?>
                <option value="<?php echo $group['group_level']; ?>">
                  <?php echo ucwords($group['group_name']); ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            <button type="submit" name="add_user" class="btn btn-primary">Guardar</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Modal Editar Usuario -->
<div id="dvModal" class="modal fade modal-editar-usuario" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Editar usuario</h5>
        <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="usuarios.php" class="clearfix">
          <div class="form-group">
            <label for="e_id" class="control-label">Id</label>
            <input id="e_id" name="e_id" type="text" class="form-control" readonly>
          </div>
          <div class="form-group">
            <label for="e_name" class="control-label">Nombre</label>
            <input id="e_name" name="e_name" type="name" class="form-control">
          </div>
          <div class="form-group">
            <label for="e_username" class="control-label">Usuario</label>
            <input id="e_username" name="e_username" type="text" class="form-control">
          </div>
	      <div class="form-group">
            <label for="e_mail" class="control-label">Correo</label>
            <input id="e_mail" name="e_mail" type="text" class="form-control">
          </div>
          <div class="form-group">
            <label for="e_level">Rol de usuario</label>
            <select id="e_level" class="form-control" name="e_level">
              <?php foreach ($groups as $group) : ?>
                <option value="<?php echo $group['group_level']; ?>"><?php echo ucwords($group['group_name']); ?>
                </option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="form-group">
            <label for="e_status">Estado</label>
            <select id="e_status" class="form-control" name="e_status">
              <option value="1">Activo
              </option>
              <option value="0">Inactivo
              </option>
            </select>
          </div>
          <div class="form-group">
            <label for="e_password" class="control-label">Contraseña</label>
            <input id="e_password" type="e_password" class="form-control" name="password" placeholder="Ingresa la nueva contraseña">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            <button type="submit" name="update" class="btn btn-info">Actualizar</button>
          </div>
        </form>       
      </div>
    </div>
  </div>
</div>

<?php include_once('layouts/footer.php'); ?>
<script>
  function fAd() {
    $("#a_name").focus();
    $("#a_name").val("");
    $("#a_username").val("");
	$("#a_mail").val("");
    $("#a_password").val("");
  }

  function fEd(o, i) {
    var lrRw = $(o).parents("tr");
    $("#e_name").focus();
    $("#e_id").val(i);
    $("#e_password").val("");
    $("#e_name").val(lrRw.find("td:eq(1)").text());
    $("#e_username").val(lrRw.find("td:eq(2)").text());
	$("#e_mail").val(lrRw.find("td:eq(3)").text());
    $("#e_level").val(lrRw.find("td:eq(4)").attr('l'));
    $("#e_status").val(lrRw.find("td:eq(5)").text().trim() == "Activo" ? "1" : "0");
    $("#dvModal").modal("show");
    return true;
  }
</script>