function batch_fetch(std_class_id,select_id,old_batch_id = null){
	$.ajax({
		type:'get',
		url:'/batch-fetch/'+std_class_id,							
		success:function(res){


			if(res.length != '0'){
				$(select_id).empty().html('<option value="">Select Batch Name</option>')
				$.each(res,function(i,v){					
					$(select_id).append('<option value="'+v.batch_name.id+'" '+(v.batch_name.id == old_batch_id ? 'selected' : '')+'>'+v.batch_name.batch_name+'</option>');	
				});
			}else{
				$(select_id).empty();
				$('#section_id').empty();
			}
			
		}
	});
}
function section_fetch(std_class_id,batch_id,select_id,old_section_id= null){
	$.ajax({
		type:'get',
		url:'/section-fetch/'+std_class_id+'/'+batch_id,							
		success:function(res){
			if(res.length != '0'){
				$(select_id).empty().html('<option value="">Select Section Name</option>')
				$.each(res,function(i,v){					
					$(select_id).append('<option value="'+v.section_names.id+'" '+(v.section_names.id == old_section_id ? 'selected' : '')+'>'+v.section_names.section_name+'</option>');	
				});
			}else{
				$(select_id).empty();
			}
			
		}
	});
}

function medium_fetch(std_class_id,batch_id,section_id,select_id,old_medium_id= null){
	$.ajax({
		type:'get',
		url:'/medium-fetch/'+std_class_id+'/'+batch_id+'/'+section_id,							
		success:function(res){
			console.log(res)
			if(res.length != '0'){
				$(select_id).empty().html('<option value="">Select Medium </option>')
				$.each(res,function(i,v){					
					$(select_id).append('<option value="'+v.medium+'" '+(v.medium == old_medium_id ? 'selected' : '')+'>'+(v.medium == 'EM' ? 'English Medium' : 'Hindi Medium')+'</option>');	
				});
			}else{
				$(select_id).empty();
			}
			
		}
	});
}

function isNumberKey(txt, evt) {
  var charCode = (evt.which) ? evt.which : evt.keyCode;
  if (charCode == 46) {
    //Check if the text already contains the . character
    if (txt.value.indexOf('.') === -1) {
      return true;
    } else {
      return false;
    }
  } else {
    if (charCode > 31 &&
      (charCode < 48 || charCode > 57))
      return false;
  }
  return true;
}