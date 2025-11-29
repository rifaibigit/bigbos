<div class="py-5">
    <div class="container">
      <div class="row hidden-md-up">
        <div class="col-sm-6 wow fadeInLeft">
          <div class="card" style="padding-top:50px;padding-bottom:50px;margin:0 auto;">
            <div class="card-body-flex" style="max-height:75%;max-width:75%;margin:0 auto;">
              <center><img src="<?= base_url; ?>/dist/img/fmcg/upload/<?= $data['sku']['img'];?>" style="max-height:75%;max-width:75%;"></center>
            </div>
          </div>
        </div>
        <div class="col-sm-6 wow fadeInRight">
            <div class="card-flex" style="padding-top:0px;padding-bottom:50px;padding-left:25px;padding-right:25px;">
                <div class="card-block">
                    <h2><span class="badge badge-dark shadow"><b><?= $data['sku']['item_name']; ?></b></span></h2>
                    <?= $data['sku']['item_desc_en']?>
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>