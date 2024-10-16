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
      <div class="col-md-10 " class="address" > 
         <h3 style="color: black; margin-left: 55px;font-weight: bold;" ><u>{{strtoupper($settings->title)}}</u></h3><br>
         <div>
          <span style="margin-left: 70px; background-color: #136d40; color: #fff;" class="full-left" ><strong>{{$settings->address}}|<strong> Phone :</strong>+91 {{$settings->tel1}}</span>
          <hr style="border: solid; ">
        </div>
      </div>
    </div>
    <div class="col-md-12">
      <div class="row">
        <span>Student's Name {{$student->f_name  }} {{$student->l_name  }}</span><br>
        <span>Gender <u>{{$student->f_name  }} {{$student->l_name  }}</u></span>    
        <span>Registration for class <u>{{$student->f_name  }} {{$student->l_name  }}</u></span><br>
        <span>DOB <u>{{$student->f_name  }} {{$student->l_name  }}</u></span>    
        <span>Place of Birth <u>{{$student->f_name  }} {{$student->l_name  }}</u></span>  
        <span>Nationality <u>{{$student->f_name  }} {{$student->l_name  }}</u></span><br>
        <span>Mother Tongue <u>{{$student->f_name  }} {{$student->l_name  }}</u></span><br>
        <span>Other Languagees Known <u>{{$student->f_name  }} {{$student->l_name  }}</u></span><br>
        <span>Cast <u>{{$student->f_name  }} {{$student->l_name  }}</u></span>
        <span>Category <u>{{$student->f_name  }} {{$student->l_name  }}</u></span><br>
        <span>Fother <u>{{$student->f_name  }} {{$student->l_name  }}</u></span><br>
        <span>Mother <u>{{$student->f_name  }} {{$student->l_name  }}</u></span><br>
        <span>Address <u>{{$student->f_name  }} {{$student->l_name  }}</u></span><br>
        <span>Mobile Father <u>{{$student->f_name  }} {{$student->l_name  }}</u></span>
        <span>Mobile Mother <u>{{$student->f_name  }} {{$student->l_name  }}</u></span>
        <span>Phone (R) <u>{{$student->f_name  }} {{$student->l_name  }}</u></span><br>
        <span>Email Id(Father) <u>{{$student->f_name  }} {{$student->l_name  }}</u></span>
        <span>Email Id (Mother) <u>{{$student->f_name  }} {{$student->l_name  }}</u></span><br>
        <span>Occupation (Mother) <u>{{$student->f_name  }} {{$student->l_name  }}</u></span>
        <span>Occupation (Mother) <u>{{$student->f_name  }} {{$student->l_name  }}</u></span><br>
        <span>Total Family Income(RS.) <u>{{$student->f_name  }} {{$student->l_name  }}</u></span><br>
      </div>

        <div class="siblings">
          <span>Other Siblings staying with the student</span>
          <table>
            <tr>
              <td>Name</td>
              <td>Relationship</td>
              <td>Age</td>
              <td>Present(School/College)</td>
            </tr>
            <tr>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
            </tr>
          </table>
        </div>
        <div class="contact_persion">
          <h2>Contact Person</h2><br>
          <span>(In case of emergency)</span><br>
          <span>Name <u>{{$student->f_name  }} {{$student->l_name  }}</u></span>
          <span>Relation with Student <u>{{$student->f_name  }} {{$student->l_name  }}</u></span><br>
          <span>Address <u>{{$student->f_name  }} {{$student->l_name  }}</u></span><br>
          <span>Mobile <u>{{$student->f_name  }} {{$student->l_name  }}</u></span>
          <span>Phone <u>{{$student->f_name  }} {{$student->l_name  }}</u></span><br>
          <span>Doctor's Name (if any) <u>{{$student->f_name  }} {{$student->l_name  }}</u></span><br>
          <span>Client address /phone No <u>{{$student->f_name  }} {{$student->l_name  }}</u></span><br>

        </div>
        <div class="previce_school">
          <p>Name and address of previous School / Pay home attended</p>
          <table>
            <tr>
              <td>Insitution</td>
              <td>Year of Completion</td>
              <td>Standard</td>
            </tr>
            <tr>
              <td></td>
              <td></td>
              <td></td>
            </tr>
          </table>
        </div>
        <div>
            <p>Reason for withdrawal from the present school______________  </p>
            <p> All the information given above are the true to the  best of my knowledge. We affirm that my child is physically and mentalally fit. We agree to abide by the rules and regulations of the school.</p>
        </div>
          <div class="date">
            <span>Date:-</span>
          </div> 
          <div class="signatur">
            <span style="float: right;">Signature of the Parent / Guardian</span>
          </div>
          <hr /> 

          <div class="office_use">
              <h2> ( For Office Use Only )</h2>
              <div class="content">
                <span>Admitted to Standard</span>
                <span>Scholar No.</span><br>
                <span>Form No.</span>
                <span>Admission No.</span><br>
                <span>Caution Money R.No.</span><br>
              </div>
          </div>

          <hr />
            <div class="date">
              <span>Date:-</span>
            </div> 
            <div class="signatur">
              <span style="float: right;">Principal / Authoried Signator</span>
            </div>
            <hr /> 
    </div>

    <div class="row">
      <div class="col-md-12" >
          <div class="col-md-6" >
            <h2><strong>Address</strong></h2>
            <br><br>
            <span>City Office-</span><br>
            <span>Lakshya International School Adjacent to Petrol Pump, Opp. Nagar Palika, Nagda Bus Standa,Nagda (M.P.)</span><br>
            <span>Khachrod-Jaora road junction, Nagda (MP) 456335, Nagda, Madhya Pradesh 456335</span><br>
            <h3>Email</h3>
            <span>Email</span>
            <h3>Phone</h3>
            <span>078798 22888</span>
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