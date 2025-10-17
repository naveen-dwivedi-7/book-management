<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    // Hardcoded user for demo
    private $user = [
        'email' => 'admin@example.com',
        'password' => '123456',
        'name' => 'Admin User'
    ];

    public function showLoginForm()
    {
        return view('login');
    }


    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if ($request->email === $this->user['email'] && $request->password === $this->user['password']) {
            $request->session()->put('user', $this->user);
            return redirect()->route('dashboard');
        }

        return back()->with('error', 'Invalid email or password.');
    }

    public function dashboard(Request $request)
    {
        $user = $request->session()->get('user');
        return view('dashboard', compact('user'));
    }

    public function logout(Request $request)
    {
        $request->session()->forget('user');
        return redirect('/login')->with('success', 'Logged out successfully.');
    }
}
