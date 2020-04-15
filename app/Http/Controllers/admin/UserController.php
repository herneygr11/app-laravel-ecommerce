<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function __construct() {
        //
    } # End method __construct

    public function index()
    {
        $users = User::orderBy( 'id', 'Desc' )
            ->get();

        return view('admin.users.index', compact( 'users' ) )
            ->render();

    } # End method index

} # End class UserController
