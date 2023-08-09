@extends('layouts.base') <!-- hereda el código principal de layout base -->

@section('content')
    <div class="modal fade" id="modal-delete-{{ $task->id }}" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">

            <form action="{{ route('tasks.destroy', $task) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <!-- <button type="submit" class="btn btn-danger">Eliminar</button>-->

                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenterTitle">Eliminacion de tareas</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Deseas eliminar el registro de la tarea: {{ $task->title }} ?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
