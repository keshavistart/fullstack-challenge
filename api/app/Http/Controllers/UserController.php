<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\UserCollection;
use App\Models\User;

class UserController extends Controller
{
    public function __invoke()
    {
        return new UserCollection(User::paginate(5));
    }
}
