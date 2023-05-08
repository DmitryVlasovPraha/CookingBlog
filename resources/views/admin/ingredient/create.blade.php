@extends('layout.admin', ['title' => 'Создание новой страницы'])

@section('content')
    <h1>Создание новой страницы</h1>
    <form method="post" action="{{ route('admin.ingredient.store') }}">
        @include('admin.ingredient.part.form')
    </form>
@endsection
