<?php

namespace App\Http\Controllers;

use App\Like;
use App\Tag;
use App\Post;
use App\User;
use Auth;
use Gate;
use Password;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails as PasswordReset;

class UserController extends Controller
{
    public function getUsersAdmin()
    {
        $users = User::orderBy('id', 'asc')->paginate(10);
        return view('admin.users.index', ['users' => $users]);
    }

    public function getUserProfile($id)
    {
        $user = User::where('id', $id)->with(['posts' => function ($query) {
            $query->where('published',true);
        }])->first();
        return view('user.profile', ['user' => $user]);
    }

    public function getUserCreate()
    {
        return view('admin.users.create');
    }

    public function getUserEdit($id)
    {
        $user = User::find($id);
        return view('admin.users.edit', ['user' => $user, 'userId' => $id]);
    }

    public function postUserCreate(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
        ]);
        $newUser = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt(str_random(8)),
        ];
        User::create($newUser);
        Password::sendResetLink($newUser);
        return redirect()->route('admin.users.index')->with('info', 'User created: ' . $request->input('name') 
            . '<br />A password reset email has been sent to: ' . $request->input('email'));
    }

    public function postUserUpdate(Request $request)
    {
        $user = User::find($request->input('id'));
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->save();
        return redirect()->route('admin.users.index')->with('info', $request->input('title') . ' user profile edited.');
    }

    public function getUserDelete($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->route('admin.users.index')->with('info', 'User deleted!');
    }
}