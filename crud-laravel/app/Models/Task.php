<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    //Laravel proporciona un atributo llamado fillable que permite especificar qué campos se pueden asignar masivamente
    //es decir lo que no se encuentre declarado en este atributo no se podrá asignar masivamente 
    //EVITAMOS que se pueda modificar la data sensible de forma masiva por un usuario malicioso
    protected $fillable = ['title','description','due_date','status'];

}
