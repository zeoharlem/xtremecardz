{% extends "templates/base.volt" %}

{% block head %}

{% endblock %}
{% block content %}

<div class="card mb-3">
<div class="bg-holder d-none d-lg-block bg-card" style="background-image:url({{ url('assets/extra/img/illustrations/corner-4.png') }});"></div>
<!--/.bg-holder-->
<div class="card-body">
  <div class="row">
    <div class="col-lg-8">
      <h3 class="mb-0"><b>Settings</b></h3>
      <!--<p class="mt-2">Examples and usage guidelines for form control styles, layout options, and custom components for creating a wide variety of forms.</p>-->
    </div>
  </div>
</div>
</div>

  {{ this.getContent() }}

{% endblock %}