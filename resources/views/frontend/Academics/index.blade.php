@include('frontend-layouts.main')

<div class="rev-slider">
</div>
<div id="content" class="site-content"><div class="container"><div class="inner-wrapper">    

<div id="primary" class="content-area">
<main id="main" class="site-main" role="main">	
	<article id="post-52" class="post-52 page type-page status-publish hentry">
		@foreach($academicDatas as $academicData)
		<header class="entry-header">
			<h1 class="entry-title">Academics</h1>	</header><!-- .entry-header -->
			<div class="entry-content">
	    		{!!$academicData->academic_des!!}
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