<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Mail\BecomeRevisor;
use App\Models\Announcement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Session;

class RevisorController extends Controller
{
    public function index()
        {
            $announcement_to_check=Announcement::where('is_accepted', null)->first();
            return view('revisor.index',compact('announcement_to_check'));
        }
    public function acceptAnnouncement(Announcement $announcement)
    {
        $announcement->setAccepted(true);
        Session::put('last_announcement_id', $announcement->id);
        return redirect()->back()->with('message','Complimenti,hai acccettato l\'annuncio');

    }
    public function rejectAnnouncement(Announcement $announcement)
    {
        $announcement->setAccepted(false);
        Session::put('last_announcement_id', $announcement->id);
        return redirect()->back()->with('message','Hai rifiutato l\'annuncio');

    }

    public function becomeRevisor(){
        Mail::to('admin@coderilla.it')->send(new BecomeRevisor(Auth::user()));
        return redirect()->back()->with('message','Complimenti,hai richiesto di diventare revisore correttamente');
    }
    public function makeRevisor(User $user){
        Artisan::call('presto:makeUserRevisor',["email"=>$user->email]);
        return redirect('/')->with('message','Complimenti,l\'utente è diventato revisore');
    }

    public function undo()
    {
        $lastAnnouncementId = Session::get('last_announcement_id');

        // recupera l'annuncio precedente e annulla l'ultima operazione
        $lastAnnouncement = Announcement::find($lastAnnouncementId);
        $lastAnnouncement->is_accepted = null;
        $lastAnnouncement->save();

        // rimuovi l'id dell'annuncio dalla sessione
        Session::forget('last_announcement_id');

        // reindirizza alla pagina precedente
        return back();
    }
   
    
}
