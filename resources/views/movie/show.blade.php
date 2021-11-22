@extends('layout.app')

@section('content')
    {{-- title --}}
    <header class="bg-white shadow">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 flex justify-between items-center">
            <h1 class="text-3xl font-bold text-gray-900">
                Movies
            </h1>

            <a href="{{ route('movie.create') }}" class="py-2 px-4 bg-transparent border-2 border-gray-500 text-gray-500 text-base rounded-lg hover:bg-gray-500 hover:text-gray-100 focus:border-4 focus:border-gray-300">New Movie</a>
        </div>
    </header>

    {{-- content --}}
    <main class="">
        <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">

            <div class="px-4 py-6 sm:px-0">

                <div class="flex flex-col space-y-4 p-12 border shadow-xl">
                    <div class="px-2 py-2 flex items-center border-b">ID: {{ $movie->id }}</div>
                    <div class="px-2 py-2 flex items-center border-b col-span-2">Name:  {{ $movie->name }}</div>
                    <div class="px-2 py-2 flex items-center border-b col-span-2">Release Date:  {{ $movie->release_date }}</div>
                    <div class="px-2 py-2 flex items-center border-b col-span-2">Added Date:  {{ $movie->date_added }}</div>
                    <div class="px-2 py-2 flex items-center border-b">No. in Stock:  {{ $movie->no_in_stock }}</div>
                    <div class="px-2 py-2 flex items-center col-span-2">Genre:  {{ $movie->genre->name }}</div>
                </div>

            </div>


        </div>
    </main>
@endsection

