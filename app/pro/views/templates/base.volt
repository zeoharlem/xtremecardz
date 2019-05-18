<!DOCTYPE html>
<html lang="en-US" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- ===============================================-->
    <!--    Document Title-->
    <!-- ===============================================-->
    <title>XtremeCardz Design</title>

    <link rel="apple-touch-icon" sizes="180x180" href="{{ url('assets/extra/img/favicons/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ url('assets/extra/img/favicons/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ url('assets/extra/img/favicons/favicon-16x16.png') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ url('assets/extra/img/favicons/favicon.ico') }}">
    <link rel="manifest" href="{{ url('assets/extra/img/favicons/manifest.json') }}">
    <meta name="msapplication-TileImage" content="{{ url('assets/extra/img/favicons/mstile-150x150.png') }}">
    <meta name="theme-color" content="#ffffff">

    <!-- ===============================================-->
    <!--    Stylesheets-->
    <!-- ===============================================-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,500,600,700%7cPoppins:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link href="{{ url('assets/extra/css/theme.css') }}" rel="stylesheet">
    {{ this.assets.outputCss('headers') }}
  </head>

  <body>
    <!-- ===============================================-->
    <!--    Main Content-->
    <!-- ===============================================-->
    <main class="main" id="top">

      <div class="container">
        {{ partial("partials/sidebar") }}
        <div class="content">
        {{ partial("partials/header") }}
        {% block content %}{% endblock %}

        </div>


        <!--End footer bottom area-->
      </div>
    </main>

<!-- ===============================================-->
      <!--    JavaScripts-->
      <!-- ===============================================-->
      <script src="{{ url('assets/extra/js/jquery.min.js') }}"></script>
      <script src="{{ url('assets/extra/js/popper.min.js') }}"></script>
      <script src="{{ url('assets/extra/js/bootstrap.js') }}"></script>
      <script src="{{ url('assets/extra/js/plugins.js') }}"></script>
      <script src="{{ url('assets/extra/lib/stickyfilljs/stickyfill.min.js') }}"></script>
      <script src="{{ url('assets/extra/lib/sticky-kit/sticky-kit.min.js') }}"></script>
      <script src="{{ url('assets/extra/lib/is_js/is.min.js') }}"></script><!-- Global site tag (gtag.js) - Google Analytics-->

      {{ this.assets.outputJs('footers') }}

      <script src="{{ url('assets/extra/js/theme.js') }}"></script>
      <script src="{{ url('assets/extra/js/custom-pro-view.js') }}"></script>
      <script src="{{ url('assets/js/dropzone.js') }}"></script>

      <script>
          Dropzone.autoDiscover   = false;
      </script>
  </body>
</html>