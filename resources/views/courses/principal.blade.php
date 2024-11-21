@extends('layouts.header')
@section('title', "Course")
@section('content')
    <div class="relative overflow-x-auto mx-8">
        <h1 class="w-full text-center text-2xl dark:text-gray-50 font-semibold">Bienvenido a la página principa de cursos</h1>
        <a class="my-36 bg-gray-700 hover:bg-gray-800 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-full text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-600 dark:focus:ring-gray-700 dark:border-gray-700" href="{{ route('courses.create') }}">Crear un curso</a>
        <table class="table table-bordered table-auto">
            <tbody>
                <tr>
                    <th>Columna</th>
                    <th>Valor</th>
                </tr>
            </tbody>
            @foreach ($courses as $course)
                <tr>
                    @foreach ($course->toArray() as $col => $val)
                        <td>{{ $col }}</td>
                        <td><a href="{{ route('courses.get_course', $course) }}">{{ $val }}</a></td>
                    @endforeach
                </tr>
            @endforeach
        </table>
        {{ $courses->links()}}
    </div>
@endsection