{% extends "templates/base.volt" %}

{% block head %}

{% endblock %}

{% block content %}
<!-- Page Title-->
<div class="page-title d-flex" aria-label="Page title" style="background-image: url( {{url('assets/img/page-title/portfolio-pattern.png')}} );">
  <div class="container text-left align-self-center">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Home</a>
        </li>
        <li class="breadcrumb-item"><a href="#">Portfolio</a>
        </li>
      </ol>
    </nav>
    <h1 class="page-title-heading"><?php echo $this->request->hasQuery('gr')? $this->request->getQuery('gr') : "Portfolio"; ?></h1>
    <div class="page-title-subheading">Card <strong>Portfolio</strong></div>
  </div>
</div>

    {{ this.getContent() }}
{% endblock %}