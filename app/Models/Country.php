<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Country extends Model
{
    use HasFactory;

    protected $fillable = [
        'code', 'name','updated_at','created_at'
    ];

    public function getCountries()
    {
        return DB::table('countries')->select('code', 'id')->get();
    }

    public function statistics()
    {
        return $this->hasMany(Country::class);
    }

}
