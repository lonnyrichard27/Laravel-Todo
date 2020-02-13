@extends('layouts/app')

@section('content')
<h1 class="text-center my-5">Create Todos</h1>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-default">
                <div class="card-header">Create new todo</div>
                    <div class="card-body">
                        @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                
                                <li class="list-group-item">
                                    {{ $error }}     
                                </li>

                                @endforeach
                            </ul>
                        </div>
                        @endif
                        <form action="/store-todos" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="">Name:</label>
                                <input type="text" class="form-control" name="name" placeholder="Name">
                            </div>
                            <div class="form-group">
                                <label for="">Description:</label>
                                <textarea type="text" class="form-control" id="" cols="5" rows="5" name="description" placeholder="Description"></textarea>
                            </div>
                            <div class="form-group float-right">
                                <button class="btn btn-success" type="submit">Create Todo</button>
                            </div>
                        </form>
                    </div>
            </div>
        </div>
    </div>
@endsection
