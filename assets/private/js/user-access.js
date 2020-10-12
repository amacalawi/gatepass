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
        var id, username, menu_sub_menu;
        var html;
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


        /*********** 5 selects *************/
        select_menu_sub_menu('0');
        function select_menu_sub_menu (id) {
            method = 'list-select';
            $.ajax({
                url : window.location.origin +'/gatepass/assets/private/php/menu-sub-menu.php',
                method: 'post',
                data : {
                    method : method,
                    id : id,
                },
                dataType: 'json',
                success: function (data) {
                    $('#menu-sub-menu').empty();
                    html = '';
                    $(data).each(function (index, td) {
                        html += '<option value="' + td.id + '">' + td.menus + '</option>';
                    });
                    $('#menu-sub-menu').append(html);
                }
            });
        }

        select_users('xx');
        function select_users (username) {
            method = 'list-select';
            $.ajax({
                url : window.location.origin +'/gatepass/assets/private/php/users.php',
                method: 'post',
                data : {
                    method : method,
                    username : username,
                },
                dataType: 'json',
                success: function (data) {
                    $('#user').empty();
                    html = '';
                    $(data).each(function (index, td) {
                        html += '<option value="' + td.username + '">' + td.username + '</option>';
                    });
                    $('#username').append(html);
                }
            });
        }

        /*********** 5 restore *************/
        $('body').on('click', '#btn-restore', function () {
            id = $(this).attr('name');
            $('#id').val(id);
            method = 'restore';
            $.ajax({
                url : window.location.origin +'/gatepass/assets/private/php/user-access.php',
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
                url : window.location.origin +'/gatepass/assets/private/php/user-access.php',
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
                url : window.location.origin +'/gatepass/assets/private/php/user-access.php',
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
            $("#menu-sub-menu option:selected").each(function () {
               var $this = $(this);
               if ($this.length) {
                    menu_sub_menu = $this.val();
                    username = $('#username').val();
                    method = 'save';

                    $.ajax({
                        url : window.location.origin +'/gatepass/assets/private/php/user-access.php',
                        method: 'post',
                        data : {
                            method : method,
                            menu_sub_menu : menu_sub_menu,
                            username : username,
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
                        },error : function(err){
                            console.log(err);
                        }
                    });
                }
            });

            return false;
        });

        /*********** 1 list *************/
        function list () {
            method = 'list';
            $.ajax({
                url : window.location.origin +'/gatepass/assets/private/php/user-access.php',
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
                            { 'data': 'username' },
                            { 'data': 'menus' },
                            { 'data': 'active' },
                            {
                                'data': 'id',
                                render: function (data, type, td) {
                                    return '<td>'
                                            + '<th>'
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