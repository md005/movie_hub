<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Redirect;
use Mail;
use TrueBV\Punycode;
use Illuminate\Support\Facades\Input;

class HomeController extends Controller
{
    /* ------------------- Frontend Home ------------------------ */

    public function index()
    {
        
        $home_content = view('frontend.pages.home_master_content');

        return view('frontend.home_master')
            ->with('home_content',$home_content);

    }


    
    /**
     * for authentication
     */
    public function AuthCheck() {
        $admin_id = Session::get('admin_id');
        if ($admin_id) {
            return;
        } else {
            return Redirect::to('/admin')->send();
        }
    }

}
