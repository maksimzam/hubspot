<?php

namespace App\Http\Controllers;

use App\Contracts\Crm\CrmService;
use App\Http\Requests\CustomerRequest;
use App\Models\Customer;
use App\Models\Property;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function list()
    {
        $customers = Customer::paginate(10);
    
        return view('customer.list',['customers' => $customers]);
    }
    public function add()
    {
        $properties = Property::all();        
        return view('customer.add',['properties' => $properties]);
    }
    public function add_process(CustomerRequest $request)
    {
        $data = $request->validated();
 
        $customer = new Customer();
        $customer->first_name = $data['first_name'];
        $customer->last_name = $data['last_name'];
        $customer->email = $data['email'];
        $customer->phone = $data['phone'];
        $customer->password = \Crypt::encrypt('12345');
        $customer->save();
        
        foreach ($data['properties'] as $key => $value) {            
            $customer->properties()->attach($key, ['value' => $value]);
        }
       
         return redirect(route('customers'));

    }
    public function edit($customer_id)
    {
        $customer = Customer::findOrFail($customer_id);

        $properties = $customer->properties;
        $customer_properties = [];
        foreach ($properties as $property) {
            $customer_properties[$property->id] = $property->pivot->value;
        }       
        $properties = Property::all();          

        return view('customer.edit',['customer' => $customer, 'properties' => $properties, 'customer_properties' => $customer_properties]);
    }
    public function edit_process(CustomerRequest $request, $customer_id)
    {
        $data = $request->validated();
        
        $customer = Customer::findOrFail($customer_id);
        $customer->first_name = $data['first_name'];
        $customer->last_name = $data['last_name'];
        $customer->email = $data['email'];
        $customer->phone = $data['phone'];
        $customer->save();

        $customer->properties()->detach();
        foreach ($data['properties'] as $key => $value) {            
            $customer->properties()->attach($key, ['value' => $value]);
        }

        return redirect(route('customers'));

    }
    public function delete($customer_id)
    {
        $customer = Customer::findOrFail($customer_id);
        
        $customer->properties()->detach();    
        $customer->delete();

        return redirect(route('customers'));
    }
    
    public function export(CrmService $crm)
    {
        $reslut = $crm->exportCustomers();
        return redirect()->route('customers')->with('message',  'Synhronyzation completed. Added: ' . $reslut['added'] . ' Updated: ' . $reslut['updated']);
       
        //$crm->test();

    }

}
