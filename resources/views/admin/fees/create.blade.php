@extends('layouts.main')
@section('content')
<style >
   .error{
      font-size: 13px;
   }
   .required{
      font-weight: 700;
      font-size: 14px
   }
</style>
<div class="container">
  <div class="row mb-4">
    <div class="col-md-12">
        @include('admin.fees.header')
    </div>
  </div>
  <div class="row mb-4">
    <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h5 class="card-title">Fees
              <a href="{{route('fees.index')}}" class="pull-right btn btn-sm btn-primary">Back</a>
            </h5>
          </div>
          <div class="card-body">
              <form action="{{route('fees.store')}}" id="fees-form1" method="post" autocomplete="off">
              @csrf
                  <div class="row">       
                     <div class="col-md-3 form-group">
                        <label class="required">Fees Name</label>
                        <input class="form-control" id="fees_name" name="fees_name" type="text" value="{{old('fees_name')}}">
                        @error('fees_name')
                           <span class="text-danger error">
                              <strong>{{$message}}</strong>
                           </span>
                        @enderror
                     </div>
                     <div class="col-md-3 form-group">
                        <label class="required">Fees Amount</label>
                        <div class="input-group mb-0" style="margin-bottom: 0px !important">
                           <div class="input-group-prepend">
                           <span class="input-group-text" id="basic-addon1"><i class="fa fa-rupee"></i></span>
                           </div>
                           <input class="form-control" id="fees_amnt" name="fees_amnt" type="text" readonly="readonly" value="0">
                        </div>
                        @error('fees_amnt')
                           <span class="text-danger error">
                              <strong>{{$message}}</strong>
                           </span>
                        @enderror
                     </div>
                     <div class="col-md-4 form-group">
                        <label class="required">Header To Be Displayed On Reciept</label>
                        <select class="form-control" name="receipt_head_id" id="receipt_head_id">
                           @foreach(RECIEPT_HEADER_NAME as $key => $headerNames)
                              <option value="{{ $key}}">{{ $headerNames}}</option>
                           @endforeach
                        </select>
                     </div>
                     <div class="col-md-2 form-group">
                        <label class="required"> Select Currency </label>
                         <select class="form-control" name="currency_code" id="currency_code">
                           @foreach(CURRENCY as $key => $currency)
                              <option value="{{ $key}}">{{ $currency}}</option>
                           @endforeach
                           </select>
                     </div>
                  </div>  
                  <hr>
                  <div class="row">
                     <div class="mb-2 col-md-12">
                        <h6 class="font-weight-bold">Fees - Head</h6>
                     </div>
                     <div class="col-md-12">
                        <table class="table table-bordered ">
                           <thead>
                              <tr >
                                 <th class="form-group"><input id="checkAll" name="checkAll" type="checkbox"></th>
                                 <th>Head Title</th>
                                 <th>Installable</th>
                                 <th>Amount</th>
                              </tr>
                           </thead>
                           <tbody>
                              @foreach($fee_heads as $fee_head)
                                 <tr>
                                    <td><input type="checkbox" name="fees_head[]" class="checkHead" value="{{$fee_head->fees_head_id}}" data-id="{{$fee_head->is_installable}}">
                                       <input type="checkbox" name="head_amnt[]" class="head_amnt_{{$fee_head->fees_head_id}}" value="" autocomplete="off" style="display: none" >
                                    </td> 
                                    <td>{{$fee_head->head_name}}</td>
                                    <td>{{$fee_head->is_installable =='1' ? 'Yes' :'No'}}</td> 
                                    <td class="form-group"><input type="text" name="" class="form-control head_amnt" id="head_amnt_{{$fee_head->fees_head_id}}" value="{{(int)$fee_head->head_amnt}}" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">                                      
                                    </td>
                                 </tr>
                              @endforeach
                           </tbody>
                        </table>
                        <input type="hidden" name="non_installable_amnt" value="" id="non_installable_amnt">
                        <input type="hidden" name="installable_amnt" value="" id="installable_amnt">
                     </div>
                  </div>
                  <hr>
                  <div class="row">
                     <div class="col-md-3 form-group">
                        <label class="required">Select No of Instalment</label>
                        <select class="form-control" name="no_of_instalment" id="no_of_instalment">
                           @foreach(INSTALMENT_MODE as $key => $instalment_mode)
                              <option value="{{$key}}">{{$instalment_mode}}</option>
                           @endforeach
                        </select>
                     </div>
                     <div class="col-md-3 form-group">
                        <label class="required">Course Selection</label>
                        <select class="form-control" name="courseselection" id="course_selection">
                           @foreach(COURSE_SELECTION as $key => $course_selection)
                              <option value="{{$key}}" {{$key == old('courseselection') ? 'selected' : ''}}>{{$course_selection}}</option>
                           @endforeach
                        </select>
                     </div>
                  </div>
                  <div class="row" >
                     <div class="col-md-4 form-group" id="instal_one"> 
                        <label class="required">Instalment Amount</label>
                        <input type="text" name="instalment_amnt[]" readonly="readonly" class="form-control instalment_amnt" value="0" id="instalment_amnt_1">
                     </div>
                     <div class="col-md-4">
                        <label class="required">Start Date</label>
                        <input type="text" name="start_dt[]" class="form-control datepicker" data-date-format="yyyy-mm-dd" placeholder="Start Date" >
                     </div>
                     <div class="col-md-4">
                        <label class="required">Due Date</label>
                        <input type="text" name="end_dt[]" class="form-control datepicker" data-date-format="yyyy-mm-dd" placeholder="Due Date" >
                     </div>
                  </div>
                  <div class="row" id="instalmentBody">
                     
                  </div>
                  <hr>
                  <div class="row" id="course_selection_single">
                     <div class="col-md-3 form-group">
                        <label class="required">Select Class</label>
                        <select class="form-control" name="std_class_id" autocomplete="off" id="std_class_id"> 
                           <option value="all">-- All --</option>
                           @foreach($classes as $key=>$class)
                              <option value="{{$class->id}}">{{$class->class_name}}</option>
                           @endforeach
                        </select>
                        @error('std_class_id')
                           <span class="text-danger error">
                              <strong>{{$message}}</strong>
                           </span>
                        @enderror
                     </div>
                     <div class="col-md-3 form-group">
                        <label class="required">Select Batch</label>
                        <select class="form-control" name="batch_id" autocomplete="off" id="batch_id">

                        </select>
                        @error('batch_id')
                           <span class="text-danger error">
                              <strong>{{$message}}</strong>
                           </span>
                        @enderror
                     </div>
                     <div class="col-md-3 form-group">
                        <label class="required">Select Section</label>
                        <select class="form-control" name="section_id" autocomplete="off" id="section_id"> 

                        </select>
                        @error('section_id')
                           <span class="text-danger error">
                              <strong>{{$message}}</strong>
                           </span>
                        @enderror
                     </div>
                     <div class="col-md-3 col-xs-6 col-sm-6 form-group">
                        <label class="required">Select Medium</label>
                        <select class="form-control" name="medium" id="medium_id" autocomplete="off">
                           
                        </select>
                        @error('medium')
                           <span class="text-danger error">
                              <strong>{{$message}}</strong>
                           </span>
                        @enderror
                     </div>                        
                     <div class="col-md-3 form-group">
                        <label class="required">Select Fee For</label>
                        <select class="form-control" name="feesfor" id="feesfor">
                           <option value="0">Select</option>
                           <option value="1">All Student</option>
                           <option value="2">Some Selected</option>
                        </select>
                        @error('feesfor')
                           <span class="text-danger error">
                              <strong>{{$message}}</strong>
                           </span>
                        @enderror
                     </div>                     
                  </div>
                  <div class="row" id="gen_catg_inc_body" style="display: none">
                     <div class="col-md-4 form-group">
                        <label>Gender</label>
                        <select class="form-control" name="gender">
                           <option value="all">-- All --</option>
                           @foreach(GENDER as $key => $gender)
                              <option value="{{$key}}">{{$gender}}</option>
                           @endforeach
                        </select>
                     </div>
                     <div class="col-md-4 form-group">
                        <label>Cast Category</label>
                        <select class="form-control" name="reservation_class_id">
                           <option value="all">-- All --</option>
                           @foreach(CASTCATEGORY as $key => $category)
                              <option value="{{$key}}">{{$category}}</option>
                           @endforeach
                        </select>
                     </div>
                     <div class="col-md-4 form-group">
                        <label>Include RTE</label>
                        <select class="form-control" name="rte_status">
                           <option value="all">-- All --</option>
                           @foreach(INCLUDE_RTE as $key => $include_rte)
                              <option value="{{$key}}">{{$include_rte}}</option>
                           @endforeach
                        </select>
                     </div>
                  </div>
                  <div class="row" id="multiple_course_body" style="display: none">
                     <div class="col-md-6 form-group">
                        <label class="required">Class - Batch - Section - Medium </label>
                        <select class="form-control" multiple="multiple" name="multiple_courses[]">
                           @foreach($section_manages as $section_manage)
                              <option value="{{$section_manage->class_name->id.'-'.$section_manage->batch_name->id.'-'.$section_manage->section_names->id.'-'.$section_manage->medium}}">{{$section_manage->class_name->class_name.'---'.$section_manage->batch_name->batch_name.'---'.$section_manage->section_names->section_name.'---'.$section_manage->medium}}</option>
                           @endforeach
                        </select>
                        @error('multiple_courses')
                           <span class="text-danger error">
                              <strong>{{$message}}</strong>
                           </span>
                        @enderror
                     </div>
                  </div>
                  <div class="row" style="display: none" id="tableRowData">                 
                     <div class="table-responsive col-md-12" id="tableData">
                        
                     </div>
                  </div>
                  <hr>
                  <div class="row">
                     <div class="col-md-4 form-group">
                        <label class="">Online Payment Discount (%)</label>
                        <div class="input-group mb-3">
                           <div class="input-group-prepend">
                           <span class="input-group-text" id="basic-addon1"><i class="fa fa-rupee"></i></span>
                           </div>
                           <input class="form-control" id="online_discount" name="online_discount" type="text" value="0">
                        </div>
                     </div>
                  </div>
                  <div class="row">                    
                     <div class="col-md-3 form-group pt-4">                              
                    
                        <input type="checkbox" value="1" name="refundable" id="inlineCheckbox1"> 
                        Is Fees Refundable 
                        
                     </div>
                     <div class="col-md-3 form-group pt-4"> 
                        <input type="checkbox" value="1" name="is_fees_student_assign" id="is_fees_student_assign" checked=""> 
                        Is Fees Student Assign 
                        
                     </div>
                     <div class="col-md-3 form-group pt-4"> 
                        <input type="checkbox" value="1" name="is_fee_discount" id="is_fee_discount" checked=""> 
                        Is Fees Discount Assign 
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-md-12 form-group">
                        <button class="btn btn-sm btn-success pull-right">Submit</button>
                     </div>
                  </div>
              </form>

          </div>
        </div>
    </div>
  </div>
</div>
@include('layouts.common')
<script>
   $(document).ready(function(){


$('label.required').append('&nbsp;<strong class="text-danger">*</strong>&nbsp;');

      $(document).on('change','.checkHead',function(e){
         e.preventDefault();

         fees_amount_change();
         // console.log(amount);
      });        
      $(document).on('blur','.head_amnt',function(e){
         e.preventDefault();
         fees_amount_change();
      })

      function fees_amount_change(){
         var head_id = '';
         var fees_amnt = 0;
         var installable_amnt = 0;
         var non_installable_amnt =0;
         var instalment_amnt = 0;
         var check_head = [];

         $('.checkHead:checked').each(function(i){
            check_head.push($(this).val());
            head_id = $(this).val();

            var is_installable = $(this).data('id');

            var head_amnt = $('#head_amnt_'+head_id).val();

            if($(this).prop('checked')){           
               $('.head_amnt_'+head_id).attr('checked',true);
            }else{
               $('.head_amnt_'+head_id).attr('checked',false);
            }

            $('.head_amnt_'+head_id).val(head_amnt);

            if(is_installable == 1) {
               installable_amnt = parseInt($('#head_amnt_'+head_id).val()) + parseInt(installable_amnt);
            }else{
               non_installable_amnt = parseInt($('#head_amnt_'+head_id).val()) + parseInt(non_installable_amnt);
            }

            fees_amnt = parseInt($('#head_amnt_'+head_id).val()) + parseInt(fees_amnt);

         });

         if(check_head.length !=0){
            $('#non_installable_amnt').val(non_installable_amnt);
            $('#installable_amnt').val(installable_amnt);
            $('#fees_amnt').val(fees_amnt.toFixed(2));

            var no_of_instalment = parseInt($('#no_of_instalment').val());

            if(installable_amnt !=0){
               var instalment_amnt = (parseInt(installable_amnt) / parseInt(no_of_instalment));
            }

            // console.log(instalment_amnt);

            for(var i =1 ; i <=no_of_instalment; i++){
               if(i == 1){
                  var totl_instalment = parseFloat(instalment_amnt) + parseFloat(non_installable_amnt);
                  // console.log(totl_instalment+'  '+i);
                  // console.log(Math.round(totl_instalment)+1);
                  $('#instalment_amnt_'+i).val(totl_instalment);
               }else{
                  // console.log(i);
                   $('#instalment_amnt_'+i).val(instalment_amnt);
               }
            }

         }
         
      }

      $(document).on('change','#no_of_instalment',function(e){
         e.preventDefault();
         var no_of_instalment = parseInt($('#no_of_instalment').val());
         var head_id = [];
         $('.checkHead:checked').each(function(i){
             head_id[i] = $(this).val();
         });

         if(head_id.length !=0){

            $('#instalmentBody').empty();
         // console.log(no_of_instalment);
            for(var j =1 ; j < no_of_instalment; j++){
              var  row_id =j;
               $('#instalmentBody').append('<div class="col-md-4 form-group" id="instal_one"><label class="required">Instalment Amount <strong class="text-danger">*</strong></label><input type="text" name="instalment_amnt[]" readonly="readonly" class="form-control instalment_amnt" id="instalment_amnt_'+(row_id + 1)+'"></div><div class="col-md-4"><label class="required">Start Date <strong class="text-danger">*</strong></label><input type="text" name="start_dt[]" class="form-control datepicker" data-date-format="yyyy-mm-dd" placeholder="Start Date"></div><div class="col-md-4"><label class="required">End Date <strong class="text-danger">*</strong></label><input type="text" name="end_dt[]" class="form-control datepicker" data-date-format="yyyy-mm-dd" placeholder="Due Date"></div>');
            }
            fees_amount_change();
         }else{
            $("#no_of_instalment").val("1");
           
            $.notify('Select head for fees.','error');
         }
        
      });

      $(document).on('change','#course_selection',function(e){
         e.preventDefault();
         var course_selection = $(this).val();
         course_selection_change(course_selection);
      });

      var course_selection = "{{old('course_selection')}}";
      // console.log(course_selection)
      if(course_selection.length !='0'){

         course_selection_change(course_selection);
      }

      function course_selection_change(course_selection){
         if(course_selection == '1'){
            $('#course_selection_single').show();
            $('#multiple_course_body').hide();
            $('#gen_catg_inc_body').hide();
         }else{
            $('#course_selection_single').hide();
            $('#multiple_course_body').show();
            $('#gen_catg_inc_body').show();
         }
      }

      $(document).on('change','#feesfor',function(e){
         e.preventDefault();
         var feesfor = $(this).val();
         if(feesfor == '1'){
            $('#tableRowData').show();
            $('#tableData').empty();
            $('#gen_catg_inc_body').show();
         }else if(feesfor == '2'){
               var batch_id = $('#batch_id').val();
               var section_id = $('#section_id').val();
               var medium = $('#medium_id').val();
               // console.log(batch_id);
               if(batch_id !=null && section_id !=null){
                  var std_class_id = $('#std_class_id').val();
                  alert(medium);
                  $.ajax({
                     type : 'post',
                     url :'{{route('student_filter')}}', 
                     data: {batch_id:batch_id,std_class_id: std_class_id, section_id:section_id,page:'basic_data_fetch',medium:medium,status:'R', "_token": "{{ csrf_token() }}"},
                     success:function(res){
                        $('#tableRowData').show();
                        $('#tableData').empty().html(res);
                        // console.log(res)
                     }

                  })


               }else{

                  $.notify('Batch and Section field is required.','error');
               }
            $('#gen_catg_inc_body').hide();

         }else{
            $('#tableRowData').show();
            $('#tableData').empty();
            $('#gen_catg_inc_body').hide();
         }
      });

      $('body').on('click','.selectAll' ,function(){  
         // console.log('select');
          if ($(this).is( ":checked" )) {
            $('body .check').prop('checked',true);

          }else{
            $('body .check').prop('checked',false);
          }
      });

      $('body').on('click','#checkAll' ,function(){  
         // console.log('select');
          if ($(this).is( ":checked" )) {
            $('body .checkHead').prop('checked',true);
            // fees_amount_change();
          }else{
            $('body .checkHead').prop('checked',false);
          }
            fees_amount_change();
      });





   })
</script>
@endsection

