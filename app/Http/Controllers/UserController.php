<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
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
        ]);

        $data['password'] = bcrypt($request->password);
        $data['status'] = 1;

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
}
