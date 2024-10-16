@include('frontend-layouts.main')

<div class="rev-slider">
  <div id="content" class="site-content">
    <div class="container">
        <div class="inner-wrapper">    
            <div id="primary" class="content-area">
                <main id="main" class="site-main" role="main">  
                    <article id="post-86" class="post-86 page type-page status-publish hentry">
                        <header class="entry-header">
                            <h1 class="entry-title">Contact Us</h1> </header><!-- .entry-header -->
                                <div class="container">
                                    <div class="app-title">
                                     @if($message = Session::get('success'))
                                            
                                      <div class="alert alert-success">
                                       {{ $message }}
                                      </div>
                                          @endif
                                    </div>
                                </div>
                                <div class="entry-content">       
                                <div class="row ">
                                <div class="col-lg-4 col-md-12 col-xs-12 col-sm-12">
                                    @foreach($contactusDatas as $contactusData)
                                    <iframe src="{{$contactusData->contact_us_map_url}}" width="600" height="450" frameborder="0" allowfullscreen="allowfullscreen"></iframe>
                                </div>

                                @endforeach
                                <div class="col-lg-4 col-md-12 col-xs-12 col-sm-12">
                                    <div role="form" {{-- class="wpcf7" id="wpcf7-f85-p86-o1" --}} lang="en-US" dir="ltr">
                                        <div class="screen-reader-response"></div>
                                            <form action="{{route('save-contact-us')}}" method="post" class="wpcf7-form" novalidate="novalidate">
                                                @csrf
                                               
                                                    <p><label> Your Name (required)<br />
                                                    <span class="wpcf7-form-control-wrap your-name">
                                                        <input type="text" name="name" value="{{old('name')}}" size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" aria-required="true" aria-invalid="false" /></span> </label> @error('name')
                                                            <span class="text-danger">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </p>

                                                    <p><label> Your Email (required)<br />
                                                    <span class="wpcf7-form-control-wrap your-email">
                                                        <input type="email" name="email" value="{{old('email')}}" size="40" class="wpcf7-form-control wpcf7-text wpcf7-email wpcf7-validates-as-required wpcf7-validates-as-email" aria-required="true" aria-invalid="false" /></span> </label> 
                                                        @error('email')
                                                            <span class="text-danger">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror</p>
                                                    <p><label> Your Message<br />
                                                    <span class="wpcf7-form-control-wrap your-message">
                                                        <textarea name="message" cols="40" rows="10" class="wpcf7-form-control wpcf7-textarea" aria-invalid="false">{{old('message')}}</textarea></span> </label> 
                                                        @error('message')
                                                            <span class="text-danger">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror</p>
                                                 
                                            <p>
                                                <input type="submit" value="Send" class="wpcf7-form-control wpcf7-submit" /></p>
                                        </form>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-12 col-xs-12 col-sm-12"><p></p>
                                    @foreach($contactusDatas as $contactusData)
                                    <h2>{{$contactusData->contact_us_title}}</h2>
                                        {!!$contactusData->contact_us_des!!}
                                <div class="social-icons"><i class="fa fa-facebook"></i><br>
                                <i class="fa fa-twitter"></i></div>
                                <p></p></div>
                                @endforeach
                            </article><!-- #post-## -->
                        </main><!-- #main -->
                    </div><!-- #primary -->
                </div><!-- .inner-wrapper -->
            </div><!-- .container -->
        </div><!-- #content -->
    
@include('frontend-layouts.footer')

<!--Generated by Endurance Page Cache-->