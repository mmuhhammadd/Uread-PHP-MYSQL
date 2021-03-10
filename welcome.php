<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css">
        <script defer src="https://pro.fontawesome.com/releases/v5.10.0/js/all.js" integrity="sha384-G/ZR3ntz68JZrH4pfPJyRbjW+c0+ojii5f+GYiYwldYU69A+Ejat6yIfLSxljXxD" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="scripts/welcome.js"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+KR:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
    </head>
    <body>
    <div id="welcome" class="w-100 vh-100">
            <div class="container-fluid h-100">
                <div class="row h-100 align-items-center justify-content-between">
                    <div class="col col-12 col-lg-6">
                        <div class="jumbotron jumbotron-fluid bg-transparent">
                            <div class="container">
                              <h1 class="display-4">Uread</h1>
                              <p class="lead">“One glance at a book and you hear the voice of another person, perhaps someone dead for 1,000 years. To read is to voyage through time.” – Carl Sagan</p>
                            </div>
                          </div>
                    </div>
                    <div class="col col-12 col-lg-6 d-flex flex-column justify-content-center align-items-center">
                        <div class="w-75 border border-info mb-3" id="form">
                        <ul class="nav nav-pills mb-3 justify-content-evenly" id="pills-tab" role="tablist">
                            <li class="nav-item w-50 text-center border-0 border-right-1 border-left-0 border-top-0 border-bottom-0">
                              <a class="nav-link active rounded-sm" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">SignIn</a>
                            </li>
                            <li class="nav-item w-50 text-center">
                              <a class="nav-link rounded-sm" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">SignUp</a>
                            </li>
                          </ul>
                          <div class="tab-content p-4" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                              <form>
                                <div class="alert alert-success alert-dismissible fade show" hidden role="alert">
                                  Signed up successfully!
                                  <button type="button" class="close bg-transparent" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>  
                                <div class="alert alert-warning alert-dismissible fade show font-weight-lighter" hidden id="invalidsignin" role="alert">
                                  <strong>Invalid credentials!</strong> Make sure you enter correct username and password.
                                  <button type="button" class="close bg-transparent" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <input class="form-control rounded-sm py-3 mb-4" type="text" id="signinuser" autofocus required placeholder="Username">
                                  <input class="form-control rounded-sm py-3 mb-4" type="password" id="signinpass" required placeholder="Password">
                                  <button class="btn btn-dark w-100 rounded-sm" id="signinsubmit"  type="submit">SignIn</button>
                                </form>
                                <div class="pl-2 mt-4">
                                  <!-- Button trigger modal -->
                                  <div class="text-center">
                                  <a class="text-light" id="forgot" href="#" data-toggle="modal" data-target="#exampleModalScrollable">
                                    Forgot Password?
                                  </a>
                                </div>
                                  <!-- Modal -->
                                  <div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-scrollable" role="document">
                                      <div class="modal-content rounded-sm">
                                        <div class="modal-header">
                                          <h5 class="modal-title" id="exampleModalScrollableTitle">Reset password</h5>
                                          <button type="button" class="close bg-transparent" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                          </button>
                                        </div>
                                        <div class="modal-body">
                                          <div id="step1">
                                            <div class="progress" style="height: 4px;">
                                              <div class="progress-bar bg-dark" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                            <div class="alert alert-warning alert-dismissible fade show mt-3 font-weight-lighter" hidden id="resetusererror" role="alert">
                                              Invalid credentials! Account doesn't exist.
                                              <button type="button" class="close bg-transparent" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                              </button>
                                            </div>
                                            <form class="form-group mt-4">
                                              <label>Username</label>
                                              <input class="form-control rounded-sm" id="resetusername" type="text">
                                              <small id="textHelpBlock" class="form-text text-muted mb-3 pl-1">
                                                Enter Your Username.
                                              </small>
                                              <div class="modal-footer">
                                                <button type="submit" id="step1n" class="btn btn-dark rounded-sm">Next</button>
                                              </div>
                                            </form>
                                          </div>
                                          <div id="step2" hidden>
                                            <div class="progress" style="height: 4px;">
                                              <div class="progress-bar bg-dark" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                            <div class="alert alert-warning alert-dismissible fade show mt-3 font-weight-lighter" hidden id="resetanswererror" role="alert">
                                              Wrong Answer! Please try again.
                                              <button type="button" class="close bg-transparent" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                              </button>
                                            </div>
                                            <form class="form-group mt-4">
                                              <label>Security Question</label>
                                              <input class="form-control rounded-sm" disabled id="resetquestion" type="text">
                                              <small id="textHelpBlock" class="form-text text-muted mb-3 pl-1">
                                                Your Security Question.
                                              </small>
                                              <label>Security Answer</label>
                                              <input class="form-control rounded-sm" id="resetanswer" type="text">
                                              <small id="textHelpBlock" class="form-text text-muted mb-3 pl-1">
                                                Your Security Question Answer.
                                              </small>
                                              <div class="modal-footer">
                                                <button type="button" id="step2b" class="btn btn-dark rounded-sm">Back</button>
                                                <button type="submit" id="step2n" class="btn btn-dark rounded-sm">Next</button>
                                              </div>
                                            </form>
                                          </div>
                                          <div id="step3" hidden>
                                            <div class="progress" style="height: 4px;">
                                              <div class="progress-bar bg-dark" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                            <form class="form-group mt-4">
                                              <label>New Password</label>
                                              <input class="form-control rounded-sm" id="resetpassword" type="password">
                                              <small id="textHelpBlock" class="form-text text-muted mb-3 pl-1">
                                                Your password must be 8-20 characters long.
                                              </small>
                                              <label>Password Confirmation</label>
                                              <input class="form-control rounded-sm" id="resetrepassword" type="password">
                                              <small id="textHelpBlock" class="form-text text-muted mb-3 pl-1">
                                                Your passwords must match.
                                              </small>
                                              <div class="modal-footer">
                                                <button type="button" id="step3b" class="btn btn-dark rounded-sm">Back</button>
                                                <button type="submit" id="step3n" class="btn btn-dark rounded-sm">Next</button>
                                              </div>
                                            </form>
                                          </div>
                                          <div id="step4" hidden>
                                            <div class="progress" style="height: 4px;">
                                              <div class="progress-bar bg-dark" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                            <div class="alert alert-success mt-4" role="alert">
                                                <h4 class="alert-heading font-weight-lighter">Success!</h4>
                                                <p class="font-weight-lighter">Your Password has been changed successfully.</p>
                                              </div>
                                            <div class="modal-footer">
                                                <button type="button" id="step4b" class="btn btn-dark rounded-sm">Back</button>
                                                <button type="button" id="step4n" data-dismiss="modal" class="btn btn-dark rounded-sm">Close</button>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                </div>
                                
                            <form class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                                <input class="form-control rounded-sm" id="usernamefield" type="text" required placeholder="Username">
                                <small id="textHelpBlock" class="form-text text-muted mb-3 pl-1">
                                    Your username must be 8-20 characters long, contains only letters.
                                </small>
                                <input class="form-control rounded-sm" id="passwordfield" type="password" required placeholder="Password">
                                <small id="textHelpBlock" class="form-text text-muted mb-3 pl-1">
                                    Your password must be 8-20 characters long.
                                </small>
                                <input class="form-control rounded-sm" id="repasswordfield" type="password" required placeholder="Repassword">
                                <small id="textHelpBlock" class="form-text text-muted mb-3 pl-1 ">
                                    Your passwords must match.
                                </small>
                                <div class="form-group mb-3">
                                  <select class="custom-select rounded-sm text-muted" id="securityquestion" style="font-weight: 400;" required>
                                    <option style="font-weight: 400;" disabled selected value="null">Security Question</option>
                                    <option style="font-weight: 400;" value="Your nickname?">Your nickname?</option>
                                    <option style="font-weight: 400;" value="Your pet name?">Your pet name?</option>
                                    <option style="font-weight: 400;" value="Your best friend name?">Your best friend name?</option>
                                  </select>
                                  <small id="textHelpBlock" class="form-text text-muted pl-1">
                                    Choose a security question.
                                </small>
                                </div>
                                <input class="form-control rounded-sm mb-3" hidden id="answerfield" type="text" required placeholder="Question answer">
                                <button class="btn btn-dark w-100 rounded-sm" id="signupsubmit" type="submit">SignUp</button>
                            </form>                  
                    </div>
                </div>
                </div>
            </div>
        </div>
        </div>
        <script>
          $(document).ready(function() {

            /// reset password

            $('#resetpassword').keyup(function() {
              let val = $(this).val();
              let val1 = $('#resetrepassword').val();
              if(val.length < 8) {
                $(this).addClass('is-invalid');
                $(this).removeClass('is-valid');
              }
              else {
                $(this).addClass('is-valid');
                $(this).removeClass('is-invalid');
              }
              if(val != val1) {
                $('#resetrepassword').addClass('is-invalid');
                $('#resetrepassword').removeClass('is-valid');
              }
            })
            $('#resetrepassword').keyup(function() {
              let val = $(this).val();
              let val1 = $('#resetpassword').val();
              if(val != val1) {
                $('#resetrepassword').addClass('is-invalid');
                $('#resetrepassword').removeClass('is-valid');
              }
              else {
                $(this).addClass('is-valid');
                $(this).removeClass('is-invalid');
              }
            })

            var resetpassusername;

            $('#resetusername').keyup(function() {
              $(this).removeClass('is-invalid');
            })
            $('#resetanswer').keyup(function() {
              $(this).removeClass('is-invalid');
            })
            $('#step1n').click(function(e) {
              e.preventDefault();
              resetpassusername = $('#resetusername').val();
              if(resetpassusername.length < 1) {
                $('#resetusername').addClass('is-invalid');
              }
              else {
                let xhr = new XMLHttpRequest();
                xhr.open("GET", `ajax/resetuser.php?username=${resetpassusername}`, true);
                xhr.send();
                xhr.onreadystatechange = function() {
                  if(this.readyState == 4 && this.status == 200) {
                    if(this.response == '0') {
                      $('#resetusererror').removeAttr('hidden');
                      $('#resetusername').val('');
                    }
                    else {
                      let question = this.response;
                      $('#resetquestion').val(question);
                      $('#resetusererror').attr('hidden', 'hidden');
                      $('#step1').attr('hidden', 'hidden');
                      $('#step2').removeAttr('hidden');
                    }
                  }
                }
              }
            })
            $('#step2b').click(function(e) {
              e.preventDefault();
              $('#step2').attr('hidden', 'hidden');
              $('#step1').removeAttr('hidden');
            })
            $('#step2n').click(function(e) {
              e.preventDefault();
              let answer = $('#resetanswer').val();
              if(answer.length < 1) {
                $('#resetanswer').addClass('is-invalid');
              }
              else {
                let xhr = new XMLHttpRequest();
                xhr.open("GET", `ajax/resetanswer.php?username=${resetpassusername}&answer=${answer}`);
                xhr.send();
                xhr.onreadystatechange = function() {
                  if(this.readyState == 4 && this.status == 200) {
                    if(this.response == '0') {
                      $('#resetanswererror').removeAttr('hidden');
                      $('#resetanswer').val('');
                    }
                    else {
                      $('#resetanswererror').attr('hidden', 'hidden');
                      $('#step2').attr('hidden', 'hidden');
                      $('#step3').removeAttr('hidden');
                    }
                  }
                }
              }
            })
            $('#step3b').click(function(e) {
              e.preventDefault();
              $('#step3').attr('hidden', 'hidden');
              $('#step2').removeAttr('hidden');
            })
            $('#step3n').click(function(e) {
              let pass = $('#resetpassword').val();
              e.preventDefault();
              if ($('#step3 input').hasClass('is-invalid')) {
                $('#resetpassword').focusin();
                return;
              }
              else {
                let xhr = new XMLHttpRequest();
                console.log(xhr);
                xhr.open("GET", `ajax/resetpassword.php?username=${resetpassusername}&password=${pass}`, true);
                xhr.send();
                xhr.onreadystatechange = function() {
                  if(this.readyState == 4 && this.status == 200) {
                    $('#step3').attr('hidden', 'hidden');
                    $('#resetpassword').removeClass('is-valid');
                    $('#resetrepassword').removeClass('is-valid');
                    $('#step4').removeAttr('hidden');
                  }
                }
              }
            })
            $('#step4b').click(function(e) {
              e.preventDefault();
              $('#step3').removeAttr('hidden');
              $('#step4').attr('hidden', 'hidden');
            })
            ////////////////////
            $('#signinsubmit').click(function(e){
            e.preventDefault();
            var signinusername = $('#signinuser').val();
            var signinpassword = $('#signinpass').val();
            
            var xhr2 = new XMLHttpRequest();
            console.log(xhr2);
            xhr2.open("GET", `ajax/signinvalidation.php?username=${signinusername}&password=${signinpassword}`);
            xhr2.send();
            xhr2.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    if(this.response == '1') {
                      $('#invalidsignin').attr('hidden', 'hidden');
                      location.replace('home.php');
                    }
                    else {
                        $('#invalidsignin').removeAttr('hidden');
                        $('#signinuser').val("");
                        $('#signinpass').val("");
                    }
                }
              }
            })
          })
          
        </script>
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    </body>
</html>