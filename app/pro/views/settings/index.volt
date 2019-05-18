<div class="row no-gutters">
    <div class="col-lg-12 pr-lg-2">
      <div class="card mb-3">
        <div class="card-header">
          <h5 class="mb-0">Create | Edit Profile</h5>
        </div>
        <div class="card-body bg-light">
          <form method="POST" action="{{ url('pro/settings') }}">
            <div class="row">
              {{ flash.output() }}
              <div class="col-lg-6">
                <div class="form-group"><label for="firstname">First Name</label><input required name="firstname" placeholder="Firstname" class="form-control" id="firstname" type="text"></div>
              </div>
              <div class="col-lg-6">
                <div class="form-group"><label for="lastname">Last Name</label><input required name="lastname" placeholder="Lastname" class="form-control" id="lastname" type="text"></div>
              </div>
              <div class="col-lg-6">
                <div class="form-group"><label for="email1">Email</label><input readonly value="<?php echo $this->session->get('auth')['email']; ?>" name="email" placeholder="Official Email Address e.g anthony@xtremecardz.com" class="form-control" id="email1" type="text"></div>
              </div>
              <div class="col-lg-6">
                <div class="form-group"><label for="phone">Phone</label><input required name='phone' placeholder="Enter official phone number e.g +23487569844" class="form-control" id="phone" type="text"></div>
              </div>
              <div class="col-lg-6">
                <div class="form-group"><label for="companyname">Company Name</label><input readonly value="<?php echo $this->session->get('auth')['fullname']; ?>" name="companyname" placeholder="Type your company's name" class="form-control" id="companyname" type="text"></div>
              </div>
              <div class="col-lg-6">
                <div class="form-group"><label for="designation">Designation</label><input required name="designation" placeholder="What do you do for the company" class="form-control" id="designation" type="text"></div>
              </div>
                <div class="col-lg-12">
                <div class="form-group"><label for="company_address">Company Address</label><input required name="company_address" placeholder="Type the Company's Address" class="form-control form-control-lg" id="company_address" type="text"></div>
              </div>

              <div class="col-12">
                <div class="form-group"><label for="intro">Description</label>
                    <textarea class="form-control" name="company_description" required placeholder="Brief Description about the company" id="intro" cols="5" rows="5"></textarea>
                </div>
              </div>
              <div class="col-12 d-flex justify-content-end">
                <div class="btn-group">
                    <button class="btn btn-secondary btn-lg" type="reset">Reset</button>
                    <?php  if(!$updateBtn){ ?>
                        <button class="btn btn-primary btn-lg" name="createBtn" type="submit">Create</button>
                    <?php
                    }
                    else{
                    ?>
                        <button class="btn btn-primary btn-lg" name="updateBtn" type="submit">Update Now</button>
                    <?php
                    }
                    ?>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
</div>