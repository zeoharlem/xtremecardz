<div class="row">
<?php foreach ($pager->getPaginate()->items as $keys => $values) { ?>
    <div class="fs--1 col-md-6 mb-md-3">
      <a class="notification" href="<?= $this->url->get('backend/projects/setproject?project_id=' . $values->project_id . '&project_title=' . $values->project_title) ?>">
        <div class="notification-avatar">
          <div class="avatar avatar-2xl mr-3">
            <img class="rounded-circle" src="../assets/img/team/1.jpg" alt="" />
          </div>
        </div>
        <div class="notification-body">
          <p class="mb-1"><strong style="font-size:15px;"><?= ucwords($values->project_title) ?></strong><br/>Card Quantity: <?php echo count($values->getProjectSetAlias()); ?></p>
          <span class="notification-time"><span class="mr-1" role="img" aria-label="Emoji">💬</span>XtremeCardz</span>
        </div>
      </a>
    </div>
<?php } ?>
</div>
<?= $this->partial('partials/pagination', ['page' => $pager->getPaginate(), 'limit' => $pager->getLimit()]) ?>