<div class="offcanvas-container is-triggered offcanvas-container-reverse" id="shopping-cart"><span class="offcanvas-close"><i class="fe-icon-x"></i></span>
      <div class="px-4">
        <h6>Your Cart</h6>
        <?php if($this->session->get("portfolio_items")){
        //var_dump($this->session->get('portfolio_items'));
        ?>
        <div class="widget widget-cart pt-2">
            <?php foreach($this->session->get("portfolio_items") as $key => $value){ ?>
            <a class="featured-product" href="#">
                <div class="featured-product-thumb"><img src="<?= $this->url->get('assets/portfolio/' . $value['image']) ?>" alt="Product Image"/></div>

                <div class="featured-product-info">
                  <h5 class="featured-product-title"><?php echo ucwords($value['name']) ?></h5><span class="featured-product-price"><?php echo $value['quantity']; ?> x &#8358;<?php echo $value['price'] ?></span>
                </div>
                <span class="remove-product"><i class="fe-icon-x"></i></span>
            </a>
            <?php } ?>
        </div>
        <?php
        }
        else{
            echo "Empty Portfolio Item";
        }
        if($this->session->get("cart_item")){
        ?>
        <div class="widget widget-cart pt-2">
            <?php foreach($this->session->get("cart_item") as $key => $value){ ?>
            <a class="featured-product" href="#">
                <div class="featured-product-thumb"><img src="<?= $this->url->get('assets/accessories/' . $value['image']) ?>" alt="Product Image"/></div>

                <div class="featured-product-info">
                  <h5 class="featured-product-title"><?php echo ucwords($value['name']) ?></h5><span class="featured-product-price"><?php echo $value['quantity']; ?> x &#8358;<?php echo $value['price'] ?></span>
                </div>
                <span class="remove-product"><i class="fe-icon-x"></i></span>
            </a>
            <?php } ?>

        </div>
        <?php
        }
        else{
            echo "Empty Accessories";
            //var_dump($this->session->get('portfolio_items'));
        }
        if($this->session->has("cart_item") || $this->session->has("portfolio_items")){
        $total  = $this->session->get('totalPortfolio') + $this->session->get('totalCartItem');
        ?>
            <hr class="mt-3 mb-3"><span class="text-sm text-muted">Subtotal:&nbsp;</span><strong>&#8358;<?php echo number_format($total, 2); ?></strong>
            <div class="d-flex justify-content-between pt-3"><a class="btn btn-primary btn-block btn-sm mr-2" href="<?= $this->url->get('cart/load') ?>">View Cart</a><a class="btn btn-accent btn-block mt-0 btn-sm" href="<?= $this->url->get('cart/checkout') ?>">Checkout</a></div>
        <?php
        }
        ?>
      </div>
    </div>

    <!-- Navbar: Default-->
    <!-- Remove "navbar-sticky" class to make navigation bar scrollable with the page.-->
    <header class="navbar-wrapper navbar-sticky">
      <div class="d-table-cell align-middle pr-md-3"><a class="navbar-brand mr-1" href="#"><img src="<?= $this->url->get('assets/images/xtreme-logo-dark.png') ?>" alt="Xtremecardz"/></a></div>
      <div class="d-table-cell w-100 align-middle pl-md-3">
        <div class="navbar-top d-none d-lg-flex justify-content-between align-items-center">
          <div><a class="navbar-link mr-3" href="tel:+1212477690000"><i class="fe-icon-phone"></i>+1 (212) 477 690 000</a><a class="navbar-link mr-3" href="mailto:support@example.com"><i class="fe-icon-mail"></i>support@example.com</a><a class="social-btn sb-style-3 sb-twitter" href="#"><i class="socicon-twitter"></i></a><a class="social-btn sb-style-3 sb-facebook" href="#"><i class="socicon-facebook"></i></a><a class="social-btn sb-style-3 sb-pinterest" href="#"><i class="socicon-pinterest"></i></a><a class="social-btn sb-style-3 sb-instagram" href="#"><i class="socicon-instagram"></i></a></div>

        </div>
        <div class="navbar justify-content-end justify-content-lg-between">
          <!-- Search-->
          <form class="search-box" method="get">
            <input type="text" id="site-search" placeholder="Type A or C to see suggestions"><span class="search-close"><i class="fe-icon-x"></i></span>
          </form>
          <!-- Main Menu-->
          <ul class="navbar-nav d-none d-lg-block">
            <!-- Home-->
            <li class="nav-item"><a class="nav-link" href="<?= $this->url->get('') ?>">Home</a></li>
            <!-- Home -->

            <!-- Portfolio-->

              <li class="nav-item mega-dropdown-toggle"><a class="nav-link" href="#">Products</a>
                <div class="dropdown-menu mega-dropdown">
                  <div class="d-flex">
                    <div class="column">
                      <div class="widget widget-custom-menu">
                        <h4 class="widget-title"><b>Products</b></h4>
                        <ul>

                  <?php foreach ($products as $keys => $values) { ?>

                          <li><a href="<?= $this->url->get('portfolio/?tag=' . $values['category_id'] . '&layer=' . $values['description'] . '&gr=' . $values['name']) ?>"><?= ucwords($values['name']) ?></a></li>

                   <?php } ?>

                        </ul>
                      </div>
                    </div>
                    <div class="column p-0 mr-0 ml-3" style="width: 320px;"><a class="d-block" href="shop-single.html"><img src="<?= $this->url->get('assets/img/shop/mega-menu.jpg') ?>" alt="Samsung Galaxy S9"/></a></div>
                  </div>
                </div>
              </li>
            <!-- Portfolio-->

            <!-- Components-->
            <li class="nav-item"><a class="nav-link" href="<?= $this->url->get('accessories') ?>">Accessories</a></li>
            <li class="nav-item"><a class="nav-link" href="#">Contact Us</a></li>
            <li class="nav-item"><a class="nav-link" href="#">Our Story</a></li>
          </ul>
          <div>
            <ul class="navbar-buttons d-inline-block align-middle mr-lg-2">
              <li class="d-block d-lg-none"><a href="#mobile-menu" data-toggle="offcanvas"><i class="fe-icon-menu"></i></a></li>
              <!-- <li><a href="#" data-toggle="search"><i class="fe-icon-search"></i></a></li> -->
              <li><a href="#shopping-cart" data-toggle="offcanvas"><i class="fe-icon-shopping-cart"></i></a><span class="badge badge-danger">0</span></li>
            </ul>
            <!--<a class="btn btn-gradient ml-3 d-none d-xl-inline-block" href="#" target="_blank">Login</a>-->
          </div>
        </div>
      </div>
    </header>
    <!-- Page Content-->