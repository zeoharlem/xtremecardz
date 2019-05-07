var SnippetRegister = function() {

    var handleSignUpFormSubmit = function () {
        var registerButton  = $("#registerButton");
        var formRegistAct   = $("#registerForm");
        var optionsRegister = {
            target: '#responseJerk',
            beforeSubmit: validate,
            success: showResponse,
            clearForm: true,
            type: 'POST'
        }
        formRegistAct.submit(function(){
            registerButton.text("Please Wait").prop('disabled', true);
            $(this).ajaxSubmit(optionsRegister);
            return false;
        });
    }

    // pre-submit callback
    function showRequest(formData, jqForm, options) {
        var queryString = $.param(formData);
        alert('About to submit: \n\n' + queryString);
        return true;
    }

// post-submit callback
    function showResponse(responseText, statusText, xhr, $form)  {
        $('#successBadge').addClass('show').css({'display':'block'});
        alert('status: ' + statusText + '\n\nresponseText: \n' + responseText +
            '\n\nThe output div should have already been updated with the responseText.');
        if(responseText.status === "OK"){
            $("#responseJerk").html("<b>"+responseText.data['fullname']+"</b> "+responseText.message);
            $('#registerButton').text("Register").prop("disabled", false);
        }
    }

    function validate(formData, jqForm, options) {
        for (var i = 0; i < formData.length; i++) {
            if (!formData[i].value) {
                alert('Please enter a value for ' + formData[i].name);
                return false;
            }
        }
        return !checkPassword() ? alert("password never matched") : true;
        //alert('Both fields contain values.');

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
        mainInit: function(){
            handleSignUpFormSubmit();
        }
    };
}();

$(document).ready(function() {
    SnippetRegister.mainInit();
});