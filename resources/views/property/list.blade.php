@extends('layouts.app')

@section('content')

<div class="container flex justify-center mx-auto">
    <div class="flex flex-col">
        <div class="w-full">
          <a href="{{ route('property_add') }}" class="px-4 py-1 text-sm text-white bg-blue-400 rounded">Add New Property</a>  
          <br><br>
            <div class="border-b border-gray-200 shadow">
            
              <table>
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-2 text-xs text-gray-500">
                                Label
                            </th>
                            <th class="px-6 py-2 text-xs text-gray-500">
                                Code
                            </th>
                            <th class="px-6 py-2 text-xs text-gray-500">
                                HubSpot code
                            </th>
                            <th class="px-6 py-2 text-xs text-gray-500">
                                Edit
                            </th>
                            <th class="px-6 py-2 text-xs text-gray-500">
                                Delete
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white">
                      @foreach ($properties as $property)
                          
                      
                        <tr class="whitespace-nowrap">
                            <td class="px-6 py-4 text-sm text-gray-500">
                                {{ $property->label }}
                            </td>
                            <td class="px-6 py-4">
                                <div class="text-sm text-gray-900">
                                    {{ $property->code }}
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="text-sm text-gray-500">{{ $property->hubspot_code }}</div>
                            </td>
                           <td class="px-6 py-4">
                                <a href="{{ route('property_edit',['property_id'=> $property->id ]) }}" class="px-4 py-1 text-sm text-white bg-blue-400 rounded">Edit</a>
                            </td>
                            <td class="px-6 py-4">
                                <a href="{{ route('property_delete',['property_id'=> $property->id ]) }}" onclick="return confirm('Are you sure?')" class="px-4 py-1 text-sm text-white bg-red-400 rounded">Delete</a>
                            </td>
                        </tr>
                        @endforeach  
                    </tbody>
                </table>
                  
            </div>
            <div class="pagination">{{ $properties->links() }}</div>
                    </div>
    </div>
  </div>
 



@endsection