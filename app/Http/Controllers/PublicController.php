<?php

namespace App\Http\Controllers;

use App\Gallery;
use App\Referrer;
use Illuminate\Http\Request;
use App\Referral;

use Illuminate\Support\Facades\Input;

class PublicController extends Controller
{

    public function uploadReferral()
    {

        $referrer = Referrer::find(1);
        echo '<pre>'; print_r(count($referrer->referrals)); echo '</pre>'; exit;

        return view('upload-referral');
    }

    public function postUploadReferral(Request $request){

        // try{

        $referrer = new referrer();
        $referrer->email = $request->input('email');
        $referrer->save();




        $referral      = new referral();
        $referral->referee_name = $request->input('referee_name');;
        $referral->referee_email = $request->input('referee_email');;
        $referral->referee_phone = $request->input('referee_phone');;
        $referral->id = $referrer->id;
        $referral->save();


        $request->session()->flash('success','Referral was Successful.');

        return redirect('upload-referral');

        //   }catch (\Exception $exception){

        //        $request->session()->flash('error','Sorry an error occurred. Please try again');
        //        return redirect( 'upload-gallery');

        //   }


    }

}
