
{% block content %}

<div class="row">
    <div class="col-12">
        {{ flash.output() }}
        <table class="table table-sm table-dashboard dataTableRowProject display responsive no-wrap mb-0 fs--1 w-100">
          <thead class="bg-200">
            <tr>
              <th>S/N</th>
              <th>Project Title</th>
              <th>Date Created</th>
              <th>Qty</th>
              <th>Status</th>
              <th>Uploads</th>
              <th>Downloads</th>
            </tr>
          </thead>
          <tbody class="bg-white">

          </tbody>
          <tfoot>
            <tr>
                <th>S/N</th>
                <th>Project Title</th>
                <th>Date Created</th>
                <th>Qty</th>
                <th>Status</th>
                <th>Uploads</th>
                <th>Downloads</th>
            </tr>
          </tfoot>
        </table>
    </div>
</div>


{% endblock %}