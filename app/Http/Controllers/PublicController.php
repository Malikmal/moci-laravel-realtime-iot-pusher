<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Device;

class PublicController extends Controller
{
    //
    public function temperature($id = 9)
    {
        $device = Device::all()->where('publish', '!=', NULL);

        // return $device;


        if(isset($device))
            $sensor = DB::table("sensor".$id)->orderBy('id', 'desc')->take(150)->get();
        else
            $sensor = null;

        // return $sensor;
        //recap this day
        $now = Carbon::now();
        $today = Carbon::today();
        // return $today->yesterday();
        $morning =  Carbon::today()->addHour(9) ; //recapped at 6 - 9 am
        $afternoon = Carbon::today()->addHour(12);
        $evening = Carbon::today()->addHour(21);

        if($now < $morning)
            $morning = $morning->subDay(1);
        if($now < $afternoon)
            $afternoon = $afternoon->subDay(1);
        if($now < $evening)
            $evening = $evening->subDay(1);

        // return $morning.'</br>'.$afternoon.'</br>'.$evening;
        $data = DB::table('recapsensor'.$id)
        // ->where(['created_at', 'like', $today->format('Y-m-d').'%'], ['created_at', 'like', $today->yesterday()->format('Y-m-d').'%'])
        // ->whereIn('created_at', 'like', [$today->format('Y-m-d').'%', $today->yesterday()->format('Y-m-d').'%' ])
        // ->whereDate('created_at', $today->yesterday())
        // ->whereDate('created_at', $today)
        ->whereDay('created_at', '>=', $today->yesterday())
        // ->where('created_at', '  >=', $now->yesterday())
        ->get();
        // $data = DB::table('recapsensor'.$id)->where('created_at', '>', $today->yesterday()));


        // return $data;
        // return $evening;
        $thisday = array();
        $thisday['morning'] = DB::table('recapsensor'.$id)->where('created_at', 'LIKE', $morning->format('Y-m-d H'.'%'))->first();
        $thisday['afternoon'] = DB::table('recapsensor'.$id)->where('created_at', 'LIKE', $afternoon->format('Y-m-d H'.'%'))->first();
        $thisday['evening'] = DB::table('recapsensor'.$id)->where('created_at', 'LIKE', $evening->format('Y-m-d H'.'%'))->first();
        // return $thisday;


        //recap daily or this week
        $day = Carbon::now();
        $daily = array();
        for($i=0; $i<7; $i++)
        {
            $d = $day->format('Y-m-d').'%';
            $data = DB::table('recapsensor'.$id)->where('created_at', 'like', $d)->count();
            // return $data;
            if(isset($data) && $data >= 1)
            {
                $recap = DB::table('recapsensor'.$id)->where('created_at', 'like', $d);
                $data = $recap->first();
                $data->temp = (float)$recap->avg('temp');
                $data->tempMin = (int)$recap->min('temp');
                $data->tempMax = (int)$recap->max('temp');
                $data->humidity = (float)$recap->avg('humidity');
                $data->humidityMin = (int)$recap->min('humidity');
                $data->humidityMax = (int)$recap->max('humidity');
                $data->airPressure= (float)$recap->avg('airPressure');
                $data->airPressureMin = (int)$recap->min('airPressure');
                $data->airPressureMax = (int)$recap->max('airPressure');
                $data->rain = (float)$recap->avg('rain');
                $data->rainMin = (int)$recap->min('rain');
                $data->rainMax = (int)$recap->max('rain');
                $data->day = $recap->first('created_at');
                $data->day = date('l', strtotime($data->day->created_at));
                $data->collect = DB::table('recapsensor'.$id)->where('created_at', 'like', $d)->get();
                //data collect just for graph
            }
            $daily[$i] = $data;
            $day->subDay(1);
        }
        // return $daily;

        //for graph daily temperature
        // return $daily[0]->collect->take(8);;

        return view('temperature', compact('device', 'sensor', 'id', 'daily', 'thisday'));
    }


    public function humidity($id = 9)
    {
        $device = Device::all()->where('publish', '!=', NULL);

        // return $device;


        if(isset($device))
            $sensor = DB::table("sensor".$id)->orderBy('id', 'desc')->take(150)->get();
        else
            $sensor = null;



         // return $sensor;
        //recap this day
        $now = Carbon::now();
        $today = Carbon::today();
        // return $today->yesterday();
        $morning =  Carbon::today()->addHour(9) ; //recapped at 6 - 9 am
        $afternoon = Carbon::today()->addHour(12);
        $evening = Carbon::today()->addHour(21);

        if($now < $morning)
            $morning = $morning->subDay(1);
        if($now < $afternoon)
            $afternoon = $afternoon->subDay(1);
        if($now < $evening)
            $evening = $evening->subDay(1);

        // return $morning.'</br>'.$afternoon.'</br>'.$evening;
        $data = DB::table('recapsensor'.$id)
        // ->where(['created_at', 'like', $today->format('Y-m-d').'%'], ['created_at', 'like', $today->yesterday()->format('Y-m-d').'%'])
        // ->whereIn('created_at', 'like', [$today->format('Y-m-d').'%', $today->yesterday()->format('Y-m-d').'%' ])
        // ->whereDate('created_at', $today->yesterday())
        // ->whereDate('created_at', $today)
        ->whereDay('created_at', '>=', $today->yesterday())
        // ->where('created_at', '  >=', $now->yesterday())
        ->get();
        // $data = DB::table('recapsensor'.$id)->where('created_at', '>', $today->yesterday()));


        // return $data;
        // return $evening;
        $thisday = array();
        $thisday['morning'] = DB::table('recapsensor'.$id)->where('created_at', 'LIKE', $morning->format('Y-m-d H'.'%'))->first();
        $thisday['afternoon'] = DB::table('recapsensor'.$id)->where('created_at', 'LIKE', $afternoon->format('Y-m-d H'.'%'))->first();
        $thisday['evening'] = DB::table('recapsensor'.$id)->where('created_at', 'LIKE', $evening->format('Y-m-d H'.'%'))->first();
        // return $thisday;


        //recap daily or this week
        $day = Carbon::now();
        $daily = array();
        for($i=0; $i<7; $i++)
        {
            $d = $day->format('Y-m-d').'%';
            $data = DB::table('recapsensor'.$id)->where('created_at', 'like', $d)->count();
            // return $data;
            if(isset($data) && $data >= 1)
            {
                $recap = DB::table('recapsensor'.$id)->where('created_at', 'like', $d);
                $data = $recap->first();
                $data->temp = (float)$recap->avg('temp');
                $data->tempMin = (int)$recap->min('temp');
                $data->tempMax = (int)$recap->max('temp');
                $data->humidity = (float)$recap->avg('humidity');
                $data->humidityMin = (int)$recap->min('humidity');
                $data->humidityMax = (int)$recap->max('humidity');
                $data->airPressure= (float)$recap->avg('airPressure');
                $data->airPressureMin = (int)$recap->min('airPressure');
                $data->airPressureMax = (int)$recap->max('airPressure');
                $data->rain = (float)$recap->avg('rain');
                $data->rainMin = (int)$recap->min('rain');
                $data->rainMax = (int)$recap->max('rain');
                $data->day = $recap->first('created_at');
                $data->day = date('l', strtotime($data->day->created_at));
                $data->collect = DB::table('recapsensor'.$id)->where('created_at', 'like', $d)->get();
                //data collect just for graph
            }
            $daily[$i] = $data;
            $day->subDay(1);
        }
        // return $daily;

        //for graph daily temperature
        // return $daily[0]->collect->take(8);;

        return view('humidity', compact('device', 'sensor', 'id', 'daily', 'thisday'));

    }

    public function airPressure($id = 9)
    {
        $device = Device::all()->where('publish', '!=', NULL);

        // return $device;


        if(isset($device))
            $sensor = DB::table("sensor".$id)->orderBy('id', 'desc')->take(150)->get();
        else
            $sensor = null;

        $recap = DB::table('recapsensor'.$id);



         // return $sensor;
        //recap this day
        $now = Carbon::now();
        $today = Carbon::today();
        // return $today->yesterday();
        $morning =  Carbon::today()->addHour(9) ; //recapped at 6 - 9 am
        $afternoon = Carbon::today()->addHour(12);
        $evening = Carbon::today()->addHour(21);

        if($now < $morning)
            $morning = $morning->subDay(1);
        if($now < $afternoon)
            $afternoon = $afternoon->subDay(1);
        if($now < $evening)
            $evening = $evening->subDay(1);

        // return $morning.'</br>'.$afternoon.'</br>'.$evening;
        $data = DB::table('recapsensor'.$id)
        // ->where(['created_at', 'like', $today->format('Y-m-d').'%'], ['created_at', 'like', $today->yesterday()->format('Y-m-d').'%'])
        // ->whereIn('created_at', 'like', [$today->format('Y-m-d').'%', $today->yesterday()->format('Y-m-d').'%' ])
        // ->whereDate('created_at', $today->yesterday())
        // ->whereDate('created_at', $today)
        ->whereDay('created_at', '>=', $today->yesterday())
        // ->where('created_at', '  >=', $now->yesterday())
        ->get();
        // $data = DB::table('recapsensor'.$id)->where('created_at', '>', $today->yesterday()));


        // return $data;
        // return $evening;
        $thisday = array();
        $thisday['morning'] = DB::table('recapsensor'.$id)->where('created_at', 'LIKE', $morning->format('Y-m-d H'.'%'))->first();
        $thisday['afternoon'] = DB::table('recapsensor'.$id)->where('created_at', 'LIKE', $afternoon->format('Y-m-d H'.'%'))->first();
        $thisday['evening'] = DB::table('recapsensor'.$id)->where('created_at', 'LIKE', $evening->format('Y-m-d H'.'%'))->first();
        // return $thisday;


        //recap daily or this week
        $day = Carbon::now();
        $daily = array();
        for($i=0; $i<7; $i++)
        {
            $d = $day->format('Y-m-d').'%';
            $data = DB::table('recapsensor'.$id)->where('created_at', 'like', $d)->count();
            // return $data;
            if(isset($data) && $data >= 1)
            {
                $recap = DB::table('recapsensor'.$id)->where('created_at', 'like', $d);
                $data = $recap->first();
                $data->temp = (float)$recap->avg('temp');
                $data->tempMin = (int)$recap->min('temp');
                $data->tempMax = (int)$recap->max('temp');
                $data->humidity = (float)$recap->avg('humidity');
                $data->humidityMin = (int)$recap->min('humidity');
                $data->humidityMax = (int)$recap->max('humidity');
                $data->airPressure= (float)$recap->avg('airPressure');
                $data->airPressureMin = (int)$recap->min('airPressure');
                $data->airPressureMax = (int)$recap->max('airPressure');
                $data->rain = (float)$recap->avg('rain');
                $data->rainMin = (int)$recap->min('rain');
                $data->rainMax = (int)$recap->max('rain');
                $data->day = $recap->first('created_at');
                $data->day = date('l', strtotime($data->day->created_at));
                $data->collect = DB::table('recapsensor'.$id)->where('created_at', 'like', $d)->get();
                //data collect just for graph
            }
            $daily[$i] = $data;
            $day->subDay(1);
        }
        // return $daily;

        //for graph daily temperature
        // return $daily[0]->collect->take(8);;

        return view('air_pressure', compact('device', 'sensor', 'id','daily', 'thisday'));
    }

    public function rain($id = 9)
    {
        $device = Device::all()->where('publish', '!=', NULL);

        // return $device;


        if(isset($device))
            $sensor = DB::table("sensor".$id)->orderBy('id', 'desc')->take(150)->get();
        else
            $sensor = null;

        $recap = DB::table('recapsensor'.$id);



         // return $sensor;
        //recap this day
        $now = Carbon::now();
        $today = Carbon::today();
        // return $today->yesterday();
        $morning =  Carbon::today()->addHour(9) ; //recapped at 6 - 9 am
        $afternoon = Carbon::today()->addHour(12);
        $evening = Carbon::today()->addHour(21);

        if($now < $morning)
            $morning = $morning->subDay(1);
        if($now < $afternoon)
            $afternoon = $afternoon->subDay(1);
        if($now < $evening)
            $evening = $evening->subDay(1);

        // return $morning.'</br>'.$afternoon.'</br>'.$evening;
        $data = DB::table('recapsensor'.$id)
        // ->where(['created_at', 'like', $today->format('Y-m-d').'%'], ['created_at', 'like', $today->yesterday()->format('Y-m-d').'%'])
        // ->whereIn('created_at', 'like', [$today->format('Y-m-d').'%', $today->yesterday()->format('Y-m-d').'%' ])
        // ->whereDate('created_at', $today->yesterday())
        // ->whereDate('created_at', $today)
        ->whereDay('created_at', '>=', $today->yesterday())
        // ->where('created_at', '  >=', $now->yesterday())
        ->get();
        // $data = DB::table('recapsensor'.$id)->where('created_at', '>', $today->yesterday()));


        // return $data;
        // return $evening;
        $thisday = array();
        $thisday['morning'] = DB::table('recapsensor'.$id)->where('created_at', 'LIKE', $morning->format('Y-m-d H'.'%'))->first();
        $thisday['afternoon'] = DB::table('recapsensor'.$id)->where('created_at', 'LIKE', $afternoon->format('Y-m-d H'.'%'))->first();
        $thisday['evening'] = DB::table('recapsensor'.$id)->where('created_at', 'LIKE', $evening->format('Y-m-d H'.'%'))->first();
        // return $thisday;


        //recap daily or this week
        $day = Carbon::now();
        $daily = array();
        for($i=0; $i<7; $i++)
        {
            $d = $day->format('Y-m-d').'%';
            $data = DB::table('recapsensor'.$id)->where('created_at', 'like', $d)->count();
            // return $data;
            if(isset($data) && $data >= 1)
            {
                $recap = DB::table('recapsensor'.$id)->where('created_at', 'like', $d);
                $data = $recap->first();
                $data->temp = (float)$recap->avg('temp');
                $data->tempMin = (int)$recap->min('temp');
                $data->tempMax = (int)$recap->max('temp');
                $data->humidity = (float)$recap->avg('humidity');
                $data->humidityMin = (int)$recap->min('humidity');
                $data->humidityMax = (int)$recap->max('humidity');
                $data->airPressure= (float)$recap->avg('airPressure');
                $data->airPressureMin = (int)$recap->min('airPressure');
                $data->airPressureMax = (int)$recap->max('airPressure');
                $data->rain = (float)$recap->avg('rain');
                $data->rainMin = (int)$recap->min('rain');
                $data->rainMax = (int)$recap->max('rain');
                $data->day = $recap->first('created_at');
                $data->day = date('l', strtotime($data->day->created_at));
                $data->collect = DB::table('recapsensor'.$id)->where('created_at', 'like', $d)->get();
                //data collect just for graph
            }
            $daily[$i] = $data;
            $day->subDay(1);
        }
        // return $daily;

        //for graph daily temperature
        // return $daily[0]->collect->take(8);;

        return view('rain', compact('device', 'sensor', 'id','daily', 'thisday'));
    }


    public function dashboard($id = 9)
    {
        $device = Device::all()->where('publish', '!=', NULL);

        // return $device;


        if(isset($device)){

            $sensor = DB::table("sensor".$id)->orderBy('id', 'desc')->take(150)->get();
            $sensorNow =  DB::table("sensor".$id)->orderBy('id', 'desc')->first();
        }
        else{
            $sensor = null;
        }


        //recap daily or this week
        $day = Carbon::now();
        $daily = array();
        for($i=0; $i<7; $i++)
        {
            $d = $day->format('Y-m-d').'%';
            $data = DB::table('recapsensor'.$id)->where('created_at', 'like', $d)->count();
            // return $data;
            if(isset($data) && $data >= 1)
            {
                $recap = DB::table('recapsensor'.$id)->where('created_at', 'like', $d);
                $data = $recap->first();
                $data->temp = (float)$recap->avg('temp');
                $data->tempMin = (int)$recap->min('temp');
                $data->tempMax = (int)$recap->max('temp');
                $data->humidity = (float)$recap->avg('humidity');
                $data->humidityMin = (int)$recap->min('humidity');
                $data->humidityMax = (int)$recap->max('humidity');
                $data->airPressure= (float)$recap->avg('airPressure');
                $data->airPressureMin = (int)$recap->min('airPressure');
                $data->airPressureMax = (int)$recap->max('airPressure');
                $data->rain = (float)$recap->avg('rain');
                $data->rainMin = (int)$recap->min('rain');
                $data->rainMax = (int)$recap->max('rain');
                $data->day = $recap->first('created_at');
                $data->day = date('D', strtotime($data->day->created_at));
                // $data->collect = DB::table('recapsensor'.$id)->where('created_at', 'like', $d)->get();
                //data collect just for graph
            }
            $daily[$i] = $data;
            $day->subDay(1);
        }

        // return $daily;

        $day = Carbon::now();
        $d = $day->format('Y-m-d').'%';
        $delapanterakhir = DB::table('recapsensor'.$id)->where('created_at', 'like', $d)->get();

        // return  $delapanterakhir ;
        return view('dashboard', compact('device', 'sensor', 'sensorNow', 'id', 'daily', 'delapanterakhir'));
    }
}
