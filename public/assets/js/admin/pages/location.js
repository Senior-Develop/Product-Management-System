var editable = false;
var clear_msg = '';

function edit_btn(tmp) {
    var data = {
        id : $(tmp).data('id')
    }
    $.ajax({
        url: base_path + '/admin/location/getItem',
        type: 'get',
        data: data,
        success: function( data ) {
            var data = data.data;
            $('.serial-number').val(data.serial_number);
            $('.contact-type').val(data.contact_type);
            $('.company-name').val(data.company_name);
            $('.name').val(data.name);
            $('.address').val(data.address);
            $('.post-code').val(data.post_code);
            $('.location').val(data.location);
            $('.country').val(data.country);
            $('.email').val(data.email);
            $('.email-2').val(data.email_2);
            $('.phone').val(data.phone);
            $('.phone-2').val(data.phone_2);
            $('.wgs84-lat').val(data.wgs84_lat);
            $('.wgs84-lon').val(data.wgs84_lon);
            $('.inverter-type').val(data.inverter_type);
            $('.inverter-power').val(data.inverter_power);
            $('.pv-power').val(data.pv_power);

            editable = true;

            $('#record_id').val($(tmp).data('id'));
            $('#locationModal').modal();
        },
        error: function(error){
            toastr.error("Fail.");
        }
    });
}

function remove_btn(tmp) {
    
    $('#remove_id').val($(tmp).data('id'));
    $('#removeModal').modal();
}

function remove() {
    var data = {
        id : $('#remove_id').val(),
        _token: csrf_token,
    }

    $.ajax({
        url: base_path + '/admin/location/delete',
        type: 'delete',
        data: data,
        success: function( data ) {
            $('#removeModal').modal('hide');
            toastr.success("Success.");
            location.reload();
        },
        error: function(error){
            toastr.error("Fail.");
        }
    });
}

$(function() {
    $('.create-location').on('click', function() {

        var date = new Date();
        var month = (date.getMonth()<10)?'0'+date.getMonth():date.getMonth();
        var serial_number = parseInt($('.create-location').data('id').serial_number.split('.')[2]) + 1;
    
        $('.serial-number').val('H100.' + month + date.getFullYear().toString().slice(2) + '.' + serial_number);
        
        $('#locationModal').modal();
    });

    $('.save-btn').on('click', function() {
        $.each( clear_msg, function( key, value ) {
            $("." + key + "-error").text('');
        });

        var url = '';

        if(editable) {
            url = base_path + '/admin/location/edit';
        } else {
            url = base_path + '/admin/location/create';
        }

        var data = {
            _token              : csrf_token,
            serial_number       : $('.serial-number').val(),
            contact_type        : $('.contact-type').val(),
            company_name        : $('.company-name').val(),
            name                : $('.name').val(),
            address             : $('.address').val(),
            post_code           : $('.post-code').val(),
            location            : $('.location').val(),
            country             : $('.country').val(),
            email               : $('.email').val(),
            email_2             : $('.email-2').val(),
            phone               : $('.phone').val(),
            phone_2             : $('.phone-2').val(),
            wgs84_lat           : $('.wgs84-lat').val(),
            wgs84_lon           : $('.wgs84-lon').val(),
            inverter_type       : $('.inverter-type').val(),
            inverter_power      : $('.inverter-power').val(),
            pv_power            : $('.pv-power').val(),
            id                  : $('#record_id').val()
        };

        $.ajax({
            url: url,
            type: 'post',
            data: data,
            success: function( data ) {
                if($.isEmptyObject(data.error)){
                    $('#locationModal').modal('hide');
                    toastr.success("Success.");
                    location.reload();
                }else{
                    clear_msg = data.error;
                    printErrorMsg(data.error);
                }
            },
            error: function(error){
                toastr.error("Fail.");
            }
        });
    });

    function printErrorMsg (msg) {
        $.each( msg, function( key, value ) {
            $("." + key + "-error").text(value);
        });
    }
});