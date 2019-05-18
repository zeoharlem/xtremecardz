<nav class="navbar navbar-vertical navbar-expand-xl navbar-light navbar-glass"><a class="navbar-brand text-left" href="index-2.html">
    <div class="d-flex align-items-center py-3"><img class="mr-2" src="{{ url('assets/extra/img/xtreme-logo-dark.png') }}" alt="" width="100" /><span class="text-sans-serif"></span></div>
  </a>
  <div class="collapse navbar-collapse" id="navbarVerticalCollapse">
    <ul class="navbar-nav flex-column">
      <li class="nav-item"><a class="nav-link" href="{{url('pro/dashboard')}}">
            <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-code-branch"></span></span><span><b>Dashboard</b></span></div>
          </a>
      </li>
      <li class="nav-item"><a class="nav-link dropdown-indicator" href="#home" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="home">
          <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-chart-pie"></span></span><span>Production</span></div>
        </a>
        <ul class="nav collapse show" id="home" data-parent="#navbarVerticalCollapse">
          <li class="nav-item"><a class="nav-link" href="{{url('pro/projects/empty')}}">Projects Created</a></li>
          <li class="nav-item"><a class="nav-link" href="{{url('pro/projects/list')}}">Projects Content</a></li>
        </ul>
      </li>

    </ul>
    <hr class="border-300 my-2" />
    <ul class="navbar-nav flex-column">

      <li class="nav-item"><a class="nav-link dropdown-indicator" href="#plugins" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="plugins">
          <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-plug"></span></span><span>Feeds</span></div>
        </a>
        <ul class="nav collapse" id="plugins" data-parent="#navbarVerticalCollapse">
          <li class="nav-item"><a class="nav-link" href="plugins/accordion.html">Coming Soon!</a></li>
        </ul>
      </li>
    </ul>
    <hr class="border-300 my-2" />
    <ul class="navbar-nav flex-column">
      <li class="nav-item"><a class="nav-link dropdown-indicator" href="#documentation" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="documentation">
          <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-book"></span></span><span>Suport System</span></div>
        </a>
        <ul class="nav collapse" id="documentation" data-parent="#navbarVerticalCollapse">
          <li class="nav-item"><a class="nav-link" href="{{ url('pro/settings/contact') }}">Send Message</a></li>
          <li class="nav-item"><a class="nav-link" href="#">Chat Now</a></li>
        </ul>
      </li>
      <li class="nav-item"><a class="nav-link" href="#">
          <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-code-branch"></span></span><span>Terms &amp; Condition</span><span class="badge badge-pill ml-2 badge-soft-primary">v1</span></div>
        </a></li>
    </ul><a class="btn btn-primary btn-lg m-3" href="{{url('pro/logout')}}">Log Out</a>
  </div>
</nav>