<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Todo;

class TodosController extends Controller
{
    public function index(){
        // fetch all todos from database

        // display them in the todos.index page page
        $todos = Todo::all();
        return view('todos/index')->with('todos', $todos); 
    }

    public function show($todoid){

        return view('todos/show')->with('todo', Todo::find($todoid));
    }

    public function create(){
        return view('todos/create');
    }

    public function store(){
        // You can have validation in your controllers just before you handle your db requests

        // validate data so when you try to submit an empty field it redirects you back to the page
        $this->validate(request(),[
            // displayed error messages like 'it must contain 6 letters'
            'name' => 'required|min:6|max:12',
            'description' => 'required'
        ]);

        // request data function
        $data = request()->all();

        // create data in the database i.e submitting to the database
        // instantiate
        $todo = new Todo();
        $todo->name = $data['name'];
        $todo->description = $data['description'];
        $todo->completed = false;

        // save to db
        $todo->save();

        // flash messages or notifications
        session()->flash('success', 'Todo created successfully');
        
        // redirect to another page
        return redirect('/todos');
    }

    public function edit($todoid){

        $todo = Todo::find($todoid);

        return view('todos/edit')->with('todo', $todo);
    }

    public function update($todoid){
        // validate data so when you try to submit an empty field it redirects you back to the page
        $this->validate(request(),[
            // displayed error messages like 'it must contain 6 letters'
            'name' => 'required|min:6|max:12',
            'description' => 'required'
        ]);

        $data = request()->all();

        // flash messages or notifications
        session()->flash('success', 'Todo updated successfully');
        
        // find the todo by id
        $todo = Todo::find($todoid);

        $todo->name = $data['name'];
        $todo->description = $data['description'];

        $todo->save();

        return redirect('/todos');
    }

    public function destroy($todoid){
        // find the todo by id
        $todo = Todo::find($todoid);

        // delete todo in the database
        $todo->delete();

         // flash messages or notifications
         session()->flash('success', 'Todo deleted successfully');

        // route back to todos page after deletion
        return redirect('/todos');
    }

    public function complete($todoid){

        $todo = Todo::find($todoid);
        $todo->completed = true;
        $todo->save();

        session()->flash('success', 'Todo completed successfully');

        return redirect('/todos');
    }
}
