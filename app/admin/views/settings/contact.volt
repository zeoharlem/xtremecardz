{% extends "templates/base.volt" %}

{% block head %}

{% endblock %}
{% block content %}

<form class="card">
<div class="card-header bg-light">
  <h5 class="mb-0">New message</h5>
</div>
<div class="card-body p-0">
  <div class="border-bottom border-200">
    <input class="form-control border-0 outline-none px-card" id="email-to" type="email" aria-describedby="email-to" placeholder="To">
  </div>
  <input class="form-control border-0 outline-none px-card" id="email-subject" type="text" aria-describedby="email-subject" placeholder="Subject">
  <div class="min-vh-50">
    <textarea class="tinymce d-none" name="content">sdsdfsdfsdsdff</textarea>
  </div>

</div>
<div class="card-footer border-top border-200 d-flex justify-content-between align-items-center">
  <div class="d-flex align-items-center"><button class="btn btn-secondary px-5 mr-2 btn-lg" type="submit">Send</button></div>
  <div class="d-flex align-items-center">
    <button class="btn btn-light btn-sm" type="button" data-toggle="tooltip" data-placement="top" title="Delete"> <span class="fas fa-trash"></span></button>
  </div>
</div>
</form>
{% endblock %}