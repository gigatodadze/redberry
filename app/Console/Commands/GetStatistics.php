<?php

namespace App\Console\Commands;

use App\Models\Country;
use App\Models\Statistic;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class GetStatistics extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'get:statistics';

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
    public function handle(Request $request, Country $country)
    {
        $currentDate = now()->format('Y-m-d');

        $countries = $country->getCountries();

        $key1 = env('X_RAPIDAPI_KEY');
        $key2 = env('X_RAPIDAPI_HOST');
        $par2 = $request->input('date', $currentDate);

        foreach ($countries as $value) {
            $par1 = $request->input('code', $value->code);
            $data = Http::withHeaders([
                'x-rapidapi-key' => $key1,
                'x-rapidapi-host' => $key2,
            ])->get('https://covid-19-data.p.rapidapi.com/country/code?code=' . $par1 . '&date=' . $par2)->json();
            dump($data);

            Statistic::firstOrCreate([
                'country_id' => $value->id,
                'confirmed' => $data[0]['confirmed'],
                'recovered' => $data[0]['recovered'],
                'death' => $data[0]['deaths'],
            ]);
            sleep(2);
        }

        return 0;
    }
}
