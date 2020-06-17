<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use View;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware([
            'auth',
            'isadmin',
            'user.status'
        ]);
    } # End method __construct

    public function index(int $status = null)
    {
        if ($status != null) {
            $users = User::where('status', $status)
                ->orderBy('id', 'Desc')
                ->paginate(20);
        } else {
            $users = User::orderBy('id', 'Desc')
                ->paginate(20);
        }

        return view('admin.users.index', compact('users'));
    } # End method index

    public function bannedUser(int $id)
    {
        $user = User::findOrFail($id);


        if ($user->status == 100) {
            $user->status = 1;
        } else {
            $user->status = 100;
        }

        $user->update();

        if (view()->exists('admin.users.edit')) {
            return redirect()->route('users.edit', $user->slug);
        }
    }

    public function editUser(User $slug)
    {
        $user = User::get()->first();

        if (view()->exists('admin.users.edit')) {
            return view('admin.users.edit', compact('user'));
        }
    } # End method

    public function permissionsUser(User $user)
    {

        if (view()->exists('admin.users.permissions')) {
            return view('admin.users.permissions', compact('user'));
        }
    }

    public function setPermissionsUser(User $user, Request $request): RedirectResponse
    {
        $permissions = [
            "admin.index" => $request->dashboard_index,
            # Permission users
            "users.index" => $request->users_index,
            "users.permissions" => $request->users_permissions,
            "users.permissions.create" => $request->users_permissions_create,
            "users.edit" => $request->users_edit,
            "users.delete" => $request->users_delete,
            "users.banned" => $request->users_banned,
            # Permission categories
            "categories.index" => $request->categories_index,
            "categories.create" => $request->categories_create,
            "categories.edit" => $request->categories_edit,
            "categories.delete" => $request->categories_delete,
            # Permission productos
            "products.index" => $request->products_index,
            "products.create" => $request->products_create,
            "products.edit" => $request->products_edit,
            "products.delete" => $request->products_delete,
            "products.gallery" => $request->products_gallery,
            "products.gallery.delete" => $request->products_gallery_delete,
        ];

        $permissions = json_encode($permissions);

        if ($user->update(['permissions' => $permissions])) {
            return back();
        }
    }
} # End class UserController
