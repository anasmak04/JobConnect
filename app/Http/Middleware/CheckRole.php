<?php

namespace App\Http\Middleware;


use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
//    public function handle(Request $request, Closure $next)
//    {
//        $user = Auth::user();
//
//        if ($user) {
//            if ($user->hasRole('Admin')) {
//                return redirect('/dashboard/user');
//            } elseif ($user->hasRole('user')) {
//                return redirect('/user/profile');
//            } elseif ($user->hasRole('representer')) {
//                return redirect('/representer/dashboard');
//            }
//        }
//
//        return $next($request);
//    }

}
