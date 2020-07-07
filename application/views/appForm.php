<link rel="stylesheet" type="text/css"
      href="<?php echo base_url() ?>assets/css/plugins/forms/checkboxes-radios.min.css">


<style>
    label {
        color: #4d4f5c;
    }

    .main_question_head {
        color: #000b70;
    }

</style>
<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-wrapper-before"></div>
        <div class="content-header row">
            <div class="content-header-left col-md-8 col-12 mb-2 breadcrumb-new">
                <h3 class="content-header-title mb-0 d-inline-block">App Form</h3>
                <div class="breadcrumbs-top d-inline-block">
                    <div class="breadcrumb-wrapper mr-1">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo base_url() ?>">Home </a></li>
                            <li class="breadcrumb-item active">Form</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <section id="basic-form-layouts">
                <div class="row match-height">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <a class="heading-elements-toggle">
                                    <i class="la la-ellipsis-v font-medium-3"></i>
                                </a>
                                <div class="heading-elements">
                                    <ul class="list-inline mb-0">
                                        <li>
                                            <a data-action="collapse">
                                                <i class="ft-minus"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a data-action="reload">
                                                <i class="ft-rotate-cw"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a data-action="expand">
                                                <i class="ft-maximize"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-content collapse show">
                                <div class="card-body">
                                    <div class="form">
                                        <div class="form-body">

                                            <?php
                                            $html = '';
                                            $innterHtml = '';
                                            if (isset($data) && $data != '') {
                                                foreach ($data as $k => $v) {
                                                    if ($v->nature == 'Radio' || $v->nature == 'CheckBox') {
                                                        $innterHtml = '<label class="main_question_head"><small>' . strtolower($v->variable_name) . ':</small> ' . $v->label_l1 . '</label>';
                                                    } elseif ($v->nature == 'Input') {
                                                        $innterHtml = ' <label for="' . strtolower($v->variable_name) . '" class="main_question_head"><small>' . strtolower($v->variable_name) . ':</small> ' . $v->label_l1 . '</label>
                                                        <input type="text"  class="form-control" value="' . $v->option_value . '" id="' . strtolower($v->variable_name) . '" name="' . strtolower($v->variable_name) . '" >';
                                                    } elseif ($v->nature == 'Input-Numeric') {
                                                        $innterHtml = ' <label for="' . strtolower($v->variable_name) . '" class="main_question_head"><small>' . strtolower($v->variable_name) . ':</small> ' . $v->label_l1 . '</label>
                                                        <input type="number"  class="form-control" value="' . $v->option_value . '" id="' . strtolower($v->variable_name) . '" name="' . strtolower($v->variable_name) . '" >';
                                                    } elseif ($v->nature == 'Title') {
                                                        $innterHtml = '<h6 class="main_question_head"><small>' . strtolower($v->variable_name) . ':</small> ' . $v->label_l1 . '</h6>';
                                                    }

                                                    if (isset($v->myrow_options) && $v->myrow_options != '') {
                                                        foreach ($v->myrow_options as $c_k => $c_v) {
                                                            if ($c_v->nature == 'Radio' || $c_v->nature == 'CheckBox') {
                                                                $innterHtml .= '<div class="form-check">
                                                        <input type="' . strtolower($c_v->nature) . '" class="form-check-input" 
                                                         value="' . $c_v->option_value . '" id="' . strtolower($c_v->variable_name) . '"
                                                         name="' . strtolower($v->variable_name) . '" >
                                                        <label for="' . strtolower($c_v->variable_name) . '" class="form-check-label"><small>' . strtolower($c_v->variable_name) . ':</small> ' . $c_v->label_l1 . '</label>
                                                        </div>';
                                                            } elseif (($v->nature == 'Radio' || $v->nature == 'CheckBox') || $c_v->nature == 'Input') {
                                                                $innterHtml .= '<div class="form-check">
                                                        <input type="' . strtolower($v->nature) . '" class="form-check-input" 
                                                         value="' . $c_v->option_value . '" id="' . strtolower($c_v->variable_name) . '"
                                                         name="' . strtolower($v->variable_name) . '" onclick="showInp(this)">
                                                        <label for="' . strtolower($c_v->variable_name) . '" class="form-check-label"><small>' . strtolower($c_v->variable_name) . ':</small> ' . $c_v->label_l1 . '</label>
                                                        </div>';
                                                                $innterHtml .= ' <div class="hidden"><label for="' . strtolower($c_v->variable_name) . '" class=""><small>' . strtolower($c_v->variable_name) . ':</small> ' . $c_v->label_l1 . '</label>
                                                        <input type="text"  class="form-control" value="' . $c_v->option_value . '" id="' . strtolower($c_v->variable_name) . '" name="' . strtolower($c_v->variable_name) . '" ></div>';
                                                            } elseif (($v->nature == 'Radio' || $v->nature == 'CheckBox') && $c_v->nature == 'Input-Numeric') {
                                                                $innterHtml .= '<div class="form-check">
                                                        <input type="' . strtolower($v->nature) . '" class="form-check-input" 
                                                         value="' . $c_v->option_value . '" id="' . strtolower($c_v->variable_name) . '"
                                                         name="' . strtolower($v->variable_name) . '" >
                                                        <label for="' . strtolower($c_v->variable_name) . '" class="form-check-label"><small>' . strtolower($c_v->variable_name) . ':</small> ' . $c_v->label_l1 . '</label>
                                                        </div>';
                                                                $innterHtml .= ' <label for="' . strtolower($c_v->variable_name) . '" class=""><small>' . strtolower($c_v->variable_name) . ':</small> ' . $c_v->label_l1 . '</label>
                                                        <input type="number"  class="form-control" value="' . $c_v->option_value . '" id="' . strtolower($c_v->variable_name) . '" name="' . strtolower($c_v->variable_name) . '" >';
                                                            } elseif ($c_v->nature == 'Input') {
                                                                $innterHtml .= '<label for="' . strtolower($c_v->variable_name) . '" class=""><small>' . strtolower($c_v->variable_name) . ':</small> ' . $c_v->label_l1 . '</label>
                                                        <input type="text"  class="form-control" value="' . $c_v->option_value . '" id="' . strtolower($c_v->variable_name) . '" name="' . strtolower($c_v->variable_name) . '" >';
                                                            } elseif ($c_v->nature == 'Input-Numeric') {
                                                                $innterHtml .= '<label for="' . strtolower($c_v->variable_name) . '" class=""><small>' . strtolower($c_v->variable_name) . ':</small> ' . $c_v->label_l1 . '</label>
                                                        <input type="number"  class="form-control" value="' . $c_v->option_value . '" id="' . strtolower($c_v->variable_name) . '" name="' . strtolower($c_v->variable_name) . '" >';
                                                            }
                                                        }
                                                    }


                                                    $html = '<div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                       ';
                                                    $html .= $innterHtml;
                                                    $html .= '   
                                                    </div>
                                                </div>
                                            </div>';
                                                    echo $html;
                                                }
                                            }
                                            ?>


                                        </div>
                                    </div>

                                    <div class="form-actions ">
                                        <button type="button"
                                                class="btn bg-gradient-x-blue-green white"
                                                onclick="getData()">
                                            <i class="la la-file-pdf-o"></i> Export Data
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

<script>
    $(document).ready(function () {
        $('.myreport').addClass('active');
    });

    function showInp(obj) {
        alert(1);
    }
</script>