<form class="form" method="POST">
    <div class="row">
            <input type="hidden" name="category_id" value="<?php echo @$this->request->getQuery('category_id'); ?>" />
            <div class="col-lg-12 mb-3">
              <div class="card h-100">
                <div class="card-header">
                  <button class="btn btn-falcon-default btn-sm mr-2 mb-0" id="addKeyRow" type="button"><span class="fas fa-plus mr-1"> </span>Duplicate</button>
                  <button class="btn btn-falcon-default btn-sm mr-2 mb-0" id="subtractKeyRow" type="button"><span class="fas fa-minus mr-1"> </span>Remove</button>
                  <a href="{{ url('admin/portfolio/items?category_id='~request.getQuery('category_id')~'&title='~request.getQuery('name')) }}" class="btn btn-primary btn-sm mr-2 mb-0 pull-right">View</a>
                </div>
                <div class="card-body bg-light">

                    <div class="col-12">
                    <b><?php echo ucwords($this->request->getQuery('name')); ?></b>
                      <div class="form-row mt-4">

                        <div class="col-12">
                        {{ flash.output() }}
                          <div class="form-row align-items-center">
                            <div class="col">
                              <input type="hidden" value="<?php echo $this->request->getQuery('category_id'); ?>" name="category_id[]" />
                              <div class="form-group"><label class="ls text-600 font-weight-semi-bold mb-0">Portfolio Title</label><input autocomplete="off" name="title[]" class="form-control input-lg" type="text" placeholder="Type portfolio title"></div>
                            </div>
                            <div class="col">
                              <div class="form-group"><label class="ls  text-600 font-weight-semi-bold mb-0">Description</label><input autocomplete="off" name="description[]" class="form-control" type="text" placeholder="Describe the portfolio"></div>
                            </div>
                            <div class="col">
                              <div class="form-group"><label class="ls  text-600 font-weight-semi-bold mb-0">Amount(&#8358;)</label><input autocomplete="off" name="price[]" class="form-control" type="text" placeholder="Price Tag"></div>
                            </div>
                          </div>

                        </div>

                      </div>
                    </div>

                </div>
              </div>
            </div>

          </div>

    <div class="row hidePartRow" id="hideDisplay" style="display:none;">
        <div class="col-lg-12">
          <div class="card  h-100">

            <div class="card-body bg-light">

                <div class="col-12">

                  <div class="form-row">

                    <div class="col-12">

                      <div class="form-row align-items-center">
                          <div class="col">
                            <input type="hidden" value="<?php echo $this->request->getQuery('category_id'); ?>" name="category_id" />
                            <div class="form-group"><label class="ls text-600 font-weight-semi-bold mb-0">Portfolio Title</label><input autocomplete="off" name="title[]" class="form-control input-lg" type="text" placeholder="Type portfolio title"></div>
                          </div>
                          <div class="col">
                            <div class="form-group"><label class="ls  text-600 font-weight-semi-bold mb-0">Description</label><input autocomplete="off" name="description[]" class="form-control" type="text" placeholder="Describe the portfolio"></div>
                          </div>
                          <div class="col">
                            <div class="form-group"><label class="ls  text-600 font-weight-semi-bold mb-0">Amount(&#8358;)</label><input autocomplete="off" name="price[]" class="form-control" type="text" placeholder="Price Tag"></div>
                          </div>
                        </div>
                    </div>

                  </div>
                </div>

            </div>
          </div>
        </div>

    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="mt-2">
                <button class="btn btn-outline-primary mr-1 mb-1" type="submit">Create Item Now</button>
            </div>
        </div>

    </div>
</form>