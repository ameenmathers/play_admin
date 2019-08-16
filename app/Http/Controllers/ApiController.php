<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\ProcessTransactions;
use App\Events\UserForgotPassword;
use App\Mail\WelcomeUserMail;
use App\notification;
use App\passwordRestCode;
use App\payment;
use App\transaction;
use App\User;
use Bugsnag\BugsnagLaravel\Facades\Bugsnag;
use Carbon\Carbon;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use PassowrdResetCode;
use App\Event;
use App\Privilege;
use App\Foundation;





class ApiController extends Controller
{

    public function signUp(Request $request) {

        $email = $request->input('email');
        $phone = $request->input('phone');
        $name = $request->input('name');

        if (empty($email)) return response(array("message" => "Email is required"), 400);
        if (empty($phone)) return response(array("message" => "Phone is required"), 400);

        if (User::where('email', $email)->count() > 0) return response(['message' => 'Email already exists'], 401);
        if (User::where('phone', $phone)->count() > 0) return response(['message' => 'Phone number already exists'], 401);

        if (empty($name)) $name = "Customer";


        try {

            $user = new User();
            $user->name = $name;
            $user->email = $request->input('email');
            $user->phone = $request->input('phone');
            $user->password = bcrypt($request->input('password'));
            $user->save();
            event(new WelcomeUserMail($user));
            return response(['message' => 'Successful', 'data' => $user], 200);
        } catch (\Exception $exception) {
            Bugsnag::notifyException($exception);
            return response(array("message" => "Something went wrong."), 500);
        }

    }


    public function signIn(Request $request) {


        $username = $request->input('username');
        $password = $request->input('password');

        if (empty($username)) return response(['message' => 'Email or Phone is required'], 400);
        if (empty($password)) return response(['message' => 'password is required'], 400);


        $user = User::where('email', $username)->first();
        if (count($user) > 0) {
            if (Auth::attempt(['email' => $username, 'password' => $password])) {
                $authUser = Auth::user();
                $success['token'] = $authUser->createToken('Personal Access Token')->accessToken;
                return response(['message' => 'Successful', 'data' => $authUser, 'authorization_token' => $success], 200);
            } else {
                return response(['message' => 'error, username and password do not match'], 401);
            }
        } else {
            $user = User::where('phone', $username)->first();
            if (count($user) > 0) {
                if (Auth::attempt(['phone' => $username, 'password' => $password])) {
                    $authUser = Auth::user();

                    $success['token'] = $authUser->createToken('Personal Access Token')->accessToken;
                    return response(['message' => 'Successful', 'data' => $authUser, 'authorization_token' => $success], 200);
                } else {
                    return response(['message' => 'Wrong Credentials'], 401);
                }
            }
            return response(['message' => 'User does not exist. Create an Account'], 401);
        }
    }

    public function profile(Request $request) {
        $user = User::find($request->user()->uid);
        try {
            $user->Events;
        } catch (\Exception $exception) {
        }
        try {
            $user->Privileges;
        } catch (\Exception $exception) {
        }
        return response(['message' => 'Successful', 'data' => $user], 200);
    }

    public function changePassword(Request $request) {

        $oldPassword = $request->input('current_password');
        $newPassword = $request->input('new_password');
        $email = $request->input('email');

        if (empty($email)) return response(['message' => 'Email is required'], 400);
        if (empty($newPassword)) return response(['message' => 'A New Password is required'], 400);
        if (empty($oldPassword)) return response(['message' => 'Current password is required'], 400);

        if (User::where('email', $email)->count() <= 0) return response(array("message" => "Email does not exist"), 400);


        $user = User::where('email', $email)->first();
        if (password_verify($oldPassword, $user->password)) {
            $user->password = bcrypt($newPassword);
            $user->save();
            return response(['message' => 'Successful'], 200);
        } else {
            return response([
                'message' => 'Current password is wrong.'
            ], 401);
        }

    }



    public function addevent(Request $request) {

        $uid = $request->user()->uid;
        $name = $request->input('name');
        $eventNumber = $request->input('event_number');
        $distributionCompany = $request->input('distribution_company');
        $type = $request->input('type');


        if ($request->hasFile('image')) {
            $image = $request->file('image');

            $rand = $uid . Str::random(5) . \Carbon\Carbon::now()->timestamp;

            $fileName = $image->getClientOriginalName();

            $filepath = 'uploads/event_images/' . $rand . $fileName;

            Storage::disk('public')->put($filepath, file_get_contents($image));

            $imageUrl = asset("storage/" . $filepath);

        } else $imageUrl = url('images/default.png');


        if (empty($name)) return response(['message' => 'Name is required'], 400);
        if (empty($desc)) return response(['message' => 'Description is required'], 400);


        $event = new event();
        $event->uid = $uid;
        $event->image = $imageUrl;
        $event->name = $name;
        $event->desc = $desc;
        $event->save();

        return response(['message' => 'Successful', 'data' => $event], 200);

    }


}
