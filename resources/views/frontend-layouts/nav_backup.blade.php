
<div id="main-nav" class="clear-fix">
    <div class="container-fluid">
        <nav id="site-navigation" class="main-navigation" role="navigation">
          <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><i class="fa fa-bars"></i>
            Menu</button>
            <div class="wrap-menu-content">
                <div class="menu-menu1-container">
                    <ul id="primary-menu" class="menu">
                        <li id="menu-item-12" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home current-menu-item page_item page-item-5 current_page_item menu-item-12">
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
                            <a href="{{url('admissions')}}">Admissions Form</a>
                        </li>
                        <li id="menu-item-99" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-99"><a href="#">CBSE Section <span class="caret"></span></a>
                            <ul class="sub-menu">
                                <li id="menu-item-1847" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1847"><a href="{{url('cbsc-information')}}" target="_blank">CBSE Information</a></li>
                                <li id="menu-item-1657" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1657"><a href="{{url('committees')}}">Committees</a></li>
                                <li id="menu-item-1674" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1674"><a href="{{url('transfer-certificate')}}">Transfer Certificate</a></li>
                                <li id="menu-item-1850" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1850"><a href="{{url('auditors-report')}}">Auditor&#8217;s Report</a></li>
                            </ul>
                        </li>
                        <li id="menu-item" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-99">
                            <a href="{{url('contact-us')}}">Contact Us</a>
                        </li> 
                        <li id="menu-item-99" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-99"><a href="#">More</a>
                            <ul class="sub-menu">
                                <li id="menu-item-258" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-258"><a href="{{url('school-gallery')}}">Gallery</a></li>
                                <li id="menu-item-861" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-861"><a href="{{url('openings')}}">Openings</a></li>
                                <li id="menu-item-100" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-100"><a href="{{url('principals-message')}}">Principal’s Message</a></li>
                            </ul>
                        </li>
                        @guest
                            <li id="menu-item-99" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-99">
                                <a class="" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>

                        @else
                        <li id="menu-item-99" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-99"><a href="#"><i class="fa fa-user"></i> <span class="caret"></span> </a>
                            <ul class="sub-menu">
                                <li id="menu-item-258" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-258"><a href="{{route('home')}}">Dashboard</a></li>

                                <li id="menu-item-861" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-861"><a  href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">{{ __('Logout') }}</a></li>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </ul>
                        </li>
                        @endguest  
                    </ul>
                </div>            
            </div><!-- .menu-content -->
        </nav><!-- #site-navigation -->
    </div> <!-- .container -->
</div> <!-- #main-nav -->