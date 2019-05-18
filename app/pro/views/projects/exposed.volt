<div class="card">
    <div class="card-header bg-light">
      <div class="row align-items-center">
        <div class="col">
          <h5 class="mb-0" id="followers">{{ project_title }} Pix<span class="d-none d-sm-inline-block"></span></h5>
        </div>
        <div class="col">
          <form>
            <div class="row no-gutters">
              <div class="col"><input class="form-control form-control-sm" type="text" placeholder="Search..." /></div>

            </div>
          </form>
        </div>
      </div>
    </div>
    <div class="card-body bg-light p-0">
      <div class="row no-gutters text-center fs--1">

      {% for keys,values in pager.getPaginate().items %}
        <div class="col-6 col-md-4 col-lg-3 col-xxl-2 mb-1">
          <div class="bg-white p-3 h-100"><a href="javascript:void(0);">
            <img class="img-thumbnail img-fluid rounded-circle mb-3 shadow-sm" src="{{url('assets/extra/img/team/22.jpg')}}" alt="" width="100" /></a>
            <h6 class="mb-1"><a href="javascript:void(0);">{{ values.firstname | capitalize }} {{ values.lastname | capitalize }}</a></h6>
            <p class="fs--2 mb-1"><a class="text-700" href="#!">{{ values.staff_id }}</a></p>
          </div>
        </div>
      {% endfor %}
      </div>


    </div>

  </div>
    {{ partial('partials/exposepaginate', [
        'page': pager.getPaginate(),
        'limit': pager.getLimit()
      ])
    }}
