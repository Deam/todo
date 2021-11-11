@extends('layouts.app')

@section('title')
    Details
@endsection

@section('content')

    <div class="d-flex justify-content-center">
        <div class="card mt-5 col-md-6 col-sm-12">
            <div class="alert alert-primary" role="alert">
                <div class="d-flex flex-row align-items-center">
                    <div>
                        <finish-todo :todo-status="'{{ $todo->done }}'" :todo-id="'{{ $todo->id }}'"></finish-todo>
                    </div>
                    <div>This todo item is {{ $todo->done ? 'done' : 'not done' }}</div>
                </div>
            </div>
            <div class="card-body">
                <div class="d-flex bd-highlight mb-2">
                    <div class="bd-highlight">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Name</label>
                            <h5 class="card-title">
                                {{$todo->title}}
                            </h5>
                        </div>
                    </div>
                </div>
                <div class="d-flex bd-highlight mb-2">
                    <div class="bd-highlight">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Description</label>
                            <p class="card-text">{{$todo->description}}</p>
                        </div>
                    </div>
                </div>

            </div>
            <hr />
            <div class="card-body">
                <div class="d-flex mb-3 bd-highlight align-items-center">
                    <div class="bd-highlight">
                        <a href="/edit/{{$todo->id}}"><span class="btn btn-primary btn-block">Edit</span></a>
                    </div>
                    <div class="ms-auto bd-highlight">
                        <delete-todo :todo-id="'{{ $todo->id }}'"></delete-todo>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection