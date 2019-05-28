<!-- Page Content-->
    <div class="container pb-5 mb-3">
      <!-- Shop Toolbar-->
      <div class="d-flex justify-content-between pb-2">

      </div>
      <!-- Shop Grid-->
      <div class="row">
        {% for keys,values in pager.getPaginate().items %}
        <!-- Product-->
        <div class="col-lg-3 col-md-4 col-sm-6 mb-30">
          <div class="product-card mx-auto mb-3">
            <div class="product-head text-right">
              <div class="rating-stars">
              </div>
            </div><a class="product-thumb" href="javascript:void(0);"><img src="{{url('assets/accessories/'~values.front_image)}}" alt="Product Thumbnail"/></a>
            <div class="product-card-body"><a class="product-meta" href="shop-categories.html">Accessories</a>
              <h5 class="product-title"><a href="#">{{values.title | capitalize}}</a></h5><span class="product-price">&#8358;<?php echo number_format($values->price, 2); ?> <b>({{values.quantity}})</b></span>
            </div>
            <div class="product-buttons-wrap">
              <div class="product-buttons">
                <div class="product-button"><a href="#" data-toast data-toast-position="topRight" data-toast-type="info" data-toast-icon="fe-icon-help-circle" data-toast-title="Product" data-toast-message="added to your wishlist!"><i class="fe-icon-heart"></i></a></div>
                <div class="product-button addToCartBtn" data-value="{{values.accessories_id}}"><a href="#"><i class="fe-icon-shopping-cart"></i></a></div>
              </div>
            </div>
          </div>
        </div>
        {% endfor %}
      </div>
      {{ partial('partials/pagination2', [
          'page': pager.getPaginate(),
          'limit': pager.getLimit()
          ])
      }}
    </div>
