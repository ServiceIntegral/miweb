<?php
require_once('includes/load.php');

if (!isset($_POST['i']) || !isset($_POST['v']) || !isset($_POST['u'])) {
  echo "Error al modificar el permiso 1.";
}
else {
  $i = $_POST['i'];
  $v = $_POST['v'];
  $u = $_POST['u'];

  if ($v == "true") {
    $sql = "Delete From permissions Where iduser={$u} And idcategorie={$i};";
    $db->query($sql);
    $sql = "Insert InTo permissions (iduser, idcategorie) Values ($u, $i);";
  }
  else
    $sql = "Delete From permissions Where iduser={$u} And idcategorie={$i};";

  if ($db->query($sql))
    echo "Permiso modificado exitosamente.";
  else
    echo "Error al modificar el permiso 2.";
}
?>