<?php

namespace App\Http\Controllers\roles;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Models\User;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Yajra\DataTables\Facades\DataTables;

class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $role_permissions = Role::with('permissions','users')->get();
        //dd($role_permissions);

        //$id=2;
       // $rolePermissions = Permission::join("role_has_permissions","role_has_permissions.permission_id","=","permissions.id")
       // ->where("role_has_permissions.role_id",$id)
      //  ->get();
        //dd($rolePermissions);


        return view('roles.index',compact('role_permissions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permissions=[
            ['name' => 'daily-incident-create'],
            ['name' => 'daily-incident-edit'],
            ['name' => 'daily-incident-delete'],
            ['name' => 'briefing-incident'],
            ['name' => 'gambling'],
            ['name' => 'mob-injustice'],
            ['name' => 'money-matters'],
            ['name' => 'arrest-of-foreigners'],
            ['name' => 'criminal-gang'],
            ['name' => 'police-officer'],
            ['name' => 'school-unrest'],
            ['name' => 'illicit-brew'],
            ['name' => 'terrorism'],
            ['name' => 'boarder'],
            ['name' => 'contraband'],
            ['name' => 'cattle-rustling'],
            ['name' => 'ethnic-clashes'],
            ['name' => 'stock-theft'],
            ['name' => 'alien'],
            ['name' => 'human-trafficking'],
            ['name' => 'firearm'],
            ['name' => 'kidnapping'],
            ['name' => 'car-jacking'],
            ['name' => 'traffic-incident-create'],
            ['name' => 'traffic-incident-edit'],
            ['name' => 'traffic-incident-delete'],
            ['name' => 'drug-incident-create'],
            ['name' => 'drug-incident-edit'],
            ['name' => 'drug-incident-delete'],
            ['name' => 'sgbv-incident-create'],
            ['name' => 'sgbv-incident-edit'],
            ['name' => 'sgbv-incident-delete'],
            ['name' => 'wildlife-incident-create'],
            ['name' => 'wildlife-incident-edit'],
            ['name' => 'wildlife-incident-delete'],
            ['name' => 'settings-region-create'],
            ['name' => 'settings-region-edit'],
            ['name' => 'settings-county-create'],
            ['name' => 'settings-county-edit'],
            ['name' => 'settings-county-delete'],
            ['name' => 'settings-division-create'],
            ['name' => 'settings-division-edit'],
            ['name' => 'settings-division-delete'],
            ['name' => 'settings-station-create'],
            ['name' => 'settings-station-edit'],
            ['name' => 'settings-station-delete'],
            ['name' => 'settings-police-base-create'],
            ['name' => 'settings-police-base-edit'],
            ['name' => 'settings-police-base-delete'],
            ['name' => 'settings-crime-category-create'],
            ['name' => 'settings-crime-category-edit'],
            ['name' => 'settings-crime-category-delete'],
            ['name' => 'settings-incident-file-create'],
            ['name' => 'settings-incident-file-edit'],
            ['name' => 'settings-incident-file-delete'],
            ['name' => 'settings-crime-source-create'],
            ['name' => 'settings-crime-source-edit'],
            ['name' => 'settings-crime-source-delete'],
            ['name' => 'settings-users'],
            ['name' => 'settings-users-edit'],
            ['name' => 'settings-users-delete'],
            ['name' => 'reports-briefing'],
            ['name' => 'reports-special-report'],


            
            // ... more items
        ];

        foreach ($permissions as $permission) {
           // $save= Permission::create($permission);
        }


      //  $save=Permission::insert($peermissions);
       // dd($save);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:roles,name',
            'permissions' => 'required',
        ]);
        // Check validation failure
        $noerrors = true;
        if ($validator->fails()) {
            $output = [
                'success' => false,
                'msg' => "Make sure you capture all fields and Role must be unique",
            ];
            $noerrors = false;
        }
      
        $input = $request->except(['_token']);
  
        if ($noerrors) {
            if (request()->ajax()) {
            try {
                //Begin DB
                DB::beginTransaction();
                $result = Role::create(['name' => $request->input('name')]);
                $result->syncPermissions($request->input('permissions'));
                DB::commit();
                $output = [
                    'success' => true,
                    'msg' => "Role Created Successfully",
                ];
            } catch (\Exception $e) {
                DB::rollBack();
                Log::emergency("File:" . $e->getFile() . "Line:" . $e->getLine() . "Message:" . $e->getMessage());
                $output = [
                    'success' => false,
                    'msg' => $e->getMessage(),
                ];
            }
            }
        }
        return $output;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $role_permissions = Role::where('id',$id)->with('permissions','users')->first();
        return view('roles.edit',compact('role_permissions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'permissions' => 'required',
        ]);
        // Check validation failure
        $noerrors = true;
        if ($validator->fails()) {
            $output = [
                'success' => false,
                'msg' => "Make sure you capture all fields and Role must be unique",
            ];
            $noerrors = false;
        }
        if ($noerrors) {
            if (request()->ajax()) {
            try {
                //Begin DB
                DB::beginTransaction();
                $result = Role::find($id);
                $result ->update(['name' => $request->input('name')]);
                $result->syncPermissions($request->input('permissions'));
                DB::commit();
                $output = [
                    'success' => true,
                    'msg' => "Role Updated Successfully",
                ];
            } catch (\Exception $e) {
                DB::rollBack();
                Log::emergency("File:" . $e->getFile() . "Line:" . $e->getLine() . "Message:" . $e->getMessage());
                $output = [
                    'success' => false,
                    'msg' => $e->getMessage(),
                ];
            }
            }
        }
        return $output;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
