<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Pendaftar;
use App\Models\Peminat;
use App\Models\BukuTamu;

class SessionController extends Controller
{
    public function index()
    {
        return view('session.login');
    }

    public function login(Request $request)
    {
        $logininfo = [
            'username' => $request->username,
            'password' => $request->password,
        ];

        $request->validate([
            'username' =>'required',
            'password' => 'required',
        ], [
            'username.required' => 'Username Wajib Diisi',
            'password.required' => 'Password wajib Disi',
        ]);

        $latestRecord = null;

        if (Auth::attempt($logininfo)) {
            // Fetch the most recently added record from both tables based on the highest no_reg
            $latestPendaftar = Pendaftar::latest('no_reg')->first();
            $latestPeminat = Peminat::latest('no_reg')->first();

            // Determine which record has a higher no_reg value
            if ($latestPendaftar !== null && ($latestPeminat === null || $latestPendaftar->no_reg > $latestPeminat->no_reg)) {
                $latestRecord = $latestPendaftar;
            } elseif ($latestPeminat !== null) {
                $latestRecord = $latestPeminat;
            }

            // Fetch counts of records from both tables
            $counts = $this->getCounts();

            // Redirect to the dashboard with the most recent data and counts
            return view('dashboard.dashboard', [
                'latestRecord' => $latestRecord,
                'pendaftarCount' => $counts['pendaftarCount'],
                'peminatCount' => $counts['peminatCount'],
                'bukuTamuCount' => $counts['bukuTamuCount'],
            ]);
        } else {
            return redirect('/login')->with('logingagal', 'Login Gagal!');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();

        request()->session()->invalidate();

        request()->session()->regenerateToken();

        return redirect('/login');
    }

    public function dashboard()
    {
        return view('dashboard.dashboard');
    }

    public function logout_index(Request $request)
    {
        Auth::logout();

        request()->session()->invalidate();

        request()->session()->regenerateToken();

        return redirect('/index')->with('logout', 'Logout Berhasil!');
    }

    private function getCounts()
    {
        $pendaftarCount = Pendaftar::count();
        $peminatCount = Peminat::count();
        $bukuTamuCount = BukuTamu::count();

        return compact('pendaftarCount', 'peminatCount', 'bukuTamuCount');
    }
}
