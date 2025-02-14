<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();
		
		if (Auth::user()->role_id == 979) {
			return redirect(route('admin.dashboard'));
		}
		
		if (Auth::user()->role_id == 797) {
			return redirect(route('subadmin.dashboard'));
		}
		
		if (Auth::user()->role_id == 1) {
			return redirect(route('user.dashboard'));
		}

        return redirect()->intended(route('index', absolute: false));
    }

    /**
     * Destroy an authenticated session.
     */
   
       public function destroy(Request $request): RedirectResponse
{
   
    $request->session()->flush();

    
    Auth::guard('web')->logout();

    
    $request->session()->invalidate();

   
    $request->session()->regenerateToken();

  
    $cookie = \Cookie::forget('laravel_session');
    return redirect('/')->withCookie($cookie);
}


    
}
