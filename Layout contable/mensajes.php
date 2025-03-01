<?php
$page_title = 'Lista de mensajes';
require_once('includes/load.php');
// Checkin What level user has permission to view this page
page_require_level(1);

$all_messages = find_all('messages');
// Agregar Mensaje
 if (isset($_POST['add_message'])) {
   $req_fields = array('a_message');
   validate_fields($req_field);
   if (empty($errors)) {
     $message   = remove_junk($db->escape($_POST['a_message']));
     $sql = "INSERT INTO messages (message)";
     $sql .= "VALUES ('{$message}')";	 
     if ($db->query($sql)) {
       //sucess
       $session->msg('s', " El mensaje se ha enviado");
       redirect('mensajes.php', false);
     } else {
      //failed
      $session->msg('d', ' No se pudo enviar el mensaje.');
       redirect('mensajes.php', false);
     }
   } else {
     $session->msg("d", $errors);
     redirect('mensajes.php', false);
   }
 }

// Editar Categoria 
if (isset($_POST['edit_message'])) {
  $req_field = array('e_message');
  validate_fields($req_field);
  $mes_id = remove_junk($db->escape($_POST['message-id']));
  $message = remove_junk($db->escape($_POST['e_message']));
  if (empty($errors)) {
    $sql = "UPDATE messages SET message='{$message}'";
    $sql .= " WHERE id='{$mes_id}'";
    $result = $db->query($sql);
    if ($result && $db->affected_rows() === 1) {
      $session->msg("s", "Mensaje actualizado con éxito.");
      redirect('mensajes.php', false);
    } else {
      $session->msg("d", "Lo siento, actualización falló.");
      redirect('mensajes.php', false);
    }
  } else {
    $session->msg("d", $errors);
    redirect('mensajes.php', false);
  }
}

//Eliminar Mensaje
if (isset($_GET['a']) && isset($_GET['i'])) {
  $a = $_GET['a'];
  $i = $_GET['i'];
  if ($a == "d") {
    $sql  = "Delete From messages Where id={$i};";
    if ($db->query($sql))
      $session->msg("s", "Mensaje eliminado exitosamente.");
    else
      $session->msg("d", "Lo siento, la eliminación falló");
    redirect('mensajes.php', false);
  } else {
    $sql = "Select name From messages Where id={$i}";
    $message = find_by_sql($sql);
    $m = "";
    foreach ($message as $row)
      $m = $row['message'];
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
                    <li class="breadcrumb-item active">Mensajes</li>
                </ol>
            </div>
        </div>
        <?php echo display_msg($msg); ?>
        <!-- row -->
        <div class="row">
            <div class="col-xl-12">
                <div class="card transparent-card">
                    <div class="card-header pt-0 pb-4 d-flex justify-content-between align-items-center">
                        <button type="button" class="btn btn-card btn-primary card-title" data-toggle="modal"
                            data-target=".modal-agregar-mensaje">Enviar Mensaje</button>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-padded table-responsive-fix-big">
                                <thead>
                                    <tr>
                                        <th>Mensaje</th>
                                        <th>Fecha Envio</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($all_messages as $message) : ?>
                                    <tr>
                                    <td><?php echo remove_junk(ucfirst($message['message'])); ?></td>
                                    <td><?php echo remove_junk(ucfirst($message['date'])); ?></td>
                                    <td>
                        <span>
                          <a href="#" onclick="fEd('<?php echo $message['id']; ?>');" data-toggle="tooltip" data-placement="top" title="" class="text-pale-sky" data-original-title="Editar">
                            <i class="fa fa-pencil"></i>
                          </a>
                          <a href="mensajes.php?a=d&i=<?php echo (int)$message['id']; ?>" data-toggle="tooltip" data-placement="top" title="" class="text-pale-sky" data-original-title="Eliminar">
                            <i class="fa fa-close"></i>
                          </a>
                        </span>
                      </td>
                                    </tr>
                                    <?php endforeach;?>
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
<!-- Modal Agregar Mensaje -->
<div class="modal fade modal-agregar-mensaje" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 id="edTit" class="modal-title">Agregar Mensaje</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <form method="post" action="mensajes.php">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="a_message">Mensaje</label>
                        <textarea class="form-control" id="a_message" name="a_message" rows="10" placeholder="Escibe el Mensaje"
                            required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" name="add_message" class="btn btn-primary">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Editar Categoria -->
<div id="dvModal" class="modal fade modal-editar-mensaje" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 id="edTit" class="modal-title">Editando</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <form method="post" action="mensajes.php">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="e_message">Mensaje</label>
						<input id="edId" type="hidden" name="message-id">
                        <textarea id="edMes" class="form-control" name="e_message" rows="10"
                            required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" name="edit_message" class="btn btn-primary">Actualizar</button>
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
      document.getElementById("edMes").value = o.children[0].innerText;
      document.getElementById("edTit").innerHTML = "Editando <b>" + o.children[1].innerText + "</b>";
      $('.modal-editar-mensaje').modal('show');
    }
  }
</script>