@extends('layouts.header')
@section('title', "Course's group")
@section('content')
    <a href="{{ route('courses.index') }}">Regresar</a>
    <h1>{{$post->title ?? ""}}</h1>
    <ul>
        <li>Description: {{$post->description ?? ""}}</li>
        <li>Category: {{$post->category ?? ""}}</li>
        <li>Created at: {{$post->created_at ?? ""}}</li>
        <li>Updated at: {{$post->updated_at ?? ""}}</li>
    </ul>
    <a href="{{ route("courses.edit", $post) }}">
        <button style="text-decoration: none; color: black">
            Editar
        </button>
    </a>
    <form action="{{ route("courses.destroy", $post) }}" method="POST">
        @csrf
        @method("DELETE")
        <button type="submit">Eliminar</button>
    </form>
@endsection
