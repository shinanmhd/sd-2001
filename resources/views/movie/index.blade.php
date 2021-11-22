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

                <div class="grid grid-cols-12 divide-x border-b bg-gray-800 text-gray-100 font-bold">
                    <div class="px-2 py-2 flex items-center">ID</div>
                    <div class="px-2 py-2 flex items-center col-span-2">Name</div>
                    <div class="px-2 py-2 flex items-center col-span-2">Release Date</div>
                    <div class="px-2 py-2 flex items-center col-span-2">Added Date</div>
                    <div class="px-2 py-2 flex items-center">No. in Stock</div>
                    <div class="px-2 py-2 flex items-center col-span-2">Genre</div>
                    <div class="px-2 py-2 flex items-center col-span-2">Action</div>
                </div>

                @forelse ($movies as $movie)
                <div class="grid grid-cols-12 divide-x border-b border-l border-r hover:bg-yellow-50">
                    <div class="flex items-center justify-center px-2 py-2">{{ $movie->id }}</div>
                    <div class="col-span-2 flex items-center justify-start px-2 py-2">{{ $movie->name }}</div>
                    <div class="col-span-2 flex items-center justify-start px-2 py-2 space-x-2">{{ $movie->release_date }}</div>
                    <div class="col-span-2 flex items-center justify-start px-2 py-2">{{ $movie->date_added }}</div>
                    <div class="flex items-center justify-start px-2 py-2">{{ $movie->no_in_stock }}</div>
                    <div class="col-span-2 flex items-center justify-start px-2 py-2">{{ $movie->genre->name }}</div>
                    <div class="col-span-2 flex items-center justify-center px-2 py-2 space-x-2">
                        <a href="{{ route('movie.edit', ['movie' => $movie->id]) }}" class="py-1 px-4 bg-blue-500 text-gray-100 text-base rounded-lg focus:border-4 border-blue-300 opacity-75 hover:opacity-100">Edit</a>
                        <a href="{{ route('movie.show', ['movie' => $movie->id]) }}" class="py-1 px-4 bg-blue-500 text-gray-100 text-base rounded-lg focus:border-4 border-blue-300 opacity-75 hover:opacity-100">show</a>
                        <form method="POST" action="{{ route('movie.destroy', [ 'movie' => $movie ]) }}">
                            @csrf
                            @method('DELETE')

                            <div class="form-group">
                                <input type="submit" onclick="return confirm('Are you sure you want to delete this movie?')"
                                       class="delete-customer py-1 px-4 bg-red-500 text-gray-100 text-base rounded-lg focus:border-4 border-red-300 opacity-75 hover:opacity-100" value="Delete">
                            </div>
                        </form>
                    </div>
                </div>
                @empty
                    <div class="grid grid-cols-12 divide-x border-b border-l border-r hover:bg-yellow-50">
                        <div class="bg-gray-200 py-4 flex items-center justify-center text-base col-span-12">
                            No Movies
                        </div>
                    </div>
                @endforelse

            </div>

            {{ $movies->links() }}

        </div>
    </main>
@endsection

