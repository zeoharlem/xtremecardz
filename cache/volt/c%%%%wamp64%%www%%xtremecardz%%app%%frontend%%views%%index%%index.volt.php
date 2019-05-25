
<?= $this->partial('partials/slider') ?>

<!-- YouTube CTA-->
<section class="bg-secondary py-5">
  <div class="container-fluid">
    <div class="row justify-content-center align-items-center">
      <div class="col-xl-6 col-md-7"><img class="d-block" src="<?= $this->url->get('assets/img/homepages/corporate-blog/youtube-channel.jpg') ?>" alt="YouTube Channel"></div>
      <div class="col-xl-4 col-md-5 text-center text-md-left"><a class="video-player-button my-3 mr-3" href="#"><i class="fe-icon-play"></i></a><span class="video-player-label text-muted">Click me to go to channel!</span>
        <h2 class="h3 mt-2">Introducing Xtremecardz</h2>
        <p class="text-muted d-none d-lg-block">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
      </div>
    </div>
  </div>
</section>

<!-- Portfolio-->
<section class="container py-5 mb-3">
  <h2 class="h3 block-title text-center mt-3">Latest works<small>Hand-picked collection of Xtremecardz</small></h2>
  <div class="row pt-4">
  <?php foreach ($stackImageRow as $keyPortfolio => $valuePortfolio) { ?>
      <?php foreach ($valuePortfolio as $keyInPortfolio => $valueInPortfolio) { ?>
        <!-- Portfolio Item-->
        <div class="col-md-4 col-sm-6 mb-30 pb-2">
          <div class="card portfolio-card"><a class="portfolio-thumb" href="<?= $this->url->get('portfolio/detail?item_id=' . $valueInPortfolio['item_id'] . '&category_id=' . $valueInPortfolio['category_id'] . '&layout=' . $valueInPortfolio['description'] . '&f=' . $valueInPortfolio['filename']) ?>"><img src="<?= $this->url->get('assets/portfolio/' . $valueInPortfolio['filename']) ?>" alt="Portfolio Thumbnail"/></a>
            <div class="card-body">
              <div class="portfolio-meta"><span><i class="fe-icon-user"></i><?= ucwords($keyInPortfolio) ?></span></div>
              <h5 class="portfolio-title"><a href="<?= $this->url->get('portfolio/detail?item_id=' . $valueInPortfolio['item_id'] . '&category_id=' . $valueInPortfolio['category_id'] . '&layout=' . $valueInPortfolio['description'] . '&f=' . $valueInPortfolio['filename']) ?>"><?= ucwords($valueInPortfolio['title']) ?></a></h5>
            </div>
            <div class="card-footer">
              <div><a class="tag-link" href="#">XtremeCardz</a></div>
              <div class="portfolio-meta"><a href="#"><i class="fe-icon-heart text-accent"></i>12</a></div>
            </div>
          </div>
        </div>
      <?php } ?>
  <?php } ?>

  </div>
  <div class="text-center pt-2"><a class="btn btn-style-4 btn-primary" href="<?= $this->url->get('portfolio/') ?>">View all works</a></div>
</section>

