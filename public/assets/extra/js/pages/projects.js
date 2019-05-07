var SetProjectAction = function(){

    var stringVi        = 'xtremecardz';
    var urlPath         = window.location;
    var fullpath        = urlPath.protocol+'//'+urlPath.hostname+urlPath.pathname;
    var frontend        = urlPath.pathname.substring(0, urlPath.pathname.indexOf(stringVi)+stringVi.length);
    var urlRowString    = urlPath.protocol+'//'+urlPath.hostname+frontend;

    var customQtyRowAction  = function(){
        var customButtonRow     = $('#customQtyRow');
        var customSelectRow     = $('#quantityOfCard');
        var customQtyDivRow     = $('#customQtyDivRow');
        var quantityOfDivRow    = $('#quantityOfDivRow');
        customButtonRow.click(function(){
            if(customSelectRow.hasClass('d-none')){
                customSelectRow.removeClass('d-none');
                customQtyDivRow.addClass('d-none')
            }
            else {
                customSelectRow.addClass('d-none');
                customQtyDivRow.removeClass('d-none')
            }
        });
    }

    var removeWhiteSpaces   = function(){
        $("input[type=text]").on({
            // keydown: function(e) {
            //     if (e.which === 32)
            //         return false;
            // },
            change: function() {
                //this.value = this.value.replace(/\s/g, "");
                this.value = $.trim(this.value);
            }
        });
    }

    var handleDropZoneUpload    = function(){
        var myDropzone = new Dropzone("#myAwesomeDropzone", { url: urlRowString+"/backend/projects/zipfile"});
        myDropzone.on("sending", function(file, xhr, formData){
            formData.append("filesize", file.size);
        });
        myDropzone.on("success", function(file, xhr){
            var dataString  = JSON.stringify(xhr);
            if(dataString.status === "OK"){
                alert(dataString.message);
                //location.href   = urlRowString+'/backend/projects/list'
            }
        });
        setTimeout(function(){
            myDropzone.on("complete", function(file){
                myDropzone.removeFile(file);
                location.href   = urlRowString+'/backend/projects/list'
            });
        }, 5000);
    }

    return {
        projectInit: function(){
            customQtyRowAction();
            removeWhiteSpaces();
            handleDropZoneUpload();
        }
    }
}();

//
$(document).ready(function(){
    SetProjectAction.projectInit();
});