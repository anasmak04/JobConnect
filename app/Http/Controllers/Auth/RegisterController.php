<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\Role;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    use RegistersUsers;

    protected $redirectTo = '/login';

    public function __construct()
    {
        $this->middleware('guest');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'role' => ['required', 'string', 'exists:roles,name'],
            'profile_image' => ['sometimes', 'file', 'image', 'max:2048'],
        ]);
    }

    protected function create(array $data)
    {
        Log::info('Creating user', $data);
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        $roleName = $data['role'];
        $role = Role::where('name', $roleName)->first();
        if ($role) {
            $user->roles()->attach($role);
        }

        if (request()->hasFile('profile_image')) {
            $user->addMediaFromRequest('profile_image')->toMediaCollection('profile_images', 'public');
        }


        return $user;
    }



    protected function registered(Request $request, $user)
    {
        if ($user->hasRole('Representer')) {
            return redirect('/representer-complete-info');
        } elseif ($user->hasRole('Candidate')) {
            // Redirect 'Candidat' users to the login page
            return redirect('/candidat/candidat_profile');
        } else {
            return redirect('/login');
        }
    }
    
    
}
