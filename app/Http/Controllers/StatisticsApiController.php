<?php

namespace App\Http\Controllers;

use App\Models\Statistics;
use Illuminate\Http\Request;

class StatisticsApiController extends Controller
{
    public function index()
    {
        return Statistics::all();
    }

    public function store()
    {
        request()->validate([
            'country_id' => 'required',
            'confirmed' => 'required',
            'recovered' => 'required',
            'death' => 'required',

        ]);

        return Statistics::create([
            'country_id' => request('country_id'),
            'confirmed' => request('confirmed'),
            'recovered' => request('recovered'),
            'death' => request('death'),

        ]);
    }

    public function update(Statistics $post)
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

    public function destroy(Statistics $post)
    {
        $success = $post->delete();

        return [
            'success' => $success
        ];
    }}
