@extends('layout.app')

@section('content')
    {{-- title --}}
    <header class="bg-white shadow">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 flex justify-between items-center">
            <h1 class="text-3xl font-bold text-gray-900">
                New Movie
            </h1>

            <a href="{{ route('movie.index') }}" class="py-2 px-4 bg-transparent border-2 border-gray-500 text-gray-500 text-base rounded-lg hover:bg-gray-500 hover:text-gray-100 focus:border-4 focus:border-gray-300">All Customer</a>
        </div>
    </header>

    {{-- content --}}
    <main class="">
        <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">

            <div class="px-4 py-6 sm:px-0">

                <div class="grid place-items-center">
                    <div class="bg-white w-full border p-12">
                        <h1 class="text-xl font-semibold mb-6">Please fill in the information for the new movie</h1>
                        <form class="mt-6" method="post" action="{{ route('movie.store') }}">
                            @csrf
                            <div class="flex justify-between gap-3 mb-6">
                                <span class="w-full flex flex-col">
                                    <label for="name" class="block text-xs font-semibold text-gray-600 uppercase">Movie Name</label>
                                    <input id="name" type="text" name="name" placeholder="Movie Name" class="block w-full p-3 mt-2 text-gray-700 bg-gray-200 appearance-none focus:outline-none focus:bg-gray-300 focus:shadow-inner" value="{{ old('movie_name') }}" />
                                    @error('name')<div class="text-xs text-red-500 italic mt-1">{{ $message }}</div>@enderror
                                </span>
                            </div>

                            <div class="flex justify-between gap-3 mb-6">
                                <span class="w-1/2 flex flex-col">
                                    <label for="release_date" class="block text-xs font-semibold text-gray-600 uppercase">Release Date</label>
                                    <input id="release_date" type="date" name="release_date" placeholder="Release Date" class="block w-full p-3 mt-2 text-gray-700 bg-gray-200 appearance-none focus:outline-none focus:bg-gray-300 focus:shadow-inner" value="{{ old('movie_name') }}" />
                                    @error('release_date')<div class="text-xs text-red-500 italic mt-1">{{ $message }}</div>@enderror
                                </span>
                                <span class="w-1/2 flex flex-col">
                                    <label for="date_added" class="block text-xs font-semibold text-gray-600 uppercase">Added Date</label>
                                    <input id="date_added" type="date" name="date_added" placeholder="Added Date" class="block w-full p-3 mt-2 text-gray-700 bg-gray-200 appearance-none focus:outline-none focus:bg-gray-300 focus:shadow-inner" value="{{ old('movie_name') }}" />
                                    @error('date_added')<div class="text-xs text-red-500 italic mt-1">{{ $message }}</div>@enderror
                                </span>
                            </div>

                            <div class="flex justify-between gap-3 mb-6">
                                <span class="w-1/2 flex flex-col">
                                    <label for="no_in_stock" class="block text-xs font-semibold text-gray-600 uppercase">No. in Stock</label>
                                    <input id="no_in_stock" type="number" name="no_in_stock" class="block w-full p-3 mt-2 text-gray-700 bg-gray-200 appearance-none focus:outline-none focus:bg-gray-300 focus:shadow-inner" value="{{ old('movie_name') }}" />
                                    @error('no_in_stock')<div class="text-xs text-red-500 italic mt-1">{{ $message }}</div>@enderror
                                </span>
                                <span class="w-1/2 flex flex-col">
                                    <div class="w-full flex flex-col mb-6">
                                        <label for="genre_id" class="block mt-2 text-xs font-semibold text-gray-600 uppercase">Genre</label>
                                        <select name="genre_id" id="genre_id" class="block w-full p-3 mt-2 text-gray-700 bg-gray-200 appearance-none focus:outline-none focus:bg-gray-300 focus:shadow-inner">
                                            <option selected value="" disabled>Select Genre</option>
                                            @foreach ($genres as $genre)
                                                <option value="{{ $genre->id }}">{{ $genre->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('genre_id')<div class="text-xs text-red-500 italic mt-1">{{ $message }}</div>@enderror
                                    </div>
                                </span>
                            </div>


                            <div class="flex items-center justify-center space-x-4 mt-4">
                                <a href="{{ route('movie.index') }}" class="w-full py-3 mt-6 font-medium tracking-widest text-gray-500 uppercase bg-white shadow-lg focus:outline-none hover:bg-gray-300 border hover:text-gray-700 hover:shadow-none flex items-center justify-center">
                                    Cancel
                                </a>
                                <button type="submit" class="w-full py-3 mt-6 font-medium tracking-widest text-white uppercase bg-black shadow-lg focus:outline-none hover:bg-gray-900 hover:shadow-none">
                                    Add Movie
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>

        </div>
    </main>
@endsection

