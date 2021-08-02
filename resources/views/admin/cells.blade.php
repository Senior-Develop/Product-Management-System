@extends('admin.layouts.app')
@section('style')
<link href="{{asset('assets/vendors/custom/datatables/datatables.bundle.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/css/admin/pages/book.css')}}" rel="stylesheet" type="text/css" />
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
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

@endsection
@section('title', 'Cells')
@section('page')
<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid" id="bookingContent">
    <div class="kt-portlet kt-portlet--mobile booking-header-mobile">
        <!-- <div class="kt-portlet__head">
            <div class="kt-portlet__head-toolbar">
                <div class="kt-portlet__head-toolbar">
                    <div class="dropdown dropdown-inline">
                        <button type="button" id="add_staff_btn" class="btn btn-secondary"><i class="fa fa-plus"></i>
                            Create Cell</button>
                    </div>
                </div>
            </div>
        </div> -->
        <div class="booking-body kt-portlet__body" id="tableContent">
            <!--begin: Datatable -->
            <table class="table table-striped- table-bordered table-hover table-checkable" id="bt_table_1">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>SN_Cell (Key, Scanned by barecode)</th>
                        <th>Capacity_New</th>
                        <th>Capacity_Real</th>
                        <th>SOH</th>
                        <!-- <th>Actions</th> -->
                    </tr>
                </thead>
                <tbody id="tableBody">
                @foreach($cells as $key => $cell)
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ $cell->sn_cell }}</td>
                        <td>{{ $cell->capacity_new }}</td>
                        <td>{{ $cell->capacity_real }}</td>
                        <td>{{ $cell->soh }}</td>
                        <!-- <td class="user_td_center" nowrap>
                            <a id="editProductBtn" class="btn btn-sm btn-clean btn-icon btn-icon-md" title="View" onclick="editProduct(this)" data-id="{{ $cell->id }}">
                                <i style="font-size: 2rem" class="la la-edit"></i>
                            </a>
                            <a class="btn btn-sm btn-clean btn-icon btn-icon-md" title="remove" onClick="remove_btn(this)" data-id="{{ $cell->id }}">
                                <i style="font-size: 2rem" class="la la-trash"></i>
                            </a>
                        </td> -->
                    </tr>
                @endforeach
                </tbody>
            </table>
            <!--end: Datatable -->
        </div>
    </div>
</div>

<div class="modal fade" id="editBookModal" tabindex="-1" role="dialog" aria-labelledby="editBookModalTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editBookModalTitle">Editar reserva</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="kt-scroll" data-scroll="true">
                    <div class="form-group row">
                        <label for="editbook-date-input" class="col-2 col-form-label">Fecha</label>
                        <div class="col-9">
                            <input class="form-control" type="date" id="editbook-date-input" name="reservationDate">
                        </div>
                        <div class="col-1 help-icon-container">
                            <img src="{{asset('assets/media/icons/help.svg')}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-2 col-form-label">Hora</label>
                        <label class="col-1 col-form-label">De</label>
                        <div class="col-3">
                            <input type="time" class="form-control time-range-input" id="editbook-start-time" name="startTime"></select>
                        </div>
                        <label class="col-1 col-form-label">A</label>
                        <div class="col-4">
                            <input type="time" class="form-control time-range-input" id="editbook-end-time" name="endTime"></select>
                        </div>
                        <div class="col-1 help-icon-container">
                            <img src="{{asset('assets/media/icons/help.svg')}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="editbook-type-input" class="col-2 col-form-label">Actividad</label>
                        <div class="col-9">
                            <select class="form-control" id="editbook-type-input" name="levelType">
                               
                            </select>
                        </div>
                        <div class="col-1 help-icon-container">
                            <img src="{{asset('assets/media/icons/help.svg')}}">
                        </div>
                    </div>

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-brand" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" onclick="onBookUpdate()">Guardar cambios</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="editClientModal" tabindex="-1" role="dialog" aria-labelledby="editClientModalTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editClientModalTitle">Editar clientes</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="kt-scroll" data-scroll="true">
                    <div class="form-group row">
                        <label for="editclient-name-input" class="col-2 col-form-label">Nombre</label>
                        <div class="col-9">
                            <input class="form-control" type="text" id="editclient-name-input">
                        </div>
                        <div class="col-1 help-icon-container">
                            <img src="{{asset('assets/media/icons/help.svg')}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="editclient-surname-input" class="col-2 col-form-label">Apellido</label>
                        <div class="col-9">
                            <input class="form-control" type="text" id="editclient-surname-input">
                        </div>
                        <div class="col-1 help-icon-container">
                            <img src="{{asset('assets/media/icons/help.svg')}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="editclient-date-input" class="col-2 col-form-label">Fecha Nacimiento</label>
                        <div class="col-9">
                            <input class="form-control" type="date" id="editclient-date-input">
                        </div>
                        <div class="col-1 help-icon-container">
                            <img src="{{asset('assets/media/icons/help.svg')}}">
                        </div>
                    </div>

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-brand" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" onclick="onClientUpdate()">Guardar cambios</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="editPaymentModal" tabindex="-1" role="dialog" aria-labelledby="editPaymentModalTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editPaymentModalTitle">Pagos marcados</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="kt-scroll" data-scroll="true">
                    <div class="form-group row">
                        <label for="payment-type-input" class="col-2 col-form-label">Marcar pagos</label>
                        <div class="col-9">
                            <select class="form-control" id="payment-type-input">
                               
                            </select>
                        </div>
                        <div class="col-1 help-icon-container">
                            <img src="{{asset('assets/media/icons/help.svg')}}">
                        </div>
                    </div>

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-brand" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" onclick="onPaymentUpdate()">Guardar cambios</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="editRefundModal" tabindex="-1" role="dialog" aria-labelledby="editRefundModalTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editRefundModalTitle">Método de reembolso</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="kt-scroll" data-scroll="true">
                    <div class="form-group">
                        <label>Cantidad devuelta: 39.9€</label>
                        <p>¿Dinos por qué? (Detalles, motivos, comentarios...)</p>
                        <div class="row">
                            <div class="col-11">
                                <textarea class="form-control" id=""></textarea>
                            </div>
                            <div class="col-1 help-icon-container">
                                <img src="{{asset('assets/media/icons/help.svg')}}">
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-brand" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary">Guardar cambios</button>
            </div>
        </div>
    </div>
</div>

@include('admin.removeModal')

@endsection
