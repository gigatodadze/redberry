<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Country extends Model
{
    use HasFactory;

    protected $table = "countries";

//    public $timestamps = false;

    protected $fillable = [
        'code', 'name'
    ];

    public function getCountries()
    {
        return DB::table('countries')->select('code', 'id')->get();
    }

    public function createCountry(Request $request)
    {
        $country = new Country();
        $country->code = $request->code;
        $country->name = $request->name;
        $country->save();
    }

    public function statistics()
    {
        return $this->hasMany(Country::class);
    }

}
