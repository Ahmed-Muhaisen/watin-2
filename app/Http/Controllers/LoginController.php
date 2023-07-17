<?php

namespace App\Http\Controllers;
use App\Notifications\confirm_emailNotification;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class LoginController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function login_validate(Request $request)
    {

        $validator = Validator::make(request()->all(), [
            'email' => 'required|email|exists:users,email',
            'password' => 'required|string',
        ], [
            'email.required' => 'Please enter your email address.',
            'password.required' => 'Please enter your password.',
            // 'password.min' => 'The password must be at least 8 characters.',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $user = User::where('email', $request->email)->first();

        if (!Hash::check($request->password, $user->password)) {
            $validator->errors()->add('password', 'Password is incorrect!');
            return redirect()->back()->withErrors($validator)
                ->withInput();
        }
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = auth()->user();
        }

        return redirect()->route('index');

        // Continue with Authentication or further processing
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return view('login');
    }
    public function register()
    {
        return view('register');
    }

    public function register_validate(Request $request)
    {
        $validator = Validator::make(request()->all(), [
            'email' => 'required|email',
            'password' => 'required|string|min:8|confirm-password',
            'confirm-password' => 'required|same:password',
            'name' => 'required|string |min:5',
            'phone' => 'required|min:8',
            'address' => 'required|string |min:5',
        ]);



        $user = User::create([
            'name'=>$request->name,
            'password'=>bcrypt($request->password),
            'email'=>$request->email,
            'phone'=>$request->phone,
            'address'=>$request->address
        ]);
        $link='http://127.0.0.1:8000/confirm/'.$user->id.'/dsdvx';
        $user->notify(new confirm_emailNotification($link));
        return redirect()->route('login');

        // Continue with Authentication or further processing
    }


    function confirm($id)
    {
        $user=User::findorfail($id);
        $user->update([
            'email_verified_at'=>date('Y-m-d H:i:s')
            ]
        );
        dd('done');

        return view('confirm');
    }
    function ConfirmPost(Request $request)
    {

        if ($request->confirm_email == Auth::user()->code) {

            User::find(Auth::user()->id)->update([
                'email_verified_at' => Carbon::now()
            ]);
            return redirect()->route('home');
        } else {
            return redirect('confirm')->with('message', "the code incorrect");
        }
    }
    function home()
    {
        return redirect('admin/');
    }
}
