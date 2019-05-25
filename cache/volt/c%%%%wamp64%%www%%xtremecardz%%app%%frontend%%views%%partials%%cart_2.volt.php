<div class="product-meta"><i class="fe-icon-bookmark"></i><a href="#">Drones,</a><a href="#">Action cameras</a></div>
      <h2 class="h3 font-weight-bold"><?= ucwords($first->title) ?></h2>
      <h3 class="h4 font-weight-light">
        &#8358;<span id="tagPrice"><?php echo number_format($first->price, 2); ?></span>
      </h3>
      <p class="text-muted"></p>

      <form method="POST" id="cartFormRow">
      <div class="row mt-4">
        <div class="col-sm-6">
          <div class="form-group">
            <input id="initPriceTag" type="hidden" name="price" value="<?php echo number_format($first->price, 2); ?>"/>
            <input id="realPriceTag" type="hidden" name="real_price" value="<?php echo number_format($first->price, 2); ?>"/>
            <input id="itemId" type="hidden" name="item_id" value="<?php echo $this->request->getQuery('item_id','int'); ?>"/>
            <input id="imageTag" type="hidden" name="image" value="<?php echo $this->request->getQuery('f'); ?>"/>
            <input id="itemTitleTag" type="hidden" name="item_title" value="<?php echo $first->title; ?>"/>
            <label for="size" style="font-weight:bold">Size</label>
            <select class="form-control" id="sizer" name="sizer">
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
              <label for="size" style="font-weight:bold">UV Printing</label>
              <select class="form-control" id="uvPrinting" name="uv_printing">
                <option value="-100">1 Sided UV Printing</option>
                <option value="100">2 Sided UV Printing</option>
              </select>
            </div>
          </div>
      </div>

      <div class="row">
          <div class="col-sm-12">
            <div class="form-group">
              <label for="size" style="font-weight:bold">White Ink</label>
              <select class="form-control" id="whiteInk" name="white_ink">
                <option value="-100">None</option>
                <option value="100">1 side white ink</option>
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
                        <a class="collapsed" href="#collapseOne" data-toggle="collapse">
                          <i class="fe-icon-volume-2"></i>Foil Stamp
                        </a>
                      </h6>
                    </div>
                    <div class="collapse" id="collapseOne" data-parent="#accordion1">
                      <div class="card-body">
                        <div class="opacity-75">
                            <div class="form-group">
                                <label for="size" style="font-weight:bold">Foil Stamp</label><br/>
                                <label class="text-muted" style="font-weight:bold">FRONT SIDE</label><br/>
                                <div class="custom-control custom-radio custom-control-inline">
                                  <input class="custom-control-input" type="radio" id="foil_stamp_front_side_1" name="foil_stamp_front_side">
                                  <label class="custom-control-label" for="foil_stamp_front_side_1">Gold</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                  <input class="custom-control-input" type="radio" id="foil_stamp_front_side_2" name="foil_stamp_front_side" checked>
                                  <label class="custom-control-label" for="foil_stamp_front_side_2">Silver</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                  <input class="custom-control-input" type="radio" id="foil_stamp_front_side_3" name="foil_stamp_front_side">
                                  <label class="custom-control-label" for="foil_stamp_front_side_3">Black</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                  <input class="custom-control-input" type="radio" id="foil_stamp_front_side_4" name="foil_stamp_front_side">
                                  <label class="custom-control-label" for="foil_stamp_front_side_4">Matte Gold</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                  <input class="custom-control-input" type="radio" id="foil_stamp_front_side_5" name="foil_stamp_front_side">
                                  <label class="custom-control-label" for="foil_stamp_front_side_5">Matte Silver</label>
                                </div>
                              </div>
                              <div class="form-group">
                                  <label class="text-muted" for="size" style="font-weight:bold">BACK SIDE</label><br/>
                                  <div class="custom-control custom-radio custom-control-inline">
                                    <input class="custom-control-input" type="radio" id="foil_stamp_back_side" name="foil_stamp_back_side">
                                    <label class="custom-control-label" for="foil_stamp_back_side">Gold</label>
                                  </div>
                                  <div class="custom-control custom-radio custom-control-inline">
                                    <input class="custom-control-input" type="radio" id="foil_stamp_back_side_2" name="foil_stamp_back_side" checked>
                                    <label class="custom-control-label" for="foil_stamp_back_side_2">Silver</label>
                                  </div>
                                  <div class="custom-control custom-radio custom-control-inline">
                                    <input class="custom-control-input" type="radio" id="foil_stamp_back_side_3" name="foil_stamp_back_side">
                                    <label class="custom-control-label" for="foil_stamp_back_side_3">Black</label>
                                  </div>
                                  <div class="custom-control custom-radio custom-control-inline">
                                    <input class="custom-control-input" type="radio" id="foil_stamp_back_side_4" name="foil_stamp_back_side">
                                    <label class="custom-control-label" for="foil_stamp_back_side_4">Matte Gold</label>
                                  </div>
                                  <div class="custom-control custom-radio custom-control-inline">
                                    <input class="custom-control-input" type="radio" id="foil_stamp_back_side_5" name="foil_stamp_back_side">
                                    <label class="custom-control-label" for="foil_stamp_back_side_5">Matte Silver</label>
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
                            <textarea class="form-control" placeholder="Type Additional Description" name="notes"> </textarea>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
           </div>
        </div>
      </div>

      <div class="row align-items-end pb-4">
        <div class="col-sm-12">
          <div class="form-group mb-0">
            <label for="quantity" style="font-weight:bold">Quantity</label>
            <input type="text" id="numQtyRow" required name="quantity" class="form-control form-control-lg" placeholder="Type Numbers" />
          </div>
        </div>
      </div>

      <div class="row align-items-end pb-4">
        <div class="col-sm-12">
          <div class="pt-4 hidden-sm-up"></div>
          <button class="btn btn-primary btn-block m-0 btn-lg" type="button" id="addToCartBtn"><i class="fe-icon-shopping-cart"></i> Buy Now</button>
        </div>
      </div>
      </form>
