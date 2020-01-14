<?php ob_start();
header('Content-type: text/html; charset=utf-8');

class Reports extends CI_controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('custom');
        $this->load->model('mprojects');
        $this->load->library('session');
        $this->load->library('tcpdf');
        $this->load->helper('string');
        if (!isset($_SESSION['login']['idUser'])) {
            redirect(base_url());
        }
    }

    function index()
    {
        $MProjects = new MProjects();
        $data = array();
        $data['projects'] = $MProjects->getAllProjects();
        $this->load->view('include/header');
        $this->load->view('include/sidebar');
        $this->load->view('reports', $data);
        $this->load->view('include/footer');
    }


    function getXml()
    {
        ob_end_clean();
        if (isset($_REQUEST['section']) && $_REQUEST['section'] != '' && $_REQUEST['section'] != 0) {
            $this->load->model('msection');
            $MSection = new MSection();
            $searchData = array();
            $searchData['idProjects'] = $_REQUEST['project'];
            $searchData['idCRF'] = (isset($_REQUEST['crf']) && $_REQUEST['crf'] != '' && $_REQUEST['crf'] != 0 ? $_REQUEST['crf'] : 0);
            $searchData['idModule'] = (isset($_REQUEST['module']) && $_REQUEST['module'] != '' && $_REQUEST['module'] != 0 ? $_REQUEST['module'] : 0);
            $searchData['idSection'] = (isset($_REQUEST['section']) && $_REQUEST['section'] != '' && $_REQUEST['section'] != 0 ? $_REQUEST['section'] : 0);

            $xml_layout_name = 'Myactivity';

            $myresult = array();
            $result = $MSection->getSectionDetailData($searchData);
            foreach ($result as $key => $value) {
                if (isset($value->idParentQuestion) && $value->idParentQuestion != '' && array_key_exists(strtolower($value->idParentQuestion), $myresult)) {
                    $mykey = strtolower($value->idParentQuestion);
                    $myresult[strtolower($mykey)]->myrow_options[] = $value;
                } else {
                    $mykey = strtolower($value->variable_name);
                    $myresult[strtolower($mykey)] = $value;
                }
            }

            $data = array();
            foreach ($myresult as $val) {
                $data[] = $val;
            }


            $xml = '<layout xmlns:android="http://schemas.android.com/apk/res/android"  xmlns:tools="http://schemas.android.com/tools" 
  xmlns:app="http://schemas.android.com/apk/res-auto"> 
    <data> 
        <import type="android.view.View" /> 
        <variable name="callback" type="edu.aku.hassannaqvi.template.ui.' . $xml_layout_name . '"/>
    </data> 
    <ScrollView style="@style/i_scrollview"     android:fadeScrollbars="false"  android:fillViewport="true"  
    android:scrollbarSize="10dip" tools:context=".ui.' . $xml_layout_name . '">
   <LinearLayout android:id="@+id/GrpName" android:layout_width="match_parent"  android:layout_height="wrap_content"android:orientation="vertical">';
            /* echo '<pre>';
             print_r($data);
             echo '</pre>';
             exit();*/

            foreach ($data as $key => $value) {
                $xml .= "\n\n" . ' <!-- ' . strtolower($value->variable_name) . '  ' . $value->nature . '   -->' . "\n";
                $xml .= '<androidx.cardview.widget.CardView
                android:id="@+id/fldGrpCV' . strtolower($value->variable_name) . '"
                style="@style/cardView">
                <LinearLayout
                    android:layout_width="match_parent"
                    android:layout_height="wrap_content"
                    android:orientation="vertical">
                    <TextView
                        style="@style/i_textview"
                        android:text="@string/' . strtolower($value->variable_name) . '" />';
                if (isset($value->myrow_options) && $value->myrow_options != '') {

                    /*if ($value->variable_name == 'HH20') {
                        echo '<pre>';
                        print_r($value);
                        echo '</pre>';
//                        exit();
                    }*/

                    if ($value->nature == 'Radio') {
                        $xml .= '<RadioGroup
                        android:id="@+id/' . strtolower($value->variable_name) . '"
                        android:layout_width="match_parent"
                        android:layout_height="match_parent">';
                    }

                    foreach ($value->myrow_options as $options) {
                        if ($options->nature == 'Input-Numeric') {
                            $minVal = 0;
                            $maxVal = 0;
                            if (isset($options->MaxVal) && $options->MaxVal != '') {
                                $maxVal = $options->MaxVal;
                            }
                            if (isset($options->MinVal) && $options->MinVal != '') {
                                $minVal = $options->MinVal;
                            }
                            $xml .= '<TextView
                        style="@style/i_textview"
                        android:text="@string/' . strtolower($options->variable_name) . '" />
                            <com.edittextpicker.aliazaz.EditTextPicker
                                    android:id="@+id/' . strtolower($options->variable_name) . '"
                                    android:layout_width="match_parent"
                                    android:layout_height="wrap_content" 
                                    android:hint="@string/' . strtolower($options->variable_name) . '"
                                    style="@style/EditTextAlphaNumeric"
                                    android:inputType="number"
                                    app:mask="##"
                                    app:maxValue="' . $maxVal . '"
                                    app:minValue="' . $minVal . '"
                                    app:type="range" />';
                        } elseif ($value->nature == 'Radio' && $options->nature == 'Input') {
                            $xml .= '<RadioButton
                                        android:id="@+id/' . strtolower($options->variable_name) . '"
                                        style="@style/radiobutton"
                                        android:text="@string/' . strtolower($options->variable_name) . '" /> 
                        
                            <EditText
                            android:id="@+id/' . strtolower($options->variable_name) . 't"
                            style="@style/radiobutton"
                            android:layout_width="match_parent"
                            android:layout_height="wrap_content" 
                            android:hint="@string/' . strtolower($options->variable_name) . '"
                            android:tag="' . strtolower($options->variable_name) . '"
                            android:text=\'@{' . strtolower($options->variable_name) . '.checked? ' . strtolower($options->variable_name)  . 't.getText().toString() : ""}\'
                            android:visibility=\'@{' . strtolower($options->variable_name) . '.checked? View.VISIBLE : View.GONE}\' />';
                        } elseif ($options->nature == 'Input') {
                            $xml .= '<TextView
                        style="@style/i_textview"
                        android:text="@string/' . strtolower($options->variable_name) . '" />
                            <EditText
                                android:id="@+id/' . strtolower($options->variable_name) . '"
                                style="@style/textInputName"
                                android:layout_width="match_parent"
                                android:layout_height="wrap_content"  
                                android:hint="@string/' . strtolower($options->variable_name) . '" 
                                android:textColor="@android:color/black" />';
                            /* $xml .= '<TextView
                        style="@style/i_textview"
                        android:text="@string/' . strtolower($options->variable_name) . '" />

                            <EditText
                            android:id="@+id/' . strtolower($options->variable_name) . '"
                            style="@style/radiobutton"
                            android:layout_width="match_parent"
                            android:layout_height="wrap_content"
                            android:digits="@string/ed_letterOnly"
                            android:hint="@string/' . strtolower($options->variable_name) . '"
                            android:tag="' . strtolower($options->variable_name) . '"
                            android:text=\'@{' . strtolower($options->variable_name) . '.checked? ' . strtolower($options->variable_name) . 'x.getText().toString() : ""}\'
                            android:visibility=\'@{td1396.checked? View.VISIBLE : View.GONE}\' />';*/
                        } elseif ($options->nature == 'Title') {
                            $xml .= '  <TextView
                        style="@style/i_textview"
                        android:text="@string/' . strtolower($options->variable_name) . '" />';
                        } elseif ($options->nature == 'Radio') {
                            $xml .= '<RadioButton
                                        android:id="@+id/' . strtolower($options->variable_name) . '"
                                        style="@style/radiobutton"
                                        android:text="@string/' . strtolower($options->variable_name) . '" />';
                        }
                    }

                    if ($value->nature == 'Radio') {
                        $xml .= '</RadioGroup>';
                    }

                } else {
                    if ($value->nature == 'Input-Numeric') {
                        $minVal = 0;
                        $maxVal = 0;
                        if (isset($value->MaxVal) && $value->MaxVal != '') {
                            $maxVal = $value->MaxVal;
                        }
                        if (isset($value->MinVal) && $value->MinVal != '') {
                            $minVal = $value->MinVal;
                        }
                        $xml .= '<com.edittextpicker.aliazaz.EditTextPicker
                                    android:id="@+id/' . strtolower($value->variable_name) . '"
                                    android:layout_width="match_parent"
                                    android:layout_height="wrap_content" 
                                    style="@style/EditTextAlphaNumeric"
                                    android:inputType="number"
                                    android:hint="@string/' . strtolower($value->variable_name) . '"
                                    app:mask="##"
                                    app:maxValue="' . $maxVal . '"
                                    app:minValue="' . $minVal . '"
                                    app:type="range" />';
                    } elseif ($value->nature == 'Input') {
                        $xml .= '<EditText
                                android:id="@+id/' . strtolower($value->variable_name) . '"
                                style="@style/textInputName"
                                android:layout_width="match_parent"
                                android:layout_height="wrap_content" 
                                android:hint="@string/' . strtolower($value->variable_name) . '" 
                                android:textColor="@android:color/black" />';
                    } elseif ($value->nature == 'Title') {
                        /*$xml .= '  <TextView
                        style="@style/i_textview"
                        android:text="@string/' . strtolower($value->variable_name) . '" />';*/
                    }
                }
                $xml .= ' </LinearLayout>
            </androidx.cardview.widget.CardView>';
            }


            $xml .= ' <LinearLayout android:layout_width="match_parent" android:layout_height="wrap_content"
                          android:layout_gravity="end" android:layout_marginTop="20dp" android:orientation="horizontal">
                <Button android:id="@+id/btn_End" style="@style/button" android:layout_marginRight="10dp"
                        android:onClick="@{() -> callback.BtnEnd()}" android:text="Cancel"/>
                <Button android:id="@+id/btn_Continue" style="@style/button"
                        android:onClick="@{() -> callback.BtnContinue()}"
                        android:text="Save"/>
                        <!--\'onClick\' for btn_End will NOT change and always call \'endInterview\'-->
            </LinearLayout>';

            $xml .= '</LinearLayout>
    </ScrollView>
</layout>';
            $file = "myactivity.xml";
            $txt = fopen($file, "w") or die("Unable to open file!");
            fwrite($txt, $xml);
            fclose($txt);
            header('Content-Description: File Transfer');
            header('Content-Disposition: attachment; filename=' . basename($file));
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize($file));
            header("Content-Type: text/xml");
            readfile($file);

        } else {
            echo 'Invalid Project, Please select project';
        }
    }

    function getSaveDraftData()
    {
        ob_end_clean();
        if (isset($_REQUEST['section']) && $_REQUEST['section'] != '' && $_REQUEST['section'] != 0) {
            $this->load->model('msection');
            $MSection = new MSection();
            $searchData = array();
            $searchData['idProjects'] = $_REQUEST['project'];
            $searchData['idCRF'] = (isset($_REQUEST['crf']) && $_REQUEST['crf'] != '' && $_REQUEST['crf'] != 0 ? $_REQUEST['crf'] : 0);
            $searchData['idModule'] = (isset($_REQUEST['module']) && $_REQUEST['module'] != '' && $_REQUEST['module'] != 0 ? $_REQUEST['module'] : 0);
            $searchData['idSection'] = (isset($_REQUEST['section']) && $_REQUEST['section'] != '' && $_REQUEST['section'] != 0 ? $_REQUEST['section'] : 0);
            $xml_layout_name = 'Myactivity';
            $myresult = array();
            $result = $MSection->getSectionDetailData($searchData);
            foreach ($result as $key => $value) {
                if (isset($value->idParentQuestion) && $value->idParentQuestion != '' && array_key_exists(strtolower($value->idParentQuestion), $myresult)) {
                    $mykey = strtolower($value->idParentQuestion);
                    $myresult[strtolower($mykey)]->myrow_options[] = $value;
                } else {
                    $mykey = strtolower($value->variable_name);
                    $myresult[strtolower($mykey)] = $value;
                }
            }
            $data = array();
            foreach ($myresult as $val) {
                $data[] = $val;
            }
            $fileData = 'JSONObject f1 = new JSONObject(); ' . "\n";
            foreach ($data as $key => $value) {
                $fileOtherData = '';
                $filesubData = '';
                if (isset($value->question_type) && $value->question_type != '') {
                    $question_type = $value->question_type;
                } else {
                    $question_type = $value->nature;
                }
                if ($question_type == 'Input-Numeric') {
                    $fileData .= 'f1.put("' . strtolower($value->variable_name) . '", bi.' . strtolower($value->variable_name) . '.getText().toString());' . "\n";
                    if (isset($value->myrow_options) && $value->myrow_options != '') {
                        foreach ($value->myrow_options as $options) {
                            if ($options->nature == 'Input-Numeric') {
                                $fileOtherData .= 'f1.put("' . strtolower($options->variable_name) . '", bi.' . strtolower($options->variable_name) . '.getText().toString());' . "\n";
                            } elseif ($options->nature == 'Input') {
                                $fileOtherData .= 'f1.put("' . strtolower($options->variable_name) . '", bi.' . strtolower($options->variable_name) . '.getText().toString());' . "\n";
                            } elseif ($options->nature == 'Title') {
                                $fileOtherData .= 'f1.put("' . strtolower($options->variable_name) . '", bi.' . strtolower($options->variable_name) . '.getText().toString());' . "\n";
                            }
                        }
                    }
                    $fileData .= $fileOtherData;
                } elseif ($question_type == 'Input') {
                    $fileData .= 'f1.put("' . strtolower($value->variable_name) . '", bi.' . strtolower($value->variable_name) . '.getText().toString());' . "\n";
                    if (isset($value->myrow_options) && $value->myrow_options != '') {
                        foreach ($value->myrow_options as $options) {
                            if ($options->nature == 'Input-Numeric') {
                                $fileOtherData .= 'f1.put("' . strtolower($options->variable_name) . '", bi.' . strtolower($options->variable_name) . '.getText().toString());' . "\n";
                            } elseif ($options->nature == 'Input') {
                                $fileOtherData .= 'f1.put("' . strtolower($options->variable_name) . '", bi.' . strtolower($options->variable_name) . '.getText().toString());' . "\n";
                            } elseif ($options->nature == 'Title') {
                                $fileOtherData .= 'f1.put("' . strtolower($options->variable_name) . '", bi.' . strtolower($options->variable_name) . '.getText().toString());' . "\n";
                            }
                        }
                    }
                    $fileData .= $fileOtherData;
                } elseif ($question_type == 'Title') {
//                    $fileData .= 'f1.put("' . strtolower($value->variable_name) . '", bi.' . strtolower($value->variable_name) . '.getText().toString());' . "\n";
                    if (isset($value->myrow_options) && $value->myrow_options != '') {
                        foreach ($value->myrow_options as $options) {
                            if ($options->nature == 'Input-Numeric') {
                                $fileOtherData .= 'f1.put("' . strtolower($options->variable_name) . '", bi.' . strtolower($options->variable_name) . '.getText().toString());' . "\n";
                            } elseif ($options->nature == 'Input') {
                                $fileOtherData .= 'f1.put("' . strtolower($options->variable_name) . '", bi.' . strtolower($options->variable_name) . '.getText().toString());' . "\n";
                            } elseif ($options->nature == 'Title') {
                                $fileOtherData .= 'f1.put("' . strtolower($options->variable_name) . '", bi.' . strtolower($options->variable_name) . '.getText().toString());' . "\n";
                            }
                        }
                    }
                    $fileData .= $fileOtherData;
                } elseif ($question_type == 'Radio') {
                    $fileData .= 'f1.put("' . strtolower($value->variable_name) . '", ' . "\n";
                    if (isset($value->myrow_options) && $value->myrow_options != '') {
                        foreach ($value->myrow_options as $options) {
                            $fileData .= 'bi.' . strtolower($options->variable_name) . '.isChecked() ?"' . $options->option_value . '" : ' . "\n";
                            if ($options->nature == 'Input-Numeric') {
                                $fileOtherData .= 'f1.put("' . strtolower($options->variable_name) . '", bi.' . strtolower($options->variable_name) . '.getText().toString());' . "\n";
                            } elseif ($options->nature == 'Input') {
                                $fileOtherData .= 'f1.put("' . strtolower($options->variable_name) . '", bi.' . strtolower($options->variable_name) . '.getText().toString());' . "\n";
                            } elseif ($options->nature == 'Title') {
//                                $fileOtherData .= 'f1.put("' . strtolower($options->variable_name) . '", bi.' . strtolower($options->variable_name) . '.getText().toString());' . "\n";
                            }
                        }
                    }
                    $fileData .= ' "0"); ' . "\n";
                    $fileData .= $fileOtherData;
                } elseif ($question_type == 'CheckBox') {
                    if (isset($value->myrow_options) && $value->myrow_options != '') {
                        foreach ($value->myrow_options as $options) {
                            $fileOtherData .= 'f1.put("' . strtolower($options->variable_name) . '",bi.' . strtolower($options->variable_name) . '.isChecked() ?"' . $options->option_value . '" :"0");' . "\n";
                            if ($options->nature == 'Input-Numeric') {
                                $fileOtherData .= 'f1.put("' . strtolower($options->variable_name) . '", bi.' . strtolower($options->variable_name) . '.getText().toString());' . "\n";
                            } elseif ($options->nature == 'Input') {
                                $fileOtherData .= 'f1.put("' . strtolower($options->variable_name) . '", bi.' . strtolower($options->variable_name) . '.getText().toString());' . "\n";
                            } elseif ($options->nature == 'Title') {
                                $fileOtherData .= 'f1.put("' . strtolower($options->variable_name) . '", bi.' . $options->variable_name . '.getText().toString());' . "\n";
                            }
                        }
                    }
                    $fileData .= $fileOtherData;
                }
            }
            $file = "savedraft.java";
            $txt = fopen($file, "w") or die("Unable to open file!");
            fwrite($txt, $fileData);
            fclose($txt);
            header('Content-Description: File Transfer');
            header('Content-Disposition: attachment; filename=' . basename($file));
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize($file));
            header("Content-Type: text/plain");
            readfile($file);
        } else {
            echo 'Invalid Project, Please select project';
        }
    }

    function getSaveDraftData2()
    {
        ob_end_clean();
        if (isset($_REQUEST['section']) && $_REQUEST['section'] != '' && $_REQUEST['section'] != 0) {
            $this->load->model('msection');
            $MSection = new MSection();
            $searchData = array();
            $searchData['idProjects'] = $_REQUEST['project'];
            $searchData['idCRF'] = (isset($_REQUEST['crf']) && $_REQUEST['crf'] != '' && $_REQUEST['crf'] != 0 ? $_REQUEST['crf'] : 0);
            $searchData['idModule'] = (isset($_REQUEST['module']) && $_REQUEST['module'] != '' && $_REQUEST['module'] != 0 ? $_REQUEST['module'] : 0);
            $searchData['idSection'] = (isset($_REQUEST['section']) && $_REQUEST['section'] != '' && $_REQUEST['section'] != 0 ? $_REQUEST['section'] : 0);

            $xml_layout_name = 'Myactivity';

            $myresult = array();
            $result = $MSection->getSectionDetailData($searchData);
            foreach ($result as $key => $value) {
                if (isset($value->idParentQuestion) && $value->idParentQuestion != '' && array_key_exists($value->idParentQuestion, $myresult)) {
                    $mykey = $value->idParentQuestion;
                    $myresult[$mykey]->myrow_options[] = $value;
                } else {
                    $mykey = strtolower($value->variable_name);
                    $myresult[$mykey] = $value;
                }
            }

            $data = array();
            foreach ($myresult as $val) {
                $data[] = $val;
            }
            /*echo '<pre>';
            print_r($data);
            echo '</pre>';
            exit();*/
            /* $result = $MSection->getSectionDetailData($searchData);*/
            $fileData = 'JSONObject f1 = new JSONObject(); ' . "\n";

            foreach ($data as $key => $value) {
                $fileOtherData = '';
                $filesubData = '';
                /* if (isset($value->myrow_options) && $value->myrow_options != '') {
                     foreach ($value->myrow_options as $options) {
                         if ($options->nature == 'Input-Numeric') {
                             $filesubData .= 'f1.put("' . $options->variable_name . '", bi.' . $options->variable_name . '.getText().toString());' . "\n";
                         } elseif ($options->nature == 'Input') {
                             $filesubData .= 'f1.put("' . $options->variable_name . '", bi.' . $options->variable_name . '.getText().toString());' . "\n";
                         } elseif ($options->nature == 'Title') {
                             $filesubData .= 'f1.put("' . $options->variable_name . '", bi.' . $options->variable_name . '.getText().toString());' . "\n";
                         } elseif ($options->nature == 'Radio') {
                             $filesubData .= 'bi.' . $options->variable_name . '.isChecked() ?"' . $options->option_value . '" : '. "\n";
                         } elseif ($options->nature == 'CheckBox') {
                             $filesubData .= 'f1.put("f3a05c",bi.f3a05c.isChecked() ?"3" :"0");' . "\n";
                         }
                     }
                 }*/

                if (isset($value->question_type) && $value->question_type != '') {
                    $question_type = $value->question_type;
                } else {
                    $question_type = $value->nature;
                }
                if ($question_type == 'Input-Numeric') {
                    $fileData .= 'f1.put("' . strtolower($value->variable_name) . '", bi.' . strtolower($value->variable_name) . '.getText().toString());' . "\n";
                    if (isset($value->myrow_options) && $value->myrow_options != '') {
                        foreach ($value->myrow_options as $options) {
                            if ($options->nature == 'Input-Numeric') {
                                $fileOtherData .= 'f1.put("' . strtolower($value->variable_name) . '", bi.' . strtolower($value->variable_name) . '.getText().toString());' . "\n";
                            } elseif ($options->nature == 'Input') {
                                $fileOtherData .= 'f1.put("' . strtolower($value->variable_name) . '", bi.' . strtolower($value->variable_name) . '.getText().toString());' . "\n";
                            } elseif ($options->nature == 'Title') {
                                $fileOtherData .= 'f1.put("' . strtolower($value->variable_name) . '", bi.' . strtolower($value->variable_name) . '.getText().toString());' . "\n";
                            }
                        }
                    }
                    $fileData .= $fileOtherData;
                } elseif ($question_type == 'Input') {
                    $fileData .= 'f1.put("' . $value->variable_name . '", bi.' . $value->variable_name . '.getText().toString());' . "\n";
                    if (isset($value->myrow_options) && $value->myrow_options != '') {
                        foreach ($value->myrow_options as $options) {
                            if ($options->nature == 'Input-Numeric') {
                                $fileOtherData .= 'f1.put("' . strtolower($value->variable_name) . '", bi.' . strtolower($value->variable_name) . '.getText().toString());' . "\n";
                            } elseif ($options->nature == 'Input') {
                                $fileOtherData .= 'f1.put("' . strtolower($value->variable_name) . '", bi.' . strtolower($value->variable_name) . '.getText().toString());' . "\n";
                            } elseif ($options->nature == 'Title') {
                                $fileOtherData .= 'f1.put("' . strtolower($value->variable_name) . '", bi.' . strtolower($value->variable_name) . '.getText().toString());' . "\n";
                            }
                        }
                    }
                    $fileData .= $fileOtherData;
                } elseif ($question_type == 'Title') {
                    $fileData .= 'f1.put("' . strtolower($value->variable_name) . '", bi.' . strtolower($value->variable_name) . '.getText().toString());' . "\n";
                    if (isset($value->myrow_options) && $value->myrow_options != '') {
                        foreach ($value->myrow_options as $options) {
                            if ($options->nature == 'Input-Numeric') {
                                $fileOtherData .= 'f1.put("' . strtolower($value->variable_name) . '", bi.' . strtolower($value->variable_name) . '.getText().toString());' . "\n";
                            } elseif ($options->nature == 'Input') {
                                $fileOtherData .= 'f1.put("' . strtolower($value->variable_name) . '", bi.' . strtolower($value->variable_name) . '.getText().toString());' . "\n";
                            } elseif ($options->nature == 'Title') {
                                $fileOtherData .= 'f1.put("' . strtolower($value->variable_name) . '", bi.' . strtolower($value->variable_name) . '.getText().toString());' . "\n";
                            }
                        }
                    }
                    $fileData .= $fileOtherData;
                } elseif ($question_type == 'Radio') {
                    $fileData .= 'f1.put("' . strtolower($value->variable_name) . '", ' . "\n";
                    if (isset($value->myrow_options) && $value->myrow_options != '') {
                        foreach ($value->myrow_options as $options) {
                            $fileData .= 'bi.' . strtolower($value->variable_name) . '.isChecked() ?"' . $options->option_value . '" : ' . "\n";
                            if ($options->nature == 'Input-Numeric') {
                                $fileOtherData .= 'f1.put("' . strtolower($value->variable_name) . '", bi.' . strtolower($value->variable_name) . '.getText().toString());' . "\n";
                            } elseif ($options->nature == 'Input') {
                                $fileOtherData .= 'f1.put("' . strtolower($value->variable_name) . '", bi.' . strtolower($value->variable_name) . '.getText().toString());' . "\n";
                            } elseif ($options->nature == 'Title') {
                                $fileOtherData .= 'f1.put("' . strtolower($value->variable_name) . '", bi.' . strtolower($value->variable_name) . '.getText().toString());' . "\n";
                            }
                        }
                    }
                    $fileData .= ' "0"); ' . "\n";
                    $fileData .= $fileOtherData;
                } elseif ($question_type == 'CheckBox') {
                    if (isset($value->myrow_options) && $value->myrow_options != '') {
                        foreach ($value->myrow_options as $options) {
                            $fileOtherData .= 'f1.put("' . strtolower($value->variable_name) . '",bi.' . strtolower($value->variable_name) . '.isChecked() ?"' . $options->option_value . '" :"0");' . "\n";
                            if ($options->nature == 'Input-Numeric') {
                                $fileOtherData .= 'f1.put("' . strtolower($value->variable_name) . '", bi.' . strtolower($value->variable_name) . '.getText().toString());' . "\n";
                            } elseif ($options->nature == 'Input') {
                                $fileOtherData .= 'f1.put("' . strtolower($value->variable_name) . '", bi.' . strtolower($value->variable_name) . '.getText().toString());' . "\n";
                            } elseif ($options->nature == 'Title') {
                                $fileOtherData .= 'f1.put("' . strtolower($value->variable_name) . '", bi.' . strtolower($value->variable_name) . '.getText().toString());' . "\n";
                            }
                        }
                    }
                    $fileData .= $fileOtherData;
                }
            }

            $file = "savedraft.java";
            $txt = fopen($file, "w") or die("Unable to open file!");
            fwrite($txt, $fileData);
            fclose($txt);
            header('Content-Description: File Transfer');
            header('Content-Disposition: attachment; filename=' . basename($file));
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize($file));
            header("Content-Type: text/plain");
            readfile($file);

        } else {
            echo 'Invalid Project, Please select project';
        }
    }

    function getStings()
    {
        ob_end_clean();
        if (isset($_REQUEST['section']) && $_REQUEST['section'] != '' && $_REQUEST['section'] != 0) {
            $this->load->model('msection');
            $MSection = new MSection();
            $searchData = array();
            $searchData['idProjects'] = $_REQUEST['project'];
            $searchData['idCRF'] = (isset($_REQUEST['crf']) && $_REQUEST['crf'] != '' && $_REQUEST['crf'] != 0 ? $_REQUEST['crf'] : 0);
            $searchData['idModule'] = (isset($_REQUEST['module']) && $_REQUEST['module'] != '' && $_REQUEST['module'] != 0 ? $_REQUEST['module'] : 0);
            $searchData['idSection'] = (isset($_REQUEST['section']) && $_REQUEST['section'] != '' && $_REQUEST['section'] != 0 ? $_REQUEST['section'] : 0);
            if (isset($_REQUEST['language']) && $_REQUEST['language'] != '') {
                $lang = 'label_' . $_REQUEST['language'];
            } else {
                $lang = 'label_l1';
            }
            $result = $MSection->getSectionDetailData($searchData);
            $fileEngSting = '';
            foreach ($result as $key => $value) {
                $fileEngSting .= '<string name="' . strtolower($value->variable_name) . '">' . htmlspecialchars($value->$lang) . '</string>' . "\n";
            }
            $file = $lang . "sting.xml";
            $txt = fopen($file, "w") or die("Unable to open file!");
            fwrite($txt, $fileEngSting);
            fclose($txt);
            header('Content-Description: File Transfer');
            header('Content-Disposition: attachment; filename=' . basename($file));
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize($file));
            header("Content-Type: text/xml");
            readfile($file);
        } else {
            echo 'Invalid Section, Please provide proper details';
        }
    }

    function getExcel($slug)
    {
        ob_end_clean();
        $this->load->model('msection');
        $fileName = 'data-dictionaryportal-' . time() . '.xlsx';
        $this->load->library('excel');
        $MSection = new MSection();
        $searchData = array();
        $searchData['idSection'] = $slug;
//        $listInfo = $MSection->getExcelData($searchData);


        $myresult = array();
        $searchData = array();
        $searchData['idSection'] = (isset($slug) && $slug != '' && $slug != 0 ? $slug : 0);
        $result = $MSection->getSectionDetailData($searchData);
        foreach ($result as $key => $value) {
            if (isset($value->idParentQuestion) && $value->idParentQuestion != '' && array_key_exists($value->idParentQuestion, $myresult)) {
                $mykey = $value->idParentQuestion;
                $myresult[$mykey]->myrow_options[] = $value;
            } else {
                $mykey = $value->variable_name;
                $myresult[$mykey] = $value;
            }
        }

        $data = array();
        foreach ($myresult as $val) {
            $data[] = $val;
        }
        $objPHPExcel = new    PHPExcel();
        $objPHPExcel->setActiveSheetIndex(0);
        $objPHPExcel->getActiveSheet()->SetCellValue('A1', 'Variable');
        $objPHPExcel->getActiveSheet()->SetCellValue('B1', 'Variable App');
        $objPHPExcel->getActiveSheet()->SetCellValue('C1', 'Type');
        $objPHPExcel->getActiveSheet()->SetCellValue('D1', 'Values');
        $objPHPExcel->getActiveSheet()->SetCellValue('E1', 'Skip On xml');
        $objPHPExcel->getActiveSheet()->SetCellValue('F1', 'Tag No');
        $objPHPExcel->getActiveSheet()->SetCellValue('G1', 'Min Range');
        $objPHPExcel->getActiveSheet()->SetCellValue('H1', 'Max Range');
        $objPHPExcel->getActiveSheet()->SetCellValue('I1', 'Language 1');
        $objPHPExcel->getActiveSheet()->SetCellValue('J1', 'Language 2');
        $objPHPExcel->getActiveSheet()->SetCellValue('K1', 'Language 3');
        $objPHPExcel->getActiveSheet()->SetCellValue('L1', 'Language 4');
        $objPHPExcel->getActiveSheet()->SetCellValue('M1', 'Language 5');
        $objPHPExcel->getActiveSheet()->getStyle("A1:Z1")->getFont()->setBold(true);
        $rowCount = 1;
        foreach ($data as $list) {
            $rowCount++;
            $objPHPExcel->getActiveSheet()->SetCellValue('A' . $rowCount, $list->variable_name);
            $objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount, $list->variable_name);
            $objPHPExcel->getActiveSheet()->SetCellValue('C' . $rowCount, $list->nature_var);
            $objPHPExcel->getActiveSheet()->SetCellValue('D' . $rowCount, $list->option_value);
            $objPHPExcel->getActiveSheet()->SetCellValue('E' . $rowCount, $list->skipQuestion);
            $objPHPExcel->getActiveSheet()->SetCellValue('F' . $rowCount, $list->skipQuestion);
            $objPHPExcel->getActiveSheet()->SetCellValue('G' . $rowCount, $list->MinVal);
            $objPHPExcel->getActiveSheet()->SetCellValue('H' . $rowCount, $list->MaxVal);
            $objPHPExcel->getActiveSheet()->SetCellValue('I' . $rowCount, $list->label_l1);
            $objPHPExcel->getActiveSheet()->SetCellValue('J' . $rowCount, $list->label_l2);
            $objPHPExcel->getActiveSheet()->SetCellValue('K' . $rowCount, $list->label_l3);
            $objPHPExcel->getActiveSheet()->SetCellValue('L' . $rowCount, $list->label_l4);
            $objPHPExcel->getActiveSheet()->SetCellValue('M' . $rowCount, $list->label_l5);

            if (isset($list->myrow_options) && $list->myrow_options != '') {
                foreach ($list->myrow_options as $options) {
                    $rowCount++;
                    $objPHPExcel->getActiveSheet()->SetCellValue('A' . $rowCount, $options->variable_name);
                    $objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount, $options->variable_name);
                    $objPHPExcel->getActiveSheet()->SetCellValue('C' . $rowCount, $options->nature_var);
                    $objPHPExcel->getActiveSheet()->SetCellValue('D' . $rowCount, $options->option_value);
                    $objPHPExcel->getActiveSheet()->SetCellValue('E' . $rowCount, $options->skipQuestion);
                    $objPHPExcel->getActiveSheet()->SetCellValue('F' . $rowCount, $options->skipQuestion);
                    $objPHPExcel->getActiveSheet()->SetCellValue('G' . $rowCount, $options->MinVal);
                    $objPHPExcel->getActiveSheet()->SetCellValue('H' . $rowCount, $options->MaxVal);
                    $objPHPExcel->getActiveSheet()->SetCellValue('I' . $rowCount, $options->label_l1);
                    $objPHPExcel->getActiveSheet()->SetCellValue('J' . $rowCount, $options->label_l2);
                    $objPHPExcel->getActiveSheet()->SetCellValue('K' . $rowCount, $options->label_l3);
                    $objPHPExcel->getActiveSheet()->SetCellValue('L' . $rowCount, $options->label_l4);
                    $objPHPExcel->getActiveSheet()->SetCellValue('M' . $rowCount, $options->label_l5);
                }
            }

            $rowCount++;
            $objPHPExcel->getActiveSheet()->SetCellValue('A' . $rowCount, '?');
            $objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount, '?');

        }
        $objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);
        header('Content-Type: application/vnd.ms-excel'); //mime type
        header('Content-Disposition: attachment;filename="' . $fileName . '"'); //tell browser what's the file name
        header('Cache-Control: max-age=0'); //no cache
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
        $objWriter->save('php://output');


        /*$this->load->model('msection');
        if (isset($slug) && $slug != '') {
            $MSection = new MSection();
            $searchData = array();
            $searchData['idSection'] = $slug;
            $GetReportData = $MSection->getExcelData($searchData);

            $delimiter = ",";
            ob_start();
            //create a file pointer
            $f = fopen('php://memory', 'w');
            //set column headers
            $fields = array('Variable', 'Variable App', 'type', 'Option Title', 'Option Values', 'Skip On xml', 'Tag No', 'Min Range', 'Max Range',
                'Language 1', 'Language 2', 'Language 3', 'Language 4', 'Language 5');
            fputcsv($f, $fields, $delimiter);
            //output each row of the data, format line as csv and write to file pointer
            if ($GetReportData) {
                foreach ($GetReportData as $row) {
                    $lineData = array(
                        $row->variable_name,
                        $row->variable_name,
                        $row->nature,
                        $row->option_title,
                        $row->option_value,
                        $row->skipQuestion,
                        $row->skipQuestion,
                        $row->MinVal,
                        $row->MaxVal,
                        $row->label_l1,
                        $row->label_l2,
                        $row->label_l3,
                        $row->label_l4,
                        $row->label_l5);
                    fputcsv($f, $lineData, $delimiter);
                }
            }

            //move back to beginning of file
            fseek($f, 0);
            //set headers to download file rather than displayed
            $filename = "dictionary_" . date('Y-m-d') . ".csv";
            ob_end_clean();

//			header("Content-Disposition: attachment; filename=' . $filename . ' ");
            header("Cache-Control: cache, must-revalidate");
            header("Pragma: public");
            header('Content-Type: text/csv,  charset=UTF-8; encoding=UTF-8');


//			header('Content-type: text/csv; charset=utf-8');
            header('Content-Disposition: attachment; filename="' . $filename . '";');
            fpassthru($f);

        } else {
            echo 2;
        }*/
    }

    function getPDF2()
    {
        if (isset($_REQUEST['project']) && $_REQUEST['project'] != '' && $_REQUEST['project'] != 0) {
            $idProject = $_REQUEST['project'];
            $this->load->model('mmodule');
            $this->load->model('msection');
            $searchData = array();
            $searchData['idProjects'] = $idProject;
            $searchData['idCRF'] = (isset($_REQUEST['crf']) && $_REQUEST['crf'] != '' && $_REQUEST['crf'] != 0 ? $_REQUEST['crf'] : 0);

            $MProjects = new MProjects();
            $MModule = new MModule();
            $MSection = new MSection();
            $GetReportData = $MProjects->getPDFData($searchData);
            /* echo '<pre>';
             print_r($GetReportData);
             echo '</pre>';
             exit();*/

            $project_name = $GetReportData[0]->project_name;
            $short_title = strtoupper($GetReportData[0]->short_title);
            $title = $project_name . ' (' . $short_title . ')';
            $pdf = new TCPDF('L', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
            $pdf->SetCreator(PDF_CREATOR);
            $pdf->SetAuthor('Dictionary Portal');
            $pdf->SetTitle($title);
            $pdf->SetSubject($title);
            $pdf->SetKeywords($title);
            $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
            $pdf->SetTopMargin(1);
            $pdf->setPrintHeader(false);

            $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
            $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
            $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
            $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
            if (@file_exists(dirname(__FILE__) . '/lang/eng.php')) {
                require_once(dirname(__FILE__) . '/lang/eng.php');
            }
            $pdf->setFontSubsetting(true);
            $pdf->SetFont('freeserif', '', 12);
            $html = '';
            $style = "<style>
                        h1{text-align: center; font-size: 30px;  color: #002D57;}
                        h3{text-align: center; font-size: 22px;}
                        h4{font-size: 18px;}
                        small{font-size: 12px} 
                        table tr th{ border:1px solid black; font-weight: bold; background-color: #0277bd; color: #ffffff;   text-align: left;
  padding: 8px; }
                        table tr td{ border:1px solid black; }
                        .createdby{text-align: right;}
                        </style>";
            $pdf->AddPage();
            $Mainheader = '';
            foreach ($GetReportData as $projectsCrfs) {
//                $pdf->AddPage();
                $searchData['idCRF'] = $projectsCrfs->id_crf;
                $crf_name = $projectsCrfs->crf_name;
                $crf_title = $crf_name . ' (' . strtoupper($projectsCrfs->crf_title) . ')';
                $Mainheader = "<div class='head'>
                                    <h1 class='mainheading'>" . $title . "</h1>
                                    <h3 class='subheading'>" . $crf_title . "</h3>
                               </div>";
                $pdf->writeHTML($style . $Mainheader, true, false, true, false, 'centre');
                $pdf->AddPage();


                $getModules = $MModule->getModulesData($searchData);
                foreach ($getModules as $keyModule => $valueModule) {
                    $subhtml = "<div class='moduleDiv'>";
                    if (isset($valueModule->module_name_l1) && $valueModule->module_name_l1 != '') {
                        $subhtml .= "<h4>" . htmlentities($valueModule->module_name_l1) . " : <small>" . $valueModule->module_desc_l1 . "</small></h4>";
                    }
                    if (isset($valueModule->module_name_l2) && $valueModule->module_name_l2 != '') {
                        $subhtml .= "<h4>" . $valueModule->module_name_l2 . "</h4><h5>" . $valueModule->module_desc_l2 . "</h5>";
                    }
                    if (isset($valueModule->module_name_l3) && $valueModule->module_name_l3 != '') {
                        $subhtml .= "<h4>" . $valueModule->module_name_l3 . "</h4><h5>" . $valueModule->module_desc_l3 . "</h5>";
                    }
                    if (isset($valueModule->module_name_l4) && $valueModule->module_name_l4 = '') {
                        $subhtml .= "<h4>" . $valueModule->module_name_l4 . "</h4><h5>" . $valueModule->module_desc_l4 . "</h5>";
                    }
                    if (isset($valueModule->module_name_l5) && $valueModule->module_name_l5 != '') {
                        $subhtml .= "<h4>" . $valueModule->module_name_l5 . " </h4><h5>" . $valueModule->module_desc_l5 . "</h5>";
                    }
                    $subhtml .= "</div>";

                    $ModuleSearchData = array();
                    $ModuleSearchData['idModule'] = $valueModule->idModule;
                    $getSections = $MSection->getSectionData($ModuleSearchData);


                    foreach ($getSections as $keySection => $valueSection) {

                        $subhtml .= "<div class='sectionDiv'>";
                        if (isset($valueSection->section_title) && $valueSection->section_title != '') {
                            $subhtml .= "<h4>" . $valueModule->variable_module . $valueSection->section_var_name . ": " . htmlentities($valueSection->section_title) . " : <small>" . $valueSection->section_desc . " </small></h4>";

                        }
                        $subhtml .= "</div>";

                        $ModuleSearchData['idSection'] = $valueSection->idSection;
                        $getSectionDetails = $MSection->getSectionDetailsData($ModuleSearchData);

                        $subhtml .= '<div class="sectionDetailDiv"> 
                                     <table style="width:100%">
                                       <thead>
                                            <tr>
                                                <th>Variable</th>
                                                <th>Label</th>
                                                <th>Nature</th>
                                                <th>Option Title</th>
                                                <th>Option Value</th>
                                            </tr>   
                                        </thead>
                                        <tbody> ';


                        foreach ($getSectionDetails as $keySectionDetail => $valueSectionDetail) {
                            if (isset($valueSectionDetail->variable_name) && $valueSectionDetail->variable_name != '') {

                                if (isset($valueSectionDetail->label_l2) && $valueSectionDetail->label_l2 != '') {
                                    $l2sec = '<br>' . $valueSectionDetail->label_l2;
                                }
                                if (isset($valueSectionDetail->label_l3) && $valueSectionDetail->label_l3 != '') {
                                    $l3sec = '<br>' . $valueSectionDetail->label_l3;
                                }
                                if (isset($valueSectionDetail->label_l4) && $valueSectionDetail->label_l4 != '') {
                                    $l4sec = '<br>' . $valueSectionDetail->label_l4;
                                }
                                if (isset($valueSectionDetail->label_l5) && $valueSectionDetail->label_l5 != '') {
                                    $l5sec = '<br>' . $valueSectionDetail->label_l5;
                                }
                                $subhtml .= "<tr style='page-break-inside: avoid;'>
                                       <td >" . $valueSectionDetail->variable_name . "</td>
                                       <td>   
                                            " . $valueSectionDetail->label_l1 . " 
                                             " . $l2sec . " 
                                             " . $l3sec . " 
                                             " . $l4sec . "
                                             " . $l5sec . "  
                                        </td>
                                        <td> " . $valueSectionDetail->nature . "</td>
                                        <td> " . $valueSectionDetail->option_title . "</td>
                                        <td> " . $valueSectionDetail->option_value . "</td> 
                                    </tr> ";
                            }


                        }
                        $subhtml .= " </tbody></table> </div>";

                    }

                    $pdf->writeHTML($style . $subhtml, true, false, true, false, 'LEFT');
                    $pdf->AddPage();
                }


            }
            $endheader = "<div class='head'><h1 class='mainheading'>The END</h1></div>";
            $pdf->writeHTML($style . $endheader, true, false, true, false, 'centre');
            $bMargin = $pdf->getBreakMargin();
            $auto_page_break = $pdf->getAutoPageBreak();
            $pdf->SetAutoPageBreak(true, 0);
            $pdf->SetAutoPageBreak($auto_page_break, $bMargin);
            $pdf->setPageMark();
            ob_end_clean();
            $pdf->Output('dictionary.pdf', 'I');


        } else {
            echo 'Invalid Project, Please select project';
        }
    }

    function getPDF()
    {
        if (isset($_REQUEST['project']) && $_REQUEST['project'] != '' && $_REQUEST['project'] != 0) {

            $idProject = $_REQUEST['project'];
            $this->load->model('mmodule');
            $this->load->model('msection');
            $MProjects = new MProjects();
            $MModule = new MModule();
            $MSection = new MSection();

            $searchData = array();
            $searchData['idProjects'] = $idProject;
            $searchData['idCRF'] = (isset($_REQUEST['crf']) && $_REQUEST['crf'] != '' && $_REQUEST['crf'] != 0 ? $_REQUEST['crf'] : 0);
            $searchData['idModule'] = (isset($_REQUEST['module']) && $_REQUEST['module'] != '' && $_REQUEST['module'] != 0 ? $_REQUEST['module'] : 0);
            $searchData['idSection'] = (isset($_REQUEST['section']) && $_REQUEST['section'] != '' && $_REQUEST['section'] != 0 ? $_REQUEST['section'] : 0);
            $searchData['language'] = (isset($_REQUEST['language']) && $_REQUEST['language'] != '' ? $_REQUEST['language'] : 0);

            if ($searchData['language'] === 'l1') {
                $displaylanguagel1 = 'on';
                $displaylanguagel2 = 'off';
                $displaylanguagel3 = 'off';
                $displaylanguagel4 = 'off';
                $displaylanguagel5 = 'off';
            } elseif ($searchData['language'] === 'l2') {
                $displaylanguagel1 = 'off';
                $displaylanguagel2 = 'on';
                $displaylanguagel3 = 'off';
                $displaylanguagel4 = 'off';
                $displaylanguagel5 = 'off';
            } elseif ($searchData['language'] === 'l3') {
                $displaylanguagel1 = 'off';
                $displaylanguagel2 = 'off';
                $displaylanguagel3 = 'on';
                $displaylanguagel4 = 'off';
                $displaylanguagel5 = 'off';
            } elseif ($searchData['language'] === 'l4') {
                $displaylanguagel1 = 'off';
                $displaylanguagel2 = 'off';
                $displaylanguagel3 = 'off';
                $displaylanguagel4 = 'on';
                $displaylanguagel5 = 'off';
            } elseif ($searchData['language'] === 'l5') {
                $displaylanguagel1 = 'off';
                $displaylanguagel2 = 'off';
                $displaylanguagel3 = 'off';
                $displaylanguagel4 = 'off';
                $displaylanguagel5 = 'on';
            } else {
                $displaylanguagel1 = 'on';
                $displaylanguagel2 = 'on';
                $displaylanguagel3 = 'on';
                $displaylanguagel4 = 'on';
                $displaylanguagel5 = 'on';
            }
            /* echo $searchData['language'];
             echo '<br>l1'.$displaylanguagel1;
             echo '<br>l2'.$displaylanguagel2;
             echo '<br>l3'.$displaylanguagel3;
             echo '<br>l4'.$displaylanguagel4;
             echo '<br>l5'.$displaylanguagel5;
             exit();*/
            /*  echo $displaylanguage;
              echo '<pre>';
              print_r($searchData);
              echo '</pre>';
              exit();*/

            $l2sec = '';
            $l3sec = '';
            $l4sec = '';
            $l5sec = '';
            $GetReportData = $MProjects->getPDFData($searchData);


            $project_name = $GetReportData[0]->project_name;
            $short_title = strtoupper($GetReportData[0]->short_title);
            $title = $project_name . ' (' . $short_title . ')';

            $pdf = new TCPDF('L', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

            $pdf->SetCreator(PDF_CREATOR);
            $pdf->SetAuthor('Dictionary Portal');
            $pdf->SetTitle($title);
            $pdf->SetSubject($title);
            $pdf->SetKeywords($title);
            $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
            $pdf->SetTopMargin(1);
            $pdf->setPrintHeader(false);

            $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
            $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
            $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
            $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
            if (@file_exists(dirname(__FILE__) . '/lang/eng.php')) {
                require_once(dirname(__FILE__) . '/lang/eng.php');
            }
            $pdf->setFontSubsetting(true);
            $pdf->SetFont('freeserif', '', 12);
            $html = '';
            $style = "<style>
                        h1{text-align: center; font-size: 30px;  color: #002D57;}
                        h3{text-align: center; font-size: 22px;}
                        h4{font-size: 18px;}
                        small{font-size: 12px}   
                        </style>";

            $Mainheader = '';

            foreach ($GetReportData as $projectsCrfs) {
//                $pdf->AddPage();
                $searchData['idCRF'] = $projectsCrfs->id_crf;
                $crf_name = $projectsCrfs->crf_name;
                $crf_title = $crf_name . ' (' . strtoupper($projectsCrfs->crf_title) . ')';
                $Mainheader = "<div class='head'>
                                    <h1 class='mainheading'>" . $title . "</h1>
                                    <h3 class='subheading'>" . $crf_title . "</h3>
                               </div>";
                $pdf->AddPage();
                $pdf->writeHTML($style . $Mainheader, true, false, true, false, 'centre');


                $getModules = $MModule->getModulesData($searchData);

                foreach ($getModules as $keyModule => $valueModule) {
                    $l = 0;
                    $subhtml = "<div class='moduleDiv'>";
                    if (isset($valueModule->module_name_l1) && $valueModule->module_name_l1 != '' &&
                        $displaylanguagel1 == 'on') {
                        $subhtml .= "<h4>" . htmlentities($valueModule->module_name_l1) . " : <small>" . $valueModule->module_desc_l1 . "</small></h4>";
                    }
                    if (isset($valueModule->module_name_l2) && $valueModule->module_name_l2 != '' &&
                        $displaylanguagel2 == 'on') {
                        $subhtml .= "<h4>" . $valueModule->module_name_l2 . "</h4><h5>" . $valueModule->module_desc_l2 . "</h5>";
                    }
                    if (isset($valueModule->module_name_l3) && $valueModule->module_name_l3 != '' &&
                        $displaylanguagel3 == 'on') {
                        $subhtml .= "<h4>" . $valueModule->module_name_l3 . "</h4><h5>" . $valueModule->module_desc_l3 . "</h5>";
                    }
                    if (isset($valueModule->module_name_l4) && $valueModule->module_name_l4 = '' &&
                            $displaylanguagel4 == 'on') {
                        $subhtml .= "<h4>" . $valueModule->module_name_l4 . "</h4><h5>" . $valueModule->module_desc_l4 . "</h5>";
                    }
                    if (isset($valueModule->module_name_l5) && $valueModule->module_name_l5 != '' &&
                        $displaylanguagel5 == 'on') {
                        $subhtml .= "<h4>" . $valueModule->module_name_l5 . " </h4><h5>" . $valueModule->module_desc_l5 . "</h5>";
                    }
                    $subhtml .= "</div>";
                    /* $pdf->AddPage();
                     $pdf->writeHTML(  $subhtml, true, false, false, false, '');*/


                    $ModuleSearchData = array();
                    $ModuleSearchData['idModule'] = $valueModule->idModule;
                    $ModuleSearchData['idSection'] = $searchData['idSection'];
                    $getSections = $MSection->getSectionData($ModuleSearchData);
                    /*  echo '<pre>';
                      print_r($getModules);
                      echo '</pre>';
                      exit();*/

                    foreach ($getSections as $keySection => $valueSection) {

                        $l++;
                        if (isset($valueSection->section_title) && $valueSection->section_title != '') {
                            $sectionHeading = $valueModule->variable_module . $valueSection->section_var_name . ": " . htmlentities($valueSection->section_title) . " : " . $valueSection->section_desc;
                        }
                        /*Section Detail(Options & Questons) Start*/
                        if (isset($searchData['idSection']) && $searchData['idSection'] != 0) {
                            $ModuleSearchData['idSection'] = $searchData['idSection'];
                        } else {
                            $ModuleSearchData['idSection'] = $valueSection->idSection;
                        }
                        $myresult = array();
                        $getSectionDetails = $MSection->getSectionDetailsData($ModuleSearchData);

                        foreach ($getSectionDetails as $key => $value) {
                            /*if (isset($value->idParentQuestion) && $value->idParentQuestion != '' && array_key_exists($value->idParentQuestion, $myresult)) {
                                $mykey = $value->idParentQuestion;
                                $myresult[$mykey]->myrow_options[] = $value;
                            } else {
                                $mykey = $value->variable_name;
                                $myresult[$mykey] = $value;
                            }*/
                            if (isset($value->idParentQuestion) && $value->idParentQuestion != '') {
                                $mykey = $value->idParentQuestion;

                                $expKey = explode(',', $mykey);
                                if (isset($expKey) && count($expKey) != 0) {
                                    if (isset($expKey[1]) && count($expKey[1]) != 0) {
                                        $myresult[$expKey[0]]->myrow_options[$expKey[1]]->otherOptions[$value->variable_name] = $value;
                                    } else {
                                        $myresult[$expKey[0]]->myrow_options[$value->variable_name] = $value;
                                    }
                                } else {
                                    $myresult[$mykey]->myrow_options[$value->variable_name] = $value;
                                }

                            } else {
                                $mykey = $value->variable_name;
                                $myresult[$mykey] = $value;
                            }
                        }

                        /*echo '<pre>';
                        print_r($myresult);
                        echo '</pre>';
                        exit();*/
                        /*Make a array as $myresult, and put all the section details in it*/
                        $optionsubhtml = '<style>table tr {font-size: 13px}table tr th {font-size: 14px; font-weight: bold}
.fright{float: right}
</style>';
                        if ($l == 1) {
                            $optionsubhtml .= $subhtml;
                        }
//                        $optionsubhtml .= '<table border="1" cellpadding="2" cellspacing="1" nobr="true"  >
                        $optionsubhtml .= '<table border="1" cellpadding="2" cellspacing="1"    >
                                       <tr  align="center">
                                                 <th colspan="4" >' . $sectionHeading . '</th>
                                            </tr>
                                            <tr  align="center">
                                                <th  width="7%">Variable</th>
                                                <th width="50%">Label</th> 
                                                <th width="36%">Options</th>
                                                <th width="7%">Other</th>
                                            </tr>';
                        foreach ($myresult as $keySectionDetail => $valueSectionDetail) {
                            if (isset($valueSectionDetail->variable_name) && $valueSectionDetail->variable_name != '') {
                                if ($displaylanguagel1 == 'on') {
                                    $l1sec = $valueSectionDetail->label_l1;
                                }
                                if (isset($valueSectionDetail->label_l2) && $valueSectionDetail->label_l2 != '' &&
                                    $displaylanguagel2 == 'on') {
                                    $l2sec = '<br>' . $valueSectionDetail->label_l2;
                                }
                                if (isset($valueSectionDetail->label_l3) && $valueSectionDetail->label_l3 != '' &&
                                    $displaylanguagel3 == 'on') {
                                    $l3sec = '<br>' . $valueSectionDetail->label_l3;
                                }
                                if (isset($valueSectionDetail->label_l4) && $valueSectionDetail->label_l4 != '' &&
                                    $displaylanguagel4 == 'on') {
                                    $l4sec = '<br>' . $valueSectionDetail->label_l4;
                                }
                                if (isset($valueSectionDetail->label_l5) && $valueSectionDetail->label_l5 != '' &&
                                    $displaylanguagel5 == 'on') {
                                    $l5sec = '<br>' . $valueSectionDetail->label_l5;
                                }
                                $optionsubhtml .= '<tr >
                                       <td  width="7%"  align="center"><strong>' . $valueSectionDetail->variable_name . '</strong><br>
                                       <small>' . $valueSectionDetail->nature . '</small></td>
                                       <td width="50%">   
                                            ' . $l1sec . '
                                             ' . $l2sec . ' 
                                             ' . $l3sec . ' 
                                             ' . $l4sec . '
                                             ' . $l5sec . '  
                                        </td>';
                                $optsubhtml = '<td width="36%">';

                                if (isset($valueSectionDetail->myrow_options) && $valueSectionDetail->myrow_options != '') {
                                    $optsubhtml .= '<table    cellpadding="2" cellspacing="0"  >';
                                    foreach ($valueSectionDetail->myrow_options as $okey => $oval) {
                                        if ($displaylanguagel1 == 'on') {
                                            $ol1sec = $oval->label_l1;
                                        }
                                        if (isset($oval->label_l2) && $oval->label_l2 != '' &&
                                            $displaylanguagel2 == 'on') {
                                            $ol2sec = '<br>' . $oval->label_l2;
                                        }
                                        if (isset($oval->label_l3) && $oval->label_l3 != '' &&
                                            $displaylanguagel3 == 'on') {
                                            $ol3sec = '<br>' . $oval->label_l3;
                                        }
                                        if (isset($oval->label_l4) && $oval->label_l4 != '' &&
                                            $displaylanguagel4 == 'on') {
                                            $ol4sec = '<br>' . $oval->label_l4;
                                        }
                                        if (isset($oval->label_l5) && $oval->label_l5 != '' &&
                                            $displaylanguagel5 == 'on') {
                                            $ol5sec = '<br>' . $oval->label_l5;
                                        }
                                        $optsubhtml .= '<tr>';
                                        $optsubhtml .= "<td width=\"70%\" ><br><span><span><small><strong>" . $oval->variable_name . ": </strong></small> " . $ol1sec . " 
                                             " . $ol2sec . " 
                                             " . $ol3sec . " 
                                             " . $ol4sec . "
                                             " . $ol5sec . "  </span> </span>
                                             </td>";
                                        $optsubhtml .= '<td width="15%">' . $oval->option_value . '</td>';

                                        $optsubhtml .= '<td width="15%">' . (isset($oval->skipQuestion) && $oval->skipQuestion ?
                                                '<small>Skip:' . $oval->skipQuestion . ' </small>' : '') . '</td>';

                                        /*$optsubhtml .= "<br><span><span><small>" . $oval->variable_name . ": </small> " . $ol1sec . "
                                             " . $ol2sec . " 
                                             " . $ol3sec . " 
                                             " . $ol4sec . "
                                             " . $ol5sec . "  </span>
                                             <span   class='fright'  align=\"left\">---------------" . $oval->option_value . "</span></span>";*/


                                        $optsubhtml .= '</tr>';

                                        if (isset($oval->otherOptions) && $oval->otherOptions != '') {
                                            $optsubhtml .= '<tr><td colspan="3"><ul>';
                                            foreach ($oval->otherOptions as $ok => $ov) {
                                                $optsubhtml .= '<li><small><strong>' . $ov->variable_name . '</strong></small> -- ' . $ov->label_l1 . ' -- ' . $ov->option_value . '</li>';
                                            }
                                            $optsubhtml .= '</ul></td></tr>';
                                        }

                                    }
                                    $optsubhtml .= '</table>';
                                }
                                $optsubhtml .= '</td>';
                                $optionsubhtml .= $optsubhtml;
                                /*<small>Type: </small>' . $valueSectionDetail->nature;*/
                                $optionsubhtml .= '<td width="7%"  align="center" > ';

                                /*$optionsubhtml .= '<td width="12%"  align="center" >';*/
                                if (isset($valueSectionDetail->skipQuestion) && $valueSectionDetail->skipQuestion != '') {
                                    $optionsubhtml .= '<small> Skip: </small><strong>' . $valueSectionDetail->skipQuestion . '</strong>';
                                }
                                if (isset($valueSectionDetail->MinVal) && $valueSectionDetail->MinVal != '') {
                                    $optionsubhtml .= '<small> Min: </small>' . $valueSectionDetail->MinVal;
                                }
                                if (isset($valueSectionDetail->MaxVal) && $valueSectionDetail->MaxVal != '') {
                                    $optionsubhtml .= '<small>, Max: </small>' . $valueSectionDetail->MaxVal;
                                }

                                $optionsubhtml .= '</td>
                                    </tr> ';
                            }
                        }
                        $optionsubhtml .= "</table>";
                        /*Section Detail(Options & Questons) End*/
//                        $fontname = $pdf->addTTFfont('/Jameel_Noori_Nastaleeq.ttf', 'TrueTypeUnicode', '', 32);
//                        $pdf->SetFont('jameel_noori_nastaleeq', '', 20, '', 'false');
                        $pdf->AddPage();
                        $pdf->writeHTML($optionsubhtml, true, false, false, false, '');


                    }


//                    $pdf->writeHTML($style . $subhtml, true, false, true, false, 'LEFT');

                }


            }
            $bMargin = $pdf->getBreakMargin();
            $auto_page_break = $pdf->getAutoPageBreak();
            $pdf->SetAutoPageBreak(true, 0);
            $pdf->SetAutoPageBreak($auto_page_break, $bMargin);
            $pdf->setPageMark();
            ob_end_clean();
            $pdf->Output('dictionary.pdf', 'I');


        } else {
            echo 'Invalid Project, Please select project';
        }
    }

} ?>