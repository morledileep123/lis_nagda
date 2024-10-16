@include('frontend-layouts.main')
<div class="rev-slider"></div>
	<div id="content" class="site-content">
		<div class="container">
			<div class="inner-wrapper">    
				<div id="primary" class="content-area">
					<main id="main" class="site-main" role="main">
						<article id="post-57" class="post-57 page type-page status-publish hentry">
							<header class="entry-header">
							<h1 class="entry-title">Principal’s Message</h1>	
							</header><!-- .entry-header -->
							<div class="entry-content">
								@foreach($principalsMgs as $principalsMg)
						    		<p><strong>{{$principalsMg->principals_msg_title}}</strong></p>
									<p>{!!$principalsMg->principals_msg_des!!}</p>
								<p>&nbsp;</p>
								@endforeach
							</div><!-- .entry-content -->
						</article><!-- #post-## -->
					</main><!-- #main -->
				</div><!-- #primary -->
		</div><!-- .inner-wrapper -->
	</div><!-- .container -->
</div><!-- #content -->
	
@include('frontend-layouts.footer')
