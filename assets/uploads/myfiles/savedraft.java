JSONObject json = new JSONObject(); 
json.put("bf01", bi.bf01.getText().toString());

json.put("bf02", bi.bf02.getText().toString());

json.put("bf3y", bi.bf3y.getText().toString());

json.put("bf03m", bi.bf03m.getText().toString());

json.put("bf3d", bi.bf3d.getText().toString());

json.put("bf03a01", bi.bf03a01.getText().toString());

json.put("bf03a02", bi.bf03a02.getText().toString());

json.put("bf04", bi.bf0401.isChecked() ? "1" 
 : bi.bf0402.isChecked() ? "2" 
 : bi.bf0498.isChecked() ? "98" 
 :  "-1"); 

json.put("bf05", bi.bf0501.isChecked() ? "1" 
 : bi.bf0502.isChecked() ? "1" 
 : bi.bf0503.isChecked() ? "3" 
 :  "-1"); 

json.put("bf0502x", bi.bf0502x.getText().toString());
json.put("bf0503x", bi.bf0503x.getText().toString());
json.put("bf06", bi.bf0601.isChecked() ? "1" 
 : bi.bf0602.isChecked() ? "2" 
 : bi.bf0698.isChecked() ? "98" 
 :  "-1"); 

json.put("bf07", bi.bf0701.isChecked() ? "1" 
 : bi.bf0702.isChecked() ? "2" 
 : bi.bf0703.isChecked() ? "3" 
 : bi.bf0796.isChecked() ? "96" 
 :  "-1"); 

json.put("bf0796x", bi.bf0796x.getText().toString());
json.put("bf08", bi.bf0801.isChecked() ? "1" 
 : bi.bf0802.isChecked() ? "2" 
 : bi.bf0898.isChecked() ? "98" 
 :  "-1"); 

json.put("bf09", bi.bf0901.isChecked() ? "1" 
 : bi.bf0902.isChecked() ? "2" 
 : bi.bf0903.isChecked() ? "3" 
 : bi.bf0904.isChecked() ? "4" 
 : bi.bf0905.isChecked() ? "5" 
 : bi.bf0906.isChecked() ? "6" 
 : bi.bf0907.isChecked() ? "7" 
 : bi.bf0908.isChecked() ? "8" 
 : bi.bf0909.isChecked() ? "9" 
 : bi.bf0910.isChecked() ? "10" 
 : bi.bf0999.isChecked() ? "99" 
 : bi.bf0996.isChecked() ? "96" 
 :  "-1"); 

json.put("bf0996x", bi.bf0996x.getText().toString());
json.put("bf10", bi.bf1001.isChecked() ? "1" 
 : bi.bf1002.isChecked() ? "2" 
 : bi.bf1096.isChecked() ? "96" 
 :  "-1"); 

json.put("bf11", bi.bf1101.isChecked() ? "1" 
 : bi.bf1102.isChecked() ? "2" 
 : bi.bf1198.isChecked() ? "98" 
 :  "-1"); 

json.put("bf12", bi.bf1201.isChecked() ? "1" 
 : bi.bf1202.isChecked() ? "2" 
 : bi.bf1298.isChecked() ? "98" 
 :  "-1"); 

json.put("bf13", bi.bf1301.isChecked() ? "1" 
 : bi.bf1302.isChecked() ? "2" 
 : bi.bf1398.isChecked() ? "98" 
 :  "-1"); 

json.put("bf14a", bi.bf14a01.isChecked() ? "1" 
 : bi.bf14a02.isChecked() ? "2" 
 : bi.bf14a98.isChecked() ? "98" 
 :  "-1"); 

json.put("bf14b", bi.bf14b01.isChecked() ? "1" 
 : bi.bf14b02.isChecked() ? "2" 
 : bi.bf14b98.isChecked() ? "98" 
 :  "-1"); 

json.put("bf14b01x", bi.bf14b01x.getText().toString());
json.put("bf14c", bi.bf14c01.isChecked() ? "1" 
 : bi.bf14c02.isChecked() ? "2" 
 : bi.bf14c98.isChecked() ? "98" 
 :  "-1"); 

json.put("bf14c01x", bi.bf14c01x.getText().toString());
json.put("bf14d", bi.bf14d01.isChecked() ? "1" 
 : bi.bf14d02.isChecked() ? "2" 
 : bi.bf14d98.isChecked() ? "98" 
 :  "-1"); 

json.put("bf14e", bi.bf14e01.isChecked() ? "1" 
 : bi.bf14e02.isChecked() ? "2" 
 : bi.bf14e98.isChecked() ? "98" 
 :  "-1"); 

json.put("bf14e01x", bi.bf14e01x.getText().toString());
json.put("bf14f", bi.bf14f01.isChecked() ? "1" 
 : bi.bf14f02.isChecked() ? "2" 
 : bi.bf14f98.isChecked() ? "98" 
 :  "-1"); 

json.put("bf14f01x", bi.bf14f01x.getText().toString());
json.put("bf14g", bi.bf14g01.isChecked() ? "1" 
 : bi.bf14g02.isChecked() ? "2" 
 : bi.bf14g98.isChecked() ? "98" 
 :  "-1"); 

json.put("bf14h", bi.bf14h01.isChecked() ? "1" 
 : bi.bf14h02.isChecked() ? "2" 
 : bi.bf14h98.isChecked() ? "98" 
 :  "-1"); 

json.put("bf14i", bi.bf14i01.isChecked() ? "1" 
 : bi.bf14i02.isChecked() ? "2" 
 : bi.bf14i98.isChecked() ? "98" 
 :  "-1"); 

json.put("bf15a", bi.bf15a01.isChecked() ? "1" 
 : bi.bf15a02.isChecked() ? "2" 
 : bi.bf15a98.isChecked() ? "98" 
 :  "-1"); 

json.put("bf15b", bi.bf15b01.isChecked() ? "1" 
 : bi.bf15b02.isChecked() ? "2" 
 : bi.bf15b98.isChecked() ? "98" 
 :  "-1"); 

json.put("bf15c", bi.bf15c01.isChecked() ? "1" 
 : bi.bf15c02.isChecked() ? "2" 
 : bi.bf15c98.isChecked() ? "98" 
 :  "-1"); 

json.put("bf15d", bi.bf15d01.isChecked() ? "1" 
 : bi.bf15d02.isChecked() ? "2" 
 : bi.bf15d98.isChecked() ? "98" 
 :  "-1"); 

json.put("bf15e", bi.bf15e01.isChecked() ? "1" 
 : bi.bf15e02.isChecked() ? "2" 
 : bi.bf15e98.isChecked() ? "98" 
 :  "-1"); 

json.put("bf15f", bi.bf15f01.isChecked() ? "1" 
 : bi.bf15f02.isChecked() ? "2" 
 : bi.bf15f98.isChecked() ? "98" 
 :  "-1"); 

json.put("bf15g", bi.bf15g01.isChecked() ? "1" 
 : bi.bf15g02.isChecked() ? "2" 
 : bi.bf15g98.isChecked() ? "98" 
 :  "-1"); 

json.put("bf15h", bi.bf15h01.isChecked() ? "1" 
 : bi.bf15h02.isChecked() ? "2" 
 : bi.bf15h98.isChecked() ? "98" 
 :  "-1"); 

json.put("bf15i", bi.bf15i01.isChecked() ? "1" 
 : bi.bf15i02.isChecked() ? "2" 
 : bi.bf15i98.isChecked() ? "98" 
 :  "-1"); 

json.put("bf15j", bi.bf15j01.isChecked() ? "1" 
 : bi.bf15j02.isChecked() ? "2" 
 : bi.bf15j98.isChecked() ? "98" 
 :  "-1"); 

json.put("bf15k", bi.bf15k01.isChecked() ? "1" 
 : bi.bf15k02.isChecked() ? "2" 
 : bi.bf15k98.isChecked() ? "98" 
 :  "-1"); 

json.put("bf15l", bi.bf15l01.isChecked() ? "1" 
 : bi.bf15l02.isChecked() ? "2" 
 : bi.bf15l98.isChecked() ? "98" 
 :  "-1"); 

json.put("bf15m", bi.bf15m01.isChecked() ? "1" 
 : bi.bf15m02.isChecked() ? "2" 
 : bi.bf15m98.isChecked() ? "98" 
 :  "-1"); 

json.put("bf15n", bi.bf15n01.isChecked() ? "1" 
 : bi.bf15n02.isChecked() ? "2" 
 : bi.bf15n98.isChecked() ? "98" 
 :  "-1"); 

json.put("bf15o", bi.bf15o01.isChecked() ? "1" 
 : bi.bf15o02.isChecked() ? "2" 
 : bi.bf15o98.isChecked() ? "98" 
 :  "-1"); 

json.put("bf15p", bi.bf15p01.isChecked() ? "1" 
 : bi.bf15p02.isChecked() ? "2" 
 : bi.bf15p98.isChecked() ? "98" 
 :  "-1"); 

json.put("bf15q", bi.bf15q01.isChecked() ? "1" 
 : bi.bf15q02.isChecked() ? "2" 
 : bi.bf15q98.isChecked() ? "98" 
 :  "-1"); 

json.put("bf16", bi.bf1601.isChecked() ? "1" 
 : bi.bf1602.isChecked() ? "2" 
 : bi.bf1698.isChecked() ? "98" 
 :  "-1"); 

json.put("bf17", bi.bf1701.isChecked() ? "" 
 : bi.bf1798.isChecked() ? "98" 
 :  "-1"); 

json.put("bf1701x", bi.bf1701x.getText().toString());
json.put("bf18", bi.bf1801.isChecked() ? "1" 
 : bi.bf1802.isChecked() ? "2" 
 : bi.bf1898.isChecked() ? "98" 
 :  "-1"); 

json.put("bf19", bi.bf1901.isChecked() ? "1" 
 : bi.bf1902.isChecked() ? "2" 
 : bi.bf1903.isChecked() ? "3" 
 : bi.bf1996.isChecked() ? "96" 
 :  "-1"); 

json.put("bf1996x", bi.bf1996x.getText().toString());
json.put("bf20", bi.bf2001.isChecked() ? "1" 
 : bi.bf2002.isChecked() ? "2" 
 : bi.bf2098.isChecked() ? "98" 
 :  "-1"); 

