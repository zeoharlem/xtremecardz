<div class="shop-control-bar-bottom">
        <p class="woocommerce-result-count"><?php $start = ($limit * ($page->current - 1)) + 1; ?>
                                                            <?php $end = ($limit * ($page->current - 1)) + $limit; ?>
                                                            <?php if ($end > $page->total_items) { ?>
                                                              <?php $end = $page->total_items; ?>
                                                            <?php } ?>

                                                            <?php if ($limit) { ?>
                                                              Showing <?= $start ?> - <?= $end ?> of <?= $page->total_items ?>
                                                            <?php } ?> results</p>
        <div class="pt-2">
            <!-- Pagination-->
            <nav class="pagination"><a class="prev-btn" href="#"><i class="fe-icon-chevron-left"></i>Prev</a>
              <ul class="pages">
                <li class="d-block d-sm-none w-100">2 / 18</li>
                <li class="d-none d-sm-inline-block"><a href="#">1</a></li>
                <li class="d-none d-sm-inline-block active"><a href="#">2</a></li>
                <li class="d-none d-sm-inline-block"><a href="#">3</a></li>
                <li class="d-none d-sm-inline-block"><a href="#">4</a></li>
                <li class="d-none d-sm-inline-block"><a href="#">5</a></li>
                <li class="d-none d-sm-inline-block">...</li>
                <li class="d-none d-sm-inline-block"><a href="#">18</a></li>
              </ul><a class="next-btn" href="#">Next<i class="fe-icon-chevron-right"></i></a>
            </nav>
          </div>
    </div>
