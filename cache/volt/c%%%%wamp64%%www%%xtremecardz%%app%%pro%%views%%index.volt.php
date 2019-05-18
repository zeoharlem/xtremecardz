<!DOCTYPE html>
<html lang="en-US" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- ===============================================-->
    <!--    Document Title-->
    <!-- ===============================================-->
    <?= $this->tag->gettitle() ?>

    <!-- ===============================================-->
    <!--    Favicons-->
    <!-- ===============================================-->
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
    <link href="<?= $this->url->get('assets/extra/css/theme.css') ?>" rel="stylesheet">
  </head>

  <body>
      <!-- ===============================================-->
      <!--    Main Content-->
      <!-- ===============================================-->
      <main class="main" id="top">
  
        <div class="container">
          <div class="row flex-center min-vh-100 py-6">
            <div class="col-sm-10 col-md-8 col-lg-6 col-xl-5 col-xxl-4">
            <a class="d-block text-center mb-4" href="<?= $this->url->get('pro') ?>"><img class="mr-2" src="<?= $this->url->get('assets/extra/img/xtreme-logo-dark.png') ?>" alt="" width="150" /><span class="text-sans-serif font-weight-extra-bold fs-5 d-inline-block"></span></a>
              <?= $this->flash->output() ?>
              <div class="card">
                <div class="card-body p-5">
                  <div class="row text-left justify-content-between">
                    <div class="col-auto">
                      <h5> <b>Production Unit</b></h5>
                    </div>
                    <div class="col-auto">
                      <p class="fs--1 text-600">Sign In</p>
                    </div>
                  </div>
                  <form method="POST" action="<?= $this->url->get('pro/login') ?>">
                    <div class="form-group"><input class="form-control" type="email" name="email" placeholder="Email address" required /></div>
                    <div class="form-group"><input class="form-control" type="password" name="password" placeholder="Password" required /></div>
                    <div class="row justify-content-between">
                      <div class="col-auto">
                        <div class="custom-control custom-checkbox"><input class="custom-control-input" id="customCheckRemember" type="checkbox" /><label class="custom-control-label" for="customCheckRemember">Remember me</label></div>
                      </div>
                      <div class="col-auto"><a class="fs--1" href="forget-password.html">Forget Password?</a></div>
                    </div>
                    <div class="form-group"><button class="btn btn-primary btn-lg btn-block mt-3" type="submit" name="submit">Log in</button></div>

                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </main><!-- ===============================================-->
      <!--    End of Main Content-->
      <!-- ===============================================-->
  
  
  
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

      <script src="<?= $this->url->get('assets/extra/js/theme.js') ?>"></script>
      <script src="<?= $this->url->get('assets/js/custom.js') ?>"></script>
    </body>
</html>