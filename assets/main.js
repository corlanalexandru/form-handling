$(document).ready(function() {
    function validateJSON(str) {
        try {
            JSON.parse(str);
        } catch (e) {
            return false;
        }
        return true;
    }
    function FormToAjax(form, url, type, e, errorSlug = null, redirectToURL = null) {
        $('#submit-btn').hide();
        $('.mandatory').css('display','none').html('');
        $.ajax({
            type: type,
            url: url,
            data: form,
            contentType: false,
            cache: false,
            processData: false,
            error: function (data) {   
                $('#submit-btn').show();
                if(validateJSON(data)) {
                    var fields = JSON.parse(data.responseText).errors;
                    // Handle 403 bad request
                    if (fields !== undefined) { 
                        for (var error in fields) {
                            // alert('#mandatory_' + errorSlug + '_' + fields[error]['path']);
                            $('#mandatory_' + errorSlug + '_' + fields[error]['path']).css('display', 'block').html(fields[error]['message']);
                        }
                    }
                    // Handle 404 not found
                    else { 
                        var generalError = JSON.parse(data.responseText).result.message;
                        if(generalError.length > 0) {
                            $('#mandatory_' + errorSlug + '_general_errors').css('display', 'block').html(generalError);
                        }
                        
                    }
                }
                // Handle other errors
                else {
                    $('#mandatory_' + errorSlug + '_general_errors').css('display', 'block').html('Unexpected error'); 
                }     
            },
            success: function (data) {
                $('#submit-btn').show();
                if (redirectToURL !== null) {
                    $('#mandatory_'+errorSlug+'_success').html(JSON.parse(data).success[0]['message']);
                    $('#mandatory_'+errorSlug+'_success').css('display','block');
                    // Uncomment lines below to redirect to custom URL

                    // window.location.href = redirectToURL;
                    // window.location.href.setTimeout(() => {
                    // }, 1500);
                    // window.location.href;
                }

            }
        });
        if (e !== null) {
            e.preventDefault();
        }
    }
    $(document).on('submit', '#RegisterForm', function(e) {
        FormToAjax(new FormData(this), '/forms/register', 'POST', e, 'register','/forms/');
    });    
});

