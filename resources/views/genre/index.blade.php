@extends('layout.app')

@section('content')
    {{-- title --}}
    <header class="bg-white shadow">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 flex justify-between items-center">
            <h1 class="text-3xl font-bold text-gray-900">
                Genres
            </h1>

            <a href="{{ route('genre.create') }}" class="py-2 px-4 bg-transparent border-2 border-gray-500 text-gray-500 text-base rounded-lg hover:bg-gray-500 hover:text-gray-100 focus:border-4 focus:border-gray-300">New Genre</a>
        </div>
    </header>

    {{-- content --}}
    <main class="">
        <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">

            <div class="px-4 py-6 sm:px-0">

                <div class="grid grid-cols-12 divide-x border-b bg-gray-800 text-gray-100 font-bold">
                    <div class="px-2 py-2 flex items-center col-span-2">ID</div>
                    <div class="px-2 py-2 flex items-center col-span-6">Name</div>
                    <div class="px-2 py-2 flex items-center col-span-2">No Movies</div>
                    <div class="px-2 py-2 flex items-center col-span-2">Action</div>
                </div>

                @forelse ($genres as $genre)
                <div class="grid grid-cols-12 divide-x border-b border-l border-r hover:bg-yellow-50">
                    <div class="flex items-center justify-center px-2 py-2 col-span-2">{{ $genre->id }}</div>
                    <div class="col-span-6 flex items-center justify-start px-2 py-2">{{ $genre->name }}</div>
                    <div class="col-span-2 flex items-center justify-start px-2 py-2">{{ count($genre->movies) }}</div>
                    <div class="col-span-2 flex items-center justify-center px-2 py-2 space-x-2">
                        <a href="{{ route('genre.edit', ['genre' => $genre->id]) }}" class="py-1 px-4 bg-blue-500 text-gray-100 text-base rounded-lg focus:border-4 border-blue-300 opacity-75 hover:opacity-100">Edit</a>
                        @if (count($genre->movies) <= 0)
                            <form method="POST" action="{{ route('genre.destroy', [ 'genre' => $genre ]) }}">
                                @csrf
                                @method('DELETE')

                                <div class="form-group">
                                    <input type="submit" onclick="return confirm('Are you sure you want to delete this genre?')"
                                           class="delete-customer py-1 px-4 bg-red-500 text-gray-100 text-base rounded-lg focus:border-4 border-red-300 opacity-75 hover:opacity-100" value="Delete">
                                </div>
                            </form>
                        @endif
                    </div>
                </div>
                @empty
                    <div class="grid grid-cols-12 divide-x border-b border-l border-r hover:bg-yellow-50">
                        <div class="bg-gray-200 py-4 flex items-center justify-center text-base col-span-12">
                            No Genres
                        </div>
                    </div>
                @endforelse

            </div>

            {{ $genres->links() }}

        </div>
    </main>
@endsection

