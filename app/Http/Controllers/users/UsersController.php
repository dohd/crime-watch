<?php

namespace App\Http\Controllers\users;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use App\Utils\MessageUtil;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AppHelper;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;


class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $messageUtil;
    public function __construct(MessageUtil $messageUtil)
    {
        $this->messageUtil = $messageUtil;
    }
    public function index()
    {
        $roles = Role::pluck('name','name')->all();
        if (request()->ajax()) {
           //$data = User::where('role',0)->orderBy('created_at', 'DESC')->get();
            $data = User::orderBy('created_at', 'DESC')->get();
            return DataTables::of($data)
            ->addColumn('roles', function ($data) {

               
                $rolename='';
                if(!empty($data->getRoleNames())){

                    foreach($data->getRoleNames() as $v){
                        $rolename=$v;
                    }
                  
                

                }
                return  $rolename;
            })

                ->make(true);
        }
        return view('users.index',compact('roles'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'email' => 'bail|required|email|unique:users,email',
            'username' => 'bail|required|unique:users,username',
            'name' => 'bail|required',
            'phone' => 'bail|required|unique:users,phone',
        ]);
        // Check validation failure
        $noerrors = true;
        if ($validator->fails()) {
            $output = [
                'success' => false,
                'msg' => "It appears you have forgotten to complete something",
            ];
            $noerrors = false;
        }
        $data = $request->only(['email', 'username', 'name', 'status', 'phone']);
        // Check validation success
        $password = Str::random(4);
        $data['password'] = $password;
        $noerrors = true;
        if ($noerrors) {
            if (request()->ajax()) {
                try {
                    $data = User::create($data);
                    if ($data) {
                        $message = 'Your have been successfully registed to CRIMEWATCH  system your username is : ' . $request->username . ' and password is : ' . $password . '';
                        $this->messageUtil->sendMessage($request->phone_no, $message);
                        $details = [
                            'title' => 'CRIMEWATCH  PASSWORD',
                            'body' => $message,
                        ];
                        $data->assignRole($request->input('role_id'));
                        //Mail::to($request->email)->send(new \App\Mail\SendPassword($details));
                    }
                    $output = [
                        'success' => true,
                        'msg' => "User Created Successfully"
                    ];
                } catch (\Exception $e) {
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
    public function edit(User $user)
    {
        $roles = Role::pluck('name','name')->all();
        $userRole = $user->roles->pluck('name','name')->all();
        return view('users.edit', compact('user','roles','userRole'));
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
        try {
            $is_valid = true;
            $input = $request->except(['_token']);
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'username' => 'required',
                'email' => 'required',
                'phone' => 'required',
            ]);
            if ($validator->fails()) {
                $output = [
                    'success' => false,
                    'msg' => "It appears you have forgotten to complete something",
                ];
                $is_valid = false;
            }
            DB::beginTransaction();
            //    dd($input);
            if ($is_valid) {
                //save clients
                $result = User::find($id);
                if ($request->icon && $request->icon != "undefined") {
                    $deletefile=(new AppHelper)->deleteFile($result->icon);
                    $input['icon'] = (new AppHelper)->saveImage($request);
                }
                $result->update($input);
                $result->touch();
                DB::table('model_has_roles')->where('model_id',$id)->delete();
                $result->assignRole($request->input('role_id'));
                $output = [
                    'success' => true,
                    'msg' => "User  Updated Successfully!!"
                ];
                DB::commit();
            }
        } catch (\Exception $e) {
            DB::rollBack();
            $bug = $e->getMessage();
            $output = [
                'success' => false,
                'msg' => $bug
            ];
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
        if (request()->ajax()) {
            try {
                $can_be_deleted = true;
                $error_msg = '';
                if ($can_be_deleted) {
                    DB::beginTransaction();
                    User::find($id)->delete();
                    DB::commit();
                    $output = [
                        'success' => true,
                        'msg' => "User Deleted Successfully"
                    ];
                } else {
                    $output = [
                        'success' => false,
                        'msg' => $error_msg
                    ];
                }
            } catch (\Exception $e) {
                DB::rollBack();
                Log::emergency("File:" . $e->getFile() . "Line:" . $e->getLine() . "Message:" . $e->getMessage());
                $output = [
                    'success' => false,
                    'msg' => "Something Went Wrong"
                ];
            }
            return $output;
        }
    }
    public function reset_password($id)
    {
        if (request()->ajax()) {
            try {
                DB::beginTransaction();
                $input = [];
                $password = Str::random(4);
                $input['password'] = $password;
                $user =  User::find($id);
                $user->update($input);
                $user->touch();
                if ($user) {
                    $message = 'Your password has been reset  successfully your username is : ' . $user->username . ' and password is : ' . $password . '';
                    $this->messageUtil->sendMessage($user->phone_no, $message);
                    $details = [
                        'title' => 'CRIMEWATCH  PASSWORD',
                        'body' => $message,
                    ];
                    //Mail::to($request->email)->send(new \App\Mail\SendPassword($details));
                }
                DB::commit();
                $output = [
                    'success' => true,
                    'msg' => "Password Reset  Successfully"
                ];
            } catch (\Exception $e) {
                DB::rollBack();
                Log::emergency("File:" . $e->getFile() . "Line:" . $e->getLine() . "Message:" . $e->getMessage());
                $output = [
                    'success' => false,
                    'msg' => $e->getMessage()
                ];
            }
            return $output;
        }
    }

    public function user_account()
    {

        $user= Auth::user();
        return view('users.account-settings', compact('user'));
    }

    public function user_password_reset(Request $request)
    {

        $user= Auth::user();
        try {
            $is_valid = true;
           
            $validator = Validator::make($request->all(), [
                'new_password' => 'required',
                'new_confirm_password' => 'required|same:new_password'
            ]);
            if ($validator->fails()) {
                $output = [
                    'success' => false,
                    'msg' => "Your password do not match",
                ];
                $is_valid = false;
            }
            DB::beginTransaction();
            //    dd($input);
            if ($is_valid) {
                //save clients
                $user = Auth::user();
                if (Hash::check($request->current_password, $user->password)) {
                    $result = User::find($user->id);
                    $input = $request->only(['new_password']);
                    $input['password'] = $input['new_password'];
                    $result->update($input);
                    $result->touch();
                    if ($user) {
                        $message = 'Your password has been reset  successfully your username is : ' . $user->username . ' and password is : ' . $input['password'] . '';
                        $this->messageUtil->sendMessage($user->phone_no, $message);
                        //Mail::to($request->email)->send(new \App\Mail\SendPassword($details));
                    }
                    DB::commit();
                    $output = [
                        'success' => true,
                        'msg' => "Password Reset  Successfully"
                    ];
                    //add logic here
        
        
                    
                   }else{
                //Invalid password
                    $output = [
                        'success' => false,
                        'msg' => 'Invalid Password'
                    ];
                   }





               
                
              
              
            }
        } catch (\Exception $e) {
            DB::rollBack();
            $bug = $e->getMessage();
            $output = [
                'success' => false,
                'msg' => $bug
            ];
        }
        return $output;




       

        
    }
}
