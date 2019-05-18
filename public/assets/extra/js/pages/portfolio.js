
var stringVi = 'xtremecardz';
var urlPath = window.location;
var fullpath = urlPath.protocol + '//' + urlPath.hostname + urlPath.pathname;
var frontend = urlPath.pathname.substring(0, urlPath.pathname.indexOf(stringVi) + stringVi.length);
var urlRowString = urlPath.protocol + '//' + urlPath.hostname + frontend;

$(document).ready(function(){
    var addKeyRow       = $('#addKeyRow');
    var substractBtn    = $('#subtractKeyRow');

    addKeyRow.click(function(evt){
        evt.preventDefault();
        var hidePartRow = $('.hidePartRow:first').clone();
        hidePartRow.addClass('mt-3').removeAttr("id").show();
        hidePartRow.insertAfter(".hidePartRow:last");
    });

    substractBtn.click(function(evt){
        evt.preventDefault();
        var hidePartRow = $('.hidePartRow:last:not(#hideDisplay)');
        hidePartRow.remove();
    });

    var tablePortfolioRow   = $('.tableRowPortf').dataTable({
        "processing": true,
        "serverSide": true,
        "ajax": {
            url: urlRowString+"/admin/portfolio/items",
            type: "POST",
        },
        columns:[
            { "data": "item_id" },
            { "data": "title" },
            { "data": "category" },
            { "data": "date" },
            { "data": "item_id" },
        ],
        "columnDefs": [
            {
                "targets": -1,
                "data": null,
                "render": function ( data, type, row, meta ) {
                    return "<a href='"+urlRowString+"/admin/portfolio/albums?item_id="+row['item_id']+"&category_id="+row['category_id']+"&name="+row['title']+"' class='btn btn-sm btn-primary' style='font-size: 12px; !important;'>Album</a>"
                }
            }
        ]
    });

    var dropZonePack    = $('#dropZonePackage').dropzone({
        maxFilesize: 100,
        timeout: 0,
        url: urlRowString+"/admin/portfolio/uploadimage",
        uploadMultiple: true,
        init: function(){
            this.on("sending", function(file, xhr, formData){
                formData.append("image_id", $("#item_id").val());
                formData.append("album_id", $("#album_id").val());
                formData.append("title", $("#upload_title").val());
                formData.append("album_folder", $("#album_folder").val());
            });
            this.on("success", function(file, response){
                var dataString  = JSON.stringify(response);
                alert(dataString);
            })
        }
    });
});