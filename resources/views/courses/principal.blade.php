@extends('layouts.header')
@section('title', "Course")
@section('content')
    <div class="relative overflow-x-auto mx-4">
        <h1 class="my-8 w-full text-center text-2xl dark:text-gray-50 font-semibold">Bienvenido a la página principa de cursos</h1>
        <a 
            class="flex justify-between gap-1 max-w-max bg-gray-200 hover:bg-gray-50 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-full text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-600 dark:focus:ring-gray-700 dark:border-gray-700" 
            href="{{ route('courses.create') }}"
        ><i data-feather="plus" class="w-4"></i>Crear un curso</a>
        <table class="my-8 w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="w-full text-xs text-center text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    @foreach ($keys as $key)
                        <th scope="col" class="px-6 py-2 text-center">{{ $key }}</th>    
                    @endforeach
                </tr>
            </thead>
            @foreach ($courses as $course)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    @foreach ($course->toArray() as $val)
                        <td class="px-6 py-4"><a href="{{ route('courses.get_course', $course) }}">{{ $val }}</a></td>
                    @endforeach
                </tr>
            @endforeach
        </table>
        {{ $courses->links()}}
    </div>
@endsection