<?php

namespace App\Http\Controllers;

use App\Http\Requests\PropertyRequest;
use App\Models\Property;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    public function list()
    {
        $properties = Property::paginate(10);
        
        return view('property.list',['properties' => $properties]);
    }
    public function add()
    {         
        return view('property.add');
    }
    public function add_process(PropertyRequest $request)
    {
        $data = $request->validated();
        
        $property = new Property();
        $property->label = $data['label'];
        $property->code = $data['code'];
        $property->hubspot_code = $data['hubspot_code'];
        $property->save();

        return redirect(route('properties'));

    }
    public function edit($property_id)
    {
        $property = Property::findOrFail($property_id);
         
        return view('property.edit',['property' => $property]);
    }
    public function edit_process(PropertyRequest $request, $property_id)
    {
        $data = $request->validated();
        
        $property = Property::findOrFail($property_id);
        $property->label = $data['label'];
        $property->code = $data['code'];
        $property->hubspot_code = $data['hubspot_code'];
        $property->save();

        return redirect(route('properties'));

    }
    public function delete($property_id)
    {
        
        $property = Property::findOrFail($property_id);
        $property->delete();
        \DB::table('customer_properties')->where('property_id', $property_id)->delete();

        return redirect(route('properties'));
    }

}
