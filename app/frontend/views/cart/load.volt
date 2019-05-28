<!-- Page Content-->
    <div class="container pb-5 mb-2">
      <?php
      if($this->session->get("portfolio_items")){
      foreach($this->session->get('portfolio_items') as $keys => $values){
      $getSubtotal[$keys]   = $values['price'] * $values['quantity'];
      ?>
      <!-- Cart Item-->
      <div class="cart-item d-md-flex justify-content-between"><span class="remove-item"><i class="fe-icon-x"></i></span>
        <div class="px-3 my-3">
            <a class="cart-item-product" href="shop-single.html">
                <div class="cart-item-product-thumb"><img src="{{url('assets/portfolio/'~values['image'])}}" alt="Product"></div>
                <div class="cart-item-product-info">
                    <h4 class="cart-item-product-title"><?php echo ucwords($values['name']); ?></h4>
                    <span><strong>Price:</strong> <?php echo ucwords($values['price']); ?></span>
                </div>
            </a>
        </div>
        <div class="px-3 my-3 text-center">
          <div class="cart-item-label">Quantity</div>
          <div class="count-input">
            <input type="text" class="form-control" value="<?php echo($values['quantity']); ?>" />
          </div>
        </div>
        <div class="px-3 my-3 text-center">
          <div class="cart-item-label">Subtotal</div><span class="text-xl font-weight-medium"><?php echo number_format($getSubtotal[$keys], 2); ?></span>
        </div>
      </div>
      <?php
        }
      }
      else{
            echo "Empty Products! <a href=".$this->url->get('portfolio/')."><b>Continue Shopping</b></a>";
        }
       if($this->session->get("cart_item")){
       foreach($this->session->get('cart_item') as $keys => $values){
         $getSubtotalCart[$keys]   = $values['price'] * $values['quantity'];
         ?>
         <!-- Cart Item-->
         <div class="cart-item d-md-flex justify-content-between"><span class="remove-item"><i class="fe-icon-x"></i></span>
           <div class="px-3 my-3">
               <a class="cart-item-product" href="shop-single.html">
                   <div class="cart-item-product-thumb"><img src="{{url('assets/accessories/'~values['image'])}}" alt="Product"></div>
                   <div class="cart-item-product-info">
                       <h4 class="cart-item-product-title"><?php echo ucwords($values['name']); ?></h4>
                       <span><strong>Price:</strong> <?php echo ucwords($values['price']); ?></span>
                   </div>
               </a>
           </div>
           <div class="px-3 my-3 text-center">
             <div class="cart-item-label">Quantity</div>
             <div class="count-input">
               <input type="text" class="form-control" value="<?php echo($values['quantity']); ?>" />
             </div>
           </div>
           <div class="px-3 my-3 text-center">
             <div class="cart-item-label">Subtotal</div><span class="text-xl font-weight-medium"><?php echo number_format($getSubtotalCart[$keys], 2); ?></span>
           </div>
         </div>
         <?php
          }
       }
       else{
            echo "Empty Accessories! <a href=".$this->url->get('accessories/')."><b>Continue Shopping</b></a>";
       }
       ?>

      <!-- Coupon + Subtotal-->
      <div class="d-sm-flex justify-content-between align-items-center text-center text-sm-left">
        <form class="form-inline py-2">

        </form>
        <div class="py-2"><span class="d-inline-block align-middle text-sm text-muted font-weight-medium text-uppercase mr-2">Subtotal:</span><span class="d-inline-block align-middle text-xl font-weight-medium">&#8358;<?php echo number_format($portfolio_total+$cart_item_total,2); ?></span></div>
      </div>
      <!-- Buttons-->
      <hr class="my-2">
      <div class="row pt-3 pb-5 mb-2">
        <div class="col-sm-6 mb-3"><button class="btn btn-secondary btn-block btn-lg" type="button"><i class="fe-icon-refresh-ccw"></i>&nbsp;Update Cart</button></div>
        <div class="col-sm-6 mb-3"><a class="btn btn-primary btn-block btn-lg" href="{{ url('cart/checkout') }}"><i class="fe-icon-credit-card"></i>&nbsp;Checkout</a></div>
      </div>
      <!-- Related Products Carousel-->
      <h3 class="h4 text-center pb-4">You May Also Like Our Accessories</h3>
      <div class="owl-carousel carousel-flush" data-owl-carousel="{ &quot;nav&quot;: false, &quot;dots&quot;: true,&quot;responsive&quot;: {&quot;0&quot;:{&quot;items&quot;:1},&quot;576&quot;:{&quot;items&quot;:2},&quot;768&quot;:{&quot;items&quot;:3},&quot;991&quot;:{&quot;items&quot;:4},&quot;1200&quot;:{&quot;items&quot;:4}} }">
        {% for keys, values in accessories %}
        <!-- Product-->
        <div class="product-card mx-auto mb-5">
          <div class="product-head d-flex justify-content-between align-items-center">

          </div><a class="product-thumb" href="shop-single.html"><img src="{{ url('assets/accessories/'~values.front_image) }}" alt="Product Thumbnail"/></a>
          <div class="product-card-body"><a class="product-meta" href="shop-categories.html">Accessories</a>
            <h5 class="product-title"><a href="#">{{values.title | capitalize}}</a></h5><span class="product-price">&#8358;<?php echo number_format($values->price, 2); ?> <b>({{values.quantity}})</b></span>
          </div>
          <div class="product-buttons-wrap">
            <div class="product-buttons">
              <div class="product-button"><a href="#" data-toast data-toast-position="topRight" data-toast-type="info"><i class="fe-icon-heart"></i></a></div>
              <div class="product-button"><a href="#" class="addToCartBtn" data-value="{{values.accessories_id}}"><i class="fe-icon-shopping-cart"></i></a></div>
            </div>
          </div>
        </div>
        {% endfor %}
      </div>
    </div>