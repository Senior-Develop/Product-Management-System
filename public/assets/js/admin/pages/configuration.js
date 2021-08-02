var editable = false;

function edit_btn(tmp) {
    var data = {
        id : $(tmp).data('id')
    }
    $.ajax({
        url: base_path + '/admin/configuration/getItem',
        type: 'get',
        data: data,
        success: function( data ) {
            var data = data.data;
            $('.product-configuration').val(data.product_configuration);
            $('.cell-number').val(data.number_cells);
            $('.capacity-twice').val(data.capacity_twice_guarantee);
            $('.capacity-estimated').val(data.capacity_estimated);
            $('.module-vertical').val(data.module_vertical);
            $('.module-horizontal').val(data.module_horizontal);
            $('.voltage').val(data.voltage);
            $('.charging-performance').val(data.permanent_charging_performance);
            $('.discharging-performance').val(data.permanent_discharging_performance);
            $('.charging-power').val(data.permanent_charging_power);
            $('.discharging-power').val(data.permanent_discharging_power);
            $('.length').val(data.length);
            $('.broad').val(data.broad);
            $('.height').val(data.height);
            $('.weight').val(data.weight);
            $('.capacity-new').val(data.capacity_new);
            $('.totl-modules').val(data.total_modules);
            $('.toal-logic-board').val(data.logic_board_total);
            $('.additional-cover').val(data.additional_cover);
            $('.current-nom').val(data.current_nom);
            $('.current-peak').val(data.current_peak);

            editable = true;

            $('#record_id').val($(tmp).data('id'));
            $('#configurationModal').modal();
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
        url: base_path + '/admin/configuration/delete',
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
    $('.create-configuration').on('click', function() {

        $('#configurationModal').modal();
    });

    $('.save-btn').on('click', function() {
        var url = '';

        if(editable) {
            url = base_path + '/admin/configuration/edit';
        } else {
            url = base_path + '/admin/configuration/create';
        }

        var data = {
            _token                      : csrf_token,
            product_configuration       : $('.product-configuration').val(),
            cell_number                 : $('.cell-number').val(),
            capacity_twice              : $('.capacity-twice').val(),
            capacity_estimated          : $('.capacity-estimated').val(),
            module_vertical             : $('.module-vertical').val(),
            module_horizontal           : $('.module-horizontal').val(),
            voltage                     : $('.voltage').val(),
            charging_performance        : $('.charging-performance').val(),
            discharging_performance     : $('.discharging-performance').val(),
            charging_power              : $('.charging-power').val(),
            discharging_power           : $('.discharging-power').val(),
            length                      : $('.length').val(),
            broad                       : $('.broad').val(),
            height                      : $('.height').val(),
            weight                      : $('.weight').val(),
            capacity_new                : $('.capacity-new').val(),
            totl_modules                : $('.totl-modules').val(),
            toal_logic_board            : $('.toal-logic-board').val(),
            additional_cover            : $('.additional-cover').val(),
            current_nom                 : $('.current-nom').val(),
            current_peak                : $('.current-peak').val(),
            id                          : $('#record_id').val()
        };

        $.ajax({
            url: url,
            type: 'post',
            data: data,
            success: function( data ) {
                $('#configurationModal').modal('hide');
                toastr.success("Success.");
                location.reload();
            },
            error: function(error){
                toastr.error("Fail.");
            }
        });
    });
});