$(document).ready(function() {
    const site_url = "http://localhost/finded_ssit5/";

    $('#showsignupform').click(function() {
        $('#login-form-box').hide();
        $('#register-form-box').show();
    });

    $('#showsigninform').click(function() {
        $('#register-form-box').hide();
        $('#login-form-box').show();
    });

    $('#showforgetform').click(function() {
        $('#login-form-box').hide();
        $('#forget-form-box').show();
    });

    $('#showsignbackform').click(function() {
        $('#login-form-box').show();
        $('#forget-form-box').hide();
    });

    $('#registerUser').click(function(e) {
        if ($("#register-form")[0].checkValidity()) {
            e.preventDefault();
            $("#registerUser").val("Loding......").attr('disabled', true);

            if ($("#name").val() === '') {
                $("#name").addClass("is-invalid")
            } else {
                $("#name").removeClass("is-invalid")
            }

            if ($("#username").val() === '') {
                $("#username").addClass("is-invalid")
            } else {
                $("#username").removeClass("is-invalid")
            }

            if ($("#r_email").val() === '') {
                $("#r_email").addClass("is-invalid")
            } else {
                $("#r_email").removeClass("is-invalid")
            }

            if ($("#r_password").val() === '') {
                $("#r_password").addClass("is-invalid")
            } else {
                $("#r_password").removeClass("is-invalid")
            }

            if ($("#r_password").val() !== $("#c_password").val()) {
                $("#c_password").addClass("is-invalid")
            } else {
                $("#c_password").removeClass("is-invalid")
            }

            if ($("#r_password").val() === $("#c_password").val()) {
                if ($("#name").val() !== '' && $("#r_email").val() !== '') {
                    $.ajax({
                        url: site_url + "admin/action.php",
                        method: 'post',
                        data: $("#register-form").serialize() + '&action=register',
                        success: function(response) {
                            if (response === 'ok') {
                                window.location = 'dashboard.php'
                            } else {
                                $('#registerError').html(response);
                                $("#registerUser").val("Register").attr('disabled', false);
                            }
                        }
                    })
                }
            }
        }
    });


    //================login all function===========================

    $('#loginBtn').click(function(e) {
        if ($("#login-form")[0].checkValidity()) {
            e.preventDefault();
            $("#loginBtn").val("Loding......").attr('disabled', true);
            if ($("#l_email").val() === '') {
                $("#l_email").addClass("is-invalid")
            } else {
                $("#l_email").removeClass("is-invalid")
            }
            if ($("#password").val() === '') {
                $("#password").addClass("is-invalid")
            } else {
                $("#password").removeClass("is-invalid")
            }
            $.ajax({
                url: site_url + "admin/action.php",
                method: 'post',
                data: $("#login-form").serialize() + '&action=login',
                success: function(response) {
                    if (response === 'ok') {
                        window.location = 'dashboard.php'
                    } else {
                        $('#loginError').html(response);
                        $("#loginBtn").val("Sign In").attr('disabled', false);
                    }
                }
            })
        }
    });

    //================forget password all function===========================

    $('#forget-btn').click(function(e) {
        if ($("#forget-form")[0].checkValidity()) {
            e.preventDefault();
            $("#forget-btn").val("Loding......").attr('disabled', true);

            if ($("#email").val() === '') {
                $("#email").addClass("is-invalid")
            } else {
                $("#email").removeClass("is-invalid")
                $.ajax({
                    url: site_url + "admin/action.php",
                    method: 'post',
                    data: $("#forget-form").serialize() + '&action=forgetPassword',
                    success: function(response) {
                        $('#forgetPasswordError').html(response);
                        $("#forget-btn").val("Reset password").attr('disabled', false);
                        $("#email").val('');
                    }
                });
            }
        }
    });

    //================Reset password all function===========================

    $('#resetpassword').click(function(e) {
        if ($("#reset-form")[0].checkValidity()) {
            e.preventDefault();
            $("#resetpassword").val("Loding......").attr('disabled', true);
            if ($("#reset_password").val() === '') {
                $("#reset_password").addClass("is-invalid")
            } else {
                $("#reset_password").removeClass("is-invalid")
            }
            if ($("#reset_password").val() !== '' && $("#confirm_password").val() !== '') {
                if ($("#reset_password").val() !== $("#confirm_password").val()) {
                    $("#confirm_password").addClass("is-invalid")
                } else {
                    $("#confirm_password").removeClass("is-invalid")
                    $.ajax({
                        url: site_url + "admin/action.php",
                        method: 'post',
                        data: $("#reset-form").serialize() + '&action=resetPassword',
                        success: function(response) {
                            $('#resetpasswordError').html(response);
                            $("#resetpassword").val("Reset password").attr('disabled', false);
                            $("#reset_password").val('');
                            $("#confirm_password").val('');
                        }
                    });
                }
            } else {
                $("#resetpassword").val("Reset password").attr('disabled', false);
            }
            $("#resetpassword").val("Reset password").attr('disabled', false);
        }
    });




});