<?php

namespace App\Http\Controllers;

use Illuminate\Console\View\Components\Task;
use Illuminate\Http\Request;

use App\Models\ToDoList;

class ToDoListController extends Controller
{
    public function index() 
    {
        return view('Index');
    }

    public function storeTask(Request $request)
    {
        $task = new ToDoList;

        $task->name = $request->name;

        $task->save();
        return redirect()->route('index');
    }

    public function getTasks()
    {
        $task = ToDoList::all();
        return response()->json($task);
    }

    public function editTask(Request $request)
    {
        $data = [
            'name'=>$request->name
        ];
        $task = ToDoList::find($request->id);
        $task->update($data);
        return response()->json($task);
    }

    public function deleteTask(Request $dados)
    {
        ToDoList::findOrFail($dados->id)->delete();
        return response()->json('Excluído com sucesso!');
    }
}
