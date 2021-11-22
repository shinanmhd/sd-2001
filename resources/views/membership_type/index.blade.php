@extends('layout.app')

@section('content')
    {{-- title --}}
    <header class="bg-white shadow">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 flex justify-between items-center">
            <h1 class="text-3xl font-bold text-gray-900">
                Membership Types
            </h1>

            <a href="{{ route('membershipType.create') }}" class="py-2 px-4 bg-transparent border-2 border-gray-500 text-gray-500 text-base rounded-lg hover:bg-gray-500 hover:text-gray-100 focus:border-4 focus:border-gray-300">New Membership Type</a>
        </div>
    </header>

    {{-- content --}}
    <main class="">
        <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">

            <div class="px-4 py-6 sm:px-0">

                <div class="grid grid-cols-12 divide-x border-b bg-gray-800 text-gray-100 font-bold">
                    <div class="px-2 py-2 flex items-center">ID</div>
                    <div class="px-2 py-2 flex items-center col-span-3">Name</div>
                    <div class="px-2 py-2 flex items-center col-span-2">Signup Fee</div>
                    <div class="px-2 py-2 flex items-center col-span-2">Duration (Months)</div>
                    <div class="px-2 py-2 flex items-center col-span-2">Discount Rate</div>
                    <div class="px-2 py-2 flex items-center col-span-2">Action</div>
                </div>

                @forelse ($membership_types as $type)
                <div class="grid grid-cols-12 divide-x border-b border-l border-r hover:bg-yellow-50">
                    <div class="flex items-center justify-center px-2 py-2">{{ $type->id }}</div>
                    <div class="flex items-center justify-center px-2 py-2 col-span-3">{{ $type->name }}</div>
                    <div class="col-span-2 flex items-center justify-start px-2 py-2">{{ $type->signup_fee }}</div>
                    <div class="col-span-2 flex items-center justify-start px-2 py-2">{{ $type->duration_in_months }}</div>
                    <div class="col-span-2 flex items-center justify-start px-2 py-2">{{ $type->discount_rate }}</div>
                    <div class="col-span-2 flex items-center justify-center px-2 py-2 space-x-2">
                        <a href="{{ route('membershipType.edit', ['membershipType' => $type->id]) }}" class="py-1 px-4 bg-blue-500 text-gray-100 text-base rounded-lg focus:border-4 border-blue-300 opacity-75 hover:opacity-100">Edit</a>
                        <form method="POST" action="{{ route('membershipType.destroy', [ 'membershipType' => $type ]) }}">
                            @csrf
                            @method('DELETE')

                            <div class="form-group">
                                <input type="submit" onclick="return confirm('Are you sure you want to delete this Membership Type?')"
                                       class="delete-customer py-1 px-4 bg-red-500 text-gray-100 text-base rounded-lg focus:border-4 border-red-300 opacity-75 hover:opacity-100" value="Delete">
                            </div>
                        </form>
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

            {{ $membership_types->links() }}

        </div>
    </main>
@endsection

