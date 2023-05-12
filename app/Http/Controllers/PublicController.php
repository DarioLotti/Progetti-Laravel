<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Category;
use App\Models\Announcement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PublicController extends Controller
{
    
    public function homepage()
    {
        $announcements= Announcement::where('is_accepted', true)->take(6)->get()->sortByDesc('created_at');
        return view('welcome', compact('announcements'));
    }

    public function categoryShow(Category $category){   
        return view('announcement/categoryShow',compact('category'));
        
    }

    public function searchAnnouncement(Request $request){
        $announcements= Announcement::search($request->searched)->where('is_accepted',true)->paginate(10);
        return view('announcement.index',compact('announcements'));
    }

    public function setLanguage($lang){
        session()->put('locale', $lang);
        return redirect()->back();
    }

    public function aboutUs(){
        return view('aboutUs');
    } 

}