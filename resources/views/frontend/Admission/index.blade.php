 @include('frontend-layouts.main')

<div class="rev-slider">
</div>
<div id="content" class="site-content"><div class="container"><div class="inner-wrapper">    

<div id="primary" class="content-area">
<main id="main" class="site-main" role="main">

			
				
<article id="post-42" class="post-42 page type-page status-publish hentry">
	<header class="entry-header">
		</header><!-- .entry-header -->
			<div class="entry-content">
			    @if($message = Session::get('success'))   
				      	<div class="alert alert-success">{{ $message }}</div>
				@endif
				@foreach($adnFormDatas as $adnFormData)
		    	<h1><strong>{{$adnFormData->adm_form_title}}</strong>
		    		<div class="app-title full-right">
					   
					  </div></h1>
					{!! $adnFormData->adm_form_des!!}
					@endforeach
				<h1><strong><strong>Admission Inquiry Form</strong></strong>
				</h1>
		<div role="form" {{-- class="wpcf7" id="wpcf7-f49-p42-o1" --}} lang="en-US" dir="ltr">
		<div class="screen-reader-response"></div>
		<form action="{{route('admission_inquiry_form')}}" method="post" class="wpcf7-form" novalidate="novalidate" id="example-form">
			@csrf
	{{-- 	<div style="display: none;">
			<input type="hidden" name="_wpcf7" value="49" />
			<input type="hidden" name="_wpcf7_version" value="5.0.4" />
			<input type="hidden" name="_wpcf7_locale" value="en_US" />
			<input type="hidden" name="_wpcf7_unit_tag" value="wpcf7-f49-p42-o1" />
			<input type="hidden" name="_wpcf7_container_post" value="42" />
		</div> --}}
				<p>
				<label> Your Name (required)<br />
					<span class="wpcf7-form-control-wrap your_name">
					<input type="text" name="your_name" size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" aria-required="true" aria-invalid="false" value="{{old('your_name')}}" required="" />
					@error('your_name')
					<br><span class="text-danger">
						<strong>{{$message}}</strong>
					</span>
					@enderror
				</span>
					
				</label>
				</p>
				<p>
				<label> Your Email (required)<br />
					<span class="wpcf7-form-control-wrap your_email">
					<input type="email" name="your_email"  size="40" class="wpcf7-form-control wpcf7-text wpcf7-email wpcf7-validates-as-required wpcf7-validates-as-email" aria-required="true" aria-invalid="false" value="{{old('your_email')}}" required=""/>
					@error('your_email')
					<br><span class="text-danger">
						<strong>{{$message}}</strong>
				    </span>
					@enderror
					</span>
				</label>
				</p>
				<p><label> Child Name (required)<br />
					<span class="wpcf7-form-control-wrap child_name">
					<input type="text" name="child_name"  size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" aria-required="true" aria-invalid="false" value="{{old('child_name')}}" required=""/>
				@error('child_name')
					<br><span class="text-danger">
						<strong>{{$message}}</strong>
					</span>
				@enderror</span> 
				</label></p>
				<p><label> Child Age (required)<br />
					<span class="wpcf7-form-control-wrap child_age">
					<input type="text" name="child_age" size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" aria-required="true" aria-invalid="false" value="{{old('child_age')}}" required=""/>@error('child_age')
						<br><span class="text-danger">
							<strong>{{$message}}</strong>
						</span>
					@enderror</span> 
				</label></p>
				<p><label> Class (required)<br />
					<span class="wpcf7-form-control-wrap child_class">
					<input type="text" name="child_class" size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" aria-required="true" aria-invalid="false" value="{{old('child_class')}}" required=""/>@error('child_class')
					<br><span class="text-danger">
						<strong>{{$message}}</strong>
					</span>
				@enderror</span> 
				</label></p>
				<p><label> Mobile No. (required)<br />
					<span class="wpcf7-form-control-wrap mobile_no">
					<input type="tel" name="mobile_no" 	 size="40" class="wpcf7-form-control wpcf7-text wpcf7-tel wpcf7-validates-as-required wpcf7-validates-as-tel" aria-required="true" aria-invalid="false" value="{{old('mobile_no')}}" required=""/> 
					@error('mobile_no')
					<br><span class="text-danger">
						<strong>{{$message}}</strong>
					</span>
					@enderror
				</span></label></p>
				{{-- <div class="wpcf7-form-control-wrap"><div data-sitekey="6LcVxdMUAAAAAJVLCXsNHKpYeLUULkXZaSYsZEdC" class="wpcf7-form-control g-recaptcha wpcf7-recaptcha"></div>
				<noscript>
					<div style="width: 302px; height: 422px;">
						<div style="width: 302px; height: 422px; position: relative;">
							<div style="width: 302px; height: 422px; position: absolute;">
								<iframe src="https://www.google.com/recaptcha/api/fallback?k=6LcVxdMUAAAAAJVLCXsNHKpYeLUULkXZaSYsZEdC" frameborder="0" scrolling="no" style="width: 302px; height:422px; border-style: none;">
								</iframe>
							</div>
							<div style="width: 300px; height: 60px; border-style: none; bottom: 12px; left: 25px; margin: 0px; padding: 0px; right: 25px; background: #f9f9f9; border: 1px solid #c1c1c1; border-radius: 3px;">
								<textarea id="g-recaptcha-response" name="g-recaptcha-response" class="g-recaptcha-response" style="width: 250px; height: 40px; border: 1px solid #c1c1c1; margin: 10px 25px; padding: 0px; resize: none;">
								</textarea>
							</div>
						</div>
					</div>
				</noscript>
				</div> --}}
				<p>
	           <input type="submit" value="Send" class="wpcf7-form-control wpcf7-submit" /></p>
            <div class="wpcf7-response-output wpcf7-display-none">
            	
            </div>
            </form>
            </div>
            <p>
            <a class="button medium green brochure-button downloadbutton" href="{{ asset('LIS_Brochure_Curv.pdf') }}" target="_blank" rel="noopener"><i class="icon-file icon-white"></i>Download E-Brochure</a></p>
            </div><!-- .entry-content -->
           <footer class="entry-footer">
        </footer><!-- .entry-footer -->
       </article><!-- #post-## -->
      </main><!-- #main -->
    </div><!-- #primary -->

   </div><!-- .inner-wrapper -->
  </div><!-- .container -->
 </div><!-- #content -->
<style type="text/css">
	.error{
		color: red;
	}
</style>
 <script type="text/javascript" src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
<script type="text/javascript" src="https://ajax.microsoft.com/ajax/jquery.validate/1.7/jquery.validate.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>
<script type="text/javascript">
$.validator.addMethod("mobile_regex", function(value, element) {
return this.optional(element) || /^\d{10}$/i.test(value);
}, "Please Enter No Only.");

$.validator.addMethod("password_regex", function(value, element) {
return this.optional(element) || /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,20}$/i.test(value);
}, "Password must contain at least 1 lowercase, 1 uppercase, 1 numeric and 1 special character");

$.validator.addMethod("email_regex", function(value, element) {
return this.optional(element) || /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/i.test(value);
}, "The Email Address Is Not Valid Or In The Wrong Format");

$.validator.addMethod("name_regex", function(value, element) {
return this.optional(element) || /^[a-zA-Z ]{2,100}$/i.test(value);
}, "Please choose a name with only a-z 0-9.");

$('label.required').append('&nbsp;<strong class="text-danger">*</strong>&nbsp;');
$('th.required').append('&nbsp;<strong class="text-danger">*</strong>&nbsp;');


$("#example-form").validate({
    errorContainer: "#errorbox",
    errorLabelContainer: "#errorbox ul",
    wrapper: "li",

    rules: {
        your_name:{
            require:true,
            minlength: 2,
        },
        child_name: {
            required:true,
            minlength: 2,
        },
        child_age: "required",
        your_email: {
            required:true,
            email:true,
        },
    	child_class:{
    		minlength:1,
    		maxlength:20,
    	},

		mobile_no:{
			minlength:10,
			maxlength:11,
		}
    },
    messages: {
        your_name:{
            required: "Please enter name!",
            minlength: "At least 3 characters is needed for name",
        },
        child_name:{
            required: "Please enter child name!",
            minlength: "At least 3 characters is needed for surname",
        },
        child_age: "Please enter child age!",
        your_email:{
            required: "Please enter email!",
            email: "The format of email is: john.deer@gmail.com",
        },
        child_class: "Please enter child class!",
        mobile_no: "Please enter mobile no!"
    },
    errorElement: "em",
	errorPlacement: function errorPlacement(error, element) { 
		element.after(error);
		error.addClass( "help-block" );

	 },
	highlight: function ( element, errorClass, validClass ) {
		$( element ).parents( ".error-div" ).addClass( "has-error" ).removeClass( "has-success" );
	},
	unhighlight: function (element, errorClass, validClass) {
		$( element ).parents( ".error-div" ).addClass( "has-success" ).removeClass( "has-error" );
	}
});
</script>
@include('frontend-layouts.footer')


<!--Generated by Endurance Page Cache--> 