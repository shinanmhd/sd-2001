@extends('layout.app')

@section('content')
    {{-- title --}}
    <header class="bg-white shadow">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 flex justify-between items-center">
            <h1 class="text-3xl font-bold text-gray-900">
                New Customer
            </h1>

            <a href="{{ route('customer.index') }}" class="py-2 px-4 bg-transparent border-2 border-gray-500 text-gray-500 text-base rounded-lg hover:bg-gray-500 hover:text-gray-100 focus:border-4 focus:border-gray-300">All Customer</a>
        </div>
    </header>

    {{-- content --}}
    <main class="">
        <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">

            <div class="px-4 py-6 sm:px-0">

                <div class="grid place-items-center">
                    <div class="bg-white w-full border p-12">
                        <h1 class="text-xl font-semibold mb-6">Please fill in the information for the new customer</h1>
                        <form class="mt-6" method="post" action="{{ route('customer.store') }}">
                            @csrf
                            <div class="flex justify-between gap-3 mb-6">
                                <span class="w-1/2 flex flex-col">
                                    <label for="customer_name" class="block text-xs font-semibold text-gray-600 uppercase">Customer Name</label>
                                    <input id="customer_name" type="text" name="customer_name" placeholder="Customer Name" autocomplete="given-name" class="block w-full p-3 mt-2 text-gray-700 bg-gray-200 appearance-none focus:outline-none focus:bg-gray-300 focus:shadow-inner" value="{{ old('customer_name') }}" />
                                    @error('customer_name')<div class="text-xs text-red-500 italic mt-1">{{ $message }}</div>@enderror
                                </span>
                                <span class="w-1/2 flex flex-col">
                                    <label for="is_subscribed_to_newsletter" class="block text-xs font-semibold text-gray-600 uppercase">Is subscribed to newsletter</label>
                                    <input id="is_subscribed_to_newsletter" type="checkbox" name="is_subscribed_to_newsletter" class="mt-2 p-2" value="{{ old('is_subscribed_to_newsletter') }}" />
                                </span>
                            </div>

                            <div class="w-full flex flex-col mb-6">
                                <label for="membership_type" class="block mt-2 text-xs font-semibold text-gray-600 uppercase">Membership Type</label>
                                <select name="membership_type" id="membership_type" class="block w-full p-3 mt-2 text-gray-700 bg-gray-200 appearance-none focus:outline-none focus:bg-gray-300 focus:shadow-inner">
                                    <option selected value="" disabled>Select Membership type</option>
                                    @foreach ($membershipTypes as $membershipType)
                                        <option value="{{ $membershipType->id }}">{{ $membershipType->name }}</option>
                                    @endforeach
                                </select>
                                @error('membership_type')<div class="text-xs text-red-500 italic mt-1">{{ $message }}</div>@enderror
                            </div>

                            <div class="w-full flex flex-col mb-6">
                                <label for="date_of_birth" class="block mt-2 text-xs font-semibold text-gray-600 uppercase">Date of birth</label>
                                <input id="date_of_birth" type="date" name="date_of_birth" class="block w-full p-3 mt-2 text-gray-700 bg-gray-200 appearance-none focus:outline-none focus:bg-gray-300 focus:shadow-inner" value="{{ old('date_of_birth') }}" />
                                @error('date_of_birth')<div class="text-xs text-red-500 italic mt-1">{{ $message }}</div>@enderror
                            </div>

                            <div class="flex items-center justify-center space-x-4 mt-4">
                                <a href="{{ route('customer.index') }}" class="w-full py-3 mt-6 font-medium tracking-widest text-gray-500 uppercase bg-white shadow-lg focus:outline-none hover:bg-gray-300 border hover:text-gray-700 hover:shadow-none flex items-center justify-center">
                                    Cancel
                                </a>
                                <button type="submit" class="w-full py-3 mt-6 font-medium tracking-widest text-white uppercase bg-black shadow-lg focus:outline-none hover:bg-gray-900 hover:shadow-none">
                                    Add Customer
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>

        </div>
    </main>
@endsection

