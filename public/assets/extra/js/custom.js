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
                    var zipFileRow      = row['check_zip_fl'] ? 'disabled' : '';
                    var signFileRow     = row['check_sign_fl'] ? 'disabled' : '';

                    return "<div class='btn-group'>" +
                        "<a href='javascript:void(0);' class='btn btn-secondary btn-sm viewRow'>View</a>" +
                        "<a href='"+urlRowString+"/backend/projects/setproject?project_id="+row['project_id']+"&project_title="+row['project_title']+"' class='btn btn-sm btn-primary'>CSV</a>" +
                        "<a href='"+urlRowString+"/backend/projects/zipfile?project_id="+row['project_id']+"&project_title="+row['project_title']+"&setproject_id="+row['setproject_id']+"' class='zip btn btn-sm btn-danger "+zipFileRow+"'>ZipFile</a>"+
                        "<a href='"+urlRowString+"/backend/projects/sign?project_id="+row['project_id']+"&project_title="+row['project_title']+"&setproject_id="+row['setproject_id']+"' class='btn btn-sm btn-outline-info signature "+signFileRow+"'>Signature</a></div>"
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
        var rowData = tableRow.row($(this).parents('tr')).data();
        if(rowData['zip_images_id'] !== null) {
            var confirmed   = confirm('Are you sure? It might take some seconds opening it');
            if(confirmed){
                //alert(rowData['zip_images_id']);
                window.location.href    = urlRowString+'/backend/projects/exposed?project_id='+rowData['project_id']+"&setproject_id="+rowData['setproject_id']+'&zipfile_id='+rowData['zip_images_id'];
            }
        }
        else {
            alert("Seems you have not uploaded a Zipped Images");
        }
    });

    var tableInvoiceRow = $('#tableInvoiceRow').DataTable();

    function toTitleCase(str){
        return str.replace(/\w\S*/g, function(txt){return txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase();});
    }
});
