<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TestPostControllerRequest;

class TestController extends Controller
{
    public function index() 
    {
        $var = "John";
        $var1 = "Doe";

        return $var . " " . $var1;
    }
    
    public function create(TestPostControllerRequest $request) 
    {
        $firstName = $request->firstName;
        $lastName = $request->lastName;
        $age = $request->age;

        return $firstName ." ". $lastName ." ". $age;
        // dd($request->all());
    }
}
