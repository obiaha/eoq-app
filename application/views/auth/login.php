<div class="container">
    <div class="row">
        <div class="col-md-4 col-sm-12 mx-auto">
            <div class="card pt-4">
                <div class="card-body">
                    <div class="text-center mb-5">
                        <img src="assets/images/logo.png" height="48" class='mb-4'>
                        <h3>Login</h3>
                        <p>Harap Login Untuk Masuk Kedalam Aplikasi.</p>
                    </div>
                    <div id="alert"></div>
                    <form action="index.html">
                        <div class="form-group position-relative has-icon-left">
                            <label for="email">Email</label>
                            <div class="position-relative">
                                <input type="email" class="form-control" id="email" name="email" autocomplete="off">
                                <div class="form-control-icon">
                                    <i data-feather="mail"></i>
                                </div>
                            </div>
                        </div>
                        <div class="form-group position-relative has-icon-left">
                            <div class="clearfix">
                                <label for="password">Password</label>
                            </div>
                            <div class="position-relative">
                                <input type="password" class="form-control" id="password" name="password" autocomplete="off">
                                <div class="form-control-icon">
                                    <i data-feather="lock"></i>
                                </div>
                            </div>
                            <div class="clearfix">
                                <a href="auth-forgot-password.html" class='float-end'>
                                    <small>Forgot password?</small>
                                </a>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-12">
                                <button type="button" class="btn btn-block mb-3 btn-primary" id="btnLogin"><i data-feather="log-in"></i> Login</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $("#btnLogin").click(function() {
            var user = $("#email").val();
            var pass = $("#password").val();
            if (user.length == "" && pass.length == "") {
                $('#alert').html('Masukan Email & Password !');
                $('#alert').attr('class', 'alert alert-danger alert-dismissible');
                $('#email').attr('style', 'border: 1px solid red;');
                $('#password').attr('style', 'border: 1px solid red;');
            } else if (user.length == "") {
                $('#alert').html('Masukan Email !');
                $('#alert').attr('class', 'alert alert-danger alert-dismissible');
                $('#email').attr('style', 'border: 1px solid red;');
                $('#password').attr('style', '');
            } else if (pass.length == "") {
                $('#alert').html('Masukan Password !');
                $('#alert').attr('class', 'alert alert-danger alert-dismissible');
                $('#password').attr('style', 'border: 1px solid red;');
                $('#email').attr('style', '');
            } else {
                $('#email').attr('style', '');
                $('#password').attr('style', '');
                $.ajax({
                    type: "post",
                    url: "<?= base_url('auth/prosesLogin') ?>",
                    data: {
                        "email": user,
                        "password": pass
                    },
                    dataType: 'json',
                    success: function(result) {
                        if (result.response == "success") {
                            if (result.role == 1) {
                                $('#alert').html(result.keterangan);
                                $('#alert').attr('class', 'alert alert-success alert-dismissible');
                                setTimeout(function() {
                                    window.location.reload(1);
                                }, 2000);
                            } else {
                                $('#alert').html(result.keterangan);
                                $('#alert').attr('class', 'alert alert-success alert-dismissible');
                                setTimeout(function() {
                                    window.location.reload(1);
                                }, 2000);
                            }
                        } else {
                            $('#alert').html(result.keterangan);
                            $('#alert').attr('class', 'alert alert-danger alert-dismissible');
                            setTimeout(function() {
                                window.location.reload(1);
                            }, 2000);
                        }
                    }
                });
            }
        });
    });
</script>