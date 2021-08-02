let startDate = "";
let endDate = "";
let event = 0;
let activity = 0;
let condition = 0;
let clientName = ""
let dateRange = ""


function getFilterTable(){
    let data = {
        _token: csrf_token,
        pageShow: pageShow,
        event: event,
        activity: activity,
        condition: condition,
        startDate: startDate,
        endDate: endDate,
        clientName: clientName,
        dateRange: dateRange
    };

    $.ajax({
        url: base_path + '/admin/booking/filter',
        type: 'post',
        data: data,

        success: function( data ) {
            $("#tableContent").html(data);
            BTDatatablesBasicBasic.init();
           },
        error: function(error){
            toastr.error("la acción es fallida");
        }
    });
}

function onEditBook(tmp){
    let id = $(tmp).data('id');
    $("#editBookModal").data('id',id);
    let data = {
        _token: csrf_token,
        reservation_id: id
    };
    $.ajax({
        url: base_path + '/admin/booking/book_update',
        type: 'get',
        data: data,
        dataType: 'json',

        success: function( data ) {
            let bookData = data[0];
            $("#editbook-date-input").val(bookData["reservation_date"]);
            $("#editbook-start-time").val(bookData["start_time"]);
            $("#editbook-end-time").val(bookData["end_time"]);
            $("#editbook-type-input").val(bookData["level_type"]);
        },
        error: function(error){
            toastr.error("la acción es fallida");
        }
    });

    $("#editBookModal").modal();
}

function onEditClient(tmp){
    let id = $(tmp).data('id');
    $("#editClientModal").data('id',id);
    let data = {
        _token: csrf_token,
        userId: id
    };
    $.ajax({
        url: base_path + '/admin/booking/client_update',
        type: 'get',
        data: data,
        dataType: 'json',

        success: function( data ) {
            let clientData = data[0];
            $("#editclient-name-input").val(clientData["name"]);
            $("#editclient-surname-input").val(clientData["last_name"]);
            $("#editclient-date-input").val(clientData["birthday"]);
        },
        error: function(error){
            toastr.error("la acción es fallida");
        }
    });
    $("#editClientModal").modal();
}

function onEditPayment(tmp){
    let id = $(tmp).data('id');
    $("#editPaymentModal").data('id',id);
    let data = {
        _token: csrf_token,
        userId: id
    };
    $.ajax({
        url: base_path + '/admin/booking/client_update',
        type: 'get',
        data: data,
        dataType: 'json',

        success: function( data ) {
            let clientData = data[0];
            $("#payment-type-input").val(clientData["payment"]);
        },
        error: function(error){
            toastr.error("la acción es fallida");
        }
    });
    $("#editPaymentModal").modal();
}

function onEditRefund(tmp){
    $('#editRefundModal').modal();
}

function onRemove(tmp){
    let id = $(tmp).data('id');
    $("#removeModal").data('id',id);
    $('#removeModal').modal();
}

function onBookUpdate(){
    let levelId = $("#editBookModal").data('id');
    let reservationDate = $("#editbook-date-input").val();
    let startTime = $("#editbook-start-time").val();
    let endTime = $("#editbook-end-time").val();
    let levelType = $("#editbook-type-input").val();
    if (reservationDate !== "" && startTime !== "" && endTime !== ""){
        let data = {
            _token: csrf_token,
            reservation_id: levelId,
            reservationDate: reservationDate,
            startTime: startTime,
            endTime: endTime,
            levelType: levelType
        };

        $.ajax({
            url: base_path + '/admin/booking/book_update',
            type: 'POST',
            data: data,
            dataType: 'json',

            success: function( data ) {
                if (data['status']){
                    $('#editBookModal').modal('hide');
                    toastr.success("la acción es exitosa");
                    location.reload();
                }
                else {
                    toastr.error("la acción es fallida");
                }
            },
            error: function(error){
                toastr.error("la acción es fallida");
            }
        });
    }
    else {
        toastr.error("por favor ingrese un valor!");
    }
}

function onClientUpdate(){
    let userId = $("#editClientModal").data('id');
    let name = $("#editclient-name-input").val();
    let lastName = $("#editclient-surname-input").val();
    let birthday = $("#editclient-date-input").val();
    if (name !== "" && lastName !== "" && birthday !== ""){
        let data = {
            _token: csrf_token,
            userId: userId,
            name: name,
            lastName: lastName,
            birthday: birthday
        };

        $.ajax({
            url: base_path + '/admin/booking/client_update',
            type: 'POST',
            data: data,
            dataType: 'json',

            success: function( data ) {
                if (data['status']){
                    $('#editClientModal').modal('hide');
                    toastr.success("la acción es exitosa");
                    location.reload();
                }
                else {
                    toastr.error("la acción es fallida");
                }
            }
        });
    }
    else {
        toastr.error("por favor ingrese un valor!");
    }
}

function onPaymentUpdate(){
    let userId = $("#editPaymentModal").data('id');
    let payment = $("#payment-type-input").val();
    if (payment !== ""){
        let data = {
            _token: csrf_token,
            userId: userId,
            payment: payment
        };

        $.ajax({
            url: base_path + '/admin/booking/payment_update',
            type: 'POST',
            data: data,
            dataType: 'json',

            success: function( data ) {
                if (data['status']){
                    $('#editPaymentModal').modal('hide');
                    toastr.success("la acción es exitosa");
                    location.reload();
                }
                else {
                    toastr.error("la acción es fallida");
                }
            }
        });
    }
    else {
        toastr.error("por favor ingrese un valor!");
    }
}

function onReservationDelete(){
    let resId = $("#removeModal").data('id');
    let data = {
        _token: csrf_token
    };

    $.ajax({
        url: base_path + '/admin/booking/reservation_delete/'+ resId,
        type: 'DELETE',
        data: data,
        dataType: 'json',

        success: function( data ) {
            if (data['status']){
                $('#removeModal').modal('hide');
                toastr.success("la acción es exitosa");
                location.reload();
            }
            else {
                toastr.error("la acción es fallida");
            }
        }
    });
}

$(function() {
    let temp = $('#bt_table_1_info').text();
    let tmp1 = temp.replace("Showing", "Mostrando");
    let tmp2 = tmp1.replace("to", "a");
    let tmp3 = tmp2.replace("of", "de");
    let tmp4 = tmp3.replace("entries", "entradas");
    $("#bt_table_1_info").text(tmp4);

    let tmp = $('#bt_table_1_length').html();
    // let temp1 = tmp.replace("Display", "Mostrar");
    // $('#bt_table_1_length').html(temp1);

    $("#dropdownEventSelect div a").click(function(){
        var selText = $(this).text();
        $('#dropdownEventSelect').find('.dropdown-toggle').text(selText);
        event = $(this).data('id');
        getFilterTable();
    });

    $("#dropdownActSelect div a").click(function(){
        var selText = $(this).text();
        $('#dropdownActSelect').find('.dropdown-toggle').text(selText);
        activity = $(this).data('id');
        getFilterTable();
    });

    $("#dropdownCondSelect div a").click(function(){
        var selText = $(this).text();
        $('#dropdownCondSelect').find('.dropdown-toggle').text(selText);
        condition = $(this).data('id');
        getFilterTable();
    });


    $('#daterange').daterangepicker({
        opens: 'left'
    }, function(start, end, label) {
        startDate = start.format('YYYY-MM-DD');
        endDate = end.format('YYYY-MM-DD');
        getFilterTable();
    });

    $('#clientName').on('change', function() {
        clientName = this.value;
        getFilterTable();
    });

    $("#monthButton").click(function(){
        $("#monthButton").removeClass();
        $("#weekButton").removeClass();
        $("#dayButton").removeClass();

        $("#monthButton").addClass("fc-dayGridMonth-button fc-button fc-button-primary fc-button-active");
        $("#weekButton").addClass("fc-timeGridWeek-button fc-button fc-button-primary");
        $("#dayButton").addClass("fc-timeGridDay-button fc-button fc-button-primary");

        dateRange = $(this).data('id');
        getFilterTable();
    });
    $("#weekButton").click(function(){
        $("#monthButton").removeClass();
        $("#weekButton").removeClass();
        $("#dayButton").removeClass();

        $("#monthButton").addClass("fc-dayGridMonth-button fc-button fc-button-primary");
        $("#weekButton").addClass("fc-timeGridWeek-button fc-button fc-button-primary fc-button-active");
        $("#dayButton").addClass("fc-timeGridDay-button fc-button fc-button-primary");

        dateRange = $(this).data('id');
        getFilterTable();
    });
    $("#dayButton").click(function(){
        $("#monthButton").removeClass();
        $("#weekButton").removeClass();
        $("#dayButton").removeClass();

        $("#monthButton").addClass("fc-dayGridMonth-button fc-button fc-button-primary");
        $("#weekButton").addClass("fc-timeGridWeek-button fc-button fc-button-primary");
        $("#dayButton").addClass("fc-timeGridDay-button fc-button fc-button-primary fc-button-active");

        dateRange = $(this).data('id');
        getFilterTable();
    });
});


