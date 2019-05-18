<div class="card mb-3">

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
        <div class="display-4 fs-4 mb-2 font-weight-normal text-sans-serif text-warning" data-countupp='{"count":{{projects}},"format":"alphanumeric"}'><b>{{projects}}</b></div><a href="{{ url('pro/projects/list') }}" class="font-weight-semi-bold fs--1 text-nowrap" href="#!">See all<span class="fas fa-angle-right ml-1" data-fa-transform="down-1"></span></a>
      </div>
    </div>
    <div class="card mb-3 overflow-hidden" style="min-width: 12rem">
      <div class="bg-holder bg-card" style="background-image:url({{ url('assets/extra/img/illustrations/corner-2.png') }});"></div>
      <!--/.bg-holder-->
      <div class="card-body position-relative">
        <h6>Downloads<span class="badge badge-soft-info rounded-capsule ml-2">0.0%</span></h6>
        <div class="display-4 fs-4 mb-2 font-weight-normal text-sans-serif text-info" data-countupp='{"count":{{download}},"format":"alphanumeric"}'><b>{{download}}</b></div><a class="font-weight-semi-bold fs--1 text-nowrap" href="#!">View all<span class="fas fa-angle-right ml-1" data-fa-transform="down-1"></span></a>
      </div>
    </div>

  </div>
