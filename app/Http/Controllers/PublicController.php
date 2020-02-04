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
        return view('upload-referral');
    }

    public function postUploadReferral(Request $request){

        // try{


        $referrer = new referrer();

        if(count($referrer->referrals) >= 3) {


            $referrer->email = $request->input('email');
            $referrer->save();

            $referral      = new referral();
            $referral->referee_name = $request->input('referee_name');;
            $referral->referee_email = $request->input('referee_email');;
            $referral->referee_phone = $request->input('referee_phone');;
            $referral->referrer_id = $referrer->id;
            $referral->save();

            $request->session()->flash('success','Referral was Successful.');

        } else {



            $request->session()->flash('error','Referral was Limit Exceeded.');

          }







        return redirect('upload-referral');

        //   }catch (\Exception $exception){

        //        $request->session()->flash('error','Sorry an error occurred. Please try again');
        //        return redirect( 'upload-gallery');

        //   }


    }

}
