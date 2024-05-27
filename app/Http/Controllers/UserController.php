<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $users = User::where('id', '!=', 1)->get();
        return view('user.index', compact('users'));
    }

    public function create()
    {
        return view('user.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|max:25|regex:/\w*$/',
            'username' => 'required|unique:users,username',
            'email' => 'required|email|unique:users,email',
        ]);

        $data['password'] = bcrypt($request->username);
        $data['status'] = 1;

        User::create($data);
        return redirect('users')->with('status', 'Akun Berhasil Ditambahkan');
    }

    public function edit(User $user)
    {
        return view('user.edit', ['user' => $user]);
    }

    public function update(Request $request, User $user)
    {
        $data = $request->validate([
            'name' => 'required|max:25|regex:/\w*$/',
            'username' => 'required|unique:users,username,' . $user->id,
            'email' => 'required|email|unique:users,email,' . $user->id,
            'status' => 'required'
        ]);

        if ($request->filled('password')) {
            $data['password'] = bcrypt($request->password);
        }
        $user->update($data);
        return redirect('users/' . $user->id . '/edit')->with('status', 'Akun Berhasil Dirubah');
    }

    public function resetPass(User $user)
    {
        $user->update([
            'password' => bcrypt($user->username)
        ]);
        return response()->json([
            'message' => 'Reset Password Akun ' . $user->name . ' Berhasil'
        ]);
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return response()->json([
            'message' => "Akun Berhasil Dihapus"
        ]);
    }

    public function editPass()
    {
        return view('user.editpass');
    }

    public function gantipass(Request $request)
    {
        $user = User::where('email', Auth::user()->email)->first();
        $user->update([
            'password' => bcrypt($request->password)
        ]);

        return redirect('gantipass')->with('status', 'Password Berhasil Dirubah');
    }
}
