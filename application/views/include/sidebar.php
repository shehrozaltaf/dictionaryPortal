<nav class="header-navbar navbar-expand-md navbar navbar-with-menu navbar-without-dd-arrow fixed-top navbar-semi-dark">
    <div class="navbar-wrapper">
        <div class="navbar-container content">
            <div class="collapse navbar-collapse show" id="navbar-mobile">
                <ul class="nav navbar-nav mr-auto float-left">
                    <li class="nav-item mobile-menu d-md-none mr-auto"><a
                                class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i
                                    class="ft-menu font-large-1"></i></a></li>
                    <li class="nav-item d-none d-md-block"><a class="nav-link nav-link-expand" href="#"><i
                                    class="ficon ft-maximize"></i></a></li>
                    <li class="dropdown nav-item mega-dropdown d-none d-md-block">

                    </li>
                    <li class="nav-item dropdown navbar-search"><a class="nav-link dropdown-toggle hide"
                                                                   data-toggle="dropdown" href="#"><i
                                    class="ficon ft-search"></i></a>
                        <ul class="dropdown-menu">
                            <li class="arrow_box">
                                <form>
                                    <div class="input-group search-box">
                                        <div class="position-relative has-icon-right full-width">
                                            <input class="form-control" id="search" type="text"
                                                   placeholder="Search here...">
                                            <div class="form-control-position navbar-search-close"><i class="ft-x"></i>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </li>
                        </ul>
                    </li>
                </ul>
                <ul class="nav navbar-nav float-right">
                    <li class="dropdown dropdown-user nav-item">
                        <a class="dropdown-toggle nav-link dropdown-user-link"
                           href="javascript:void(0)" data-toggle="dropdown">
                            <span class="avatar avatar-online">
                                <img src="<?php echo base_url('assets/images/user.png') ?>" alt="avatar"><i></i>
                            </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <div class="arrow_box_right">
                                <a class="dropdown-item" href="<?php echo base_url() ?>">
                                    <span class="avatar avatar-online">
                                        <img src="<?php echo base_url('assets/images/user.png') ?>" alt="avatar">
                                        <span class="user-name text-bold-700 ml-1">
                                            <?php if (isset($_SESSION['login']['UserName']) && $_SESSION['login']['UserName'] != '') {
                                                echo $_SESSION['login']['UserName'];
                                            } else {
                                                echo 'Welcome User';
                                            } ?>
                                        </span>
                                    </span>
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="javascript:void(0)" id="change_password"
                                   data-toggle="modal" data-keyboard="false" data-target="#changePasswordModal">
                                    <i class="ft-user"></i>
                                    Change Password
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="javascript:void(0)" onclick="logout()"><i
                                            class="ft-power"></i> Logout</a>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
<!--Main Sidebar Menu-->
<div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true"
     data-img="<?php echo base_url(); ?>assets/images/backgrounds/04.jpg">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row position-relative">
            <li class="nav-item mr-auto">
                <a class="navbar-brand" href="<?php echo base_url() ?>">
                    <h3 class="brand-text">Dictionary Portal</h3>
                </a>
            </li>
            <li class="nav-item d-none d-md-block nav-toggle">
                <a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse">
                    <i class="toggle-icon ft-disc font-medium-3" data-ticon="ft-disc"></i>
                </a>
            </li>
        </ul>
    </div>
    <div class="navigation-background"></div>
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class=" nav-item">
                <a href="<?php echo base_url() ?>" class="">
                    <i class="ft-home"></i>
                    <span class="menu-title" data-i18n="">Dashboard</span>
                </a>
            </li>
            <li class=" nav-item   myproject">
                <a href="javascript:void(0)">
                    <i class="ft-list"></i>
                    <span class="menu-title" data-i18n="">Projects</span>
                </a>
                <ul class="menu-content">
                    <li class="myproject_view">
                        <a class="menu-item " href="<?php echo base_url('index.php/project') ?>">
                            View Projects
                        </a>
                    </li>
                    <li class="myproject_add">
                        <a class="menu-item " href="<?php echo base_url('/index.php/project/add_project') ?>">
                            Add Projects
                        </a>
                    </li>
                </ul>
            </li>
            <li class=" nav-item  mycrf"><a href="javascript:void(0)"><i class="ft-book"></i><span
                            class="menu-title" data-i18n="">CRF</span></a>
                <ul class="menu-content">
                    <li class="crf_view"><a class="menu-item " href="<?php echo base_url('index.php/crf') ?>">View
                            CRF</a></li>
                    <li class="crf_add"><a class="menu-item " href="<?php echo base_url('index.php/add_crf') ?>">Add
                            CRF</a></li>
                </ul>
            </li>
            <li class=" nav-item mymodule"><a href="javascript:void(0)">
                    <i class="ft-layers"></i><span class="menu-title" data-i18n="">Module</span></a>
                <ul class="menu-content">
                    <li class="module_view"><a class="menu-item " href="<?php echo base_url('index.php/module') ?>">View
                            Module</a></li>
                    <li class="module_add"><a class="menu-item " href="<?php echo base_url('index.php/add_module') ?>">Add
                            Module</a></li>
                </ul>
            </li>
            <li class=" nav-item mysection"><a href="javascript:void(0)">
                    <i class="ft-sidebar"></i><span class="menu-title" data-i18n="">Section</span></a>
                <ul class="menu-content">
                    <li class="section_view"><a class="menu-item " href="<?php echo base_url('index.php/section') ?>">View
                            Section</a></li>
                    <li class="section_add"><a class="menu-item "
                                               href="<?php echo base_url('/index.php/add_section') ?>">Add Section</a>
                    </li>
                </ul>
            </li>
            <li class=" nav-item myreport">
                <a href="<?php echo base_url('index.php/reports') ?>" class="">
                    <i class="ft-file-text"></i>
                    <span class="menu-title" data-i18n="">Reports</span>
                </a>
            </li>
            <li class=" nav-item mydocuments">
                <a href="<?php echo base_url('index.php/documents') ?>" class="">
                    <i class="ft-file-text"></i>
                    <span class="menu-title" data-i18n="">Documents</span>
                </a>
            </li>
            <li class=" nav-item myupload_data">
                <a href="<?php echo base_url('index.php/upload_data') ?>" class="">
                    <i class="ft-upload"></i>
                    <span class="menu-title" data-i18n="">Upload Data</span>
                </a>
            </li>
            <li class=" nav-item mylangauge">
                <a href="<?php echo base_url('index.php/language') ?>" class="">
                    <i class="ft-volume-2"></i>
                    <span class="menu-title" data-i18n="">Language</span>
                </a>
            </li>
            <li class="nav-item mysettings"><a href="javascript:void(0)">
                    <i class="ft-settings"></i><span class="menu-title" data-i18n="">Settings</span></a>
                <ul class="menu-content">
                    <li class="group_view">
                        <a class="menu-item " href="<?php echo base_url('index.php/settings/groups') ?>">
                            Groups
                        </a>
                    </li>
                </ul>
            </li>
            <li class=" nav-item myusers">
                <a href="<?php echo base_url('index.php/users') ?>" class="">
                    <i class="ft-users"></i>
                    <span class="menu-title" data-i18n="">Users</span>
                </a>
            </li>
            <li class=" nav-item">
                <a class="dropdown-item" href="javascript:void(0)" onclick="logout()"><i class="ft-power"></i>
                    Logout</a>
            </li>
        </ul>
    </div>


</div>
<!--Main Sidebar Menu-->