var SettingsRow = function() {

    var handlePasswordAction    = function(){
        $('form').submit(function(e){
            e.preventDefault();
            if(checkPassword()){
                //Ajax submission
            }
            return;
        });
    }

    function checkPassword(){
        $('#rpassword').focusout(function(){
            var pass    = $('#password').val();
            var pass2   = $('#rpassword').val();
            if(pass != pass2){
                return false;
            }
        });
        return true;
    }

    return {
        SettingsRowInit: function(){
            handlePasswordAction();
        }
    }
}();

$(document).ready(function(){
    SettingsRow.SettingsRowInit();
});