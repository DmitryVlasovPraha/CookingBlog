@extends('layout.admin', ['title' => 'Создание новой страницы'])

@section('content')
    <h1>Изменение новой страницы</h1>
    <form method="post" action="{{ route('admin.ingredient.update', ['ingredient' => $ingredient->id])}}">
        @method('PUT')
        @include('admin.ingredient.part.form')
    </form>
@endsection
