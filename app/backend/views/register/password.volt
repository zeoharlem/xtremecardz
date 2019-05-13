<!DOCTYPE html>
<html lang="en-US" dir="ltr">


<!-- Mirrored from prium.github.io/falcon/authentication/password-reset.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 02 May 2019 11:38:31 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- ===============================================-->
    <!--    Document Title-->
    <!-- ===============================================-->
    <title>Xtremecardz Design</title>

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
        <div class="row flex-center min-vh-100 py-6">
          <div class="col-sm-11 col-md-9 col-lg-7 col-xl-6 col-xxl-5"><a class="d-block text-center mb-4" href="{{ url('backend/') }}"><img class="mr-2" src="{{ url('assets/extra/img/xtreme-logo-dark.png') }}" alt="" width="150" /></a>
            <div class="card">
              <div class="card-body p-5">
                <h5>Create password</h5>
                <form class="mt-3" method="POST">
                  <div class="form-group"><input class="form-control form-control-lg" name="password" type="password" placeholder="New Password" /></div>
                  <div class="form-group"><input class="form-control form-control-lg" name="rpassword" type="password" placeholder="Confirm Password" /></div>
                  <div class="form-group"><button class="btn btn-primary btn-block mt-3 btn-lg" type="submit" name="submit">Set password</button></div>
                </form>
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