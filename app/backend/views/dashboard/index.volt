<div class="card mb-3">
    <div class="card-body rounded-soft bg-gradient">
      <div class="row text-white align-items-center no-gutters">
        <div class="col">
          <h4 class="text-white mb-0">{{ company }}</h4>
          <p class="fs--1 font-weight-semi-bold"><span class="text-300">{{email}}</span></p>
        </div>
        <div class="col-auto d-none d-sm-block">
          <a href="{{ url('backend/projects') }}" class="btn btn-light btn-lg">Create New Project</a>
        </div>
      </div><canvas class="rounded" id="chart-line" width="1618" height="375" aria-label="Line chart" role="img"></canvas>
    </div>
  </div>
  <div class="card bg-light mb-3">
    <div class="card-body p-3">
      <p class="fs--1 mb-0"><a href="#!"><span class="fas fa-exchange-alt mr-2" data-fa-transform="rotate-90"></span>You are welcome to  <strong>Xtremecardz </strong></a>. Do not forget to contact us <strong><?php echo date('F d, Y'); ?></strong></p>
    </div>
  </div>
  <div class="card-deck">
    <div class="card mb-3 overflow-hidden" style="min-width: 12rem">
      <div class="bg-holder bg-card" style="background-image:url({{ url('assets/extra/img/illustrations/corner-1.png') }});"></div>
      <!--/.bg-holder-->
      <div class="card-body position-relative">
        <h6>Projects Submitted<span class="badge badge-soft-warning rounded-capsule ml-2"></span></h6>
        <div class="display-4 fs-4 mb-2 font-weight-normal text-sans-serif text-warning" data-countupp='{"count":{{projects}},"format":"alphanumeric"}'>{{projects}}</div><a href="{{ url('backend/projects/list') }}" class="font-weight-semi-bold fs--1 text-nowrap" href="#!">See all<span class="fas fa-angle-right ml-1" data-fa-transform="down-1"></span></a>
      </div>
    </div>
    <div class="card mb-3 overflow-hidden" style="min-width: 12rem">
      <div class="bg-holder bg-card" style="background-image:url({{ url('assets/extra/img/illustrations/corner-2.png') }});"></div>
      <!--/.bg-holder-->
      <div class="card-body position-relative">
        <h6>Downloads<span class="badge badge-soft-info rounded-capsule ml-2">0.0%</span></h6>
        <div class="display-4 fs-4 mb-2 font-weight-normal text-sans-serif text-info" data-countupp='{"count":{{download}},"format":"alphanumeric"}'>{{download}}</div><a class="font-weight-semi-bold fs--1 text-nowrap" href="#!">View all<span class="fas fa-angle-right ml-1" data-fa-transform="down-1"></span></a>
      </div>
    </div>
    <div class="card mb-3 overflow-hidden" style="min-width: 12rem">
      <div class="bg-holder bg-card" style="background-image:url({{ url('assets/extra/img/illustrations/corner-3.png')}});"></div>
      <!--/.bg-holder-->
      <div class="card-body position-relative">
        <h6>Xtremecardz Portfolio<span class="badge badge-soft-success rounded-capsule ml-2"></span></h6>
        <div class="display-4 fs-4 mb-2 font-weight-normal text-sans-serif" data-countup='{"count":5,"format":"comma","prefix":""}'>0</div><a class="font-weight-semi-bold fs--1 text-nowrap" href="{{ url('backend/projects/') }}">View all<span class="fas fa-angle-right ml-1" data-fa-transform="down-1"></span></a>
      </div>
    </div>
  </div>
