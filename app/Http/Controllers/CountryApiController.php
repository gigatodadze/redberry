<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;

class CountryApiController extends Controller
{
    public function index()
    {
        return Country::all();
    }

    public function store(Request $request)
    {
        request()->validate([
            'code' => 'required',
            'name' => 'required',
        ]);

        return Country::create([
            'code' => $request->code,
            'name' => $request->name,
        ]);
    }

    public function update(Country $post, Request $request)
    {
        request()->validate([
            'code' => 'required',
            'name' => 'required',
        ]);

        $success = $post->update([
            'code' => $request->code,
            'name' => $request->name,
        ]);

        return [
            'success' => $success
        ];
    }

    public function destroy(Country $post)
    {
        $success = $post->delete();

        return [
            'success' => $success
        ];
    }
}
