<!-- Page Content-->
<div class="container mb-2">
  <div class="row">
    <!-- Product Gallery-->
    <div class="col-md-6 pb-5">
      <div class="product-gallery">

        <div class="row">
            <div class="col-sm-12">
              <a class="gallery-item mb-30" href="<?= $this->url->get('assets/portfolio/' . $mainImg) ?>" data-fancybox="sideGallery" data-options="{&quot;caption&quot;: &quot; Image + Design Copyrighted by @2019 Xtremecardz &quot;}"><img src="<?= $this->url->get('assets/portfolio/' . $mainImg) ?>" alt="Gallery Image"/></a>
            </div>
            <?php foreach ($active_img as $keyBag => $valueBag) { ?>
                <div class="col-sm-6">
                  <a class="gallery-item mb-30" href="<?= $this->url->get('assets/portfolio/' . $valueBag['filename']) ?>" data-fancybox="sideGallery" data-options="{&quot;caption&quot;: &quot; Image + Design Copyrighted by @2019 Xtremecardz &quot;}"><img src="<?= $this->url->get('assets/portfolio/' . $valueBag['filename']) ?>" alt="Gallery Image"/></a>
                </div>
            <?php } ?>
        </div>

      </div>
    </div>
    <!-- Product Info-->
    <div class="col-md-6 pb-5">
      <?php
      if($first->category_id == 1){
      ?>
        <?= $this->partial('partials/cart') ?>
      <?php
      }
      elseif($first->category_id == 2){
      ?>
        <?= $this->partial('partials/cart_1') ?>
      <?php
      }
      elseif($first->category_id == 3){
      ?>
        <?= $this->partial('partials/cart_2') ?>
      <?php
      }
      elseif($first->category_id == 4){
      ?>
        <?= $this->partial('partials/cart_3') ?>
      <?php
      }
      ?>
      <hr class="mb-2">
      <div class="d-flex flex-wrap justify-content-between align-items-center">
        <h3 class="h6 mt-4">Get Design Service</h3>
        <p class="mb-4 pb-2">
            We also offer professional design services, if you like to have our designer design + prepare print file for you,
            please choose a design service in the following page after click on NEXT STEP below. You can learn more about our design services <b><a href>Here</a></b>
        </p>
      </div>
    </div>
  </div>
</div>