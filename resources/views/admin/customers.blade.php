@extends('admin.layouts.app')
@section('style')
<link href="{{asset('assets/vendors/custom/datatables/datatables.bundle.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/css/admin/pages/book.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/css/admin/pages/product.css')}}" rel="stylesheet" type="text/css" />
@endsection
@section('scripts')
<script>

</script>
<!--begin::Page Vendors(used by this page) -->
<script src="{{asset('assets/vendors/custom/datatables/datatables.bundle.js')}}" type="text/javascript"></script>
<!--end::Page Vendors -->
<!--begin::Page Scripts(used by this page) -->
<script src="{{asset('assets/js/admin/pages/components/datatables/basic/basic_book.js')}}" type="text/javascript"></script>
<!--end::Page Scripts -->

<script src="{{asset('assets/js/admin/pages/book.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/js/admin/pages/customer.js')}}" type="text/javascript"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

@endsection
@section('title', 'Customers')
@section('page')
<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid" id="bookingContent">
    <div class="kt-portlet kt-portlet--mobile booking-header-mobile">
        <div class="kt-portlet__head">
            <div class="kt-portlet__head-toolbar">
                <div class="kt-portlet__head-toolbar">
                    <div class="dropdown dropdown-inline">
                        <button type="button" class="btn btn-secondary create-customer" data-id="{{ $no }}"><i class="fa fa-plus"></i>
                            Create Customer</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="booking-body kt-portlet__body" id="tableContent">
            <!--begin: Datatable -->
            <table class="table table-striped- table-bordered table-hover table-checkable" id="bt_table_1">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>No</th>
                        <th>Kategorie</th>
                        <th>Branche</th>
                        <th>Kontaktart</th>
                        <th>Firmenname</th>
                        <th>Name1</th>
                        <th>Name2</th>
                        <th>Anrede</th>
                        <th>Titel</th>
                        <th>Adresse</th>
                        <th>PLZ</th>
                        <th>Ort</th>
                        <th>Land</th>
                        <th>E-Mail</th>
                        <th>E-Mail2</th>
                        <th>Telefon</th>
                        <th>Telefon2</th>
                        <th>Mobile</th>
                        <th>Fax</th>
                        <th>Website</th>
                        <th>Skype</th>
                        <th>Anredeform</th>
                        <th>Geburtstag</th>
                        <th>Korrespondenzweg</th>
                        <th>Bemerkungen</th>
                        <th>Beziehungsinformation</th>
                        <th>Ansprechpartner</th>
                        <th>Sprache</th>
                        <th>MWST-Nummer</th>
                        <th>Anzahl Mitarbeiter</th>
                        <th>Handelsregister-Nr</th>
                        <th>Umsatzsteuer-Identifikationsnummer</th>
                        <th>Lead</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody id="tableBody">
                @foreach($customers as $key => $customer)
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ $customer->no }}</td>
                        <td>{{ $customer->category }}</td>
                        <td>{{ $customer->branch }}</td>
                        <td>{{ $customer->contact_type }}</td>
                        <td>{{ $customer->company_name }}</td>
                        <td>{{ $customer->name_1 }}</td>
                        <td>{{ $customer->name_2 }}</td>
                        <td>{{ $customer->salutation }}</td>
                        <td>{{ $customer->title }}</td>
                        <td>{{ $customer->address }}</td>
                        <td>{{ $customer->post_code }}</td>
                        <td>{{ $customer->location }}</td>
                        <td>{{ $customer->country }}</td>
                        <td>{{ $customer->email }}</td>
                        <td>{{ $customer->email_2 }}</td>
                        <td>{{ $customer->phone }}</td>
                        <td>{{ $customer->phone_2 }}</td>
                        <td>{{ $customer->mobile }}</td>
                        <td>{{ $customer->fax }}</td>
                        <td>{{ $customer->website }}</td>
                        <td>{{ $customer->skype }}</td>
                        <td>{{ $customer->form_of_address }}</td>
                        <td>{{ $customer->birthday }}</td>
                        <td>{{ $customer->correspondence_channel }}</td>
                        <td>{{ $customer->remarks }}</td>
                        <td>{{ $customer->relationship_info }}</td>
                        <td>{{ $customer->contact_person }}</td>
                        <td>{{ $customer->language }}</td>
                        <td>{{ $customer->vat_number }}</td>
                        <td>{{ $customer->number_of_employees }}</td>
                        <td>{{ $customer->commercial_register_no }}</td>
                        <td>{{ $customer->vat_identification_number }}</td>
                        <td>{{ $customer->lead }}</td>
                        <td class="user_td_center" nowrap>
                            <a class="btn btn-sm btn-clean btn-icon btn-icon-md" title="View" onclick="edit_btn(this)" data-id="{{ $customer->id }}">
                                <i style="font-size: 2rem" class="la la-edit"></i>
                            </a>
                            <a class="btn btn-sm btn-clean btn-icon btn-icon-md" title="remove" onClick="remove_btn(this)" data-id="{{ $customer->id }}">
                                <i style="font-size: 2rem" class="la la-trash"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <!--end: Datatable -->
        </div>
    </div>
</div>

@include('admin.customerModal')
@include('admin.removeModal')

@endsection
