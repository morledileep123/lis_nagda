<table class="table table-striped table-bordered mytable">
	<thead>
		<tr>
			<th>#</th>
			<th>Title</th>
			<th>Description</th>
			<th>Publish Start Date</th>
			<th>Publish End Date</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
		@php $count = 1; @endphp
		@foreach($getAllSendData as $getAllSendDatas)
		<tr>
			<td>{{$count++}}</td>
			<td>{{ $getAllSendDatas->circular_title }}</td>
			<td>{{ $getAllSendDatas->circular_description }}</td>
			<td>{{ $getAllSendDatas->date_from_display }}</td>
			<td>{{ $getAllSendDatas->date_to_display }}</td>
			<td class="actions"> 
				<a href="{{route('sent-to-faculty-show', $getAllSendDatas->id)}}" class="mr-2">
				<i class="fa fa-eye text-primary"></i>
				</a>
				<a  href="{{route('sent-to-faculty-edit', $getAllSendDatas->id)}}"  class="mr-2">
				<i class="fa fa-pencil text-success"></i>
				</a>	
			</td>
			
		</tr>
				@endforeach
			</tbody>
		</table> 
		<style >
			.mr{
				margin-right: 10px;
			}
		</style>
	<script >
		$('.mytable').DataTable({
			lengthMenu: [[10, 25, 50, -1], [10, 25, 50, "All"]],
			searching:true,
			scrolling:true,
		});
	</script>