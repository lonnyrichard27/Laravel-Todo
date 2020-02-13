@extends('layouts/app')

@section('content')
<h1 class="text-center my-5">{{$todo->name}}</h1>
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card card-default">
            <div class="card-header">
                Details
            </div>
                <div class="card-body">
                {{$todo->description }}
                </div>
            
        </div>
        <a href="/todos/{{ $todo->id }}/edit" class="btn btn-info float-right text-white btn-sm my-3">Edit</a>
        <a href="/todos/{{ $todo->id }}/delete" class="btn btn-danger text-white btn-sm my-3">Delete</a>
    </div>
</div>
@endsection