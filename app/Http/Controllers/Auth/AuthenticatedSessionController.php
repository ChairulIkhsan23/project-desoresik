<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view for Petugas.
     */
    public function petugasCreate(): View
    {
        return view('auth.petugas-login'); // Menampilkan tampilan login untuk petugas
    }

    /**
     * Display the login view for Admin.
     */
    public function adminCreate(): View
    {
        return view('auth.admin-login'); // Menampilkan tampilan login untuk admin
    }

    /**
     * Handle an incoming authentication request for Petugas.
     */
    public function petugasStore(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        return redirect()->route('petugas.dashboard'); // Redirect ke dashboard petugas
    }

    /**
     * Handle an incoming authentication request for Admin.
     */
    public function adminStore(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        return redirect()->route('admin.dashboard'); // Redirect ke dashboard admin
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
