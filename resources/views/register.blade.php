@extends('layout.app')

@section('content')


    {{-- content --}}
    <main class="">
        <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">

            <div class="p-6 w-full shadow-lg border border-gray-50">
                <div class="grid grid-cols-12">
                    {{--title--}}
                    <div class="col-span-12 flex items-center justify-start font-bold border-b border-gray-600 py-2 mb-4">
                        Personal Information
                    </div>

                    {{--first name--}}
                    <label for="first_name" class="col-span-2 flex items-center justify-start p-2">First Name</label>
                    <div class="col-span-4 flex items-center justify-start p-2">
                        <input type="text" name="first_name" id="first_name" class="border w-full border-gray-500 px-4 py-2">
                    </div>
                    <div class="col-span-6 flex items-center justify-start">
                        (max of 50 characters) (not empty)
                    </div>

                    {{--last name--}}
                    <label for="last_name" class="col-span-2 flex items-center justify-start p-2">Last Name</label>
                    <div class="col-span-4 flex items-center justify-start p-2">
                        <input type="text" name="last_name" id="last_name" class="border w-full border-gray-500 px-4 py-2">
                    </div>
                    <div class="col-span-6 flex items-center justify-start">
                        (max of 50 characters) (not empty)
                    </div>

                    {{--sex name--}}
                    <label for="sex" class="col-span-2 flex items-center justify-start p-2">Sex</label>
                    <div class="col-span-4 flex items-center justify-start p-2 space-x-6">
                        <div class="flex items-center space-x-2">
                            <input type="radio" name="sex" id="male" value="m" class="border border-gray-500 px-4 py-2">
                            <label for="male">Male</label>
                        </div>
                        <div class="flex items-center space-x-2">
                            <input type="radio" name="sex" id="female" value="f" class="border border-gray-500 px-4 py-2">
                            <label for="male">Female</label>
                        </div>
                    </div>
                    <div class="col-span-6 flex items-center justify-start">&nbsp;</div>


                    {{--mobile phone--}}
                    <label for="last_name" class="col-span-2 flex items-center justify-start p-2">Mobile Phone</label>
                    <div class="col-span-4 flex items-center justify-start p-2">
                        <input type="text" name="last_name" id="last_name" class="border w-full border-gray-500 px-4 py-2">
                    </div>
                    <div class="col-span-6 flex items-center justify-start">
                        (max of 50 characters) (not empty)
                    </div>

                    {{--Tel No.--}}
                    <label for="last_name" class="col-span-2 flex items-center justify-start p-2">Telephone Number</label>
                    <div class="col-span-4 flex items-center justify-start p-2">
                        <input type="text" name="last_name" id="last_name" class="border w-full border-gray-500 px-4 py-2">
                    </div>
                    <div class="col-span-6 flex items-center justify-start">

                    </div>

                    {{--Birth Date--}}
                    <label for="last_name" class="col-span-2 flex items-center justify-start p-2">Birth Date</label>
                    <div class="col-span-3 flex items-center justify-start p-2">
                        <input type="date" name="last_name" id="last_name" class="border w-full border-gray-500 px-4 py-2">
                    </div>
                    <div class="col-span-6 flex items-center justify-start"></div>

                    {{--Address--}}
                    <label for="last_name" class="col-span-2 flex items-center justify-start p-2">Address</label>
                    <div class="col-span-6 flex items-center justify-start p-2">
                        <input type="date" name="last_name" id="last_name" class="border w-full border-gray-500 px-4 py-2">
                    </div>
                    <div class="col-span-4 flex items-center justify-start"></div>

                    {{--email--}}
                    <label for="email" class="col-span-2 flex items-center justify-start p-2">Email</label>
                    <div class="col-span-6 flex items-center justify-start p-2">
                        <input type="email" name="email" id="email" class="border w-full border-gray-500 px-4 py-2">
                    </div>
                    <div class="col-span-4 flex items-center justify-start"></div>

                    {{--website--}}
                    <label for="website" class="col-span-2 flex items-center justify-start p-2">Website</label>
                    <div class="col-span-6 flex items-center justify-start p-2">
                        <input type="text" name="website" id="website" class="border w-full border-gray-500 px-4 py-2">
                    </div>
                    <div class="col-span-4 flex items-center justify-start"></div>


                    {{--title--}}
                    <div class="col-span-12 flex items-center justify-start font-bold border-b border-gray-600 py-2 mb-4 mt-8">
                        User Account
                    </div>

                    {{--username--}}
                    <label for="username" class="col-span-2 flex items-center justify-start p-2">Username</label>
                    <div class="col-span-3 flex items-center justify-start p-2">
                        <input type="text" name="username" id="username" class="border w-full border-gray-500 px-4 py-2">
                    </div>
                    <div class="col-span-6 flex items-center justify-start">
                        (max of 50 characters) (not empty)
                    </div>

                    {{--password--}}
                    <label for="password" class="col-span-2 flex items-center justify-start p-2">Password</label>
                    <div class="col-span-3 flex items-center justify-start p-2">
                        <input type="password" name="password" id="password" class="border w-full border-gray-500 px-4 py-2">
                    </div>
                    <div class="col-span-6 flex items-center justify-start">
                        (max of 50 characters) (not empty)
                    </div>

                    {{--password confirm--}}
                    <label for="password_confirm" class="col-span-2 flex items-center justify-start p-2">Retype Password</label>
                    <div class="col-span-3 flex items-center justify-start p-2">
                        <input type="password" name="password_confirm" id="password_confirm" class="border w-full border-gray-500 px-4 py-2">
                    </div>
                    <div class="col-span-6 flex items-center justify-start">
                        (max of 50 characters) (not empty)
                    </div>

                    <div class="col-span-12 flex items-center justify-start font-bold py-2 mb-4 mt-8">
                        <button type="submit" class="border shadow-xl border-green-600 bg-green-200 rounded-xl px-4 py-2 flex items-center justify-center">Create User</button>
                    </div>
                </div>
            </div>

        </div>
    </main>
@endsection

