<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Module;
use App\Models\User;
use App\Models\Configuration;
use App\Models\Location;
use DB;

class ProductController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Product Controller
    |--------------------------------------------------------------------------
    |
    |
    */
    protected $redirectTo = '/admin';

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $products = Product::leftJoin('users', 'products.customer_id', '=', 'users.id')
                    ->leftJoin('locations', 'products.location_id', '=', 'locations.id')
                    ->leftJoin('configurations', 'products.configuration_id', '=', 'configurations.id')
                    ->select('products.*', 'users.name_1', 'locations.location', 'configurations.product_configuration')
                    ->orderBy('id', 'desc')
                    ->get();

        $serial_number = Product::orderBy('id', 'desc')->first();

        $modules = Module::get();

        $customers = User::get();

        $locations = Location::get();

        $configurations = Configuration::get();
        $no = User::whereNotNull('no')->orderBy('id', 'desc')->first();

        return view('admin.products', [
            'products'          => $products,
            'serial_number'     => $serial_number,
            'modules'           => $modules,
            'customers'         => $customers,
            'configurations'    => $configurations,
            'locations'         => $locations,
            'no'                => $no
        ]);
    }

    public function create(Request $request) {

        $data = array(
            'serial_number' => $request->serial_number,
            'sn_module1' => $request->sn_module1,
            'sn_module2' => $request->sn_module2,
            'sn_module3' => $request->sn_module3,
            'sn_module4' => $request->sn_module4,
            'sn_module5' => $request->sn_module5,
            'sn_module6' => $request->sn_module6,
            'sn_module7' => $request->sn_module7,
            'sn_module8' => $request->sn_module8,
            'hw_release' => $request->hw_release,
            'sw_release' => $request->sw_release,
            'customer_id' => $request->customer,
            'location_id' => $request->location,
            'configuration_id' => $request->configuration
        );

        $result = Product::create($data);

        return response()->json(['status' => true]);
    }

    public function getItem(Request $request) {
        $id = $request->id;

        $data = Product::where('id', $id)->first();
        return response()->json(['data' => $data]);
    }

    public function edit(Request $request) {

        $id = $request->id;

        $data = array(
            'serial_number' => $request->serial_number,
            'sn_module1' => $request->sn_module1,
            'sn_module2' => $request->sn_module2,
            'sn_module3' => $request->sn_module3,
            'sn_module4' => $request->sn_module4,
            'sn_module5' => $request->sn_module5,
            'sn_module6' => $request->sn_module6,
            'sn_module7' => $request->sn_module7,
            'sn_module8' => $request->sn_module8,
            'hw_release' => $request->hw_release,
            'sw_release' => $request->sw_release,
            'customer_id' => $request->customer,
            'location_id' => $request->location,
            'configuration_id' => $request->configuration,
            'updated_at'    => date('Y-m-d h:i:s')
        );

        $result = Product::where('id', $id)->update($data);

        return response()->json(['status' => true]);
    }

    public function delete(Request $request) {
        $id = $request->id;

        $result = Product::where('id', $id)->delete();

        return response()->json(['status' => true]);
    }
}