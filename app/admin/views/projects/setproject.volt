<div class="card-body bg-light">
  <div class="row">
    <div class="col-12">
    {{flash.output()}}
      <form method="POST" enctype="multipart/form-data">

        <div class="form-group">
            <h3>{{ project_title | capitalize }}</h3>
        </div>
        <div class="form-group">
          <label for="typeOfCard">Select Type of Card</label>
          <select class="form-control" id="typeOfCard" name="type_of_card">
          <?php foreach($card_types as $key => $value): ?>
            <option value="<?php echo $value['cardtype_id']; ?>"><?php echo ucwords($value['cardtype_title']); ?></option>
          <?php endforeach; ?>
          </select>
        </div>

        <div class="form-group" id="quantityOfDivRow">
          <label for="quantityOfCard">Quantity(ies) of Card</label>
          <select class="form-control" id="quantityOfCard" name="quantity2">
            <?php for($n = 100; $n <= 1000; $n += 100){  ?>
                <option value="<?php echo $n; ?>"><?php echo $n; ?></option>
            <?php } ?>
          </select>
          <div class="d-none" id="customQtyDivRow">
            <input class="form-control" id="customQtyInput" name="quantity" type="number" placeholder="Type the Quantity You Want">
          </div>
          <a href="javascript:void(0)" style="text-decoration:none;" id="customQtyRow"><small class="text-muted">Select Custom Quantity <i class="fas fa-plus mr-1">+</i></small></a>
        </div>

        <div class="form-group">
          <label for="csvUploadType"><b>Upload CSV File</b></label>
          <input class="form-control-file" name="project_file" id="csvUploadType" type="file">
          <input class="form-control-file" name="project_id" value="{{ project_id }}" type="hidden">
        </div>

        <div class="form-group">
            <div class="btn-group">
                <button class="btn btn-lg btn-outline-primary mb-3" type="submit">Submit Project</button>
            </div>
        </div>
      </form>
    </div>
  </div>
</div>