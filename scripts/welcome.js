$(document).ready(function() {
        // signup username validation
        $('#usernamefield').focus(function() {
            $(this).keyup(function(e) {
                let len = parseInt($(this).val().length);
                if (e.keyCode >= 65 && e.keyCode <= 90 || e.keyCode >= 97 && e.keyCode <= 122)
                {
                    $(this).removeClass('is-invalid');
                    $(this).addClass('is-valid');
                }
                else if (e.keyCode == 8 || e.keyCode == 46 || e.keyCode == 37 || e.keyCode == 39 || e.keyCode == 8)
                {
                    $(this).removeClass('is-invalid');
                    $(this).addClass('is-valid');
                }
                else if (e.keyCode < 65 || e.keyCode > 90 && e.keyCode < 97 || e.keyCode > 122)
                {
                    $(this).addClass('is-invalid');
                    $(this).removeClass('is-valid');
                }
                if (len < 8 || len > 20)
                {
                    $(this).addClass('is-invalid');
                    $(this).removeClass('is-valid');
                }
            })
        })
        // signup password validation
        $('#passwordfield').focus(function() {
            let valu2 = $('#repasswordfield').val();
            $(this).keyup(function(e) {
                let valu1 = $(this).val();
                let len = parseInt($(this).val().length);
                if (e.keyCode >= 65 && e.keyCode <= 90 || e.keyCode >= 97 && e.keyCode <= 122)
                {
                    $(this).removeClass('is-invalid');
                    $(this).addClass('is-valid');
                }
                else if (e.keyCode == 8 || e.keyCode == 46 || e.keyCode == 37 || e.keyCode == 39 || e.keyCode == 8)
                {
                    $(this).removeClass('is-invalid');
                    $(this).addClass('is-valid');
                }
                else if (e.keyCode < 65 || e.keyCode > 90 && e.keyCode < 97 || e.keyCode > 122)
                {
                    $(this).addClass('is-valid');
                    $(this).removeClass('is-invalid');
                }
                if (len < 8 || len > 20)
                {
                    $(this).addClass('is-invalid');
                    $(this).removeClass('is-valid');
                }
                if (valu1 != valu2) {
                    $('#repasswordfield').addClass('is-invalid');
                    $('#repasswordfield').removeClass('is-valid');
                }
            })
        })
        // signup repassword field validation
        $('#repasswordfield').focus(function() {
            $('#pills-profile').removeClass('was-validated');
            let val2 = $('#passwordfield').val();
            $(this).keyup(function(e) {
                let val1 = $(this).val();
                if (val1 != val2) {
                    $(this).addClass('is-invalid');
                    $(this).removeClass('is-valid');
                }
                else {
                    $(this).addClass('is-valid');
                    $(this).removeClass('is-invalid');
                }
            })
        })
        // signup answer field validation
        $('#answerfield').keyup(function() {
            let len = parseInt($(this).val().length);
            if (len > 20)
                {
                    $(this).addClass('is-invalid');
                    $(this).removeClass('is-valid');
                }
            else {
                $(this).addClass('is-valid');
                $(this).removeClass('is-invalid');
            }

        })
        // handling validations when signup button clicked
        $('#signupsubmit').click(function(e) {
            e.preventDefault();   
                if($('#usernamefield')) {
                    let len = parseInt($('#usernamefield').val().length);
                    if (len < 1) {
                        $('#usernamefield').addClass('is-invalid');
                        $('#usernamefield').removeClass('is-valid');
                        return;
                    }
                }
                if($('#passwordfield')) {
                    let len = parseInt($('#passwordfield').val().length);
                    if (len < 1) {
                        $('#passwordfield').addClass('is-invalid');
                        $('#passwordfield').removeClass('is-valid');
                        return;
                    }
                }
                if($('#repasswordfield')) {
                    let len = parseInt($('#repasswordfield').val().length);
                    if (len < 1) {
                        $('#repasswordfield').addClass('is-invalid');
                        $('#repasswordfield').removeClass('is-valid');
                        return;
                    }
                }
                if($('#securityquestion')) {
                    if($('#securityquestion option:selected').val() == "null") {
                        $('#securityquestion').addClass('is-invalid');
                        return;
                    }
                }
                if($('#answerfield')) {
                    let len = parseInt($('#answerfield').val().length);
                    if (len < 1) {
                        $('#answerfield').addClass('is-invalid');
                        $('#answerfield').removeClass('is-valid');
                        return;
                    }
                }
                if ($('#pills-profile input').hasClass('is-invalid') || $('#pills-profile select').hasClass('is-invalid')) {
                    return;
                }
                    var username = $('#usernamefield').val();
                    var password = $('#passwordfield').val();
                    var secques = $('#securityquestion').val();
                    var ansfil = $('#answerfield').val();

                    var xhr = new XMLHttpRequest();
                    xhr.open("GET", `ajax/signuphandler.php?username=${username}` , true);
                    xhr.send();
                    xhr.onreadystatechange = function() {

                        if (this.readyState == 4 && this.status == 200) {
                            if (this.response == '1') {
                                $('#pills-profile').prepend(`<div class="alert alert-warning alert-dismissible fade show" role="alert">
                                There is already an account with these credentials exists!
                                <button type="button" class="close bg-transparent" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                                </div>`);
                                $('#usernamefield, #passwordfield, #repasswordfield, #answerfield').val('');
                                $('#usernamefield, #passwordfield, #repasswordfield, #securityquestion, #answerfield').removeClass('is-valid');
                                $('#securityquestion option[value="null"]').prop('selected', true);
                                return;
                            }
                            var xhr1 = new XMLHttpRequest();
                            xhr1.open("GET", `ajax/usersignup.php?username=${username}&password=${password}&securityques=${secques}&securityans=${ansfil}`, true);
                            xhr1.send();
                            xhr1.onreadystatechange = function() {
                                if (this.readyState == 4 && this.status == 200) {
                                    $('#answerfield').attr('hidden', 'hidden');
                                    $('.alert-success').removeAttr('hidden');
                    
                                    $('#pills-home').addClass('show active');
                                    $('#pills-profile').removeClass('show active');
                                    $('#pills-home-tab').addClass('active');
                                    $('#pills-profile-tab').removeClass('active');
                        
                                    $('#usernamefield, #passwordfield, #repasswordfield, #answerfield').val('');
                                    $('#usernamefield, #passwordfield, #repasswordfield, #securityquestion, #answerfield').removeClass('is-valid');
                                    $('#securityquestion option[value="null"]').prop('selected', true);
                                }
                            }
                        }
                      };
        })
        // Hiding success alert
        $('#pills-profile-tab').click(function() {
            $('.alert-success').attr('hidden', 'hidden');
        })
        // showing signup answer field on security question change
        $('#securityquestion').change(function() {
            $('#answerfield').removeAttr('hidden');
            $(this).removeClass('is-invalid');
            $(this).removeClass('is-valid');
        })

        // signin validations

        $('#signinuser').keyup(function() {
            $(this).removeClass('is-invalid');
        })

        $('#signinpass').keyup(function() {
            $(this).removeClass('is-invalid');
        })
})