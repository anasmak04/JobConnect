<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
    protected $redirectTo = '/user';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


    protected function redirectTo()
{
    if (Auth::check()) {
        if (Auth::user()->hasRole('admin')) {
            return '/dashboard/admin/user';
        } elseif (Auth::user()->hasRole('candidate')) {
            return '/candidat/candidat_profile';
        } elseif (Auth::user()->hasRole('representer')) {
            return '/user/' . Auth::id() . '/profile'; // Redirect to the user's profile
        }
    }
    return '/user';
}



}