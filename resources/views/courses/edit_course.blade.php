@extends('layouts.header')
@section('title', "Course")
@section('content')
    <h1>Vamos a actualizar el curso</h1>
    <a href="{{ route("courses.get_course", $post) }}">
        <button style="text-decoration: none; color: black">
            Regresar
        </button>
    </a>
    <form action="{{ route("courses.update", $post) }}" method="POST">
        @csrf
        @method("PUT")
        <label for="title">Título</label>
        <input type="text" name="title" id="title" value="{{old("title") ?: $post->title}}" required>
        @error('title')
            <p><strong>{{ $message }}</strong></p>
        @enderror
        <br>
        <label for="description">Descripción</label>
        <textarea type="text" name="description" id="description" required
        >{{old("description") ?: $post->description}}</textarea>
        @error('description')
            <p><strong>{{ $message }}</strong></p>
        @enderror
        <br>
        <label for="category">Categoría</label>
            <select name="category" id="category">
                <option disabled selected>Selecciona una categoría</option>
                @foreach ($categories as $category)
                    <option value="{{$category}}" 
                        @if( old("category") == $category ) selected 
                        @elseif( $category == $post->category && !old("category") ) selected 
                        @endif
                    >{{$category}}</option>
                @endforeach
            </select>
            @error('category')
                <p><strong>{{ $message }}</strong></p>
            @enderror
        <br>
        <button type="submit">Editar</button>
    </form>
@endsection