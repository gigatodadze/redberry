<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Statistics extends Model
{
    use HasFactory;

    protected $table = 'statistics';

    public $timestamps = false;

    protected $fillable = [
        'country_id','confirmed','recovered','death'
    ];

    public function countries () {

        return $this->belongsTo(Countries::class);
    }
}
