<?php

include('db.php');

if (isset($_POST['saveTask'])) {

  $nombre = $_POST['nombre'];
  $apellido = $_POST['apellido'];
  $direccion = $_POST['direccion'];
  $telefono = $_POST['telefono'];
  $correo = $_POST['correo'];
  $fechar = $_POST['fechar'];
  $FechaN = $_POST['FechaN'];
  $query = "INSERT INTO tbl_cliente(nombre, apellido,direccion,telefono,correo,fechar,FechaN) VALUES ('$nombre', '$apellido', '$direccion', '$telefono', '$correo', '$fechar', '$FechaN')";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Query Failed.");
  }

  $_SESSION['message'] = 'Guardado Correctamente';
  $_SESSION['message_type'] = 'success';
  header('Location: index.php');

}

?>