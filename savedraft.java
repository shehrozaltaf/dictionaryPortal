JSONObject f1 = new JSONObject(); 
f1.put("AX11", bi.AX11.getText().toString());
f1.put("AX12", bi.AX12.getText().toString());
f1.put("AX13", bi.AX13.getText().toString());
f1.put("AX14", 
bi.AX14A.isChecked() ?"1" : 
bi.AX14B.isChecked() ?"2" : 
bi.AX14C.isChecked() ?"3" : 
bi.AX14D.isChecked() ?"4" : 
 "0"); 
f1.put("AX15", bi.AX15.getText().toString());
f1.put("AX16", 
bi.AX16A.isChecked() ?"1" : 
bi.AX16B.isChecked() ?"2" : 
bi.AX16C.isChecked() ?"3" : 
 "0"); 
f1.put("AX16B", bi.AX16B.getText().toString());
f1.put("AX16C", bi.AX16C.getText().toString());
