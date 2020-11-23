JSONObject json = new JSONObject(); 
json.put("wf101", bi.wf10101.isChecked() ? "1" 
 : bi.wf10102.isChecked() ? "2" 
 :  "-1"); 

json.put("wf10102x", bi.wf10102x.getText().toString());
json.put("wfi02", bi.wfi02.getText().toString());

