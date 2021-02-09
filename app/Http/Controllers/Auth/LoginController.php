<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Auth as FacadesAuth;
use Illuminate\Support\Facades\Session;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(){
    $this->middleware('guest:etablissement')->except('logout');
    $this->middleware('guest:entreprise')->except('logout');
    $this->middleware('guest:etudiant')->except('logout');
    $this->middleware('guest:encadrant')->except('logout');

    $this->middleware('guest:pedagogiquencadrant')->except('logout');
}
    public function Login(Request $request)
    {
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:6'
        ]);

        if (Auth::guard('etablissement')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {

            return redirect()->route('Etablissement.index');
        }

        return back()->withInput($request->only('email', 'remember'));
    }
    public  function log(){

        return view('auth.loginentreprise');
    }

    public function Loginentreprise(Request $request)
    {
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:6'
        ]);

        if (Auth::guard('entreprise')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {

            return redirect()->route('Post.index');
        }

        return back()->withInput($request->only('email', 'remember'));
    }

    public  function logetudiant(){

        return view('auth.loginutilisateur');
    }

    public function loginetudiant(Request $request)
    {


        if (Auth::guard('etudiant')->attempt(['email' => $request->email, 'password' => $request->password])  ) {

            return redirect('voiretudiant');
        }

        return back()->withInput($request->only('email', 'remember'));
    }
    public  function logencadrant(){

        return view('auth.loginencadrant');
    }

    public function loginencadrant(Request $request)
    {
        if (Auth::guard('encadrant')->attempt(['email' => $request->email, 'password' => $request->password])  ) {

            return redirect('voirencadrant');
        }

        return back()->withInput($request->only('email', 'remember'));
    }
    public  function logpedagogique(){

        return view('auth.loginpedagogique');
    }

    public function loginpredagogique(Request $request)
    {
        if (Auth::guard('pedagogiquencadrant')->attempt(['email' => $request->email, 'password' => $request->password])  ) {

            return redirect('voirpedagogique');
        }

        return back()->withInput($request->only('email', 'remember'));
    }




}
