<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash; // Untuk enkripsi password
use Illuminate\Validation\Rule;      // Untuk validasi unik saat edit

class UserController extends Controller
{
    /**
     * 1. INDEX: Tampilkan daftar user.
     */
    public function index()
    {
        $users = User::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.users.index', compact('users'));
    }

    /**
     * 2. CREATE: Tampilkan formulir tambah user baru.
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * 3. STORE: Simpan user baru ke database.
     */
    public function store(Request $request)
    {
        // Validasi Input
        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed', // Pastikan ada field 'password_confirmation' di view
        ]);

        // Simpan Data
        User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password), // Enkripsi password
        ]);

        return redirect()->route('admin.users.index')
            ->with('success', 'User berhasil ditambahkan!');
    }

    /**
     * 4. EDIT: Tampilkan formulir edit user.
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.edit', compact('user'));
    }

    /**
     * 5. UPDATE: Perbarui data user di database.
     */
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        // Validasi Input
        $request->validate([
            'name'  => 'required|string|max:255',
            // Email unik, tapi kecualikan user yang sedang diedit ini
            'email' => ['required', 'email', Rule::unique('users')->ignore($user->id)],
            'password' => 'nullable|string|min:8|confirmed', // Password opsional saat update
        ]);

        // Update Nama & Email
        $user->name = $request->name;
        $user->email = $request->email;

        // Update Password HANYA jika diisi
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect()->route('admin.users.index')
            ->with('success', 'Data user berhasil diperbarui!');
    }

    /**
     * 6. DESTROY: Hapus user dari database.
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        
        // Mencegah user menghapus akunnya sendiri saat sedang login
        if (auth()->id() == $user->id) {
            return back()->with('error', 'Anda tidak dapat menghapus akun Anda sendiri saat sedang login.');
        }

        $user->delete();

        return redirect()->route('admin.users.index')
            ->with('success', 'User berhasil dihapus!');
    }
}