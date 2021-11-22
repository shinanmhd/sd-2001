@extends('layout.app')

@section('content')
    {{-- title --}}
    <header class="bg-white shadow">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 flex justify-between items-center">
            <h1 class="text-3xl font-bold text-gray-900">
                New Membership Type
            </h1>

            <a href="{{ route('membershipType.index') }}" class="py-2 px-4 bg-transparent border-2 border-gray-500 text-gray-500 text-base rounded-lg hover:bg-gray-500 hover:text-gray-100 focus:border-4 focus:border-gray-300">All Membership Types</a>
        </div>
    </header>

    {{-- content --}}
    <main class="">
        <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">

            <div class="px-4 py-6 sm:px-0">

                <div class="grid place-items-center">
                    <div class="bg-white w-full border p-12">
                        <h1 class="text-xl font-semibold mb-6">Please fill in the information for the new Membership type</h1>
                        <form class="mt-6" method="post" action="{{ route('membershipType.store') }}">
                            @csrf
                            <div class="flex justify-between gap-3 mb-6">
                                <span class="w-1/2 flex flex-col">
                                    <label for="name" class="block text-xs font-semibold text-gray-600 uppercase">Name</label>
                                    <input id="name" type="text" name="name" placeholder="Membership Type Name" class="block w-full p-3 mt-2 text-gray-700 bg-gray-200 appearance-none focus:outline-none focus:bg-gray-300 focus:shadow-inner" value="{{ old('name') }}" />
                                    @error('name')<div class="text-xs text-red-500 italic mt-1">{{ $message }}</div>@enderror
                                </span>

                                <span class="w-1/2 flex flex-col">
                                    <label for="signup_fee" class="block text-xs font-semibold text-gray-600 uppercase">Signup Fee</label>
                                    <input id="signup_fee" type="number" name="signup_fee" placeholder="Signup Fee" class="block w-full p-3 mt-2 text-gray-700 bg-gray-200 appearance-none focus:outline-none focus:bg-gray-300 focus:shadow-inner" value="{{ old('signup_fee') }}" />
                                    @error('signup_fee')<div class="text-xs text-red-500 italic mt-1">{{ $message }}</div>@enderror
                                </span>
                            </div>

                            <div class="flex justify-between gap-3 mb-6">
                                <span class="w-1/2 flex flex-col">
                                    <label for="duration_in_months" class="block text-xs font-semibold text-gray-600 uppercase">Duration (months)</label>
                                    <input id="duration_in_months" type="number" name="duration_in_months" placeholder="Duration" class="block w-full p-3 mt-2 text-gray-700 bg-gray-200 appearance-none focus:outline-none focus:bg-gray-300 focus:shadow-inner" value="{{ old('duration_in_months') }}" />
                                    @error('duration_in_months')<div class="text-xs text-red-500 italic mt-1">{{ $message }}</div>@enderror
                                </span>

                                <span class="w-1/2 flex flex-col">
                                    <label for="discount_rate" class="block text-xs font-semibold text-gray-600 uppercase">Discount Rate</label>
                                    <input id="discount_rate" type="number" name="discount_rate" placeholder="Discount Rate" class="block w-full p-3 mt-2 text-gray-700 bg-gray-200 appearance-none focus:outline-none focus:bg-gray-300 focus:shadow-inner" value="{{ old('discount_rate') }}" />
                                    @error('discount_rate')<div class="text-xs text-red-500 italic mt-1">{{ $message }}</div>@enderror
                                </span>
                            </div>


                            <div class="flex items-center justify-center space-x-4 mt-4">
                                <a href="{{ route('membershipType.index') }}" class="w-full py-3 mt-6 font-medium tracking-widest text-gray-500 uppercase bg-white shadow-lg focus:outline-none hover:bg-gray-300 border hover:text-gray-700 hover:shadow-none flex items-center justify-center">
                                    Cancel
                                </a>
                                <button type="submit" class="w-full py-3 mt-6 font-medium tracking-widest text-white uppercase bg-black shadow-lg focus:outline-none hover:bg-gray-900 hover:shadow-none">
                                    Add Membership Type
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>

        </div>
    </main>
@endsection

