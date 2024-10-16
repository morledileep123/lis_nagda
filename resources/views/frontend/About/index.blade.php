@include('frontend-layouts.main')

<div class="rev-slider"></div>
<div id="content" class="site-content"><div class="container"><div class="inner-wrapper">    
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<article id="post-40" class="post-40 page type-page status-publish hentry">
				@php $count = 1; @endphp
				@foreach($aboutusDatas  as $aboutusData)
				@if($count ==1 )
				<header class="entry-header">
					<h1 class="entry-title font-wieght-bold">{{$aboutusData->about_title}}</h1>	
				</header><!-- .entry-header -->
					<div class="entry-content">
			    		<div class="row ">
			    			<div class="col-lg-9 col-md-12 col-xs-12 col-sm-12">
			    				{!!$aboutusData->about_des!!}
								<p>
							</div>
							<div class="col-lg-3 col-md-12 col-xs-12 col-sm-12">
								<img class="certificate" src="{{asset('storage/'.$aboutusData->about_image)}}" alt="ISO 9001 : 2015 Certification"></p>
								<h5 style="font-size: 12px; text-align: center;">(An ISO 9001 : 2015 Certified Institution)</h5>
							 <p>
							</div>
						</div>
						@else
							<div class="row ">
							<div class="col-lg-2 col-md-12 col-xs-12 col-sm-12">
								<img src="{{asset('storage/'.$aboutusData->about_image)}}" class="img-responsive oscitas-res-image" alt="">
							</div>
							<div class="col-lg-10 col-md-12 col-xs-12 col-sm-12">
							<span style="color: #008000;"><strong>{{$aboutusData->about_title}}</strong></span></p>
								<p>{!!$aboutusData->about_des!!}</div>
							</div>
							<hr class=" rule-thin osc-rule" />

						@endif
						@php $count++; @endphp
						@endforeach
					</artical>
				</main><!-- #main -->
			</div><!-- #primary -->
		</div><!-- .inner-wrapper -->
	</div><!-- .container -->
</div><!-- #content -->
	
@include('frontend-layouts.footer')






