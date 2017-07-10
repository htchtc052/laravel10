$ (function(){
    $("#loginmodal_sbtn").click(function(){
  
    var queryString = $('#loginmodal_form').formSerialize();
   
   $.ajax({
            url: '/login',
            data: queryString,
            dataType: 'json',
            type: 'post',
            beforeSend: function() { 
            },
            error: function (json) {
                //errorsHtml = '<ul style="color:red;">';
                console.log($.parseJSON(json.responseText));
                
                $(".form_errors").hide();
                $.each($.parseJSON(json.responseText), function( key, value ) {   
                    console.log("key", key, "value",value);
                    //errorsHtml += '<li>' + value[0] + '</li>'; 

                    if (key=="auth") {
                        $('#loginmodal_email_error').html(value);
                        $('#loginmodal_email_error').show();
                    }
                    
                    if (key=="email") {
                        $('#loginmodal_email_error').html(value);
                        $('#loginmodal_email_error').show();
                    }
                    
                    if (key=="password") {
                        $('#loginmodal_password_error').html(value);
                        $('#loginmodal_password_error').show();
                    }
                    
                });
                //errorsHtml += '</ul>';
                //console.log(errorsHtml);
                
                //$('#form_errors').html( errorsHtml );
                //$('#form_errors').show(); 

            },
            success: function (json) {
                //$(".form_all_errors").hide();
                $(".form_errors").hide();
               
                setTimeout(function() {
                   location.href = json.redirect_to; 
                }, 100);
            }
        });
    return false;
});

});