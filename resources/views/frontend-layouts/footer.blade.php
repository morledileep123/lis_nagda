<div  id="footer-widgets" >
    <div class="container">
    @if(session('footer_content'))
    
    @foreach(session('footer_content') as $footerData)
        <div class="inner-wrapper">
            <div class="footer-active-4 footer-widget-area">
                <aside id="widget_tlp_port_owl_carousel-4" class="widget widget_tlp_port_owl_carousel">
                <h3 class="widget-title"> {{$footerData->heading}}</h3>            
                    <div class="tlp-portfolio">
                        <div class='rt-container-fluid tlp-portfolio'>
                            <div class="row">
                                <div id='widget_tlp_port_owl_carousel-4-port-carousel' class='slider'>
                                @foreach($footerData->footerImages as $footerImage)
                                    <div class='tlp-col-lg-12 tlp-col-md-12 tlp-col-sm-6 tlp-col-xs-12 tlp-equal-height'>
                                        <div class="tlp-portfolio-item">
                                            <div class="tlp-portfolio-thum tlp-item">
                                               <img class="img-responsive" src="{{asset('storage/'.$footerImage->footer_image)}}" alt="Transport"/>
                                               <div class="tlp-overlay">
                                                <p class="link-icon">
                                                    <a class="tlp-zoom" href="{{asset('storage/'.$footerImage->footer_image)}}"><i class="fa fa-search-plus"></i></a>
                                                    <a target="_blank" href="#"><i class="fa fa-external-link"></i></a>
                                                </p>
                                                </div>
                                            </div>
                                            <div class="tlp-content">
                                                <div class="tlp-content-holder"><h3>
                                                    <a href="#">{{$footerImage->image_title}}</a></h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                {{--     <div class='tlp-col-lg-12 tlp-col-md-12 tlp-col-sm-6 tlp-col-xs-12 tlp-equal-height'>
                                        <div class="tlp-portfolio-item">
                                            <div class="tlp-portfolio-thum tlp-item">
                                                <img class="img-responsive" src="http://lisnagda.org/wp-content/uploads/2016/11/Computer-Lab-Pic-300x250.jpg" alt="Computer Lab"/>
                                                <div class="tlp-overlay">
                                                    <p class="link-icon">
                                                    <a class="tlp-zoom" href="http://lisnagda.org/wp-content/uploads/2016/11/Computer-Lab-Pic.jpg"><i class="fa fa-search-plus"></i></a>
                                                    <a target="_blank" href="http://lisnagda.org/portfolio/computer-lab/"><i class="fa fa-external-link"></i></a></p>
                                                </div>
                                            </div>
                                            <div class="tlp-content">
                                                <div class="tlp-content-holder"><h3>
                                                    <a href="http://lisnagda.org/portfolio/computer-lab/">Computer Lab</a></h3><p> </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class='tlp-col-lg-12 tlp-col-md-12 tlp-col-sm-6 tlp-col-xs-12 tlp-equal-height'>
                                        <div class="tlp-portfolio-item">
                                            <div class="tlp-portfolio-thum tlp-item">
                                                <img class="img-responsive" src="http://lisnagda.org/wp-content/uploads/2016/11/Library-Pic-2-300x250.jpg" alt="Library"/>
                                                <div class="tlp-overlay"><p class="link-icon">
                                                    <a class="tlp-zoom" href="http://lisnagda.org/wp-content/uploads/2016/11/Library-Pic-2.jpg"><i class="fa fa-search-plus"></i></a>
                                                    <a target="_blank" href="http://lisnagda.org/portfolio/library/"><i class="fa fa-external-link"></i></a></p>
                                                </div>
                                            </div>
                                            <div class="tlp-content">
                                                <div class="tlp-content-holder"><h3>
                                                    <a href="http://lisnagda.org/portfolio/library/">Library</a></h3><p> </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class='tlp-col-lg-12 tlp-col-md-12 tlp-col-sm-6 tlp-col-xs-12 tlp-equal-height'>
                                        <div class="tlp-portfolio-item">
                                            <div class="tlp-portfolio-thum tlp-item"><img class="img-responsive" src="http://lisnagda.org/wp-content/uploads/2016/11/LIS-BANNER-02-350x250-300x250.jpg" alt="Classroom"/>
                                                <div class="tlp-overlay"><p class="link-icon">
                                                    <a class="tlp-zoom" href="http://lisnagda.org/wp-content/uploads/2016/11/LIS-BANNER-02-350x250.jpg"><i class="fa fa-search-plus"></i></a>
                                                    <a target="_blank" href="http://lisnagda.org/portfolio/classroom/"><i class="fa fa-external-link"></i></a></p>
                                                </div>
                                            </div>
                                            <div class="tlp-content">
                                                <div class="tlp-content-holder"><h3>
                                                    <a href="http://lisnagda.org/portfolio/classroom/">Classroom</a></h3><p> </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class='tlp-col-lg-12 tlp-col-md-12 tlp-col-sm-6 tlp-col-xs-12 tlp-equal-height'>
                                        <div class="tlp-portfolio-item">
                                            <div class="tlp-portfolio-thum tlp-item">
                                                <img class="img-responsive" src="http://lisnagda.org/wp-content/uploads/2016/11/drama-300x250.jpg" alt="Theatre and Drama"/>
                                                <div class="tlp-overlay"><p class="link-icon">
                                                    <a class="tlp-zoom" href="http://lisnagda.org/wp-content/uploads/2016/11/drama.jpg"><i class="fa fa-search-plus"></i></a>
                                                    <a target="_blank" href="http://lisnagda.org/portfolio/theatre-and-drama/"><i class="fa fa-external-link"></i></a></p>
                                                </div>
                                            </div>
                                            <div class="tlp-content">
                                                <div class="tlp-content-holder"><h3>
                                                    <a href="http://lisnagda.org/portfolio/theatre-and-drama/">Theatre and Drama</a></h3><p> </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div> --}}
                                    @endforeach
                                </div>
                            </div>
                            <div class="textwidget">
                                {!!$footerData->footer_des ? $footerData->footer_des :''!!}
                            </div>
                        </div>            
                    </div>
                </aside>
            </div><!-- .footer-widget-area -->
           {{--  <div class="footer-active-4 footer-widget-area">
                <aside id="text-10" class="widget widget_text">
                    <h3 class="widget-title">Social Icons</h3>           
                    <div class="textwidget"><p><i class="fa fa-facebook"></i> <i class="fa fa-twitter"></i><br />
                    We provide best education and facilities to the students, to make them achieve new landmarks and success in various fields.</p>
                    </div>
                </aside>
            </div> --}}<!-- .footer-widget-area -->
           {{--  <div class="footer-active-4 footer-widget-area">
                <aside id="text-11" class="widget widget_text"><h3 class="widget-title">About LIS</h3>  
                      <div class="textwidget">
                        <p>Lakshya International school (LIS) Nagda is an  English medium, coeducational, day cum residential school founded in 2015 by the Lakshya Shiksha Avam Unnati Samiti. The school is affiliated to CBSE.<br />
                        At LIS we are providing world class facilities and environment for children to learn and grow.</p>
                       </div>
                </aside>
            </div> --}}<!-- .footer-widget-area -->
        {{--     <div class="footer-active-4 footer-widget-area">
              <aside id="nav_menu-5" class="widget widget_nav_menu"><h3 class="widget-title">Quick Links</h3>
                    <div class="menu-menu2-container">
                        <ul id="menu-menu2" class="menu">

                            <li id="menu-item-1691" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home menu-item-1691">
                             <a href="#">Home</a>
                            </li>
                            
                            <li id="menu-item-1692" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1692"><a href="#">About Us</a>
                            </li>
                            <li id="menu-item-1693" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1693"><a href="#">Academics</a>
                            </li>
                            <li id="menu-item-1726" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1726"><a href="#">Admission</a></li>
                            <li id="menu-item-1695" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1695"><a href="#">CBSE Section</a></li>
                            <li id="menu-item-1696" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1696"><a href="#">Contact Us</a></li>
                            <li id="menu-item-1697" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1697"><a href="#">Extra Curricular Activities</a></li>
                            </ul>
                    </div>
                </aside>
              </div> --}}<!-- .footer-widget-area -->
            </div><!-- .inner-wrapper -->
            @endforeach
        </div><!-- .container -->
    </div>
    @else
    {{ Redirect::to('/login') }}
    @endif
    <footer id="colophon" class="site-footer" role="contentinfo">
        <div class="container">    
            <div class="copyright">
                Copyright. All rights reserved.       
            </div>
            <span class="sep">  </span>Developed & maintained By 
            <a href="http://www.libersolution.com/" rel="designer" target="_blank">Liber Solutions Pvt. Ltd.</a>
        </div><!-- .site-info -->
        </div><!-- .container -->
    </footer><!-- #colophon -->
</div><!-- #page -->
<a href="#page" class="scrollup" id="btn-scrollup">
    <i class="fa fa-chevron-up"></i>
</a>
<!-- ngg_resource_manager_marker -->
<script type='text/javascript'>
/* <![CDATA[ */
var wpcf7 = {"apiSettings":{"root":"http:\/\/lisnagda.org\/wp-json\/contact-form-7\/v1","namespace":"contact-form-7\/v1"},"recaptcha":{"messages":{"empty":"Please verify that you are not a robot."}}};
/* ]]> */
</script>
<script type='text/javascript' src='{{asset('js/frontend/scripts.js')}}'></script>
{{-- <script type='text/javascript' src='http://lisnagda.org/wp-content/plugins/contact-form-7/includes/js/scripts.js?ver=5.0.4'></script> --}}
<script type='text/javascript'>
/* <![CDATA[ */
var awsmJobsPublic = {"ajaxurl":"http:\/\/lisnagda.org\/wp-admin\/admin-ajax.php","is_tax_archive":"","job_id":"0","wp_max_upload_size":"268435456","i18n":{"loading_text":"Loading...","form_error_msg":{"general":"Error in submitting your application. Please try again later!","file_validation":"The file you have selected is too large."}}};
/* ]]> */
</script>
{{-- <script type='text/javascript' src='http://lisnagda.org/wp-content/plugins/wp-job-openings/assets/js/script.min.js?ver=1.1.2'></script> --}}
<script type='text/javascript' src='{{asset('js/frontend/script.min.js')}}'></script>

{{-- <script type='text/javascript' src='http://lisnagda.org/wp-content/themes/education-hub/js/skip-link-focus-fix.min.js?ver=20130115'></script> --}}
<script type='text/javascript' src='{{asset('js/frontend/skip-link-focus-fix.min.js')}}'></script>
{{-- <script type='text/javascript' src='http://lisnagda.org/wp-content/themes/education-hub/third-party/cycle2/js/jquery.cycle2.min.js?ver=2.1.6'></script> --}}
<script type='text/javascript' src='{{asset('js/frontend/jquery.cycle2.min.js')}}'></script>

{{-- <script type='text/javascript' src='http://lisnagda.org/wp-content/themes/education-hub/js/custom.min.js?ver=1.0'></script> --}}
<script type='text/javascript' src='{{asset('js/frontend/custom.min.js')}}'></script>
<script type='text/javascript'>
/* <![CDATA[ */
var EducationHubScreenReaderText = {"expand":"<span class=\"screen-reader-text\">expand child menu<\/span>","collapse":"<span class=\"screen-reader-text\">collapse child menu<\/span>"};
/* ]]> */
</script>
<script type='text/javascript' src='{{asset('js/frontend/navigation.min.js')}}'></script>
{{-- <script type='text/javascript' src='http://lisnagda.org/wp-content/themes/education-hub/js/navigation.min.js?ver=20120206'></script> --}}
<script type='text/javascript'>
/* <![CDATA[ */
var ajaxsearchlite = {"ajaxurl":"http:\/\/lisnagda.org\/wp-admin\/admin-ajax.php","backend_ajaxurl":"http:\/\/lisnagda.org\/wp-admin\/admin-ajax.php","js_scope":"jQuery"};
var ASL = {"ajaxurl":"http:\/\/lisnagda.org\/wp-admin\/admin-ajax.php","backend_ajaxurl":"http:\/\/lisnagda.org\/wp-admin\/admin-ajax.php","js_scope":"jQuery","detect_ajax":"0","scrollbar":"1","js_retain_popstate":"0","version":"4737","fix_duplicates":"1"};
/* ]]> */
</script>
{{-- <script type='text/javascript' src='http://lisnagda.org/wp-content/plugins/ajax-search-lite/js/min/jquery.ajaxsearchlite.min.js?ver=4.8'></script> --}}
<script type='text/javascript' src='{{asset('js/frontend/jquery.ajaxsearchlite.min.js')}}'></script>
{{-- <script type='text/javascript' src='http://lisnagda.org/wp-includes/js/wp-embed.min.js?ver=4.9.15'></script> --}}
<script type='text/javascript' src='{{asset('js/frontend/embed.min.js')}}'></script>
{{-- <script type='text/javascript' src='http://lisnagda.org/wp-content/plugins/tlp-portfolio/assets/vendor/jquery.magnific-popup.min.js'></script> --}}
<script type='text/javascript' src='{{asset('js/frontend/jquery.magnific-popup.min.js')}}'></script>
{{-- <script type='text/javascript' src='http://lisnagda.org/wp-content/plugins/tlp-portfolio/assets/vendor/owl.carousel.min.js?ver=4.9.15'></script> --}}
<script type='text/javascript' src='{{asset('js/frontend/owl.carousel.min.js')}}'></script>
{{-- <script type='text/javascript' src='http://lisnagda.org/wp-content/plugins/tlp-portfolio/assets/js/tlpportfolio.js'></script> --}}
<script type='text/javascript' src='{{asset('js/frontend/tlpportfolio.js')}}'></script>

<style type="text/css"></style>
<script type='text/javascript' src='https://www.google.com/recaptcha/api.js?onload=recaptchaCallback&#038;render=explicit&#038;ver=2.0'></script>


<script type="text/javascript">
/*var recaptchaWidgets = [];
var recaptchaCallback = function() {
    var forms = document.getElementsByTagName( 'form' );
    var pattern = /(^|\s)g-recaptcha(\s|$)/;

    for ( var i = 0; i < forms.length; i++ ) {
        var divs = forms[ i ].getElementsByTagName( 'div' );

        for ( var j = 0; j < divs.length; j++ ) {
            var sitekey = divs[ j ].getAttribute( 'data-sitekey' );

            if ( divs[ j ].className && divs[ j ].className.match( pattern ) && sitekey ) {
                var params = {
                    'sitekey': sitekey,
                    'type': divs[ j ].getAttribute( 'data-type' ),
                    'size': divs[ j ].getAttribute( 'data-size' ),
                    'theme': divs[ j ].getAttribute( 'data-theme' ),
                    'badge': divs[ j ].getAttribute( 'data-badge' ),
                    'tabindex': divs[ j ].getAttribute( 'data-tabindex' )
                };

                var callback = divs[ j ].getAttribute( 'data-callback' );

                if ( callback && 'function' == typeof window[ callback ] ) {
                    params[ 'callback' ] = window[ callback ];
                }

                var expired_callback = divs[ j ].getAttribute( 'data-expired-callback' );

                if ( expired_callback && 'function' == typeof window[ expired_callback ] ) {
                    params[ 'expired-callback' ] = window[ expired_callback ];
                }

                var widget_id = grecaptcha.render( divs[ j ], params );
                recaptchaWidgets.push( widget_id );
                break;
            }
        }
    }
};

document.addEventListener( 'wpcf7submit', function( event ) {
    switch ( event.detail.status ) {
        case 'spam':
        case 'mail_sent':
        case 'mail_failed':
            for ( var i = 0; i < recaptchaWidgets.length; i++ ) {
                grecaptcha.reset( recaptchaWidgets[ i ] );
            }
    }
}, false );*/
</script>
<script>
(function($){
$("#widget_tlp_port_owl_carousel-4-port-carousel").owlCarousel({
    // Most important owl features
    items : 1,
    paginationSpeed : 800,
    autoPlay : true,
    stopOnHover : true,
    navigation : true,
    navigationText : ["<i class='fa fa-chevron-left'></i>","<i class='fa fa-chevron-right'></i>"],
    pagination : true,
    responsive: true,
    lazyLoad : true,
    autoHeight : true
});
})(jQuery)
</script>
{{-- for datetime picker.......................... --}}
     <link href="http://getbootstrap.com/dist/css/bootstrap.min.css" rel="stylesheet">   
      <link href="http://getbootstrap.com/assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">    
      <link href="http://getbootstrap.com/examples/navbar-static-top/navbar-static-top.css" rel="stylesheet">
      <link href="http://getbootstrap.com/examples/navbar/navbar.css" rel="stylesheet">
      <link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.19/themes/start/jquery-ui.css" rel="stylesheet">
         
     <script src="https://code.jquery.com/jquery-1.10.2.js"></script>  
      <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.8/jquery.validate.min.js"></script>
       <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>   
      <script src="http://getbootstrap.com/assets/js/ie-emulation-modes-warning.js"></script>       
      <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
     <script type="text/javascript">
        $(function () {
          $(".datepicker").datepicker();
        });
    </script>
</body>
</html>