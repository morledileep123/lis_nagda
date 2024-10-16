@include('frontend-layouts.main')

<div class="rev-slider">
	<div id="content" class="site-content"><div class="container"><div class="inner-wrapper">    
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
            <article id="post-1670" class="post-1670 page type-page status-publish hentry">
            	<header class="entry-header">
            		<h1 class="entry-title">Transfer Certificate</h1>	</header><!-- .entry-header -->
            	       <div class="entry-content">
                		<h3>Enter the Admission Number</h3>
                            <div id='ajaxsearchlite1' class="wpdreams_asl_container asl_w asl_m asl_m_1">
                            <div class="probox">
                            <div class='promagnifier'>
                                        <div class='innericon'>
                                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="512px" height="512px" viewBox="0 0 512 512" enable-background="new 0 0 512 512" xml:space="preserve">
                                        <path id="magnifier-2-icon" d="M460.355,421.59L353.844,315.078c20.041-27.553,31.885-61.437,31.885-98.037
                                            C385.729,124.934,310.793,50,218.686,50C126.58,50,51.645,124.934,51.645,217.041c0,92.106,74.936,167.041,167.041,167.041
                                            c34.912,0,67.352-10.773,94.184-29.158L419.945,462L460.355,421.59z M100.631,217.041c0-65.096,52.959-118.056,118.055-118.056
                                            c65.098,0,118.057,52.959,118.057,118.056c0,65.096-52.959,118.056-118.057,118.056C153.59,335.097,100.631,282.137,100.631,217.041
                                            z"/>
                                    </svg>
                                </div>
                            </div>

                             <div class='prosettings'  data-opened=0>
                                        <div class='innericon'>
                                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="512px" height="512px" viewBox="0 0 512 512" enable-background="new 0 0 512 512" xml:space="preserve">
                                        <polygon id="arrow-25-icon" transform = "rotate(90 256 256)" points="142.332,104.886 197.48,50 402.5,256 197.48,462 142.332,407.113 292.727,256 "/>
                                    </svg>
                                </div>
                            </div >

                            <div class='proinput'>
                                <form autocomplete="off" aria-label='Ajax search form'>
                                    <input aria-label='Search input' type='search' class='orig' name='phrase' placeholder='Search here' value='' autocomplete="off" />
                                    <input aria-label='Autocomplete input, do not use this' type='text' class='autocomplete' name='phrase' value='' autocomplete="off"/>
                                    <span class='loading'></span>
                                    <input type='submit' value="Start search" style='width:0; height: 0; visibility: hidden;' class="cert_search">
                                </form>
                            </div>

                            <div class='proloading'>
                                <div class="asl_loader">
                                    <div class="asl_loader-inner asl_simple-circle"></div>
                                </div>
                            </div>
                            <div class='proclose'>
                                <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
                                         y="0px"
                                         width="512px" height="512px" viewBox="0 0 512 512" enable-background="new 0 0 512 512"
                                         xml:space="preserve">
                                <polygon id="x-mark-icon" points="438.393,374.595 319.757,255.977 438.378,137.348 374.595,73.607 255.995,192.225 137.375,73.622 73.607,137.352 192.246,255.983 73.622,374.625 137.352,438.393 256.002,319.734 374.652,438.378 "/></svg>
                            </div>
                        </div>
                    </div>
        <div class="transfer_certificate"></div>
        <div class="alert-danger error" style="display: none;">This Student not exist...</div>

 
{{--           <div id='ajaxsearchlitesettings1' class="searchsettings wpdreams_asl_settings asl_w asl_s asl_s_1">
                <form name='options' autocomplete='off'>

        
                <fieldset class="asl_sett_scroll">
            <legend style="display: none;">Generic selectors</legend>
            <div class="asl_option_inner hiddend">
                <input type='hidden' name='qtranslate_lang' id='qtranslate_lang'
                       value='0'/>
            </div>

	        
            
            <div class="asl_option hiddend">
                <div class="asl_option_inner">
                    <input type="checkbox" value="checked" id="set_exactonly1"
                           title="Exact matches only"
                           name="set_exactonly" />
                    <label for="set_exactonly1">Exact matches only</label>
                </div>
                <div class="asl_option_label">
                    Exact matches only                </div>
            </div>
            <div class="asl_option hiddend">
                <div class="asl_option_inner">
                    <input type="checkbox" value="None" id="set_intitle1"
                           title="Search in title"
                           name="set_intitle" />
                    <label for="set_intitle1">Search in title</label>
                </div>
                <div class="asl_option_label">
                    Search in title                </div>
            </div>
            <div class="asl_option hiddend">
                <div class="asl_option_inner">
                    <input type="checkbox" value="None" id="set_incontent1"
                           title="Search in content"
                           name="set_incontent" />
                    <label for="set_incontent1">Search in content</label>
                </div>
                <div class="asl_option_label">
                    Search in content                </div>
            </div>
            <div class="asl_option_inner hiddend">
                <input type="checkbox" value="None" id="set_inexcerpt1"
                       title="Search in excerpt"
                       name="set_inexcerpt"  checked="checked"/>
                <label for="set_inexcerpt1">Search in excerpt</label>
            </div>

            <div class="asl_option">
                <div class="asl_option_inner">
                    <input type="checkbox" value="None" id="set_inposts1"
                           title="Search in posts"
                           name="set_inposts"  checked="checked"/>
                    <label for="set_inposts1">Search in posts</label>
                </div>
                <div class="asl_option_label">
                    Search in posts                </div>
            </div>
            <div class="asl_option hiddend">
                <div class="asl_option_inner">
                    <input type="checkbox" value="None" id="set_inpages1"
                           title="Search in pages"
                           name="set_inpages"  checked="checked"/>
                    <label for="set_inpages1">Search in pages</label>
                </div>
                <div class="asl_option_label">
                    Search in pages                
                </div>
            </div>
            </fieldset>
        </form>
</div>
<div id='ajaxsearchliteres1' class='vertical wpdreams_asl_results asl_w asl_r asl_r_1'>
    <div class="results">
            <div class="resdrg">
            </div>
    </div>
</div>
    <div id="asl_hidden_data">
        <svg style="position:absolute" height="0" width="0">
            <filter id="aslblur">
                <feGaussianBlur in="SourceGraphic" stdDeviation="4"/>
            </filter>
        </svg>
        <svg style="position:absolute" height="0" width="0">
            <filter id="no_aslblur"></filter>
        </svg>

    </div>
 <div class="asl_init_data wpdreams_asl_data_ct" style="display:none !important;" id="asl_init_id_1" data-asldata="ew0KICAgICJob21ldXJsIjogImh0dHA6Ly9saXNuYWdkYS5vcmcvIiwNCiAgICAicmVzdWx0c3R5cGUiOiAidmVydGljYWwiLA0KICAgICJyZXN1bHRzcG9zaXRpb24iOiAiaG92ZXIiLA0KICAgICJpdGVtc2NvdW50IjogNCwNCiAgICAiaW1hZ2V3aWR0aCI6IDcwLA0KICAgICJpbWFnZWhlaWdodCI6IDcwLA0KICAgICJyZXN1bHRpdGVtaGVpZ2h0IjogIjcwcHgiLA0KICAgICJzaG93YXV0aG9yIjogMCwNCiAgICAic2hvd2RhdGUiOiAwLA0KICAgICJzaG93ZGVzY3JpcHRpb24iOiAwLA0KICAgICJjaGFyY291bnQiOiAgNSwNCiAgICAiZGVmYXVsdEltYWdlIjogImh0dHA6Ly9saXNuYWdkYS5vcmcvd3AtY29udGVudC9wbHVnaW5zL2FqYXgtc2VhcmNoLWxpdGUvaW1nL2RlZmF1bHQuanBnIiwNCiAgICAiaGlnaGxpZ2h0IjogMCwNCiAgICAiaGlnaGxpZ2h0d2hvbGV3b3JkcyI6IDEsDQogICAgInNjcm9sbFRvUmVzdWx0cyI6IDAsDQogICAgInJlc3VsdGFyZWFjbGlja2FibGUiOiAxLA0KICAgICJhdXRvY29tcGxldGUiOiB7DQogICAgICAgICJlbmFibGVkIiA6IDEsDQogICAgICAgICJsYW5nIiA6ICJlbiINCiAgICB9LA0KICAgICJ0cmlnZ2Vyb250eXBlIjogMSwNCiAgICAidHJpZ2dlcl9vbl9jbGljayI6IDAsDQogICAgInRyaWdnZXJfb25fZmFjZXRfY2hhbmdlIjogMSwNCiAgICAic2V0dGluZ3NpbWFnZXBvcyI6ICJyaWdodCIsDQogICAgImhyZXN1bHRhbmltYXRpb24iOiAiZngtbm9uZSIsDQogICAgInZyZXN1bHRhbmltYXRpb24iOiAiZngtbm9uZSIsDQogICAgImhyZXN1bHRoaWRlZGVzYyI6ICIxIiwNCiAgICAicHJlc2NvbnRhaW5lcmhlaWdodCI6ICI0MDBweCIsDQogICAgInBzaG93c3VidGl0bGUiOiAiMCIsDQogICAgInBzaG93ZGVzYyI6ICIxIiwNCiAgICAiY2xvc2VPbkRvY0NsaWNrIjogMSwNCiAgICAiaWlmTm9JbWFnZSI6ICJkZXNjcmlwdGlvbiIsDQogICAgImlpUm93cyI6IDIsDQogICAgImlpdGVtc1dpZHRoIjogMjAwLA0KICAgICJpaXRlbXNIZWlnaHQiOiAyMDAsDQogICAgImlpc2hvd092ZXJsYXkiOiAxLA0KICAgICJpaWJsdXJPdmVybGF5IjogMSwNCiAgICAiaWloaWRlQ29udGVudCI6IDEsDQogICAgImlpYW5pbWF0aW9uIjogIjEiLA0KICAgICJhbmFseXRpY3MiOiAwLA0KICAgICJhbmFseXRpY3NTdHJpbmciOiAiIiwNCiAgICAicmVkaXJlY3RvbmNsaWNrIjogMSwNCiAgICAicmVkaXJlY3RDbGlja1RvIjogInJlc3VsdHNfcGFnZSIsDQogICAgInJlZGlyZWN0Q2xpY2tMb2MiOiAic2FtZSIsDQogICAgInJlZGlyZWN0X29uX2VudGVyIjogMSwNCiAgICAicmVkaXJlY3RFbnRlclRvIjogInJlc3VsdHNfcGFnZSIsDQogICAgInJlZGlyZWN0RW50ZXJMb2MiOiAic2FtZSIsDQogICAgInJlZGlyZWN0X3VybCI6ICI/cz17cGhyYXNlfSIsDQogICAgIm92ZXJyaWRld3BkZWZhdWx0IjogMCwNCiAgICAib3ZlcnJpZGVfbWV0aG9kIjogImdldCINCn0NCg=="></div> --}}
<p>
<!--

<form><input class="banner-text-box" name="banner_search" placeholder="search"type="search">

<input class="banner-text-btn" name="" type="submit" value="SEARCH">

</form>

--></p>
</div><!-- .entry-content -->


<!--Generated by Endurance Page Cache-->

    <footer class="entry-footer">
    </footer><!-- .entry-footer -->
</article><!-- #post-## -->                 
</main><!-- #main -->
</div><!-- #primary -->

<div id="sidebar-primary" class="widget-area" role="complementary">
</div><!-- #sidebar-primary -->


</div><!-- .inner-wrapper -->
</div><!-- .container -->
</div><!-- #content -->
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $('.innericon').on('click',function(){
            var admission_no = $('.orig').val();
            alert("working mode");
            if(admission_no){
                $.ajax({
                   url:'{{url('get_student_cert')}}',
                   type: 'POST',
                    data: {admission_no:admission_no, "_token": "{{ csrf_token() }}"},
                   success:function(data) {
                    if(data){
                        $('.transfer_certificate').html(data);
                    }else if(error){
                        $('.error').show();
                        // alert('Student not exist....')
                    }    
                   }
                });
            }
        })

    });

</script>
@include('frontend-layouts.footer')
