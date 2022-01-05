@extends('layouts.app')

@section('content')
    <div class="container flex justify-center mx-auto">
        <div class="flex flex-col">
            <div class="w-full">
                <h1 class="text-gray-700 font-bold md:text-center">Add Customer</h1>
                <br><br>

                <div class="border-b border-gray-200 shadow">

                    <form class="w-full max-w-sm" method="POST" action="{{ route('customer_add_process') }}">
                        @csrf
                        <div class="md:flex md:items-center mb-6">
                            <div class="md:w-1/3">
                                <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4"
                                    for="inline-first-name">
                                    First Name
                                </label>
                            </div>
                            <div class="md:w-2/3">
                                <input
                                    class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500"
                                    id="inline-first-name" name="first_name" type="text" value="{{ old('first_name') }}">
                                <br>
                                @error('first_name')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="md:flex md:items-center mb-6">
                            <div class="md:w-1/3">
                                <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4"
                                    for="inline-last-name">
                                    Last Name
                                </label>
                            </div>
                            <div class="md:w-2/3">
                                <input
                                    class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500"
                                    id="inline-last-name" name="last_name" type="text" value="{{ old('last_name') }}">
                                <br>
                                @error('last_name')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="md:flex md:items-center mb-6">
                            <div class="md:w-1/3">
                                <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4"
                                    for="inline-email">
                                    Email
                                </label>
                            </div>
                            <div class="md:w-2/3">
                                <input
                                    class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500"
                                    id="inline-email" name="email" type="text" value="{{ old('email') }}">
                                <br>
                                @error('email')
                                    {{ $message }}
                                @enderror
                            </div>

                        </div>
                        <div class="md:flex md:items-center mb-6">
                            <div class="md:w-1/3">
                                <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4"
                                    for="inline-phone">
                                    Phone
                                </label>
                            </div>
                            <div class="md:w-2/3">
                                <input
                                    class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500"
                                    id="inline-phone" name="phone" type="text" value="{{ old('phone') }}">
                                @error('phone')
                                    {{ $message }}
                                @enderror
                            </div>
                            <br>

                        </div>

                        <h1 class="text-gray-700 font-bold md:text-center">Aditional properties</h1>
                        @foreach ($properties as $property)
                            <div class="md:flex md:items-center mb-6">
                                <div class="md:w-1/3">
                                    <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4"
                                        for="inline-{{ $property->code }}">
                                        {{ $property->label }}
                                    </label>
                                </div>
                                <div class="md:w-2/3">
                                    <input
                                        class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500"
                                        id="inline-{{ $property->code }}" name="properties[{{ $property->id }}]"
                                        type="text" value="{{ old('properties.' . $property->id) }}">
                                    <br>

                                </div>

                            </div>
                        @endforeach

                        <div class="md:flex md:items-center">
                            <div class="md:w-1/3"></div>
                            <div class="md:w-2/3">
                                <button
                                    class="shadow bg-purple-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded"
                                    type="submit">
                                    Save
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
