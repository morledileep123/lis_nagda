 <table class="table table-striped table-bordered mytable">
   <thead>
      <tr>
        <th>#</th>
        <th>Student Name</th>
        <th>Class</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
    <?php $count = 1; ?>
    @foreach($reportCardMasts as $reportCardMast)
     <tr>
        <td>{{$count++}}</td>
        <td>{{$reportCardMast->student_info->f_name}} &nbsp; {{$reportCardMast->student_info->l_name}}</td>
        <td>{{$reportCardMast->student_info->student_class->class_name}}</td>
        <td>
          <a href="{{route('student-report-card.edit',$reportCardMast->id)}}" class="mr-2" target="_blank"><i class=" fa fa-pencil text-success" style="font-size: 16px;"></i></a>
          <a href="{{route('student-report-card.show',$reportCardMast->id)}}"  target="_blank"><i class=" fa fa-eye text-primary" style="font-size: 16px;"></i></a>
          <a href="{{ URL::to('/employee/pdf',$reportCardMast->id) }}"  target="_blank"><i class=" fa fa-print text-info" style="font-size: 16px;"></i></a>
        </td>
     </tr>
       @endforeach
    </tbody>
</table> 