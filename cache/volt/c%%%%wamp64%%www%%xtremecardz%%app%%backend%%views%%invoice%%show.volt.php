<!DOCTYPE html>
<html lang="en-US" dir="ltr">


<!-- Mirrored from prium.github.io/falcon/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 02 May 2019 11:37:29 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- ===============================================-->
    <!--    Document Title-->
    <!-- ===============================================-->
    <title>Falcon | Dashboard &amp; WebApp Template</title>

    <link rel="apple-touch-icon" sizes="180x180" href="<?= $this->url->get('assets/extra/img/favicons/apple-touch-icon.png') ?>">
    <link rel="icon" type="image/png" sizes="32x32" href="<?= $this->url->get('assets/extra/img/favicons/favicon-32x32.png') ?>">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= $this->url->get('assets/extra/img/favicons/favicon-16x16.png') ?>">
    <link rel="shortcut icon" type="image/x-icon" href="<?= $this->url->get('assets/extra/img/favicons/favicon.ico') ?>">
    <link rel="manifest" href="<?= $this->url->get('assets/extra/img/favicons/manifest.json') ?>">
    <meta name="msapplication-TileImage" content="<?= $this->url->get('assets/extra/img/favicons/mstile-150x150.png') ?>">
    <meta name="theme-color" content="#ffffff">

    <!-- ===============================================-->
    <!--    Stylesheets-->
    <!-- ===============================================-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,500,600,700%7cPoppins:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link href="<?= $this->url->get('assets/extra/css/theme.css') ?>" rel="stylesheet">
    <?= $this->assets->outputCss('headers') ?>
  </head>

  <body>
    <!-- ===============================================-->
    <!--    Main Content-->
    <!-- ===============================================-->
    <main class="main" id="top">

      <div class="container">
        <?= $this->partial('partials/sidebar') ?>
        <div class="content">
        <?= $this->partial('partials/header') ?>
        

<div class="card mb-3">
    <div class="card-body">
      <div class="row justify-content-between align-items-center">
        <div class="col-md">
          <h5 class="mb-2 mb-md-0">Order #AD20294</h5>
        </div>
        <div class="col-auto"><button class="btn btn-falcon-default btn-sm mr-2 mb-2 mb-sm-0" type="button"><span class="fas fa-arrow-down mr-1"> </span>Download (.pdf)</button><button class="btn btn-falcon-default btn-sm mr-2 mb-2 mb-sm-0" type="button"><span class="fas fa-print mr-1"> </span>Print</button><button class="btn btn-falcon-success btn-sm mb-2 mb-sm-0" type="button"><span class="fas fa-dollar-sign mr-1"></span>Receive Payment</button></div>
      </div>
    </div>
</div>

<div class="card mb-3">
    <div class="card-body">
      <div class="row align-items-center text-center mb-3">
        <div class="col-sm-6 text-sm-left"><img src="../assets/img/logos/logo-invoice.png" alt="invoice" width="150"></div>
        <div class="col text-sm-right mt-3 mt-sm-0">
          <h2 class="mb-3">Invoice</h2>
          <h5>Falcon Design Studio</h5>
          <p class="fs--1 mb-0">156 University Ave, Toronto<br>On, Canada, M5H 2H7</p>
        </div>
        <div class="col-12">
          <hr>
        </div>
      </div>
      <div class="row justify-content-between align-items-center">
        <div class="col">
          <h6 class="text-500">Invoice to</h6>
          <h5>Antonio Banderas</h5>
          <p class="fs--1">1954 Bloor Street West<br>Torronto ON, M6P 3K9<br>Canada</p>
          <p class="fs--1"><a href="mailto:example@gmail.com">example@gmail.com</a><br><a href="tel:444466667777">+4444-6666-7777</a></p>
        </div>
        <div class="col-sm-auto ml-auto">
          <div class="table-responsive">
            <table class="table table-sm table-borderless fs--1">
              <tbody>
                <tr>
                  <th class="text-sm-right">Invoice No:</th>
                  <td>14</td>
                </tr>
                <tr>
                  <th class="text-sm-right">Order Number:</th>
                  <td>AD20294</td>
                </tr>
                <tr>
                  <th class="text-sm-right">Invoice Date:</th>
                  <td>2018-09-25</td>
                </tr>
                <tr>
                  <th class="text-sm-right">Payment Due:</th>
                  <td>Upon receipt</td>
                </tr>
                <tr class="alert-success font-weight-bold">
                  <th class="text-sm-right">Amount Due:</th>
                  <td>$19688.40</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <div class="table-responsive mt-4 fs--1">
        <table class="table table-striped border-bottom">
          <thead>
            <tr class="bg-primary text-white">
              <th class="border-0">Products</th>
              <th class="border-0 text-center">Quantity</th>
              <th class="border-0 text-right">Rate</th>
              <th class="border-0 text-right">Amount</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td class="align-middle">
                <h6 class="mb-0 text-nowrap">Platinum web hosting package</h6>
                <p class="mb-0">Down 35mb, Up 100mb</p>
              </td>
              <td class="align-middle text-center">2</td>
              <td class="align-middle text-right">$65.00</td>
              <td class="align-middle text-right">$130.00</td>
            </tr>
            
          </tbody>
        </table>
      </div>
      <div class="row no-gutters justify-content-end">
        <div class="col-auto">
          <table class="table table-sm table-borderless fs--1 text-right">
            <tr>
              <th class="text-900">Subtotal:</th>
              <td class="font-weight-semi-bold">$18,230.00 </td>
            </tr>
            <tr>
              <th class="text-900">Tax 8%:</th>
              <td class="font-weight-semi-bold">$1458.40</td>
            </tr>
            <tr class="border-top">
              <th class="text-900">Total:</th>
              <td class="font-weight-semi-bold">$19688.40</td>
            </tr>
            <tr class="border-top border-2x font-weight-bold text-900">
              <th>Amount Due:</th>
              <td>$19688.40</td>
            </tr>
          </table>
        </div>
      </div>
    </div>
    <div class="card-footer bg-light">
      <p class="fs--1 mb-0"><strong>Notes: </strong>We really appreciate your business and if there’s anything else we can do, please let us know!</p>
    </div>



        </div>


        <!--End footer bottom area-->
      </div>
    </main>

<!-- ===============================================-->
      <!--    JavaScripts-->
      <!-- ===============================================-->
      <script src="<?= $this->url->get('assets/extra/js/jquery.min.js') ?>"></script>
      <script src="<?= $this->url->get('assets/extra/js/popper.min.js') ?>"></script>
      <script src="<?= $this->url->get('assets/extra/js/bootstrap.js') ?>"></script>
      <script src="<?= $this->url->get('assets/extra/js/plugins.js') ?>"></script>
      <script src="<?= $this->url->get('assets/extra/lib/stickyfilljs/stickyfill.min.js') ?>"></script>
      <script src="<?= $this->url->get('assets/extra/lib/sticky-kit/sticky-kit.min.js') ?>"></script>
      <script src="<?= $this->url->get('assets/extra/lib/is_js/is.min.js') ?>"></script><!-- Global site tag (gtag.js) - Google Analytics-->

      <?= $this->assets->outputJs('footers') ?>

      <script src="<?= $this->url->get('assets/extra/js/theme.js') ?>"></script>
      <script src="<?= $this->url->get('assets/extra/js/custom.js') ?>"></script>
      <script src="<?= $this->url->get('assets/js/dropzone.js') ?>"></script>
      <script>Dropzone.autoDiscover   = false;</script>
  </body>
</html>