<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sensor;
use App\Events\TestEvent;
use App\Device;

use Illuminate\Support\Facades\DB;
class SensorController extends Controller
{
    //

    /*
    * THIS ISI JUST FOR HARDWARE NOT TO TRY
    */
    public function insert($id, $temperature, $humidity, $airPressure, $rain)
    {
        // $temperature
        // send to realtime database sensor along 3 hours
        $tableName = DB::table('sensor'.$id);
        $tableName->insert([
            'temp' => $temperature,
            'humidity' => $humidity,
            'airPressure' => $airPressure,
            'rain' => $rain
        ]);

        // return json_encode($tableName->orderBy('id', 'desc')->first());
        return event(new TestEvent($id, $temperature, $humidity, $airPressure, $rain));
    }



    //recap every 3 ours
    //access with curl in crontask
    function recap()
    {
        $device = Device::all('id');
        foreach($device as $item)
        {
            $id = $item->id;
            $sensorTable = DB::table('sensor'.$id);
            $recapTable = DB::table('recapsensor'.$id);
            $recapTable->insert([
                'temp'              => $sensorTable->avg('temp'),
                'tempMin'           => $sensorTable->min('temp'),
                'tempMax'           => $sensorTable->max('temp'),
                'humidity'          => $sensorTable->avg('humidity'),
                'humidityMin'       => $sensorTable->min('humidity'),
                'humidityMax'       => $sensorTable->max('humidity'),
                'airPressure'       => $sensorTable->avg('airPressure'),
                'airPressureMin'    => $sensorTable->min('airPressure'),
                'airPressureMax'    => $sensorTable->max('airPressure'),
                'rain'              => $sensorTable->avg('rain'),
                'rainMin'           => $sensorTable->min('rain'),
                'rainMax'           => $sensorTable->max('rain'),
            ]);
            DB::statement('TRUNCATE TABLE sensor'.$id);
        }
        return 0;
    }



    Public function test()
    {
        $data = Sensor::orderBy('id')->chunk(100, function ($users) {
                    foreach ($users as $user) {
                        //
                    }
                });
    }

    public function sensorLast()
    {

        $suhu =  array();
        $data = DB::table('sensors')->orderBy('id', 'desc')->take(100)->get('suhu');
        // $data = Sensor::orderBy('id', 'desc')->take(50)->get('suhu');
        // $data = Sensor::orderBy('id', 'desc')->first('suhu');
        // $data = Sensor::orderBy('id', 'desc')->take(100)->get('suhu');
        // return $data->suhu;
        // return $data;
        $i = 0;
        foreach($data as $item)
        {
            array_push($suhu, [$i, $item->suhu]);
            $i++;
        }
        return $suhu;

        // $i = 1;
        // $newTable = '
        // CREATE TABLE `sensors'.$i.'` (
        //   `id` int(10) UNSIGNED NOT NULL,
        //   `suhu` int(11) NOT NULL,
        //   `kelembapan` int(11) NOT NULL,
        //   `hujan` tinyint(1) NOT NULL,
        //   `created_at` timestamp NULL DEFAULT NULL,
        //   `updated_at` timestamp NULL DEFAULT NULL
        // ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
        // ';
        // DB::statement($newTable);
        // $suhu = array();
        // $data = DB::table('sensors')->orderBy('id', 'desc')->take(100);
        // $data->chunk(200, function($suhu){
        //     $i = 0;
        //     foreach($suhu as $item)
        //     {
        //         echo $item->suhu. " ";
        //         $i++;
        //         if($i >= 100)
        //             break;
        //     }
        // });
        // return $data;
        // $data = Sensor::orderBy('id', 'desc')
        //         ->take(100)
        //         ->chunk(200, function ($flights) {
        //             // $suhu= ;
        //             for($i=0; $i < 100; $i++)
        //             {
        //                 array_push($this->suhu, [$i, $flights[$i]->suhu]);
        //                 // echo $flights[$i]->suhu." ";
        //             }
        //             // foreach ($flights as $flight) {
        //             //     //
        //             //     echo $flight;
        //             //     // array_push($this->suhu, [$i, $flight->suhu]);
        //             //     // $i++;
        //             // }
        //         });
        // echo $data;
    }




}
