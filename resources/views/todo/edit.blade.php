@extends('layouts.app')
@section('title')
    Edit Todo
@endsection
@section('content')

    <edit-todo :edit-id="'{{ $todo->id }}'"></edit-todo>

@endsection