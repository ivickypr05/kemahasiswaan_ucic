<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function login(Request $request)
    {
        $val = $request->username;
        $password = $request->password;
        User::where('username', $val)->first();

        // request untuk login menggunakan nim
        $check = ([
            'username' => $val,
            'password' => $password,
        ]);

        if (Auth::attempt($check)) {
            $request->session()->regenerate();

            return redirect()->intended('dashboard')->with('success', 'Selamat Datang di Dashboard Kemahasiswaan UCIC');
        }
        return back()->withErrors([
            'username' => 'Username atau Password Salah',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login')->with('success', 'Berhasil Logout');
    }

    public function index()
    {
        $users = User::all();
        return view('admin.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate(
            [
                'name' => 'required|string|min:2|max:50',
                'username' => 'required|string|min:2|max:20',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|string|min:3|max:50',
                'role' => 'required'
            ]
        );
        $data['password'] = Hash::make($request->password);
        User::create($data);
        return redirect('user-list')->with('toast_success', 'Pengguna Berhasil Ditambah');
    }

    public function edit($id)
    {
        $data['user'] = User::find($id);
        return view('admin.user.edit', $data);
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
        $data = $request->validate([
            'name' => 'required|string|min:2|max:50',
            'username' => 'required|string|min:2|max:20',
            'role' => 'required|in:kemahasiswaan,bkm,ukm,hima',
            'email' => 'required|email|unique:users,email,' . $id
        ]);

        $data['role'] = $request->role;
        $user = User::findOrFail($id);
        $data['password'] = $request->password ? Hash::make($request->password) : $user->password;
        user::where('id', $id)->update($data);
        return redirect('user-list')->with('toast_success', 'Pengguna berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect('user-list')->with('toast_success', 'Pengguna berhasil dihapus');
    }
}
