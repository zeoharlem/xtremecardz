<div class="product-meta"><i class="fe-icon-bookmark"></i><a href="#">Drones,</a><a href="#">Action cameras</a></div>
      <h2 class="h3 font-weight-bold">{{first.title|capitalize}}</h2>
      <h3 class="h4 font-weight-light">
        &#8358;<span id="tagPrice"><?php echo number_format($first->price, 2); ?></span>
      </h3>
      <p class="text-muted"></p>

      <form method="POST">
      <div class="row mt-4">
        <div class="col-sm-6">
          <div class="form-group">
            <input id="initPriceTag" type="hidden" name="price" value="<?php echo number_format($first->price, 2); ?>"/>
            <label for="size" style="font-weight:bold">Choose color</label>
            <select class="form-control" id="size">
              <option value="white/gray/black">White/Gray/Black</option>
              <option value="black">Black</option>
              <option value="black/white/red">Black/White/Red</option>
            </select>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="form-group">
            <label for="color" style="font-weight:bold"><b>Thickness</b></label>
            <select class="form-control" id="color" name="thickness">
              <option value="30">30pt</option>
            </select>
          </div>
        </div>
      </div>
      <div class="row align-items-end pb-4">
        <div class="col-sm-4">
          <div class="form-group mb-0">
            <label for="quantity" style="font-weight:bold">Quantity</label>
            <input type="text" id="numQtyRow" required name="quantity" class="form-control" placeholder="Type Numbers" />
          </div>
        </div>
        <div class="col-sm-8">
          <div class="pt-4 hidden-sm-up"></div>
          <button class="btn btn-primary btn-block m-0" type="button" id="addToCartBtn" data-toast data-toast-type="success" data-toast-position="topRight" data-toast-icon="fe-icon-check-circle" data-toast-title="Product" data-toast-message="successfuly added to cart!"><i class="fe-icon-shopping-cart"></i> Buy Now</button>
        </div>
      </div>
      </form>
