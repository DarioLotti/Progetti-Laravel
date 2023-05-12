<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Announcement;
use Illuminate\Http\Request;

class AnnouncementController extends Controller
{
    public function createAnnouncement(){
        return view('announcement.create');
    }
    
    public function show(Announcement $announcement){
        return view('announcement.show', compact('announcement'));

    }

    public function edit(Announcement $announcement){
        $announcement->setAccepted(NULL);
        return view('announcement/edit', compact('announcement')); 
    }

    public function delete(Announcement $announcement){
        $announcement->delete();
        return redirect(route('homepage'))->with('message', 'Annuncio eliminato con successo!');
    }


    public function indexAnnouncement(){
        $announcements = Announcement::where('is_accepted' , true)-> paginate(8);
        return view('announcement.index', compact('announcements'));
    }
}