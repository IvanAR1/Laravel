@extends('layouts.header')
@section('title', "Course's group")
@section('content')
    <div class="relative overflow-x-auto mx-4 my-2">
        <a 
        class="flex max-w-max gap-2 bg-gray-200 hover:bg-gray-50 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-full text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-600 dark:focus:ring-gray-700 dark:border-gray-700" 
            href="{{ route('courses.index') }}"
        ><i data-feather="arrow-left" class="w-4"></i>Regresar</a>
        <h1 class="my-4 w-full text-center text-2xl dark:text-gray-50 font-semibold">{{$post->title ?? ""}}</h1>
        <dl class="text-gray-900 divide-y divide-gray-700 dark:text-white dark:divide-gray-200">
            @foreach($post->only(["description", "category", "created_at", "updated_at"]) as $key=>$value)
                <div class="flex flex-col pb-3">
                    <dt class="mb-1 text-gray-500 md:text-lg dark:text-gray-400">{{ucwords(str_replace('_', ' ', $key))}}</dt>
                    <dd class="text-lg font-semibold">{{$value}}</dd>
                </div>
            @endforeach
        </dl>
        <div class="flex flex-row justify-evenly">
            <a href="{{ route("courses.edit", $post) }}">
                <button 
                    class="text-white flex max-w-max gap-2 bg-blue-800 hover:bg-blue-500 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 me-2 mb-2"
                ><i data-feather="edit" class="w-5"></i>Editar</button>
            </a>
            <form action="{{ route("courses.destroy", $post) }}" method="POST">
                @csrf
                @method("DELETE")
                <button 
                    class="text-white flex max-w-max gap-2 bg-red-800 hover:bg-red-500 focus:outline-none focus:ring-4 focus:ring-red-300 font-medium rounded-full text-sm px-5 py-2.5 me-2 mb-2" 
                    type="submit"
                ><i data-feather="trash-2" class="w-5"></i>Eliminar</button>
            </form>
        </div>
    </div>
@endsection
