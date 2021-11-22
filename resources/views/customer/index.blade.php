@extends('layout.app')

@section('content')
    {{-- title --}}
    <header class="bg-white shadow">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 flex justify-between items-center">
            <h1 class="text-3xl font-bold text-gray-900">
                Customers
            </h1>

            <a href="{{ route('customer.create') }}" class="py-2 px-4 bg-transparent border-2 border-gray-500 text-gray-500 text-base rounded-lg hover:bg-gray-500 hover:text-gray-100 focus:border-4 focus:border-gray-300">New Customer</a>
        </div>
    </header>

    {{-- content --}}
    <main class="">
        <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">

            <div class="px-4 py-6 sm:px-0">

                <div class="grid grid-cols-12 divide-x border-b bg-gray-800 text-gray-100 font-bold">
                    <div class="px-2 py-2 flex items-center">ID</div>
                    <div class="px-2 py-2 flex items-center col-span-3">Name</div>
                    <div class="px-2 py-2 flex items-center col-span-2">Is Subscribed to Newsletter</div>
                    <div class="px-2 py-2 flex items-center col-span-2">Membership Type</div>
                    <div class="px-2 py-2 flex items-center col-span-2">Date of Birth</div>
                    <div class="px-2 py-2 flex items-center col-span-2">Action</div>
                </div>

                @forelse ($customers as $customer)
                <div class="grid grid-cols-12 divide-x border-b border-l border-r hover:bg-yellow-50">
                    <div class="flex items-center justify-center px-2 py-2">{{ $customer->id }}</div>
                    <div class="col-span-3 flex items-center justify-start px-2 py-2">{{ $customer->name }}</div>
                    <div class="col-span-2 flex items-center justify-start px-2 py-2 space-x-2">
                        @if ($customer->is_subscribed_to_newsletter)
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-500" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                            </svg>
                            <p class="">Subscribed</p>
                        @else
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-red-500" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                            </svg>
                            <p class="">Not Subscribed</p>
                        @endif
                    </div>
                    <div class="col-span-2 flex items-center justify-start px-2 py-2">{{ $customer->membership_type->name }}</div>
                    <div class="col-span-2 flex items-center justify-start px-2 py-2">{{ $customer->date_of_birth }}</div>
                    <div class="col-span-2 flex items-center justify-center px-2 py-2 space-x-2">
                        <a href="{{ route('customer.edit', ['customer' => $customer->id]) }}" class="py-1 px-4 bg-blue-500 text-gray-100 text-base rounded-lg focus:border-4 border-blue-300 opacity-75 hover:opacity-100">Edit</a>
                        <form method="POST" action="{{ route('customer.destroy', [ 'customer' => $customer ]) }}">
                            @csrf
                            @method('DELETE')

                            <div class="form-group">
                                <input type="submit" onclick="return confirm('Are you sure you want to delete this customer?')"
                                       class="delete-customer py-1 px-4 bg-red-500 text-gray-100 text-base rounded-lg focus:border-4 border-red-300 opacity-75 hover:opacity-100" value="Delete">
                            </div>
                        </form>
                    </div>
                </div>
                @empty
                    <div class="grid grid-cols-12 divide-x border-b border-l border-r hover:bg-yellow-50">
                        <div class="bg-gray-200 py-4 flex items-center justify-center text-base col-span-12">
                            No Customers
                        </div>
                    </div>
                @endforelse

            </div>

            {{ $customers->links() }}

        </div>
    </main>
@endsection

