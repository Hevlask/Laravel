<?php

namespace App\Http\Controllers;

use App\Models\Task; //importamos el modelo
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Redirect;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View

    //vista principal
    {
        //
        $tasks = Task::latest()->paginate(5); //obtiene todas las tareas de la base de datos desde el ultimo registro hasta el primero
        return view('index', ['tasks' => $tasks]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View ///vista para crear una nueva tarea
    {
        //
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse //recibe los datos del formulario
    {
        request()->validate([ //valida los datos que se reciben del formulario
            'title' => 'required',
            'description' => 'required',
        ]);
        //dd($request->all()); //muestra los datos que se reciben del formulario create.blade.php en una especie de console.log
        Task::create($request->all()); //crea una nueva tarea con los datos recibidos del formulario

        // arroja un error de asignación masiva porque no se ha configurado el MODELO task para que acepte los datos que se reciben del formulario
        return redirect()->route('tasks.index')->with('success', 'Registro exitoso... Hasta que por fin haces algo bien'); //WITH permite enviar un mensaje de éxito a la vista principal
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task) //vista para mostrar una tarea
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task): View //vista para editar una tarea
    {
        //para ver los datos que recibe el formulario de edición 
        //la ruta es tasks/{task}/edit === donde {task} es el id de la tarea
        return view('edit', ['task' => $task]); //mandamos los datos de la tarea a la vista edit
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task): RedirectResponse //recibe los datos para actualizar el formulario 
    {
        //dd($request -> all());

        request()->validate([ //valida los datos que se reciben del formulario
            'title' => 'required',
            'description' => 'required',
        ]);
        $task->update($request->all()); //actualiza los datos de la tarea
        return redirect()->route('tasks.index')->with('success', 'Actualización exitosa...'); //WITH permite enviar un mensaje de éxito a la vista principal
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task): RedirectResponse //recibe los datos para eliminar una tarea
    {
        //
        //dd($task);
        $task = Task::find($task->id); //busca la tarea por el id
        $task->delete(); //elimina la tarea
        return  redirect()->route('tasks.index')->with('success', 'Eliminación exitosa...'); //WITH permite enviar un mensaje de éxito a la vista principal
    }
}
