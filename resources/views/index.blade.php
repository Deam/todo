@extends('layouts.app')
@section('title')
    My Todo App
@endsection
@section('content')

    <div class="row mt-3">
        <div class="d-flex bd-highlight">
            <div class="p-2 w-100 bd-highlight"><h3>Todo's</h3></div>
            <div class="p-2 flex-shrink-1 bd-highlight"><a class="btn btn-primary" href="/create">Create</a></div>
        </div>
        <todos />
    </div>

@endsection