<div class="modal" tabindex="-1" aria-labelledby="nuevoModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title fs-5" id="nuevoModalLabel">Registrar</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="guardar.php" method="POST" enctype="multipart/form-data">

          <div class="mb3">
            <label for="nombre" class="form-label">Nombre y apellido:</label>
            <input type="text" name="nombre" id="nombre" class="form-control" required>
          </div>
          <div class="mb3">
            <label for="telefono" class="form-label">Telefono:</label>
            <input text="text" name="telefono" id="telefono" class="form-control" required>
          </div>
          <div class="mb3">
            <label for="dni" class="form-label">DNI:</label>
            <input type="text" name="dni" id="dni" class="form-control" required>
          </div>
          <div class="mb3">
            <label for="trabajo" class="form-label">Trabajo realizado:</label>
            <input type="text" name="trabajo" id="trabajo" class="form-control" required>
          </div>
          <div class="mb3">
            <input type="date" name="fecha" id="fecha" class="form-control" required>
          </div>
          <div class="mb3">
            <label for="estilista" class="form-label">Estilista:</label>
            <input type="text" name="estilista" id="estilista" class="form-control" required>
          </div>
          <div class="mb3">
            <label for="instagram" class="form-label">Instagram:</label>
            <input type="text" name="instagram" id="instagram" class="form-control" required>
          </div>

          <div class="">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btn-primary"><i class="bi bi-save"></i>Guardar</button>
          </div>
        
        </form>
      </div>
    </div>
  </div>
</div>