<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Mail\WelcomeUserMail;
use App\User;
use Bugsnag\BugsnagLaravel\Facades\Bugsnag;
use Carbon\Carbon;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Event;
use App\Privilege;
use App\Foundation;
use App\Gallery;
use App\News;








class ApiController extends Controller
{

    public function signUp(Request $request) {

        $email = $request->input('email');
        $phone = $request->input('phone');
        $name = $request->input('name');
        $password = $request->input('password');

        if (empty($email)) return response(array("message" => "Email is required"), 400);
        if (empty($phone)) return response(array("message" => "Phone is required"), 400);
        if (empty($password)) return response(array("message" => "Password is required"), 400);


        if (User::where('email', $email)->count() > 0) return response(['message' => 'Email already exists'], 401);
        if (User::where('phone', $phone)->count() > 0) return response(['message' => 'Phone number already exists'], 401);



        try {

            $user = new User();
            $user->name = $name;
            $user->email = $request->input('email');
            $user->phone = $request->input('phone');
            $user->password = bcrypt($request->input('password'));
            $user->save();
            return response(['message' => 'Successful', 'data' => $user], 200);
        } catch (\Exception $exception) {
            return response(array("message" => "Something went wrong."), 500);
        }

    }

    public function events()
    {
        $events = Event::all();
        return response($events);
    }

    public function news()
    {
        $news = News::all();
        return response($news);
    }


    public function privileges()
    {
        $privileges = privilege::all();
        return response($privileges);
    }

    public function gallery()
    {
        $gallery = Gallery::all();
        return response($gallery);
    }

    public function foundation()
    {
        $foundations = Foundation::all();
        return response($foundations);
    }


    public function signIn(Request $request) {


        $username = $request->input('username');
        $password = $request->input('password');

        if (empty($username)) return response(['message' => 'Email or Phone is required'], 400);
        if (empty($password)) return response(['message' => 'password is required'], 400);



        if (User::where('email', $username)->count() > 0) {
            $user = User::where('email', $username)->first();
            if (Auth::attempt(['email' => $username, 'password' => $password])) {
                $authUser = Auth::user();
                $authUser['token'] = $authUser->createToken('Personal Access Token')->accessToken;
                return response(['message' => 'Successful', 'data' => $authUser ], 200);
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



}
