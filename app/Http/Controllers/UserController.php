<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserStoreRequest;
use App\Http\Services\GenericService;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller
{
    public function index(Request $request)
    {
//        abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $users = User::all();
        $usercount = User::count();
        return view("admin.user.index", compact("users", "usercount"));
    }


    public function create()
    {
        return view("");
    }

    public function store(UserStoreRequest $request)
    {
             User::create($request->all());
            return redirect()->route("");
    }

    public function edit()
    {
        return redirect()->route("");
    }


    public function update(UserStoreRequest $request, User $user)
    {
        $user->update($request->all());
        return redirect()->route("user.index");
    }


    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route("user.index");
    }





}


