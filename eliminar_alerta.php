<?php
require_once('includes/load.php');
if (isset($_POST["i"])) {
  $i = $_POST["i"];
  $sql = "Update alerts Set status = 'L' Where Id = $i;";
  if ($db->query($sql)) {
  } else {
    echo 'Error al actualizar la alerta';
  }
} else {
  echo "Error: Parámetro Incorrecto.";
}
