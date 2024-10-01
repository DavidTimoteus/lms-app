<?php
namespace App\Http\Controllers;

use App\Models\UserModel;
use App\Models\LevelModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    public function login()
    {
        if (Auth::check()) {
            return redirect('/');
        }
        return view('auth.login');
    }
    public function postlogin(Request $request)
    {
        Log::info('Request data:', $request->all());
        Log::info('Request Type:', ['is_ajax' => $request->ajax(), 'wants_json' => $request->wantsJson()]);

        if ($request->ajax() || $request->wantsJson()) {
            $credentials = $request->only('email', 'password');

            if (Auth::attempt($credentials)) {
                $user = Auth::user();

                $levelCode = $user->level ? $user->level->level_code : null;
                // Tambahkan level_code ke log
                Log::info('User level_code:', ['level_code' => $levelCode]);

                return response()->json([
                    'status' => true,
                    'message' => 'Login Berhasil',
                    'redirect' => $levelCode === 'ADM' ? url('/level') : ($levelCode === 'PGJ' ? url('/dashboard') : url('/')),
                    'level_code' => $levelCode,
                ]);
            }

            return response()->json([
                'status' => false,
                'message' => 'Login Gagal. Periksa email dan password Anda.',
            ]);
        }

        return redirect('login');
    }


    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('login');
    }
    public function register()
    {
        $level = LevelModel::select('level_id', 'level_name')->get();
        return view('auth.register')->with('level', $level);
    }

    public function postregister(Request $request)
    {
        Log::info('Request data:', $request->all());
        Log::info('Request Type:', ['is_ajax' => $request->ajax(), 'wants_json' => $request->wantsJson()]);
        if ($request->ajax() || $request->wantsJson()) {
            $rules = [
                'level_id' => ['required', 'integer', 'exists:m_level,level_id'],
                'email' => ['required', 'email', 'min:4', 'max:100', 'unique:m_user,email'],
                'name' => ['required', 'min:5', 'max:100'],
                'password' => ['required', 'min:8', 'max:20']
            ];
            Log::info('Isi Validator:', $request->all());
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                Log::info('Validation Errors:', $validator->errors()->toArray());
                return response()->json([
                    'status' => false,
                    'message' => 'Validasi gagal.',
                    'msgField' => $validator->errors()
                ]);
            }
            UserModel::create($request->all());
            return response()->json([
                'status' => true,
                'message' => 'Register Berhasil',
                'redirect' => url('/login'),
            ]);
        }
        return redirect('/');
    }
}