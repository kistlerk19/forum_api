<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index() 
    {
        $var = "John";
        $var1 = "Doe";

        return $var . " " . $var1;
    }
    
    public function create(Request $request) 
    {
        $firstName = $request->firstName;
        $lastName = $request->lastName;
        $age = $request->age;

        return $firstName ." ". $lastName ." ". $age;
        // dd($request->all());
    }
}
