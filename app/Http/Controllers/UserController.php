<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.akun.index', compact('users'));
    }

    public function create()
    {
        return view('admin.akun.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:60',
            'email' => 'required|string|email|max:100|unique:users',
            'password' => 'required|string|min:8|max:60',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('admin.akun.index')->with('success', 'Akun berhasil dibuat.');
    }

    public function edit(User $user)
    {
        return view('admin.akun.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:60',
            'email' => 'required|string|email|max:100|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8'|'max:60',
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->password) {
            $user->password = Hash::make($request->password);
        }
        $user->save();

        return redirect()->route('admin.akun.index')->with('success', 'Akun berhasil diupdate.');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('admin.akun.index')->with('success', 'Akun berhasil dihapus.');
    }
}
