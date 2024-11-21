@extends('layouts.header')
@section('title', "Course")
@section('content')
    <div class="relative overflow-x-auto mx-4 my-2">
        <a 
        class="flex max-w-max gap-2 bg-gray-200 hover:bg-gray-50 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-full text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-600 dark:focus:ring-gray-700 dark:border-gray-700" 
            href="{{ route("courses.get_course", $post) }}"
        ><i data-feather="arrow-left" class="w-4"></i>Regresar</a>
        <h1 class="my-4 w-full text-center text-2xl dark:text-gray-50 font-semibold">Vamos a actualizar el curso</h1>
        <form action="{{ route("courses.update", $post) }}" method="POST" class="mt-8 max-w-xl mx-auto p-8 border-2 rounded-xl border-dark dark:border-gray-200">
            @csrf
            @method("PUT")
            @foreach( $inputs as $input )
                <label class="block mb-2 text-sm font-semibold" for="{{$input["key"]}}">{{$input["label"]}}</label>
                <input 
                class="bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                type="text"
                name="{{$input["key"]}}" 
                id="{{$input["key"]}}" 
                value="{{old($input["key"]) ?: $post[$input['key']]}}" 
                placeholder="{{$input["placeholder"]}}"
                required>
                @error('{{$input["key"]}}')
                    <p><strong>{{ $message }}</strong></p>
                @enderror
                <br>
            @endforeach
            <label class="block mb-2 text-sm font-semibold" for="category">Categoría</label>
            <select class="bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="category" id="category" title="Selecciona una opción">
                <option disabled selected>Selecciona una categoría</option>
                @foreach ($categories as $category)
                    <option value="{{$category}}" 
                        @if( old("category") == $category ) selected 
                        @elseif( $category == $post->category && !old("category") ) selected 
                        @endif
                    >{{$category}}</option>
                @endforeach
            </select>
            <br>
            <button 
                class="flex max-w-max gap-2 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center"
                type="submit"
            ><i data-feather="edit-2" class="w-5"></i>Editar</button>
        </form>
    </div>
@endsection