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
<script src="{{asset('assets/js/admin/pages/location.js')}}" type="text/javascript"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

@endsection
@section('title', 'Locations')
@section('page')
<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid" id="bookingContent">
    <div class="kt-portlet kt-portlet--mobile booking-header-mobile">
        <div class="kt-portlet__head">
            <div class="kt-portlet__head-toolbar">
                <div class="kt-portlet__head-toolbar">
                    <div class="dropdown dropdown-inline">
                        <button type="button" class="btn btn-secondary create-location" data-id="{{ $serial_number }}"><i class="fa fa-plus"></i>
                            Create Location</button>
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
                        <th>Serial Number</th>
                        <th>Kontaktart</th>
                        <th>Firmenname</th>
                        <th>Name</th>
                        <th>Adresse</th>
                        <th>PLZ</th>
                        <th>Ort</th>
                        <th>Land</th>
                        <th>E-Mail</th>
                        <th>E-Mail 2</th>
                        <th>Telefon</th>
                        <th>Telefon 2</th>
                        <th>WGS84_LAT</th>
                        <th>WGS84_LON</th>
                        <th>Wechselrichter Typ</th>
                        <th>Wechslerichter Leistung</th>
                        <th>PV Leistung</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody id="tableBody">
                @foreach($locations as $key => $location)
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ $location->serial_number }}</td>
                        <td>{{ $location->contact_type }}</td>
                        <td>{{ $location->company_name }}</td>
                        <td>{{ $location->name }}</td>
                        <td>{{ $location->address }}</td>
                        <td>{{ $location->post_code }}</td>
                        <td>{{ $location->location }}</td>
                        <td>{{ $location->country }}</td>
                        <td>{{ $location->email }}</td>
                        <td>{{ $location->email_2 }}</td>
                        <td>{{ $location->phone }}</td>
                        <td>{{ $location->phone_2 }}</td>
                        <td>{{ $location->wgs84_lat }}</td>
                        <td>{{ $location->wgs84_lon }}</td>
                        <td>{{ $location->inverter_type }}</td>
                        <td>{{ $location->inverter_power }}</td>
                        <td>{{ $location->pv_power }}</td>
                        <td class="user_td_center" nowrap>
                            <a class="btn btn-sm btn-clean btn-icon btn-icon-md" title="View" onclick="edit_btn(this)" data-id="{{ $location->id }}">
                                <i style="font-size: 2rem" class="la la-edit"></i>
                            </a>
                            <a class="btn btn-sm btn-clean btn-icon btn-icon-md" title="remove" onClick="remove_btn(this)" data-id="{{ $location->id }}">
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

@include('admin.locationModal')

@include('admin.removeModal')

@endsection
