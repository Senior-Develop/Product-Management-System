"use strict";
var CTDatatablesBasicBasic = function() {

	var initTable1 = function() {
		var table = $('#ct_table_1');

		// begin first table
		table.DataTable({
			responsive: true,

			// DOM Layout settings
			dom: `<'row'<'col-sm-12'tr>>
			<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7 dataTables_pager'lp>>`,

			lengthMenu: [5, 10, 25, 50],

			pageLength: 10,

			language: {
				'info': 'Mostrando _START_ a _END_ de _TOTAL_ entradas',
				'lengthMenu': 'Mostrar _MENU_',
			},

			// Order settings
			order: [[1, 'asc']],

			headerCallback: function(thead, data, start, end, display) {
				thead.getElementsByTagName('th')[0].innerHTML = `
                    <label class="kt-checkbox kt-checkbox--single kt-checkbox--solid">
                        <input type="checkbox" value="" class="kt-group-checkable">
                        <span></span>
                    </label>`;
			},

			columnDefs: [
				{
					targets: 0,
					width: '30px',
					className: 'dt-right',
					orderable: false,
					render: function(data, type, full, meta) {
						return `
                        <label class="kt-checkbox kt-checkbox--single kt-checkbox--solid">
                            <input type="checkbox" value="" class="kt-checkable">
                            <span></span>
                        </label>`;
					},
				},
				{
					targets: 6	,
					render: function(data, type, full, meta) {
						var status = {
							1: {'class': 'la la-cc-visa'},
							2: {'class': 'la la-cc-paypal'},
							3: {'class': 'la la-cc-mastercard'},
							4: {'class': 'la la-euro'},
							5: {'class': 'la la-bank'},
						};
						if (typeof status[data] === 'undefined') {
							return data;
						}
						return '<i style="font-size:3rem" class="'+status[data].class+'"></i>';
					},
				},
				{
					targets: 7	,
					render: function(data, type, full, meta) {
						var status = {
							1: {'class': 'la la-check-circle'},
							2: {'class': 'la la-circle-o-notch'},
		
						};
						if (typeof status[data] === 'undefined') {
							return data;
						}
						return '<i style="font-size:3rem" class="'+status[data].class+'"></i>';
					},
				},
			],
		});

		table.on('change', '.kt-group-checkable', function() {
			var set = $(this).closest('table').find('td:first-child .kt-checkable');
			var checked = $(this).is(':checked');

			$(set).each(function() {
				if (checked) {
					$(this).prop('checked', true);
					$(this).closest('tr').addClass('active');
				}
				else {
					$(this).prop('checked', false);
					$(this).closest('tr').removeClass('active');
				}
			});
		});

		table.on('change', 'tbody tr .kt-checkbox', function() {
			$(this).parents('tr').toggleClass('active');
		});
	};

	return {

		//main function to initiate the module
		init: function() {
			initTable1();
		}
	};
}();

function remove_btn(tmp) {
	var user_id = $(tmp).data('id');

	$("#removeModal").data('id', user_id);
    $('#removeModal').modal();
}

jQuery(document).ready(function() {
	CTDatatablesBasicBasic.init();
});

function onCustomerRemove(){
    let customer_id = $("#removeModal").data('id');
    
    let data = {
        _token: csrf_token,
        customer_id: customer_id
    };

    $.ajax({
        url: base_path + '/admin/customer/delete',
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