<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Countries;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class GetCountries extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'get:countries';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get countries from API';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(Countries $countries)
    {

        $data = Http::get('https://countries.devtest.ge/')->json();


        foreach ($data as $value) {
              DB::table('countries')->insert([
                'code'    => $value['code'],
                'name'   =>  json_encode($value['name']),
            ]);
        }
        return 0;
    }
}
