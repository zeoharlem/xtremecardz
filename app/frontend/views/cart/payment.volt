<!-- Page Content-->
    <div class="container pb-4 mb-2">
      <div class="row">
        <!-- Checkout: Address-->
        <div class="col-xl-9 col-lg-8 pb-5">

            <div class="wizard">
                <div class="wizard-steps d-flex flex-wrap flex-sm-nowrap justify-content-between">
                    <div class="wizard-step">1. Address</div><a class="wizard-step active" href="{{url('cart/payment')}}">2. Payment</a></div>
                        <div class="wizard-body">
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

                        </div>
                        <div class="wizard-footer d-flex justify-content-between"><a class="btn btn-secondary my-2" href="{{url('cart/checkout/')}}"><i class="fe-icon-arrow-left"></i><span class="d-none d-sm-inline-block">Back to Billing Section</span></a></div>
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