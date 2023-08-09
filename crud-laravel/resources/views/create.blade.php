@extends('layouts.base') <!-- hereda el código principal de layout base -->

@section('content') <!-- permite insertar el contenido especifico para cada vista que fue lo que declaramos en el layout-->
<div class="row">
    <div class="col-12">
        <div>
            <h2>Crear Tarea</h2> <!--//header del formulario-->
        </div>
        <div>
            <a href="{{route('tasks.index')}}" class="btn btn-primary">Volver</a> <!--//botón para volver a la vista principal-->
        </div>
    </div>




    @if ($errors->any()) <!--si hay errores en el formulario se muestra un mensaje de error-->
    <div class="alert alert-danger mt-2">
        <strong>Por las chancas de mi madre!</strong> Algo fue mal..<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


<!--
formulario para crear una nueva tarea
-- se usa el método POST para enviar los datos del formulario
----se usa el método route para indicar la ruta a la que se va a enviar los datos
------- si no estamos seguros de la ruta se puede usar el comando php artisan route:list para ver las rutas creadas y como podemos acceder a ellas
- es importante que el método del formulario coincida con el método de la ruta a la que se va a enviar los datos para que este pueda ser procesado
-->
    <form action="{{route('tasks.store')}}" method="POST">  
        @csrf <!--//directiva de blade para evitar ataques de tipo cross-site request forgery sin ello Laravel no permite levantar la pagina-->
        <div class="row"> 
            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                <div class="form-group">
                    <strong>Tarea:</strong> 
                    <!--// en los inputs se usa el name para identificar los datos que se van a enviar 
                    //se recomienda usar el mismo nombre de la columna de la tabla en la base de datos
                    //para que se entienda a a donde se van a almacenar los datos-->
                    <input type="text" name="title" class="form-control" placeholder="Tarea" >
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                <div class="form-group">
                    <strong>Descripción:</strong>
                    <textarea class="form-control" style="height:150px" name="description" placeholder="Descripción..."></textarea>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-6 mt-2">
                <div class="form-group">
                    <strong>Fecha límite:</strong>
                    <input type="date" name="due_date" class="form-control" id="">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-6 mt-2">
                <div class="form-group">
                    <strong>Estado (inicial):</strong>
                    <select name="status" class="form-select" id="">
                        <option value="">-- Elige el status --</option>
                        <option value="Pendiente">Pendiente</option>
                        <option value="En progreso">En progreso</option>
                        <option value="Completado">Completado</option>
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center mt-2">
                <button type="submit" class="btn btn-primary">Crear</button>
            </div>
        </div>
    </form>
</div>
@endsection