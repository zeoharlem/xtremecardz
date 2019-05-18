

<div class="card-deck">
  {% for keys, values in stackRowQuery %}

      <div class="card mb-3 overflow-hidden" style="min-width: 12rem">

        <div class="bg-holder bg-card" style="background-image:url({{ url(values['status']) }});"></div>
        <!--/.bg-holder-->
        <div class="card-body position-relative">

          <div class="display-4 fs-4 mb-2 font-weight-normal text-sans-serif text-warning"><small><b>{{values['project_title'] | capitalize}}</b></small></div>
          <a class="font-weight-semi-bold fs--1 text-nowrap" href="{{url('pro/production/downloads?project_id='~values['project_id']~'&setproject_id='~values['setproject_id']~'&project_title='~values['project_title']~'&type=csv&file='~values['card_csv_file'])}}" target="_blank">CSV<span class="fas fa-angle-right ml-1" data-fa-transform="down-1"></span></a>
          <a class="font-weight-semi-bold fs--1 text-nowrap" href="{{url('pro/production/downloads?project_id='~values['project_id']~'&setproject_id='~values['setproject_id']~'&project_title='~values['project_title']~'&type=zipimages&file='~values['zip_image_url'])}}" target="_blank">Zip Images<span class="fas fa-angle-right ml-1" data-fa-transform="down-1"></span></a>
          <a class="font-weight-semi-bold fs--1 text-nowrap" href="{{url('pro/production/downloads?project_id='~values['project_id']~'&setproject_id='~values['setproject_id']~'&project_title='~values['project_title']~'&type=signatures&file='~values['sign_image_url'])}}" target="_blank">Signatures<span class="fas fa-angle-right ml-1" data-fa-transform="down-1"></span></a>
        </div>
      </div>
  {% endfor %}

</div>
