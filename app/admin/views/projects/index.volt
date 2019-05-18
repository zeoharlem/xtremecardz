<div class="row flex-center text-center">
  <div class="col-sm-8">
    <div class="carder">
      <div class="card-body">
        <form class="mt-4" method="POST" id="createProjectId">
          {{ flash.output() }}
          <div class="form-group"><input class="form-control form-control-lg" autocomplete="off" name="project_title" type="text" required placeholder="Type Project Title" style="font-size:13px; padding:30px !important;" /></div>
          <div class="form-group">

            <select class="form-control form-control-lg" name="user_id" required />
                <option>Select Company Name</option>
                {% for keys,values in company_name %}
                    <option value="{{ values['register_id'] }}">{{values['company_name']}}</option>
                {% endfor %}
            </select>

          </div>
          <div class="form-group"><button class="btn btn-outline-primary btn-block btn-lg mt-3" type="submit" name="submit" style="padding:15px !important;">Next Page | Project</button></div>
        </form>
      </div>
    </div>
  </div>
</div>