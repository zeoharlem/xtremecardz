<div class="row">
{% for keys,values in pager.getPaginate().items %}
    <div class="fs--1 col-md-6 mb-md-3">
      <a class="notification" href="{{ url('admin/projects/setproject?project_id='~values.project_id~'&project_title='~values.project_title~'&user_id='~values.user_id) }}">
        <div class="notification-avatar">
          <div class="avatar avatar-2xl mr-3">
            <img class="rounded-circle" src="../assets/img/team/1.jpg" alt="" />
          </div>
        </div>
        <div class="notification-body">
          <p class="mb-1"><strong style="font-size:15px;">{{values.project_title | capitalize}}</strong><br/>Number of Uploads: <?php echo count($values->getProjectSetAlias()); ?></p>
          <span class="notification-time"><span class="mr-1" role="img" aria-label="Emoji">💬</span><?php echo $values->getRegisterProjects()->company_name; ?></span>
        </div>
      </a>
    </div>
{% endfor %}
</div>
{{ partial('partials/pagination', [
    'page': pager.getPaginate(),
    'limit': pager.getLimit()
  ])
}}