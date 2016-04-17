$(document).on("DOMContentLoaded", function(e) {
    $("#modal-login-form").on("submit", function(e) {
        var login_result;
        var form = $(this);
        var submit_button = $("#modal-login-submit");
        
        submit_button.button('loading');
        
        login_result = login(
            function(data) {
                if(data.success) {
                    reload(true);
                } else {

                }
            },
            function(a, b, c) {
                console.error(a,b,c);
            }
        );
        e.preventDefault();
    });
});

function login(successCallback, errorCallback) {
    data = {
        username: $("#inputUsername").val(),
        password: $("#inputPassword").val()
    };
    $.get({
        url: "api/login.php",
        dataType: "json",
        data: data,
        success: successCallback,
        error: errorCallback,
        always: function() {
            $("#modal-login-submit").button('reset');
        }
    });
};

function login_unsuccess() {
    $("#inputUsername").parent().addClass("has-error");
    $("#inputPassword").parent().addClass("has-error");
    $("#modal-login-form").;
}