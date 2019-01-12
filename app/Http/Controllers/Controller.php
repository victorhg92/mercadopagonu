<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use MercadoPago as MP;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function checkout(Request $request)
    {    	
    	//MP\SDK::setPublicKey("TEST-89292587-7ca3-436b-a480-a1c9a26b2dea");
    	//MP\SDK::setAccessToken("TEST-4927771361315567-011209-cd9580e091a9838b680bfbf430eec3d0-394372870");

		MP\SDK::setClientId("4927771361315567");
		MP\SDK::setClientSecret("P2mkuVQgSB7JbxjHOYNeqRfI5dkvkKKo");

		$preference = new MP\Preference();

		$item = new MP\Item();
		$item->id = "1";
		$item->title = "Leche";
		$item->quantity = 4;
		$item->currency_id = "ARS";
		$item->unit_price = 40.00;

		$payer = new MP\Payer();
		$payer->email = "test_user_78862703@testuser.com";
		$payer->name = "Fulano";
		$payer->surname = "Gomez";
		$payer->phone = [
			"area_code" => "",
			"number" => "1231234"
		];
		$payer->identification = [
			"type" => "DNI",
			"number" => "12345678"
		];
		$preference->items = array($item);
		$preference->payer = $payer;		
		$preference->save();		
		return response()->redirectTo($preference->init_point);
    }
    public function createTestUser()    
    {
    	MP\SDK::setAccessToken("TEST-3900032386281115-070421-1d76d0ca0cea0acfcc3b2082ee87b5c8-333591845");
    	$body = [
    		"json_data" => [
    			"site_id" => "MLA"
    		]
    	];
    	$result = MP\SDK::post("/users/test_user", $body);
    	dd($result);
    }
}