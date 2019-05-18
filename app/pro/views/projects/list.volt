
{% block content %}

<div class="row">
    <div class="col-12">
        {{ flash.output() }}
        <table class="table table-sm table-dashboard statusShow display responsive no-wrap mb-0 fs--1 w-100">
          <thead class="bg-200">
            <tr>
              <th>S/N</th>
              <th>Project Title</th>
              <th>Company</th>
              <th>Status</th>
              <th>Qty</th>
              <th>Downloads</th>
            </tr>
          </thead>
          <tbody class="bg-white">

          </tbody>

        </table>
    </div>
</div>


{% endblock %}