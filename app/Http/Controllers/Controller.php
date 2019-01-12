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
		MP\SDK::setClientId("3900032386281115");
		MP\SDK::setClientSecret("qkxYnkh8ppwCJi0lAndaFjBdS8HcvSqe");

		$preference = new MP\Preference();

		$item = new MP\Item();
		$item->id = "1";
		$item->title = "Leche";
		$item->quantity = 4;
		$item->currency_id = "ARS";
		$item->unit_price = 40.00;

		$payer = new MP\Payer();
		$payer->email = "elcomprador@gmail.com";
		$payer->name = "Fulano";
		$payer->surname = "Gomez";
		$payer->phone = [
			"area_code" => "",
			"number" => "1231234"
		];

		$preference->items = array($item);
		$preference->payer = $payer;

		$preference->save();		
		redirect($preference->init_point);
    }
}