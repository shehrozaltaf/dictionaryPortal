<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Login - Dictionary Portal">
    <meta name="keywords" content="Login - Dictionary Portal">
    <meta name="author" content="shahroz.khan@aku.edu">
    <title>Login - Dictionary Portal</title>
    <link href="https://fonts.googleapis.com/css?family=Muli:300,300i,400,400i,600,600i,700,700i%7CComfortaa:300,400,700"
          rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/bootstrap-extended.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/components.min.css">
    <link rel="stylesheet" type="text/css"
          href="<?php echo base_url(); ?>assets/css/core/colors/palette-gradient.min.css">
    <style>
        .error{
            border-color: #e53935;
        }
    </style>
</head>

<body class="vertical-layout vertical-menu-modern 1-column  bg-full-screen-image blank-page blank-page"
      data-open="click" data-menu="vertical-menu-modern" data-color="bg-gradient-x-purple-red" data-col="1-column">
<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-wrapper-before"></div>
        <div class="content-header row">
        </div>
        <div class="content-body">
            <section class="flexbox-container">
                <div class="col-12 d-flex align-items-center justify-content-center">
                    <div class="col-lg-4 col-md-6 col-10 box-shadow-2 p-0">
                        <div class="card border-grey border-lighten-3 px-1 py-1 m-0">
                            <div class="card-header border-0">
                                <div class="font-large-1  text-center">
                                    <h1>Login</h1>
                                    <h3>Dictionary Portal </h3>
                                </div>
                            </div>
                            <div class="card-content">

                                <div class="card-body">

                                    <fieldset class="form-group position-relative">
                                        <input type="text" class="form-control round" id="login_username"
                                               placeholder="Your Username" required>
                                        <div class="form-control-position">
                                        </div>
                                    </fieldset>
                                    <fieldset class="form-group position-relative">
                                        <input type="password" class="form-control round" id="login_password"
                                               placeholder="Enter Password" required>
                                        <div class="form-control-position">
                                        </div>
                                    </fieldset>
                                    <div class="form-group row">
                                        <div class="col-md-6 col-12 text-center text-sm-left">

                                        </div>
                                        <div class="col-md-6 col-12 float-sm-left text-center text-sm-right"><a
                                                    href="http://f48605/dictionary_portal/index.php/dashboard"
                                                    class="card-link">Forgot Password?</a></div>
                                    </div>
                                    <div id="msg" style="display: none;" class="uk-alert" data-uk-alert>
                                        <a href="javascript:void(0)" class="uk-alert-close uk-close"></a>
                                        <p id="msgText"></p>
                                    </div>
                                    <div class="form-group text-center">
                                        <button type="button" onClick="login()"
                                                class="btn round btn-block btn-glow btn-bg-gradient-x-purple-blue col-12 mr-1 mb-1">
                                            Login
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        </div>
    </div>
</div>
<script src="<?php echo base_url(); ?>assets/vendors/js/vendors.min.js" type="text/javascript"></script>
<!-- BEGIN: Page Vendor JS-->
<script src="<?php echo base_url(); ?>assets/vendors/js/forms/validation/jqBootstrapValidation.js"
        type="text/javascript"></script>
<!-- END: Page Vendor JS-->

<!-- BEGIN: Theme JS-->
<script src="<?php echo base_url(); ?>assets/js/core/app-menu.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/js/core/app.min.js" type="text/javascript"></script>
<!-- END: Theme JS-->

<script src="<?php echo base_url() ?>assets/js/core.js"></script>
<script>
    function login() {
        var errorFlag = 0;
        $('#login_username').removeClass('error');
        $('#login_password').removeClass('error');
        var data = {};
        data['UserName'] = $('#login_username').val();
        data['Password'] = $('#login_password').val();
        if (data['UserName'] == '' || data['UserName'] == undefined) {
            $('#login_username').addClass('error');
            returnMsg('msgText', 'Invalid User Name', 'uk-alert-danger', 'msg');
            errorFlag = 1;
            return false;
        }
        if (data['Password'] == '' || data['Password'] == undefined) {
            $('#login_password').addClass('error');
            returnMsg('msgText', 'Invalid Password', 'uk-alert-danger', 'msg');
            errorFlag = 1;
            return false;
        }
        if (errorFlag === 0) {
            CallAjax('<?php echo base_url('index.php/Login/getLogin')?>', data, 'POST', function (res) {
                if (res == 1) {
                    setTimeout(function () {
                        window.location.href = "<?php echo base_url() . 'index.php/dashboard' ?>";
                    }, 500);
                    returnMsg('msgText', 'Success', 'uk-alert-success', 'msg');
                } else if (res == 2 || res == 5) {
                    $('#login_password').addClass('error');
                    returnMsg('msgText', 'Invalid Password', 'uk-alert-danger', 'msg');
                } else if (res == 4) {
                    $('#login_username').addClass('error');
                    returnMsg('msgText', 'Invalid User Name', 'uk-alert-danger', 'msg');
                }  else {
                    $('#login_username').addClass('error');
                    $('#login_password').addClass('error');
                    returnMsg('msgText', 'Invalid Username/Password', 'uk-alert-danger', 'msg');
                }
            });

        }
    }
</script>
</body>
</html>