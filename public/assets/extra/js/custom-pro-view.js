$(document).ready(function(){
    var stringVi        = 'xtremecardz';
    var urlPath         = window.location;
    var fullpath        = urlPath.protocol+'//'+urlPath.hostname+urlPath.pathname;
    var frontend        = urlPath.pathname.substring(0, urlPath.pathname.indexOf(stringVi)+stringVi.length);
    var urlRowString    = urlPath.protocol+'//'+urlPath.hostname+frontend;


    var tableStatusView = $('.statusShow').DataTable({
        "ajax": {
            url: urlRowString+"/pro/production/get",
            type: "POST",
        },
        "processing": true,
        "serverSide": true,
        columns:[
            { "data": "setproject_id" },
            { "data": "project_title" },
            { "data": "company_name" },
            { "data": "status" },
            { "data": "quantity" },
            { "data": "setproject_id" },
        ],
        "columnDefs": [
            // {
            //     "targets": -1,
            //     "data": null,
            //     "render": function ( data, type, row, meta ) {
            //         var statusRow   = row['status'] === 'completed' ? 'disabled' : '';
            //         return "<div class='btn-group'>" +
            //             "<button title='"+row['setproject_id']+"' class='btn btn-sm btn-warning signature' style='font-size: 12px; !important;'"+statusRow+">Confirm Now</button>"+
            //             "</div>"
            //     }
            // },
            {
                "targets": -1,
                "data": null,
                "render": function ( data, type, row, meta ) {
                    var zipFileRow      = row['check_zip_fl'] ? 'disabled' : '';
                    var signFileRow     = row['check_sign_fl'] ? 'disabled' : '';

                    return "<div class='btn-group'>" +
                        "<a href='"+urlRowString+"/pro/production/downloads?project_id="+row['project_id']+"&project_title="+row['project_title']+"&setproject_id="+row['setproject_id']+'&user_id='+row['user_id']+"&type=csv&file="+row['card_csv_file']+"' class='btn btn-sm btn-outline-primary signature' style='font-size: 12px; !important;' target='_blank'>CSV</a>"+
                        "<a href='"+urlRowString+"/pro/production/downloads?project_id="+row['project_id']+"&project_title="+row['project_title']+"&setproject_id="+row['setproject_id']+'&user_id='+row['user_id']+"&type=zipimages&file="+row['zip_image_url']+"' class='btn btn-sm btn-outline-warning signature' style='font-size: 12px; !important;' target='_blank'>Images</a>"+
                        "<a href='"+urlRowString+"/pro/production/downloads?project_id="+row['project_id']+"&project_title="+row['project_title']+"&setproject_id="+row['setproject_id']+'&user_id='+row['user_id']+"&type=signatures&file="+row['sign_image_url']+"' class='btn btn-sm btn-outline-danger signature' style='font-size: 12px; !important;' target='_blank'>Signs</a>"+
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
        ]

    });

    $('.statusShow tbody').on('click','button', function(){
        var rowData     = tableStatusView.row($(this).parents('tr')).data();
        var confirmed   = confirm("Have you Received the Cards from Production? If yes click Ok else Cancel");
        if(confirmed){
            $.ajax({
                url: urlRowString+"/pro/production/fixstatus",
                data: {id: rowData['setproject_id']},
                type: "POST",
                success: function(result){
                    if(result.status === "OK"){
                        tableStatusView.draw();
                    }
                }
            });
        }
    });

    function toTitleCase(str){
        return str.replace(/\w\S*/g, function(txt){return txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase();});
    }
});
