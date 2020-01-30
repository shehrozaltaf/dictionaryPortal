<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-wrapper-before"></div>
        <div class="content-header row">
            <div class="content-header-left col-md-8 col-12 mb-2 breadcrumb-new">
                <h3 class="content-header-title mb-0 d-inline-block">Group Setting</h3>
                <div class="breadcrumbs-top d-inline-block">
                    <div class="breadcrumb-wrapper mr-1">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo base_url() ?>">Home</a>
                            </li>
                            <li class="breadcrumb-item active">Group Setting
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
            <div class="content-header-right col-md-4 col-12 d-block d-md-none"><a
                        class="btn btn-warning btn-min-width float-md-right box-shadow-4 mr-1 mb-1"
                        href="<?php echo base_url() ?>"><i class="ft-mail"></i>Group Setting</a>

            </div>
        </div>

        <div class="content-body">
            <section id="ordering">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Group Setting
                                </h4>
                                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                <div class="heading-elements">
                                    <ul class="list-inline mb-0">
                                        <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                        <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                        <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                        <li><a data-action="dt_colVis_buttons"><i class="ft-x"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-content collapse show">
                                <input type="hidden" id="idGroup" name="idGroup"
                                       value="<?php echo(isset($slug) && $slug != '' ? $slug : '') ?>">
                                <div class="card-body card-dashboard cardHtml">
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

<!-- BEGIN: Page Vendor JS-->
<script src="<?php echo base_url(); ?>assets/vendors/js/tables/datatable/datatables.min.js"
        type="text/javascript"></script>
<script>
    $(document).ready(function () {
        $('.mysettings').addClass('open');
        $('.group_view').addClass('active');
        getMenu();
        getFormGroupData();
    });

    function getFormGroupData() {
        var data = {};
        data['idGroup'] = $('#idGroup').val();
        CallAjax("<?php echo base_url() . 'index.php/Settings/getFormGroupData' ?>", data, "POST", function (Result) {
            var a = JSON.parse(Result);
            var items = "";
            $('.cardHtml').html('');
            if (a != null) {
                items += "<div class='table-responsive'>";
                items += "<table class='table table-striped table-bordered '>";
                items += "<tr>";
                items += "<td></td>";
                items += "<td></td>";
                items += "<td></td>";
                items += "<td></td>";
                items += "<td><h4>Check All</h4></td>";
                items += '<td><input type="checkbox"  name="CheckAll" value="Check All"  ' +
                    'id="CheckAll"   onchange="CheckAll(this)" /></td>';
                /*items += "<td><div class='onoffswitch'>" +
                    "<input type='checkbox' value='Check All' onchange='CheckAll(this)'  id='CheckAll' class='onoffswitch-checkbox uk-float-right'/>" +
                    "<label class='onoffswitch-label' for='CheckAll'>" +
                    "<span class='onoffswitch-inner'></span> " +
                    "<span class='onoffswitch-switch'></span>" +
                    "</label>" +
                    "</div></td>";*/
                items += "</tr>";
                items += "<tr>";
                items += "<th> Form Name </th>";
                items += "<th> Can View All Detail </th>";
                items += "<th> Can View </th>";
                items += "<th> Can Add </th>";
                items += "<th> Can Edit </th>";
                items += "<th> Can Delete </th>";
                items += "</tr>";
                if (a.length > 0) {
                    try {
                        $.each(a, function (i, val) {
                            items += "<tr class='fgtr'>";
                            items += "<td>" + val.pageName + "</td>";
                            items += "<td>";
                            if (val.CanViewAllDetail == 1) {
                                items += '<input type="checkbox" data-idPageGroup="' + val.idPageGroup + '"  name="CanViewAllDetail" value="' + val.CanViewAllDetail + '"  ' +
                                    'id="CanViewAllDetail' + i + '"   checked/>';
                            } else {
                                items += '<input type="checkbox" data-idPageGroup="' + val.idPageGroup + '"  name="CanViewAllDetail" value="' + val.CanViewAllDetail + '"  ' +
                                    'id="CanViewAllDetail' + i + '"  />';
                            }
                            items += "</td>";
                            items += "<td>";
                            if (val.CanView == 1) {
                                items += '<input type="checkbox" data-idPageGroup="' + val.idPageGroup + '"  name="CanView" value="' + val.CanView + '"  ' +
                                    'id="CanView' + i + '"   checked/>';
                            } else {
                                items += '<input type="checkbox" data-idPageGroup="' + val.idPageGroup + '"  name="CanView" value="' + val.CanView + '"  ' +
                                    'id="CanView' + i + '"  />';
                            }
                            items += "</td>";

                            items += "<td>";
                            if (val.CanAdd == 1) {
                                items += '<input type="checkbox" data-idPageGroup="' + val.idPageGroup + '"  name="CanAdd" value="' + val.CanAdd + '"  ' +
                                    'id="CanAdd' + i + '"   checked/>';
                            } else {
                                items += '<input type="checkbox" data-idPageGroup="' + val.idPageGroup + '"  name="CanAdd" value="' + val.CanAdd + '"  ' +
                                    'id="CanAdd' + i + '"  />';
                            }
                            items += "</td>";

                            items += "<td>";
                            if (val.CanEdit == 1) {
                                items += '<input type="checkbox" data-idPageGroup="' + val.idPageGroup + '"  name="CanEdit" value="' + val.CanEdit + '"  ' +
                                    'id="CanEdit' + i + '"   checked/>';
                            } else {
                                items += '<input type="checkbox" data-idPageGroup="' + val.idPageGroup + '"  name="CanEdit" value="' + val.CanEdit + '"  ' +
                                    'id="CanEdit' + i + '"  />';
                            }
                            items += "</td>";

                            items += "<td>";
                            if (val.CanDelete == 1) {
                                items += '<input type="checkbox" data-idPageGroup="' + val.idPageGroup + '"  name="CanDelete" value="' + val.CanDelete + '"  ' +
                                    'id="CanDelete' + i + '"   checked/>';
                            } else {
                                items += '<input type="checkbox" data-idPageGroup="' + val.idPageGroup + '"  name="CanDelete" value="' + val.CanDelete + '"  ' +
                                    'id="CanDelete' + i + '"    />';
                            }

                            items += "</td>";
                            items += "</tr>";
                        });
                    } catch (e) {
                        console.log(e);
                    }
                }
                items += "</table></div>";
                items += "<input type='button' value='Send All' id='btn-Edit' onclick='SaveChanges()' class='btn bg-secondary white addbtn'/>";
                $('.cardHtml').html(items);
                switches();
            } else {

            }
        });
    }

    function CheckAll(ele) {
        var checkboxes = document.getElementsByTagName('input');
        if (ele.checked) {
            for (var i = 0; i < checkboxes.length; i++) {
                if (checkboxes[i].type == 'checkbox') {
                    checkboxes[i].checked = true;
                }
            }
        } else {
            for (var i = 0; i < checkboxes.length; i++) {
                if (checkboxes[i].type == 'checkbox') {
                    checkboxes[i].checked = false;
                }
            }
        }
    }

    function SaveChanges() {
        $('#btn-Edit').css('display', 'none');
        var tr;
        var arr = {};
        tr = $('.fgtr');
        var count = $(tr).find('input');
        for (i = 0; i < count.length; i++) {
            var data = {};
            data["idPageGroup"] = $(count[i]).attr('data-idPageGroup');
            console.log('asdas  d   ', $(count[i]).attr('data-idPageGroup'));
            data[$(count[i]).attr('name')] = ($(count[i]).is(':checked')) ? true : false;
            arr[i] = data;
        }
        var url = "<?php echo base_url() . 'index.php/Settings/fgAdd' ?>";
        CallAjax(url, arr, "POST", function (data) {
            console.log(data);
            if (data) {
                alert("Changed Successfully");
                setTimeout(function () {
                    $('#btn-Edit').css('display', 'block');
                }, 2000);
            }
        });
    }

    function getMenu() {
        CallAjax('<?php echo base_url('index.php/Dashboard/getMenuData') ?>', [], "POST", function (Result) {
            $('#main-menu-navigation').html(Result);
        });
    }

    function switches() {
        !function (r, a, c) {
            "use strict";
            c("html");
            var e = 0;
            if (Array.prototype.forEach) {
                var t = c(".switchery");
                c.each(t, function (r, a) {
                    var e, t, s = "", i = "";
                    e = c(this).data("size");
                    s = void 0 !== c(this).data("size") ? "switchery switchery-" + {
                        lg: "large",
                        sm: "small",
                        xs: "xsmall"
                    }[e] : "switchery";
                    i = void 0 !== (t = c(this).data("color")) ? {
                        primary: "#6967ce",
                        success: "#76dd6a",
                        danger: "#fa626b",
                        warning: "#fdb901",
                        info: "#28afd0"
                    }[t] : "#fa626b";
                    new Switchery(c(this)[0], {
                        className: s,
                        color: i,
                        secondaryColor: ""
                    })
                })
            } else {
                var s = a.querySelectorAll(".switchery");
                for (e = 0; e < s.length; e++)
                    s[e].data("size"),
                        s[e].data("color"),
                        new Switchery(s[e], {
                            color: "#37BC9B"
                        })
            }
        }(window, document, jQuery);

    }
</script>