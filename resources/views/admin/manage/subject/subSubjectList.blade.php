
@foreach($subsubjects as $subsubject)
	<option value="{{$subsubject->id}}" {{old('parent_id') == $subsubject->id ? 'selected' : ''}} >
		@php 
        	// if(count($subcategory->subcategory) ==0){
            	$i =1;

            	while ($i <= $dataSpace) {
            		 echo "&nbsp;"." " ; 
            		 $i++;
            	}
            	echo "-";
        	// }
        @endphp	
		{{$subsubject->subject_name}}</option>
	@if(count($subsubject->subsubjects))
		@include('admin.manage.subject.subSubjectList',['subsubjects' => $subsubject->subsubjects,'dataSpace' =>$dataSpace + 1 ])
	@endif										
@endforeach

