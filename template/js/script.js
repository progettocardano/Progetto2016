$(document).on("DOMContentLoaded", function(e) {
    $("#modal-login-form").on("submit", function(e) {
        var login_result;
        var form = $(this);
        var submit_button = $("#modal-login-submit");
        
        submit_button.button('loading');
        
        login_result = login(
            function(data) {
                if(data.success) {
					console.log(data.message);
                    location.reload(true);
                } else {
					login_unsuccess(data.message);
                }
            },
            function(a, b, c) {
                console.error(a,b,c);
            }
        );
        e.preventDefault();
    });
	$("#modal-logout-button").on("click", function(e) {
		$(this).button('loading');
		logout(
			function(data) {
				if(data.success) {
					console.log(data.message);
					location.reload(true);
				}
			},
			function(a, b, c) {
				console.error(a,b,c);
			}
		);
	});
});

function logout(successCallback, errorCallback) {
    $.ajax({
		method: "GET",
		url: "api/logout.php",
		dataType: "json",
		success: successCallback,
		error: errorCallback,
		complete: function() {
			$("#modal-logout-button").button('reset');
		}
	});
}

function login(successCallback, errorCallback) {
    data = {
        username: $("#inputUsername").val(),
        password: $("#inputPassword").val()
    };
    $.ajax({
		method: "GET",
        url: "api/login.php",
        dataType: "json",
        data: data,
        success: successCallback,
        error: errorCallback,
        complete: function() {
            $("#modal-login-submit").button('reset');
        }
    });
};

function login_unsuccess(message) {
	var alert = $('<div class="alert alert-danger" role="alert">\
		<button type="button" class="close" data-dismiss="alert">\
			<span aria-hidden="true">&times;</span>\
		</button>\
		<strong>Attenzione!</strong> ' + message + '</div>');
    $("#inputUsername").parent().addClass("has-error");
    $("#inputPassword").parent().addClass("has-error");
    $("#modal-login-form .modal-body").append(alert);
}