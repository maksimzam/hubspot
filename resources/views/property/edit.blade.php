@extends('layouts.app')

@section('content')

<div class="container flex justify-center mx-auto">
    <div class="flex flex-col">
        <div class="w-full">
            <h1 class="text-gray-700 font-bold md:text-center">Edit Property</h1>
            <br><br>
            <div class="border-b border-gray-200 shadow">
                
                <form class="w-full max-w-sm" method="POST" action="{{ route('property_edit_process',['property_id' => $property->id]) }}">
                    @csrf
                    <div class="md:flex md:items-center mb-6">
                        <div class="md:w-1/3">
                            <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4"
                                for="inline-label">
                                Label
                            </label>
                        </div>
                        <div class="md:w-2/3">
                            <input
                                class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500"
                                id="inline-label" name="label" type="text" value="{{ $property->label }}">
                            <br>
                            @error('label')
                                {{ $message }}
                            @enderror
                        </div>
                        
                    </div>

                    <div class="md:flex md:items-center mb-6">
                        <div class="md:w-1/3">
                            <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4"
                                for="inline-code">
                                Code
                            </label>
                        </div>
                        <div class="md:w-2/3">
                            <input
                                class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500"
                                id="inline-code" name="code" type="text" value="{{ $property->code }}">
                            <br>
                            @error('code')
                                {{ $message }}
                            @enderror
                        </div>
                        
                    </div>
                    <div class="md:flex md:items-center mb-6">
                        <div class="md:w-1/3">
                            <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4"
                                for="inline-hubspot_code">
                                HubSpot code
                            </label>
                        </div>
                        <div class="md:w-2/3">
                            <input
                                class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500"
                                id="inline-hubspot_code" name="hubspot_code" type="text" value="{{ $property->hubspot_code }}">
                            <br>
                            @error('hubspot_code')
                                {{ $message }}
                            @enderror
                        </div>
                        
                    </div>
                    
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