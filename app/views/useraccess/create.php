<!-- <script type="text/javascript">
    $(document).ready(function(){

      $('#menu').change(function(){ 
        var id=document.getElementById("useraccess").menu.value;
        $.ajax({
          url : "<?= site_url('submenu/show_bymenuid' );?>",
          method : "POST",
          data : {id: id},
          async : true,
          dataType : 'json',
          success: function(data){

            var html = '';
            var i;
            for(i=0; i<data.length; i++){
              html += '<option value='+data[i].id+'>'+data[i].title+'</option>';
            }
            $('#submenu').html(html);

          }
        });
        return false;
      });            
    });
</script> -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Halaman User Akses</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title"><?= $data['title']; ?></h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form id="useraccess" role="form" action="<?= base_url; ?>/useraccess/simpanUserAccess" method="POST" enctype="multipart/form-data">
                <div class="card-body">
                    <div class="form-group">
                        <label >User</label>
                        <select class="form-control input-sm" name="user">
                            <option value="">--</option>
                            <?php foreach($data['user'] as $row) : ?>
                                <option value="<?= $row['id'];?>"><?= $row['username'] ;?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label >Menu</label>
                        <select class="form-control input-sm" name="menu" id="menu">
                            <option value="">--</option>
                            <?php foreach($data['menu'] as $row) : ?>
                                <option value="<?= $row['menu_id'];?>"><?= $row['menu'] ;?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label >Sub Menu</label>
                        <select multiple="multiple" id="submenu" class="form-control search-select" name="submenu[]">
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                  <a class="btn btn-secondary" href="<?= base_url; ?>/useraccess" >Cancel</a>
                </div>
            </form>
        </div>


    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->