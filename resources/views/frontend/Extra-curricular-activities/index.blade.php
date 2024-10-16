@include('frontend-layouts.main')

<div class="rev-slider">
</div>
<div id="content" class="site-content">
	<div class="container">
		<div class="inner-wrapper">    
            <div id="primary" class="content-area">
		        <main id="main" class="site-main" role="main">
					<article id="post-1556" class="post-1556 page type-page status-publish hentry">
						
						@foreach($extCrclrActs as $extCrclrAct)
						<div class="entry-content">
							<div class="row erow">
								<div class="col-lg-2 col-md-12 col-xs-12 col-sm-12">
									<img src="{{asset('storage/'.$extCrclrAct->ext_crclr_acts_image ?? null)}}" class="img-responsive oscitas-res-image" alt="">
								</div>
								<header class="entry-header">
									<h1 class="entry-title"><strong>{{$extCrclrAct->ext_crclr_acts_title}}</strong></h1>	
								</header>
								<div class="col-lg-10 col-md-12 col-xs-12 col-sm-12"></p>
									{!!$extCrclrAct->ext_crclr_acts_des!!}</div>
								</div>
								<hr class=" rule-thin osc-rule" />
							
							</div><!-- .entry-content -->
						
						@endforeach
					</article><!-- #post-## -->			
				</main><!-- #main -->
			</div><!-- #primary -->
		</div><!-- .inner-wrapper -->
	</div><!-- .container -->
</div><!-- #content -->
	
@include('frontend-layouts.footer')

<!--Generated by Endurance Page Cache-->