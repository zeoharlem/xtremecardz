<div class="card mb-3">
    <div class="card-header">
      <h5 class="mb-0">Album for <small>{{ this.request.getQuery('name') | capitalize }}</small></h5>
    </div>
    <div class="card-body bg-light">
      <div class="row">
        <div class="col-12">
        {{  flash.output() }}
          <form method="POST">
            <div class="form-group">
              <input class="form-control" required id="title" name="title" type="text" placeholder="Type the Album Name">
            </div>
            <div class="form-group">
                <button class="btn btn-outline-primary" type="submit">Create Album</button>
            </div>
          </form>
        </div>
       </div>
       <?php if($albums){ ?>
       {% for keys,values in albums %}
          <div class="fs--1 col-md-6 mb-md-3">
            <a class="notification" href="{{ url('admin/portfolio/images?item_id='~values.item_id~'&category_id='~values.album_id~'&name='~values.title~'&album_id='~values.album_id~'&f='~values.description) }}">
              <div class="notification-avatar">
                <div class="avatar avatar-2xl mr-3">
                  <img class="rounded-circle" src="../assets/img/team/1.jpg" alt="" />
                </div>
              </div>
              <div class="notification-body">
                <p class="mb-1"><strong style="font-size:15px;">{{values.title | capitalize}}</strong><br/>Category Number: <?php //echo count($values->getProjectSetAlias()); ?></p>
                <span class="notification-time"><span class="mr-1" role="img" aria-label="Emoji">💬</span>XtremeCardz</span>
              </div>
            </a>
          </div>
      {% endfor %}

      <?php } ?>
      </div>

</div>