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
<script src="{{asset('assets/js/admin/pages/product.js')}}" type="text/javascript"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

@endsection
@section('title', 'Products')
@section('page')
<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid" id="bookingContent">
    <div class="kt-portlet kt-portlet--mobile booking-header-mobile">
        <div class="kt-portlet__head">
            <div class="kt-portlet__head-toolbar">
                <div class="kt-portlet__head-toolbar">
                    <div class="dropdown dropdown-inline">
                        <button type="button" class="btn btn-secondary create-product" data-id="{{ $serial_number }}"><i class="fa fa-plus"></i>
                            Create Product</button>
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
                        <th>SN_Modul1</th>
                        <th>SN_Modul2</th>
                        <th>SN_Modul3</th>
                        <th>SN_Modul4</th>
                        <th>SN_Modul5</th>
                        <th>SN_Modul6</th>
                        <th>SN_Modul7</th>
                        <th>SN_Modul8</th>
                        <th>HW_Release</th>
                        <th>SW_Release</th>
                        <th>Customer</th>
                        <th>Location</th>
                        <th>Configuration</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody id="tableBody">
                @foreach($products as $key => $product)
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ $product->serial_number }}</td>
                        <td>{{ $product->sn_module1 }}</td>
                        <td>{{ $product->sn_module2 }}</td>
                        <td>{{ $product->sn_module3 }}</td>
                        <td>{{ $product->sn_module4 }}</td>
                        <td>{{ $product->sn_module5 }}</td>
                        <td>{{ $product->sn_module6 }}</td>
                        <td>{{ $product->sn_module7 }}</td>
                        <td>{{ $product->sn_module8 }}</td>
                        <td>{{ $product->hw_release }}</td>
                        <td>{{ $product->sw_release }}</td>
                        <td>{{ $product->name_1 }}</td>
                        <td>{{ $product->location }}</td>
                        <td>{{ $product->product_configuration }}</td>
                        <td class="user_td_center" nowrap>
                            <a class="btn btn-sm btn-clean btn-icon btn-icon-md edit-btn" title="View" data-id="{{ $product->id }}" onClick="edit_btn(this)">
                                <i style="font-size: 2rem" class="la la-edit"></i>
                            </a>
                            <a class="btn btn-sm btn-clean btn-icon btn-icon-md remove_btn" title="remove" data-id="{{ $product->id }}" onClick="remove_btn(this)">
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

<div class="modal fade" id="productModal" tabindex="-1" role="dialog" aria-labelledby="editBookModalTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editBookModalTitle">Product</h5>
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
                        <label for="customer-input" class="col-4 col-form-label">Configuration</label>
                        <div class="col-8">
                            <select class="form-control configuration-select">
                                <option value=""></option>
                                @foreach($configurations as $configuration)
                                    <option value="{{ $configuration->id }}" data-id="{{ $configuration->product_configuration }}">{{$configuration->product_configuration}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-4 col-form-label">SN Modul1</label>
                        <div class="col-8 sn_module">
                            <select onchange="this.nextElementSibling.value=this.value">
                                <option value=""></option>
                                @foreach($modules as $module)
                                    <option value="{{ $module->sn_module }}">{{$module->sn_module}}</option>
                                @endforeach
                            </select>
                            <input type="text" class="sn-module1" value=""/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-4 col-form-label">SN Modul2</label>
                        <div class="col-8 sn_module">
                            <select onchange="this.nextElementSibling.value=this.value">
                                <option value=""></option>
                                @foreach($modules as $module)
                                    <option value="{{ $module->sn_module }}">{{$module->sn_module}}</option>
                                @endforeach
                            </select>
                            <input type="text" class="sn-module2" value=""/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-4 col-form-label">SN Modul3</label>
                        <div class="col-8 sn_module">
                            <select onchange="this.nextElementSibling.value=this.value">
                                <option value=""></option>
                                @foreach($modules as $module)
                                    <option value="{{ $module->sn_module }}">{{$module->sn_module}}</option>
                                @endforeach
                            </select>
                            <input type="text" class="sn-module3" value=""/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-4 col-form-label">SN Modul4</label>
                        <div class="col-8 sn_module">
                            <select onchange="this.nextElementSibling.value=this.value">
                                <option value=""></option>
                                @foreach($modules as $module)
                                    <option value="{{ $module->sn_module }}">{{$module->sn_module}}</option>
                                @endforeach
                            </select>
                            <input type="text" class="sn-module4" value=""/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-4 col-form-label">SN Modul5</label>
                        <div class="col-8 sn_module">
                            <select onchange="this.nextElementSibling.value=this.value">
                                <option value=""></option>
                                @foreach($modules as $module)
                                    <option value="{{ $module->sn_module }}">{{$module->sn_module}}</option>
                                @endforeach
                            </select>
                            <input type="text" class="sn-module5" value=""/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-4 col-form-label">SN Modul6</label>
                        <div class="col-8 sn_module">
                            <select onchange="this.nextElementSibling.value=this.value">
                                <option value=""></option>
                                @foreach($modules as $module)
                                    <option value="{{ $module->sn_module }}">{{$module->sn_module}}</option>
                                @endforeach
                            </select>
                            <input type="text" class="sn-module6" value=""/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-4 col-form-label">SN Modul7</label>
                        <div class="col-8 sn_module">
                            <select onchange="this.nextElementSibling.value=this.value">
                                <option value=""></option>
                                @foreach($modules as $module)
                                    <option value="{{ $module->sn_module }}">{{$module->sn_module}}</option>
                                @endforeach
                            </select>
                            <input type="text" class="sn-module7" value=""/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-4 col-form-label">SN Modul8</label>
                        <div class="col-8 sn_module">
                            <select onchange="this.nextElementSibling.value=this.value">
                                <option value=""></option>
                                @foreach($modules as $module)
                                    <option value="{{ $module->sn_module }}">{{$module->sn_module}}</option>
                                @endforeach
                            </select>
                            <input type="text" class="sn-module8" value=""/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-4 col-form-label">HW Release</label>
                        <div class="col-8">
                            <input type="text" class="form-control hw-release">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-4 col-form-label">SW Release</label>
                        <div class="col-8">
                            <input type="text" class="form-control sw-release">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="customer-input" class="col-4 col-form-label">Customers</label>
                        <div class="col-7">
                            <select class="form-control customer-select">
                                @foreach($customers as $customer)
                                    <option value="{{ $customer->id }}">{{$customer->name_1}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-1 green cross-align-customer create-customer" data-id="{{$no}}"><i class="fa fa-plus"></i></div>
                    </div>
                    <div class="form-group row">
                        <label for="customer-input" class="col-4 col-form-label">Location</label>
                        <div class="col-7">
                            <select class="form-control location-select">
                                @foreach($locations as $location)
                                    <option value="{{ $location->id }}">{{$location->address}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-1 green cross-align-location"><i class="fa fa-plus"></i></div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-brand" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary product-save-btn">Save</button>
            </div>
        </div>
    </div>
</div>

@include('admin.customerModal')
@include('admin.locationModal')
@include('admin.removeModal')

@endsection