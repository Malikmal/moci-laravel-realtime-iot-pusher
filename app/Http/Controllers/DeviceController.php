<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Device;

use Illuminate\Support\Facades\DB;

class DeviceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $devices = Device::all();
        return view('admin.index', compact('devices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view('admin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // save the devices
        $device = new Device();
        $device->name = $request->name;
        $device->place = $request->place;
        $device->description = $request->description;
        $device->coordinate = $request->coordinate;
        // return $data;
        $device->save();


        //table sensor
        $newTable = '
        CREATE TABLE `sensor'.$device->id.'` (
          `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
          `temp` int(11) NOT NULL,
          `humidity` int(11) NOT NULL,
          `airPressure` int(11) NOT NULL,
          `rain` int(11) NOT NULL,
          `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
          `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
           PRIMARY KEY (`id`)
        )  ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
        ';
        DB::statement($newTable);

        //table recap sensors
        $newTable = '
        CREATE TABLE `recapsensor'.$device->id.'` (
          `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
          `temp` int(11) NOT NULL,
          `tempMin` int(11) NOT NULL,
          `tempMax` int(11) NOT NULL,
          `humidity` int(11) NOT NULL,
          `humidityMin` int(11) NOT NULL,
          `humidityMax` int(11) NOT NULL,
          `airPressure` int(11) NOT NULL,
          `airPressureMin` int(11) NOT NULL,
          `airPressureMax` int(11) NOT NULL,
          `rain` int(11) NOT NULL,
          `rainMin` int(11) NOT NULL,
          `rainMax` int(11) NOT NULL,
          `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
          `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
          PRIMARY KEY (`id`)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
        ';
        DB::statement($newTable);

        return redirect()->route('device.index');
    }
   /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $device = Device::find($id);

        return view('admin.edit', compact('device'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $device = Device::find($id);

        $device->name = $request->name;
        $device->place = $request->place;
        $device->description = $request->description;
        $device->coordinate = $request->coordinate;
        $device->update();


        return redirect()->route('device.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $device = Device::find($id);
        $device->delete();

        //delete sensor data table
        $deleteTable = '
        DROP TABLE `sensor'.$device->id.'`;
        ';
        DB::statement($deleteTable);


        //delete recap sensor data table
        $deleteTable = '
        DROP TABLE `recapsensor'.$device->id.'`;
        ';
        DB::statement($deleteTable);

        return redirect()->route('device.index');
    }

    public function publish($id)
    {
        $device = Device::find($id);
        if($device->publish)
            $device->publish = NULL;
        else
            $device->publish = 1;
        $device->update();

        return redirect()->route('device.index');
    }
}

