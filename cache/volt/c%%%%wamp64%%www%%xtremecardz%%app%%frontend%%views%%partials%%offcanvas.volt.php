<!-- Off-Canvas Menu-->
    <div class="offcanvas-container is-triggered offcanvas-container-reverse" id="mobile-menu"><span class="offcanvas-close"><i class="fe-icon-x"></i></span>
      <div class="px-4 pb-4">
        <h6>Menu</h6>
        <div class="d-flex justify-content-between pt-2">

          <a class="btn btn-primary btn-sm btn-block" href="#"><i class="fe-icon-user"></i>&nbsp;Login</a>
        </div>
      </div>
      <div class="offcanvas-scrollable-area border-top" style="height:calc(100% - 235px); top: 144px;">
        <!-- Mobile Menu-->
        <div class="accordion mobile-menu" id="accordion-menu">
          <div class="card">
            <div class="card-header"><a class="mobile-menu-link" href="<?= $this->url->get('index') ?>">Home</a></div>
          </div>
          <!-- Home-->
          <div class="card">
            <div class="card-header"><a class="mobile-menu-link active" href="#">Products</a><a class="collapsed" href="#home-submenu" data-toggle="collapse"></a></div>
            <div class="collapse" id="home-submenu" data-parent="#accordion-menu">
              <div class="card-body">
                <ul>
                  <?php foreach ($products as $keys => $values) { ?>

                        <li class="dropdown-item"><a href="<?= $this->url->get('portfolio/?tag=' . $values['category_id'] . '&layer=' . $values['description'] . '&gr=' . $values['name']) ?>"><?= ucwords($values['name']) ?></a></li>

                 <?php } ?>

                </ul>
              </div>
            </div>
          </div>

          <div class="card">
              <div class="card-header"><a class="mobile-menu-link" href="<?= $this->url->get('accessories') ?>">Accessories</a></div>
           </div>

           <div class="card">
            <div class="card-header"><a class="mobile-menu-link" href="<?= $this->url->get('contact') ?>">Contact</a></div>
          </div>

          <div class="card">
            <div class="card-header"><a class="mobile-menu-link" href="<?= $this->url->get('aboutus') ?>">Our Story</a></div>
          </div>
          
        </div>
      </div>
      <div class="offcanvas-footer px-4 pt-3 pb-2 text-center"><a class="social-btn sb-style-3 sb-twitter" href="#"><i class="socicon-twitter"></i></a><a class="social-btn sb-style-3 sb-facebook" href="#"><i class="socicon-facebook"></i></a><a class="social-btn sb-style-3 sb-pinterest" href="#"><i class="socicon-pinterest"></i></a><a class="social-btn sb-style-3 sb-instagram" href="#"><i class="socicon-instagram"></i></a></div>
    </div>
    <!-- Off-Canvas Shopping Cart-->