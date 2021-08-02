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
<script src="{{asset('assets/js/admin/pages/module.js')}}" type="text/javascript"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

@endsection
@section('title', 'Modules')
@section('page')
<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid" id="bookingContent">
    <div class="kt-portlet kt-portlet--mobile booking-header-mobile">
        <div class="kt-portlet__head">
            <div class="kt-portlet__head-toolbar">
                <div class="kt-portlet__head-toolbar">
                    <div class="dropdown dropdown-inline">
                        <button type="button" class="btn btn-secondary create-module" data-id="{{ $serial_number }}"><i class="fa fa-plus"></i>
                            Create Module</button>
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
                        <th>SN_Modul (Key, increase automaticly)</th>
                        <th>Cell1</th>
                        <th>Cell2</th>
                        <th>Cell3</th>
                        <th>Cell4</th>
                        <th>Cell5</th>
                        <th>Cell6</th>
                        <th>Cell7</th>
                        <th>Cell8</th>
                        <th>Cell9</th>
                        <th>Cell10</th>
                        <th>Cell11</th>
                        <th>Cell12</th>
                        <th>Cell13</th>
                        <th>Cell14</th>
                        <th>Cell15</th>
                        <th>Cell16</th>
                        <th>SOH Modul</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody id="tableBody">
                @foreach($modules as $key => $module)
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ $module->sn_module }}</td>
                        <td>{{ $module->cell1 }}</td>
                        <td>{{ $module->cell2 }}</td>
                        <td>{{ $module->cell3 }}</td>
                        <td>{{ $module->cell4 }}</td>
                        <td>{{ $module->cell5 }}</td>
                        <td>{{ $module->cell6 }}</td>
                        <td>{{ $module->cell7 }}</td>
                        <td>{{ $module->cell8 }}</td>
                        <td>{{ $module->cell9 }}</td>
                        <td>{{ $module->cell10 }}</td>
                        <td>{{ $module->cell11 }}</td>
                        <td>{{ $module->cell12 }}</td>
                        <td>{{ $module->cell13 }}</td>
                        <td>{{ $module->cell14 }}</td>
                        <td>{{ $module->cell15 }}</td>
                        <td>{{ $module->cell16 }}</td>
                        <td>{{ $module->soh_module }}</td>
                        <td class="user_td_center" nowrap>
                            <a class="btn btn-sm btn-clean btn-icon btn-icon-md" title="View" onclick="edit_btn(this)" data-id="{{ $module->id }}">
                                <i style="font-size: 2rem" class="la la-edit"></i>
                            </a>
                            <a class="btn btn-sm btn-clean btn-icon btn-icon-md" title="remove" onClick="remove_btn(this)" data-id="{{ $module->id }}">
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

<div class="modal fade" id="moduleModal" tabindex="-1" role="dialog" aria-labelledby="editBookModalTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editBookModalTitle">Module</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body modal-height">
                <div class="kt-scroll" data-scroll="true">
                    <div class="form-group row">
                        <label class="col-4 col-form-label">Serial Number</label>
                        <div class="col-8">
                            <input type="text" class="form-control serial-number">
                            <input type="hidden" class="form-control" id="record_id">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-4 col-form-label">Cell1</label>
                        <div class="col-8">
                            <input type="text" class="form-control cell1">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-4 col-form-label">Cell2</label>
                        <div class="col-8">
                            <input type="text" class="form-control cell2">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-4 col-form-label">Cell3</label>
                        <div class="col-8">
                            <input type="text" class="form-control cell3">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-4 col-form-label">Cell4</label>
                        <div class="col-8">
                            <input type="text" class="form-control cell4">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-4 col-form-label">Cell5</label>
                        <div class="col-8">
                            <input type="text" class="form-control cell5">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-4 col-form-label">Cell6</label>
                        <div class="col-8">
                            <input type="text" class="form-control cell6">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-4 col-form-label">Cell7</label>
                        <div class="col-8">
                            <input type="text" class="form-control cell7">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-4 col-form-label">Cell8</label>
                        <div class="col-8">
                            <input type="text" class="form-control cell8">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-4 col-form-label">Cell9</label>
                        <div class="col-8">
                            <input type="text" class="form-control cell9">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-4 col-form-label">Cell10</label>
                        <div class="col-8">
                            <input type="text" class="form-control cell10">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-4 col-form-label">Cell11</label>
                        <div class="col-8">
                            <input type="text" class="form-control cell11">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-4 col-form-label">Cell12</label>
                        <div class="col-8">
                            <input type="text" class="form-control cell12">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-4 col-form-label">Cell13</label>
                        <div class="col-8">
                            <input type="text" class="form-control cell13">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-4 col-form-label">Cell14</label>
                        <div class="col-8">
                            <input type="text" class="form-control cell14">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-4 col-form-label">Cell15</label>
                        <div class="col-8">
                            <input type="text" class="form-control cell15">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-4 col-form-label">Cell16</label>
                        <div class="col-8">
                            <input type="text" class="form-control cell16">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-4 col-form-label">SOH Module</label>
                        <div class="col-8">
                            <input type="text" class="form-control soh">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-brand" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary save-btn">Save</button>
            </div>
        </div>
    </div>
</div>

@include('admin.removeModal')

@endsection
