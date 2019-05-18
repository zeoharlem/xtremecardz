<div class="row flex-center text-center">
  <div class="col-sm-8">
    <div class="carder">
      <div class="card-body">
        <form class="mt-4" method="POST" id="createProjectId">
          {{ flash.output() }}
          <div class="form-group"><input class="form-control form-control-lg" autocomplete="off" name="project_title" type="text" required placeholder="Type Project Title" style="padding:30px !important;" /></div>
          <div class="form-group"><button class="btn btn-falcon-default btn-block btn-lg mt-3" type="submit" name="submit" style="padding:15px !important;">Next Page | Project</button></div>
        </form>
      </div>
    </div>
  </div>
</div>