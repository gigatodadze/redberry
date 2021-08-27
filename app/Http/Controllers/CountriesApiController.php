<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Countries;

class CountriesApiController extends Controller
{
    public function index()
    {
        return Countries::all();
    }

    public function store()
    {
        request()->validate([
            'code' => 'required',
            'name' => 'required',
        ]);

        return Countries::create([
            'code' => request('code'),
            'name' => request('name'),
        ]);
    }

    public function update(Countries $post)
    {
        request()->validate([
            'code' => 'required',
            'name' => 'required',
        ]);

        $success = $post->update([
            'code' => request('code'),
            'name' => request('name'),
        ]);

        return [
            'success' => $success
        ];
    }

    public function destroy(Countries $post)
    {
        $success = $post->delete();

        return [
            'success' => $success
        ];
    }
}
