<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <?= $this->tag->gettitle() ?>
        <!-- SEO Meta Tags-->
        <meta name="description" content="">
        <meta name="keywords" content="">

        <!-- Viewport-->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Favicon and Touch Icons-->
        <link rel="apple-touch-icon" sizes="180x180" href="apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="favicon-16x16.png">

        <link rel="mask-icon" color="#343b43" href="safari-pinned-tab.svg">
        <meta name="msapplication-TileColor" content="#603cba">
        <meta name="theme-color" content="#ffffff">

        <!-- Vendor Styles including: Font Icons, Plugins, etc.-->
        <link rel="stylesheet" media="screen" href="<?= $this->url->get('assets/css/vendor.min.css') ?>">

        <!-- Main Theme Styles + Bootstrap-->
        <link rel="stylesheet" media="screen" href="<?= $this->url->get('assets/css/theme.min.css') ?>">

        <!-- Google Tag Manager-->
        <script>
          (function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
          new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
          j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
          'www.googletagmanager.com/gtm5445.html?id='+i+dl;f.parentNode.insertBefore(j,f);
          })(window,document,'script','dataLayer','GTM-PVV9F7F');

        </script>
        <!-- Modernizr-->
        <script src="<?= $this->url->get('assets/js/modernizr.min.js') ?>"></script>
    </head>

    <!-- Body-->
    <body>

    <?= $this->partial('partials/offcanvas') ?>
    <?= $this->partial('partials/header') ?>

    
<!-- Page Title-->
<div class="page-title d-flex" aria-label="Page title" style="background-image: url( <?= $this->url->get('assets/img/page-title/portfolio-pattern.png') ?> );">
  <div class="container text-left align-self-center">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index-2.html">Home</a>
        </li>
        <li class="breadcrumb-item"><a href="portfolio-style2-boxed.html">Portfolio</a>
        </li>
      </ol>
    </nav>
    <h1 class="page-title-heading">Metal Card | Portfolio</h1>
    <div class="page-title-subheading">Style 2 Grid View <strong>Boxed Layout</strong></div>
  </div>
</div>

    <?= $this->getContent() ?>


    <?= $this->partial('partials/footer') ?>

    <div class="site-backdrop"></div>
    <!-- JavaScript (jQuery) libraries, plugins and custom scripts-->
    <script src="<?= $this->url->get('assets/js/vendor.min.js') ?>"></script>
    <script src="<?= $this->url->get('assets/js/theme.min.js') ?>"></script>
    </body>
</html>