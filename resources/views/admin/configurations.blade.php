@extends('admin.layouts.app')
@section('style')
<link href="{{asset('assets/vendors/custom/datatables/datatables.bundle.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/css/admin/pages/book.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/css/admin/pages/configuration.css')}}" rel="stylesheet" type="text/css" />
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
<script src="{{asset('assets/js/admin/pages/configuration.js')}}" type="text/javascript"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

@endsection
@section('title', 'Configurations')
@section('page')
<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid" id="bookingContent">
    <div class="kt-portlet kt-portlet--mobile booking-header-mobile">
        <div class="kt-portlet__head">
            <div class="kt-portlet__head-toolbar">
                <div class="kt-portlet__head-toolbar">
                    <div class="dropdown dropdown-inline">
                        <button type="button" class="btn btn-secondary create-configuration"><i class="fa fa-plus"></i>
                            Create Configuration</button>
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
                        <th>Produktekonfiguration (Key)</th>
                        <th>Anzahl Zellen</th>
                        <th>Kapazität TWICE (Garantie)</th>
                        <th>Kapazität Geschätzt</th>
                        <th>Module Vertikal</th>
                        <th>Module Horizontal</th>
                        <th>Spannung</th>
                        <th>Dauerhafte Ladeleistung</th>
                        <th>Dauerhafte Entladeleistung</th>
                        <th>Peak Entladeleistung</th>
                        <th>Peak Ladeleistung</th>
                        <th>Länge</th>
                        <th>Breite</th>
                        <th>Höhe</th>
                        <th>Gewicht</th>
                        <th>Kapazität Neu</th>
                        <th>Module Total</th>
                        <th>Logic-Board Total</th>
                        <th>Zusatzdeckel</th>
                        <th>Current nom</th>
                        <th>Current peak</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody id="tableBody">
                @foreach($configurations as $key => $configuration)
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ $configuration->product_configuration }}</td>
                        <td>{{ $configuration->number_cells }}</td>
                        <td>{{ $configuration->capacity_twice_guarantee }}</td>
                        <td>{{ $configuration->capacity_estimated }}</td>
                        <td>{{ $configuration->module_vertical }}</td>
                        <td>{{ $configuration->module_horizontal }}</td>
                        <td>{{ $configuration->voltage }}</td>
                        <td>{{ $configuration->permanent_charging_performance }}</td>
                        <td>{{ $configuration->permanent_discharging_performance }}</td>
                        <td>{{ $configuration->permanent_charging_power }}</td>
                        <td>{{ $configuration->permanent_discharging_power }}</td>
                        <td>{{ $configuration->length }}</td>
                        <td>{{ $configuration->broad }}</td>
                        <td>{{ $configuration->height }}</td>
                        <td>{{ $configuration->weight }}</td>
                        <td>{{ $configuration->capacity_new }}</td>
                        <td>{{ $configuration->total_modules }}</td>
                        <td>{{ $configuration->logic_board_total }}</td>
                        <td>{{ $configuration->additional_cover }}</td>
                        <td>{{ $configuration->current_nom }}</td>
                        <td>{{ $configuration->current_peak }}</td>
                        <td class="user_td_center" nowrap>
                            <a class="btn btn-sm btn-clean btn-icon btn-icon-md" title="View" onclick="edit_btn(this)" data-id="{{ $configuration->id }}">
                                <i style="font-size: 2rem" class="la la-edit"></i>
                            </a>
                            <a class="btn btn-sm btn-clean btn-icon btn-icon-md" title="remove" onClick="remove_btn(this)" data-id="{{ $configuration->id }}">
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

<div class="modal fade" id="configurationModal" tabindex="-1" role="dialog" aria-labelledby="editBookModalTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editBookModalTitle">Configuration</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body modal-height">
                <div class="kt-scroll" data-scroll="true">
                    <div class="form-group row">
                        <label class="col-4 col-form-label">Product Configuration</label>
                        <div class="col-8">
                            <input type="text" class="form-control product-configuration" placeholder="H.1X1">
                            <input type="hidden" class="form-control" id="record_id">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-4 col-form-label">Cell Number</label>
                        <div class="col-8">
                            <input type="text" class="form-control cell-number" placeholder="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-4 col-form-label">Capacity Twice</label>
                        <div class="col-6">
                            <input type="text" class="form-control capacity-twice">
                        </div>
                        <label class="col-2 col-form-label">kWh</label>
                    </div>                  
                    <div class="form-group row">
                        <label class="col-4 col-form-label">Capacity Estimated</label>
                        <div class="col-6">
                            <input type="text" class="form-control capacity-estimated">
                        </div>
                        <label class="col-2 col-form-label">kWh</label>
                    </div>                  
                    <div class="form-group row">
                        <label class="col-4 col-form-label">Module Vertical</label>
                        <div class="col-8">
                            <input type="text" class="form-control module-vertical">
                        </div>
                    </div>                  
                    <div class="form-group row">
                        <label class="col-4 col-form-label">Module Horizontal</label>
                        <div class="col-8">
                            <input type="text" class="form-control module-horizontal">
                        </div>
                    </div>                  
                    <div class="form-group row">
                        <label class="col-4 col-form-label">Voltage</label>
                        <div class="col-6">
                            <input type="text" class="form-control voltage">
                        </div>
                        <label class="col-2 col-form-label">V</label>
                    </div>                  
                    <div class="form-group row">
                        <label class="col-4 col-form-label">Charging Performance</label>
                        <div class="col-6">
                            <input type="text" class="form-control charging-performance">
                        </div>
                        <label class="col-2 col-form-label">kW</label>
                    </div>                  
                    <div class="form-group row">
                        <label class="col-4 col-form-label">Discharging Performance</label>
                        <div class="col-6">
                            <input type="text" class="form-control discharging-performance">
                        </div>
                        <label class="col-2 col-form-label">kW</label>
                    </div>                  
                    <div class="form-group row">
                        <label class="col-4 col-form-label">Charging Power</label>
                        <div class="col-6">
                            <input type="text" class="form-control charging-power">
                        </div>
                        <label class="col-2 col-form-label">kW</label>
                    </div>    
                    <div class="form-group row">
                        <label class="col-4 col-form-label">Disharging Power</label>
                        <div class="col-6">
                            <input type="text" class="form-control discharging-power">
                        </div>
                        <label class="col-2 col-form-label">kW</label>
                    </div>    
                    <div class="form-group row">
                        <label class="col-4 col-form-label">Length</label>
                        <div class="col-6">
                            <input type="text" class="form-control length">
                        </div>
                        <label class="col-2 col-form-label">mm</label>
                    </div>    
                    <div class="form-group row">
                        <label class="col-4 col-form-label">Broad</label>
                        <div class="col-6">
                            <input type="text" class="form-control broad">
                        </div>
                        <label class="col-2 col-form-label">mm</label>
                    </div>    
                    <div class="form-group row">
                        <label class="col-4 col-form-label">Height</label>
                        <div class="col-6">
                            <input type="text" class="form-control height">
                        </div>
                        <label class="col-2 col-form-label">mm</label>
                    </div>                  
                    <div class="form-group row">
                        <label class="col-4 col-form-label">Weight</label>
                        <div class="col-6">
                            <input type="text" class="form-control weight">
                        </div>
                        <label class="col-2 col-form-label">kg</label>
                    </div>    
                    <div class="form-group row">
                        <label class="col-4 col-form-label">Capacity New</label>
                        <div class="col-6">
                            <input type="text" class="form-control capacity-new">
                        </div>
                        <label class="col-2 col-form-label">kWh</label>
                    </div>    
                    <div class="form-group row">
                        <label class="col-4 col-form-label">Total Modules</label>
                        <div class="col-6">
                            <input type="text" class="form-control totl-modules">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-4 col-form-label">Total Logic Board</label>
                        <div class="col-8">
                            <input type="text" class="form-control toal-logic-board">
                        </div>
                    </div>    
                    <div class="form-group row">
                        <label class="col-4 col-form-label">Additional Cover</label>
                        <div class="col-8">
                            <input type="text" class="form-control additional-cover">
                        </div>
                    </div>    
                    <div class="form-group row">
                        <label class="col-4 col-form-label">Current Nom</label>
                        <div class="col-6">
                            <input type="text" class="form-control current-nom">
                        </div>
                        <label class="col-2 col-form-label">A</label>
                    </div>    
                    <div class="form-group row">
                        <label class="col-4 col-form-label">Current Peak</label>
                        <div class="col-6">
                            <input type="text" class="form-control current-peak">
                        </div>
                        <label class="col-2 col-form-label">A</label>
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
