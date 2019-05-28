<div class="card mb-3">
    <div class="card-header">
      <h5 class="mb-0">Submit / Create Now</h5>
    </div>
    <div class="card-body bg-light">
            {{flash.output()}}
            <form method="POST" enctype="multipart/form-data">
                  <div class="form-group">
                    <label for="name">Title</label>
                    <input class="form-control" name="title" id="title" type="text" placeholder="Type Accessories Title">
                  </div>

                  <div class="form-group">
                    <label for="email1">Price</label>
                    <input class="form-control" name="price" id="price" type="text" placeholder="Enter Price">
                  </div>

                  <div class="form-group">
                    <label for="exampleFormControlTextarea1">Description</label>
                    <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3"></textarea>
                  </div>

                  <div class="form-group">
                    <label for="exampleFormControlFile1">Accessory's Image</label>
                    <input class="form-control-file" name="front_image" id="exampleFormControlFile1" type="file">
                  </div>

                  <button class="btn btn-primary mb-3" type="submit">Create Now</button>
                  <a href="{{url('admin/accessories/list')}}" class="btn btn-falcon-default mb-3"><b>View</b></a>
            </form>
    </div>
</div>