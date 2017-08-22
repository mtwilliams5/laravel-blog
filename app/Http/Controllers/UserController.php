<?php

namespace App\Http\Controllers;

use App\Like;
use App\Tag;
use App\Post;
use App\User;
use Auth;
use Gate;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function getUsersAdmin()
    {
        $users = User::orderBy('id', 'asc')->paginate(10);
        return view('admin.users.index', ['users' => $users]);
    }
}