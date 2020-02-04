<?php

namespace App\Http\Controllers;

use App\Referral;
use App\Referrer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class ReferralController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('upload-referral');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $referrer = Referrer::firstOrNew(
            [
                'email' => $request->referrer_email
            ],
            [
                'name'  => $request->referrer_name,
                'email' => $request->referrer_email
            ]
        );
        $validator = Validator::make($request->all(), [
            'name'  => 'required|max:75|min:3',
            'email' =>
                [
                    'required',
                    'email',
                    Rule::unique('referrers')->ignore($referrer),
                ]
        ]);
        if ($validator->fails()) {

            $request->session()->flash('error', 'Referral was Limit Exceeded.');

        } else {

            $referrer->save();

        }


        if (count($referrer->referrals) < 3) {
            $referrer->email = $request->referrer_email;
            $referrer->name = $request->referrer_name;
            $referrer->save();

            $referral = new referral();
            $referral->name = $request->referee_name;
            $referral->email = $request->referee_email;
//        $referral->referee_phone = $request->input('referee_phone');;
            $referral->referrer_id = $referrer->id;
            $referral->save();
        } else {
            $request->session()->flash('error', 'Referral was Limit Exceeded.');
        }


        $request->session()->flash('success', 'Referral was Successful.');

        return redirect('referral-create');

        //   }catch (\Exception $exception){

        //        $request->session()->flash('error','Sorry an error occurred. Please try again');
        //        return redirect( 'upload-gallery');

        //   }

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
