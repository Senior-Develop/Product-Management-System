<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Configuration;
use DB;

class ConfigurationController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Configuration Controller
    |--------------------------------------------------------------------------
    |
    */
    protected $redirectTo = '/admin';

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $configurations = Configuration::orderBy('id', 'desc')->get();

        return view('admin.configurations', [
            'configurations' => $configurations,
        ]);
    }

    public function create(Request $request) {

        $data = array(
            'product_configuration'                 => $request->product_configuration,
            'number_cells'                          => $request->cell_number,
            'capacity_twice_guarantee'              => $request->capacity_twice,
            'capacity_estimated'                    => $request->capacity_estimated,
            'module_vertical'                       => $request->module_vertical,
            'module_horizontal'                     => $request->module_horizontal,
            'voltage'                               => $request->voltage,
            'permanent_charging_performance'        => $request->charging_performance,
            'permanent_discharging_performance'     => $request->discharging_performance,
            'permanent_charging_power'              => $request->charging_power,
            'permanent_discharging_power'           => $request->discharging_power,
            'length'                                => $request->length,
            'broad'                                 => $request->broad,
            'height'                                => $request->height,
            'weight'                                => $request->weight,
            'capacity_new'                          => $request->capacity_new,
            'total_modules'                         => $request->totl_modules,
            'logic_board_total'                     => $request->toal_logic_board,
            'additional_cover'                      => $request->additional_cover,
            'current_nom'                           => $request->current_nom,
            'current_peak'                          => $request->current_peak,
        );

        $result = Configuration::create($data);

        return response()->json(['status' => true]);
    }

    public function getItem(Request $request) {
        $id = $request->id;

        $data = Configuration::where('id', $id)->first();
        return response()->json(['data' => $data]);
    }

    public function edit(Request $request) {

        $id = $request->id;

        $data = array(
            'product_configuration'                 => $request->product_configuration,
            'number_cells'                          => $request->cell_number,
            'capacity_twice_guarantee'              => $request->capacity_twice,
            'capacity_estimated'                    => $request->capacity_estimated,
            'module_vertical'                       => $request->module_vertical,
            'module_horizontal'                     => $request->module_horizontal,
            'voltage'                               => $request->voltage,
            'permanent_charging_performance'        => $request->charging_performance,
            'permanent_discharging_performance'     => $request->discharging_performance,
            'permanent_charging_power'              => $request->charging_power,
            'permanent_discharging_power'           => $request->discharging_power,
            'length'                                => $request->length,
            'broad'                                 => $request->broad,
            'height'                                => $request->height,
            'weight'                                => $request->weight,
            'capacity_new'                          => $request->capacity_new,
            'total_modules'                         => $request->totl_modules,
            'logic_board_total'                     => $request->toal_logic_board,
            'additional_cover'                      => $request->additional_cover,
            'current_nom'                           => $request->current_nom,
            'current_peak'                          => $request->current_peak,
            'updated_at'                            => date('Y-m-d h:i:s')
        );

        $result = Configuration::where('id', $id)->update($data);

        return response()->json(['status' => true]);
    }

    public function delete(Request $request) {
        $id = $request->id;

        $result = Configuration::where('id', $id)->delete();

        return response()->json(['status' => true]);
    }
}
