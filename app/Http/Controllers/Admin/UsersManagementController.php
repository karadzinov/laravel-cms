<?php

namespace App\Http\Controllers\Admin;

use Auth;
use Validator;
use App\Traits\CaptureIpTrait;
use App\Models\{User, Profile};
use App\Http\Controllers\Controller;
use Illuminate\Http\{Request, Response};
use jeremykenedy\LaravelRoles\Models\Role;
use App\Http\Requests\User\StoreUserRequest;

class UsersManagementController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pagintaionEnabled = config('usersmanagement.enablePagination');
        if ($pagintaionEnabled) {
            $users = User::paginate(config('usersmanagement.paginateListSize'));
        } else {
            $users = User::all();
        }
        $roles = Role::all();

        return view('admin.usersmanagement.index', compact('users', 'roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();

        $data = compact('roles');

        return view('admin.usersmanagement.create')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {
        $ipAddress = new CaptureIpTrait();
        $profile = new Profile();

        $user = User::create([
            'name'             => $request->input('name'),
            'first_name'       => $request->input('first_name'),
            'last_name'        => $request->input('last_name'),
            'email'            => $request->input('email'),
            'password'         => bcrypt($request->input('password')),
            'token'            => str_random(64),
            'admin_ip_address' => $ipAddress->getClientIp(),
            'activated'        => 1,
        ]);

        $user->profile()->save($profile);
        $user->attachRole($request->input('role'));
        $user->save();

        return redirect(route('admin.users'))->with('success', trans('usersmanagement.createSuccess'));
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
        $user = User::find($id);

        return view('admin.usersmanagement.show')->withUser($user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $roles = Role::all();
        $currentRole = $user->roles->first();
        
        $data = [
            'user'        => $user,
            'roles'       => $roles,
            'currentRole' => $currentRole,
        ];

        return view('admin.usersmanagement.edit')->with($data);
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
        $user = User::find($id);
        $emailCheck = ($request->filled('email')) && ($request->input('email') != $user->email);
        

        $rules = $this->createUpdateUserRules($emailCheck, $id);
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $user = $this->updateUser($user, $request, $emailCheck);

        return back()->with('success', trans('usersmanagement.updateSuccess'));
    }

    /**
     * Creates rules for update request.
     * @param bool                     $emailCheck
     * @param int                      $id
     *
     * @return array
     */
    public function createUpdateUserRules($emailCheck, $id){
        if ($emailCheck){
            $rules = [
                'name'     => 'required|max:255|unique:users',
                'email'    => 'email|max:255|unique:users',
                'password' => 'present|confirmed|min:6',
            ];
        } else {
            $rules = [
                'name'     => 'required|max:255|unique:users,name,'.$id,
                'password' => 'nullable|confirmed|min:6',
            ];
        }

        return $rules;
    }


    /**
     * Updates User model.
     *
     * @param App\Models\User $user
     * @param \Illuminate\Http\Request $request
     * @param bool                      $emailCheck
     * 
     * @return App\Models\User
     */
    public function updateUser(User $user, Request $request, $emailCheck){

        $ipAddress = new CaptureIpTrait();
        $user->name = $request->input('name');
        $user->first_name = $request->input('first_name');
        $user->last_name = $request->input('last_name');

        ($emailCheck) ? $user->email = $request->input('email') : null;

        if ($request->input('password') != null) {
            $user->password = bcrypt($request->input('password'));
        }

        $userRole = $request->input('role');
        if ($userRole != null) {
            $user->detachAllRoles();
            $user->attachRole($userRole);
        }

        $user->updated_ip_address = $ipAddress->getClientIp();

        ($userRole == 3) ? $user->activated = 0 : $user->activated = 1;
        
        $user->save();

        return $user;
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
        $currentUser = Auth::user();
        $user = User::findOrFail($id);
        $ipAddress = new CaptureIpTrait();

        if ($user->id != $currentUser->id) {
            $user->deleted_ip_address = $ipAddress->getClientIp();
            $user->save();
            $user->delete();

            return redirect(route('admin.users'))->with('success', trans('usersmanagement.deleteSuccess'));
        }

        return back()->with('error', trans('usersmanagement.deleteSelfError'));
    }

    /**
     * Method to search the users.
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $searchTerm = $request->input('user_search_box');
        $searchRules = [
            'user_search_box' => 'required|string|max:255',
        ];
        $searchMessages = [
            'user_search_box.required' => 'Search term is required',
            'user_search_box.string'   => 'Search term has invalid characters',
            'user_search_box.max'      => 'Search term has too many characters - 255 allowed',
        ];

        $validator = Validator::make($request->all(), $searchRules, $searchMessages);

        if ($validator->fails()) {
            return response()->json([
                json_encode($validator),
            ], Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $results = User::where('id', 'like', $searchTerm.'%')
                            ->orWhere('name', 'like', $searchTerm.'%')
                            ->orWhere('email', 'like', $searchTerm.'%')->get();

        // Attach roles to results
        foreach ($results as $result) {
            $roles = [
                'roles' => $result->roles,
            ];
            $result->push($roles);
        }

        return response()->json([
            json_encode($results),
        ], Response::HTTP_OK);
    }
}
