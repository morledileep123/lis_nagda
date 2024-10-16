
<button class="btn-sm fa fa-print"><a  href="{{ URL::to('student/transfer_certificate',$showRequest->admision_no) }}" style="background: #f4a024;
color: #fff;">Download Certificate</a></button>
<div class="container"  style="width: 800px; height: 1100px; border: solid;">

    <div class="row">               
      <div class="col-md-2" >
         <img src="{{asset($settings->logo !=null ? 'storage/'.$settings->logo : 'storage/admin/student_demo.png')}}" style="width: 128px; height: 112px;" >
       
       </div>
      <div class="col-md-10 " > 
         <h2 style="color: #136d40; margin-left: 55px; font-size: 25px;"><u>{{strtoupper($settings->title)}}</u></h2><br>
         <div>
          <span style="margin-left: 70px;" class="full-left"><strong>Website :</strong> <a href="{{$settings->website}}">{{$settings->website}}</a> | <strong>Email :</strong>{{$settings->email}} |<strong> Phone :</strong> {{$settings->tel1}}</span>
          <hr style="border: solid;">
        </div>
      </div><hr>
    </div>
              
     <div class="col-md-12 mb-4" style="margin-left: 50px;">
        <div class="row mt-3">
          <div class="col-md-6">
            <span style="font-size: 20px;">CBSE AFF. No.{{$settings->cbse_aff_no }}</span> 
          </div>
          <div class="col-md-6">
            <span style="font-size: 20px; margin-left: 70px;">School Code:-.{{$settings->school_code  }} </span>
          </div>
          <div class="col-md-12 " >
            <span align="center" style="font-size: 25px; margin-left:175px;"><u><strong> School Leaving  Certificate</strong></u> </span>
            {{-- <u><strong>{{$showRequest->cert_type }}</strong></u>  --}}
        </div>
      </div>
  </div>
      <div class="col-md-12" style="margin-left: 50px; ">
        <div class="row ">
          <div class="col-md-6">
            <span style="font-size: 20px;">TC. No:- {{$showRequest->student_batch->batch_name}}/{{$showRequest->cert_id }} </span>
      
          </div>
          <div class="col-md-6 ">
            <span style="font-size: 20px; margin-left: 70px;">Admission No:-{{$showRequest->admision_no  }} </span>
          </div>
        </div>
      </div>
      <div class="row " style="margin-left: 70px; ">
        <div class="col-md-12 " style="font-size: 20px; margin-top: 50px;">
           1.&nbsp;&nbsp;Name of Pupil:- <strong>{{$showRequest->f_name  }} {{$showRequest->l_name  }}</strong><br>

           2.&nbsp;&nbsp;{{isset($showRequest) ? student_first_guardian($showRequest)['relation'] : ''}} <strong>{{isset($showRequest) ? student_first_guardian($showRequest)['name'] : ''}} </strong><br>
             {{--@foreach($showRequest->studentsGuardiantMast as $studentsGuardiantMasts) 
            {{$studentsGuardiantMasts->relation_id == 1 ? $studentsGuardiantMasts->g_name : ''}}@endforeach</strong><br> --}}
            {{-- {{dd($studentsGuardiantMasts)}} --}}
           3.&nbsp;&nbsp;{{isset($showRequest) ? student_first_guardian($showRequest)['relation1'] : ''}} <strong>{{isset($showRequest) ? student_first_guardian($showRequest)['name1'] : ''}} </strong>{{-- @foreach($showRequest->studentsGuardiantMast as $studentsGuardiantMasts) 
            {{$studentsGuardiantMasts->relation_id == 2 ? $studentsGuardiantMasts->g_name : ''}}@endforeach --}}</strong><br>
           4.&nbsp;&nbsp;Nationality:- <strong>{{$showRequest->acadmic_country}}n</strong><br>
           5.&nbsp;&nbsp;Whether the candidate belongs to schedule tribe:- <strong>No</strong><br>
           6.&nbsp;&nbsp;Date of first admission in the with class:- <strong>{{date('Y-m-d',strtotime($showRequest->created_at )) }} ({{$showRequest->student_class->class_name  }}) </strong><br>
           7.&nbsp;&nbsp;Date of birth(according to admission register):- <strong>{{$showRequest->dob  }}  </strong><br>
           8.&nbsp;&nbsp;Class in which the Pupil last studied:- <strong>{{$showRequest->f_name  }} {{$showRequest->l_name  }}</strong><br>
           9.&nbsp;&nbsp;School/board Annual Examination last taken with result:- <strong>{{$settings->school_board}}</strong><br>
           10.Whether faild, if so,once/twice in the same class:- <strong>No</strong><br>
           11.Subjects studied:- <strong>@if(!empty($subjectName))@foreach($subjectName->assign_subjectId as $subjectNames)
              {{$subjectNames->subject->subject_name}},
             @endforeach @else {{' '}} @endif</strong><br>
           12.Third language in class VIII:- <strong>No</strong><br>
           13.Month up to which the (pupil has paid):- <strong> </strong><br>
           14.Total no. of working days present:- <strong>100 </strong><br>
           15.Wheather NCC cadet/boy scout/Girl Guide(details may be given) conduct:-  <br>
           16.Genral conduct: <strong> {{$showRequest->general_conduct}}</strong><br>
           17.Date of application for certificate:- <strong> {{$showRequest->apply_date}}</strong></strong><br>
           18.Date of issue of certificate:- {{$showRequest->issue_date}}<br>
           19.Reason for leaving the school:- <strong>{{$showRequest->reason  }} </strong><br>
        </div>
    </div>
      
    <div class="row">
      <div class="col-md-12" style="margin-left: 60px; margin-top: 50px;">
          <div class="col-md-6" >
            <span><strong>Prepared by:</strong></span>
            <br><br>
            <span>Checked and verified by:-</span><br>
            <span>(<a href="https://cbse.nic.in">cbse.nic.in</a>/source from where verified)</span>
          </div>
          <div class="col-md-6">
            <span style="margin-left: 100px;"><strong>Principale Sign</strong></span>
          </div>
        </div>
    </div>
    <div class="" >
      <span style="margin-bottom: 10px;"><br><br></span>
    </div>
</div>
