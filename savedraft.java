JSONObject f1 = new JSONObject(); 
f1.put("l101", bi.l101.getText().toString());
f1.put("l102", 
bi.l102a.isChecked() ?"1" : 
bi.l102b.isChecked() ?"2" : 
 "0"); 
f1.put("l103", 
bi.l103a.isChecked() ?"1" : 
bi.l103b.isChecked() ?"2" : 
bi.l103c.isChecked() ?"3" : 
 "0"); 
f1.put("l104", bi.l104.getText().toString());
