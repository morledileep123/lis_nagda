 <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<input type="button" value="Priint" onclick="printDiv()" class="btn btn-success"> 

<div class="container" id="printable" style="width: 800px; height: 1100px; border: solid;">
     
    <div class="row">               
      <div class="col-md-2" >
         <img src="{{asset($settings->logo !=null ? 'storage/'.$settings->logo : 'storage/admin/student_demo.png')}}" style="width: 128px; height: 112px;" >
       
       </div>
      <div class="col-md-10 " > 
         <h2 style="color: #136d40; margin-left: 55px;"><u>{{$settings->title}}</u></h2><br>
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
          <div class="col-md-12 cert-type" >
            <span>
            <u><strong>{{$showRequest->cert_type }}</strong></u> 
              
            </span>
          </div>
        </div>
      </div>
      <div class="col-md-12" style="margin-left: 50px; ">
        <div class="row ">
          <div class="col-md-6">
            <span style="font-size: 20px;">TC. No:- {{$showRequest->studentInfo->student_batch->batch_name}}/{{$showRequest->cert_req_id }} </span>
      
          </div>
          <div class="col-md-6 ">
            <span style="font-size: 20px; margin-left: 70px;">Admission No:-{{$showRequest->studentInfo->admision_no  }} </span>
          </div>
        </div>
      </div>

      <div class="row " style="margin-left: 70px; ">
        <div class="col-md-12 " style="font-size: 20px; margin-top: 50px;">
           1. Name of Pupil:- <strong>{{$showRequest->studentInfo->f_name  }} {{$showRequest->studentInfo->l_name  }}</strong><br>
           2. Father`s Name/Guardians` Name:- <strong>
            @foreach($showRequest->gaudiantInfo as $gaudiantInfos) 
            {{$gaudiantInfos->relation_id == 1 ? $gaudiantInfos->g_name : ''}}@endforeach</strong><br>
           3. Mother`s Name:- @foreach($showRequest->gaudiantInfo as $gaudiantInfos) 
            {{$gaudiantInfos->relation_id == 2 ? $gaudiantInfos->g_name : ''}}@endforeach</strong><br>
           4. Nationality:- <strong>{{$showRequest->studentInfo->nationality_id  }}</strong><br>
           5. Whether the candidate belongs to schedule tribe:- <strong>No</strong><br>
           6. Date of first admission in the with class:- <strong>{{date('Y-m-d',strtotime($showRequest->studentInfo->created_at )) }} ({{$showRequest->studentInfo->student_class->class_name  }}) </strong><br>
           7. Date of birth(according to admission register):- <strong>({{$showRequest->studentInfo->student_class->class_name  }})  </strong><br>
           8.Class in which the Pupil last studied:- <strong>{{$showRequest->studentInfo->f_name  }} {{$showRequest->studentInfo->l_name  }}</strong><br>
           9. School/board Annual Examination last taken with result:- <strong>{{$settings->school_board}}</strong><br>
           10. Whether faild, if so,once/twice in the same class:- <strong>No</strong><br>
           11.Subjects studied:- <strong>@foreach($subjectName->assign_subjectId as $subjectNames)
              {{$subjectNames->subject->subject_name}},
             @endforeach</strong><br>
           12.Third language in class VIII:- <strong>No</strong><br>
           13.Month up to which the (pupil has paid):- <strong> </strong><br>
           14.Total no. of working days present:- <strong>100 </strong><br>
           15.Wheather NCC cadet/boy scout/Girl Guide(details may be given) conduct:-  <strong> </strong><br>
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
            <span style="margin-left: 100px;"><strong>Pincipale Sign</strong></span>
          </div>
        </div>
    </div>
    <div class="" >
      <span style="margin-bottom: 10px;"><br><br></span>
    </div>
</div>
<style>
  .cert-type{
        margin-left: 190px;
        margin-top: 35px;
        margin-bottom: 35px;
        font-size: 24px;
    }
</style>
 <script> 
    function printDiv() { 
        var divContents = document.getElementById("printable").innerHTML; 
        var a = window.open('', '', 'height=500, width=500'); 
        a.document.write('<html>'); 
        a.document.write('<body > <h1>Div contents are <br>'); 
        a.document.write(divContents); 
        a.document.write('</body></html>'); 
        a.document.close(); 
        a.print(); 
    } 
</script> 