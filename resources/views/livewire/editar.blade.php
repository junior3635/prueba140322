<!-- Modal -->
<div class="modal fade" id="addcoment" tabindex="-1" aria-labelledby="addcomentLabel" aria-hidden="true" wire:ignore.seft>
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="addcomentLabel">Añadir Comentario</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="form-group">
                <label for="">Comentario</label>
                <textarea class="form-control" name="comentario" id="" cols="10" rows="10" wire:model="comentario"></textarea>
                @error('comentario') <span>{{$message}}</span> @enderror
            </div>
            <br>

            <div class="form-group">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                <button wire:click="update" class="btn btn-primary" data-bs-dismiss="modal">Añadir</button>
            </div>
            <br>
        </div>
      </div>
    </div>
  </div>
