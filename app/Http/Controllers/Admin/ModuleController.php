<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Module;
use DB;

class ModuleController extends Controller
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
        $modules = Module::orderBy('id', 'desc')->get();
        $serial_number = Module::orderBy('id', 'desc')->first();

        return view('admin.modules', [
            'modules'           => $modules,
            'serial_number'     => $serial_number
        ]);
    }

    public function create(Request $request) {

        $data = array(
            'sn_module'     => $request->serial_number,
            'cell1'         => $request->cell1,
            'cell2'         => $request->cell2,
            'cell3'         => $request->cell3,
            'cell4'         => $request->cell4,
            'cell5'         => $request->cell5,
            'cell6'         => $request->cell6,
            'cell7'         => $request->cell7,
            'cell8'         => $request->cell8,
            'cell9'         => $request->cell9,
            'cell10'        => $request->cell10,
            'cell11'        => $request->cell11,
            'cell12'        => $request->cell12,
            'cell13'        => $request->cell13,
            'cell14'        => $request->cell14,
            'cell15'        => $request->cell15,
            'cell16'        => $request->cell16,
            'soh_module'    => $request->soh
        );

        $result = Module::create($data);

        return response()->json(['status' => true]);
    }

    public function getItem(Request $request) {
        $id = $request->id;

        $data = Module::where('id', $id)->first();
        return response()->json(['data' => $data]);
    }

    public function edit(Request $request) {

        $id = $request->id;

        $data = array(
            'sn_module'     => $request->serial_number,
            'cell1'         => $request->cell1,
            'cell2'         => $request->cell2,
            'cell3'         => $request->cell3,
            'cell4'         => $request->cell4,
            'cell5'         => $request->cell5,
            'cell6'         => $request->cell6,
            'cell7'         => $request->cell7,
            'cell8'         => $request->cell8,
            'cell9'         => $request->cell9,
            'cell10'        => $request->cell10,
            'cell11'        => $request->cell11,
            'cell12'        => $request->cell12,
            'cell13'        => $request->cell13,
            'cell14'        => $request->cell14,
            'cell15'        => $request->cell15,
            'cell16'        => $request->cell16,
            'soh_module'    => $request->soh,
            'updated_at'    => date('Y-m-d h:i:s')
        );

        $result = Module::where('id', $id)->update($data);

        return response()->json(['status' => true]);
    }

    public function delete(Request $request) {
        $id = $request->id;

        $result = Module::where('id', $id)->delete();

        return response()->json(['status' => true]);
    }
}
