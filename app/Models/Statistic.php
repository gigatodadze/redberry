<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Statistic extends Model
{
    use HasFactory;

    protected $fillable = [
        'country_id', 'confirmed', 'recovered', 'death','created_at','updated_at'
    ];

    public function countries()
    {
        return $this->belongsTo(Country::class);
    }
}
