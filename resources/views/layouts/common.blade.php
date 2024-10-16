<script>
	$(document).ready(function(){
		var select_batch_id = '#batch_id';
		var select_section_id = '#section_id';
		var select_medium_id = '#medium_id';

		$('#std_class_id').on('change',function(e){
			e.preventDefault();
			var std_class_id = $(this).val();
			if(std_class_id !=''){
				if(std_class_id == 'all'){
					$('#tableRowData').show();
            		$('#tableData').empty();
				}
				batch_fetch(std_class_id,select_batch_id);
			}
		});


		$('#batch_id').on('change',function(e){
			e.preventDefault();
			var batch_id = $(this).val();
			var std_class_id = $('#std_class_id').val();
			section_fetch(std_class_id,batch_id,select_section_id);
		});

		@if(isset($student))
			var old_class_id = "{{$student->std_class_id ?? old('std_class_id')}}";
			var old_batch_id = "{{$student->batch_id ?? old('batch_id')}}";
			var old_section_id = "{{$student->section_id ?? old('section_id')}}";
			var old_medium = "{{$student->medium ?? old('medium')}}";
		@else
			var old_class_id = "{{old('std_class_id')}}";
			var old_batch_id = "{{old('batch_id')}}";
			var old_section_id = "{{old('section_id')}}";
			var old_medium = "{{old('medium')}}";
		@endif



		if(old_class_id !=''){
			batch_fetch(old_class_id,select_batch_id,old_batch_id);
		}

		if(old_class_id !='' && old_batch_id !=''){
			section_fetch(old_class_id,old_batch_id,select_section_id,old_section_id);
		}
		
		if(old_class_id !='' && old_batch_id !='' && old_section_id !=''){
			medium_fetch(old_class_id,old_batch_id,old_section_id,select_medium_id,old_medium);
		}

		$('#section_id').on('change',function(e){
			e.preventDefault();
			var std_class_id = $('#std_class_id').val();
			var batch_id = $('#batch_id').val();
			var section_id = $(this).val();

			medium_fetch(std_class_id,batch_id,section_id,select_medium_id);
		})

	});
</script>