<div class="py-5">
    <div class="container">
      <div class="row hidden-md-up">
        <div class="col-sm-6 wow fadeInLeft">
          <div class="card" style="padding-top:50px;padding-bottom:50px;margin:0 auto;">
            <div class="card-body-flex" style="max-height:75%;max-width:75%;margin:0 auto;">
              <center><img src="<?= base_url; ?>/dist/img/freezer n chiller/upload/<?= $data['sku']['img'] ?>" class="center" style="max-height:75%;max-width:75%;"></center>
            </div>
          </div>
        </div>
        <div class="col-sm-6 wow fadeInRight">
            <!-- <div>
                <?= $data['sku']['item_desc_en']?>
            </div> -->
            <div class="card-flex" style="padding-top:0px;padding-bottom:50px;padding-left:25px;padding-right:25px;">
                <div class="card-block">
                    <h1><span class="badge badge-dark shadow"><b><?= $data['sku']['item_name']; ?></b></span></h1>
                    <?= $data['sku']['item_desc_en']?>
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>