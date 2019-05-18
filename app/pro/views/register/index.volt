<!DOCTYPE html>
<html lang="en-US" dir="ltr">


<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- ===============================================-->
    <!--    Document Title-->
    <!-- ===============================================-->
    {{ getTitle() }}

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
          <div class="col-sm-10 col-md-8 col-lg-6 col-xl-5 col-xxl-4">
          <a class="d-block text-center mb-4" href="{{ url('assets/extra/index-2.html') }}"><img class="mr-2" src="{{ url('assets/extra/img/xtreme-logo-dark.png') }}" alt="" width="150" /><span class="text-sans-serif font-weight-extra-bold fs-5 d-inline-block"></span></a>
            {{ flash.output() }}
            <div class="card">
              <div class="card-body p-5">
                <div class="row text-left">
                  <div class="col" style="min-width: 7rem">
                    <h5 id="modalLabel"> Register</h5>
                  </div>
                  <div class="col-auto">
                    <p class="fs--1 text-600">Have an account? <a href="{{ url('pro/') }}">Login</a></p>
                  </div>
                </div>

                <form id="registerForm" method="POST" action="{{ url('pro/login/') }}">
                  <div class="form-group"><input required class="form-control form-control-lg" name="company_name" title="Full Name" type="text" placeholder="Company's Name" /></div>
                  <div class="form-group"><input required class="form-control form-control-lg" name="email" title="Email Address" type="email" placeholder="Email address" /></div>
                  <!--<div class="form-group"><input class="form-control form-control-lg" name="password" title="Password" type="password" placeholder="Password" /></div>
                  <div class="form-group"><input class="form-control form-control-lg" name="rpassword" title="Confirm Password" type="password" placeholder="Confirm Password" /></div>-->

                  <div class="custom-control custom-checkbox"><input class="custom-control-input" name="checkboxTerms" id="customCheckTerms" type="checkbox" /><label class="custom-control-label" for="customCheckTerms">I accept the <a href="#!">terms </a>and <a href="#!">privacy policy</a></label></div>
                  <div class="form-group"><button class="btn btn-primary btn-lg btn-block mt-3" id="registerButton" type="submit">Register</button></div>
                  <div class="w-100 position-relative text-center mt-4">
                    <hr class="text-300" />
                    <div class="position-absolute absolute-centered t-0 px-3 bg-white text-sans-serif fs--1 text-500 text-nowrap">or sign-up with</div>
                  </div>
                  <div class="form-group mb-0">
                    <div class="row no-gutters">

                      <div class="col-sm-12 pl-sm-1"><a class="btn btn-outline-facebook btn-lg btn-block mt-2" href="#"><span class="fab fa-facebook mr-2" data-fa-transform="grow-8"></span> facebook</a></div>
                    </div>
                  </div>
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