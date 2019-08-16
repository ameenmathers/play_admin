<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use App\Privilege;
use App\Foundation;
use App\Image;
use App\News;

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
        return view('home');
    }

    public function uploadEvent()
    {
        return view('upload-event');
    }

    public function postUploadEvent(Request $request){

        // try{

        $event = new event();
        $event->name = $request->input('name');
        $event->price = $request->input('price');
        $event->desc = $request->input('desc');
        $event->save();

        foreach ( $request->file( 'images' ) as $item ) {
            $rand          = Str::random( 2 );
            $inputFileName = $item->getClientOriginalName();
            $item->move( "uploads", $rand . $inputFileName );

            $image      = new image();
            $image->url = url( 'uploads/' . $rand . $inputFileName );
            $image->eid = $event->eid;
            $image->uid = Auth::user()->uid;
            $image->save();
        }

        $request->session()->flash('success','event Added.');

        return redirect('upload-event');

        //   }catch (\Exception $exception){

        //        $request->session()->flash('error','Sorry an error occurred. Please try again');
        //        return redirect( 'upload-event');

        //   }


    }

    public function uploadNews()
    {
        return view('upload-event');
    }

    public function postUploadNews(Request $request){

        // try{

        $news = new news();
        $news->name = $request->input('name');
        $news->desc = $request->input('desc');
        $news->save();

        foreach ( $request->file( 'images' ) as $item ) {
            $rand          = Str::random( 2 );
            $inputFileName = $item->getClientOriginalName();
            $item->move( "uploads", $rand . $inputFileName );

            $image      = new image();
            $image->url = url( 'uploads/' . $rand . $inputFileName );
            $image->nid = $news->nid;
            $image->uid = Auth::user()->uid;
            $image->save();
        }

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
        $privilege->save();

        foreach ( $request->file( 'images' ) as $item ) {
            $rand          = Str::random( 2 );
            $inputFileName = $item->getClientOriginalName();
            $item->move( "uploads", $rand . $inputFileName );

            $image      = new image();
            $image->url = url( 'uploads/' . $rand . $inputFileName );
            $image->pid = $privilege->pid;
            $image->uid = Auth::user()->uid;
            $image->save();
        }

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
        $foundation->save();

        foreach ( $request->file( 'images' ) as $item ) {
            $rand          = Str::random( 2 );
            $inputFileName = $item->getClientOriginalName();
            $item->move( "uploads", $rand . $inputFileName );

            $image      = new image();
            $image->url = url( 'uploads/' . $rand . $inputFileName );
            $image->fid = $foundation->fid;
            $image->uid = Auth::user()->uid;
            $image->save();
        }

        $request->session()->flash('success','foundation Added.');

        return redirect('upload-foundation');

        //   }catch (\Exception $exception){

        //        $request->session()->flash('error','Sorry an error occurred. Please try again');
        //        return redirect( 'upload-foundation');

        //   }


    }

}
