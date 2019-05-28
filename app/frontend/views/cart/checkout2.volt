<!-- Page Content-->
    <div class="container pb-4 mb-2">
      <div class="row">
        <!-- Checkout: Address-->
        <div class="col-xl-9 col-lg-8 pb-5">

            <!-- Bordered Tabs Style 4 -->
            <ul class="nav nav-tabs nav-tabs-style-4 nav-tabs-bordered" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" href="#home2" data-toggle="tab" role="tab">
                  <i class="fe-icon-home"></i>
                  &nbsp;Billing Address
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#profile2" data-toggle="tab" role="tab">
                  <i class="fe-icon-user"></i>
                  &nbsp;Payment
                </a>
              </li>

            </ul>
            <div class="tab-content border">
              <div class="tab-pane fade show active" id="home2" role="tabpanel">
                <p class="text-muted">
                    <h3 class="h5 pb-2">Billing Address</h3>
                    <form method="POST">
                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label class="text-muted" for="checkout-fn">First Name</label>
                        <input class="form-control" name="firstname" required type="text" id="checkout-fn">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label class="text-muted" for="checkout-ln">Last Name</label>
                        <input class="form-control" type="text"  name="lastname" required>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label class="text-muted" for="checkout-email">E-mail Address</label>
                        <input class="form-control" name="email" required type="email" id="checkout-email">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label class="text-muted" for="checkout-phone">Phone Number</label>
                        <input class="form-control" type="text" name="phonenumber" required id="checkout-phone">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label class="text-muted" for="checkout-company">Company</label>
                        <input class="form-control" type="text"  name="company" id="checkout-company">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label class="text-muted" for="checkout-country">Country</label>
                        <select class="form-control" id="checkout-country" name="country" required>
                          <option>Choose country</option>

                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label class="text-muted" for="checkout-city">City</label>
                        <input class="form-control" type="text" id="checkout-city" name="city" required>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label class="text-muted" for="checkout-zip">ZIP Code</label>
                        <input class="form-control" type="text" id="checkout-zip" name="zipcode" required>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="form-group">
                        <label class="text-muted" for="checkout-address-1">Address</label>
                        <input class="form-control" type="text" id="checkout-address-1" name="address" required>
                      </div>
                    </div>

                  </div>
                  <div class="custom-control custom-checkbox">
                    <input class="custom-control-input" type="checkbox" checked id="same-login">
                    <label class="custom-control-label" for="same-login">Accepted Terms &amp; Conditions</label>
                    <button class="btn btn-primary mt-0 ml-2" type="submit">Submit</button>
                  </div>
                </form>
                </p>
              </div>
              <div class="tab-pane fade" id="profile2" role="tabpanel">
                <p class="text-muted">
                    <h3 class="h5 pb-3">Choose Payment Method</h3>
                      <div class="accordion accordion-style-2" id="accordion" role="tablist">
                        <div class="card">
                          <div class="card-header" role="tab">
                            <h6><a class="pl-0" href="#card" data-toggle="collapse"><i class="fe-icon-credit-card"></i>Pay with Credit Card</a></h6>
                          </div>
                          <div class="collapse show" id="card" data-parent="#accordion" role="tabpanel">
                            <div class="card-body px-0">
                              <p>We accept following credit cards:&nbsp;&nbsp;<img class="d-inline-block align-middle" src="{{ url('assets/img/credit-cards.png') }}" style="width: 120px;" alt="Cerdit Cards"></p>
                              <div class="card-wrapper"></div>
                              <form class="interactive-credit-card row">
                                <!--<div class="form-group col-sm-6">
                                  <input class="form-control" type="text" name="number" placeholder="Card Number" required>
                                </div>
                                <div class="form-group col-sm-6">
                                  <input class="form-control" type="text" name="name" placeholder="Full Name" required>
                                </div>
                                <div class="form-group col-sm-3">
                                  <input class="form-control" type="text" name="expiry" placeholder="MM/YY" required>
                                </div>
                                <div class="form-group col-sm-3">
                                  <input class="form-control" type="text" name="cvc" placeholder="CVC" required>
                                </div>-->
                                <div class="col-sm-6">
                                  <script src="https://js.paystack.co/v1/inline.js"></script>
                                  <button class="btn btn-primary btn-block mt-0" type="button" onclick="payWithPaystack()">Open Paystack</button>
                                </div>
                              </form>
                            </div>
                          </div>
                        </div>
                        <div class="card">
                          <div class="card-header" role="tab">
                            <h6><a class="collapsed pl-0" href="#paypal" data-toggle="collapse"><i class="socicon-paypal"></i>Pay with PayPal</a></h6>
                          </div>
                          <div class="collapse" id="paypal" data-parent="#accordion" role="tabpanel">
                            <div class="card-body px-0">
                              <p><strong>PayPal</strong> - the safer, easier way to pay</p>
                              <form class="row" method="post">
                                <div class="col-sm-6">
                                  <div class="form-group">
                                    <input class="form-control" type="email" placeholder="E-mail" required>
                                  </div>
                                </div>
                                <div class="col-sm-6">
                                  <div class="form-group">
                                    <input class="form-control" type="password" placeholder="Password" required>
                                  </div>
                                </div>
                                <div class="col-12">
                                  <div class="d-flex flex-wrap justify-content-between align-items-center"><a class="navi-link" href="#">Forgot password?</a>
                                    <button class="btn btn-primary btn-sm" type="submit">Log In</button>
                                  </div>
                                </div>
                              </form>
                            </div>
                          </div>
                        </div>

                      </div>
                </p>
              </div>

            </div>
        </div>

        <!-- Sidebar-->
        <aside class="col-xl-3 col-lg-4 pb-4 mb-2">
          <!-- Order Summary-->
          <div class="widget">
            <h4 class="widget-title">Order Summary</h4>
            <div class="d-flex justify-content-between pb-2">
              <div>Cart subtotal:</div>
              <div class="font-weight-medium">&#8358;<?php echo number_format($portfolio_total + $cart_item_total,2,".",","); ?></div>
            </div>
            <div class="d-flex justify-content-between pb-2">
              <div>Shipping:</div>
              <div class="font-weight-medium">&#8358;26.50</div>
            </div>
            <div class="d-flex justify-content-between pb-2">
              <div>Estimated tax:</div>
              <div class="font-weight-medium">&#8358;9.72</div>
            </div>
            <hr>
            <div class="pt-3 text-right text-lg font-weight-medium">&#8358;<?php echo number_format($portfolio_total + $cart_item_total + 36.22,2,".",","); ?></div>
          </div>
        </aside>
      </div>
</div>