{% extends "templates/base.volt" %}

{% block head %}
{% endblock %}

{% block content %}

<div class="card mb-3">
    <div class="card-body d-flex justify-content-between">
      <div>
          <a class="btn btn-falcon-default btn-sm" href="#!" data-toggle="tooltip" data-placement="top" title="Back to inbox">
          <span class="fas fa-arrow-left"></span></a><span class="mx-1 mx-sm-2 text-300">|</span>

          <button class="btn btn-falcon-default btn-sm ml-1 ml-sm-2" type="button" data-toggle="tooltip" data-placement="top" title="Send Message For A particular Project"><span class="fas fa-envelope"></span></button>
          <button class="btn btn-falcon-default btn-sm ml-1 ml-sm-2 d-none d-sm-inline-block" type="button" data-toggle="tooltip" data-placement="top" title="Print Your Project"><span class="fas fa-print"></span></button>
      </div>
      <div class="d-flex align-items-center">

            <a href="{{url('pro/projects')}}" class="btn btn-falcon-default btn-sm ml-2" type="button">Add New Project &nbsp;<span class="fas fa-plus"></span></a>
        </div>

      </div>
    </div>

{{ this.getContent() }}

</div>
{% endblock %}