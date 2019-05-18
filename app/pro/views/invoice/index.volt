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
          <h3 class="mb-0"><b>Invoices</b></h3>
          <p class="mt-2">Invoice explanation on it's generated for the clients.</p><a class="btn btn-link pl-0 btn-sm" href="{{url('pro/dashboard?token=')}}<?php echo uniqid('xL'); ?>"> Projects Created<span class="fas fa-chevron-right ml-1 fs--2"></span></a>
        </div>
      </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <table class="table table-sm table-dashboard display responsive no-wrap mb-0 fs--1 w-100" id='tableInvoiceRow'>
          <thead class="bg-200">
            <tr>
              <th>S/N</th>
              <th>Project Title</th>
              <th>Date Created</th>
              <th>Status</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody class="bg-white">

          </tbody>
          <tfoot>
            <tr>
                <th>S/N</th>
                <th>Project Title</th>
                <th>Date Created</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
          </tfoot>
        </table>
    </div>
</div>


{% endblock %}