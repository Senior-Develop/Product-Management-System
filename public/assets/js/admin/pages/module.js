var editable = false;

function edit_btn(tmp) {
    var data = {
        id : $(tmp).data('id')
    }
    $.ajax({
        url: base_path + '/admin/module/getItem',
        type: 'get',
        data: data,
        success: function( data ) {
            var data = data.data;
            $('.serial-number').val(data.sn_module);
            $('.cell1').val(data.cell1);
            $('.cell2').val(data.cell2);
            $('.cell3').val(data.cell3);
            $('.cell4').val(data.cell4);
            $('.cell5').val(data.cell5);
            $('.cell6').val(data.cell6);
            $('.cell7').val(data.cell7);
            $('.cell8').val(data.cell8);
            $('.cell9').val(data.cell9);
            $('.cell10').val(data.cell10);
            $('.cell11').val(data.cell11);
            $('.cell12').val(data.cell12);
            $('.cell13').val(data.cell13);
            $('.cell14').val(data.cell14);
            $('.cell15').val(data.cell15);
            $('.cell16').val(data.cell16);
            $('.soh').val(data.soh);

            editable = true;

            $('#record_id').val($(tmp).data('id'));
            $('#moduleModal').modal();
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
        url: base_path + '/admin/module/delete',
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
    $('.create-module').on('click', function() {

        var date = new Date();
        var month = (date.getMonth()<10)?'0'+date.getMonth():date.getMonth();
        var serial_number = parseInt(($('.create-module').data('id').sn_module.split('.')[2]).toString().slice(2, 6)) + 1;

        $('.serial-number').val('H100.' + month + date.getFullYear().toString().slice(2) + '.ZM' + serial_number);

        $('#moduleModal').modal();
    });

    $('.save-btn').on('click', function() {
        var url = '';

        if(editable) {
            url = base_path + '/admin/module/edit';
        } else {
            url = base_path + '/admin/module/create';
        }

        var data = {
            _token: csrf_token,
            serial_number: $('.serial-number').val(),
            cell1: $('.cell1').val(),
            cell2: $('.cell2').val(),
            cell3: $('.cell3').val(),
            cell4: $('.cell4').val(),
            cell5: $('.cell5').val(),
            cell6: $('.cell6').val(),
            cell7: $('.cell7').val(),
            cell8: $('.cell8').val(),
            cell9: $('.cell9').val(),
            cell10: $('.cell10').val(),
            cell11: $('.cell11').val(),
            cell12: $('.cell13').val(),
            cell13: $('.cell13').val(),
            cell14: $('.cell14').val(),
            cell15: $('.cell15').val(),
            cell16: $('.cell16').val(),
            soh: $('.soh').val(),
            id : $('#record_id').val()
        };

        $.ajax({
            url: url,
            type: 'post',
            data: data,
            success: function( data ) {
                $('#moduleModal').modal('hide');
                toastr.success("Success.");
                location.reload();
            },
            error: function(error){
                toastr.error("Fail.");
            }
        });
    });
});