<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class profileController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function edit(Request $request)
    {
        return view('profiles.edit')->with([
            'user' => $request->user(),
        ]);
    }

    public function update()
    {
        //
    }
}
