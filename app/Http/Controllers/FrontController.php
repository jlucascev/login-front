<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Firebase\JWT\JWT;

class FrontController extends Controller
{
    //
    public function front(Request $req){
    	$viewParams = array("response" => "");
    	if ($req->isMethod('post')) {
		    //

    		$key = env("JWT_KEY");

    		$payload = array(
    			"email" => $req->email,
    			"password" => $req->pass
    		);

    		$jwt = JWT::encode($payload, $key);

		    $ch = curl_init(env('LOGIN_URL'));

			curl_setopt($ch, CURLOPT_POST, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $jwt);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

			$response = curl_exec($ch);
			curl_close($ch);

			$viewParams['response'] = "Respuesta del servidor: ".print_r($response,true);
		}
    	return view('form',$viewParams);
    }
}
