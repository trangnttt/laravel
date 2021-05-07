<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use App\Models\Todo;
use Illuminate\Support\Facades\Validator;


class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $obj  = new Todo;
        // $data = $obj->get();
        // return response()->json(['status' => 'OK', 'data' => $data]);


        $obj = new Todo;
        $search =  $request->query('search');
        if(!empty($search)) {
            $data = $obj
            ->where('title', 'LIKE', "%{$search}%")
            ->orWhere('project', 'LIKE', "%{$search}%")
            ->paginate(5)->appends(['search' => $request->search]);
        }
        else {
            $data = $obj->get();
        }
        return response()->json(['status' => 'OK', 'data' => $data]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'title' => 'required|min:3|max:255|string|unique:todos',
            'project' => 'required|min:3|max:255|string',
            'status' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }
        else {
            $todo = new Todo;
            $todo->title = $request->title;
            $todo->project = $request->project;
            $todo->status = $request->status;
            $todo->save();
            return response()->json(['status' => 'OK', 'data' => $request->all()]);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Todo::find($id);
        return response()->json(['status' => 'OK', 'data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $todo = Todo::find($id);
        $todo->title = $request->title;
        $todo->project = $request->project;
        $todo->status = $request->status;
        $todo->save();
        return response()->json(['status' => 'OK', 'data' => $request->all()]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $todo = Todo::find($request->id);
        $todo->delete();
        return response()->json(['status' => 'OK', 'data' => 'pass']);
    }
}
