<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\setting\SlideBar;
use App\Models\setting\HeaderBar;
use App\Models\setting\Settings;
use App\Models\setting\Footer;
use App\Models\setting\Pages;
use App\Models\setting\PagesImage;
use App\Models\setting\HomeContents;

use Session;
class FrontendHome extends Controller
{
   public function slideBar(){
        $slideBars = SlideBar::get();
        $headerBarDatas = HeaderBar::first();
        $settingsDatas = Settings::first();
        $footerDatas = Footer::with('footerImages')->get();
        $pagesDatas = Pages::with('pageImages')->get();
        $homeContents = HomeContents::get();
        // dd($pagesDatas);
        Session::put([
        	'header_bar_email'=> $headerBarDatas->header_bar_email,
        	'header_bar_mobile'=> $headerBarDatas->header_bar_mobile,
        	'site_title'=> $settingsDatas->title,
        	'site_website'=> $settingsDatas->website,
        	'site_logo'=> $settingsDatas->logo,
        	'cbse_aff_no'=> $settingsDatas->cbse_aff_no,
        	'footer_content'=>$footerDatas
        ]);
        // return session('footer_content');
        return view('frontend.home.index',compact('slideBars','pagesDatas','homeContents'));
            
    }
    // public function headerBar(){
    //     $headerBarDatas = HeaderBar::first();
    //     return view('frontend-layouts.header',compact('headerBarDatas'));
    // } 
}
