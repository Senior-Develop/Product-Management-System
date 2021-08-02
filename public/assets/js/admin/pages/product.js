var editable = false;
var clear_msg = '';

function edit_btn(tmp) {
    var data = {
        id : $(tmp).data('id')
    }
    $.ajax({
        url: base_path + '/admin/product/getItem',
        type: 'get',
        data: data,
        success: function( data ) {
            var data = data.data;
            $('.serial-number').val(data.serial_number);
            $('.sn-module1').val(data.sn_module1);
            $('.sn-module2').val(data.sn_module2);
            $('.sn-module3').val(data.sn_module3);
            $('.sn-module4').val(data.sn_module4);
            $('.sn-module5').val(data.sn_module5);
            $('.sn-module6').val(data.sn_module6);
            $('.sn-module7').val(data.sn_module7);
            $('.sn-module8').val(data.sn_module8);
            $('.hw-release').val(data.hw_release);
            $('.sw-release').val(data.sw_release);
            $('.customer-select').val(data.customer_id);
            $('.location-select').val(data.location_id);
            $('.configuration-select').val(data.configuration_id);

            editable = true;

            $('#record_id').val($(tmp).data('id'));
            $('#productModal').modal();
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
        url: base_path + '/admin/product/delete',
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
    $('.create-product').on('click', function() {

        var date = new Date();
        var month = (date.getMonth()<10)?'0'+date.getMonth():date.getMonth();
        var serial_number = parseInt($('.create-product').data('id').serial_number.split('.')[2]) + 1;
        var hw_release = $('.create-product').data('id').hw_release;
        var sw_release = $('.create-product').data('id').sw_release;

        $('.serial-number').val('H100.' + month + date.getFullYear().toString().slice(2) + '.' + serial_number);
        $('.hw-release').val(hw_release);
        $('.sw-release').val(sw_release);

        $('#productModal').modal();
    });

    $('.product-save-btn').on('click', function() {
        var url = '';

        if(editable) {
            url = base_path + '/admin/product/edit';
        } else {
            url = base_path + '/admin/product/create';
        }

        var data = {
            _token: csrf_token,
            serial_number: $('.serial-number').val(),
            sn_module1: $('.sn-module1').val(),
            sn_module2: $('.sn-module2').val(),
            sn_module3: $('.sn-module3').val(),
            sn_module4: $('.sn-module4').val(),
            sn_module5: $('.sn-module5').val(),
            sn_module6: $('.sn-module6').val(),
            sn_module7: $('.sn-module7').val(),
            sn_module8: $('.sn-module8').val(),
            hw_release: $('.hw-release').val(),
            sw_release: $('.sw-release').val(),
            customer: $('.customer-select').val(),
            location: $('.location-select').val(),
            configuration: $('.configuration-select').val(),
            id : $('#record_id').val()
        };

        $.ajax({
            url: url,
            type: 'post',
            data: data,
            success: function( data ) {
                $('#productModal').modal('hide');
                toastr.success("Success.");
                location.reload();
            },
            error: function(error){
                toastr.error("Fail.");
            }
        });
    });

    $('.cross-align-location').on('click', function() {
        $('#locationModal').modal();
        $('#productModal').modal('hide');
    });

    $('.location-save-btn').on('click', function() {
        $.each( clear_msg, function( key, value ) {
            $("." + key + "-error").text('');
        });

        var url = base_path + '/admin/location/create';

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

    $('.cross-align-customer').on('click', function() {
        var no = parseInt($('.create-customer').data('id').no) + 1;

        $('.no').val(no);

        $('#customerModal').modal();
        $('#productModal').modal('hide');
    });

    $('.customer-save-btn').on('click', function() {
        $.each( clear_msg, function( key, value ) {
            $("." + key + "-error").text('');
        });

        var url = base_path + '/admin/customer/create';

        var data = {
            _token                      : csrf_token,
            no                          : $('.no').val(),
            category                    : $('.category').val(),
            branch                      : $('.branch').val(),
            contact_type                : $('.contact-type').val(),
            company_name                : $('.company-name').val(),
            name                        : $('.name').val(),
            name_2                      : $('.name-2').val(),
            salutation                  : $('.salutation').val(),
            title                       : $('.title').val(),
            address                     : $('.address').val(),
            post_code                   : $('.post-code').val(),
            location                    : $('.location').val(),
            country                     : $('.country').val(),
            email                       : $('.email').val(),
            email_2                     : $('.email-2').val(),
            phone                       : $('.phone').val(),
            phone_2                     : $('.phone-2').val(),
            mobile                      : $('.mobile').val(),
            fax                         : $('.fax').val(),
            website                     : $('.website').val(),
            skype                       : $('.skype').val(),
            form_of_address             : $('.form-of-address').val(),
            birthday                    : $('.birthday').val(),
            correspondence_channel      : $('.correspondence-channel').val(),
            remarks                     : $('.remarks').val(),
            relationship_info           : $('.relationship-info').val(),
            contact_person              : $('.contact-person').val(),
            language                    : $('.language').val(),
            vat_number                  : $('.vat-number').val(),
            number_of_employees         : $('.number-of-employees').val(),
            commercial_register_no      : $('.commercial-register-no').val(),
            vat_identification_number   : $('.vat-identification-number').val(),
            lead                        : $('.lead').val(),
            id                          : $('#record_id').val()
        };

        $.ajax({
            url: url,
            type: 'post',
            data: data,
            success: function( data ) {
                if($.isEmptyObject(data.error)){
                    $('#customerModal').modal('hide');
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

    // $('.configuration-select').on('change', function() {
    //     alert($('.configuration-select').data('id'));
    // });
});