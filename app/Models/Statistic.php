<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Statistic extends Model
{
    use HasFactory;

    protected $table = 'statistics';

    public $timestamps = false;

    protected $fillable = [
        'country_id', 'confirmed', 'recovered', 'death'
    ];

    public function fetchStatistic(Request $request)
    {
        $statistic = Statistic::updateOrCreate(
            ['country_id' => $request->country_id, 'confirmed' => $request->confirmed,
                'recovered' => $request->recovered, 'death' => $request->death],

        );

    }

    public function countries()
    {

        return $this->belongsTo(Country::class);
    }
}
