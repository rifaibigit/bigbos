    
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 1.1.2
    </div>
    <strong>Copyright &copy;2021 PT. Bintang Inter Global.</strong>
  </footer>

</div>
<!-- ./wrapper -->

<style>
  .select2-results__option .wrap:before{
    font-family:"Font Awesome 5 Free";
    content:"\f0c8";
    width:25px;
    height:25px;
    padding-right: 10px;
    
  }
  .select2-results__option[aria-selected=true] .wrap:before{
      content:"\f14a";
  }

  .content-wrapper{
    min-height: 713px !important;
  }

  /* not required css */

  .select2-multiple2
  {
    width: 50%
  }
</style>

<script>
  $(document).ready(function() {
    $(".mdb-select").select2({
        // dropdownParent: $(this).parent()
    });
  });
</script>

<script>
  $(document).ready(function() {
    $(".mdb-select2").select2();
  });
</script>

<script>
  jQuery(function($) {
    $.fn.select2.amd.require([
      'select2/selection/single',
      'select2/selection/placeholder',
      'select2/selection/allowClear',
      'select2/dropdown',
      'select2/dropdown/search',
      'select2/dropdown/attachBody',
      'select2/utils'
    ], function (SingleSelection, Placeholder, AllowClear, Dropdown, DropdownSearch, AttachBody, Utils) {

      var SelectionAdapter = Utils.Decorate(
        SingleSelection,
        Placeholder
      );
      
      SelectionAdapter = Utils.Decorate(
        SelectionAdapter,
        AllowClear
      );
            
      var DropdownAdapter = Utils.Decorate(
        Utils.Decorate(
          Dropdown,
          DropdownSearch
        ),
        AttachBody
      );
      
      var base_element = $('.select2-multiple2')
      $(base_element).select2({
        placeholder: 'By Area',
        selectionAdapter: SelectionAdapter,
        dropdownAdapter: DropdownAdapter,
        allowClear: true,
        templateResult: function (data) {

          if (!data.id) { return data.text; }

          var $res = $('<div></div>');

          $res.text(data.text);
          $res.addClass('wrap');

          return $res;
        },
        templateSelection: function (data) {
          if (!data.id) { return data.text; }
          var selected = ($(base_element).val() || []).length;
          var total = $('option', $(base_element)).length;
          return "Selected " + selected + " of " + total;
        }
      })
    
    });
    
  });
</script>

<!-- <script>
  $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
    $("select.select2").select2({
        tags: true
    })
  })
</script> -->

<!-- <script>
  function setYearPicker(input){
    $(input).datetimepicker({
        format: "YYYY",
        useCurrent: false,
        viewMode: "years"
    })
  }
</script>

<script>
    $(document).ready(function(){
        setYearPicker("#yearpicker")
    })
</script> -->

<script>
  //var table, save_method;
  $(document).ready(function() {
    $('#table').DataTable({
      "scrollY": true,
      "scrollX": true,
      "autoWidth": false,
      "responsive": true,
      "pageResize": true,
      "paging": true,
      "info": true,
      "dom": 'Bfrtip',
      "lengthMenu": [
            [ 10, 25, 50, -1 ],
            [ '10 rows', '25 rows', '50 rows', 'Show all' ]
        ],
      "buttons": [
            'pageLength',
            { extend: 'excel', text: '<i class = "fa fa-download"> Excel</i>' },
        ]
    });

    $('#selling-in').DataTable({
      "scrollY": true,
      "scrollX": true,
      "autoWidth": true,
      "responsive": true,
      "pageResize": true,
      "paging": true,
      "info": true,
      "dom": 'Bfrtip',
      "lengthMenu": [
            [ 10, 25, 50, -1 ],
            [ '10 rows', '25 rows', '50 rows', 'Show all' ]
        ],
      "buttons": [
            'pageLength',
            { extend: 'excel', text: '<i class = "fa fa-download"> Excel</i>' },
        ]
    });

  });

  $(document).ready(function() {

    var t_area = $('#area').DataTable({
      "autoWidth": false,
      "responsive": true,
      "fixedHeader": true,
      "scrollY": true,
      "scrollX": true,
      "paging": true,
      "dom": 'Bfrtip',
      "lengthMenu": [
            [ 10, 25, 50, -1 ],
            [ '10 rows', '25 rows', '50 rows', 'Show all' ]
        ],
      "buttons": [
            'pageLength',
            { extend: 'excel', text: '<i class = "fa fa-download"> Excel</i>' },
      ],
    });

    //new $.fn.dataTable.FixedHeader( t_area );

    $('#channel').DataTable({
      "autoWidth": true,
      "responsive": true,
      "fixedHeader": true,
      "scrollY": true,
      "scrollX": true,
      "paging": true,
      "dom": 'Bfrtip',
      "lengthMenu": [
            [ 10, 25, 50, -1 ],
            [ '10 rows', '25 rows', '50 rows', 'Show all' ]
        ],
      "buttons": [
            'pageLength',
            { extend: 'excel', text: '<i class = "fa fa-download"> Excel</i>' },
      ],
    });

    $('#target_so').DataTable({
      "scrollY": true,
      "scrollX": true,
      "autoWidth": true,
      "responsive": true,
      "paging":   true,
      "ordering": false,
      "searching": true,
      "info":     true,
      "dom": 'Bfrtip',
      "lengthMenu": [
            [ 10, 25, 50, -1 ],
            [ '10 rows', '25 rows', '50 rows', 'Show all' ]
        ],
      "buttons": [
            'pageLength',
            { extend: 'excel', text: '<i class = "fa fa-download"> Excel</i>' },
      ],
    });

    $('#dc').DataTable({
      "ajax": "<?= base_url; ?>/Dc/show",
      "fnCreatedRow": function (row, data, index) {
			$('td', row).eq(0).html(index + 1);
			},
      "columns": [
            { "title": "#", "data": "id", "width": "5" },
            { "title": "Outlet Code", "data": "outlet_code", "width": "60" },
            { "title": "Outlet Name", "data": "outlet_name" },
            { "title": "Outlet Count", "data": "outlet_count", "width": "30" },
            {
              "title": "Action",
              "data": "id",
              "width": "70px",
              "sClass": "text-center",
              "orderable": false,
              "mRender": function (data) {
                return '<a href="<?= base_url; ?>/Dc/edit/'+ data +'" style="margin-left : 5px;margin-right : 5px;"><i class="fas fa-edit" style="margin-left : 5px;margin-right : 5px;"></i></a> | <a href="<?= base_url; ?>/Dc/hapus/'+ data +'" onclick="javascript:return confirm(\'Hapus data?\');" style="margin-left : 10px;margin-right : 5px;"><i class="fas fa-trash-alt" style="color:red" style="margin-left : 5px;margin-right : 5px;"></i></a>' ;
                        
               }
            }
      ],
      "autoWidth": true,
      "responsive": true,
      "scrollY": true,
      "scrollX": true,
      "paging": true,
      // "lengthMenu": [ [10, 25, 50, -1], [10, 25, 50, "All"] ],
      "dom": 'Bfrtip',
      "lengthMenu": [
            [ 10, 25, 50, -1 ],
            [ '10 rows', '25 rows', '50 rows', 'Show all' ]
        ],
      "buttons": [
            'pageLength',
            { extend: 'excel', text: '<i class = "fa fa-download"> Excel</i>' },
      ],
    });

    

    $('#menu').DataTable({
      "ajax": "<?= base_url; ?>/Menu/show",
      "fnCreatedRow": function (row, data, index) {
			$('td', row).eq(0).html(index + 1);
			},
      "columns": [
            { "title": "#", "data": "menu_id", "width": "10" },
            { "title": "Menu", "data": "menu"},
            { "title": "Menu Icon", "data": "menu_icon" },
            { "title": "Active", 
              "data": "is_active", 
              "sClass": "text-center",
              "render": function ( data, type, row ) {
                    if ( type === 'display' ) {
                        return '<input type="checkbox" class="editor-active" onclick="return false;" onkeydown="return false;">';
                    }
                    return data;
                },
            },
            {
              "title": "Action",
              "data": "menu_id",
              "width": "100px",
              "sClass": "text-center",
              "orderable": false,
              "mRender": function (data) {
                return '<a href="<?= base_url; ?>/Menu/edit/'+ data +'" style="margin-left : 10px;margin-right : 10px;"><i class="fas fa-edit" style="margin-left : 10px;margin-right : 10px;"></i></a> | <a href="<?= base_url; ?>/Menu/hapus/'+ data +'" onclick="javascript:return confirm(\'Hapus data?\');" style="margin-left : 20px;margin-right : 10px;"><i class="fas fa-trash-alt" style="color:red" style="margin-left : 10px;margin-right : 10px;"></i></a>' ;
                        
               }
            }
      ],
      rowCallback: function ( row, data ) {
            // Set the checked state of the checkbox in the table
            $('input.editor-active', row).prop( 'checked', data.is_active == 1 );
      },
      "autoWidth": true,
      "responsive": true,
      "scrollY": true,
      "scrollX": true,
      "paging": true,
    });

    $('#submenu').DataTable({
      "ajax": "<?= base_url; ?>/SubMenu/show",
      "fnCreatedRow": function (row, data, index) {
			$('td', row).eq(0).html(index + 1);
			},
      "columns": [
            { "title": "#", "data": "menu_id", "width": "10" },
            { "title": "Menu", "data": "menu"},
            { "title": "Sub Menu", "data": "sub_menu"},
            { "title": "URL", "data": "url" },
            { "title": "Active", 
              "data": "is_active", 
              "sClass": "text-center", 
              "render": function ( data, type, row ) {
                    if ( type === 'display' ) {
                        return '<input type="checkbox" class="editor-active" onclick="return false;" onkeydown="return false;">';
                    }
                    return data;
                },
            },
            {
              "title": "Action",
              "data": "id",
              "width": "100px",
              "sClass": "text-center",
              "orderable": false,
              "mRender": function (data) {
                return '<a href="<?= base_url; ?>/SubMenu/edit/'+ data +'" style="margin-left : 10px;margin-right : 10px;"><i class="fas fa-edit" style="margin-left : 10px;margin-right : 10px;"></i></a> | <a href="<?= base_url; ?>/SubMenu/hapus/'+ data +'" onclick="javascript:return confirm(\'Hapus data?\');" style="margin-left : 20px;margin-right : 10px;"><i class="fas fa-trash-alt" style="color:red" style="margin-left : 10px;margin-right : 10px;"></i></a>' ;
                        
               }
            }
      ],
      rowCallback: function ( row, data ) {
            // Set the checked state of the checkbox in the table
            $('input.editor-active', row).prop( 'checked', data.is_active == 1 );
      },
      "autoWidth": true,
      "responsive": true,
      "scrollY": true,
      "scrollX": true,
      "paging": true,
    });

    $('#useraccess').DataTable({
      "ajax": "<?= base_url; ?>/UserAccess/show",
      "fnCreatedRow": function (row, data, index) {
			$('td', row).eq(0).html(index + 1);
			},
      "columns": [
            { "title": "#", "data": "user_id", "width": "10" },
            { "title": "User", "data": "username"},
            { "title": "Menu", "data": "menu"},
            { "title": "Sub Menu", "data": "sub_menu" },
            {
              "title": "Action",
              "data": "id",
              "width": "100px",
              "sClass": "text-center",
              "orderable": false,
              "mRender": function (data) {
                return '<a href="<?= base_url; ?>/UserAccess/hapus/'+ data +'" onclick="javascript:return confirm(\'Hapus data?\');" style="margin-left : 20px;margin-right : 10px;"><i class="fas fa-trash-alt" style="color:red" style="margin-left : 10px;margin-right : 10px;"></i></a>' ;
                        
               }
            }
      ],
      "autoWidth": true,
      "responsive": true,
      "scrollY": true,
      "scrollX": true,
      "paging": true,
    });

    $('#sku').DataTable({
      "autoWidth": true,
      "responsive": true,
      "ordering": true,
      "scrollY": true,
      "scrollX": true,
      "paging": true,
      "dom": 'Bfrtip',
      "lengthMenu": [
            [ 10, 25, 50, -1 ],
            [ '10 rows', '25 rows', '50 rows', 'Show all' ]
        ],
      "buttons": [
            'pageLength',
            { extend: 'excel', text: '<i class = "fa fa-download"> Excel</i>' },
      ],
    });

    $('#rpt_sale_out2').DataTable({
      "scrollX": true,
      "autoWidth": true,
      "responsive": true,
      "paging":   false,
      "ordering": false,
      "searching": false,
      "info": false
    });

    $("#rpt_sale_out2").rowspanizer({
          columns: [1],
          vertical_align: 'middle'
    });

    $('#rpt_sale_out_val').DataTable({
      "scrollY": 915,
      "scrollX": true,
      "autoWidth": true,
      "responsive": true,
      "paging":   false,
      "ordering": false,
      "searching": false,
      "info":     false,
      /* "dom": 'Bfrtip',
      "buttons": [
            'excel',
        ] */
    });

    $("#rpt_sale_out_val").rowspanizer({
        columns: [1],
        vertical_align: 'middle'
    });


    $('#rpt_sale_out_qty').DataTable({
      "scrollY": 915,
      "scrollX": true,
      "autoWidth": true,
      "responsive": true,
      "paging":   false,
      "ordering": false,
      "searching": false,
      "info":     false,
      /* "dom": 'Bfrtip',
      "buttons": [
            'excel',
        ] */
    });

    $("#rpt_sale_out_qty").rowspanizer({
        columns: [1],
        vertical_align: 'middle'
    });

    $('#rpt_sale_in_val').DataTable({
      "scrollY": 965,
      "scrollX": true,
      "autoWidth": true,
      "responsive": true,
      "paging":   false,
      "ordering": false,
      "searching": false,
      "info":     false,
      "fixedColumns": {
        "leftColumns": 1,
      },
      /* "dom": 'Bfrtip',
      "buttons": [
            'excel',
        ] */
    });

    $("#rpt_sale_in_val").rowspanizer({
        columns: [1],
        vertical_align: 'middle'
    });


    $('#rpt_sale_in_qty').DataTable({
      "scrollY": 965,
      "scrollX": true,
      "responsive": true,
      "paging":   false,
      "ordering": false,
      "searching": false,
      "info":     false,
      /* "dom": 'Bfrtip',
      "buttons": [
            'excel',
        ] */
    });

    $("#rpt_sale_in_qty").rowspanizer({
        columns: [1],
        vertical_align: 'middle'
    });

    $('#sale_out_performance').DataTable({
      "scrollY": 600,
      "scrollX": true,
      "autoWidth": true,
      "bAutoWidth": false,
      "responsive": true,
      "paging":   false,
      "ordering": false,
      "searching": false,
      "info": true,
      "fixedColumns": {
            "leftColumns": 5
        },
      /* "dom": 'Bfrtip',
      "buttons": [
            'excel',
        ] */
    });

    $('#sale_in_performance').DataTable({
      "scrollY": 600,
      "scrollX": true,
      "autoWidth": true,
      "responsive": true,
      "paging":   false,
      "ordering": false,
      "searching": false,
      "info": true,
      "fixedColumns": {
            "leftColumns": 5
        },
      /* "dom": 'Bfrtip',
      "buttons": [
            'excel',
        ] */
    });

    $('#sale_in_qty').DataTable({
      "scrollY": 600,
      "scrollX": true,
      "autoWidth": true,
      "responsive": true,
      "paging":   false,
      "ordering": false,
      "searching": false,
      "info": true,
      "fixedColumns": {
            "leftColumns": 5
        },
      /* "dom": 'Bfrtip',
      "buttons": [
            'excel',
        ] */
    });

    $('#distr').DataTable({
      "scrollY": 700,
      "scrollX": true,
      "autoWidth": true,
      "responsive": true,
      "paging":   false,
      "ordering": false,
      "searching": false,
      "info":     false,
      "fixedColumns":   {
            "leftColumns": 4
      },
      /* "dom": 'Bfrtip',
      "buttons": [
            'excel',
        ] */
    });

    $('#contr2').DataTable({
      "scrollY": 750,
      "scrollX": true,
      "autoWidth": true,
      "responsive": true,
      "paging":   false,
      "ordering": false,
      "searching": false,
      "info":     false,
      "fixedColumns":   {
            "leftColumns": 4
      },
      /* "dom": 'Bfrtip',
      "buttons": [
            'excel',
        ] */
    });

    // $('#ao').DataTable({
    //   "scrollY": 500,
    //   "scrollX": true,
    //   "autoWidth": true,
    //   "responsive": true,
    //   "paging":   false,
    //   "ordering": false,
    //   "searching": false,
    //   "info":     false,
    //   "fixedColumns":   {
    //         "leftColumns": 4
    //   },
    //   /* "dom": 'Bfrtip',
    //   "buttons": [
    //         'excel',
    //     ] */
    // });

    $('#ao_dash').DataTable({
      "scrollY": 300,
      "scrollX": true,
     // "scrollCollapse": true,
      "autoWidth": true,
      "responsive": true,
      "paging":   false,
      "ordering": false,
      "searching": false,
      "info":     false,
      /* "dom": 'Bfrtip',
      "buttons": [
            'excel',
        ] */
    });

    $('#ao_dash2').DataTable({
      "scrollY": 300,
      "scrollX": true,
     // "scrollCollapse": true,
      "autoWidth": true,
      "responsive": true,
      "paging":   false,
      "ordering": false,
      "searching": false,
      "info":     false,
      /* "dom": 'Bfrtip',
      "buttons": [
            'excel',
        ] */
    });

    $('#ao_dash3').DataTable({
      "scrollY": 300,
      "scrollX": true,
     // "scrollCollapse": true,
      "autoWidth": true,
      "responsive": true,
      "paging":   false,
      "ordering": false,
      "searching": false,
      "info":     false,
      /* "dom": 'Bfrtip',
      "buttons": [
            'excel',
        ] */
    });

    $('#ao_dash4').DataTable({
      "scrollY": 300,
      "scrollX": true,
     // "scrollCollapse": true,
      "autoWidth": true,
      "responsive": true,
      "paging":   false,
      "ordering": false,
      "searching": false,
      "info":     false,
      /* "dom": 'Bfrtip',
      "buttons": [
            'excel',
        ] */
    });


    $('#contr').DataTable({
      "scrollY": 500,
      "scrollX": true,
     // "scrollCollapse": true,
      "autoWidth": true,
      "responsive": true,
      "paging":   false,
      "ordering": false,
      "searching": false,
      "info":     false,
      "fixedColumns":   {
            "leftColumns": 5
        },
      "columnDefs": [
          {
              "targets": [1],
              "visible": false,
              "searchable": false
          },
          
      ],
      "dom": 'Bfrtip',
      "buttons": [
            'excel',
        ]
    });


    $('#sale_out_salesman').DataTable({
      "scrollY": 600,
      "scrollX": true,
      "autoWidth": true,
      "responsive": true,
      "paging":   false,
      "ordering": false,
      "searching": false,
      "info":     false,
      "fixedColumns":   {
            "leftColumns": 3
        },
      "dom": 'Bfrtip',
      "buttons": [
            'excel',
        ]
    });

    $("#sale_out_salesman").rowspanizer({
          columns: [0,1],
    });

    $('#sale_out_salesman2').DataTable({
      "scrollY": 600,
      "scrollX": true,
      "autoWidth": true,
      "responsive": true,
      "paging": false,
      "ordering": false,
      "searching": false,
      "info": true,
      "fixedColumns":   {
            "leftColumns": 2
        },
      // "dom": 'Bfrtip',
      // "buttons": [
      //       'excel',
      //   ]
    });

    $("#sale_out_salesman2").rowspanizer({
          columns: [0,1],
    });

    $('#sale_out_year').DataTable({
      "ajax": "<?= base_url; ?>/report/sellingoutYear_show",
      "columns": [
            { "data": "id"},
            { "data": "principal"},
            { "data": "item_group"},
            { "data": "item_code" },
            { "data": "item_name" },
            { "data": "unit" },
            { "data": "qty_jan", className: "dt-right", render: $.fn.dataTable.render.number( ',', '.', 0, '' ) },
            { "data": "value_jan", className: "dt-right", render: $.fn.dataTable.render.number( ',', '.', 2, '' )},
            { "data": "qty_feb", className: "dt-right", render: $.fn.dataTable.render.number( ',', '.', 0, '' ) },
            { "data": "value_feb", className: "dt-right", render: $.fn.dataTable.render.number( ',', '.', 2, '' ) },
            { "data": "qty_mar", className: "dt-right", render: $.fn.dataTable.render.number( ',', '.', 0, '' ) },
            { "data": "value_mar", className: "dt-right", render: $.fn.dataTable.render.number( ',', '.', 2, '' ) },
            { "data": "qty_q1", className: "dt-right", render: $.fn.dataTable.render.number( ',', '.', 0, '' ) },
            { "data": "value_q1", className: "dt-right", render: $.fn.dataTable.render.number( ',', '.', 2, '' ) },
            { "data": "qty_apr", className: "dt-right", render: $.fn.dataTable.render.number( ',', '.', 0, '' ) },
            { "data": "value_apr", className: "dt-right", render: $.fn.dataTable.render.number( ',', '.', 2, '' ) },
            { "data": "qty_mei", className: "dt-right", render: $.fn.dataTable.render.number( ',', '.', 0, '' ) },
            { "data": "value_mei", className: "dt-right", render: $.fn.dataTable.render.number( ',', '.', 2, '' ) },
            { "data": "qty_jun", className: "dt-right", render: $.fn.dataTable.render.number( ',', '.', 0, '' ) },
            { "data": "value_jun", className: "dt-right", render: $.fn.dataTable.render.number( ',', '.', 2, '' ) },
            { "data": "qty_q2", className: "dt-right", render: $.fn.dataTable.render.number( ',', '.', 0, '' ) },
            { "data": "value_q2", className: "dt-right", render: $.fn.dataTable.render.number( ',', '.', 2, '' ) },
            { "data": "qty_jul", className: "dt-right", render: $.fn.dataTable.render.number( ',', '.', 0, '' ) },
            { "data": "value_jul", className: "dt-right", render: $.fn.dataTable.render.number( ',', '.', 2, '' ) },
            { "data": "qty_agu", className: "dt-right", render: $.fn.dataTable.render.number( ',', '.', 0, '' ) },
            { "data": "value_agu", className: "dt-right", render: $.fn.dataTable.render.number( ',', '.', 2, '' ) },
            { "data": "qty_sep", className: "dt-right", render: $.fn.dataTable.render.number( ',', '.', 0, '' ) },
            { "data": "value_sep", className: "dt-right", render: $.fn.dataTable.render.number( ',', '.', 2, '' ) },
            { "data": "qty_q3", className: "dt-right", render: $.fn.dataTable.render.number( ',', '.', 0, '' ) },
            { "data": "value_q3", className: "dt-right", render: $.fn.dataTable.render.number( ',', '.', 2, '' ) },
            { "data": "qty_okt", className: "dt-right", render: $.fn.dataTable.render.number( ',', '.', 0, '' ) },
            { "data": "value_okt", className: "dt-right", render: $.fn.dataTable.render.number( ',', '.', 2, '' ) },
            { "data": "qty_nop", className: "dt-right", render: $.fn.dataTable.render.number( ',', '.', 0, '' ) },
            { "data": "value_nop", className: "dt-right", render: $.fn.dataTable.render.number( ',', '.', 2, '' ) },
            { "data": "qty_des", className: "dt-right", render: $.fn.dataTable.render.number( ',', '.', 0, '' ) },
            { "data": "value_des", className: "dt-right", render: $.fn.dataTable.render.number( ',', '.', 2, '' ) },
            { "data": "qty_q4", className: "dt-right", render: $.fn.dataTable.render.number( ',', '.', 0, '' ) },
            { "data": "value_q4", className: "dt-right", render: $.fn.dataTable.render.number( ',', '.', 2, '' ) },
            { "data": "qty_total", className: "dt-right", render: $.fn.dataTable.render.number( ',', '.', 0, '' ) },
            { "data": "value_total", className: "dt-right", render: $.fn.dataTable.render.number( ',', '.', 2, '' ) },
            { "data": "qty_avg", className: "dt-right", render: $.fn.dataTable.render.number( ',', '.', 0, '' ) },
            { "data": "value_avg", className: "dt-right", render: $.fn.dataTable.render.number( ',', '.', 2, '' ) } 
      ],
      "order": [[2, 'asc']],
      "rowGroup": {
            startRender: null,
            endRender: function (rows, group) {        
                var container = $('<tr>');
                container.append('<td colspan= "2"> ' + group + '</td>');
                var i;
                for (i = 2; i < table.columns().header().length; i++) {
                    var hourSum = rows
                        .data()
                        .pluck(i)
                        .reduce(function (a, b) {
                            return a + b * 1;
                        }, 0);
                    container.append('<td>' + hourSum + '</td>');
                }
                container.append('</tr>')
 
                return $(container)
            },
            dataSrc: 2
      },
      "autoWidth": true,
      "responsive": true,
      "paging":   false,
      "ordering": false,
      "searching": false,
      "scrollX": true
    });

    $('#sale_out_distributor').DataTable({
      "scrollY": 600,
      "scrollX": true,
      "autoWidth": true,
      "responsive": true,
      "paging":   false,
      "ordering": false,
      "searching": false,
      "info": true,
      "fixedColumns":   {
            "leftColumns": 4
        },
      /* "dom": 'Bfrtip',
      "buttons": [
            'excel',
        ] */
    });

    // $('#ro_outlet').DataTable({
    //   "scrollY": 400,
    //   "scrollX": true,
    //   "autoWidth": true,
    //   "responsive": true,
    //   "paging":   false,
    //   "ordering": false,
    //   "searching": false,
    //   "info": true,
    //   /* "dom": 'Bfrtip',
    //   "buttons": [
    //         'excel',
    //     ] */
    // });

    var table_direct = $('#direct_in_ot').DataTable({
      "scrollY": 400,
      "scrollX": true,
      "autoWidth": true,
      "responsive": true,
      "paging":   false,
      "searching": false,
      "info": true,
      /* "dom": 'Bfrtip',
      "buttons": [
            'excel',
        ] */
    });

    $('#direct_in_ot').on( 'order.dt',  function () { 
      let order = table_direct.order();
      console.log("Ordered column " + order[0][0] + ", in direction " + order[0][1]);
    } )

    $('#sale_in_ot').DataTable({
      "scrollY": 420,
      "scrollX": true,
      "autoWidth": true,
      "responsive": true,
      "paging":   false,
      "ordering": false,
      "searching": false,
      "info": true,
      "fixedColumns":   {
            "leftColumns": 4
        },
      /* "dom": 'Bfrtip',
      "buttons": [
            'excel',
        ] */
    });

    $('#sale_out_ot').DataTable({
      "scrollY": 420,
      "scrollX": true,
      "autoWidth": true,
      "responsive": true,
      "paging":   false,
      "ordering": false,
      "searching": false,
      "info": true,
      "fixedColumns":   {
            "leftColumns": 5
        },
      /* "dom": 'Bfrtip',
      "buttons": [
            'excel',
        ] */
    });

    $('#sale_in_dist').DataTable({
      "scrollY": 500,
      "scrollX": true,
      "autoWidth": true,
      "responsive": true,
      "paging":   false,
      "ordering": false,
      "searching": false,
      "info": true,
      "fixedColumns":   {
            "leftColumns": 4
        },
      /* "dom": 'Bfrtip',
      "buttons": [
            'excel',
        ] */
    });

    $('#sale_in_asm').DataTable({
      "scrollY": 500,
      "scrollX": true,
      "autoWidth": true,
      "responsive": true,
      "paging":   false,
      "ordering": false,
      "searching": false,
      "info": true
      /* "dom": 'Bfrtip',
      "buttons": [
            'excel',
        ] */
    });

  });

</script>

<script>
    $(document).ready(function(){
      $(".preloader").fadeOut();
    })

    function openLoader(){
      $(".preloader").fadeIn();
    }

    function closeLoader(){
      $(".preloader").fadeOut();
    }
</script>

<style>
  .select2-selection {
    height: 40px !important;
  }
  .select2-selection__arrow {
    margin: 5px;
  }
</style>
            
</body>
</html>
