@extends('layouts.app')

@section('content')

<div class="container flex justify-center mx-auto">
  <div class="flex flex-col">
      <div class="w-full">
        <a href="{{ route('customer_add') }}" class="px-4 py-1 text-sm text-white bg-blue-400 rounded">Add New</a>  
        <br><br>
       
        @if(session('message'))
           <div class="error-block">{{ session('message') }}</div>       <br><br>
        @endif

          <div class="border-b border-gray-200 shadow">
          
            <table>
                  <thead class="bg-gray-50">
                      <tr>
                          <th class="px-6 py-2 text-xs text-gray-500">
                              First Name
                          </th>
                          <th class="px-6 py-2 text-xs text-gray-500">
                              Last Name
                          </th>
                          <th class="px-6 py-2 text-xs text-gray-500">
                              Email
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
                     @foreach ($customers as $customer)
                     <tr class="whitespace-nowrap">
                        <td class="px-6 py-4 text-sm text-gray-500">
                            {{ $customer->first_name }}
                        </td>
                        <td class="px-6 py-4">
                            <div class="text-sm text-gray-900">
                               {{$customer->last_name}}
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="text-sm text-gray-500">{{ $customer->email }}</div>
                        </td>
                        <td class="px-6 py-4">
                            <a href="{{ route('customer_edit',['customer_id' => $customer->id]) }}" class="px-4 py-1 text-sm text-white bg-blue-400 rounded">Edit</a>
                        </td>
                        <td class="px-6 py-4">
                            <a href="{{ route('customer_delete',['customer_id' => $customer->id]) }}" onclick="return confirm('Are you sure?')" class="px-4 py-1 text-sm text-white bg-red-400 rounded">Delete</a>
                        </td>
                    </tr>
  
                     @endforeach 

                  </tbody>
              </table>

          </div>
          <br><br>
          <div class="pagination">{{ $customers->links() }}</div>
          <br><br>
          <a href="{{ route('customers_export') }}" class="px-4 py-1 text-sm text-white bg-blue-400 rounded">Synchronize to hubspot</a>  
      </div>
  </div>
</div>

@endsection