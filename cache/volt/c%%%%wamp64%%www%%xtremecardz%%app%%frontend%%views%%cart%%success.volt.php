<!-- Page Content-->
    <div class="container pb-5 mb-3">
      <!-- Checkout: Complete-->
      <div class="wizard pb-3">
        <div class="wizard-body pt-2 text-center">
          <h3 class="h4 pb-3">Thank you for your order!</h3>
          <p class="mb-2">Your order has been placed and will be processed as soon as possible.</p>
          <p class="mb-2">Make sure you make note of your order number, which is <strong><?= Phalcon\Text::upper($reference) ?>.</strong></p>
          <p>You will be receiving an email shortly with confirmation of your order. <u>You can now:</u></p><a class="btn btn-secondary mt-3 mr-3" href="<?= $this->url->get('portfolio/') ?>">Go Back  Shopping</a>
        </div>
      </div>
    </div>