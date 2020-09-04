<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Gate;

class RolesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Role $role)
    {
        $this->authorize('viewAny',$role);
        return view('roles.index');
    }

    public function dataTable(Role $role)
    {
        $this->authorize('viewAny',$role);
        $role = Role::select('id', 'nombre', 'slug')->get();
        return DataTables::of($role)
            ->addColumn('btn', 'roles.dataTable.btn')
            ->rawColumns(['btn'])
            ->toJson();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Role $role)
    {
        $this->authorize('create',$role);
        return view('roles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,Role $role)
    {
        $this->authorize('create',$role);
        $request->validate([
            'nombre' => 'required|max:255|unique:roles',
            'slug' => 'required|unique:roles|max:255',
        ]);

        $role = new Role();

        $role->nombre = $request->nombre;
        $role->slug = $request->slug;
        $role->save();

        $list = explode(',',$request->roles_permissions);

        foreach ($list as $permiso){
            $permissions = new Permission();
            $permissions->nombre = $permiso;
            $permissions->slug = strtolower(str_replace(" ","-",$permiso));
            $permissions->save();
            $role->permissions()->attach($permissions->id);
            $role->save();
        }

        try {
            return back()->with('success','Registro Guardado');
        } catch (Exception $e) {
            return back()->with('error',$e);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        $this->authorize('view',$role);
        return view('roles.show')->with('role',$role);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        $this->authorize('update',$role);
        return view('roles.edit')->with('roles',$role);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {

        $this->authorize('update',$role);

        $request->validate([
            'nombre' => 'required|max:255',
            'slug' => 'required|max:255',
        ]);

        $role->nombre = $request->nombre;
        $role->slug = $request->slug;

        try {
            $role->save();

            $role->permissions()->delete();
            $role->permissions()->detach();

            $list = explode(',',$request->roles_permissions);

            foreach ($list as $permiso){
                $permissions = new Permission();
                $permissions->nombre = $permiso;
                $permissions->slug = strtolower(str_replace(" ","-",$permiso));
                $permissions->save();
                $role->permissions()->attach($permissions->id);
                $role->save();
            }

            return back()->with('success','Registro Guardado');
        } catch (Exception $e) {
            return back()->with('error',$e);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        $this->authorize('delete',$role);
        $role->permissions()->delete();
        $role->delete();
        $role->permissions()->detach();
        return redirect()->back()->with('success','Registro Borrardo');
    }
}
