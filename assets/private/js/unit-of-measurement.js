/**
 * Theme: Appzia Admin
 * Datatable
 */

!function($) {
    "use strict";

    var DataTable = function() {
    };
    DataTable.prototype.init = function() {

        /*********** 0 initialization *************/
        var $datatable;
        var method;
        var id, code, name, description;
        $datatable = $('#datatable');

        $('input[name ="code"]').keydown(function(e){
            if(e.keyCode == 32){
                e.preventDefault();
            }
        });

        reset();
        list();
        function reset () {
            $('#id').val('0');
            $('#code').val('');
            $('#name').val('');
            $('#description').val('');

            $('#code').removeAttr("readonly", "true");
            $('#code').removeAttr("style", "cursor:not-allowed");
        }

        $('#maintenance-width-modal').on('hidden.bs.modal', function () {
            reset();
        });

        /*********** 5 restore *************/
        $('body').on('click', '#btn-restore', function () {
            id = $(this).attr('name');
            $('#id').val(id);
            method = 'restore';
            $.ajax({
                url : window.location.origin +'/gatepass/assets/private/php/unit-of-measurement.php',
                method: 'post',
                data : {
                    method : method,
                    id : id,
                },
                success: function (data) {
                    if(data == 'success'){
                        $('#alert-success').append('<div class="alert alert-success alert-dismissible fade show text-center" style="position:absolute; z-index: 1; width:100%"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>Restored Successfully.</div>');
                        $(".alert-success").fadeTo(1000, 500).slideUp(500, function(){
                            $(".alert-success").slideUp(500);
                        });
                        list();
                    }
                }
            });
        });

        /*********** 4 in-active *************/
        $('body').on('click', '#btn-delete', function () {
            id = $(this).attr('name');
            $('#id').val(id);
            method = 'archive';
            $.ajax({
                url : window.location.origin +'/gatepass/assets/private/php/unit-of-measurement.php',
                method: 'post',
                data : {
                    method : method,
                    id : id,
                },
                success: function (data) {
                    if(data == 'success'){
                        $('#alert-success').append('<div class="alert alert-success alert-dismissible fade show text-center" style="position:absolute; z-index: 1; width:100%"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>Archived Successfully.</div>');
                        $(".alert-success").fadeTo(1000, 500).slideUp(500, function(){
                            $(".alert-success").slideUp(500);
                        });
                        list();
                    }
                }
            });
        });


        /*********** 3 find *************/
        $('body').on('click', '#btn-edit', function () {
            $('#maintenance-width-modal').modal('show');
            id = $(this).attr('name');
            $('#id').val(id);
            method = 'find';
            $.ajax({
                url : window.location.origin +'/gatepass/assets/private/php/unit-of-measurement.php',
                method: 'post',
                data : {
                    method : method,
                    id : id,
                },
                dataType: 'json',
                success: function (data) {
                    $(data).each(function (index, td) {
                        $('#code').val(td.code);
                        $('#name').val(td.name);
                        $('#description').val(td.description);

                        $('#code').attr("readonly", "true");
                        $('#code').attr("style", "cursor:not-allowed");
                    });
                }
            });
        });


        /*********** 2 form submit *************/
        $('body').on('click', '#btn-save', function () {
            id = $('#id').val();
            code = $('#code').val();
            name = $('#name').val();
            description = $('#description').val();
            if(id > 0){
                method = 'update';
                if($('#form-maintenance').parsley().validate()){
                    $.ajax({
                        url : window.location.origin +'/gatepass/assets/private/php/unit-of-measurement.php',
                        method: 'post',
                        data : {
                            method : method,
                            id : id,
                            code : code,
                            name : name,
                            description : description,
                        },  
                        success: function (data) {
                            if(data == 'success'){
                                $('#alert-success').append('<div class="alert alert-success alert-dismissible fade show text-center" style="position:absolute; z-index: 1; width:100%"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>Updated Successfully.</div>');
                                $(".alert-success").fadeTo(1000, 500).slideUp(500, function(){
                                    $(".alert-success").slideUp(500);
                                });
                                list();
                            }
                        }
                    });
                }
            }else{
                method = 'save';
                if($('#form-maintenance').parsley().validate()){
                    $.ajax({
                        url : window.location.origin +'/gatepass/assets/private/php/unit-of-measurement.php',
                        method: 'post',
                        data : {
                            method : method,
                            code : code,
                            name : name,
                            description : description,
                        },  
                        success: function (data) {
                            if(data == 'success'){
                                $('#alert-success').append('<div class="alert alert-success alert-dismissible fade show text-center" style="position:absolute; z-index: 1; width:100%"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>Saved Successfully.</div>');
                                $(".alert-success").fadeTo(1000, 500).slideUp(500, function(){
                                    $(".alert-success").slideUp(500);
                                });
                                reset();
                                list();
                            }
                        }
                    });
                }
            }
            return false;
        });

        /*********** 1 list *************/
        function list () {
            method = 'list';
            $.ajax({
                url : window.location.origin +'/gatepass/assets/private/php/unit-of-measurement.php',
                method: 'post',
                data : {
                    method : method
                },
                dataType: 'json',
                success: function (data) {
                    var table = $('#datatable').DataTable();
                    table
                        .clear()
                        .draw();
                    $datatable.DataTable().destroy();
                    $datatable.init();
                    $datatable.dataTable({
                        "order": [[ 0, "asc" ]],
                        data: data,
                        columns: [
                            { 'data': 'code' },
                            { 'data': 'name' },
                            { 'data': 'description' },
                            { 'data': 'active' },
                            {
                                'data': 'id',
                                render: function (data, type, td) {
                                    return '<td>'
                                            + '<th>'
                                                + '<a id="btn-edit" name="'+ td.id +'" class="btn btn-xs btn-warning text-warning" href="#" data-toggle="tooltip" data-placement="top" title="edit"><span class="fas fa-pencil-alt"></span><a/>'
                                                + '&nbsp;&nbsp;'
                                                + '<a id="'+ (td.active == '1' ? 'btn-delete' : 'btn-restore') +'" name="'+ td.id +'" class="btn btn-xs btn-danger text-danger" href="#" data-toggle="tooltip" data-placement="top" title="'+ (td.active == '1' ? 'delete' : 'restore') +'"><span class="'+ (td.active == '1' ? 'ti-close' : 'far fa-window-restore') +'"></span><a/>'
                                            + '</th>'
                                            + '</td>'
                                    ;
                                }
                            },
                        ],
                        aaSorting : [[1,'DESC']]
                    });

                },
                error: function (err) {
                    console.log(err);
                }
            });
        }

    },
    //init
    $.DataTable = new DataTable, $.DataTable.Constructor = DataTable
}(window.jQuery),

//initializing
function ($) {
    "use strict";
    $.DataTable.init();
}(window.jQuery);