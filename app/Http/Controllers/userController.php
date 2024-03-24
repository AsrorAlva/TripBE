<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; // Ganti model dari Product ke User
use App\Http\Requests\UserRequest; // Ganti permintaan dari ProductStoreRequest ke UserStoreRequest
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash; // Menggunakan Hash untuk mengenkripsi kata sandi

class UserController extends Controller
{
    public function index()
    {
        // Semua Pengguna
        $users = User::all();

        // Return JSON Response
        return response()->json([
            'users' => $users
        ], 200);
    }

    public function store(UserRequest $request)
    {
        try {
            // Membuat pengguna
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'username' => $request->username,
                'password' => Hash::make($request->password) // Menggunakan Hash untuk mengenkripsi kata sandi
            ]);

            // Return JSON Response
            return response()->json([
                'message' => "User successfully created."
            ], 200);
        } catch (\Exception $e) {
            // Return JSON Response
            return response()->json([
                'message' => "Something went really wrong!"
            ], 500);
        }
    }

    public function show($id)
    {
        // Detail Pengguna
        $user = User::find($id);
        if (!$user) {
            return response()->json([
                'message' => 'User Not Found.'
            ], 404);
        }

        // Return JSON Response
        return response()->json([
            'user' => $user
        ], 200);
    }

    public function update(UserRequest $request, $id)
    {
        try {
            // Temukan pengguna
            $user = User::find($id);
            if (!$user) {
                return response()->json([
                    'message' => 'User Not Found.'
                ], 404);
            }

            $user->name = $request->name;
            $user->email = $request->email;
            $user->username = $request->username;
            $user->password = Hash::make($request->password); // Menggunakan Hash untuk mengenkripsi kata sandi

            // Perbarui pengguna
            $user->save();

            // Return JSON Response
            return response()->json([
                'message' => "User successfully updated."
            ], 200);
        } catch (\Exception $e) {
            // Return JSON Response
            return response()->json([
                'message' => "Something went really wrong!"
            ], 500);
        }
    }

    public function destroy($id)
    {
        // Detail Pengguna
        $user = User::find($id);
        if (!$user) {
            return response()->json([
                'message' => 'User Not Found.'
            ], 404);
        }

        // Hapus Pengguna
        $user->delete();

        // Return JSON Response
        return response()->json([
            'message' => "User successfully deleted."
        ], 200);
    }
}
