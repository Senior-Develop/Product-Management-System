<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Location;
use DB;
require 'Validators.php';

class LocationController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Dashboard Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */
    protected $redirectTo = '/admin';

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $locations = Location::orderBy('id', 'desc')->get();
        $serial_number = Location::orderBy('id', 'desc')->first();

        return view('admin.locations', [
            'locations'     => $locations,
            'serial_number' => $serial_number
        ]);
    }

    public function create(Request $request) {

        $messages = [
            'required'          => 'The :attribute field is required.',
        ];

        $validator = Validator::make($request->all(), [
            'email'         => 'required|email',
            'email_2'       => 'nullable|email',
            'name'          => 'required|alpha_spaces',
            'address'       => 'nullable|alpha_spaces',
            'company_name'  => 'nullable|alpha_spaces',
            'wgs84_lat'     => 'nullable|wgs84_lat',
            'wgs84_lon'     => 'nullable|wgs84_lon',
        ],$messages);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()]);
        }

        $data = array(
            'serial_number'     => $request->serial_number,
            'contact_type'      => $request->contact_type,
            'company_name'      => $request->company_name,
            'name'              => $request->name,
            'address'           => $request->address,
            'post_code'         => $request->post_code,
            'location'          => $request->location,
            'country'           => $request->country,
            'email'             => $request->email,
            'email_2'           => $request->email_2,
            'phone'             => $request->phone,
            'phone_2'           => $request->phone_2,
            'wgs84_lat'         => $request->wgs84_lat,
            'wgs84_lon'         => $request->wgs84_lon,
            'inverter_type'     => $request->inverter_type,
            'inverter_power'    => $request->inverter_power,
            'pv_power'          => $request->pv_power,
        );

        $result = Location::create($data);

        return response()->json(['status' => true]);
    }

    public function getItem(Request $request) {
        $id = $request->id;

        $data = Location::where('id', $id)->first();
        return response()->json(['data' => $data]);
    }

    public function edit(Request $request) {

        $messages = [
            'required'          => 'The :attribute field is required.',
        ];

        $validator = Validator::make($request->all(), [
            'email'         => 'required|email',
            'email_2'       => 'nullable|email',
            'name'          => 'required|alpha_spaces',
            'name_2'        => 'nullable|alpha_spaces',
            'address'       => 'nullable|alpha_spaces',
            'company_name'  => 'nullable|alpha_spaces',
            'wgs84_lat'     => 'nullable|wgs84_lat',
            'wgs84_lon'     => 'nullable|wgs84_lon',
        ],$messages);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()]);
        }

        $id = $request->id;

        $data = array(
            'serial_number'     => $request->serial_number,
            'contact_type'      => $request->contact_type,
            'company_name'      => $request->company_name,
            'name'              => $request->name,
            'address'           => $request->address,
            'post_code'         => $request->post_code,
            'location'          => $request->location,
            'country'           => $request->country,
            'email'             => $request->email,
            'email_2'           => $request->email_2,
            'phone'             => $request->phone,
            'phone_2'           => $request->phone_2,
            'wgs84_lat'         => $request->wgs84_lat,
            'wgs84_lon'         => $request->wgs84_lon,
            'inverter_type'     => $request->inverter_type,
            'inverter_power'    => $request->inverter_power,
            'pv_power'          => $request->pv_power,
            'updated_at'        => date('Y-m-d h:i:s')
        );

        $result = Location::where('id', $id)->update($data);

        return response()->json(['status' => true]);
    }

    public function delete(Request $request) {
        $id = $request->id;

        $result = Location::where('id', $id)->delete();

        return response()->json(['status' => true]);
    }
}
