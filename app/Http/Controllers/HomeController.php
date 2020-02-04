<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use App\Privilege;
use App\Foundation;
use App\Image;
use App\News;
use App\Gallery;
use App\Meetup;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */


    public function index()
    {
        $foundations = foundation::all();
        $privileges = privilege::all();
        $events = event::all();
        $users = User::all();
        return view('home',[
            'foundations' => $foundations,
            'privileges' => $privileges,
             'events' => $events,
             'users'  => $users
        ]);
    }

    public function uploadEvent()
    {
        return view('upload-event');
    }

    public function postUploadEvent(Request $request){

        // try{

        $event = new event();
        $event->name = $request->input('name');
        $event->location = $request->input('location');
        $event->desc = $request->input('desc');
        $event->paymenturl = $request->input('paymenturl');
        $event->rsvpurl = $request->input('rsvpurl');
        $event->date = $request->input('date');

        if($request->hasFile('image')){
            $file = $request->file('image') ;
            $fileName = $file->getClientOriginalName() ;
            $file->move("uploads", $fileName);
            $event->image = url('uploads/'.$fileName );
        }
        $event->save();






        $request->session()->flash('success','event Added.');

        return redirect('upload-event');

        //   }catch (\Exception $exception){

        //        $request->session()->flash('error','Sorry an error occurred. Please try again');
        //        return redirect( 'upload-event');

        //   }


    }

    public function uploadNews()
    {
        return view('upload-news');
    }

    public function postUploadNews(Request $request){

        // try{

        $news = new news();
        $news->name = $request->input('name');
        $news->desc = $request->input('desc');


        if($request->hasFile('image')){
            $file = $request->file('image') ;
            $fileName = $file->getClientOriginalName() ;
            $file->move("uploads", $fileName);
            $news->image = url('uploads/'.$fileName );
        }

        if($request->hasFile('image2')){
            $file = $request->file('image2') ;
            $fileName = $file->getClientOriginalName() ;
            $file->move("uploads", $fileName);
            $news->image2 = url('uploads/'.$fileName );
        }


        $news->save();

        $request->session()->flash('success','news Added.');

        return redirect('upload-news');

        //   }catch (\Exception $exception){

        //        $request->session()->flash('error','Sorry an error occurred. Please try again');
        //        return redirect( 'upload-news');

        //   }


    }

    public function uploadPrivilege()
    {
        return view('upload-privilege');
    }

    public function postUploadPrivilege(Request $request){

        // try{

        $privilege = new privilege();
        $privilege->name = $request->input('name');
        $privilege->desc = $request->input('desc');
        $privilege->type = $request->input('type');
        $privilege->code = $request->input('code');

        if($request->hasFile('image')){
            $file = $request->file('image') ;
            $fileName = $file->getClientOriginalName() ;
            $file->move("uploads", $fileName);
            $privilege->image = url('uploads/'.$fileName );
        }

        $privilege->save();


        $request->session()->flash('success','privilege Added.');

        return redirect('upload-privilege');

        //   }catch (\Exception $exception){

        //        $request->session()->flash('error','Sorry an error occurred. Please try again');
        //        return redirect( 'upload-privilege');

        //   }


    }

    public function uploadFoundation()
    {
        return view('upload-foundation');
    }

    public function postUploadFoundation(Request $request){

        // try{

        $foundation = new foundation();
        $foundation->name = $request->input('name');
        $foundation->desc = $request->input('desc');
        $foundation->paymenturl = $request->input('paymenturl');

        if($request->hasFile('image')){
            $file = $request->file('image') ;
            $fileName = $file->getClientOriginalName() ;
            $file->move("uploads", $fileName);
            $foundation->image = url('uploads/'.$fileName );
        }

        $foundation->save();


        $request->session()->flash('success','foundation Added.');

        return redirect('upload-foundation');

        //   }catch (\Exception $exception){

        //        $request->session()->flash('error','Sorry an error occurred. Please try again');
        //        return redirect( 'upload-foundation');

        //   }


    }

    public function uploadGallery()
    {
        return view('upload-gallery');
    }

    public function postUploadGallery(Request $request){

        // try{

        $gallery = new gallery();
        $gallery->name = $request->input('name');
        $gallery->desc = $request->input('desc');

        if($request->hasFile('image')){
            $file = $request->file('image') ;
            $fileName = $file->getClientOriginalName() ;
            $file->move("uploads", $fileName);
            $gallery->image = url('uploads/'.$fileName );
        }

        if($request->hasFile('image2')){
            $file = $request->file('image2') ;
            $fileName = $file->getClientOriginalName() ;
            $file->move("uploads", $fileName);
            $gallery->image2 = url('uploads/'.$fileName );
        }

        if($request->hasFile('image3')){
            $file = $request->file('image3') ;
            $fileName = $file->getClientOriginalName() ;
            $file->move("uploads", $fileName);
            $gallery->image3 = url('uploads/'.$fileName );
        }





        $gallery->save();


        $request->session()->flash('success','gallery Added.');

        return redirect('upload-gallery');

        //   }catch (\Exception $exception){

        //        $request->session()->flash('error','Sorry an error occurred. Please try again');
        //        return redirect( 'upload-gallery');

        //   }


    }


    public function galleryTable()
    {
        $gallery = gallery::latest()->paginate(20);
        return view('gallery-table',[
            'gallery'=> $gallery
        ]);


    }

    public function eventsTable()
    {

        $events = event::latest()->paginate(20);
        return view('events-table',[
            'events'=> $events
        ]);


    }

    public function newsTable()
    {

        $news = news::all();
        return view('news-table',[
            'news'=> $news
        ]);


    }

    public function foundationsTable()
    {

        $foundations = foundation::latest()->paginate(20);
        return view('foundations-table',[
            'foundations'=> $foundations
        ]);


    }

    public function privilegesTable()
    {

        $privileges = privilege::latest()->paginate(20);
        return view('privileges-table',[
            'privileges'=> $privileges
        ]);


    }

    public function deletePrivilege(Request $request, $pid)
    {
        privilege::destroy($pid);

        $request->session()->flash('success','Privilege Deleted.');
        return redirect('privileges-table');
    }

    public function deleteFoundation(Request $request,$fid)
    {
        foundation::destroy($fid);

        $request->session()->flash('success','Foundation Deleted.');
        return redirect('foundations-table');
    }


    public function deleteEvent(Request $request, $eid)
    {
        event::destroy($eid);

        $request->session()->flash('success','Event Deleted.');
        return redirect('events-table');
    }

    public function deleteGallery(Request $request,$gid)
    {
        gallery::destroy($gid);

        $request->session()->flash('success','Gallery Deleted.');
        return redirect('gallery-table');
    }

    public function deleteNews(Request $request,$nid)
    {
        news::destroy($nid);

        $request->session()->flash('success','News Deleted.');
        return redirect('news-table');
    }

    public function settings()
    {
        return view('settings');
    }

    public function postSettings(Request $request)
    {
        try{
            $user = User::find(Auth::user()->uid);
            $user->name = $request->input('name');
            $user->phone = $request->input('phone');
            $user->save();
            $request->session()->flash('success','Profile Updated');
        } catch(\Exception $exception){
            $request->session()->flash('error','Sorry An Error Occurred.');
        }

        return redirect('settings');
    }


    public function logout() {
        Auth::logout();
        return redirect('/');
    }

}
