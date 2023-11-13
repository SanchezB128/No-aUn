<?php
include("db.php");
$nombre = '';
$apellido= '';

if  (isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "SELECT * FROM tbl_cliente WHERE id=$id";
  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);
    $nombre = $row['nombre'];
    $apellido = $row['apellido'];
    $direccion = $row['direccion'];
    $telefono = $row['telefono'];
    $correo = $row['correo'];
    $fechar = $row['fechar'];
    $FechaN = $row['FechaN'];
  }
}

if (isset($_POST['update'])) {
  $nombre= $_POST['nombre'];
  $apellido = $_POST['apellido'];
  $direccion = $_POST['direccion'];
  $telefono = $_POST['telefono'];
  $correo = $_POST['correo'];
  $fechar = $_POST['fechar'];
  $FechaN = $_POST['FechaN'];

  $query = "UPDATE tbl_cliente set nombre = '$nombre', apellido = '$apellido', direccion = '$direccion', telefono = '$telefono', correo = '$correo', fechar = '$fechar', FechaN = '$FechaN' WHERE id=$id";
  mysqli_query($conn, $query);
  $_SESSION['message'] = 'Actualizado con Exito';
  $_SESSION['message_type'] = 'warning';
  header('Location: index.php');
}

?>
<?php include('includes/header.php'); ?>
<div class="container p-4">
  <div class="row">
    <div class="col-md-4 mx-auto">
      <div class="card card-body">
      <form action="edit.php?id=<?php echo $_GET['id']; ?>" method="POST">
        <div class="form-group">
          <input name="nombre" type="text" class="form-control" value="<?php echo $nombre; ?>" placeholder="Update nombre">
        </div>
        <div class="form-group">
        <textarea name="apellido" class="form-control" cols="30" rows="10"><?php echo $apellido;?></textarea>
        </div>
        <div class="form-group">
        <textarea name="direccion" class="form-control" cols="30" rows="10"><?php echo $direccion;?></textarea>
        </div>
        <div class="form-group">
        <textarea name="telefono" class="form-control" cols="30" rows="10"><?php echo $telefono;?></textarea>
        </div>
        <div class="form-group">
        <textarea name="correo" class="form-control" cols="30" rows="10"><?php echo $correo;?></textarea>
        </div>
        <div class="form-group">
          <input name="fechar" type="date" class="form-control" value="<?php echo $fechar; ?>" placeholder="fechar">
        </div>
        <div class="form-group">
          <input name="FechaN" type="date" class="form-control" value="<?php echo $FechaN; ?>" placeholder="FechaN">
        </div>
        <button class="btn-success" name="update">
          Update
</button>
      </form>
      </div>
    </div>
  </div>
</div>
<?php include('includes/footer.php'); ?>