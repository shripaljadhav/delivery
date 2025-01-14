<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\FrontendData;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return redirect()->route('frontend-section');        
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(LoginRequest $request)
    {
        $request->authenticate();

        $request->session()->regenerate();

        $user = Auth::user();

        if(isset($request->admin_login) && $request->admin_login === "admin_login" ){
            if ($user->hasRole('admin')) {
                return redirect()->route('home');
            } elseif ($user->hasRole('delivery_man')) {
                Auth::logout();
                return redirect()->route('admin-login')->withErrors(__('message.delivery_man_not_login'));       
            }elseif($user->hasRole('client')) {
                Auth::logout();
                return redirect()->route('admin-login')->withErrors(__('message.client_not_login'));       
            }
        }

        if(isset($request->signinModal) && $request->signinModal === "signinModal" ){
            if($user->hasRole('admin')) {
                Auth::logout();
                return redirect()->route('frontend-section')->with('user_type', 'admin');    
            }
            elseif($user->hasRole('delivery_man')) {
                Auth::logout();
                return redirect()->route('frontend-section')->with('user_type', 'delivery_man'); 
            }
            elseif($user->hasRole('client')) {
                return redirect()->route('home')->with('user_type', 'client');
            }
        }

        return redirect(RouteServiceProvider::HOME);
    }

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
