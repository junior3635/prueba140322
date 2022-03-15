<div class="row">
    <div class="col-md-3">
        <div class="form-group">
            <H2>Nueva Task</H2>
        </div>
        <div class="form-group">
            <label for="">Titulo</label>
            <input class="form-control" type="text" name="title" wire:model="title">
            @error('title') <span>{{$message}}</span> @enderror
        </div>
        <div class="form-group">
            <label for="">Contenido</label>
            <textarea class="form-control" name="task" id="" cols="10" rows="10" wire:model="task"></textarea>
            @error('task') <span>{{$message}}</span> @enderror
        </div>
        <div class="form-group" style="position: relative">
            <label for="">Fecha de expiracion</label>
            <input class="form-control" type="datetime" id="datepicker" name="date_max" wire:model="date_max">
            @error('date_max') <span>{{$message}}</span> @enderror
        </div>
        <br>
        <div class="form-group">
            <button wire:click="store" class="btn btn-primary">Crear Tarea</button>
        </div>
        <br>


    </div>
    <div class="col-md-9">
        <table class="table">
            <thead>
             <th>#</th>
             <th>Title</th>
             <th>Task</th>
             <th>Fecha Maxima</th>
             <th>Opciones</th>
            </thead>
            <tbody>
                @foreach ($tasks as $task)
                @if($fechaActual > $task['date_max'])
                <tr style="background: red;">
                @else
                <tr>
                @endif
                        <td>{{$task['id']}}</td>
                        <td>{{$task['title']}}</td>
                        <td>{{$task['task']}}</td>
                        <td>{{$task['date_max']}}</td>
                        <td>
                            <div class="form-group">
                                @if ($task['user_id'] == $user)
                                <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#comments">
                                    Logs
                                  </button>
                                  <!-- Modal -->
                                    <div class="modal fade" id="comments" tabindex="-1" aria-labelledby="commentsLabel" aria-hidden="true" wire:ignore.seft>
                                        <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                            <h5 class="modal-title" id="commentsLabel">Modal title</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                            @foreach ($task['comments'] as $log)
                                            <strong>{{$log['accion']}}</strong><br>
                                            <span>{{$log['comentario']}}</span>
                                            <br>
                                            <br>
                                            @endforeach
                                            </div>
                                            <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                <button wire:click="edit({{$task['id']}})" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#addcoment">
                                    Comentar
                                  </button>
                                @endif
                            </div>
                        </td>


                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- Button trigger modal -->
    @include('livewire.editar')



    <script>
        $( function() {
          $('#datepicker').datepicker(
            {
                dateFormat: 'yy-mm-dd'
            }
          );
          $('#datepicker').on('change', function (e) {
             @this.set('date_max', e.target.value);
      });
        } );
        </script>

</div>
