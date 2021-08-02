"use strict";
var BTDatatablesBasicBasic = function() {

    var initTable1 = function() {
        var table = $('#bt_table_1');

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
            order: [[1, 'desc']],

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
                    targets: 2,
                    render: function(data, type, full, meta) {
                        var status = {
                            1: {'title': 'Reservado', 'class': ' kt-badge--success'},
                            2: {'title': 'Cancelado', 'class': ' kt-badge--danger'},

                        };
                        if (typeof status[data] === 'undefined') {
                            return data;
                        }
                        return '<span class="kt-badge ' + status[data].class + ' kt-badge--inline kt-badge--pill">' + status[data].title + '</span>';
                    },
                },
                {
                    targets: 3,
                    width: '50px',
                    render: function(data, type, full, meta) {
                        var status = {
                            1: {'title': 'Pagado', 'class': ' kt-badge--success'},
                            2: {'title': 'A deber', 'class': ' kt-badge--danger'},
                            3: {'title': 'Sin Pagar', 'class': ' kt-badge--warning'},
                        };
                        if (typeof status[data] === 'undefined') {
                            return data;
                        }
                        return '<span class="kt-badge ' + status[data].class + ' kt-badge--inline kt-badge--pill">' + status[data].title + '</span>';
                    },
                },
                {
                    targets: 5,
                    render: function(data, type, full, meta) {
                        var status = {
                            1: {'title': levelsType[0]["desc"], 'state': 'primary'},
                            2: {'title': levelsType[1]["desc"], 'state': 'secondary'},
                            3: {'title': levelsType[2]["desc"], 'state': 'danger'},
                            4: {'title': levelsType[3]["desc"], 'state': 'info'},
                            5: {'title': levelsType[4]["desc"], 'state': 'accent'},
                            6: {'title': levelsType[5]["desc"], 'state': 'warning'},
                        };
                        if (typeof status[data] === 'undefined') {
                            return data;
                        }
                        return '<span class="kt-badge kt-badge--' + status[data].state + ' kt-badge--dot"></span>&nbsp;' +
                            '<span class="kt-font-bold kt-font-' + status[data].state + '">' + status[data].title + '</span>';
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
            order: [[1, 'desc']],

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

jQuery(document).ready(function() {
    BTDatatablesBasicBasic.init();
    CTDatatablesBasicBasic.init();
});