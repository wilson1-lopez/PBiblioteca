<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = User::all();
        $names = $user->sortBy('name')->pluck('name')->unique();
        $emails = $user->sortBy('email')->pluck('email')->unique();
        return view('user.index', compact('names', 'emails'));
    }

    public function dataTable()
    {
        return DataTables::of(User::select('id', 'name', 'email', 'created_at')->where('id', '<>', 1)->get())
            ->editColumn('created_at', function(User $user){
                return $user->created_at->diffForHumans();
            })
            ->addColumn('btn', 'user.dataTable.btn')
            ->rawColumns(['btn'])
            ->toJson();
    }

    public function create(Request $request)
    {
        if($request->ajax()){
            $roles = Role::where('id', $request->role_id)->first();
            $permissions = $roles->permissions;

            return $permissions;
        }
        $roles = Role::all();
        return view('user.create')->with('roles',$roles);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|unique:users|email|max:255',
            'password' => 'required|between:8,255|confirmed',
            'password_confirmation' => 'required',
        ]);

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);

        try {
            $user->save();

            if($request->role != null){
                $user->roles()->attach($request->role);
                $user->save();
            }

            if($request->permissions != null){
                foreach ($request->permissions as $permission) {
                    $user->permissions()->attach($permission);
                    $user->save();
                }
            }

            return back()->with('success','Registro Guardado');
        } catch (Exception $e) {
            return back()->with('error',$e);
        }

    }

    public function show(User $user)
    {
        if($user->id==1 && Auth::id()<>1){
            abort(403);
        }
        return view('user.show')->with('user',$user);
    }

    public function edit(User $user)
    {
        if($user->id==1 && Auth::id()<>1){
            abort(403);
        }

        $roles = Role::get();
        $userRole = $user->roles->first();

        if($user->id==1 && Auth::id()<>1){
            abort(403);
        }

        if($userRole != null){
            $rolePermissions = $userRole->allRolePermissions;
        }else{
            $rolePermissions = null;
        }
        $userPermissions = $user->permissions;

        return view('user.edit', [
            'user'=>$user,
            'roles'=>$roles,
            'userRole'=>$userRole,
            'rolePermissions'=>$rolePermissions,
            'userPermissions'=>$userPermissions
        ]);

    }

    public function update(Request $request, User $user)
    {
        if($user->id==1 && Auth::id()<>1){
            abort(403);
        }
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'password' => 'confirmed',
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        if($request->password != null){
            $user->password = Hash::make($request->password);
        }
        $user->save();

        $user->roles()->detach();
        $user->permissions()->detach();

        if($request->role != null){
            $user->roles()->attach($request->role);
            $user->save();
        }

        if($request->permissions != null){
            foreach ($request->permissions as $permission) {
                $user->permissions()->attach($permission);
                $user->save();
            }
        }

        return back()->with('success','Registro Guardado');
    }

    public function destroy(User $user)
    {
        if($user->id==1 && Auth::id()<>1){
            abort(403);
        }
        $user->roles()->detach();
        $user->permissions()->detach();
        $user->delete();
        return redirect()->back()->with('success','Registro Borrardo');
    }
}
