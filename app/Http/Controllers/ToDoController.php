<?php

namespace App\Http\Controllers;

use App\ToDo;
use App\Http\Resources\ToDoResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ToDoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response(ToDoResource::collection(ToDo::all(), 200));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = Validator::make($request->toArray(),[
            'name' => 'required',
            'status' => 'required'
        ]);
        if($validate->fails()){
            return response($validate->errors(), 400);
        }

        return response(new ToDoResource(ToDo::create($validate->validate())), 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(ToDo $todo)
    {
        return response(new TodoResource($todo), 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ToDo $todo)
    {
        $validate = Validator::make($request->toArray(),[
            'name' => 'required',
            'status' => 'required'
        ]);
        if($validate->fails()){
            return response($validate->errors(), 400);
        }
        $todo->update($validate->validate());
        return response(new ToDoResource($todo), 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(ToDo $todo)
    {
        
        $todo->delete();
        return response(null, 204);
    }
}
