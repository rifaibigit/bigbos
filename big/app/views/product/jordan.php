<div class="py-5">
    <div class="container">
        <center><h6 class="section-title h2"><b>JORDAN PRODUCTS</b></h6></center>
        <br>
		<div class="row">
			<div class="col-sm-12" width="100%">
				<nav>
					<div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                    <?php ?>
                    <?php foreach($data['item_group'] as $row): ?>
                        <a class="nav-item nav-link <?php if($row['id']== '6'){echo('active');}; ?> " id="nav-<?= $row['id']; ?>-tab" data-toggle="tab" href="#nav-<?= $row['id']; ?>" role="tab" aria-controls="nav-<?= $row['id']; ?>" aria-selected="true"><b><?= $row['item_group']; ?></b></a>
                    <?php endforeach;?>
					</div>
				</nav>
				<div class="tab-content" id="nav-tabContent" style="margin-top:50px;">
                <?php foreach($data['item_group'] as $row): ?>
                    <div class="tab-pane fade<?php if($row['id']== '6'){echo(' show active');}; ?>" id="nav-<?= $row['id']; ?>" role="tabpanel" aria-labelledby="nav-<?= $row['id']; ?>-tab">
                        <div class="row" >
                        <?php foreach($data['sku'] as $row2): ?>
                        <?php if($row['item_group']==$row2['item_group']){ ;?>
                            <div class="col-sm-3 wow fadeInLeft">
                                <div class="card-box" style="margin-left:10px;margin-right:10px;margin-top:10px;margin-bottom:10px;padding-top:10px;padding-bottom:10px;width:250px;height:270px;">
                                    <div class="card-body-flex" style="height:200px;">
                                        <a href="<?= base_url; ?>/Product/Detail_Jordan/<?= $row2['id']; ?>">
                                        <center><img src="<?= base_url; ?>/dist/img/fmcg/upload/<?= $row2['img']; ?>" style="height:200px;margin-bottom:10px;" alt=""></center>
                                    </div>
                                    <div class="card-footer-flex" style="margin-top: 10px;background-color:white;height:30px;">
                                        <center><h5><span class="badge badge-dark shadow" style="padding:10px;"><?= $row2['item_name']; ?></span></h5></center>
                                    </div>
                                    </a>
                                    
                                </div>
                            </div>
                        <?php } ;?>
                        <?php endforeach;?>    
                        </div>
                    </div>
                <?php endforeach;?>
				</div>
			</div>
		</div>
    </div>
</div>

<style>
  .card-box {
    display: inline-block;
    width: 100%;
    border: 0px solid #e6e6e6;
    border-bottom: 0px solid #b9babc;
    border-top-left-radius: 2px;
    border-top-right-radius: 2px;
    padding: 27px 30px 26px 30px;
    line-height: 1.3;
    transition: all 100ms ease-out;
  }
  .card-box:hover {
    box-shadow: 0px 0px 30px rgba(73, 78, 92, 0.15);
    transform: translateY(-10px);
    -webkit-transform: translateY(-10px);
    -moz-transform: translateY(-10px);
  }
  
</style>

