<div class="card-body bg-light">
  <div class="row">
    <div class="col-12">
        <div class="form-group">
            <h3><?php echo ucwords($this->request->getQuery('project_title')); ?></h3>
        </div>

        <form action="{{ url('backend/projects/zipfile') }}" method='POST' class="dropzone card" id="myAwesomeDropzone" enctype="multipart/form-data">
            <input type="hidden" name="project_id" value="<?php echo $this->request->getQuery('project_id'); ?>" />
            <input type="hidden" name="setproject_id" value="<?php echo $this->request->getQuery('setproject_id'); ?>" />
        </form>

    </div>
  </div>
</div>