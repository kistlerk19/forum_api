<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserFileController extends Controller
{
   
    public function store(Request $request)
    {
        dd("we are here");
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
