    
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 1.0.0
    </div>
    <strong>Copyright &copy;2021 PT. Bintang Inter Global All rights reserved.</strong>
  </footer>

</div>
<!-- ./wrapper -->

<script>
  $(document).ready(function() {
    $(".mdb-select").select2();
  });
</script>

<script>
  $(document).ready(function() {
    $(".mdb-select2").select2();
  });
</script>

<!-- <script>
  $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
    $("select.select2").select2({
        tags: true
    })
  })
</script> -->

<script>
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
</script>

<script>
  var table, save_method;
  $(document).ready(function() {

    $('#user').DataTable({
      "ajax": "<?= base_url; ?>/User/show",
      "fnCreatedRow": function (row, data, index) {
			$('td', row).eq(0).html(index + 1);
			},
      "columns": [
            { "title": "#", "data": "id", "width": "10" },
            { "title": "Nama", "data": "nama"},
            { "title": "User Name", "data": "username" },
            {
              "title": "Action",
              "data": "id",
              "width": "100px",
              "sClass": "text-center",
              "orderable": false,
              "mRender": function (data) {
                return '<a href="<?= base_url; ?>/user/edit/'+ data +'" style="margin-left : 10px;margin-right : 10px;"><i class="fas fa-edit" style="margin-left : 10px;margin-right : 10px;"></i></a> | <a href="<?= base_url; ?>/user/hapus/'+ data +'" onclick="javascript:return confirm(\'Hapus data?\');" style="margin-left : 20px;margin-right : 10px;"><i class="fas fa-trash-alt" style="color:red" style="margin-left : 10px;margin-right : 10px;"></i></a>' ;
                        
               }
            }
      ],
      rowCallback: function ( row, data ) {
            // Set the checked state of the checkbox in the table
            $('input.editor-active', row).prop( 'checked', data.dashboard == 1 );
      },
      "autoWidth": true,
      "responsive": true
    });

    $('#sku').DataTable({
      "ajax": "<?= base_url; ?>/Sku/show",
      "columns": [
            { "title": "#", "data": "id", "width": "10" },
            { "title": "Item Code", "data": "item_code"},
            { "title": "Description", "data": "item_name" },
            { "title": "Unit", "data": "unit" },
            { "title": "Group SKU", "data": "item_group" },
            { "title": "Principal", "data": "principal" },
            {
              "title": "Action",
              "data": "id",
              "width": "100px",
              "sClass": "text-center",
              "orderable": false,
              "mRender": function (data) {
                return '<a href="<?= base_url; ?>/Sku/edit/'+ data +'" style="margin-left : 10px;margin-right : 10px;"><i class="fas fa-edit" style="margin-left : 10px;margin-right : 10px;"></i></a> | <a href="<?= base_url; ?>/Sku/hapus/'+ data +'" onclick="javascript:return confirm(\'Hapus data?\');" style="margin-left : 20px;margin-right : 10px;"><i class="fas fa-trash-alt" style="color:red" style="margin-left : 10px;margin-right : 10px;"></i></a>' ;
                        
               }
            }
      ],
      "autoWidth": true,
      "responsive": true,
      "ordering": true,
    });

    $('#skugroup').DataTable({
      "ajax": "<?= base_url; ?>/SkuGroup/show",
      "columns": [
            { "title": "#", "data": "id", "width": "10" },
            { "title": "Group SKU", "data": "item_group" },
            { "title": "Principal", "data": "principal" },
            {
              "title": "Action",
              "data": "id",
              "width": "100px",
              "sClass": "text-center",
              "orderable": false,
              "mRender": function (data) {
                return '<a href="<?= base_url; ?>/SkuGroup/edit/'+ data +'" style="margin-left : 10px;margin-right : 10px;"><i class="fas fa-edit" style="margin-left : 10px;margin-right : 10px;"></i></a> | <a href="<?= base_url; ?>/SkuGroup/hapus/'+ data +'" onclick="javascript:return confirm(\'Hapus data?\');" style="margin-left : 20px;margin-right : 10px;"><i class="fas fa-trash-alt" style="color:red" style="margin-left : 10px;margin-right : 10px;"></i></a>' ;
                        
               }
            }
      ],
      "autoWidth": true,
      "responsive": true,
      "ordering": true,
    });

    $('#fridge').DataTable({
      "ajax": "<?= base_url; ?>/Fridge/show",
      "columns": [
            { "title": "#", "data": "id", "width": "10" },
            { "title": "Code", "data": "item_code" },
            { "title": "Name", "data": "item_name" },
            { "title": "Description EN", "data": "item_desc_en" },
            { "title": "Description ID", "data": "item_desc_id" },
            { "title": "Picture", "data": "img" },
            { "title": "Type", "data": "item_group" },
            {
              "title": "Action",
              "data": "id",
              "width": "100px",
              "sClass": "text-center",
              "orderable": false,
              "mRender": function (data) {
                return '<a href="<?= base_url; ?>/Fridge/edit/'+ data +'" style="margin-left : 10px;margin-right : 10px;"><i class="fas fa-edit" style="margin-left : 10px;margin-right : 10px;"></i></a> | <a href="<?= base_url; ?>/Fridge/hapus/'+ data +'" onclick="javascript:return confirm(\'Hapus data?\');" style="margin-left : 20px;margin-right : 10px;"><i class="fas fa-trash-alt" style="color:red" style="margin-left : 10px;margin-right : 10px;"></i></a>' ;
                        
               }
            }
      ],
      "scrollY": true,
      "scrollX": true,
      "autoWidth": true,
      "responsive": true,
      "ordering": true,
    });

    $('#skudesc').DataTable({
      "ajax": "<?= base_url; ?>/SkuDesc/show",
      "columns": [
            { "title": "#", "data": "id", "width": "10" },
            { "title": "Code", "data": "item_code" },
            { "title": "Description EN", "data": "item_desc_en" },
            { "title": "Description ID", "data": "item_desc_id" },
            { "title": "Picture", "data": "img" },
            {
              "title": "Action",
              "data": "id",
              "width": "100px",
              "sClass": "text-center",
              "orderable": false,
              "mRender": function (data) {
                return '<a href="<?= base_url; ?>/SkuDesc/edit/'+ data +'" style="margin-left : 10px;margin-right : 10px;"><i class="fas fa-edit" style="margin-left : 10px;margin-right : 10px;"></i></a> | <a href="<?= base_url; ?>/SkuDesc/hapus/'+ data +'" onclick="javascript:return confirm(\'Hapus data?\');" style="margin-left : 20px;margin-right : 10px;"><i class="fas fa-trash-alt" style="color:red" style="margin-left : 10px;margin-right : 10px;"></i></a>' ;
                        
               }
            }
      ],
      "scrollY": true,
      "scrollX": true,
      "autoWidth": true,
      "responsive": true,
      "ordering": true,
    });

  });

  


</script>

<script>
    $(document).ready(function(){
      $(".preloader").fadeOut();
    })
</script>

<style>
  .select2-selection {
    height: 40px !important;
  }
  .select2-selection__arrow {
    margin: 5px;
  }
</style>

<script>
  //tinymce.init({ selector:'#desc', });
</script>

<script>
  CKEDITOR.replace( 'desc_en' );
  CKEDITOR.replace( 'desc_id' );
</script>
            
</body>
</html>
