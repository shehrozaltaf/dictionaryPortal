<div class="modal fade text-left" id="changePasswordModal" tabindex="-1" role="dialog"
     aria-labelledby="myModalLabel_changePwd" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary white">
                <h4 class="modal-title white" id="myModalLabel_changePwd">Change Password</h4>

                <input type="hidden" id="edit_idUser" name="edit_idUser">
            </div>
            <div class="modal-body">

                <div class="form-group">
                    <label for="edit_newPassword">New Password: </label>
                    <div class="position-relative  ">
                        <input type="password" class="form-control edit_newPassword myPwdInput" id="edit_newPassword">
                        <div class="form-control-position toggle-password">
                            <i class="ft-eye-off pwdIcon"></i>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="edit_newPasswordConfirm">Confrim Password: </label>
                    <div class="position-relative  ">
                        <input type="password" class="form-control edit_newPasswordConfirm myPwdInput" id="edit_newPasswordConfirm">
                        <div class="form-control-position toggle-password">
                            <i class="ft-eye-off pwdIcon"></i>
                        </div>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" onclick="changePassword()">Change Password
                </button>
            </div>
        </div>
    </div>
</div>
<!-- BEGIN: Customizer-->
<div class="customizer border-left-blue-grey border-left-lighten-4 d-none d-xl-block">
    <a class="customizer-close" class="ft-x font-medium-3"></i></a>
    <a class="customizer-toggle bg-primary box-shadow-3" href="#" id="customizer-toggle-setting">
        <i class="ft-settings font-medium-3 spinner white"></i>
    </a>
    <div class="customizer-content p-2">
        <h5 class="mt-1 mb-1 text-bold-500">Navbar Color Options</h5>
        <div class="navbar-color-options clearfix">
            <div class="gradient-colors mb-1 clearfix">
                <div class="bg-gradient-x-purple-blue navbar-color-option" onclick="setColor(this)" ​
                     data-bg="bg-gradient-x-purple-blue" title="bg-gradient-x-purple-blue"></div>
                <div class="bg-gradient-x-purple-red navbar-color-option" onclick="setColor(this)" ​
                     data-bg="bg-gradient-x-purple-red" title="bg-gradient-x-purple-red"></div>
                <div class="bg-gradient-x-blue-green navbar-color-option" onclick="setColor(this)" ​
                     data-bg="bg-gradient-x-blue-green" title="bg-gradient-x-blue-green"></div>
                <div class="bg-gradient-x-orange-yellow navbar-color-option" onclick="setColor(this)" ​
                     data-bg="bg-gradient-x-orange-yellow" title="bg-gradient-x-orange-yellow"></div>
                <div class="bg-gradient-x-blue-cyan navbar-color-option" onclick="setColor(this)" ​
                     data-bg="bg-gradient-x-blue-cyan" title="bg-gradient-x-blue-cyan"></div>
                <div class="bg-gradient-x-red-pink navbar-color-option" onclick="setColor(this)" ​
                     data-bg="bg-gradient-x-red-pink" title="bg-gradient-x-red-pink"></div>
            </div>
            <div class="solid-colors clearfix">
                <div class="bg-primary navbar-color-option" onclick="setColor(this)" ​ data-bg="bg-primary"
                     title="primary"></div>
                <div class="bg-success navbar-color-option" onclick="setColor(this)" ​ data-bg="bg-success"
                     title="success"></div>
                <div class="bg-info navbar-color-option" onclick="setColor(this)" ​ data-bg="bg-info"
                     title="info"></div>
                <div class="bg-warning navbar-color-option" onclick="setColor(this)" ​ data-bg="bg-warning"
                     title="warning"></div>
                <div class="bg-danger navbar-color-option" onclick="setColor(this)" ​ data-bg="bg-danger"
                     title="danger"></div>
                <div class="bg-blue navbar-color-option" onclick="setColor(this)" ​ data-bg="bg-blue"
                     title="blue"></div>
            </div>
        </div>
        <hr>
        <h5 class="my-1 text-bold-500">Layout Options</h5>
        <div class="row">
            <div class="col-12">
                <div class="d-inline-block custom-control custom-radio mb-1 col-4">
                    <input type="radio" class="custom-control-input bg-primary" name="layouts" id="default-layout"
                           checked>
                    <label class="custom-control-label" for="default-layout">Default</label>
                </div>
                <div class="d-inline-block custom-control custom-radio mb-1 col-4">
                    <input type="radio" class="custom-control-input bg-primary" name="layouts" id="fixed-layout">
                    <label class="custom-control-label" for="fixed-layout">Fixed</label>
                </div>
                <div class="d-inline-block custom-control custom-radio mb-1 col-4">
                    <input type="radio" class="custom-control-input bg-primary" name="layouts" id="static-layout">
                    <label class="custom-control-label" for="static-layout">Static</label>
                </div>
                <div class="d-inline-block custom-control custom-radio mb-1">
                    <input type="radio" class="custom-control-input bg-primary" name="layouts" id="boxed-layout">
                    <label class="custom-control-label" for="boxed-layout">Boxed</label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="d-inline-block custom-control custom-checkbox mb-1">
                    <input type="checkbox" class="custom-control-input bg-primary" name="right-side-icons"
                           id="right-side-icons">
                    <label class="custom-control-label" for="right-side-icons">Right Side Icons</label>
                </div>
            </div>
        </div>
        <hr>
        <h5 class="mt-1 mb-1 text-bold-500">Sidebar menu Background</h5>
        <div class="row sidebar-color-options ml-0">
            <label for="sidebar-color-option" class="card-title font-medium-2 mr-2"
                   data-menu_sidbar_mode="menu-light" data-alterkey="menu-dark">White Mode</label>
            <div class="text-center mb-1">
                <input type="checkbox" name="sidebar-color-option" id="sidebar-color-option" class="switchery" ​
                       data-size="xs"/>
            </div>
            <label for="sidebar-color-option" class="card-title font-medium-2 ml-2"
                   data-menu_sidbar_mode="menu-dark" data-alterkey="menu-light">Dark Mode</label>
        </div>
        <hr>
        <label for="collapsed-sidebar" class="font-medium-2">Menu Collapse</label>
        <div class="float-right">
            <input type="checkbox" id="collapsed-sidebar" class="switchery" data-size="xs"/>
        </div>
        <hr>
        <!--Sidebar Background Image Starts-->
        <h5 class="mt-1 mb-1 text-bold-500">Sidebar Background Image</h5>
        <div class="cz-bg-image row">
            <div class="col mb-3">
                <img src="<?php echo base_url() ?>assets/images/backgrounds/04.jpg" class="rounded sidiebar-bg-img"
                     width="50" height="100" alt="background image" onclick="menuBGimg(this)">
            </div>
            <div class="col mb-3">
                <img src="<?php echo base_url() ?>assets/images/backgrounds/01.jpg"
                     class="rounded sidiebar-bg-img selected"
                     width="50" selected
                     height="100" alt="background image" onclick="menuBGimg(this)">
            </div>
            <div class="col mb-3">
                <img src="<?php echo base_url() ?>assets/images/backgrounds/02.jpg" class="rounded sidiebar-bg-img"
                     width="50"
                     height="100" alt="background image" onclick="menuBGimg(this)">
            </div>
            <div class="col mb-3">
                <img src="<?php echo base_url() ?>assets/images/backgrounds/05.jpg" class="rounded sidiebar-bg-img"
                     width="50"
                     height="100" alt="background image" onclick="menuBGimg(this)">
            </div>
        </div>
        <!--Sidebar Background Image Ends-->
        <!--Sidebar BG Image Toggle Starts-->
        <div class="sidebar-image-visibility">
            <div class="row ml-0">
                <label for="toggle-sidebar-bg-img" class="card-title font-medium-2 mr-2">Hide Image</label>
                <div class="text-center mb-1">
                    <input type="checkbox" id="toggle-sidebar-bg-img" class="switchery" data-size="xs" checked/>
                </div>
                <label for="toggle-sidebar-bg-img" class="card-title font-medium-2 ml-2">Show Image</label>
            </div>
        </div>
        <!--Sidebar BG Image Toggle Ends-->
    </div>
</div>
<!-- End: Customizer-->
<script src="<?php echo base_url(); ?>assets/js/core.js" type="text/javascript"></script>
<!-- BEGIN: Vendor JS-->
<script src="<?php echo base_url(); ?>assets/vendors/js/forms/toggle/switchery.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/js/scripts/forms/switch.min.js" type="text/javascript"></script>
<!-- BEGIN Vendor JS-->
<!-- BEGIN: Theme JS-->
<script src="<?php echo base_url(); ?>assets/js/core/app-menu.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/js/core/app.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/js/scripts/customizer.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/vendors/js/jquery.sharrre.js" type="text/javascript"></script>
<!-- END: Theme JS-->
<!-- BEGIN: Page Vendor JS-->
<script src="<?php echo base_url(); ?>assets/vendors/js/extensions/toastr.min.js" type="text/javascript"></script>
<!-- END: Page Vendor JS-->
<script>
    $(document).ready(function () {
        $('#loader').hide();
    });
    function changePassword() {
        var flag = 0;
        $('#edit_newPassword').css('border', '1px solid #babfc7');
        $('#edit_newPasswordConfirm').css('border', '1px solid red');
        var data = {};
        data['newpassword'] = $('#edit_newPassword').val();
        data['newpasswordconfirm'] = $('#edit_newPasswordConfirm').val();

        if (data['newpassword'] == '' || data['newpassword'] == undefined) {
            $('#edit_newPassword').css('border', '1px solid red');
            toastMsg('New Password', 'Invalid New Password', 'error');
            flag = 1;
            return false;
        }
        if (data['newpasswordconfirm'] == '' || data['newpasswordconfirm'] == undefined || data['newpassword'] != data['newpasswordconfirm']) {
            $('#edit_newPasswordConfirm').css('border', '1px solid red');
            toastMsg('Confirm Password', 'Invalid Confirm Password', 'error');
            flag = 1;
            return false;
        }
        if (flag == 0) {
            showloader();
            $('.mybtn').attr('disabled', 'disabled');
            CallAjax('<?php echo base_url('index.php/Users/changePassword'); ?>', data, 'POST', function (result) {
                hideloader();
                if (result == 1) {
                    toastMsg('Success', 'Successfully inserted', 'success');
                    $('#changePasswordModal').modal('hide');
                    setTimeout(function () {
                        window.location.reload();
                    }, 500)
                } else if (result == 2) {
                    toastMsg('New Password', 'Invalid New Password', 'error');
                } else if (result == 3 || result == 4) {
                    toastMsg('Confirm Password', 'Invalid Confirm Password', 'error');
                } else {
                    toastMsg('Error', 'Something went wrong', 'error');
                }
            });
        }
    }

    function logout() {
        CallAjax('<?php echo base_url('index.php/Login/getLogout')?>', {}, 'POST', function (res) {
            window.location.href = "<?php echo base_url() ?>";
        });
    }

    function getPDF(obj) {
        var data = {};
        data['idProject'] = $(obj).attr('data-idProject');
        if (data['idProject'] != '' && data['idProject'] != undefined) {
            CallAjax('<?php echo base_url('index.php/Project/getProjects') ?>', data, 'POST', function (res) {

            });
        } else {
            alert('Invalid Project');
        }
    }

    $(document).ready(function () {
        var b = localStorage.getItem("Topbar");
        if (b != '' && b != undefined) {
            $('body').attr('data-color', b);
        }
        var menu_sidbar_mode = localStorage.getItem("menu_sidbar_mode");
        if (menu_sidbar_mode != '' && menu_sidbar_mode != undefined) {
            $('.main-menu').removeClass('menu-dark').removeClass('menu-light').addClass(menu_sidbar_mode);
        }
        var c = localStorage.getItem("menu_sidbar_bg");
        if (c != '' && c != undefined) {
            $('.navigation-background').css("background-image", 'url("' + c + '")');
        }
    });

    function setColor(obj) {
        var a = $(obj).attr('data-bg');
        localStorage.setItem("Topbar", a);
        var b = localStorage.getItem("Topbar");
        $('body').attr('data-color', b);
    }

    function setSidebarColor() {
        var menu_sidbar_mode = $("input[name='sidebar-color-option']:checked").val();
        if (menu_sidbar_mode == 'on') {
            localStorage.setItem("menu_sidbar_mode", 'menu-dark');
        } else {
            localStorage.setItem("menu_sidbar_mode", 'menu-light');
        }
    }

    function menuBGimg(obj) {
        var a = $(obj).attr('src');
        localStorage.setItem("menu_sidbar_bg", a);
        var b = localStorage.getItem("menu_sidbar_bg");
        $('.navigation-background').css("background-image", 'url("' + b + '")');
    }
</script>
</body>
</html>