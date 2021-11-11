@extends('layouts.app')
@section('title')
    Edit Todo
@endsection
@section('content')

    <edit-category :category-id="'{{ $category->id }}'" />

@endsection