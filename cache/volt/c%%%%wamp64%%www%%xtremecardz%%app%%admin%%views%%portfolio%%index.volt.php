<div class="card mb-3">
    <div class="card-header">
      <h5 class="mb-0">Category</h5>
    </div>
    <div class="card-body bg-light">
      <div class="row">
        <div class="col-12">
        <?= $this->flash->output() ?>
          <form method="POST">
            <div class="form-group">
              <input class="form-control" required id="name" name="name" type="text" placeholder="Type the category title">
            </div>
            <div class="form-group">
                <button class="btn btn-outline-primary" type="submit">Create Now</button>
            </div>
          </form>
        </div>
       </div>
       <div class="row">
           <?php foreach ($pager->getPaginate()->items as $keys => $values) { ?>
               <div class="fs--1 col-md-6 mb-md-3">
                 <a class="notification" href="<?= $this->url->get('admin/portfolio/create?category_id=' . $values->category_id . '&name=' . $values->name) ?>">
                   <div class="notification-avatar">
                     <div class="avatar avatar-2xl mr-3">
                       <img class="rounded-circle" src="../assets/img/team/1.jpg" alt="" />
                     </div>
                   </div>
                   <div class="notification-body">
                     <p class="mb-1"><strong style="font-size:15px;"><?= ucwords($values->name) ?></strong><br/>Category Number: <?php //echo count($values->getProjectSetAlias()); ?></p>
                     <span class="notification-time"><span class="mr-1" role="img" aria-label="Emoji">💬</span>XtremeCardz</span>
                   </div>
                 </a>
               </div>
           <?php } ?>
           </div>
           <?= $this->partial('partials/pagination', ['page' => $pager->getPaginate(), 'limit' => $pager->getLimit()]) ?>
    </div>


</div>