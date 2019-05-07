$(document).ready(function(){
    var stringVi        = 'xtremecardz';
    var urlPath         = window.location;
    var fullpath        = urlPath.protocol+'//'+urlPath.hostname+urlPath.pathname;
    var frontend        = urlPath.pathname.substring(0, urlPath.pathname.indexOf(stringVi)+stringVi.length);
    var urlRowString    = urlPath.protocol+'//'+urlPath.hostname+frontend;

    var tableRow    = $('.dataTableRowProject').DataTable({
        //"ajax": urlRowString+"/backend/projects/get",
        "ajax": {
            url: urlRowString+"/backend/projects/get",
            type: "POST",
        },
        "processing": true,
        "serverSide": true,
        columns:[
            { "data": "project_id" },
            { "data": "project_title" },
            { "data": "date_created" },
            { "data": "quantity" },
            { "data": "status" },
            { "data": "project_id" }
        ],
        "columnDefs": [
            {
                "targets": -1,
                "data": null,
                "render": function ( data, type, row, meta ) {
                    return "<div class='btn-group'><a href='#' class='btn btn-secondary btn-sm viewRow'>View</a><a href='"+urlRowString+"/backend/projects/setproject?project_id="+row['project_id']+"&project_title="+row['project_title']+"' class='btn btn-sm btn-primary'>CSV</a><a href='"+urlRowString+"/backend/projects/zipfile?project_id="+row['project_id']+"&project_title="+row['project_title']+"&setproject_id="+row['setproject_id']+"' class='btn btn-sm btn-danger'>ZipFile</a></div>"
                }
            },
            {
                "targets": 0,
                "data": null,
                "render": function ( data, type, row, meta ) {
                    return meta.row + meta.settings._iDisplayStart + 1;
                }
            },
            {
                "targets": 1,
                "data": null,
                "render": function ( data, type, row, meta ) {
                    return '<b>'+toTitleCase(row['project_title'])+'</b>';
                }
            }
        ],

    });

    $('.dataTableRowProject tbody').on('click','button', function(){
        alert('Use dropzone');
    });

    $('.dataTableRowProject tbody').on('click','.viewRow', function(){
        alert('Modal Should Take this Place');
    });

    function toTitleCase(str){
        return str.replace(/\w\S*/g, function(txt){return txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase();});
    }
});
