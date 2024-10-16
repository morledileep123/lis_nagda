@include('frontend-layouts.main')

<div class="rev-slider">
	<div id="content" class="site-content">
        <div class="container">
            <div class="app-title">
             @if($message = Session::get('success'))
                    
              <div class="alert alert-success">
               {{ $message }}
              </div>
                  @endif
            </div>
            <div class="inner-wrapper">    
                <div id="primary" class="content-area">
        		<main id="main" class="site-main" role="main">
                    <article id="post-55" class="post-55 page type-page status-publish hentry">
                    <header class="entry-header">
                    	<h1 class="entry-title">Career</h1>	</header><!-- .entry-header -->
                    	    <div class="entry-content">
                        		<h2><span style="color: #008000;">Submit Your Resume</span></h2>
                                <div role="form" lang="en-US" dir="ltr">
                                <!-- <div role="form" class="wpcf7" id="wpcf7-f54-p55-o1" lang="en-US" dir="ltr"> -->
                                <div class="screen-reader-response"></div>
                                <form action="{{route('career.store')}}" method="post" class="" enctype="multipart/form-data" >
                                @csrf
                            
                                <p><label> Your Name (required)<br />
                                    <span class="wpcf7-form-control-wrap your-name">
                                        <input type="text" name="name" value="{{old('name')}}" size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" aria-required="true" aria-invalid="false" /></span> </label><br>
                                    @error('name')
                                        <span class="text-danger">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </p>
                                <p><label> Your Email (required)<br />
                                    <span class="wpcf7-form-control-wrap your-email">
                                        <input type="email" name="email" value="{{old('email')}}" size="40" class="wpcf7-form-control wpcf7-text wpcf7-email wpcf7-validates-as-required wpcf7-validates-as-email" aria-required="true" aria-invalid="false" /></span> </label><br>
                                    @error('email')
                                        <span class="text-danger">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </p>
                                <p><label> Subject<br />
                                    <span class="wpcf7-form-control-wrap your-subject">
                                        <input type="text" name="subject" value="{{old('subject')}}" size="40" class="wpcf7-form-control wpcf7-text" aria-invalid="false" /></span> </label><br>
                                    @error('subject')
                                        <span class="text-danger">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </p> 

                                <p><label> Apply Post<br />
                                    <span class="wpcf7-form-control-wrap menu-923">
                                        <select name="post" class="wpcf7-form-control wpcf7-select" aria-invalid="false" >
                                            <option value="">select post</option>
                                                @foreach(careerApplyPost as $key =>$value)
                                                    <option value="{{$key}}" {{old('post') == $key ? 'selected' : ''}}>{{$value}}</option>
                                                @endforeach
                                        </select>
                                    </span></label><br>
                                    @error('post')
                                        <span class="text-danger">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </p>
                                <p><label> Resume<br />
                                    <span class="wpcf7-form-control-wrap file-213">
                                        <input type="file" name="resume" size="40" class="wpcf7-form-control wpcf7-file"  aria-invalid="false" value="{{old('resume')}}"/></span> </label><br>
                                    @error('resume')
                                        <span class="text-danger">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </p>
                                <p><label> Your Message<br />
                                <span class="wpcf7-form-control-wrap your-message">
                                    <textarea name="message" cols="40" rows="10" class="wpcf7-form-control wpcf7-textarea" aria-invalid="false">{{old('message')}}</textarea></span> </label><br>
                                    @error('message')
                                        <span class="text-danger">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </p>
                        <!--     <div class="wpcf7-form-control-wrap">
                                <div data-sitekey="6LcVxdMUAAAAAJVLCXsNHKpYeLUULkXZaSYsZEdC" class="wpcf7-form-control g-recaptcha wpcf7-recaptcha"></div>
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
                            </div> -->
                            <p><input type="submit" value="Send" class="wpcf7-form-control wpcf7-submit" /></p>
                    </form>
                </div>
            </div><!-- .entry-content -->
        <footer class="entry-footer">
        </footer><!-- .entry-footer -->
        </article><!-- #post-## -->			
        </main><!-- #main -->
        </div><!-- #primary -->
    </div><!-- .inner-wrapper -->
</div><!-- .container -->
</div><!-- #content -->
@include('frontend-layouts.footer')
	

<!--Generated by Endurance Page Cache-->