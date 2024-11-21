@extends('layouts.header')
@section('title', "Course")
@section('content')
    <a href="{{ route('courses.index') }}">Regresar</a>
    <h1>Vamos a crear un curso</h1>
    <form action="{{ route('courses.store') }}" method="post">
        @csrf
        <label for="title">Título</label>
        <input type="text" name="title" id="title" value="{{old('title')}}" required>
        @error('title')
            <p><strong>{{ $message }}</strong></p>
        @enderror
        <br>
        <label for="description">Descripción</label>
        <input type="text" name="description" id="description" value="{{old('description')}}" required>
        @error('description')
            <p><strong>{{ $message }}</strong></p>
        @enderror
        <br>
        <label for="slug">Slug</label>
        <input type="text" name="slug" id="slug" value="{{old('slug')}}" required>
        @error('slug')
            <p><strong>{{ $message }}</strong></p>
        @enderror
        <br>
        <label for="category">Categoría</label>
            <select name="category" id="category">
                <option disabled selected value="">Selecciona una categoría</option>
                @foreach ($categories as $category)
                    <option value="{{$category}}" 
                        {{ (old("category") == $category ? "selected" : "") }}
                    >{{$category}}</option>
                @endforeach
            </select>
        <br>
        <button type="submit">Crear</button>
    </form>
@endsection