<!DOCTYPE html>
<html lang="en-US" dir="ltr">


<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- ===============================================-->
    <!--    Document Title-->
    <!-- ===============================================-->
    <title>Falcon | Dashboard &amp; WebApp Template</title>

    <!-- ===============================================-->
    <!--    Favicons-->
    <!-- ===============================================-->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ url('assets/img/favicons/apple-touch-icon.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ url('assets/img/favicons/favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ url('assets/img/favicons/favicon-16x16.png')}}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ url('assets/img/favicons/favicon.ico')}}">
    <link rel="manifest" href="{{ url('assets/img/favicons/manifest.json')}}>
    <meta name="msapplication-TileImage" content="{{ url('assets/img/favicons/mstile-150x150.png')}}">
    <meta name="theme-color" content="#ffffff">

    <!-- ===============================================-->
    <!--    Stylesheets-->
    <!-- ===============================================-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,500,600,700%7cPoppins:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link href="{{ url('assets/extra/css/theme.css') }}" rel="stylesheet">
  </head>

  <body>
    <!-- ===============================================-->
    <!--    Main Content-->
    <!-- ===============================================-->
    <main class="main" id="top">

      <div class="container">
        <div class="row flex-center text-center min-vh-100 py-6">
          <div class="col-sm-11 col-md-9 col-lg-7 col-xl-6 col-xxl-5"><a class="d-block text-center mb-4" href="{{ url('pro/') }}"><img class="mr-2" src="{{ url('assets/extra/img/xtreme-logo-dark.png') }}" alt="" width="150" /></a>
            <div class="card">
              <div class="card-body p-5"><img class="d-block mx-auto mb-4" src="{{ url('assets/img/icons/sent.svg') }}" alt="shield" width="100" />
                <h4>Please check your email</h4>
                <p>An email has been sent to <code>youremail@domain.com</code>. Please check for an email from the company and Activate your account.</p><a class="btn btn-primary btn-sm mt-3" href="{{ url('pro/') }}"><span class="fas fa-sign-in-alt mr-2"></span>Return to login</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main><!-- ===============================================-->
    <!--    End of Main Content-->
    <!-- ===============================================-->



    <script src="{{ url('assets/extra/js/jquery.min.js') }}"></script>
    <script src="{{ url('assets/extra/js/jquery.form.min.js') }}"></script>
    <script src="{{ url('assets/extra/js/popper.min.js') }}"></script>
    <script src="{{ url('assets/extra/js/bootstrap.js') }}"></script>
    <script src="{{ url('assets/extra/js/plugins.js') }}"></script>
    <script src="{{ url('assets/extra/lib/stickyfilljs/stickyfill.min.js') }}"></script>
    <script src="{{ url('assets/extra/lib/sticky-kit/sticky-kit.min.js') }}"></script>
    <script src="{{ url('assets/extra/lib/is_js/is.min.js') }}"></script><!-- Global site tag (gtag.js) - Google Analytics-->

    <script src="{{ url('assets/extra/js/theme.js') }}"></script>
    <script src="{{ url('assets/extra/js/pages/register.js') }}"></script>
    <script src="{{ url('assets/js/custom.js') }}"></script>
  </body>

</html>