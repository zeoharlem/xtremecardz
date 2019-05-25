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
            <label for="size" style="font-weight:bold">Size</label>
            <select class="form-control" id="sizer">
              <option value="3.5 x 2">3.5 x 2</option>
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

      <div class="row">
          <div class="col-sm-12">
            <div class="form-group">
              <label for="size" style="font-weight:bold">Metal Cards</label>
              <select class="form-control" id="sizer">
                <option value="3.5 x 2">Stainless Steel Slack Matte</option>
                <option value="3.5 x 2">Stainless Steel Brushed</option>
                <option value="3.5 x 2">Stainless Steel Mirror</option>
                <option value="3.5 x 2">Silver Plated Metal</option>
                <option value="3.5 x 2">Gold Plated Metal</option>
              </select>
            </div>
          </div>
      </div>
      <div class="row">
          <div class="col-sm-12">
            <div class="form-group">
              <label for="size" style="font-weight:bold">Custom Die Cut</label>
              <select class="form-control" id="sizer">
                <option value="yes">Included</option>
                <option value="no">Not Included</option>
              </select>
            </div>
          </div>
      </div>
      <div class="row">
        <div class="col-sm-12">

           <div class="form-group">
                <div class="accordion" id="accordion1">


                  <!-- Card -->
                  <div class="card">
                    <div class="card-header">
                      <h6>
                        <a href="#collapseTwo" data-toggle="collapse">
                          <i class="fe-icon-clock"></i>Laser Engrave
                        </a>
                      </h6>
                    </div>
                    <div class="collapse show" id="collapseTwo" data-parent="#accordion1">
                      <div class="card-body">
                        <div class="opacity-75">
                            <div class="form-group">
                                  <label class="text-muted" for="size" style="font-weight:bold">FORM SIDE</label><br/>
                                  <div class="custom-control custom-radio custom-control-inline">
                                    <input class="custom-control-input" type="radio" id="engrave_front_side" name="engrave_front_side">
                                    <label class="custom-control-label" for="engrave_front_side">1 Color</label>
                                  </div>
                            </div>
                            <div class="form-group">
                                <label class="text-muted" for="size" style="font-weight:bold">BACK SIDE</label><br/>
                              <div class="custom-control custom-radio custom-control-inline">
                                <input class="custom-control-input" type="radio" id="engrave_back_side" name="engrave_back_side" checked>
                                <label class="custom-control-label" for="engrave_back_side">2 Color</label>
                              </div>
                            </div>
                        </div>
                      </div>
                    </div>
                  </div>



                  <!-- Card -->
                  <div class="card">
                    <div class="card-header">
                      <h6>
                        <a class="collapsed" href="#collapseOne" data-toggle="collapse">
                          <i class="fe-icon-volume-2"></i>Spot Color
                        </a>
                      </h6>
                    </div>
                    <div class="collapse" id="collapseOne" data-parent="#accordion1">
                      <div class="card-body">
                        <div class="opacity-75">
                            <div class="form-group">
                                <label for="size" style="font-weight:bold">Spot Color</label><br/>
                                <label class="text-muted" for="size" style="font-weight:bold">FRONT SIDE</label><br/>
                                <div class="custom-control custom-radio custom-control-inline">
                                  <input class="custom-control-input" type="radio" id="front_side" name="front_side">
                                  <label class="custom-control-label" for="front_side">1 Color</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                  <input class="custom-control-input" type="radio" id="front_side" name="front_side" checked>
                                  <label class="custom-control-label" for="ex-radio-5">2 Color</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                  <input class="custom-control-input" type="radio" id="front_side" name="front_side">
                                  <label class="custom-control-label" for="front_side">3 Color</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                  <input class="custom-control-input" type="radio" id="front_side" name="front_side">
                                  <label class="custom-control-label" for="front_side">4 Color</label>
                                </div>
                              </div>
                              <div class="form-group">
                                  <label class="text-muted" for="size" style="font-weight:bold">BACK SIDE</label><br/>
                                  <div class="custom-control custom-radio custom-control-inline">
                                    <input class="custom-control-input" type="radio" id="ex-radio-4" name="back_side">
                                    <label class="custom-control-label" for="ex-radio-4">1 Color</label>
                                  </div>
                                  <div class="custom-control custom-radio custom-control-inline">
                                    <input class="custom-control-input" type="radio" id="ex-radio-5" name="back_side" checked>
                                    <label class="custom-control-label" for="ex-radio-5">2 Color</label>
                                  </div>
                                  <div class="custom-control custom-radio custom-control-inline">
                                    <input class="custom-control-input" type="radio" id="backe_side" name="back_side">
                                    <label class="custom-control-label" for="ex-radio-5">3 Color</label>
                                  </div>
                                  <div class="custom-control custom-radio custom-control-inline">
                                    <input class="custom-control-input" type="radio" id="back_side" name="back_side">
                                    <label class="custom-control-label" for="ex-radio-5">4 Color</label>
                                  </div>
                            </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <!-- Card -->
                  <div class="card">
                    <div class="card-header">
                      <h6>
                        <a class="collapsed" href="#collapseThree" data-toggle="collapse">
                          <i class="fe-icon-mic"></i> Send Notes
                        </a>
                      </h6>
                    </div>
                    <div class="collapse" id="collapseThree" data-parent="#accordion1">
                      <div class="card-body">
                        <div class="opacity-75">

                            <textarea class="form-control" placeholder="Type Additional Description"> </textarea>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
           </div>
        </div>
      </div>

      <div class="row align-items-end pb-4">
        <div class="col-sm-4">
          <div class="form-group mb-0">
            <label for="quantity" style="font-weight:bold">Quantity</label>
            <input type="text" id="numQtyRow" required name="quantity" class="form-control form-control-lg" placeholder="Type Numbers" />
          </div>
        </div>
        <div class="col-sm-8">
          <div class="pt-4 hidden-sm-up"></div>
          <button class="btn btn-primary btn-block m-0 btn-lg" type="button" id="addToCartBtn" data-toast data-toast-type="success" data-toast-position="topRight" data-toast-icon="fe-icon-check-circle" data-toast-title="Product" data-toast-message="successfuly added to cart!"><i class="fe-icon-shopping-cart"></i> Buy Now</button>
        </div>
      </div>
      </form>
