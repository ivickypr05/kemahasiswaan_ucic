<?php

namespace App\Http\Controllers;

use App\Models\User;
Use File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct()
    {
        // $this->middleware('permission:user-list', ['only' => 'index']);
        // $this->middleware('permission:user-create', ['only' => ['create','store']]);
        // $this->middleware('permission:user-edit', ['only' => ['edit','update']]);
        // $this->middleware('permission:user-delete', ['only' => ['destroy']]);
    }
    
    public function loginPost2(Request $request)
    {
        $val = $request->nip;
        $password = $request->password;

        $cekMail = User::where('username',$val)->first();
   

            if($cekMail != null){
                // request untuk login menggunakan nim
                $credentials = ([
                    'username' => $val,
                    'password' => $password,
                ]);
                
                if (Auth::attempt($credentials)) {
                    
                        return redirect()->route('admin.dashboard.index');
                   
                }
        
            }elseif ($cekMail == null ){
                return redirect()->back()->with(['failed' => 'No Credentials']);
            }
     
    }


    public function index()
    {
        $data['page_title'] = 'Users List';
        $data['breadcumb'] = 'Users List';
        $data['users'] = User::orderby('id', 'asc')->get();

        return view('users.index', $data);
    }

    public function create()
    {
        $data['page_title'] = 'Add Users';
        $data['breadcumb'] = 'Add Users';
        $data['roles'] = Role::pluck('name')->all();
        // $data['divisi'] = Divisi::get();

        return view('users.create', $data);
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $validateData = $request->validate([
            'name'   => 'required|string|min:3',
            'username'   => 'required|unique:users,username|alpha_dash',
            'email'   => 'required|email|unique:users,email',
            'password' => 'required|min:8',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            'role' => 'required',
        ]);

    

        $user = new User();
        $user->name = $validateData['name'];
        $user->username = $validateData['username'];
        $user->email = $validateData['email'];
       
        $user->password = Hash::make($validateData['password']);

        if ($request->hasFile('avatar')) {
            $image = $request->file('avatar');
            $name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('img/users/');
            $image->move($destinationPath, $name);
            $user->avatar = $name;
        }

        $user->save();
        $user->assignRole($validateData['role']);

        return redirect()->route('users.index')->with(['success' => 'User added successfully!']);
    }

    public function edit($id)
    {
        $data['page_title'] = 'Edit User';
        $data['breadcumb'] = 'Edit User';
        $data['user'] = User::findOrFail($id);
        $data['roles'] = Role::pluck('name')->all();
        $data['divisi'] = Divisi::get();


        return view('users.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $validateData = $request->validate([
            'name'   => 'required|string|min:3',
            'username'   => 'required|alpha_dash|unique:users,username,'.$id,
            'email'   => 'required|unique:users,email,'.$id,
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            'role' => 'required',
        ]);


        $user = User::findOrFail($id);
        $user->name = $validateData['name'];
        $user->username = $validateData['username'];
        $user->email = $validateData['email'];
        
         if ($request->hasFile('avatar')) {
            // Delete Img
            if ($user->avatar) {
                $image_path = public_path('img/users/'.$user->avatar); // Value is not URL but directory file path
                if (File::exists($image_path)) {
                    File::delete($image_path);
                }
            }
            
            $image = $request->file('avatar');
            $name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('img/users/');
            $image->move($destinationPath, $name);
            $user->avatar = $name;
        }

        $user->save();
        DB::table('model_has_roles')->where('model_id',$id)->delete();
        $user->assignRole($validateData['role']);

        return redirect()->route('users.index')->with(['success' => 'User edited successfully!']);
    }

    public function destroy($id)
    {
        DB::transaction(function () use ($id) {
            $user = User::findOrFail($id);
            if ($user->avatar) {
                $image_path = public_path('img/users/'.$user->avatar); // Value is not URL but directory file path
                if (File::exists($image_path)) {
                    File::delete($image_path);
                }
            }


            $user->delete();
        });
        
        return redirect()->route('users.index')->with(['success' => ' successfully!']);
    }

    public function changePassword(Request $request)
    {
        $validateData = $request->validate([
            'password' => 'required',
            'new_password' => 'required|min:8',
        ]);

        $user = User::findOrFail(Auth::user()->id);

        if (Hash::check($validateData['password'], $user->password)) {
            $user->password = Hash::make($request->get('new_password'));
            $user->save();
    

            return redirect()->route('users.edit', Auth::user()->id)->with('success', 'Password changed successfully!');
        } else {
            return redirect()->route('users.edit', Auth::user()->id)->with('failed', 'Password change failed');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login-admin');
    }
}
