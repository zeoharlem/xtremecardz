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
        //var quantityOfDivRow    = $('#quantityOfDivRow');
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
        //var myDropzone = new Dropzone("#myAwesomeDropzone", { url: urlRowString+"/admin/projects/zipfile" });
        var myDropzone = $('#myAwesomeDropzone').dropzone({
            maxFilesize: 100,
            timeout: 0,
            url: urlRowString+"/admin/projects/zipfile",
            init: function(){
                this.on("success", function(file, response){
                    var dataString  = JSON.stringify(response);
                    if(response.status === 'OK'){
                        alert(dataString);
                        location.href   = urlRowString+'/admin/projects/list'
                    }
                    else{
                        alert(dataString);
                        this.removeFile(file);
                    }
                })
            }
        });
    }

    var handleDropZoneSignUpload = function(){
        var myDropZoneBox   = $("#mySignDropZone").dropzone({
            maxFilesize: 100,
            timeout: 0,
            url: urlRowString+"/admin/projects/sign",
            init: function(){
                this.on("success", function(file, response){
                    var dataString  = JSON.stringify(response);
                    if(response.status === 'OK'){
                        alert(dataString);
                        location.href   = urlRowString+'/admin/projects/list'
                    }
                    else{
                        alert(dataString);
                        this.removeFile(file);
                    }
                })
            }
        })
    }

    var handleProfileSubmit = function(){

    }

    return {
        projectInit: function(){
            customQtyRowAction();
            removeWhiteSpaces();
            handleDropZoneUpload();
            handleDropZoneSignUpload();
            handleProfileSubmit();
        }
    }
}();

//

$(document).ready(function(){
    SetProjectAction.projectInit();
});