<div class="card-body bg-light">
  <div class="row">
    <div class="col-12">
        <div class="form-group">
            <h4><small><?php echo ucwords($this->request->getQuery('name')); ?></small></h4>
        </div>

        <form action="{{ url('admin/portfolio/uploadimage') }}" class="dropzone card" id="dropZonePackage">
            <input type="hidden" id="upload_title" name="title" value="<?php echo $this->request->getQuery('name','string'); ?>" />
            <input type="hidden" id="album_id" name="album_id" value="<?php echo $this->request->getQuery('album_id','int'); ?>" />
            <input type="hidden" id="item_id" name="item_id" value="<?php echo $this->request->getQuery('item_id','int'); ?>" />
            <input type="hidden" id="album_folder" name="album_folder" value="<?php echo $this->request->getQuery('f'); ?>" />
        </form>

    </div>
  </div>
</div>