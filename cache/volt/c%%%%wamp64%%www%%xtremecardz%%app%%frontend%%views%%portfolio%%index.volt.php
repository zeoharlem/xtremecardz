<!-- Page Content-->
<div class="container pb-5 mb-3">
  <!-- Grid-->
  <div class="isotope-grid filter-grid cols-3">
    <div class="gutter-sizer"></div>
    <div class="grid-sizer"></div>
    <?php foreach ($pager->getPaginate()->items as $keys => $values) { ?>
    <?php
        $getActiveAlbum = $tActive->getActiveAlbumsAct($values->item_id);
        $getActiveImage = $getActiveAlbum[array_rand($getActiveAlbum)];
    ?>
    <!-- Portfolio Item-->
    <div class="grid-item mobile-apps mb-30 pb-2">
      <div class="card portfolio-card"><a class="portfolio-thumb" href="<?= $this->url->get('portfolio/detail?item_id=' . $values->item_id . '&category_id=' . $values->category_id . '&layout=') ?><?php echo uniqid('xLmrR').'&f='.$getActiveImage['filename']; ?>"><img src="<?= $this->url->get('assets/portfolio/' . $getActiveImage['filename']) ?>" alt="Portfolio Thumbnail"/></a>
        <div class="card-body">
          <div class="portfolio-meta"><span><i class="fe-icon-user"></i>Xtremecardz</span></div>
          <h5 class="portfolio-title"><a href="<?= $this->url->get('portfolio/detail?item_id=' . $values->item_id . '&category_id=' . $values->category_id . '&layout=') ?><?php echo uniqid('xLmrR').'&f='.$getActiveImage['filename']; ?>"><?= ucwords($values->title) ?></a></h5>
        </div>
        <div class="card-footer">
          <div><a class="tag-link" href="#"><?= ucwords($values->getCategories()->name) ?></a></div>
          <div class="portfolio-meta"><a href="#"><i class="fe-icon-heart text-accent"></i>0</a></div>
        </div>
      </div>
    </div>
  <?php } ?>
  </div>

    <?= $this->partial('partials/pagination2', ['page' => $pager->getPaginate(), 'limit' => $pager->getLimit()]) ?>

</div>