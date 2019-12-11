<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontController extends Controller
{
    //
    public function front(Request $req){
    	if ($req->isMethod('post')) {
		    //
		    echo "<h2>Has insertado email: </h2>";
		    echo $req->email;
		}
    	return view('form');
    }
}
