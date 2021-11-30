<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $data['users'] = User::orderBy('name')->get();

        return view('dashboard.user.index', $data);
    }

    public function create()
    {
        return view('dashboard.user.create');
    }

    public function store(Request $request)
    {
        $user = User::where('username', $request->username)->first();
        if ($user != null)
        {
            return redirect()->back()->with('ERR', 'Username sudah digunakan di akun lain.');
        }
        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'password' => bcrypt($request->password),
        ]);

        return redirect()->back()->with('OK', 'Data berhasil ditambah.');
    }

    public function edit($id)
    {
        $data['user'] = User::find($id);

        return view('dashboard.user.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $usernameExisting = User::where('username', $request->username)->first();
        if ($usernameExisting != null)
        {
            if ($user->id != $usernameExisting->id)
            {
                return redirect()->back()->with('ERR', 'Username sudah digunakan di akun lain.');
            }
        }
        $user->update([
            'nama' => $request->nama,
            'username' => $request->username,
            'password' => $request->password != null ? bcrypt($request->password) : $user->password,
        ]);

        return redirect()->back()->with('OK', 'Data berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->back()->with('OK', 'Data berhasil dihapus.');
    }
}
