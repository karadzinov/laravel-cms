<?php

namespace App\Http\Controllers\Admin;

use Auth;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use jeremykenedy\LaravelRoles\Models\Role;

class SoftDeletesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Get Soft Deleted User.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public static function getDeletedUser($id)
    {
        $user = User::onlyTrashed()->where('id', $id)->firstOrFail();

        return $user;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::onlyTrashed()->get();
        $roles = Role::all();

        return view('admin.usersmanagement.deleted-users-list', compact('users', 'roles'));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = self::getDeletedUser($id);

        return view('admin.usersmanagement.deleted-user-show')->withUser($user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int                      $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = self::getDeletedUser($id);
        $user->restore();

        return redirect('/admin/users/')->with('success', trans('usersmanagement.successRestore'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = self::getDeletedUser($id);
        $user->forceDelete();

        return redirect('/admin/users/deleted/')->with('success', trans('usersmanagement.successDestroy'));
    }
}
