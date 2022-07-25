 <!-- Modal -->
 <div class="modal fade" id="modalRegistro" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">New message</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="" method="post">
          <div class="form-group">
            <label for="nombre_curso" class="col-form-label">Nombre del Curso: </label>
            <input type="text" class="form-control" id="nombre_curso" name="nombre_curso">
          </div>
          <div class="form-group">
            <label for="descripcion" class="col-form-label">Descripción: </label>
            <input type="text" class="form-control" id="descripcion" name="descripcion">
          </div>
          <div class="form-group">
            <label for="duracion" class="col-form-label">Duración: </label>
            <input type="text" class="form-control" id="duracion" name="duracion">
          </div>
          <div class="form-group">
            <label for="imagen" class="col-form-label">Imagen: </label>
            <input type="text" class="form-control" id="imagen" name="imagen">
          </div>

            <input type="submit" name="btn" value="guardar">
            <input type="hidden" name="m" value="guardar">
            
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

</div>