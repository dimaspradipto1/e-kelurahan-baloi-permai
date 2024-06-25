<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Password;
use Laravel\Socialite\Facades\Socialite;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Auth\Events\PasswordReset;

class LoginController extends Controller
{
    public function register()
    {
        return view('pages.auth.register');
    }

    public function registerproses(Request $request)
    {
        User::create([
            'name' => request('name'),
            'email' => request('email'),
            'password' => bcrypt($request->password),
            'remember_token' => Str::random(60),

        ]);
        Alert::success('Success', 'Register Success')->autoclose(3000)->toToast();
        return redirect()->route('login');
    }

    public function login()
    {
        return view('pages.auth.login');
    }

    public function loginproses(Request $request)
    {
        if(Auth::attempt($request->only('email', 'password'))){
            Alert::success('Success', 'Login Success')->autoclose(3000)->toToast();
            return redirect()->route('admin');
        }
        Alert::error('Error', 'Login Failed')->autoclose(3000)->toToast();
        return redirect()->route('login');
    }

    public function forgotpassword()
    {
        
        return view('pages.auth.forgot_password');
    }

    public function passwordemail(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        if($status === Password::RESET_LINK_SENT){
            Alert::success('Success', 'Lupa Password Berhasil di Kirim ke Email')->autoclose(3000)->toToast();
        }else{
            Alert::error('Error', 'Email Tidak Terdaftar')->autoclose(3000)->toToast();
        }

        return back();          

    }
    
    public function resetpassword()
    {
        return view('pages.auth.reset_password');
    }

    public function passwordupdate(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:5|confirmed',
        ]);
      
        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->setRememberToken(Str::random(60));
      
                $user->save();
      
                event(new PasswordReset($user));
            }
        );

        if($status == Password::PASSWORD_RESET){
            Alert::success('Success', 'Password Berhasil di Reset')->autoclose(3000)->toToast();
        }else{
            Alert::error('Error', 'Reset Password Gagal')->autoclose(3000)->toToast();
        }

        return redirect()->route('login');
    }

    public function google()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleProviderCallback()
    {
        $callback = Socialite::driver('google')->user();
        $data = [
            'name' => $callback->getName(),
            'email' => $callback->getEmail(),
            'password' => bcrypt(Str::random(60)),
            'email_verified_at' => date('Y-m-d H:i:s', time()),
        ];
        $data = [
            'name' => $callback->getName(),
            'email' => $callback->getEmail(),
            'roles' => 'admin',
            'email_verified_at' => date('Y-m-d H:i:s', time()),
        ];
        $user = User::firstOrCreate(['email' => $data['email']], $data);
        Auth::login($user, true);
        return redirect(route('admin'));
    }

    public function logout() {
    Auth::logout();
    Alert::success('Success', 'Logout Success')->autoclose(3000)->toToast();
    return redirect()->route('login');
    }
}
