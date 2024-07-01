<?php
session_start();
if (!isset($_SESSION['nombre'])) {
    // Si no hay sesión iniciada, redirigir a login.html
    header("Location: login.html");
    exit();
}

include 'db.php';

// Obtener datos de la base de datos
$sql = "SELECT * FROM crud";
$result = $conn->query($sql);

if ($result === false) {
    die("Error en la consulta SQL: " . $conn->error);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <link rel="stylesheet" href="style.css">
  <title>New Station</title>
</head>

<body>
  <div class="container w-100 pt-2">
    <h2>New Station</h2>

    <form class="form-inline w-25">
      <input class="form-control mr-sm-2" type="search" aria-label="Search">
      <button class="btn" type="submit">Buscar</button>
      <!--Boton modal-->
      <button type="button" class="btn btn-primary m-2" data-bs-toggle="modal"
        data-bs-target="#exampleModal">Registrar</button>
  </div>

  <!--tabla de datos a ingresar-->
  <table class="table text-center">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Nombre y apellido</th>
        <th scope="col">Telefono</th>
        <th scope="col">DNI</th>
        <th scope="col">Trabajo realizado</th>
        <th scope="col">Fecha</th>
        <th scope="col">Estilista</th>
        <th scope="col">Instagram</th>
      </tr>
    </thead>
    <tbody>
      <?php while ($row = $result->fetch_assoc()): ?>
      <tr>
        <td><?php echo $row['id']; ?></td>
        <td><?php echo htmlspecialchars($row['nombre']); ?></td>
        <td><?php echo htmlspecialchars($row['telefono']); ?></td>
        <td><?php echo htmlspecialchars($row['dni']); ?></td>
        <td><?php echo htmlspecialchars($row['trabajo_realizado']); ?></td>
        <td><?php echo htmlspecialchars($row['fecha']); ?></td>
        <td><?php echo htmlspecialchars($row['estilista']); ?></td>
        <td><?php echo htmlspecialchars($row['instagram']); ?></td>
      </tr>
      <?php endwhile; ?>
    </tbody>
  </table>

  <!--Modal-->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Registro de Clientas</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

          <form action="guardar.php" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
              <label for="nombre" class="form-label">Nombre y apellido:</label>
              <input type="text" name="nombre" id="nombre" class="form-control" required>
            </div>
            <div class="mb-3">
              <label for="telefono" class="form-label">Telefono:</label>
              <input type="text" name="telefono" id="telefono" class="form-control" required>
            </div>
            <div class="mb-3">
              <label for="dni" class="form-label">DNI:</label>
              <input type="text" name="dni" id="dni" class="form-control" required>
            </div>
            <div class="mb-3">
              <label for="trabajo_realizado" class="form-label">Trabajo Realizado:</label>
              <textarea class="form-control" name="trabajo_realizado" id="trabajo_realizado" rows="3"></textarea>
            </div>
            <div class="mb-3">
              <label for="fecha" class="form-label">Fecha:</label>
              <input type="date" name="fecha" id="fecha" class="form-control mt-2" required>
            </div>
            <div class="mb-3">
              <label for="estilista" class="form-label">Estilista:</label>
              <input type="text" name="estilista" id="estilista" class="form-control" required>
            </div>
            <div class="mb-3">
              <label for="instagram" class="form-label">Instagram:</label>
              <input type="text" name="instagram" id="instagram" class="form-control" required>
            </div>

            <div class="">
              <button type="button" class="btn btn-secondary mt-2" data-bs-dismiss="modal">Cerrar</button>
            </div>
            <div class="">
              <button type="submit" class="btn btn-primary mt-2"><i class="bi bi-save"></i>Guardar</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>
</html>

<?php
$conn->close();
?>
