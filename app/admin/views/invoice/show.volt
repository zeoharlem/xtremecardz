{% extends "templates/base.volt" %}

{% block head %}

{% endblock %}
{% block content %}

<div class="card mb-3">
    <div class="card-body">
      <div class="row justify-content-between align-items-center">
        <div class="col-md">
          <h5 class="mb-2 mb-md-0">Order #AD20294</h5>
        </div>
        <div class="col-auto"><button class="btn btn-falcon-default btn-sm mr-2 mb-2 mb-sm-0" type="button"><span class="fas fa-arrow-down mr-1"> </span>Download (.pdf)</button><button class="btn btn-falcon-default btn-sm mr-2 mb-2 mb-sm-0" type="button"><span class="fas fa-print mr-1"> </span>Print</button><button class="btn btn-falcon-success btn-sm mb-2 mb-sm-0" type="button"><span class="fas fa-dollar-sign mr-1"></span>Receive Payment</button></div>
      </div>
    </div>
</div>

<div class="card mb-3">
    <div class="card-body">
      <div class="row align-items-center text-center mb-3">
        <div class="col-sm-6 text-sm-left"><img src="../assets/img/logos/logo-invoice.png" alt="invoice" width="150"></div>
        <div class="col text-sm-right mt-3 mt-sm-0">
          <h2 class="mb-3">Invoice</h2>
          <h5>Falcon Design Studio</h5>
          <p class="fs--1 mb-0">156 University Ave, Toronto<br>On, Canada, M5H 2H7</p>
        </div>
        <div class="col-12">
          <hr>
        </div>
      </div>
      <div class="row justify-content-between align-items-center">
        <div class="col">
          <h6 class="text-500">Invoice to</h6>
          <h5>Antonio Banderas</h5>
          <p class="fs--1">1954 Bloor Street West<br>Torronto ON, M6P 3K9<br>Canada</p>
          <p class="fs--1"><a href="mailto:example@gmail.com">example@gmail.com</a><br><a href="tel:444466667777">+4444-6666-7777</a></p>
        </div>
        <div class="col-sm-auto ml-auto">
          <div class="table-responsive">
            <table class="table table-sm table-borderless fs--1">
              <tbody>
                <tr>
                  <th class="text-sm-right">Invoice No:</th>
                  <td>14</td>
                </tr>
                <tr>
                  <th class="text-sm-right">Order Number:</th>
                  <td>AD20294</td>
                </tr>
                <tr>
                  <th class="text-sm-right">Invoice Date:</th>
                  <td>2018-09-25</td>
                </tr>
                <tr>
                  <th class="text-sm-right">Payment Due:</th>
                  <td>Upon receipt</td>
                </tr>
                <tr class="alert-success font-weight-bold">
                  <th class="text-sm-right">Amount Due:</th>
                  <td>$19688.40</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <div class="table-responsive mt-4 fs--1">
        <table class="table table-striped border-bottom">
          <thead>
            <tr class="bg-primary text-white">
              <th class="border-0">Products</th>
              <th class="border-0 text-center">Quantity</th>
              <th class="border-0 text-right">Rate</th>
              <th class="border-0 text-right">Amount</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td class="align-middle">
                <h6 class="mb-0 text-nowrap">Platinum web hosting package</h6>
                <p class="mb-0">Down 35mb, Up 100mb</p>
              </td>
              <td class="align-middle text-center">2</td>
              <td class="align-middle text-right">$65.00</td>
              <td class="align-middle text-right">$130.00</td>
            </tr>
            
          </tbody>
        </table>
      </div>
      <div class="row no-gutters justify-content-end">
        <div class="col-auto">
          <table class="table table-sm table-borderless fs--1 text-right">
            <tr>
              <th class="text-900">Subtotal:</th>
              <td class="font-weight-semi-bold">$18,230.00 </td>
            </tr>
            <tr>
              <th class="text-900">Tax 8%:</th>
              <td class="font-weight-semi-bold">$1458.40</td>
            </tr>
            <tr class="border-top">
              <th class="text-900">Total:</th>
              <td class="font-weight-semi-bold">$19688.40</td>
            </tr>
            <tr class="border-top border-2x font-weight-bold text-900">
              <th>Amount Due:</th>
              <td>$19688.40</td>
            </tr>
          </table>
        </div>
      </div>
    </div>
    <div class="card-footer bg-light">
      <p class="fs--1 mb-0"><strong>Notes: </strong>We really appreciate your business and if there’s anything else we can do, please let us know!</p>
    </div>

{% endblock %}