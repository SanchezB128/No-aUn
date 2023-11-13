<?php include("db.php"); ?>

<?php include('includes/header.php'); ?>

<main class="container p-4">
  <div class="row">
    <div class="col-md-4">
      <!-- MENSAGES -->

      <?php if (isset($_SESSION['message'])) { ?>
      <div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show" role="alert">
        <?= $_SESSION['message']?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?php session_unset(); } ?>

      <!-- ADD TASK FORM -->
      <div class="card card-body">
        <form action="saveTask.php" method="POST">

          <div class="form-group">
            <input type="text" name="nombre" class="form-control" placeholder="nombre" autofocus>
          </div>
          <div class="form-group">
            <textarea name="apellido" rows="2" class="form-control" placeholder="apellido"></textarea>
          </div>
          <div class="form-group">
            <textarea name="direccion" rows="2" class="form-control" placeholder="direccion"></textarea>
          </div>
          <div class="form-group">
            <textarea name="telefono" rows="2" class="form-control" placeholder="telefono"></textarea>
          </div>
          <div class="form-group">
            <textarea name="correo" rows="2" class="form-control" placeholder="correo"></textarea>
          </div>
          <div class="form-group">
          <input type= date name="fechar" type="number" class="form-control"  placeholder=" fechar">
        </div>
        <div class="form-group">
          <input type= date name="FechaN" type="email" class="form-control" placeholder="FechaN">
        </div>
          <input type="submit" name="saveTask" class="btn btn-success btn-block" value="Guardar">
        </form>
      </div>
    </div>
    <div class="col-md-8">
      <table class="table table-bordered">
        <thead>
          <tr>
        
            <th>nombre</th>
            <th>apellido</th>
            <th>direccion</th>
            <th>telefono</th>
            <th>correo</th>
            <th>FechaR</th>
            <th>FechaN</th>
            <th>Accion</th>
          </tr>
        </thead>
        <tbody>

          <?php
          $query = "SELECT * FROM tbl_cliente";
          $result_tasks = mysqli_query($conn, $query);    

          while($row = mysqli_fetch_assoc($result_tasks)) { ?>
          <tr>
            <td><?php echo $row['nombre']; ?></td>
            <td><?php echo $row['apellido']; ?></td>
            <td><?php echo $row['direccion']; ?></td>
            <td><?php echo $row['telefono']; ?></td>
            <td><?php echo $row['correo']; ?></td>
            <td><?php echo $row['fechar']; ?></td>
            <td><?php echo $row['FechaN']; ?></td>
            <td>
              <a href="edit.php?id=<?php echo $row['id']?>" class="btn btn-secondary">
                <i class="fas fa-marker"></i>
              </a><a href="deleteTask.php?id=<?php echo $row['id']?>" class="btn btn-danger">
                <i class="far fa-tras
              h-alt"></i>
              </a>
            </td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</main>

<?php include('includes/footer.php'); ?>