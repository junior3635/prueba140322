<?php

namespace App\Http\Livewire;

use App\Models\Log;
use App\Models\Task;
use App\Mail\LogsEmail;
use Carbon\Carbon;
use Livewire\Component;
use Illuminate\Support\Facades\Mail;

class TaskComponent extends Component
{
    public $task_id,$title, $task, $date_max, $comentario;
    public $logs = [];
    public $view = 'crear';


    public function render()
    {
        $user = request()->user();
        $user->id;
        $tasks = Task::with('comments')->get();
        return view('livewire.task-component',[
            'tasks' => $tasks,
            'user' => $user->id,
            'fechaActual' => Carbon::now()
        ]);
    }


    public function store()
    {
        $user = request()->user();

        $this->validate([
            'title' => 'required',
            'task' => 'required',
            'date_max' => 'required'
        ]);
        $this->date_max =date('Y-m-d', strtotime($this->date_max));

        $Task = new Task;
        $Task->title = $this->title;
        $Task->task = $this->task;
        $Task->date_max = $this->date_max;
        $Task->user_id = $user->id;
        $Task->save();

        $Log = new Log;
        $Log->accion = 'Usuario '.$user->id. ' crea la tarea #'.$Task->id;
        $Log->comentario = 'Nueva Tarea';
        $Log->task_id = $Task->id;
        $Log->save();


        //envio de correo configurar .env
        Mail::to($user->email)->send(new LogsEmail($Log->accion,$user->id));

        $this->reset();

    }

    public function edit($id)
    {

        $task = Task::findOrFail($id);
        $this->task_id = $id;



    }

    public function update()
    {
        $user = request()->user();
        $this->validate([
            'comentario' => 'required',
        ]);

        $Log = new Log;
        $Log->accion = 'El usuario '.$user->id. 'Añadio un nuevo comentario';
        $Log->comentario = $this->comentario;
        $Log->task_id = $this->task_id;
        $Log->save();


        //envio de correo configurar .env
        Mail::to($user->email)->send(new LogsEmail($Log->accion,$user->id));

        $this->reset();

    }
}
