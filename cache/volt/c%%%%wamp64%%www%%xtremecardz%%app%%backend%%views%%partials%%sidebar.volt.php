<nav class="navbar navbar-vertical navbar-expand-xl navbar-light navbar-glass"><a class="navbar-brand text-left" href="index-2.html">
    <div class="d-flex align-items-center py-3"><img class="mr-2" src="<?= $this->url->get('assets/extra/img/xtreme-logo-dark.png') ?>" alt="" width="100" /><span class="text-sans-serif"></span></div>
  </a>
  <div class="collapse navbar-collapse" id="navbarVerticalCollapse">
    <ul class="navbar-nav flex-column">
      <li class="nav-item"><a class="nav-link" href="<?= $this->url->get('backend/dashboard') ?>">
            <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-code-branch"></span></span><span><b>Dashboard</b></span></div>
          </a>
      </li>
      <li class="nav-item"><a class="nav-link dropdown-indicator" href="#home" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="home">
          <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-chart-pie"></span></span><span>Projects</span></div>
        </a>
        <ul class="nav collapse show" id="home" data-parent="#navbarVerticalCollapse">
          <li class="nav-item active"><a class="nav-link" href="<?= $this->url->get('backend/projects') ?>">Create Projects</a></li>
          <li class="nav-item"><a class="nav-link" href="<?= $this->url->get('backend/projects/list') ?>">Submitted Projects</a></li>
          <li class="nav-item"><a class="nav-link" href="<?= $this->url->get('backend/projects/empty') ?>">Projects View</a></li>
        </ul>
      </li>
      <li class="nav-item"><a class="nav-link dropdown-indicator" href="#settings" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="settings">
          <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-envelope-open"></span></span><span>Settings</span></div>
        </a>
        <ul class="nav collapse" id="settings" data-parent="#navbarVerticalCollapse">
          <li class="nav-item"><a class="nav-link" href="<?= $this->url->get('backend/settings') ?>">Edit Profile</a></li>
          <li class="nav-item"><a class="nav-link" href="<?= $this->url->get('backend/settings/password') ?>">Change Password</a></li>
          <li class="nav-item"><a class="nav-link" href="<?= $this->url->get('backend/settings/contact') ?>">Send Message</a></li>
        </ul>
      </li>
      <li class="nav-item"><a class="nav-link dropdown-indicator" href="#authentication" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="authentication">
          <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-unlock-alt"></span></span><span>Invoice</span></div>
        </a>
        <ul class="nav collapse" id="authentication" data-parent="#navbarVerticalCollapse">
          <li class="nav-item"><a class="nav-link" href="<?= $this->url->get('backend/invoice') ?>">Invoice / Receipt</a></li>
        </ul>
      </li>

    </ul>
    <hr class="border-300 my-2" />
    <ul class="navbar-nav flex-column">
      <li class="nav-item"><a class="nav-link dropdown-indicator" href="#layouts" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="layouts">
          <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-qrcode"></span></span><span>Portfolios</span></div>
        </a>
        <ul class="nav collapse" id="layouts" data-parent="#navbarVerticalCollapse">
          <li class="nav-item"><a class="nav-link" href="#">Coming Soon!</a></li>
        </ul>
      </li>

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
          <li class="nav-item"><a class="nav-link" href="<?= $this->url->get('backend/settings/contact') ?>">Send Message</a></li>
          <li class="nav-item"><a class="nav-link" href="#">Chat Now</a></li>
        </ul>
      </li>
      <li class="nav-item"><a class="nav-link" href="#">
          <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-code-branch"></span></span><span>Terms &amp; Condition</span><span class="badge badge-pill ml-2 badge-soft-primary">v1</span></div>
        </a></li>
    </ul><a class="btn btn-primary btn-lg m-3" href="<?= $this->url->get('backend/logout') ?>">Log Out</a>
  </div>
</nav>