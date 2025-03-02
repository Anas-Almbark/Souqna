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
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        // التحقق من وجود البريد الإلكتروني في جدول المشرفين (admins)
        $isAdmin = \App\Models\Admin::where('email', $request->email)->exists();
        $isUser = \App\Models\User::where('email', $request->email)->exists();

        if ($isAdmin) {
            
            // محاولة تسجيل الدخول كـ Admin
            if (Auth::guard('admin')->attempt($credentials)) {
                $request->session()->regenerate();
                return redirect()->route('dashboard');
            }
        } else if ($isUser) {
                        // محاولة تسجيل الدخول كـ User
            if (Auth::guard('web')->attempt($credentials)) {
                $request->session()->regenerate();
                return redirect()->route('home.index'); 
            }
        }

        return back()->withErrors([
            'email' => 'The Email Or Password Invalid',
        ]);
    }

    public function destroy(Request $request)
    {
        if (Auth::guard('admin')->check()) {
            Auth::guard('admin')->logout();
            $message='admin logout successfully';
        } else if(Auth::guard('web')->check()) {
            Auth::guard('web')->logout();
            $message='user logout successfully';
        } 
        else {
            Auth::logout();
            $message='logout successfully';
        }


        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('success', $message);
    }
}
