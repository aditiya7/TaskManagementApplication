<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Task;
use Illuminate\Support\Facades\Validator;


class ApiTaskController extends Controller
{
    //
    public function TaskView(){

        $task = Task::all();
        $data=[
            'status' =>'200',
            'name' =>$task,
            'description' =>$task
        ];
        return response()->json($data,200);

        
    }
    public function Upload(Request $request){
        $validator = Validator::make($request->all(),
        ['name' =>'required',
        'description' => 'required',]
        
       );
       if($validator->fails()){
        return response()->json([
            'status' => false,
            'message' => 'validation error',
            'errors' => $validator->errors()
        ], 401);
    }
    
    $task = Task::create([
        'name' => $request->name,
        'description' =>$request->description,
        'completed' =>'false',
    ]);
    return response()->json($task);
    
    
    }
}
