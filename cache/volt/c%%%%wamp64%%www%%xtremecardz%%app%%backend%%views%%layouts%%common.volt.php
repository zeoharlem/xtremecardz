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
    <div class="card-body d-flex justify-content-between">
      <div>
          <a class="btn btn-falcon-default btn-sm" href="#!" data-toggle="tooltip" data-placement="top" title="Back to inbox">
          <span class="fas fa-arrow-left"></span></a><span class="mx-1 mx-sm-2 text-300">|</span>

          <button class="btn btn-falcon-default btn-sm ml-1 ml-sm-2" type="button" data-toggle="tooltip" data-placement="top" title="Send Message For A particular Project"><span class="fas fa-envelope"></span></button>
          <button class="btn btn-falcon-default btn-sm ml-1 ml-sm-2 d-none d-sm-inline-block" type="button" data-toggle="tooltip" data-placement="top" title="Print Your Project"><span class="fas fa-print"></span></button>
      </div>
      <div class="d-flex align-items-center">

            <a href="<?= $this->url->get('backend/projects') ?>" class="btn btn-falcon-default btn-sm ml-2" type="button">Add New Project &nbsp;<span class="fas fa-plus"></span></a>
        </div>

      </div>
    </div>

<?= $this->getContent() ?>

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