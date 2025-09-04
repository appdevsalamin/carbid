<?php

namespace App\Http\Controllers\Frontend;

use Exception;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Admin\Language;
use App\Models\Admin\SetupPage;
use App\Models\Admin\UsefulLink;
use App\Models\Admin\SiteSections;
use App\Models\Frontend\Subscribe;
use App\Constants\SiteSectionConst;
use App\Http\Controllers\Controller;
use App\Models\Admin\InvestmentPlan;
use App\Models\Frontend\Announcement;
use App\Models\Frontend\ContactRequest;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use App\Providers\Admin\BasicSettingsProvider;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(BasicSettingsProvider $basic_settings)
    {
        $page_title = $basic_settings->get()?->site_name . " | " . $basic_settings->get()?->site_title;

        return view('frontend.index',compact('page_title'));
    }
    /**
     * Method for show the about page
     * @return view
     */
    public function about(){
        $page_title         = __("About Us");
        $page_section       = SetupPage::where('slug','about')->with(['sections' => function($q){
            $q->where('status',true);
        }])->first();

        return view('frontend.pages.about',compact('page_title','page_section'));
    }

    /** 
     * Method for show the how it works page
     * @return view
     */
    public function howItWorks() {
        $page_title = __("How it works");
        $page_section = SetupPage::where('slug','how-it-work')->with(['sections' => function($q){
            $q->where('status',true);
        }])->first();

        return view('frontend.pages.how-works',compact('page_title','page_section'));
    }


    /**     * Method for subscribe to newsletter
     * @param Request $request
     * @return redirect
     */
    public function contact() {
        $page_title = __("Contact Us");
        $page_section = SetupPage::where('slug','contact')->with(['sections' => function($q){
            $q->where('status',true);
        }])->first();

        return view('frontend.pages.contact',compact('page_title','page_section'));
    }


    /**     * Method for subscribe to newsletter
     * @param Request $request
     * @return redirect
     */ 
    public function webJournal() {
        $page_title = __("Web Journal");
        $page_section = SetupPage::where('slug','web-journal')->with(['sections' => function($q){
            $q->where('status',true);
        }])->first();

        return view('frontend.pages.web-journal',compact('page_title','page_section'));
    }

    /**
     * Method for show the web journal details page
     * @param string $slug
     * @return view
     */
    public function webJournalShow($slug) {
         $page_title         = __("Web Journal Details");
        $announceMent = Announcement::where('slug', $slug)->first();

        if (!$announceMent) {
            abort(404, 'Announcement not found');
        }
        return view('frontend.sections.web-journal-details', [
            'announcement' => $announceMent,
            "page_title" => $page_title,
        ]);
    }

    /**
     * Method for subscribe to newsletter
     * @param Request $request
     * @return redirect
     */
    public function subscribe(Request $request) {
        $validator = Validator::make($request->all(),[
            'email'     => "required|string|email|max:255|unique:subscribes",
        ]);

        if($validator->fails()) return redirect('/#subscribe-form')->withErrors($validator)->withInput();

        $validated = $validator->validate();
        try{
            Subscribe::create([
                'email'         => $validated['email'],
                'created_at'    => now(),
            ]);
        }catch(Exception $e) {
            return redirect('/#subscribe-form')->with(['error' => ['Failed to subscribe. Try again']]);
        }

        return redirect(url()->previous() .'/#subscribe-form')->with(['success' => ['Subscription successful!']]);
    }

    public function contactMessageSend(Request $request) {

        $validated = Validator::make($request->all(),[
            'name'      => "required|string|max:255",
            'email'     => "required|email|string|max:255",
            'subject'   => 'required|string',
            'message'   => "required|string|max:5000",
        ])->validate();

        try{
            ContactRequest::create($validated);
        }catch(Exception $e) {
            return back()->with(['error' => ['Failed to send message. Please Try again']]);
        }

        return back()->with(['success' => ['Message send successfully!']]);
    }

    public function usefulLink($slug) {
        $useful_link = UsefulLink::where("slug",$slug)->first();
        if(!$useful_link) abort(404);

        $basic_settings = BasicSettingsProvider::get();

        $app_local = get_default_language_code();
        $page_title = $useful_link->title?->language?->$app_local?->title ?? $basic_settings->site_name;
        
        return view('frontend.pages.useful-link',compact('page_title','useful_link'));
    }


    /**
     * Language switch
     */
    public function languageSwitch(Request $request) {
        $code = $request->target;
        $language = Language::where("code",$code)->first();
        if(!$language) {
            return back()->with(['error' => ['Oops! Language Not Found!']]);
        }
        Session::put('local',$code);
        Session::put('local_dir',$language->dir);

        return back()->with(['success' => ['Language Switch to ' . $language->name ]]);
    }
}
