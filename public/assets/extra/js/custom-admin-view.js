$(document).ready(function(){
    var stringVi        = 'xtremecardz';
    var urlPath         = window.location;
    var fullpath        = urlPath.protocol+'//'+urlPath.hostname+urlPath.pathname;
    var frontend        = urlPath.pathname.substring(0, urlPath.pathname.indexOf(stringVi)+stringVi.length);
    var urlRowString    = urlPath.protocol+'//'+urlPath.hostname+frontend;

    var tableRow    = $('.dataTableRowProject').DataTable({
        //"ajax": urlRowString+"/admin/projects/get",
        "ajax": {
            url: urlRowString+"/admin/projects/get",
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
            { "data": "project_id" },
            { "data": "project_id" },
        ],
        "columnDefs": [
            {
                "targets": 5,
                "data": null,
                "render": function ( data, type, row, meta ) {
                    var zipFileRow      = row['check_zip_fl'] ? 'disabled' : '';
                    var signFileRow     = row['check_sign_fl'] ? 'disabled' : '';

                    return "<div class='btn-group'>" +

                        "<a href='"+urlRowString+"/admin/projects/setproject?project_id="+row['project_id']+"&project_title="+row['project_title']+'&user_id='+row['user_id']+"' class='btn btn-sm btn-primary' style='font-size: 12px; !important;'>CSV</a>" +
                        "<a href='"+urlRowString+"/admin/projects/zipfile?project_id="+row['project_id']+"&project_title="+row['project_title']+"&setproject_id="+row['setproject_id']+'&user_id='+row['user_id']+"' class='zip btn btn-sm btn-danger "+zipFileRow+"' style='font-size: 12px; !important;'>Images</a>"+
                        "<a href='"+urlRowString+"/admin/projects/sign?project_id="+row['project_id']+"&project_title="+row['project_title']+"&setproject_id="+row['setproject_id']+'&user_id='+row['user_id']+"' class='btn btn-sm btn-warning signature "+signFileRow+"' style='font-size: 12px; !important;'>Signs</a>"+
                        "</div>"
                }
            },
            {
                "targets": 6,
                "data": null,
                "render": function ( data, type, row, meta ) {
                    var zipFileRow      = row['check_zip_fl'] ? 'disabled' : '';
                    var signFileRow     = row['check_sign_fl'] ? 'disabled' : '';

                    return "<div class='btn-group'>" +
                        "<a href='"+urlRowString+"/admin/production/downloads?project_id="+row['project_id']+"&project_title="+row['project_title']+"&setproject_id="+row['setproject_id']+'&user_id='+row['user_id']+"&type=csv&file="+row['card_csv_file']+"' class='btn btn-sm btn-outline-primary signature' style='font-size: 12px; !important;' target='_blank'>CSV</a>"+
                        "<a href='"+urlRowString+"/admin/production/downloads?project_id="+row['project_id']+"&project_title="+row['project_title']+"&setproject_id="+row['setproject_id']+'&user_id='+row['user_id']+"&type=zipimages&file="+row['zip_image_url']+"' class='btn btn-sm btn-outline-warning signature' style='font-size: 12px; !important;' target='_blank'>Images</a>"+
                        "<a href='"+urlRowString+"/admin/production/downloads?project_id="+row['project_id']+"&project_title="+row['project_title']+"&setproject_id="+row['setproject_id']+'&user_id='+row['user_id']+"&type=signatures&file="+row['sign_image_url']+"' class='btn btn-sm btn-outline-danger signature' style='font-size: 12px; !important;' target='_blank'>Signs</a>"+
                        "</div>"
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
                    return "<a href='javascript:void(0);' class='viewRow' style='font-size: 12px; !important;'><b>"+toTitleCase(row['project_title'])+"</b></a>";
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
                window.location.href    = urlRowString+'/admin/projects/exposed?project_id='+rowData['project_id']+"&setproject_id="+rowData['setproject_id']+'&zipfile_id='+rowData['zip_images_id']+'&user_id='+rowData['user_id'];
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
