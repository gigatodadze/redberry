<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Countries;
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
    public function handle(Request $request)
    {
        $key1 = $request->header('x-rapidapi-key','5ae68dc990msh5919769237f8750p1c0933jsnf43267b9251b');
        $key2 = $request->header('x-rapidapi-host','covid-19-data.p.rapidapi.com');
        $par1 = $request->input('code',"ITA");
        $par2 = $request->input('date',"2021-08-29");

        $data = Http::withHeaders([
            'x-rapidapi-key' => $key1,
            'x-rapidapi-host' => $key2,
        ])->get('https://covid-19-data.p.rapidapi.com/country/code?code='.$par1.'&date='.$par2)->json();

        dd($data);


        $request->headers->set('x-rapidapi-key','5ae68dc990msh5919769237f8750p1c0933jsnf43267b9251b');
        $request->headers->set('x-rapidapi-host','covid-19-data.p.rapidapi.com');



//        dd($request);
//        $request->header($key1);
//        $request->header($key2);
//        $request->headers->set($key1,$key2);
        $http_response_header = $request->headers;
//        dd($http_response_header);

//        $data = Http::get('https://covid-19-data.p.rapidapi.com/country/code?code='.$par1.'&date='.$par2)->json();
//        dd($data);
//        foreach ($data as $value) {
//            DB::table('countries')->insert([
//                'code'    => $value['code'],
//                'name'   =>  json_encode($value['name']),
//            ]);
//        }
        return 0;
    }
}