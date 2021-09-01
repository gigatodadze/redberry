<?php

namespace App\Http\Controllers;

use App\Models\Statistic;
use Illuminate\Http\Request;

class StatisticApiController extends Controller
{
    public function index()
    {
        return Statistic::all();
    }

    public function store(Request $request)
    {
        request()->validate([
            'country_id' => 'required',
            'confirmed' => 'required',
            'recovered' => 'required',
            'death' => 'required',

        ]);

        return Statistic::create([
            'country_id' => $request->country_id,
            'confirmed' => $request->confirmed,
            'recovered' => $request->recovered,
            'death' => $request->death,

        ]);
    }

    public function update(Statistic $post)
    {
        request()->validate([
            'country_id' => 'required',
            'confirmed' => 'required',
            'recovered' => 'required',
            'death' => 'required',

        ]);

        $success = $post->update([
            'country_id' => 'required',
            'confirmed' => 'required',
            'recovered' => 'required',
            'death' => 'required',

        ]);

        return [
            'success' => $success
        ];
    }

    public function destroy(Statistic $post)
    {
        $success = $post->delete();

        return [
            'success' => $success
        ];
    }
}
