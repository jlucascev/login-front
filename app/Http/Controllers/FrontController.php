<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontController extends Controller
{
    //
    public function front(Request $req){
    	$viewParams = array("response" => "");
    	if ($req->isMethod('post')) {
		    //
		    $ch = curl_init(env('LOGIN_URL'));

			curl_setopt($ch, CURLOPT_POST, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $req->email);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

			$response = curl_exec($ch);
			curl_close($ch);

			$viewParams['response'] = "Respuesta del servidor: ".$response;
		}
    	return view('form',$viewParams);
    }
}
