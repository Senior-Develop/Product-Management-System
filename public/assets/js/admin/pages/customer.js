var editable = false;
var clear_msg = '';

function edit_btn(tmp) {
    var data = {
        id : $(tmp).data('id')
    }
    $.ajax({
        url: base_path + '/admin/customer/getItem',
        type: 'get',
        data: data,
        success: function( data ) {
            var data = data.data;
            $('.no').val(data.no);
            $('.category').val(data.category);
            $('.branch').val(data.branch);
            $('.contact-type').val(data.contact_type);
            $('.company-name').val(data.company_name);
            $('.name').val(data.name_1);
            $('.name-2').val(data.name_2);
            $('.salutation').val(data.salutation);
            $('.title').val(data.title);
            $('.address').val(data.address);
            $('.post-code').val(data.post_code);
            $('.location').val(data.location);
            $('.country').val(data.country);
            $('.email').val(data.email);
            $('.email-2').val(data.email_2);
            $('.phone').val(data.phone);
            $('.phone-2').val(data.phone_2);
            $('.mobile').val(data.mobile);
            $('.fax').val(data.fax);
            $('.website').val(data.website);
            $('.skype').val(data.skype);
            $('.form-of-address').val(data.form_of_address);
            $('.birthday').val(data.birthday);
            $('.correspondence-channel').val(data.correspondence_channel);
            $('.remarks').val(data.remarks);
            $('.relationship-info').val(data.relationship_info);
            $('.contact-person').val(data.contact_person);
            $('.language').val(data.language);
            $('.vat-number').val(data.vat_number);
            $('.number-of-employees').val(data.number_of_employees);
            $('.commercial-register-no').val(data.commercial_register_no);
            $('.vat-identification-number').val(data.vat_identification_number);
            $('.lead').val(data.lead);
           
            editable = true;

            $('#record_id').val($(tmp).data('id'));
            $('#customerModal').modal();
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
        url: base_path + '/admin/customer/delete',
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
    $('.create-customer').on('click', function() {

        var no = parseInt($('.create-customer').data('id').no) + 1;

        $('.no').val(no);

        $('#customerModal').modal();
    });

    $('.save-btn').on('click', function() {
        $.each( clear_msg, function( key, value ) {
            $("." + key + "-error").text('');
        });

        var url = '';

        if(editable) {
            url = base_path + '/admin/customer/edit';
        } else {
            url = base_path + '/admin/customer/create';
        }

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

    function printErrorMsg (msg) {
        $.each( msg, function( key, value ) {
            $("." + key + "-error").text(value);
        });
    }
});