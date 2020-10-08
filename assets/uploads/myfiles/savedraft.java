JSONObject json = new JSONObject(); 
json.put("mmd1", bi.mmd1.getText().toString());

json.put("mmd2", bi.mmd2.getText().toString());

json.put("mmd3", bi.mmd301.isChecked() ? "1" 
 : bi.mmd302.isChecked() ? "2" 
 : bi.mmd303.isChecked() ? "3" 
 : bi.mmd304.isChecked() ? "4" 
 : bi.mmd305.isChecked() ? "5" 
 : bi.mmd306.isChecked() ? "6" 
 : bi.mmd307.isChecked() ? "7" 
 : bi.mmd308.isChecked() ? "8" 
 : bi.mmd309.isChecked() ? "9" 
 : bi.mmd310.isChecked() ? "10" 
 : bi.mmd311.isChecked() ? "11" 
 : bi.mmd312.isChecked() ? "12" 
 : bi.mmd313.isChecked() ? "13" 
 : bi.mmd314.isChecked() ? "14" 
 : bi.mmd315.isChecked() ? "96" 
 :  "-1"); 

json.put("mmd315x", bi.mmd315x.getText().toString());
json.put("mmd4", bi.mmd401.isChecked() ? "1" 
 : bi.mmd402.isChecked() ? "2" 
 : bi.mmd403.isChecked() ? "3" 
 :  "-1"); 

json.put("mmd5", bi.mmd5.getText().toString());

json.put("mmd5a", bi.mmd5a.getText().toString());
json.put("mmd6", bi.mmd6.getText().toString());

json.put("mmd6a", bi.mmd6a.getText().toString());
json.put("mmd701", bi.mmd701.getText().toString());

json.put("mmd702", bi.mmd702.getText().toString());

json.put("mmd703", bi.mmd703.getText().toString());

json.put("mmd0801", bi.mmd0801.getText().toString());

json.put("mmd0802", bi.mmd0802.getText().toString());

json.put("mmd16", bi.mmd1601.isChecked() ? "1" 
 : bi.mmd1602.isChecked() ? "2" 
 :  "-1"); 

