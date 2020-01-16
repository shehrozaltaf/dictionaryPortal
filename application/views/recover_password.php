<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Recover Password - Dictionary Portal">
    <meta name="keywords" content="Recover Password - Dictionary Portal">
    <meta name="author" content="shahroz.khan@aku.edu">
    <title>Recover Password - Dictionary Portal</title>
    <link href="https://fonts.googleapis.com/css?family=Muli:300,300i,400,400i,600,600i,700,700i%7CComfortaa:300,400,700"
          rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/bootstrap-extended.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/components.min.css">
    <link rel="stylesheet" type="text/css"
          href="<?php echo base_url(); ?>assets/css/core/colors/palette-gradient.min.css">
    <style>
        .error {
            border-color: #e53935;
        }
    </style>
</head>
<!-- END: Head-->

<!-- BEGIN: Body-->
<body class="vertical-layout vertical-menu-modern 1-column  bg-full-screen-image blank-page blank-page"
      data-open="click" data-menu="vertical-menu-modern" data-color="bg-gradient-x-purple-red" data-col="1-column">
<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-wrapper-before"></div>
        <div class="content-header row">
        </div>
        <div class="content-body">
            <section class="flexbox-container">
                <div class="col-12 d-flex align-items-center justify-content-center">
                    <div class="col-lg-4 col-md-6 col-10 box-shadow-2 p-0">
                        <div class="card border-grey border-lighten-3 px-2 py-2 m-0">
                            <div class="card-header border-0">
                                <!--<div class="text-center mb-1">
                        <img src="<?php /*echo base_url(); */ ?>assets/images/logo/logo.png" alt="branding logo">
                    </div>-->
                                <div class="font-large-1  text-center">
                                    Recover Password
                                </div>
                                <h6 class="card-subtitle line-on-side text-muted text-center font-small-3 pt-2">
                                    <span>We will send you a Old Password on your email.</span>
                                </h6>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    <div>
                                        <fieldset class="form-group position-relative has-icon-left">
                                            <input type="email" class="form-control round" id="user-email"
                                                   placeholder="Your Email Address" required name="email">
                                            <div class="form-control-position">
                                                <i class="ft-mail"></i>
                                            </div>
                                        </fieldset>
                                        <div id="msg" style="display: none;" class="uk-alert" data-uk-alert>
                                            <a href="javascript:void(0)" class="uk-alert-close uk-close"></a>
                                            <p id="msgText"></p>
                                        </div>
                                        <div class="form-group text-center">
                                            <button type="button" onclick="forgetPwd()"
                                                    class="btn mybtn round btn-block btn-glow btn-bg-gradient-x-purple-blue col-12 mr-1 mb-1">
                                                Submit
                                            </button>
                                        </div>
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
<!-- END: Content-->


<script src="<?php echo base_url(); ?>assets/vendors/js/vendors.min.js" type="text/javascript"></script>
<!-- BEGIN: Page Vendor JS-->

<script src="<?php echo base_url() ?>assets/js/core.js"></script>


<script>
    function forgetPwd() {
        var data = {};
        data['email'] = $('#user-email').val();
        $('#user-email').removeClass('error');
        if (data['email'] != '' && data['email'] != undefined) {
            $('.mybtn').attr('disabled', 'disabled');
            showloader();
            CallAjax("<?php echo base_url('index.php/Login/forgetPwd_SendEmail') ?>", data, 'POST', function (res) {
                hideloader();
                $('.mybtn').removeAttr('disabled', 'disabled');
                if (res == 1) {
                    setTimeout(function () {
                        window.location.href = "<?php echo base_url() ?>";
                    }, 500);
                    returnMsg('msgText', 'Success', 'uk-alert-success', 'msg');
                } else if (res == 3) {
                    $('#user-email').addClass('error');
                    returnMsg('msgText', 'Email not found.', 'uk-alert-danger', 'msg');
                } else {
                    $('#user-email').addClass('error');
                    returnMsg('msgText', 'Invalid Email', 'uk-alert-danger', 'msg');
                }
            });
        } else {
            $('#user-email').addClass('error');
            returnMsg('msgText', 'Invalid Email', 'uk-alert-danger', 'msg');
        }
    }
</script>
</body>
</html>