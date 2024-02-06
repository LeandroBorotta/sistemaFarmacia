<?php

namespace App\Http\Controllers;

use App\Http\Requests\ResetPassword;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use App\Mail\ForgotPasswordMail;
use App\Http\Requests;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        return view('auth.login');
    }

    public function login_post(Request $request)
    {
        // dd($request->all());

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password], true)) {

            if (Auth::User()->is_role == 1) {
                return redirect()->intended('admin/dashboard');
            } else {
                return redirect()->back()->with('error', 'Por favor, introduz as credencias corretas');
            }
        } else {
            return redirect()->back()->with('error', 'Por favor, introduz as credencias corretas');
        }
    }

    public function forgot()
    {
        return view('auth.forgot');
    }

    public function forgot_post(Request $request)
    {
        // dd($request->all());
        $count = User::where('email', '=', $request->email)->count();
        if ($count > 0) {
            $user = User::where('email', '=', $request->email)->first();
            $user->remember_token = Str::random(50);
            $user->save();

            // Para o email começamos aqui. PONTO 1. Depois fomos no App\Mail\ForgotPasswordMail (criamos)
            Mail::to($user->email)->send(new ForgotPasswordMail($user));

            return redirect()->back()->with('success', 'A palavra-passe foi reposta Por favor, verifique a sua pasta de SPAM ou lixo eletrônico');
        } else {
            return redirect()->back()->withInput()->with('error', 'Email não encontrado no sistema');
        }
    }

    public function getReset($token)
    {
        //  dd($token);
        if (Auth::check()) {
            return redirect('admin/dashboard');
        }

        $user = User::where('remember_token', '=', $token);
        if ($user->count() == 0) {
            abort(403);
        }
        $user = $user->first();
        $data['token'] = $token;

        return view('auth.reset', $data);
    }

    public function postReset($token, ResetPassword $request)
    {

        $user = User::where('remember_token', '=', $token);
        if ($user->count() == 0) {
            abort(403);
        }

        $user = $user->first();
        $user->password = Hash::make($request->password);
        $user->remember_token = Str::random(50);
        $user->save();

        return redirect('/')->with('success', 'A palavra-passe foi redifinida');
    }

    public function logout()
    {
        Auth::logout();
        return redirect(url('/'));
    }
}
