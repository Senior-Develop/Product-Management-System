<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\User;
use DB;
require 'Validators.php';

class CustomerController extends Controller
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
        $customers = User::whereNotNull('no')->orderBy('id', 'desc')->get();
        $no = User::whereNotNull('no')->orderBy('id', 'desc')->first();

        return view('admin.customers', [
            'customers' => $customers,
            'no'        => $no
        ]);
    }

    public function create(Request $request) {

        $messages = [
            'required'          => 'The :attribute field is required.',
        ];

        $validator = Validator::make($request->all(), [
            'email'     => 'required|email',
            'email_2'   => 'nullable|email',
            'name'      => 'required|alpha_spaces',
            'name_2'    => 'nullable|alpha_spaces',
            'address'   => 'nullable|alpha_spaces',
        ],$messages);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()]);
        }

        $data = array(
            'no'                            => $request->no,
            'category'                      => $request->category,
            'branch'                        => $request->branch,
            'contact_type'                  => $request->contact_type,
            'company_name'                  => $request->company_name,
            'name_1'                        => $request->name,
            'name_2'                        => $request->name_2,
            'salutation'                    => $request->salutation,
            'title'                         => $request->title,
            'address'                       => $request->address,
            'post_code'                     => $request->post_code,
            'location'                      => $request->location,
            'country'                       => $request->country,
            'email'                         => $request->email,
            'email_2'                       => $request->email_2,
            'phone'                         => $request->phone,
            'phone_2'                       => $request->phone_2,
            'mobile'                        => $request->mobile,
            'fax'                           => $request->fax,
            'website'                       => $request->website,
            'skype'                         => $request->skype,
            'form_of_address'               => $request->form_of_address,
            'birthday'                      => $request->birthday,
            'correspondence_channel'        => $request->correspondence_channel,
            'remarks'                       => $request->remarks,
            'relationship_info'             => $request->relationship_info,
            'contact_person'                => $request->contact_person,
            'language'                      => $request->language,
            'vat_number'                    => $request->vat_number,
            'number_of_employees'           => $request->number_of_employees,
            'commercial_register_no'        => $request->commercial_register_no,
            'vat_identification_number'     => $request->vat_identification_number,
            'lead'                          => $request->lead
        );

        $result = User::create($data);

        return response()->json(['status' => true]);
    }

    public function getItem(Request $request) {
        $id = $request->id;

        $data = User::where('id', $id)->first();
        return response()->json(['data' => $data]);
    }

    public function edit(Request $request) {

        $messages = [
            'required'          => 'The :attribute field is required.',
        ];

        $validator = Validator::make($request->all(), [
            'email'     => 'required|email',
            'email_2'   => 'nullable|email',
            'name'      => 'required|alpha_spaces',
            'name_2'    => 'nullable|alpha_spaces',
            'address'   => 'nullable|alpha_spaces',
        ],$messages);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()]);
        }

        $id = $request->id;

        $data = array(
            'no'                            => $request->no,
            'category'                      => $request->category,
            'branch'                        => $request->branch,
            'contact_type'                  => $request->contact_type,
            'company_name'                  => $request->company_name,
            'name_1'                        => $request->name,
            'name_2'                        => $request->name_2,
            'salutation'                    => $request->salutation,
            'title'                         => $request->title,
            'address'                       => $request->address,
            'post_code'                     => $request->post_code,
            'location'                      => $request->location,
            'country'                       => $request->country,
            'email'                         => $request->email,
            'email_2'                       => $request->email_2,
            'phone'                         => $request->phone,
            'phone_2'                       => $request->phone_2,
            'mobile'                        => $request->mobile,
            'fax'                           => $request->fax,
            'website'                       => $request->website,
            'skype'                         => $request->skype,
            'form_of_address'               => $request->form_of_address,
            'birthday'                      => $request->birthday,
            'correspondence_channel'        => $request->correspondence_channel,
            'remarks'                       => $request->remarks,
            'relationship_info'             => $request->relationship_info,
            'contact_person'                => $request->contact_person,
            'language'                      => $request->language,
            'vat_number'                    => $request->vat_number,
            'number_of_employees'           => $request->number_of_employees,
            'commercial_register_no'        => $request->commercial_register_no,
            'vat_identification_number'     => $request->vat_identification_number,
            'lead'                          => $request->lead,
            'updated_at'                    => date('Y-m-d h:i:s')
        );

        $result = User::where('id', $id)->update($data);

        return response()->json(['status' => true]);
    }

    public function delete(Request $request) {
        $id = $request->id;

        $result = User::where('id', $id)->delete();

        return response()->json(['status' => true]);
    }
}
