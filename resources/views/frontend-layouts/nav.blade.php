
<div id="main-nav" class="clear-fix">
        <div class="container-fluid">
        <nav id="site-navigation" class="main-navigation" role="navigation">
          <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><i class="fa fa-bars"></i>
            Menu</button>
            <div class="wrap-menu-content">
                <div class="menu-menu1-container">
                    <ul id="primary-menu" class="menu">
                        <li id="menu-item-12" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home  page_item page-item-5  menu-item-12">
                        <a href="{{url('/')}}">Home</a>
                            </li>
                            <li id="menu-item-103" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-103"><a href="{{url('about-us')}}">About Us</a>
                            </li>
                        <li id="menu-item-101" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-101">
                            <a href="{{url('academics')}}">Academics</a>
                        </li>
                        <li id="menu-item-1558" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1558">
                            <a href="{{url('extra-curricular-activities')}}">Extra Curricular Activities</a>
                        </li>
                        <li id="menu-item-102" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-102">
                            <a href="{{url('admissions')}}">Admissions</a>
                        </li>
                        <li id="menu-item-1809" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-1809">
                            <a href="#">CBSE Section</a>
                        <ul class="sub-menu">
                            <li id="menu-item-1847" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1847"><a href="http://lisnagda.org/cbse-information-disclosure/"><a href="{{url('cbsc-information')}}" target="_blank">CBSE Information</a></a></li>
                             <li id="menu-item-1657" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1657"><a href="{{url('public_disclosure')}}">Public Disclosure</a></li>
                            <li id="menu-item-1657" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1657"><a href="{{url('committees')}}">Committees</a></li>
                            <li id="menu-item-1674" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1674"><a href="{{url('transfer-certificate')}}">Transfer Certificate</a></li>
                            <li id="menu-item-1850" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1850"><a href="{{url('auditors-report')}}">Auditor&#8217;s Report</a></li>
                        </ul>
                    </li>
                    <li id="menu-item-99" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-99">
                        <a href="{{url('contact-us')}}">Contact Us</a>
                    </li> 
                    <li id="menu-item-1053" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-1053"><a href="#">More</a>
                        <ul class="sub-menu">
                            <li id="menu-item-258" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-258"><a href="{{url('school-gallery')}}">Gallery</a></li>
                            <li id="menu-item-861" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-861"><a href="{{url('openings')}}">Openings</a></li>
                            <li id="menu-item-100" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-100"><a href="{{url('principals-message')}}">Principal’s Message</a></li>
                        </ul>
                    <li id="menu-item-99" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-99"><a href="{{url('login')}}">Login</a>
                    </li>
                </li>
            </ul>            
            </div>            
            </div><!-- .menu-content -->
        </nav><!-- #site-navigation -->
       </div> <!-- .container -->
    </div> <!-- #main-nav -->

<script type="text/javascript">
    jQuery(function() {
        // this will get the full URL at the address bar
        var url = window.location.href;
        

        // passes on every "a" tag
        jQuery(".main-navigation a").each(function() {
            // checks if its the same on the address bar
            if (url == (this.href)) {
                
                jQuery(this).closest("li").addClass("current-menu-item page_item current_page_item");
                //for making parent of submenu active
               jQuery(this).closest("li").parent().parent().addClass("current-menu-item page_item current_page_item");
            }
        });
    });        
</script>