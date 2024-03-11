<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    //
    public function index()   {
        $task = Task::get();
        return view('Task', compact('task'));

   }
   public function store(Request $request)  {
    $request->validate([
        'name' => 'required',
        'description' => 'required',
          ]);
    $input['name'] = $request->name;
    $input['description'] = $request->description;
    $input['completed'] = false;
     Task::create($input);
      return redirect('generate')
    ->with('success', 'Task Created Successfully!');
}
public function edit(Task $task){
    return view('TaskEdit',['task' => $task]);
}
public function update(Task $task,Request $request){
    $data = $request->validate([
        'name' => 'required',
        'description' => 'required',
        'completed' => 'boolean',
          ]);
          $task->update($data);
          return redirect('generate')->with('success','Task Updated Successfully');


}
public function delete(Task $task){
    $task ->delete();
    return redirect('generate')->with('success','Link Deleted Successfully');
}


}
