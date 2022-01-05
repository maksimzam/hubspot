<?php

namespace App\Services\Crm;

use App\Contracts\Crm\CrmService;
use App\Models\Customer;

class Hubspot implements CrmService
{
  public $hubSpot;

  function __construct()
  {
    $this->hubSpot = \HubSpot\Factory::createWithApiKey(config('app.hubspot_api'));
  }

  public function exportCustomers()
  {
    $data['updated'] = 0;
    $data['added'] = 0;

    $customers = Customer::all();
    foreach ($customers as $customer) {
      $properties['email'] = $customer->email;
      $properties['phone'] = $customer->phone;
      $properties['firstname'] = $customer->first_name;
      $properties['lastname'] = $customer->last_name;
      foreach ($customer->properties as $property) {
        $properties[$property->hubspot_code] = $property->pivot->value;
      }

      if ($customer->hubspot_id > 0) {
        $newProperties = new \HubSpot\Client\Crm\Contacts\Model\SimplePublicObjectInput();
        $newProperties->setProperties($properties);
        $this->hubSpot->crm()->contacts()->basicApi()->update($customer->hubspot_id, $newProperties);
        $data['updated']++;
      } else {
        $contactInput = new \HubSpot\Client\Crm\Contacts\Model\SimplePublicObjectInput();
        $contactInput->setProperties($properties);
        $contact = $this->hubSpot->crm()->contacts()->basicApi()->create($contactInput);

        $customer->hubspot_id = $contact->getId();
        $customer->save();
        $data['added']++;
      }
    }
    return $data;
  }

  public function test()
  {
    $properties = 'email,lastname,firstname,job,car_year,phone';
    $response = $this->hubSpot->crm()->contacts()->basicApi()->getPage(10, null, $properties);

    foreach ($response->getResults() as $result)
      print_r($result->getProperties());
    exit;
  }
}
