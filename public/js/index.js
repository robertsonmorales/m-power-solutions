// const { split } = require("lodash");

var token = $('meta[name=csrf]').attr('content');

var defaultColDef = {
    sortingOrder: ['desc', 'asc', null],
    resizable: true,
    sortable: true,
    filter: true,
    editable: false,
    flex: 1,
};

var gridOptions = {
    defaultColDef: defaultColDef,
    columnDefs: {},
    rowData: {},
    groupSelectsChildren: true,
    suppressRowTransform: true,
    enableCellTextSelection: true,
    rowHeight: 68,
    animateRows: true,
    pagination: true,
    paginationPageSize: 25,
    pivotPanelShow: "always",
    colResizeDefault: "shift",
    rowSelection: "multiple",
    api: "",
    columnApi: "",
    onGridReady: function () {
        autoSizeAll();
        // gridOptions.api.sizeColumnsToFit();
        gridOptions.columnApi.moveColumn('controls', 0);
    }
};

$("#btn-cancel").on('click', function(){
    $('.modal').hide();
});

$(".btn-dismiss").on('click', function(){
    $("#btn-cancel").trigger('click');
});

// ENDS HERE

function initAgGrid(data, showControls){
    const aggrid = document.querySelector('#myGrid');

    if(showControls === true){

        var columnDefs = {
            headerName: 'Action',
            field: 'action',
            sortable: false,
            filter: false,
            editable: false,
            flex: 1,
            maxWidth: 250,
            minWidth: 230,
            cellRenderer: function(params){
                // var editURL = url.replace(':id', params.data.id);
                var el = document.createElement('div');
                el.className = "d-flex align-items-center";

                var dr = '<svg width="10" height="7" viewBox="0 0 10 7" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M5.00001 6.50001C4.74401 6.50001 4.48801 6.40201 4.29301 6.20701L0.293006 2.20701C-0.0979941 1.81601 -0.0979941 1.18401 0.293006 0.793006C0.684006 0.402006 1.31601 0.402006 1.70701 0.793006L5.01201 4.09801L8.30501 0.918006C8.70401 0.535006 9.33501 0.546006 9.71901 0.943006C10.103 1.34001 10.092 1.97401 9.69501 2.35701L5.69501 6.21901C5.50001 6.40701 5.25001 6.50001 5.00001 6.50001Z" fill="#828282"/></svg>';
                var vert = '<svg width="4" height="18" viewBox="0 0 4 18" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M4 2C4 3.104 3.104 4 2 4C0.896 4 0 3.104 0 2C0 0.896 0.896 0 2 0C3.104 0 4 0.896 4 2Z" fill="#828282"/><path d="M2 7C0.896 7 0 7.896 0 9C0 10.104 0.896 11 2 11C3.104 11 4 10.104 4 9C4 7.896 3.104 7 2 7Z" fill="#828282"/><path d="M2 14C0.896 14 0 14.896 0 16C0 17.104 0.896 18 2 18C3.104 18 4 17.104 4 16C4 14.896 3.104 14 2 14Z" fill="#828282"/></svg>';

                el.innerHTML += '<button class="btn-action '+el.className+'">'+vert+'</button>'
                el.innerHTML += '<div class="btn-group">\
                    <button class="btn-dropdown btn-action btn-show-options"\
                        data-toggle="dropdown">'+dr+'</button>\
                    <div class="up-arrow"></div>\
                    <div class="dropdown-menu dropdown-menu-right">\
                        <div><a href="#view" class="btn btn-view">View</a></div>\
                        <div><button class="btn btn-edit">Edit</button></div>\
                        <div><button class="btn btn-delete">Delete</button></div>\
                    </div>\
                </div>';
                
                var editStudent = el.querySelectorAll('.btn-edit')[0];

                editStudent.addEventListener('click', function() {
                    $.ajax({
                        url: "/api/students/show",
                        data: {
                            _token: token,
                            id: params.data.id
                        },
                        type: 'GET',
                        dataType: 'json',
                        success: (response) => {
                            var student = response;

                            $('#btn-submit').removeClass('btn-success')
                                .addClass('btn-primary')
                                .text('Update');
                            $('#form-submit').attr('style', 'display: flex');
                            $('#student_id').val(student.id);
                            $('#full_name').val(student.full_name);
                            $('#email').val(student.email);
                            $('#contact').val(student.contact);
                            $('#region').val(student.region);
                            $('#course_id').val(student.course_id);
                            $('#section').val(student.section);
                        }
                    });
                });

                var deleteStudent = el.querySelectorAll('.btn-delete')[0];
                deleteStudent.addEventListener('click', function() {
                    $('#form-delete').attr('style', 'display: flex');

                    $('#stud_id').val(params.data.id);
                });
                
                return el;
            }
        };

        data.column.push(columnDefs);
    }

    for (var i = data.column.length - 1; i >= 0; i--) {       
        if (data.column[i].field == "full_name") {
            data.column[i].cellRenderer = function display(params) {
                var name = params.data.full_name.split(' ');
                var firstName = name[0];
                var lastName = name.reverse()[0];

                return '<div class="d-flex flex-column align-items-start">\
                    <span class="font-weight-600" style="position: relative; top: 13px; color: #333;">'+firstName+'</span>\
                    <span style="position: relative; bottom: 13px;">'+lastName+'</span>\
                </div>';
            }
        }

        if (data.column[i].field == "status") {
            data.column[i].cellRenderer = function display(params) {
                var status = params.data.status;
                if (status.id == 1) { // active
                    return '<div class="custom-badge" style="color: '+status.color+'; background-color: '+status.bg_color+'">'+ status.name +'</div>';
                }else if (status.id == 2){
                    return '<div class="custom-badge" style="color: '+status.color+'; background-color: '+status.bg_color+'">'+ status.name +'</div>';
                }else if (status.id == 3){
                    return '<div class="custom-badge" style="color: '+status.color+'; background-color: '+status.bg_color+'">'+ status.name +'</div>';
                }
            }
        }
    }

    gridOptions.columnDefs = data.column;
    gridOptions.rowData = data.rows;

    // setup the grid after the page has finished loading
    new agGrid.Grid(aggrid, gridOptions);

    // refreshRecords(data.rows.length);
}

function refreshRecords(l){
    $('#ag-index').html($('#current-page').text());
    $('#ag-number-records-shown').html($("#pageSize").val());
    $('#ag-max-records').html(l);
}

function autoSizeAll(skipHeader) {
    var allColumnIds = [];
    gridOptions.columnApi.getAllColumns().forEach(function(column) {
        allColumnIds.push(column.colId);
    });

    gridOptions.columnApi.autoSizeColumns(allColumnIds, skipHeader);
}

$('#btn-no').on('click', function(){
    $('#form-delete').hide();
});

$('#btn-yes').on('click', function(){
    $.ajax({
        url: "/api/students/delete",
        data: {
            _token: token,
            id: $('#stud_id').val()
        },
        type: 'DELETE',
        dataType: 'json',
        success: (response) => {
            if(response.is_success){
                alert(response.message);

                window.location.href = '/students';
            }else{
                alert(response.message);
            }
        }
    });
});
// SEARCH HERE
$("#search-filter").on("keyup", function() {
    search($(this).val());
});

function search(data) {
  gridOptions.api.setQuickFilter(data);
}
// ENDS HERE

// PAGE SIZE
$("#pageSize").on('change', function(){
    var size = $(this).val();
    pageSize(size);
});

function pageSize(value){
    gridOptions.api.paginationSetPageSize(value);
}
// ENDS HERE

// EXPORT AS CSV
$('#btn-export').on('click', function(){
    gridOptions.api.exportDataAsCsv();
});